<?php
/**
 * Created by PhpStorm.
 * User: yanyi
 * Date: 2017/6/26
 * Time: 9:19
 */
require_once 'system/db_connect.php';
require_once 'Embed/autoloader.php';
use Embed\Embed;
header('content-type:text/html;charset=utf-8');

$query = "select sour_id,github_url from br_crawler2 b where is_cover=0 limit 500";
$cour = $mysqli->query($query);

while ($row = $cour->fetch_assoc()){
    echo $row['sour_id']."\n";
    $query = "update br_crawler2 set is_cover=1 where sour_id='{$row['sour_id']}'";
    $mysqli->query($query);
    $info = Embed::create($row['github_url'],['choose_bigger_image' => true]);
    if($info->image){
        $query = "update br_crawler2 set is_cover=1,github_cover='{$info->image}' where sour_id='{$row['sour_id']}'";
        $mysqli->query($query);
    }else{
        echo 'no image'."\n";
    }

    echo '============='."\n";
}

?>

