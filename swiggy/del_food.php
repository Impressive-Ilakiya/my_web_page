<?php
include_once "database.php";
define('tableName', 'swiggy_foods');

$db = $conn;
$userData = $_POST;
$foodid=$userData['foodid'];
$del_query='DELETE FROM '.tableName;
$del_query.=" WHERE id='$foodid'";
echo $del_query;
$del_result = $db->query($del_query);
echo 'deleted';