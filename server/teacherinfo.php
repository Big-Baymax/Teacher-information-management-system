<?php
/*
教师信息处理
*/
require '../medoo/config.php';
require 'tojson.php';

//什么处理事件
$action = isset($_POST['action']) ? $_POST['action'] : '';

//参数
$id = isset($_POST['id']) ? $_POST['id'] : '';
$teachername = isset($_POST['teachername']) ? $_POST['teachername'] : '';
$sex = isset($_POST['sex']) ? $_POST['sex'] : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$school = isset($_POST['school']) ? $_POST['school'] : '';
$brief = isset($_POST['brief']) ? $_POST['brief'] : '';

if($action=='showall') {
    showAll();
}
else
    if($action=='update') {
    update($id,$teachername,$sex,$birthday,$school,$brief);
}
else
    if($action=='delete') {
    delete($id);
}
else
    if($action=='add') {
    add($teachername,$sex,$birthday,$school,$brief);
}
 else
        if($action=='select'){
    select($teachername);
}
else {
    $result = array("result"=>0,'msg'=>"错误请求！");
    $json = JSON($result);
    echo $json;
}

//显示全部
function showAll(){
    Global $database;
    $dates = $database->select("teacherinfo", "*");
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"没有任何记录！");
        echo JSON($result);
    }
}
//更新记录
function update($id,$teachername,$sex,$birthday,$school,$brief){
    Global $database;
    $datas = $database->update("teacherinfo", [
        "teachername" => $teachername,
        "sex" => $sex,
        "birthday" => $birthday,
        "school" => $school,
        "brief" => $brief
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
//删除记录
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
function add($teachername,$sex,$birthday,$school,$brief){
    Global $database;
    $datas = $database->insert("teacherinfo",[
        "teachername" => $teachername,
        "sex" => $sex,
        "birthday" => $birthday,
        "school" => $school,
        "brief" => $brief
    ]);
    if($datas)
    {
        $result = array("result"=>1,'msg'=>"添加成功！");
        echo JSON($result);
    }else{
        $result = array("result"=>0,'msg'=>"添加失败！");
        echo JSON($result);
    }
}
//查询记录
function select($teachername){
    Global $database;
    if($teachername==""){
        $result = array("result"=>0,'msg'=>"你没有输入要查询的信息哦！");
        echo JSON($result);
        exit;
    }
    $dates = $database->select("teacherinfo",[
        "id",
        "teachername",
        "sex",
        "birthday",
        "school",
        "brief"
    ],[
        "teachername[~]e" => $teachername,
    ]);
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"查无记录！");
        echo JSON($result);
    }
}