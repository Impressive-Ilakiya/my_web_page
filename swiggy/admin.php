<?php
session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <!-- required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- external css -->
    <link rel="stylesheet" href="./css/style.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--
  js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap js  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        /* <?php include "./css/style.css"?> */
    </style>
    <!-- external js -->
    <script src="./js/script.js"></script>

    <script type="text/javascript">
    var foodValue='<?php if ((isset($_SESSION['userId']))) { echo $_SESSION['food_mode'];}?>';
    var nationalityValue='<?php if ((isset($_SESSION['userId']))) { echo $_SESSION['nationality'];}?>';
    </script>


</head>

<body>


    <!-- main container starts -->
    <div class="container-fluid">

        <div class="row flex-nowrap">

            <!-- sidebar column (left side) -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0  footer-sec">
                <!-- swiggy logo -->

                <div class="row p-2">
                    <li>
                        <img src="./image/Swiggy_logo.svg.png" alt="swiggy logo" width="150" />
                    </li>

                </div>

                <div
                    class="row d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">

                        <!-- Hotels list -->
                        <li>
                            <button class="nav-link px-0 align-middle btn" onclick="hotel_show()">
                                <span class="ms-1 d-none d-sm-inline href_color">Hotels</span>
                            </button>
                           
                        </li>

                        <!-- foods list -->
                        <li>
                            <button class="nav-link px-0 align-middle btn" onclick="food_show()">
                                <span class="ms-1 d-none d-sm-inline href_color">Foods</span></button>
                            
                        </li>
                        <hr>
                        <!-- logout click -->
                    
                        <li class="text-decoration-none"><a href="destroy.php">Log out</a></li>
                    </ul>
                   
                        

                </div>

            </div>

            <!-- content column (right side) -->
            <div class="col">
                <!-- header -->
                <div class="row p-2 bg-swiggy">

                    <div class="col d-flex justify-content-end align-items-center">

                        <!-- admin icon -->
                         
                        <img src="./image/admin.png" data-toggle="modal" data-target="#adminprofile" class="px-0 align-bottom " width="40">

                        

                        <!-- name of admin from db -->
                        <h5 class="text-white mb-0 mx-2"><?php if(isset($_SESSION['userId'])){ echo $_SESSION['first_name']." ".$_SESSION['last_name'];} ?></h5>

                    </div>
                </div>
                <div class="row-lg my-3 d-flex justify-content-end">
                    <!-- <botton type="button" data-toggle="modal" data-target="#hotel" id="add_hotel"><i
                            class="fa-solid fa-circle-plus fa-xl head-design"></i></botton> -->
                            <botton type="button" class="btn btn-swiggy font-weight-bold mr-2" data-toggle="modal" data-target="#hotel" id="add_hotel">Add Hotels&nbsp;<i
                            class="fa fa-circle-plus fa-lg"></i></botton>
                            <botton type="button" class="btn btn-swiggy font-weight-bold" data-toggle="modal" data-target="#food" id="add_food">Add Foods&nbsp;<i
                            class="fa fa-circle-plus fa-lg"></i></botton>
                </div> 

                
                <!-- <div class="container"> -->
                

                <!-- hotels table -->
                <div class="container hotel_details">
                <?php
                    include_once "database.php";
                    define('tableName','swiggy_hotels');



                    $admin_id = $_SESSION['userId'];
                    $db = $conn;
                    $sel_query ="SELECT * FROM ".tableName;
                    $sel_query .=" WHERE admin_id='$admin_id'";
                    $result = $db->query($sel_query);
                    echo " 
                    <div class='row text-center'>

                    <div class='col-1 my-2'>
                        <h6 class='font-weight-bold'>S.No.</h6>
                        
                    </div>

                    <div class='col-2 my-2'>
                        <h6 class='font-weight-bold'>Hotel Name</h6>
                    </div>

                    <div class='col-2 my-2'>
                        <h6 class='font-weight-bold'>Location</h6>
                    </div>

                    <div class='col-2 my-2'>
                        <h6 class='font-weight-bold'>Mobile number</h6>
                    </div>

                    <div class='col-2 my-2'>
                        <h6 class='font-weight-bold'>Email</h6>
                    </div>

                    <div class='col-2 my-2'>
                        <h6 class='font-weight-bold'>Image</h6>
                    </div> 

                    <div class='col-1 my-2'>
                        <h6 class='font-weight-bold'>Action</h6>
                    </div> 

                    </div>
                    ";
                    // echo  "<div class='row text-center'>";
                    $i=1;
                    while($row = $result->fetch_assoc()){
                        $_SESSION['hotelId'] = $row['id'];
                        $hotelid = $row['id'];
                        $hotelname = $row['name'];
                        $hoteladdress = $row['complete_address'];
                        $hotelmobile = $row['phone_number'];
                        $hotelemail = $row['email'];
                        $image_src=$row['hotel_image'];

                        echo "
                        <div>
                        <div class='row text-center'>

                        <div class='col-1 pt-2 my-2'>
                            <h6>$i</h6>
                        </div>

                        <div class='col-2 pt-2 my-2'>
                            <h6>$hotelname</h6>
                        </div>

                        <div class='col-2 pt-2 my-2'>
                            <h6>$hoteladdress</h6>
                        </div>

                        <div class='col-2 pt-2 my-2'>
                            <h6>$hotelmobile</h6>
                        </div>

                        <div class='col-2 pt-2 my-2'>
                            <h6>$hotelemail</h6>
                        </div>

                        <div class='col-2 mini p-1 my-2'>
                            <img src='$image_src'/>
                        </div>

                        <div class='col-1 pt-2 my-2'>
                        <div class='row'>
                        <div class='col-6'>
                            <i class='fas fa-edit head-design' data-toggle='modal' data-target='#edit$hotelid'></i>
                        </div>
                        
                        <div class='col-6'>
                            <i class='fa-solid fa-trash head-design' data-toggle='modal' data-target='#del$hotelid'></i>
                        </div>
                        </div>
                        </div>
                        </div>
                        ";
                        echo "

                        
    

    <div>
        <div class='modal fade modal' id='edit$hotelid'>
            <div class='modal-dialog modal-dialog-scrollable'>
                <div class='modal-content p-3'>



    
                    <div class='modal-header'>
                        <div>
                            <h3 class='head-design font-weight-bold'>Hotel Details</h3>
                        </div>
                        <button type='button' class=.close d-flex justify-content-end'
                            data-dismiss='modal'>&times;</button>
                    </div>
                    
                    <div class='modal-body'>

                        <form name='hotel-edit-form' id='hotel-edit-form$hotelid' method='post' action=''>
                        <input type='hidden' name='hidden_hotelid' id='hidden_hotelid' value='$hotelid'>
                            <div class='form-group'>
                                <label for='edithotelname$hotelid'>Hotel Name</label>
                                <input type='text' id='edithotelname$hotelid' name='edithotelname$hotelid' class='form-control'
                                    placeholder='Hotel Name' value='$hotelname'>
                                <label class='error_edithotelname'>*Please enter Hotel Name</label>
                            </div>
                            <div class='form-group'>
                                <label for='edithoteladdress$hotelid'>Complete Address</label>
                                <textarea class='form-control' id='edithoteladdress$hotelid' name='edithoteladdress$hotelid' maxlength='300'
                                    placeholder='Type your address here'>$hoteladdress</textarea>
                                <label class='error_edithoteladdress'>*Please enter hotel address</label>
                            </div>
                            <div class='form-group'>
                            <label for='hotelmobile$hotelid'>Mobile number</label>
                            <input type='number' class='form-control' id='edithotelmobile$hotelid' name='edithotelmobile$hotelid'
                                placeholder='Enter mobile number' maxlength='10' value='$hotelmobile'>
                            <label class='error_edithotelmobtendigit'>*Please enter 10 digit Mobile Number</label>
                            <label class='error_edithotelmobcheck'>*Please enter valid Mobile Number</label>
                        </div>
                        <div class='form-group'>
                            <label for='edithotelemail$hotelid'>E-mail</label>
                            <input type='text' class='form-control' name='edithotelemail$hotelid' id='edithotelemail$hotelid'
                                value='$hotelemail' >
                            <label class='invalid_edithotelemail'>*Please enter valid Email</label>
                            <label class='error_editnohotelemail'>*Please enter Email</label>
                            <label class='error' id='err_email_db'></label>
                        </div>
                        <label class='form-label'>Image</label>

                        <div class='form-group preview'>
                            <img src='$image_src'>
                        </div>
                        <div class='form-group'>
                            <label class='form-label' for='edithotelimage$hotelid'>Change image</label>
                            <input type='file' name='file$hotelid' class='form-control' id='edithotelimage$hotelid'/>
                           
                        </div>
                       


                        <div class='modal-footer px-0'>
                            <div class='row flex-grow-1>
                                <div class='col-lg-6'>
                                    <button type='submit' id='edithotelsubmit' name='edithotelsubmit' value='submit' onclick='save_hotel(event,$hotelid)'
                                         class='btn btn-swiggy font-weight-bold'>Save</button>
                                </div>
                                <div class='col-lg-6 d-flex justify-content-end'>
                                    <button type='reset' class='btn btn-black reset-btn'>Reset</button>
                                </div>
                            </div>
                        </div>
                           
                        </form>

                    </div>

                </div>

            </div>
        </div>
        </div>

        <div>
        <div class='modal fade modal' id='del$hotelid'>
        <div class='modal-dialog modal-dialog-scrollable'>
        <div class='modal-content p-3'>

            <div class='modal-body'>
            <form name='hotel-del-form' id='hotel-del-form' method='POST' action=''>
            <input type='hidden' name='hidden_delhotelid' id='hidden_delhotelid' value='$hotelid'>

                <div class='form-group'>
                <h5 class='form-label'>Are you sure you want to permanently delete '$hotelname'?</h5>
                </div>

                <div class='form-group'>
                    <div class='row text-center'>
                        <div class='col'>
                            <button type='button' class='btn btn-black' data-dismiss='modal'>Cancel</button>
                        </div>
                        <div class='col'>
                            <button type='button' class='btn btn-swiggy' id='delhotel' onclick='delHotel(event)'>Delete</button>
                        </div>
                    </div>
                </div>
            </form>          
                    
            </div>
                       
                        
                        
                      
        </div>
        </div>
        >/div>
        >/div>
        </div>
        </div>


    ";
                        
                        $i++;
                        }
                        // echo "</div>";

                ?>
                </div>
                
                <!-- foods table -->
                <div class="container food_details">
                <?php
                    include_once "database.php";
                    define('foodtable','swiggy_foods');

                    $fooddb = $conn;
                    $foodsel_query ="SELECT * FROM ".foodtable;
                    $foodresult = $fooddb->query($foodsel_query);
                    echo " 
                    <div class='row text-center'>
                    <div class='col-1 my-2'>
                        <h6 class='font-weight-bold'>S.No.</h6>  
                    </div>
                    <div class='col-3 my-2'>
                        <h6 class='font-weight-bold'>Name</h6>
                    </div>
                    <div class='col-3 my-2'>
                        <h6 class='font-weight-bold'>Description</h6>
                    </div>
                    <div class='col-3 my-2'>
                        <h6 class='font-weight-bold'>Image</h6>
                    </div>
                    <div class='col-2 my-2'>
                        <h6 class='font-weight-bold'>Action</h6>
                    </div> 
                    </div>
                    ";
                    $i=1;
                    while($row = $foodresult->fetch_assoc()){
                        $foodid = $row['id'];
                        $foodname = $row['food_name'];
                        $fooddes = $row['food_description'];
                        $foodimg_src = $row['food_image'];

                        echo "
                        <div class='row text-center'>
                        <div class='col-1 pt-2 my-2'>
                            <h6>$i</h6>
                        </div>
                        <div class='col-3 pt-2 my-2'>
                            <h6>$foodname</h6>
                        </div>
                        <div class='col-3 pt-2 my-2'>
                            <h6>$fooddes</h6>
                        </div>
                        <div class='col-3 mini p-1 my-2'>
                            <img src='$foodimg_src'/>
                        </div>
                        <div class='col-2 my-2 pt-2'>
                        <div class='row'>
                        <div class='col-6'>
                        <i class='fas fa-edit head-design' data-toggle='modal' data-target='#edit$foodid'></i>
                        </div>
                        <div class='col-6'>
                            <i class='fa-solid fa-trash head-design' data-toggle='modal' data-target='#del$foodid'></i>
                        </div>
                        </div>
                        </div> 
                        </div>
                         ";

                         echo "

                        
    
                        
                         <div>
                             <p class='text-center'></p>
                             <div class='modal fade modal' id='edit$foodid'>
                                 <div class='modal-dialog modal-dialog-scrollable'>
                                     <div class='modal-content p-3'>
                     
                     

                                         <div class='modal-header'>
                                             <div>
                                                 <h3 class='head-design font-weight-bold'>Food Details</h3>
                                             </div>
                                             <button type='button' class=.close d-flex justify-content-end'
                                                 data-dismiss='modal'>&times;</button>
                                         </div>
                                         
                                         <div class='modal-body'>
                     
                                             <form name='food-edit-form$foodid' id='food-edit-form$foodid' method='POST' action=''>
                                                <input type='hidden' name='hidden_foodid' id='hidden_foodid' value='$foodid'>

                                                 <div class='form-group'>
                                                     <label for='editfoodname$foodid'>Food Name</label>
                                                     <input type='text' id='editfoodname$foodid' name='editfoodname$foodid' class='form-control'
                                                         placeholder='Food Name' value='$foodname'>
                                                     <label class='error_editfoodname'>*Please enter Food Name</label>
                                                 </div>
                                                 <div class='form-group'>
                                                     <label for='editfooddescription$foodid'>Food Description</label>
                                                     <textarea class='form-control' id='editfooddescription$foodid' name='editfooddescription$foodid' maxlength='300'
                                                         placeholder='Decribe about the food here...'>$fooddes</textarea>
                                                    
                                                 </div>
                                                 <label class='form-label'>Image</label>
                                            
                                            <div class='form-group preview'>
                                                 <img src='$foodimg_src'>
                                            </div>
                                            <div class='form-group'>
                                            <label class='form-label' for='editfoodimage$foodid'>Change image</label>
                                                 <input type='file' name='file$foodid' class='form-control' id='editfoodimage$foodid'/>
                                             </div>
                                            
                                            

                                             <div class='modal-footer px-0'>
                                                 <div class='row flex-grow-1'>
                                                     <div class='col-lg-6'>
                                                         <button type='submit' id='editfoodsubmit' name='editfoodsubmit' value='submit'
                                                             onclick='save_food(event,$foodid)' class='btn btn-swiggy font-weight-bold'>Save</button>
                                                     </div>
                                                     <div class='col-lg-6 d-flex justify-content-end'>
                                                         <button type='reset' class='btn btn-black reset-btn'>Reset</button>
                                                     </div>
                                                 </div>
                                             </div>
                                                
                                             </form>
                     
                                         </div>
                     
                                     </div>
                     
                                 </div>
                             </div>
                        </div>  

                        <div>
                        <div class='modal fade modal' id='del$foodid'>
                        <div class='modal-dialog modal-dialog-scrollable'>
                        <div class='modal-content p-3'>
                
                            <div class='modal-body'>
                            <form name='food-del-form' id='food-del-form' method='POST' action=''>
                            <input type='hidden' name='hidden_delfoodid' id='hidden_delfoodid' value='$foodid'>
                
                                <div class='form-group'>
                                <h5 class='form-label'>Are you sure you want to permanently delete '$foodname'?</h5>
                                </div>
                
                                <div class='form-group'>
                                    <div class='row text-center'>
                                        <div class='col'>
                                            <button type='button' class='btn btn-black' data-dismiss='modal'>Cancel</button>
                                        </div>
                                        <div class='col'>
                                            <button type='button' class='btn btn-swiggy' id='delfood' onclick='delFood(event)'>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>          
                                    
                            </div>
                                       
                                        
                                        
                                      
                        </div>
                        </div>
                        >/div>
                        >/div>
                        </div>
                        </div>


                         ";
                        
                        $i++;
                        }

                ?>
                </div>

                
              
                <!-- </div> -->


            </div>
        </div>
    </div>
    <div id="message"></div>




    <!-- modals section-->

    <!-- Admin profile modal -->

    <div>
        <div class="modal fade modal" id="adminprofile">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content p-3">

                    <div class="modal-header">
                        <h3 class="head-design">Admin</h3>
                        <button type="button" class="close d-flex justify-content-end"
                            data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="d-flex justify-content-center pb-4">
                            <img src="./image/admin.png" width="150">

                        </div>

                        <div class="row">
                            <div class="col">
                                <label><b>First Name</b></label>
                            </div>
                            <div class="col">
                                <div id="admin-fname">
                                    <?php echo $_SESSION['first_name']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label><b>Last Name</b></label>
                            </div>
                            <div class="col">

                                <div id="admin-lname">
                                    <?php echo $_SESSION['last_name']; ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <label><b>E-mail</b></label>
                            </div>
                            <div class="col">
                                <div id="admin-email">
                                    <?php echo $_SESSION['email']; ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <label><b>Mobile number</b></label>
                            </div>
                            <div class="col">
                                <div id="admin-mobile">
                                    <?php echo $_SESSION['mobile_number']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label><b>Gender</b></label>
                            </div>
                            <div class="col">
                                <div id="admin_gender">
                                    <?php echo $_SESSION['gender']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label><b>Address</b></label>
                            </div>
                            <div class="col">
                                <div id="admin-address">
                                    <?php echo $_SESSION['address']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label><b>Nationality</b></label>
                            </div>
                            <div class="col">
                                <div id="admin-nationality">
                                    <?php echo $_SESSION['nationality']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label><b>Food Mode</b></label>
                            </div>
                            <div class="col">
                                <div id="admin-foodmode">
                                    <?php echo $_SESSION['food_mode']; ?>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-swiggy font-weight-bold" id="admin-edit-id" data-toggle="modal"
                            data-target="#editadminprofile">Edit</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- //edit profile modAL -->
    <div>
        <p class="text-center" id="msg"></p>
        <div class="modal fade modal" id="editadminprofile">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content p-3">



                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div id="signup-head">
                            <h3 class="head-design font-weight-bold">Edit Information</h3>
                        </div>
                        <button type="button" class="close d-flex justify-content-end"
                            data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <form name="edit-form" id="edit-form" method="post" action="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="edit_firstname">First Name</label>
                                        <input type="text" id="edit_firstname" name="firstname" class="form-control"
                                            value="<?php echo $_SESSION['first_name']; ?>" placeholder="First Name">
                                        <label class="error_fname">*Please enter First Name</label>
                                    </div>
                                    <div class="col">
                                        <label for="edit_lastname">Last Name</label>
                                        <input type="text" id="edit_lastname" name="lastname" class="form-control"
                                            value="<?php echo $_SESSION['last_name']; ?>" placeholder="Last Name">
                                        <label class="error_lname">*Please enter Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_email">E-mail</label>
                                <input type="text" class="form-control" name="email"
                                    value="<?php echo $_SESSION['email']; ?>" id="edit_email"
                                    aria-describedby="userHelp" placeholder="Enter email">
                                <label class="invalid_email">*Please enter valid Email</label>
                                <label class="error_noemail">*Please enter Email</label>
                            </div>
                            <div class="form-group">
                                <label for="edit_mobile">Mobile number</label>
                                <input type="number" class="form-control" id="edit_mobile" name="mobile"
                                    value="<?php echo $_SESSION['mobile_number']; ?>" placeholder="Enter mobile number"
                                    maxlength="10">
                                <label class="error_mobtendigit">*Please enter 10 digit Mobile Number</label>
                                <label class="error_mobcheck">*Please enter valid Mobile Number</label>
                            </div>
                            <div class="form-group">
                                <div class="foodchk">
                                    <fieldset id="edit_gender">
                                        <span class="pr-3">Gender:</span>

                                        <input type="radio" name="edit_gender" id="edit_female" value="Female" <?php if($_SESSION['gender']=='Female'){echo "checked";}?>>&nbsp;
                                        Female
                                        <input type="radio" name="edit_gender" id="edit_male" value="Male" <?php if($_SESSION['gender']=='Male'){echo "checked";}?>>&nbsp; Male
                                        <input type="radio" name="edit_gender" id="edit_other" value="Other" <?php if($_SESSION['gender']=='Other'){echo "checked";}?>>&nbsp;
                                        Other
                                    </fieldset>
                                    <label class="error_gender">*Please choose gender</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edit_address">Address</label>
                                <textarea class="form-control" id="edit_address" name="address" maxlength="300"
                                    placeholder="Type your address here"><?php echo $_SESSION['address']; ?> </textarea>
                                <label class="error_address">*Please enter address</label>
                            </div>
                            <div class="form-group">
                                <span class="pr-4">Nationality:</span>
                                <select class="form-select" id="edit_nationality" name="admin_edit_nationality">
                                    <option value="" >-- select one --</option>
                                    <option value="afghan">Afghan</option>
                                    <option value="albanian">Albanian</option>
                                    <option value="algerian">Algerian</option>
                                    <option value="american">American</option>
                                    <option value="andorran">Andorran</option>
                                    <option value="angolan">Angolan</option>
                                    <option value="antiguans">Antiguans</option>
                                    <option value="argentinean">Argentinean</option>
                                    <option value="armenian">Armenian</option>
                                    <option value="australian">Australian</option>
                                    <option value="austrian">Austrian</option>
                                    <option value="azerbaijani">Azerbaijani</option>
                                    <option value="bahamian">Bahamian</option>
                                    <option value="bahraini">Bahraini</option>
                                    <option value="bangladeshi">Bangladeshi</option>
                                    <option value="barbadian">Barbadian</option>
                                    <option value="barbudans">Barbudans</option>
                                    <option value="batswana">Batswana</option>
                                    <option value="belarusian">Belarusian</option>
                                    <option value="belgian">Belgian</option>
                                    <option value="belizean">Belizean</option>
                                    <option value="beninese">Beninese</option>
                                    <option value="bhutanese">Bhutanese</option>
                                    <option value="bolivian">Bolivian</option>
                                    <option value="bosnian">Bosnian</option>
                                    <option value="brazilian">Brazilian</option>
                                    <option value="british">British</option>
                                    <option value="bruneian">Bruneian</option>
                                    <option value="bulgarian">Bulgarian</option>
                                    <option value="burkinabe">Burkinabe</option>
                                    <option value="burmese">Burmese</option>
                                    <option value="burundian">Burundian</option>
                                    <option value="cambodian">Cambodian</option>
                                    <option value="cameroonian">Cameroonian</option>
                                    <option value="canadian">Canadian</option>
                                    <option value="cape verdean">Cape Verdean</option>
                                    <option value="central african">Central African</option>
                                    <option value="chadian">Chadian</option>
                                    <option value="chilean">Chilean</option>
                                    <option value="chinese">Chinese</option>
                                    <option value="colombian">Colombian</option>
                                    <option value="comoran">Comoran</option>
                                    <option value="congolese">Congolese</option>
                                    <option value="costa rican">Costa Rican</option>
                                    <option value="croatian">Croatian</option>
                                    <option value="cuban">Cuban</option>
                                    <option value="cypriot">Cypriot</option>
                                    <option value="czech">Czech</option>
                                    <option value="danish">Danish</option>
                                    <option value="djibouti">Djibouti</option>
                                    <option value="dominican">Dominican</option>
                                    <option value="dutch">Dutch</option>
                                    <option value="east timorese">East Timorese</option>
                                    <option value="ecuadorean">Ecuadorean</option>
                                    <option value="egyptian">Egyptian</option>
                                    <option value="emirian">Emirian</option>
                                    <option value="equatorial guinean">Equatorial Guinean</option>
                                    <option value="eritrean">Eritrean</option>
                                    <option value="estonian">Estonian</option>
                                    <option value="ethiopian">Ethiopian</option>
                                    <option value="fijian">Fijian</option>
                                    <option value="filipino">Filipino</option>
                                    <option value="finnish">Finnish</option>
                                    <option value="french">French</option>
                                    <option value="gabonese">Gabonese</option>
                                    <option value="gambian">Gambian</option>
                                    <option value="georgian">Georgian</option>
                                    <option value="german">German</option>
                                    <option value="ghanaian">Ghanaian</option>
                                    <option value="greek">Greek</option>
                                    <option value="grenadian">Grenadian</option>
                                    <option value="guatemalan">Guatemalan</option>
                                    <option value="guinea-bissauan">Guinea-Bissauan</option>
                                    <option value="guinean">Guinean</option>
                                    <option value="guyanese">Guyanese</option>
                                    <option value="haitian">Haitian</option>
                                    <option value="herzegovinian">Herzegovinian</option>
                                    <option value="honduran">Honduran</option>
                                    <option value="hungarian">Hungarian</option>
                                    <option value="icelander">Icelander</option>
                                    <option value="indian">Indian</option>
                                    <option value="indonesian">Indonesian</option>
                                    <option value="iranian">Iranian</option>
                                    <option value="iraqi">Iraqi</option>
                                    <option value="irish">Irish</option>
                                    <option value="israeli">Israeli</option>
                                    <option value="italian">Italian</option>
                                    <option value="ivorian">Ivorian</option>
                                    <option value="jamaican">Jamaican</option>
                                    <option value="japanese">Japanese</option>
                                    <option value="jordanian">Jordanian</option>
                                    <option value="kazakhstani">Kazakhstani</option>
                                    <option value="kenyan">Kenyan</option>
                                    <option value="kittian and nevisian">Kittian and Nevisian</option>
                                    <option value="kuwaiti">Kuwaiti</option>
                                    <option value="kyrgyz">Kyrgyz</option>
                                    <option value="laotian">Laotian</option>
                                    <option value="latvian">Latvian</option>
                                    <option value="lebanese">Lebanese</option>
                                    <option value="liberian">Liberian</option>
                                    <option value="libyan">Libyan</option>
                                    <option value="liechtensteiner">Liechtensteiner</option>
                                    <option value="lithuanian">Lithuanian</option>
                                    <option value="luxembourger">Luxembourger</option>
                                    <option value="macedonian">Macedonian</option>
                                    <option value="malagasy">Malagasy</option>
                                    <option value="malawian">Malawian</option>
                                    <option value="malaysian">Malaysian</option>
                                    <option value="maldivan">Maldivan</option>
                                    <option value="malian">Malian</option>
                                    <option value="maltese">Maltese</option>
                                    <option value="marshallese">Marshallese</option>
                                    <option value="mauritanian">Mauritanian</option>
                                    <option value="mauritian">Mauritian</option>
                                    <option value="mexican">Mexican</option>
                                    <option value="micronesian">Micronesian</option>
                                    <option value="moldovan">Moldovan</option>
                                    <option value="monacan">Monacan</option>
                                    <option value="mongolian">Mongolian</option>
                                    <option value="moroccan">Moroccan</option>
                                    <option value="mosotho">Mosotho</option>
                                    <option value="motswana">Motswana</option>
                                    <option value="mozambican">Mozambican</option>
                                    <option value="namibian">Namibian</option>
                                    <option value="nauruan">Nauruan</option>
                                    <option value="nepalese">Nepalese</option>
                                    <option value="new zealander">New Zealander</option>
                                    <option value="ni-vanuatu">Ni-Vanuatu</option>
                                    <option value="nicaraguan">Nicaraguan</option>
                                    <option value="nigerien">Nigerien</option>
                                    <option value="north korean">North Korean</option>
                                    <option value="northern irish">Northern Irish</option>
                                    <option value="norwegian">Norwegian</option>
                                    <option value="omani">Omani</option>
                                    <option value="pakistani">Pakistani</option>
                                    <option value="palauan">Palauan</option>
                                    <option value="panamanian">Panamanian</option>
                                    <option value="papua new guinean">Papua New Guinean</option>
                                    <option value="paraguayan">Paraguayan</option>
                                    <option value="peruvian">Peruvian</option>
                                    <option value="polish">Polish</option>
                                    <option value="portuguese">Portuguese</option>
                                    <option value="qatari">Qatari</option>
                                    <option value="romanian">Romanian</option>
                                    <option value="russian">Russian</option>
                                    <option value="rwandan">Rwandan</option>
                                    <option value="saint lucian">Saint Lucian</option>
                                    <option value="salvadoran">Salvadoran</option>
                                    <option value="samoan">Samoan</option>
                                    <option value="san marinese">San Marinese</option>
                                    <option value="sao tomean">Sao Tomean</option>
                                    <option value="saudi">Saudi</option>
                                    <option value="scottish">Scottish</option>
                                    <option value="senegalese">Senegalese</option>
                                    <option value="serbian">Serbian</option>
                                    <option value="seychellois">Seychellois</option>
                                    <option value="sierra leonean">Sierra Leonean</option>
                                    <option value="singaporean">Singaporean</option>
                                    <option value="slovakian">Slovakian</option>
                                    <option value="slovenian">Slovenian</option>
                                    <option value="solomon islander">Solomon Islander</option>
                                    <option value="somali">Somali</option>
                                    <option value="south african">South African</option>
                                    <option value="south korean">South Korean</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="sri lankan">Sri Lankan</option>
                                    <option value="sudanese">Sudanese</option>
                                    <option value="surinamer">Surinamer</option>
                                    <option value="swazi">Swazi</option>
                                    <option value="swedish">Swedish</option>
                                    <option value="swiss">Swiss</option>
                                    <option value="syrian">Syrian</option>
                                    <option value="taiwanese">Taiwanese</option>
                                    <option value="tajik">Tajik</option>
                                    <option value="tanzanian">Tanzanian</option>
                                    <option value="thai">Thai</option>
                                    <option value="togolese">Togolese</option>
                                    <option value="tongan">Tongan</option>
                                    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                    <option value="tunisian">Tunisian</option>
                                    <option value="turkish">Turkish</option>
                                    <option value="tuvaluan">Tuvaluan</option>
                                    <option value="ugandan">Ugandan</option>
                                    <option value="ukrainian">Ukrainian</option>
                                    <option value="uruguayan">Uruguayan</option>
                                    <option value="uzbekistani">Uzbekistani</option>
                                    <option value="venezuelan">Venezuelan</option>
                                    <option value="vietnamese">Vietnamese</option>
                                    <option value="welsh">Welsh</option>
                                    <option value="yemenite">Yemenite</option>
                                    <option value="zambian">Zambian</option>
                                    <option value="zimbabwean">Zimbabwean</option>

                                </select>
                            </div>
                            <label class="error_nationality">*Please enter nationality</label>
                            <div class="form-group d-flex">
                                <span class="pr-4">Food mode:</span>
                                <div class="form-check pr-2">
                                    <input type="checkbox" class="form-check-input" id="edit_veg" name="edit_food"
                                        value="Veg" <?php if($_SESSION['food_mode']=='Veg'){echo "checked";}?>>
                                    <label class="form-check-label" for="veg">Veg</label>   
                                </div>
                                <div class="form-check pr-2">
                                    <input type="checkbox" class="form-check-input" id="edit_non-veg" name="edit_food"
                                        value="Non-Veg" <?php if($_SESSION['food_mode']=='Non-Veg'){echo "checked";}?>>
                                    <label class="form-check-label" for="non-veg">Non-Veg</label>
                                </div>
                                <div class="form-check pr-2">
                                    <input type="checkbox" class="form-check-input" id="edit_both" name="edit_food"
                                        value="Both" <?php if($_SESSION['food_mode']=='Both'){echo "checked";}?>>
                                    <label class="form-check-label" for="both">Both</label>
                                </div>

                            </div>
                            <label class="error_foodmode">*Please enter food mode</label>
                            <div class="modal-footer px-0">
                                <div class="row flex-grow-1">
                                    <div class="col-lg-6">
                                        <button type="submit" id="save_btn" onclick="save(event)"
                                            class="btn btn-swiggy font-weight-bold">Save changes</button>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                    <button type='reset' class='btn btn-black reset-btn'>Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- hotel modal -->
    <div>
        <p class="text-center"></p>
        <div class="modal fade modal" id="hotel">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content p-3">



                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div id="signup-head">
                            <h3 class="head-design font-weight-bold">Hotel Details</h3>
                        </div>
                        <button type="button" class="close d-flex justify-content-end"
                            data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <form name="hotel-form" id="hotel-form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="hotelname">Hotel Name</label>
                                <input type="text" id="hotelname" name="hotelname" class="form-control"
                                    placeholder="Hotel Name">
                                <label class="error_hotelname">*Please enter Hotel Name</label>
                            </div>
                            <div class="form-group">
                                <label for="hoteladdress">Complete Address</label>
                                <textarea class="form-control" id="hoteladdress" name="hoteladdress" maxlength="300"
                                    placeholder="Type your address here"></textarea>
                                <label class="error_hoteladdress">*Please enter hotel address</label>
                            </div>
                            <div class="form-group">
                                <label for="hotelmobile">Mobile number</label>
                                <input type="number" class="form-control" id="hotelmobile" name="hotelmobile"
                                    placeholder="Enter mobile number" maxlength="10">
                                <label class="error_hotelmobtendigit">*Please enter 10 digit Mobile Number</label>
                                <label class="error_hotelmobcheck">*Please enter valid Mobile Number</label>
                            </div>
                            <div class="form-group">
                                <label for="hotelemail">E-mail</label>
                                <input type="text" class="form-control" name="hotelemail" id="hotelemail"
                                    aria-describedby="userHelp" placeholder="Enter email">
                                <label class="invalid_hotelemail">*Please enter valid Email</label>
                                <label class="error_nohotelemail">*Please enter Email</label>
                                <label class="error" id="err_email_db"></label>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="hotelimage">Image</label>
                                <input type="file" name="file" class="form-control" id="hotelimage" />
                                
                                <label class="error_hotelimage">*Please upload an image</label>
                            </div>
                           
                            



                            <div class="modal-footer px-0">
                                <div class="row flex-grow-1">
                                    <div class="col-lg-6">
                                        <button type="submit" id="hotelsubmit" name="hotelsubmit" value="submit"
                                        onclick="hotelVal(event)"
                                            class="btn btn-swiggy font-weight-bold">Add</button>
                                            <!-- onclick="hotelVal(event)" -->
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                        <button type='reset' class='btn btn-black reset-btn'>Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>



   


    <!-- food modal -->

    <div>
        <p class="text-center"></p>
        <div class="modal fade modal" id="food">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content p-3">



                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div id="food-head">
                            <h3 class="head-design font-weight-bold">Food Details</h3>
                        </div>
                        <button type="button" class="close d-flex justify-content-end"
                            data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <form name="food-form" id="food-form" method="post" action="">
                            <div class="form-group">
                                <label for="foodname">Food Name</label>
                                <input type="text" id="foodname" name="foodname" class="form-control"
                                    placeholder="Food Name">
                                <label class="error_foodname">*Please enter Food Name</label>
                            </div>
                            <div class="form-group">
                                <label for="fooddescription">Description</label>
                                <textarea class="form-control" id="fooddescription" name="fooddescription" maxlength="300"
                                   ></textarea>
                                <label class="error_fooddescription">*Please enter food description</label>
                            </div>
                           
                            <div class="form-group">
                                <label class="form-label" for="foodimage">Image</label>
                                <input type="file" name="file" class="form-control" id="foodimage" />
                                <label class="error_foodimage">*Please upload an image</label>
                            </div>

                            <div class="modal-footer px-0">
                                <div class="row flex-grow-1">
                                    <div class="col-lg-6">
                                        <button type="submit" id="foodsubmit" name="foodsubmit" value="submit"
                                            onclick="foodVal(event)" class="btn btn-swiggy font-weight-bold">Add</button>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                        <button type='reset' class='btn btn-black reset-btn'>Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- edit food modal -->


</body>
</html.