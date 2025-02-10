<?php
session_start();
include_once "database.php";
define('tableName', 'swiggy_foods');

$db = $conn;
$userData = $_POST;

$foodname = $userData['foodname'];
$fooddescription = $userData['fooddescription'];

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
                $foodimage = $imageurl.$targetPath ;
                
            
        }
    }else {
        echo "<span id='invalid'>***Invalid file Type***<span>";
    }
}

if (!empty($foodname) && !empty($fooddescription) && !empty($foodimage)){

    $insert_query = "INSERT INTO " . tableName;
    $insert_query .= " (food_name, food_description, food_image) ";
    $insert_query .= "VALUES ('$foodname', '$fooddescription', '$foodimage')";
    $insert_result = $db->query($insert_query);
} else {
    echo "<span id='invalid'>data Not inserted<span>";
}
