<?php
/**
公告信息处理
 */
require '../medoo/config.php';
require 'tojson.php';

//什么处理事件
$action = isset($_POST['action']) ? $_POST['action'] : '';
//参数
$id = isset($_POST['id']) ? $_POST['id'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
//$courseid = isset($_POST['courseid']) ? $_POST['courseid'] : '';
$noticetext = isset($_POST['noticetext']) ? $_POST['noticetext'] : '';
session_start();
$teacherid = $_SESSION['teacherid'];
$teachername = $_SESSION['teachername'];
if($action=='showall') {
    showAll();
}
else if($action=='update') {
    update($id,$title,$noticetext,$teacherid,$teachername);
}
else if($action=='delete') {
    delete($id);
}
else if($action=='add') {
    add($title,$noticetext,$teacherid,$teachername);
}
else if($action=='select'){
    select($title);
} else {
    $result = array("result"=>0,'msg'=>"错误请求！");
    $json = JSON($result);
    echo $json;
}
//显示全部
function showAll(){
    Global $database;
    $dates = $database->select("notice", "*");
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"没有任何记录！");
        echo JSON($result);
    }
}
//更新记录
function update($id,$title,$noticetext,$teacherid,$teachername){
    Global $database;
    $time = time();
    date("y-m-d h:i:s",$time);
    $datas = $database->update("notice", [
        "title" => $title,
        "noticetext" => $noticetext,
        "author" => $teachername,
        "authorid" => $teacherid,
        "noticetime" => $time
    ],[
        "id"=> $id
    ]);
    if($datas)
    {
        $result = array("result"=>1,'msg'=>"修改成功！");
        $notice = $database->select("notice",[
            "noticetext",
            "noticetime"
        ],["ORDER" => ["noticetime" => "DESC"]]);
        $_SESSION['noticetime']=$notice[0]['noticetime'];
        $_SESSION['notice']=$notice[0]['noticetext'];
        echo JSON($result);
    }else{
        $result = array("result"=>0,'msg'=>"修改失败！");
        echo JSON($result);
    }
}
//删除记录
function delete($id){
    Global $database;
    $datas = $database->delete("notice", [
        "id" => $id
    ]);
    if($datas)
    {
        $result = array("result"=>1,'msg'=>"删除成功！");
        $notice = $database->select("notice",[
            "noticetext",
            "noticetime"
        ],["ORDER" => ["noticetime" => "DESC"]]);
        $_SESSION['noticetime']=$notice[0]['noticetime'];
        $_SESSION['notice']=$notice[0]['noticetext'];
        echo JSON($result);
    }else{
        $result = array("result"=>0,'msg'=>"删除失败！");
        echo JSON($result);
    }

}
//插入记录
function add($title,$noticetext,$teacherid,$teachername){//前端传来的参数
    Global $database;//创建数据库操作对象
    $time=date("Y").date("m").date("d").date("H").date("i").date("s");//获取当前时间

    $datas = $database->insert("notice",[
        "title" => $title,
        "noticetext" => $noticetext,
        "author" => $teachername,
        "authorid" => $teacherid,
        "noticetime" => $time
    ]);//写入数据库

    if($datas)//判断是否操作成功
    {
        $result = array("result"=>1,'msg'=>"添加成功！");//写入返回前端的json

        //公告添加成功的时候刷新再session
        $notice = $database->select("notice",[
            "noticetext",
            "noticetime"
        ],["ORDER" => ["noticetime" => "DESC"]]);//获取最新的公告（排序按照DESC时间顺序）

        $_SESSION['noticetime']=$notice[0]['noticetime'];//把公告时间写入session

        $_SESSION['notice']=$notice[0]['noticetext'];//把公告内容写入session
        echo JSON($result);
    }else{
        $result = array("result"=>0,'msg'=>"添加失败！");//写入返回前端的json
        echo JSON($result);
    }
}
//查询记录
function select($title){
    Global $database;
    $dates = $database->select("notice",[
        "id",
        "title",
        "noticetext"
    ],[
        "title[~]e" => $title,
    ]);
    if($dates)
    {
        echo JSON($dates);
    }else{
        $result = array("result"=>0,'msg'=>"查无记录！");
        echo JSON($result);
    }
}