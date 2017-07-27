<?php
/*
登录注册信息处理
*/
require '../medoo/config.php';
require 'tojson.php';

//登录注册
$action = isset($_POST['action']) ? $_POST['action'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$psd = isset($_POST['psd']) ? $_POST['psd'] : '';
$power = isset($_POST['power']) ? $_POST['power'] : '';
//用户管理
$id= isset($_POST['id']) ? $_POST['id'] : '';
$teachername= isset($_POST['teachername']) ? $_POST['teachername'] : '';
$id= isset($_POST['id']) ? $_POST['id'] : '';
//判断事件
if($action=='login') {
    login($name, $psd, true);
} else if($action=='register') {
    register($name, $psd, true);
} else if($action=='update') {
    update($id,$name,$psd,$power);
} else if($action=='showall') {
    showAll();
}else if($action=='select'){
    select($teachername);
}else if($action=='add'){
    add($name,$psd,$power);
}
else if($action=='delete'){
    delete($id);

}
else {
    $result = array("result"=>"错误请求");
    $json = JSON($result);
    echo $json;
}
//登录
function login($name, $psd, $normal) {
    Global $database;
    $count = $database->count("teacherinfo",[ "AND" =>
        [
            'teacherid' => $name,
            'password' => $psd,
        ]
    ]);
    $identity = $database->select("teacherinfo",
        [
            'identity',
            'teachername',
        ],[
            'teacherid' => $name
        ]
    );
    $notice = $database->select("notice",[
        "noticetext",
        "noticetime"
    ],["ORDER" => ["noticetime" => "DESC"]]);
    if($count) {
        $success = "登录成功！";
        if($normal) {
            session_start();
            $_SESSION['teacherid']=$name;
            $_SESSION['teachername']=$identity[0]['teachername'];
            $_SESSION['identity']=$identity[0]['identity'];
            $_SESSION['notice']=$notice[0]['noticetext'];
            $_SESSION['noticetime']=$notice[0]['noticetime'];
            $login_result = array('result'=>1,'msg'=>$success,'power'=> $identity);
            $json = JSON($login_result);
            echo $json;
        }
    }
        else{
            $success = "登录失败！";
            $login_result = array('result'=>0,'msg'=>$success);
            $json = JSON($login_result);
            echo $json ;
        }

    return $count;
}
//注册
function register($name, $psd, $normal) {
    Global $database;
    $time=date("Y").date("m").date("d").date("H").date("i").date("s");
    $count = $database->count("teacherinfo",
        [
            'teacherid' => $name
        ]
    );
    if($count) {
        if($normal) {
            $result = array("result"=>0,'msg'=>"该用户已经被注册,如果你是拥有者那么请联系管理员！");
            echo JSON($result);
        }
    }
    else{
        $datas = $database->insert("teacherinfo", [
            "teacherid" =>$name,
            "password" =>$psd,
            "registertime" =>$time,
            "identity"=>"0"
        ]);
        if($datas){
            $result = array("result"=>1,'msg'=>"注册成功！");
            echo JSON($result);
        }else{
            $result = array("result"=>0,'msg'=>"注册失败！");
            echo JSON($result);
        }
    }
    return $count;
}

function showALL(){
    Global $database;
    $dates = $database->select("teacherinfo", [
        "id",
        "teachername",
        "password",
        "teacherid",
         "identity"
    ]);
    if($dates)
    {
        echo JSON($dates);
    }
    else{
        $result = array("result"=>0,'msg'=>"没有任何记录！");
        echo JSON($result);
    }
}
function delete($id){
    Global $database;
    $datas = $database->delete("teacherinfo", [
        "id" => $id
    ]);
    if($datas)
    {
        $result = array("result"=>1,'msg'=>"删除成功！");
        echo JSON($result);
    }else{
        $result = array("result"=>0,'msg'=>"删除失败！");
        echo JSON($result);
    }
}
//添加记录
function add($name, $psd, $power)
{
    Global $database;
    $datas = $database->insert("teacherinfo", [
        "teachername" =>$name,
        "password" =>$psd,
        "identity" =>$power
    ]);
    if ($datas) {
        $result = array("result" => 1, 'msg' => "添加成功！");
        echo JSON($result);
    } else {
        $result = array("result" => 0, 'msg' => "添加失败！");
        echo JSON($result);
    }
}
function update($id,$name, $psd, $power){
    Global $database;
    $datas = $database->update("teacherinfo", [
        "teachername" =>$name,
        "password" =>$psd,
        "identity" =>$power
    ],[
        "id"=> $id
    ]);
    if($datas)
    {
        $result = array("result"=>1,'msg'=>"修改成功！");
        echo JSON($result);
    }else{
        $result = array("result"=>0,'msg'=>"修改失败！");
        echo JSON($result);
    }
}
function select($teachername){
    Global $database;
    $dates = $database->select("teacherinfo",[
        "id",
        "teachername",
        "password",
        "identity"
    ],[
        "teachername[~]e" => $teachername,
    ]);
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"查无结果！");
        echo JSON($result);
    }
}