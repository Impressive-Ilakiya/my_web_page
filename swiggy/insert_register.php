<?php

include_once "database.php";
define('tableName', 'swiggy_register');

$db = $conn;
$userData = $_POST;
$email = $userData['email'];


checkEmail($db, $userData);

  
function checkEmail($db, $userData){

  $email = $userData['email'];
  $query = "SELECT email FROM swiggy_register WHERE email='$email'";
  $result = $db->query($query);
  if ($result->num_rows > 0) {

    echo "<span>This email already exists!</span>";
    
  }
  else{

    registerUser($db, $userData);
    
  }

}


function registerUser($db, $userData)
{
    $firstName = $userData['firstname'];
    $lastName = $userData['lastname'];
    $email = $userData['email'];
    $type = $userData['type']; 
    $mobile = $userData['mobile'];
    $password = $userData['password'];
    $password_en = md5($password);
    $re_enter = $userData['re_enter'];
    $address = $userData['address'];
    $gender = $userData['gender'];
    $nationality = $userData['nationality'];
    $foodmode = $userData['foodmode'];
    $foodmodeArray = implode(",", $foodmode);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($type) && !empty($mobile) && !empty($password) && !empty($re_enter) && !empty($address) && !empty($gender) && !empty($nationality) && !empty($foodmode)) {

        if ($re_enter === $password) {

            $insert_query = "INSERT INTO " . tableName;
            $insert_query .= " (first_name, last_name, email, type, mobile_number, password, address, gender, nationality, food_mode) ";
            $insert_query .= "VALUES ('$firstName', '$lastName', '$email', '$type', '$mobile', '$password_en', '$address', '$gender', '$nationality', '$foodmodeArray')";
            $insert_result = $db->query($insert_query);
        } 
    } 
}
