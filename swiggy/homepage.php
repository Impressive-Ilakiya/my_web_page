<?php
session_start();
// session_destroy();
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
    <?php include "./css/style.css"?>
  </style>
  <!-- external js -->
  <script src="./js/script.js"></script>
  
  <script type="text/javascript">
    var genValue='<?php if ((isset($_SESSION['userId']))) { echo $_SESSION['gender'];}?>';
    var foodValue='<?php if ((isset($_SESSION['userId']))) { echo $_SESSION['food_mode'];}?>';
    var nationalityValue='<?php if ((isset($_SESSION['userId']))) { echo $_SESSION['nationality'];}?>';

  </script>

</head>

<body>
  <!-- main container starts -->
  <div class="container">
    <!-- section 1 -->
    <div class="row">
      <!-- section 1 left -->
      <div class="col-lg-6 pt-5 pb-0 px-0">
        <!-- 1st row -->
        <div class="row align-items-center py-3">
          <!-- col 1 swiggy logo -->
          <div class="col-lg-6 swiggy-logo-img">
            <img src="./image/Swiggy_logo.svg.png" alt="swiggy logo" />
          </div>
          <!-- col 2 login button -->
          <div class="col-lg-6">
            <div class="d-flex justify-content-end">
              <!-- <h2><?php // echo $_SESSION['userId'] ?> dsbfjhsdbfhjsd</h2> -->
            <?php if (!isset($_SESSION['userId'])) {?>
              <button type="button" data-toggle="modal" data-target="#login" id="loginbtn"
                class="btn btn-link mr-4 text-decoration-none text-dark font-weight-bold login-btn">
                Login
              </button>

              <button type="button" data-toggle="modal" data-target="#signup" id="signupbtn"
                class="btn-black font-weight-bold px-4 login-btn">Sign up</button>
              <?php } else if ((isset($_SESSION['userId'])) && $_SESSION['type'] == "User") {?>
              <div class="pl-3" id="profilebtn">
                <img src="./image/user.png" width="50" id="profileclick">
                <ul class="profile_dropdown p-0">
                  <li class="p-1 btn" data-toggle="modal" data-target="#profile">My profile</li>
                  <li class="p-1 btn">Orders</li>
                  <li class="p-1 btn"><a href="destroy.php">Logout</a></li>
                </ul>
              </div>
              <?php }?>
            </div>
          </div>
        </div>

        <!-- 2nd row -->
        <div class="row flex-column pl-3 pt-4">
          <h2 class="font-weight-medium h1">Food Marathon</h2>
          <h5 class="font-weight-medium text-secondary">

            Order your from favorite restaurants near you
          </h5>
        </div>

        <!-- 3rd row -->
        <div class="row pt-4">
          <!-- col 1 offer image -->
          <div class="col-lg-12 swiggy-offer-img">

            <img class="object-fit-cover" src="./image/offer.png" alt="swiggy offer" />
            </a>
          </div>
          <!-- col 2 location menu -->
          <div class="col-lg-12 d-flex pt-4">
            <select class="select btn-black box p-1">
              <option value="1">Current Location</option>
              <option value="2">Choose Location</option>
              <option value="3">Other</option>
            </select>

          </div>
        </div>

        <!-- 4th row  -->
        <div class="row py-3 pl-3 flex-column">
          <p class="text-secondary">POPULAR CITIES IN INDIA</p>
          <div class="d-flex items">
            <a class="text-dark px-1 font-weight-bold text-decoration-none" href="#">Chennai</a>
            <a class="text-secondary px-1 font-weight-bold text-decoration-none" href="#">Bengalurui</a>
            <a class="text-dark px-1 font-weight-bold text-decoration-none" href="#">Pondicherry</a>
            <a class="text-secondary px-1 font-weight-bold text-decoration-none" href="#">Trichy</a>
          </div>
        </div>
      </div>

      <!-- section 1 right -->
      <div class="col-lg-6 sec1-bg">&nbsp</div>
    </div>
  </div>

  <!-- section 3 -->
  <div class="section3">
    <div class="container">

      <!-- row 1  -->
      <div class="row sec4 py-5 ">
        <!-- column1 -->
        <div class="col-lg-4  d-flex flex-column text-white align-items-center justify-content-center ">
          <img class="pb-4" src="./image/no-minimum-order.jpg" alt="min Order">
          <h4 class="font-weight-bold">No Minimum Order</h4>
          <p class="text-center">Order in for yourself or for the group, with no restrictions on order value</p>
        </div>
        <!-- column 2 -->
        <div class="col-lg-4  d-flex flex-column text-white align-items-center justify-content-center">
          <img class="pb-4" src="./image/live-order-tracking.jpg" alt="delivery trackng">
          <h4 class="font-weight-bold">Live Order Tracking</h4>
          <p class="text-center">Know where your order is at all times, from the restaurant to your doorstep</p>
        </div>
        <!-- column 3 -->
        <div class="col-lg-4  d-flex flex-column text-white align-items-center justify-content-center">
          <img class="pb-4" src="./image/bike-delivery.jpg" alt="bike delivery">
          <h4 class="font-weight-bold">Lightning-fast delivery</h4>
          <p class="text-center">Experience Swiggy's superfast delivery for food delivered fresh & on time</p>
        </div>
      </div>
      <h2 class="text-center text-white font-weight-bold">Choose your favorite variety</h2>
      <!-- row 2 -->
      <div class="row sec4 py-5 ">

        <!-- column1 -->
        <div class="col-lg-4  d-flex flex-column text-white align-items-center justify-content-center ">
          <img class="pb-4" src="./image/veg.jpeg" alt="min Order">
          <h4 class="font-weight-bold">Veg World...</h4>
        </div>
        <!-- column 2 -->
        <div class="col-lg-4  d-flex flex-column text-white align-items-center justify-content-center">
          <img class="pb-4" src="./image/NON-VEG.jpeg" alt="delivery trackng">
          <h4 class="font-weight-bold">It's your Non-Veggy...</h4>
        </div>
        <!-- column 3 -->
        <div class="col-lg-4  d-flex flex-column text-white align-items-center justify-content-center">
          <img class="pb-4" src="./image/snacks.jpg" alt="bike delivery">
          <h4 class="font-weight-bold">Pick your snacky...</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- footer section -->
  <footer class="text-center text-white footer-sec">
    <!-- footer container-->
    <div class="container ">

      <!-- row -->
      <div class="row align-items-center">

        <!-- colum1 swiggy icon -->
        <div class="col-lg-4 col-md-6 d-flex mt-2 justify-content-center footer-logo">

          <img src="./image/swiggy-icon.png" class="img-fluid mr-3" alt="swiggy icon">
          <p class="mt-1 font-weight-bold">SWIGGY</p>
        </div>

        <!-- column2 copyright -->
        <div class="col-lg-4 col-md-6 mt-2">
          <p>&copy; 2023 Swiggy</p>
        </div>

        <!-- column3 social media -->
        <div class="col-lg-4 col-md-6 ">

          <div class="row">
            <div class="col-lg-3">
              <a href="#" class="fa fa-facebook fa-lg text-white text-decoration-none"></a>
            </div>
            <div class="col-lg-3">
              <a href="#" class="fa fa-pinterest fa-lg text-white text-decoration-none"></a>
            </div>
            <div class="col-lg-3">
              <a href="#" class="fa fa-instagram fa-lg text-white text-decoration-none"></a>
            </div>
            <div class="col-lg-3">
              <a href="#" class="fa fa-twitter fa-lg text-white text-decoration-none"></a>
            </div>

          </div>


        </div>
      </div>
    </div>

  </footer>

  <!-- login modal -->
  <div>
    <div class="modal fade" id="login">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-header">
            <h3 class="head-design font-weight-bold">Login</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="login-form" method="post">
              <div class="form-group">
                <label for="email-login">Email</label>
                <input type="text" class="form-control" id="email-login" aria-describedby="userHelp"
                  placeholder="Enter email">
                <label class="error_loginemailempty">*Please enter email</label>
                <label class="error_loginemail">*Please enter valid email</label>
                <label class="error" id ="emailStatus"></label>
              </div>
              <div class="form-group">
                <label for="password-login">Password</label>
                <div class="input-group" id="login_show_hide_password">
                  <input type="password" class="form-control" id="password-login" placeholder="Password">
                  <a href=""><i class="fa fa-eye-slash pl-2" aria-hidden="true"></i></a>
                </div>
                <label class="error_loginpass">*Incorrect password</label>
                <label class="error_loginpasswordempty">*Please enter password</label>
              </div>
             
              <div class="row">
                <div class="col-lg-6">
                  <button type="submit" class="btn btn-swiggy font-weight-bold" id="login-id"
                    onclick="loginVal(event)">Login</button>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                  <a href="#">Forgot Password?</a>
                </div>
              </div>

            </form>

          </div>




        </div>
      </div>
    </div>
  </div>




  <!-- sign up modal -->
  <div>
  <p class="text-center" id="msg"></p>
    <div class="modal fade modal" id="signup">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content p-3">



          <!-- Modal Header -->
          <div class="modal-header">
            <div id="signup-head">
              <h3 class="head-design font-weight-bold">Sign-Up</h3>
            </div>
            <button type="button" class="close d-flex justify-content-end" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">

            <form name="signup-form" id="signup-form" method="post" action="">
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name">
                    <label class="error_fname">*Please enter First Name</label>
                  </div>
                  <div class="col">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name">
                    <label class="error_lname">*Please enter Last Name</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="email-id">E-mail</label>
                <input type="text" class="form-control" name="email" id="email-id" aria-describedby="userHelp"
                  placeholder="Enter email">
                <label class="invalid_email">*Please enter valid Email</label>
                <label class="error_noemail">*Please enter Email</label>
                <label class="error" id ="err_email_db"></label>
              </div>
              <div class="form-group">
                <div class="foodchk">
                  <fieldset id="type">
                    <span class="pr-3">Type:</span>
                    <input type="radio" name="type" id="user" value="User">&nbsp; User
                    <input type="radio" name="type" id="admin" value="Admin">&nbsp; Admin
                  </fieldset>
                  <label class="error_type">*Please choose type</label>
                </div>
              </div>
              <div class="form-group">
                <label for="mobile">Mobile number</label>
                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number" maxlength="10">
                <label class="error_mobtendigit">*Please enter 10 digit Mobile Number</label>
                <label class="error_mobcheck">*Please enter valid Mobile Number</label>
              </div>
              <div class="form-group">
                <div class="foodchk">
                  <fieldset id="gender">
                    <span class="pr-3">Gender:</span>
                    <input type="radio" name="gender" id="female" value="Female">&nbsp; Female
                    <input type="radio" name="gender" id="male" value="Male">&nbsp; Male
                    <input type="radio" name="gender" id="other" value="Other">&nbsp; Other
                  </fieldset>
                  <label class="error_gender">*Please choose gender</label>
                </div>
              </div>


              <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-group" id="show_hide_password">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <a href=""><i class="fa fa-eye-slash pl-2" aria-hidden="true"></i></a>
                </div>
                <label class="error_nopassword">*Please enter password</label>
                <label class="error_password">*Your password must contain: <br> Minimum eight characters <br> At least
                  one uppercase letter <br>One lowercase letter <br>One number <br>One special character</label>
              </div>



              <div class="form-group">
                <label for="re-enter">Re-enter Password</label>
                <div class="input-group" id="show_hide_repassword">
                  <input type="password" class="form-control" id="re-enter" name="re_enter" placeholder="Re-enter Password">
                  <a href=""><i class="fa fa-eye-slash pl-2" aria-hidden="true"></i></a>
                </div>
              </div>
              <label class="error_norepassword">*Please re-enter password</label>
              <label class="error_passwordmatch">*Password does not match</label>
              <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" maxlength="300"
                  placeholder="Type your address here"></textarea>
                <label class="error_address">*Please enter address</label>
              </div>
              <div class="form-group">
                <span class="pr-4">Nationality:</span>
                <select class="form-select" id="nationality" name="nationality">
                  <option value="">-- select one --</option>
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
                  <input type="checkbox" class="form-check-input" id="veg" name="food" value="Veg">
                  <label class="form-check-label" for="veg">Veg</label>
                </div>
                <div class="form-check pr-2">
                  <input type="checkbox" class="form-check-input" id="non-veg" name="food" value="Non-Veg">
                  <label class="form-check-label" for="non-veg">Non-Veg</label>
                </div>
                <div class="form-check pr-2">
                  <input type="checkbox" class="form-check-input" id="both" name="food" value="Both">
                  <label class="form-check-label" for="both">Both</label>
                </div>
              </div>
              <label class="error_foodmode">*Please enter food mode</label>
              <div class="modal-footer px-0">
                <div class="row flex-grow-1">
                  <div class="col-lg-6">
                    <button type="submit" id="submit-id" name="submit" value="submit" class="btn btn-swiggy font-weight-bold">Create</button>
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



  <!-- profile modal -->

  <div>
    <div class="modal fade modal" id="profile">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content p-3">

          <div class="modal-header">
            <h3 class="head-design">User Information</h3>
            <button type="button" class="close d-flex justify-content-end" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <div class="d-flex justify-content-center pb-4">
              <img src="./image/user.png" width="150">

            </div>

            <div class="row">
              <div class="col">
                <label><b>First Name</b></label>
              </div>
              <div class="col">
                <div id="profile-fname"><?php echo $_SESSION['first_name']; ?></div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label><b>Last Name</b></label>
              </div>
              <div class="col">

                <div id="profile-lname"><?php echo $_SESSION['last_name']; ?></div>
              </div>
            </div>


            <div class="row">
              <div class="col">
                <label><b>E-mail</b></label>
              </div>
              <div class="col">
                <div id="profile-email"><?php echo $_SESSION['email']; ?></div>
              </div>
            </div>


            <div class="row">
              <div class="col">
                <label><b>Mobile number</b></label>
              </div>
              <div class="col">
                <div id="profile-mobile"><?php echo $_SESSION['mobile_number']; ?></div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label><b>Gender</b></label>
              </div>
              <div class="col">
                <div id="profile_gender"><?php echo $_SESSION['gender']; ?></div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label><b>Address</b></label>
              </div>
              <div class="col">
                <div id="profile-address"><?php echo $_SESSION['address']; ?></div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label><b>Nationality</b></label>
              </div>
              <div class="col">
                <div id="profile-nationality"><?php echo $_SESSION['nationality']; ?></div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label><b>Food Mode</b></label>
              </div>
              <div class="col">
                <div id="profile-foodmode"><?php echo $_SESSION['food_mode']; ?></div>
              </div>
            </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-swiggy font-weight-bold" id="edit-id" data-toggle="modal" data-target="#edit" >Edit</button>

          </div>

        </div>
      </div>
    </div>
  </div>


  <!-- //edit modAL -->
  <div>
  <p class="text-center" id="msg"></p>
    <div class="modal fade modal" id="edit">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content p-3">



          <!-- Modal Header -->
          <div class="modal-header">
            <div id="signup-head">
              <h3 class="head-design font-weight-bold">Edit Information</h3>
            </div>
            <button type="button" class="close d-flex justify-content-end" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">

            <form name="edit-form" id="edit-form" method="post" action="">
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label for="edit_firstname">First Name</label>
                    <input type="text" id="edit_firstname" name="firstname" class="form-control" value="<?php echo $_SESSION['first_name']; ?>" placeholder="First Name">
                    <label class="error_fname">*Please enter First Name</label>
                  </div>
                  <div class="col">
                    <label for="edit_lastname">Last Name</label>
                    <input type="text" id="edit_lastname" name="lastname" class="form-control" value="<?php echo $_SESSION['last_name']; ?>" placeholder="Last Name">
                    <label class="error_lname">*Please enter Last Name</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="edit_email">E-mail</label>
                <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" id="edit_email" aria-describedby="userHelp"
                  placeholder="Enter email">
                <label class="invalid_email">*Please enter valid Email</label>
                <label class="error_noemail">*Please enter Email</label>
              </div>
              <div class="form-group">
                <label for="edit_mobile">Mobile number</label>
                <input type="number" class="form-control" id="edit_mobile" name="mobile" value="<?php echo $_SESSION['mobile_number']; ?>" placeholder="Enter mobile number" maxlength="10">
                <label class="error_mobtendigit">*Please enter 10 digit Mobile Number</label>
                <label class="error_mobcheck">*Please enter valid Mobile Number</label>
              </div>
              <div class="form-group">
                <div class="foodchk">
                  <fieldset id="edit_gender">
                    <span class="pr-3">Gender:</span>

                    <input type="radio" name="edit_gender" id="edit_female" value="Female">&nbsp; Female
                    <input type="radio" name="edit_gender" id="edit_male" value="Male">&nbsp; Male
                    <input type="radio" name="edit_gender" id="edit_other" value="Other">&nbsp; Other
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
                <select class="form-select" id="edit_nationality" name="edit_nationality">
                  <option value="">-- select one --</option>
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
                  <input type="checkbox" class="form-check-input" id="edit_veg" name="edit_food" value="Veg">
                  <label class="form-check-label" for="veg">Veg</label>
                </div>
                <div class="form-check pr-2">
                  <input type="checkbox" class="form-check-input" id="edit_non-veg" name="edit_food" value="Non-Veg">
                  <label class="form-check-label" for="non-veg">Non-Veg</label>
                </div>
                <div class="form-check pr-2">
                  <input type="checkbox" class="form-check-input" id="edit_both" name="edit_food" value="Both">
                  <label class="form-check-label" for="both">Both</label>
                </div>

              </div>
              <label class="error_foodmode">*Please enter food mode</label>
              <div class="modal-footer px-0">
                <div class="row flex-grow-1">
                  <div class="col-lg-6">
                    <button type="submit" id="save_btn" onclick="save(event)" class="btn btn-swiggy font-weight-bold">Save changes</button>
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
</body>

</html>