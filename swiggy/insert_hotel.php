<?php
session_start();
include_once "database.php";
define('tableName', 'swiggy_hotels');

$db = $conn;
$userData = $_POST;

$hotelname = $userData['hotelname'];
$hoteladdress = $userData['hoteladdress'];
$hotelmobile = $userData['hotelmobile'];
$hotelemail = $userData['hotelemail'];
if (isset($_FILES["file"]["type"])) {
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
    ) && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } else {
            
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "uploads/" . $_FILES['file']['name']; // Target path where file is to be stored
                // move_uploaded_file($_FILES['file']['name'], $targetPath); // Moving Uploaded file
                move_uploaded_file($sourcePath, $targetPath);
               
                $imageurl = "http://t9.rifluxyss.com/trainees22/Ilakiya/swiggy/";
                // $imageurl = "http://localhost/Rifluxyss/swiggy/";
                $hotelimage = $imageurl.$targetPath ;
            
        }
    } else {
        echo "<span id='invalid'>***Invalid file Type***<span>";
    }
}

if (!empty($hotelname) && !empty($hoteladdress) && !empty($hotelmobile) && !empty($hotelemail) && !empty($hotelimage)) {
    $admin_id=$_SESSION['userId'];

    $insert_query = "INSERT INTO " . tableName;
    $insert_query .= " (name, complete_address, phone_number, email, hotel_image, admin_id) ";
    $insert_query .= "VALUES ('$hotelname', '$hoteladdress', '$hotelmobile', '$hotelemail', '$hotelimage', '$admin_id')";
   
    $insert_result = $db->query($insert_query);
} else {
    echo "<span id='invalid'>data Not inserted<span>";
}
