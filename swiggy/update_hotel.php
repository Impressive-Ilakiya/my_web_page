<?php
session_start();
include_once "database.php";
define('tableName', 'swiggy_hotels');

$db = $conn;
$userData = $_POST;

$hotelid = $userData['hotelid'];
$hotelname = $userData['edithotelname'.$hotelid];
$hoteladdress = $userData['edithoteladdress'.$hotelid];
$hotelmobile = $userData['edithotelmobile'.$hotelid];
$hotelemail = $userData['edithotelemail'.$hotelid];
if ($_FILES["file".$hotelid]["name"] == "") {
    if(count($_POST)>0) {
        $query = "UPDATE " . tableName;
        $query .= " SET name='$hotelname', complete_address='$hoteladdress', phone_number='$hotelmobile', email='$hotelemail'";

        $query .= " WHERE id='$hotelid'";
        echo $query;
        $execute = $db->query($query);
        echo "saved successfully";
    }
        
}else{
   
    $targetDirectory = "uploads/";

    // Create the target directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
    $targetFileName = $targetDirectory . basename($_FILES["file".$hotelid]["name"]);
        if (move_uploaded_file($_FILES["file".$hotelid]["tmp_name"], $targetFileName)) {
            $imageurl = "http://t9.rifluxyss.com/trainees22/Ilakiya/swiggy/$targetFileName";

                    if(count($_POST)>0) {
                        $query = "UPDATE " . tableName;
                        $query .= " SET name='$hotelname', complete_address='$hoteladdress', phone_number='$hotelmobile', email='$hotelemail', hotel_image='$imageurl'";
                
                        $query .= " WHERE id='$hotelid'";
                        echo $query;
                        $execute = $db->query($query);
                        echo "saved successfully";
                        
                    }
        } 
        else {
                
            echo "<span id='invalid'>data Not inserted<span>";
            
        }  
}
           
        
        
    


