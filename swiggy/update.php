<?php
session_start();

include_once "database.php";
define('tableName', 'swiggy_register');

$db = $conn;
$userData = $_POST;

update($db, $userData);

function update($db, $userData)
{
    $firstName = $userData['fn'];
    $lastName = $userData['ln'];
    $email = $userData['em'];
    $mobile = $userData['mob'];
    $address = $userData['ad'];
    $gender = $userData['gen'];
    $nationality = $userData['nat'];
    $foodmode = $userData['food'];
    $foodmodeArray = implode(",", $foodmode);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($address) && !empty($gender) && !empty($nationality) && !empty($foodmode)) {
            $user = intval($_SESSION['userId']);
            if(count($_POST)>0) {
                $query = "UPDATE " . tableName;
                $query .= " SET first_name='$firstName', last_name='$lastName', email='$email', mobile_number='$mobile', address='$address', gender='$gender', nationality='$nationality', food_mode='$foodmodeArray'";
    
                $query .= " WHERE id='$user'";
    
                $execute = $db->query($query);
                echo "saved successfully";
            }

            $sel_query = "SELECT * FROM " . tableName;
            $sel_query .= " WHERE id='$user'";
            $sel_result = $db->query($sel_query);
            if ($sel_result->num_rows > 0) {
                while ($row = $sel_result->fetch_assoc()) {
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['mobile_number'] = $row['mobile_number'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['nationality'] = $row['nationality'];
                    $_SESSION['food_mode'] = $row['food_mode'];
                    
    
                }
            }    
    }
}
