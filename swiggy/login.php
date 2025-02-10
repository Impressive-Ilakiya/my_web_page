<?php
include_once "database.php";
define('tableName', 'swiggy_register');

$db = $conn;
$userData = $_POST;
$email = $userData['email'];
$typecheck = '';

$typequery = "SELECT type FROM swiggy_register WHERE email = '$email'";
$typequeryresult = $db->query($typequery);

        if ($typequeryresult->num_rows > 0) {
            while ($row = $typequeryresult->fetch_assoc()) {
              $typecheck = $row['type'];
            }

          }
 

checkEmail($db, $userData);

  
function checkEmail($db, $userData){

  $email = $userData['email'];
  $query = "SELECT email FROM swiggy_register WHERE email='$email'";
  $result = $db->query($query);
  if ($result->num_rows > 0) {

    loginUser($db, $userData);
    
  }
  else{
    echo "<span>Email has not registered with us...!</span>";
  }

}

function loginUser($db, $userData)
{
    $email = $userData['email'];
    $password = $userData['password'];
    $password_en = md5($password);

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM " . tableName;
        $query .= " WHERE email = '$email' AND password = '$password_en'";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
            session_start();
            while ($row = $result->fetch_assoc()) {
                $_SESSION['userId'] = $row["id"];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['mobile_number'] = $row['mobile_number'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['nationality'] = $row['nationality'];
                $_SESSION['food_mode'] = $row['food_mode'];
               
            }
           
          
        } 
        
        else {
            echo "<span>Wrong email or password</span>";
        }

    } 
}
?>
 <input type="hidden" id="typeval" name="typeval" value="<?php echo $typecheck;?>">
