<?php
/**
 * Created by PhpStorm.
 * User: yanyi
 * Date: 2017/6/26
 * Time: 9:26
 */

require_once dirname(__FILE__).'/../config/db.php';
$mysqli = new mysqli($db['host'],$db['root'],$db['password'],$db['db_name']);
if (!$mysqli){
    die('数据库链接失败');
}

$mysqli->set_charset($db['charset']);