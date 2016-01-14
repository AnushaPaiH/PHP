<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/formvalidation.css"/>
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
                + '&email=' + email + '&gender=' + gender + '&page=signup';
                $.ajax({
                    type: "POST",
                    url: "ajax/save_details.php",
                    data: dataString,
                    cache: false,
                    beforeSend: function() 
                    {
                        $("#signup_status").html('<br clear="all"><div style="text-align: center;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:30px; color:black;">Please wait</font> <img src="loading.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div><br clear="all">');
                    },
                    success: function(response)
                    {
                     /* $("#fname").val("");
                       $("#lname").val("");
                       $("#password").val("");
                       $("#mobile").val("");
                       $("#email").val("");
                       $("#gender").val("");*/

                       $("#signup_status").hide().fadeIn('slow').html(response);
                   }
               });
}
}
        $(document).ready(function () {
          //called when key is pressed in textbox
          $("#mobile").keypress(function (e) {
             //if the letter is not digit then display error and don't type anything
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });

        });

</script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="page-header">
                    <h2>Registration</h2>
                </div>
                <div class="form-horizontal" >
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="fname" placeholder="first Name"  />
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label"></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="lname"  placeholder="Last Name"  />
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mobile Number</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="mobile" maxlength="10" placeholder="Mobile" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='email' class="col-sm-3 control-label">Email-ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" placeholder="name@abc.com" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password" placeholder="Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Confirmation Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="confirm" placeholder="Confirm Password" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='gender' class="col-sm-3 control-label" >Gender</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label style="">
                                    <input type="radio" id="gender" name="gender" value="male" /> Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="female"  name="gender" id="gender" /> Female
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="agree" value="agree" /> Accept our terms
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="Submit" class="btn btn-success" id="signup" value="Sign up" 
                            onClick="ajax_func();">
                        </div>
                    </div>
                </div>
            </div>
            <br clear="all"><br clear="all">
            <div  id="signup_status">
            </div>
        </div>
    </div>
</body>
</html>