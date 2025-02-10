$(document).on('submit', '#signup', function (e) {
    submitVal(e);
});


function submitVal(e) {
    e.preventDefault();

    var firstname = $('#firstname').val();
    var firstnamecheck = $.isNumeric(firstname);
    var lastname = $('#lastname').val();
    var lastnamecheck = $.isNumeric(lastname);
    var email = $('#email-id').val();
    var choosetype = $('input[name=type]').is(':checked');
    var selectedtype = $('input[type=radio][name="type"]:checked').val();
    var mob = $('#mobile').val();
    var chooseGen = $("input[name=gender]").is(":checked");
    var selectedGender = $('input[type=radio][name="gender"]:checked').val();
    var pass = $('#password').val();
    var repass = $('#re-enter').val();

    var address = $('#address').val();
    var nationality = $('#nationality').children("option:selected").val();
    var foodmode = [];
    $('input[type=checkbox][name=food]:checked').each(function (i) {
        foodmode[i] = $(this).val();
    });



    if (firstname == '') {
        $('.error_fname').css("display", "block");
        $('.error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('#firstname').focus();
        return false;
    }
    else if (firstnamecheck == true) {
        $('.error_fname').css("display", "block");
        $('.error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('#firstname').focus();
        return false;

    }
    else if (lastname == '') {
        $('.error_fname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_lname').css("display", "block");
        $('#lastname').focus();

        return false;
    }
    else if (lastnamecheck == true) {
        $('.error_fname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_lname').css("display", "block");
        $('#lastname').focus();

        return false;
    }
    else if (email == '') {
        $('.error_fname, .error_lname, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_noemail').css("display", "block");
        $('#email-id').focus();

        return false;
    }
    else if (IsEmail(email) == false) {
        $('.error_fname, .error_lname, .error_noemail, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.invalid_email').css("display", "block");
        $('#email-id').focus();
        return false;

    } 
    else if(choosetype == ''){
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $(".error_type").css("display", "block");
        $('#user').focus();
    }
    else if (mob == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_mobtendigit').css("display", "block");
        $('#mobile').focus();
        return false;
    }
    else if (mob.length != 10) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_mobtendigit').css("display", "block");
        $('#mobile').focus();
        return false;
    }
    else if (IsMobstart(mob) == false) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_mobcheck').css("display", "block");
        $('#mobile').focus();
        return false;
    }
    else if (chooseGen == false) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_gender').css("display", "block");
        $('#male').focus();
        return false;
    }
    else if (pass == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");

        $('.error_nopassword').css("display", "block");
        $('#password').focus();

        return false;

    }
    else if (Ispassword(pass) == false) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_password').css("display", "block");

        $('#password').focus();
        return false;

    }
    else if (repass == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_nopassword, .error_mobtendigit, .error_mobcheck, .error_gender, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_norepassword').css("display", "block");
        $('#re-enter').focus();
        return false;
    }
    else if (pass != repass) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_passwordmatch').css("display", "block");
        $('#re-enter').focus();
        return false;
    }
    else if (address == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        $('.error_address').css("display", "block");
        $('#address').focus();

        return false;

    } else if (nationality == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_foodmode, .error_type').css("display", "none");
        $('.error_nationality').css("display", "block");
        $('#nationality').focus();
        return false;
    }
    else if (!($('#veg').prop("checked") || $('#non-veg').prop("checked") || $('#both').prop("checked"))) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_type').css("display", "none");
        $('.error_foodmode').css("display", "block");
        $('#veg').focus();
        return false;
    }
    else {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_nopassword, .error_norepassword, .error_password, .error_passwordmatch, .error_address, .error_nationality, .error_foodmode, .error_type').css("display", "none");
        let err;
        $('#err_email_db').html(err);
        

        $.ajax({
            method: "POST",
            url: "insert_register.php",
            data: { firstname: firstname, lastname: lastname, email: email, type:selectedtype, mobile: mob, password: pass, re_enter: repass, address: address, gender: selectedGender, nationality: nationality, foodmode: foodmode },
            success: function (data) {
                $('#err_email_db').html(data);
                console.log(data);
                if (data=="<span>This email already exists!</span>"){
                    // location.reload(true);
                    $('#email-id').focus();
                    $('#submit-id').attr("data-dismiss", "none");
                 


                }else{
                    location.reload(true);
                    alert('Your form submitted successfully');
                    $('#submit-id').attr("data-dismiss", "modal");
                    $('#signup').find('input').val('')
                    $('#signup').find('select').val('')
                    $('#signup').find('textarea').val('')
                    $('input[name=food]').prop('checked', false);
                    $("input[name=gender]").prop('checked', false);
                    
                }
            }
        });


    }

}

// //login validation
function loginVal(event) {
    event.preventDefault();
    var loginEmail = $('#email-login').val();
    var loginPass = $('#password-login').val();
    var typeValue = $('#typeval').val();
   
    if (loginEmail == '') {
        $('.error_loginemail, .error_loginpass, .error_loginpasswordempty').css("display", "none");
        $('.error_loginemailempty').css("display", "block");
    }
    else if(IsEmail(loginEmail) == false) {
        $('.error_loginemail').css("display", "block");
        $('.error_loginpass, .error_loginemailempty, .error_loginpasswordempty').css("display", "none");
    }
    else if (loginPass == '') {
        $('.error_loginpasswordempty').css("display", "block");
        $('.error_loginpass, .error_loginemail').css("display", "none");
    } else {
        $('.error_loginpass, .error_loginpasswordempty, .error_loginemail,.error_loginemailempty').css("display", "none");
        
        let msg;
    
        $('#emailStatus').html(msg);
   

        $.ajax({
            method: "POST",
            url: "login.php",
            data: { email: loginEmail, password: loginPass },
            success: function (data) {
                   
                console.log(data);
                $('#emailStatus').html(data);
                if (data=="<span>Email has not registered with us...!</span>" || data=="<span>Wrong email or password</span>"){
                    $('#login-id').attr("data-dismiss", "none");
                  

                }
                else if(typeValue == "Admin"){ 
                    alert("Welcome "+typeValue);

                    window.location.replace("admin.php");


                }
                else if(typeValue == "User"){
                    alert("Welcome "+typeValue);

                    $('#login-id').attr("data-dismiss", "modal"); 
                    $('#login-form').find('input').val('');
                    $('#profilebtn').show();
                    $('#loginbtn').hide();
                    $('#signupbtn').hide();
                    window.location.href="homepage.php";

                }
                
            }
        });

    }
}

// update function
function save(event){
       
    event.preventDefault();
    var firstname = $('#edit_firstname').val();
    var firstnamecheck = $.isNumeric(firstname);
    var lastname = $('#edit_lastname').val();
    var lastnamecheck = $.isNumeric(lastname);
    var email = $('#edit_email').val();
    var mob = $('#edit_mobile').val();
    var chooseGen = $("input[name=edit_gender]").is(":checked");
    var selectedGender = $('input[type=radio][name="edit_gender"]:checked').val();
    var address = $('#edit_address').val();
    var nationality = $('#edit_nationality').children("option:selected").val();
    // var adminnationlityvalue = $('#admin_edit_nationality').children("option:selected").val();
    var foodmode = [];
    $('input[type=checkbox][name=edit_food]:checked').each(function (i) {
        foodmode[i] = $(this).val();
    });

    
    if (firstname == '') {
        $('.error_fname').css("display", "block");
        $('.error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('#edit_firstname').focus();
        return false;
    }
    else if (firstnamecheck == true) {
        $('.error_fname').css("display", "block");
        $('.error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('#edit_firstname').focus();
        return false;

    }
    else if (lastname == '') {
        $('.error_fname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('.error_lname').css("display", "block");
        $('#edit_lastname').focus();

        return false;
    }
    else if (lastnamecheck == true) {
        $('.error_fname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('.error_lname').css("display", "block");
        $('#edit_lastname').focus();

        return false;
    }
    else if (email == '') {
        $('.error_fname, .error_lname, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('.error_noemail').css("display", "block");
        $('#edit_email').focus();

        return false;
    }
    else if (IsEmail(email) == false) {
        $('.error_fname, .error_lname, .error_noemail, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('.invalid_email').css("display", "block");
        $('#edit_email').focus();
        return false;

    } else if (mob == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('.error_mobtendigit').css("display", "block");
        $('#edit_mobile').focus();
        return false;
    }
    else if (mob.length != 10) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('.error_mobtendigit').css("display", "block");
        $('#edit_mobile').focus();
        return false;
    }
    else if (IsMobstart(mob) == false) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_gender, .error_address, .error_nationality, .error_foodmodel').css("display", "none");
        $('.error_mobcheck').css("display", "block");
        $('#edit_mobile').focus();
        return false;
    }
    else if (chooseGen == false) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('.error_gender').css("display", "block");
        $('#edit_female').focus();
        return false;
    }
    else if (address == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_nationality, .error_foodmode').css("display", "none");
        $('.error_address').css("display", "block");
        $('#edit_address').focus();

        return false;

    }
    else if (nationality == '') {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_foodmode').css("display", "none");
        $('.error_nationality').css("display", "block");
        $('#edit_nationality').focus();
        $('#edit_nationality').focus();
        return false;
    }
    else if (!($('#edit_veg').prop("checked") || $('#edit_non-veg').prop("checked") || $('#edit_both').prop("checked"))) {
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_address, .error_nationality').css("display", "none");
        $('.error_foodmode').css("display", "block");
        $('#edit_veg').focus();
        return false;
    }
    else {

        
        $('.error_fname, .error_lname, .error_noemail, .invalid_email, .error_mobtendigit, .error_mobcheck, .error_gender, .error_address, .error_nationality, .error_foodmode').css("display", "none");
        $('#save_btn').attr("data-dismiss", "none");

        $.ajax({
            method: "POST",
            url: "update.php",
            data: { fn: firstname, ln: lastname, em: email, mob: mob, ad: address, gen: selectedGender, nat: nationality, food: foodmode },
            success: function (data) {
            $('#save_btn').attr("data-dismiss", "none");
                location.reload(true);
               
            }
        });


    

}
}







// password validation function
function Ispassword(passinput) {
    var passRegEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (passRegEx.test(passinput)) {
        return true;
    }
    else {
        return false;
    }
}
// mob start 7 8 9 validation function
function IsMobstart(mob) {
    var mobstart = /^[789]\d{9}$/;
    if (mobstart.test(mob)) {
        return true;
    } else {
        return false;
    }

}

// email validation function
function IsEmail(email) {
    var regex = /^([a-z0-9_\.\-\+])+\@(([a-z\-])+\.)+([a-z]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}

// function for how hide icon in password
$(document).ready(function () {

    $("#profileclick").click(function () {
        $('.profile_dropdown').css("display", "block");
    });


    $('#admin-edit-id').on('click', function(){
        $('#admin-edit-id').attr("data-toggle", "modal");
        $('#admin-edit-id').attr("data-target", "#editadminprofile");
        $('#admin-edit-id').attr("data-dismiss", "modal");

        // setting foodmode(checkbox)
        var foodArray = foodValue.split(",");
        var i = foodArray.length;
        for (var j=i-1;j>=0;j--){
            if (foodArray[j]== "Veg"){
                $( "#edit_veg" ).prop( "checked", true ); 
            }
            else if(foodArray[j]== "Non-Veg"){
                $( "#edit_non-veg" ).prop( "checked", true ); 
            }
            else if(foodArray[j]== "Both"){
                $( "#edit_both" ).prop( "checked", true );    
            }
        }


        // setting nationality(dropdown)
        $('#edit_nationality').val(nationalityValue).attr("selected", "selected");
    });

    $('#edit-id').on('click', function () {
        $('#edit-id').attr("data-toggle", "modal");
        $('#edit-id').attr("data-target", "#edit");
        $('#edit-id').attr("data-dismiss", "modal");
        
        // setting gender (radio btn) 
        if((genValue)){
            if (genValue == "Female"){
                $('input:radio[name="edit_gender"][id="edit_female"]').prop('checked', true);     
            }
            else if(genValue == "Male"){
                $('input:radio[name="edit_gender"][id="edit_male"]').prop('checked', true);     
            }
            else if(genValue == "Other"){
                $('input:radio[name="edit_gender"][id="edit_other"]').prop('checked', true);    
            }
        }

        // setting foodmode(checkbox)
        var foodArray = foodValue.split(",");
        var i = foodArray.length;
        for (var j=i-1;j>=0;j--){
            if (foodArray[j]== "Veg"){
                $( "#edit_veg" ).prop( "checked", true ); 
            }
            else if(foodArray[j]== "Non-Veg"){
                $( "#edit_non-veg" ).prop( "checked", true ); 
            }
            else if(foodArray[j]== "Both"){
                $( "#edit_both" ).prop( "checked", true );    
            }
        }

        // setting nationality(dropdown)
        $('#edit_nationality').val(nationalityValue).attr("selected", "selected");
   
    });

    $("#login_show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#login_show_hide_password input').attr("type") == "text") {
            $('#login_show_hide_password input').attr('type', 'password');
            $('#login_show_hide_password i').addClass("fa-eye-slash");
            $('#login_show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#login_show_hide_password input').attr('type', 'text');
            $('#login_show_hide_password i').removeClass("fa-eye-slash");
            $('#login_show_hide_password i').addClass("fa-eye");
        }
    });


    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });

    $("#show_hide_repassword a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_repassword input').attr("type") == "text") {
            $('#show_hide_repassword input').attr('type', 'password');
            $('#show_hide_repassword i').addClass("fa-eye-slash");
            $('#show_hide_repassword i').removeClass("fa-eye");
        } else if ($('#show_hide_repassword input').attr("type") == "password") {
            $('#show_hide_repassword input').attr('type', 'text');
            $('#show_hide_repassword i').removeClass("fa-eye-slash");
            $('#show_hide_repassword i').addClass("fa-eye");
        }
    });
});

// reset the sign up form
$(document).ready(function () {

    $(".reset-btn").click(function () {
        $('.error_fname,.error_lname,.error_noemail,.invalid_email,.error_type,.error_mobtendigit,.error_mobcheck,.error_gender,.error_nopassword,.error_norepassword,.error_password,.error_passwordmatch,.error_address,.error_nationality,.error_foodmode,.error_loginemail,.error_loginpass,.error_loginemailempty,.error_loginpasswordempty,.error_hotelname,.error_hoteladdress,.error_hotelmobtendigit,.error_hotelmobcheck,.invalid_hotelemail,.error_nohotelemail,.error_hotelimage,.invalid_edithotelemail, .error_editnohotelemail, .error_edithotelmobcheck, .error_edithotelmobtendigit, .error_edithotelmobtendigit, .error_edithoteladdress, .error_edithotelname,.error_foodname,.error_fooddescription,.error_foodimage,.error_foodstatus,.error_editfoodname,.error_editfooddescription').css("display", "none");
        
    });

});

//check if email is in db

function checkEmail(emailInput){
    $.ajax({
     method:"POST",
     url: "login.php",
     data:{emailId:emailInput},
     success: function(data){
        $('#emailStatus').html(data);

     }
   });
}




function hotelVal(event){
    event.preventDefault();
    var hotelname = $('#hotelname').val();
    var hoteladdress = $('#hoteladdress').val();
    var hotelmobile = $('#hotelmobile').val();
    var hotelemail = $('#hotelemail').val();
    var hotelimage = $('#hotelimage').val();
    var hotelImage = new FormData($("#hotel-form")[0]);
  
    if(hotelname == ''){
        $(".error_hotelimage, .invalid_hotelemail, .error_nohotelemail, .error_hotelmobcheck, .error_hotelmobtendigit, .error_hotelmobtendigit, .error_hoteladdress").css("display","none");

        $(".error_hotelname").css("display","block");
        $("#hotelname").focus();
        return false;
    }
    else if(hoteladdress == ''){
        $(".error_hotelimage, .invalid_hotelemail, .error_nohotelemail, .error_hotelmobcheck, .error_hotelmobtendigit, .error_hotelmobtendigit, .error_hotelname").css("display","none");

        $(".error_hoteladdress").css("display","block");
        $("#hoteladdress").focus();
        return false;

    }
    else if(hotelmobile == ''){
        $(".error_hotelimage, .invalid_hotelemail, .error_nohotelemail, .error_hotelmobcheck, .error_hotelmobtendigit, .error_hoteladdress, .error_hotelname").css("display","none");

        $(".error_hotelmobtendigit").css("display","block");
        $("#hotelmobile").focus();
        return false;

    }
    else if(IsMobstart(hotelmobile) == false){
        $(".error_hotelimage, .invalid_hotelemail, .error_nohotelemail, .error_hotelmobtendigit, .error_hotelmobtendigit, .error_hoteladdress, .error_hotelname").css("display","none");

        $(".error_hotelmobcheck").css("display","block");
        $("#hotelmobile").focus();
        return false;

    }
    else if(hotelemail == ''){
        $(".error_hotelimage, .invalid_hotelemail, .error_hotelmobcheck, .error_hotelmobtendigit, .error_hotelmobtendigit, .error_hoteladdress, .error_hotelname").css("display","none");

        $(".error_nohotelemail").css("display","block");
        $("#hotelemail").focus();
        return false;

    }
    else if(IsEmail(hotelemail) == false){
        $(".error_hotelimage, .error_nohotelemail, .error_hotelmobcheck, .error_hotelmobtendigit, .error_hotelmobtendigit, .error_hoteladdress, .error_hotelname").css("display","none");
        
        $(".invalid_hotelemail").css("display","block");
        $("#hotelemail").focus();
        return false;

    }
    else if(hotelimage == ''){
        $(".invalid_hotelemail, .error_nohotelemail, .error_hotelmobcheck, .error_hotelmobtendigit, .error_hotelmobtendigit, .error_hoteladdress, .error_hotelname").css("display","none");

        $(".error_hotelimage").css("display","block");
        $("#hotelimage").focus();
        return false;

    }
    else{
        $(".error_hotelimage, .invalid_hotelemail, .error_nohotelemail, .error_hotelmobcheck, .error_hotelmobtendigit, .error_hotelmobtendigit, .error_hoteladdress, .error_hotelname").css("display","none");
        $.ajax({
            url: "insert_hotel.php",
            data: hotelImage,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {

                location.reload(true);


            }
        });
    }
}

function foodVal(event){
    event.preventDefault();
    var foodname = $('#foodname').val();
    var fooddescription = $('#fooddescription').val();
    var foodimage = $('#foodimage').val();
    var foodImage = new FormData($("#food-form")[0]);
    
    if(foodname == ''){
        $(".error_fooddescription, .error_foodimage").css("display","none");

        $(".error_foodname").css("display","block");
        $("#foodname").focus();
        return false;
    }
    else if(fooddescription == ''){
        $(".error_foodname, .error_foodimage").css("display","none");

        $(".error_fooddescription").css("display","block");
        $("#fooddescription").focus();
        return false;

    }
    else if(foodimage == ''){
        $(".error_foodname, .error_fooddescription").css("display","none");

        $(".error_foodimage").css("display","block");
        $("#foodimage").focus();
        return false;

    }
    else{
        $(".error_foodname, .error_fooddescription, .error_foodimage").css("display","none");
        $.ajax({
            url: "insert_food.php",
            data: foodImage,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {

                location.reload(true);
            }
        });

    }
   
  
    







}




function hotel_show(){
    $('.hotel_details').css("display","block");
    $('.food_details').css("display","none");

}

function food_show(){
    $('.food_details').css("display","block");
    $('.hotel_details').css("display","none");

}

function save_hotel(event,id){
    event.preventDefault();

    var hotelname = $('#edithotelname'+id).val();
    var hoteladdress = $('#edithoteladdress'+id).val();
    var hotelmobile = $('#edithotelmobile'+id).val();
    var hotelemail = $('#edithotelemail'+id).val();
    var updateinfo = new FormData($("#hotel-edit-form"+id)[0]);
    updateinfo.append('hotelid',id);
  

    if(hotelname == ''){
        $(".invalid_edithotelemail, .error_editnohotelemail, .error_edithotelmobcheck, .error_edithotelmobtendigit, .error_edithotelmobtendigit, .error_edithoteladdress").css("display","none");

        $(".error_edithotelname").css("display","block");
        $("#edithotelname"+id).focus();
        return false;
    }
    else if(hoteladdress == ''){
        $(".invalid_edithotelemail, .error_editnohotelemail, .error_edithotelmobcheck, .error_edithotelmobtendigit, .error_edithotelmobtendigit, .error_edithotelname").css("display","none");

        $(".error_edithoteladdress").css("display","block");
        $("#edithoteladdress"+id).focus();
        return false;

    }
    else if(hotelmobile == ''){
        $(".invalid_edithotelemail, .error_editnohotelemail, .error_edithotelmobcheck, .error_edithotelmobtendigit, .error_edithoteladdress, .error_edithotelname").css("display","none");

        $(".error_edithotelmobtendigit").css("display","block");
        $("#hotelmobile"+id).focus();
        return false;

    }
    else if(IsMobstart(hotelmobile) == false){
        $(".invalid_edithotelemail, .error_editnohotelemail, .error_edithotelmobtendigit, .error_edithotelmobtendigit, .error_edithoteladdress, .error_edithotelname").css("display","none");

        $(".error_edithotelmobcheck").css("display","block");
        $("#edithotelmobile"+id).focus();
        return false;

    }
    else if(hotelemail == ''){
        $(".invalid_edithotelemail, .error_edithotelmobcheck, .error_edithotelmobtendigit, .error_edithotelmobtendigit, .error_edithoteladdress, .error_edithotelname").css("display","none");

        $(".error_editnohotelemail").css("display","block");
        $("#edithotelemail"+id).focus();
        return false;

    }
    else if(IsEmail(hotelemail) == false){
        $(".error_editnohotelemail, .error_edithotelmobcheck, .error_edithotelmobtendigit, .error_edithotelmobtendigit, .error_edithoteladdress, .error_edithotelname").css("display","none");
        
        $(".invalid_edithotelemail").css("display","block");
        $("#edithotelemail"+id).focus();
        return false;

    }
   
    else{
        $(".invalid_edithotelemail, .error_editnohotelemail, .error_edithotelmobcheck, .error_edithotelmobtendigit, .error_edithotelmobtendigit, .error_edithoteladdress, .error_edithotelname").css("display","none");



        $.ajax({
            url: "update_hotel.php",
            data: updateinfo,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                console.log(data);
            location.reload(true);
           


            }
        });
    }
}



function save_food(event,id){
    event.preventDefault();
    var foodname = $('#editfoodname'+id).val();
    var fooddescription = $('#editfooddescription'+id).val();
    var updatefoodinfo = new FormData($("#food-edit-form"+id)[0]);
    updatefoodinfo.append("foodid",id);

    if(foodname == ''){
        $('.error_editfoodname').css('display','block');
        $('.error_editfooddescription').css('display','none');
        $('#editfoodname').focus();
        return false;
    }else if(fooddescription == ''){
        $('.error_editfooddescription').css('display','block');
        $('.error_editfoodname').css('display','none');
        $('#editfooddescription').focus();
        return false;
    }else{
        $('.error_editfoodname, .error_editfooddescription').css('display','none');
        
        $.ajax({
            url: "update_food.php",
            data: updatefoodinfo,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                location.reload(true);
            }
        });
    }

}
function delHotel(event){
    $('#delhotel').attr('data-dismiss','modal');
    event.preventDefault();
    var delhotelid = $('#hidden_delhotelid').val();

    $.ajax({
        method:'POST',
        url: "del_hotel.php",
        data:{ hotelid:delhotelid },
        success: function(data){
          console.log(data);
          $('#delhotel').attr('data-dismiss','modal');
          location.reload(true);
          hotel_show();
   
        }
      });

}
function delFood(event){
    $('#delfood').attr('data-dismiss','modal');
    event.preventDefault();
    var delfoodid = $('#hidden_delfoodid').val();

    $.ajax({
        method:'POST',
        url: "del_food.php",
        data:{ foodid:delfoodid },
        success: function(data){
          console.log(data);
          $('#delfood').attr('data-dismiss','modal');
          location.reload(true);
   
        }
      });

}

