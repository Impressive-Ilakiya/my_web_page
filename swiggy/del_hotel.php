<?php
include_once "database.php";
define('tableName', 'swiggy_hotels');

$db = $conn;
$userData = $_POST;
$hotelid=$userData['hotelid'];
$del_query='DELETE FROM '.tableName;
$del_query.=" WHERE id='$hotelid'";
echo $del_query;
$del_result = $db->query($del_query);
echo 'deleted';