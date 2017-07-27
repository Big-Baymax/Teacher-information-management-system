<?php
/*
教师教学信息处理
*/
require '../medoo/config.php';
require 'tojson.php';
//什么处理事件
$action = isset($_POST['action']) ? $_POST['action'] : '';
//参数
$id = isset($_POST['id']) ? $_POST['id'] : '';
$class = isset($_POST['class']) ? $_POST['class'] : '';
//$teacherid = $_SESSION['teacherid'];
//$courseid = isset($_POST['courseid']) ? $_POST['courseid'] : '';
$coursename = isset($_POST['coursename']) ? $_POST['coursename'] : '';
$orgintime = isset($_POST['orgintime']) ? $_POST['orgintime'] : '';
$overtime = isset($_POST['overtime']) ? $_POST['overtime'] : '';
$coursetime = isset($_POST['coursetime']) ? $_POST['coursetime'] : '';
session_start();
$teacherid = $_SESSION['teacherid'];
$teachername = $_SESSION['teachername'];

if($action=='showall') {
    showAll();
}
else if($action=='update') {
    update($id,$class,$coursename,$orgintime,$overtime,$coursetime,$teacherid);
}
else if($action=='delete') {
    delete($id);
}
else if($action=='add') {
   add($class,$coursename,$orgintime,$overtime,$coursetime,$teacherid);
}
else if($action=='select'){
    select($class);
} else {
    $result = array("result"=>0,'msg'=>"错误请求！");
    $json = JSON($result);
    echo $json;
}

//显示全部
function showAll(){
    Global $database;
    $dates = $database->select("studyinfo", "*");
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"没有任何记录！");
        echo JSON($result);
    }
}
//更新记录
function update($id,$class,$coursename,$orgintime,$overtime,$coursetime,$teacherid){
    Global $database;
    $datas = $database->update("studyinfo", [
        "class" => $class,
        "teacherid" => $teacherid,
        "coursename" => $coursename,
        "orgintime" => $orgintime,
        "overtime" => $overtime,
        "coursetime" => $coursetime
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
    $datas = $database->delete("studyinfo", [
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
function add($class,$coursename,$orgintime,$overtime,$coursetime,$teacherid){
    Global $database;
    $datas = $database->insert("studyinfo",[
        "class" => $class,
        "teacherid" => $teacherid,
        "coursename" => $coursename,
        "orgintime" => $orgintime,
        "overtime" => $overtime,
        "coursetime" => $coursetime
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
function select($class){
    Global $database;
    if($class==""){
        $result = array("result"=>0,'msg'=>"你没有输入要查询的信息哦！");
        echo JSON($result);
        exit;
    }
    $dates = $database->select("studyinfo",[
        "id",
        "class",
        "coursename",
        "orgintime",
        "overtime",
        "coursetime"
    ],[
        "class[~]e" => $class,
    ]);
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"查无记录！");
        echo JSON($result);
    }
}
