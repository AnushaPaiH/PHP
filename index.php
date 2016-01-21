<?php

// establishing the MySQLi connection



$con = mysqli_connect("localhost","root","","php");


// checking the user

if(isset($_POST['login'])){

    $login_email = mysqli_real_escape_string($con,$_POST['login_email']);

    $pwd = mysqli_real_escape_string($con,$_POST['pwd']);




    $sel_user = "select * from enduser where email='$login_email' AND pwd='$pwd'";

    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user>0){

        $_SESSION['email']=$email;

        echo "<script>window.open('home.php','_self')</script>";

    }

    else {

        echo "<script>alert('Email or password is not correct, try again!')</script>";

    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

    <!--include jQuery -->
    <script type="text/javascript">
        function ajax_func() 
        {
            var reg         =       /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            var fname       =       $("#fname").val();
            var lname       =       $("#lname").val();
            var password    =       $("#password").val();
            var confirm     =       $("#confirm").val();
            var mobile      =       $("#mobile").val();
            var email       =       $("#email").val();
            var gender      =       $("#gender").val();
            var sec_que     =       $("#sec_que").val();
            var sec_ans     =       $("#sec_ans").val();

            if(fname == "")
            {  
                $("#signup_status").html('<div class="alert alert-danger" style="text-align: center;"">Please enter your First Name to proceed.</div>');
                $("#fname").focus();
            }
            else if(lname == "")
            {
                $("#signup_status").html('<div class="alert alert-danger" style="text-align: center;">Please enter your Last Name to proceed.</div>');
                $("#lname").focus();
            }
            else if(password == "")
            {
                $("#signup_status").html('<div class="alert alert-danger" style="text-align: center;">Please enter your password to proceed.</div>');
                $("#password").focus();
            }
            else if(confirm == "")
            {
                $("#signup_status").html('<div class="alert alert-danger" style="text-align: center;">Please confirm your password.</div>');
                $("#confirm").focus();
            }
            else if(mobile == "")
            {
                $("#signup_status").html('<div class="alert alert-danger" style="text-align: center;">Please enter your Mobile number to proceed.</div>');
                $("#mobile").focus();
            }
            else if(email == "")
            {
                $("#signup_status").html('<div class="alert alert-danger" style="text-align: center;">Please enter your email address to proceed.</div>');
                $("#email").focus();
            }
            else if(reg.test(email) == false)
            {
                $("#signup_status").html('<div class="alert alert-danger" style="text-align: center;">Please enter a valid email address to proceed.</div>');
                $("#email").focus();
            }

            else
            {
                var dataString = 'fname='+ fname + '&lname=' + lname + '&password=' + password + '&confirm=' + confirm + '&mobile=' + mobile
                + '&email=' + email + '&gender=' + gender + '&sec_que=' + sec_que + '&sec_ans=' + sec_ans + '&page=signup';
                $.ajax({
                    type: "POST",
                    url: "ajax/registration.php",
                    data: dataString,
                    cache: false,
                    beforeSend: function() 
                    {
                        $("#signup_status").html('<br clear="all"><div style="text-align: center;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:30px; color:black;">Please wait</font> <img src="loading.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div><br clear="all">');
                    },
                    success: function(response)
                    {
                       $("#signup_status").hide().fadeIn('slow').html(response);
                   }
               });
            }
        }

        $(document).ready(function () {
          $("#mobile").keypress(function (e) 
          {
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

          $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

            $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
      });

    </script>
    <style type="text/css">
        body {
            padding-top: 90px;
        }
        .panel-login {
            border-color: #ccc;
            -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
            -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
            box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
        }
        .panel-login>.panel-heading {
            color: #00415d;
            background-color: #fff;
            border-color: #fff;
            text-align:center;
        }
        .panel-login>.panel-heading a{
            text-decoration: none;
            color: #666;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }
        .panel-login>.panel-heading a.active{
            color: #029f5b;
            font-size: 18px;
        }
        .panel-login>.panel-heading hr{
            margin-top: 10px;
            margin-bottom: 0px;
            clear: both;
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
            background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
            background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
        }
        .panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }
        .custom-dropdown big
        {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login input:hover,
        .panel-login input:focus {
            outline:none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-color: #ccc;
        }
        .btn-login {
            background-color: #59B2E0;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #59B2E6;
        }
        .btn-login:hover,
        .btn-login:focus {
            color: #fff;
            background-color: #53A3CD;
            border-color: #53A3CD;
        }
        .forgot-password {
            text-decoration: underline;
            color: #888;
        }
        .forgot-password:hover,
        .forgot-password:focus {
            text-decoration: underline;
            color: #666;
        }

        .btn-register {
            background-color: #1CB94E;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #1CB94A;
        }
        .btn-register:hover,
        .btn-register:focus {
            color: #fff;
            background-color: #1CA347;
            border-color: #1CA347;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" style="display:block;" action="index.php" method="post" >
                                    <div class="form-group">
                                        <input type="text" name="login_email" id="login_email" tabindex="1" class="form-control" 
                                        placeholder="Email-ID" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pwd" id="pwd" tabindex="2" class="form-control" 
                                        placeholder="Password" required>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember">Remember Me</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login" id="login" tabindex="4" 
                                                class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="register-form" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="First Name" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="lname" id="lname" tabindex="1" class="form-control" placeholder="Last Name" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm" id="confirm" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mobile" id="mobile" tabindex="2" class="form-control" placeholder="Mobile">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" tabindex="2" class="form-control" placeholder="E-Mail">
                                    </div>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default">
                                            <input type="radio" id="gender" name="gender" value="Male" />Male</label> 
                                            <label class="btn btn-default">
                                                <input type="radio" id="gender" name="gender" value="Female" />Female</label> 
                                            </div>

                                            <br />


                                            <div class="form-group">
                                                <h4>Security Question :</h4>

                                                <span class="custom-dropdown big">
                                                    <select style="height: 40px;
                                                    width: 240px;" id="sec_que" name="sec_que">    
                                                    <option>Who was your childhood hero? </option>
                                                    <option>When you were young, what did you want to be when you grew up?</option>  
                                                    <option>What was your childhood nickname?</option>
                                                    <option>What was the name of your school?</option>
                                                    <option>What is your favorite color?</option>
                                                </select>
                                                </span>
                                            </div>                
                                            <br><br>   <div class="form-group">
                                            <input type="text" name="sec_ans" id="sec_ans" tabindex="2" class="form-control" placeholder="please enter the answer">
                                        </div>         


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" 
                                                    class="form-control btn btn-register" value="Register"  onClick="ajax_func();">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="signup_status"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>