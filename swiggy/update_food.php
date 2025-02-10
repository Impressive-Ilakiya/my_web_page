<?php
session_start();
include_once "database.php";
define('tableName', 'swiggy_foods');

$db = $conn;
$userData = $_POST;

$foodid = $userData['foodid'];
$foodname = $userData['editfoodname'.$foodid];
$fooddescription = $userData['editfooddescription'.$foodid];
if ($_FILES["file".$foodid]["name"] == "") {

    if(count($_POST)>0) {
            $query = "UPDATE " . tableName;
            $query .= " SET food_name='$foodname', food_description='$fooddescription'";
    
            $query .= " WHERE id='$foodid'";
    
            $execute = $db->query($query);
            echo "saved successfully";
            
        }
        
}else{
   
    $targetDirectory = "uploads/";

    // Create the target directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
    $targetFileName = $targetDirectory . basename($_FILES["file".$foodid]["name"]);
        if (move_uploaded_file($_FILES["file".$foodid]["tmp_name"], $targetFileName)) {
            $imageurl = "http://t9.rifluxyss.com/trainees22/Ilakiya/swiggy/$targetFileName";

            if(count($_POST)>0) {
                $query = "UPDATE " . tableName;
                $query .= " SET food_name='$foodname', food_description='$fooddescription', food_image='$foodimage'";
        
                $query .= " WHERE id='$foodid'";
        
                $execute = $db->query($query);
                echo "saved successfully";
                
            }
        } 
        else {
                
            echo "<span id='invalid'>data Not inserted<span>";
            
        }  
}
 