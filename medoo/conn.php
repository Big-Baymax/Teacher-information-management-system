<?php
require  'medoo.php';
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'teacherdb',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // 可选参数
    'port' => 3306,

    // 可选，定义表的前缀
    // 'prefix' => 'PREFIX_',

    // 连接参数扩展.
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
class conn
{
$database = new medoo();

}