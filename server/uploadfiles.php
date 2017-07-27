<?php
/**
论文项目信息处理
 */
require '../medoo/config.php';
require 'tojson.php';

//什么处理事件
$action = isset($_POST['action']) ? $_POST['action'] : '';

//参数
$id = isset($_POST['id']) ? $_POST['id'] : '';
$filename = isset($_POST['filename']) ? $_POST['filename'] : '';
session_start();
$teacherid = $_SESSION['teacherid'];
$teacherteachername = $_SESSION['teachername'];

if($action=='showall') {
    showAll();
}
else if($action=='delete') {
    delete($id);
}
else if($action=='select'){
    select($filename);
} else {
    $result = array("result"=>0,'msg'=>"错误请求！");
    $json = JSON($result);
    echo $json;
}

//显示全部
function showAll(){
    Global $database;
    $dates = $database->select("uploadfiles", "*");
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"没有任何记录！");
        echo JSON($result);
    }
}

//删除记录
function delete($id){
    Global $database;
    $datas = $database->delete("uploadfiles", [
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

//查询记录
function select($filename){
    Global $database;
    if($filename==""){
        $result = array("result"=>0,'msg'=>"你没有输入要查询的信息哦！");
        echo JSON($result);
        exit;
    }
    $dates = $database->select("uploadfiles",'*',[
        "filename[~]e" => $filename,
    ]);
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,"msg"=>"查无记录！");
        echo JSON($result);
    }
}
