<?php
if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    $sel_user = "select * from endusers where email='$email' AND pwd='$pass'";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);
    if($check_user>0){
        $_SESSION['user_email']=$email;
        echo "<script>window.open('home.php','_self')</script>";
    }
    else 
    {
        echo "<script>alert('Email or password is not correct, try again!')</script>";
    }
}
?>