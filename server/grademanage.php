<?php
/**
教师评分信息处理
 */
require '../medoo/config.php';
require 'tojson.php';
//什么处理事件
$action = isset($_POST['action']) ? $_POST['action'] : '';
//参数
$id = isset($_POST['id']) ? $_POST['id'] : '';
$class = isset($_POST['class']) ? $_POST['class'] : '';
$teachername = isset($_POST['teachername']) ? $_POST['teachername'] : '';
$studentscore= isset($_POST['studentscore']) ? $_POST['studentscore'] : '';
$coursename = isset($_POST['coursename']) ? $_POST['coursename'] : '';
$school = isset($_POST['school']) ? $_POST['school'] : '';
$teacherscore = isset($_POST['teacherscore']) ? $_POST['teacherscore'] : '';
session_start();
$teacherid = $_SESSION['teacherid'];

if($action=='showall') {
    showAll();
}
else if($action=='update') {
    update($id,$class,$teachername,$studentscore,$coursename,$school,$teacherscore,$teacherid);
}
else if($action=='delete') {
    delete($id);
}
else if($action=='add') {
    add($class,$teachername,$studentscore,$coursename,$school,$teacherscore,$teacherid);
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
    $dates = $database->select("grademanage", "*");
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"没有任何记录！");
        echo JSON($result);
    }
}
//更新记录
function update($id,$class,$teachername,$studentscore,$coursename,$school,$teacherscore,$teacherid){
    Global $database;
    $datas = $database->update("grademanage", [
        "class" => $class,
        "teachername" => $teachername,
        "teacherid"=> $teacherid,
        "studentscore" => $studentscore,
        "coursename" => $coursename,
        "school" => $school,
        "teacherscore" => $teacherscore
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
    $datas = $database->delete("grademanage", [
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
//插入记录
function add($class,$teachername,$studentscore,$coursename,$school,$teacherscore,$teacherid){
    Global $database;
    $datas = $database->insert("grademanage",[
        "class" => $class,
        "teachername" => $teachername,
        "teacherid"=> $teacherid,
        "studentscore" => $studentscore,
        "coursename" => $coursename,
        "school" => $school,
        "teacherscore" => $teacherscore
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

    $dates = $database->select("grademanage",[
        "id",
        "class",
        "teachername",
        "studentscore",
        "school",
        "teacherscore",
    ],[
        "class[~]e" =>$class,
    ]);
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"查无记录！");
        echo JSON($result);
    }
}
