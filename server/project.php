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
$class = isset($_POST['class']) ? $_POST['class'] : '';
$paper = isset($_POST['paper']) ? $_POST['paper'] : '';
$winning = isset($_POST['winning']) ? $_POST['winning'] : '';
$teachername = isset($_POST['teachername']) ? $_POST['teachername'] : '';
session_start();
$teacherid = $_SESSION['teacherid'];

if($action=='showall') {
 showAll();
}
else if($action=='update') {
 update($id,$teachername,$paper,$winning);
}
else if($action=='delete') {
 delete($id);
}
else if($action=='add') {
 add($teachername,$paper,$winning);
}
else if($action=='select'){
 select($teachername);
} else {
 $result = array("result"=>0,'msg'=>"错误请求！");
 $json = JSON($result);
 echo $json;
}

//显示全部
function showAll(){
 Global $database;
 $dates = $database->select("project", "*");
 if($dates)
 {
  echo JSON($dates);
 }else{
  $result = array("result"=>0,'msg'=>"没有任何记录！");
  echo JSON($result);
 }
}
//更新记录
function update($id,$teachername,$paper,$winning){
 Global $database;
 $datas = $database->update("project", [
     "teachername" => $teachername,
     "paper" => $paper,
     "winning" => $winning
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
 $datas = $database->delete("project", [
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
function add($teachername,$paper,$winning){
 Global $database;
 $datas = $database->insert("project",[
     "teachername" => $teachername,
     "paper" => $paper,
     "winning" => $winning
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
function select($title){
 Global $database;
 if($title==""){
  $result = array("result"=>0,'msg'=>"你没有输入要查询的信息哦！");
  echo JSON($result);
  exit;
 }
 $dates = $database->select("project",[
     "id",
     "teachername",
     "paper",
     "winning"
 ],[
     "teachername[~]e" => $title,
 ]);
 if($dates)
 {
  echo JSON($dates);
 }else{
  $result = array("result"=>0,'msg'=>"查无记录！");
  echo JSON($result);
 }
}
