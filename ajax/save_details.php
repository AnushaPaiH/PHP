<?php
$con = mysqli_connect("localhost","root","","php");
if (mysqli_connect_errno())
{
<<<<<<< HEAD
	echo "414 Sudhanva Error:" . mysqli_connect_error();
=======
    echo "414 Sudhanva Error: " . mysqli_connect_error();
>>>>>>> 3ea91a58820df17897b8aaa740579a56f53cc160
}

//Validate the request brought
if(isset($_POST["page"]) && !empty($_POST["page"]))
{
<<<<<<< HEAD
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = md5($_POST['password']);
	$confirm = $_POST['confirm'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];

	$fname = mysqli_real_escape_string($con, $fname);
	$lname = mysqli_real_escape_string($con, $lname);
	$password = mysqli_real_escape_string($con, $password);
	$mobile = mysqli_real_escape_string($con, $mobile);
	$email = mysqli_real_escape_string($con, $email);
	$gender = mysqli_real_escape_string($con, $gender);
	
	if($fname == "" || $lname == "" || $password == "" || $confirm == "" || $mobile == "" || $email == "") //Be sure that all the fields are filled then proceed
	{
		echo "<div class='alert alert-danger' style='text-align: center;'>Sorry, you have to fill in all the fields to proceed. Thanks.</div>";
	}
	else
	{
		$sel_user = "SELECT * FROM enduser WHERE 'email' ='$email'";
		$run_user = mysqli_query($con, $sel_user);  
		$check_user = mysqli_num_rows($run_user);
		if($check_user>0)
		{
			//$_SESSION[‘user_email’]=$email;
			echo "<div class='alert alert-danger'>Sorry, Email Already Exists. Thanks.</div>";
		}
		else {  
			$query  = "INSERT INTO enduser (";
				$query .= "  first_name, last_name,pwd, mob,email,gender,active";
				$query .= ") VALUES (";
				$query .= "  '{$fname}', '{$lname}', '{$password}',{$mobile},'{$email}','{$gender}',1";
				$query .= ")";    

				$result = mysqli_query($con, $query);
				if ($result) {

				   echo "<div class='alert alert-success' style='text-align: center;''><strong>  $email  </strong>Registered Successfully Thanks.</div>";
				} 
				else 
				{
														// Failure
														// $message = "Subject creation failed";
					die("Database query failed. " . mysqli_error($con));
				}
				}
			}
		}
else
{
		echo "<div class='info'>Sorry, the operation was unsuccessful.<br>Please try again or contact this website admin to report this error message if the problem persist. Thanks.</div>";
=======
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = md5($_POST['password']);
    $confirm = $_POST['confirm'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $fname = mysqli_real_escape_string($con, $fname);
    $lname = mysqli_real_escape_string($con, $lname);
    $password = mysqli_real_escape_string($con, $password);
    $mobile = mysqli_real_escape_string($con, $mobile);
    $email = mysqli_real_escape_string($con, $email);
    $gender = mysqli_real_escape_string($con, $gender);
    
    if($fname == "" || $lname == "" || $password == "" || $confirm == "" || $mobile == "" || $email == "") //Be sure that all the fields are filled then proceed
    {
        echo "<div class='alert alert-danger' style='text-align: center;'>Sorry, you have to fill in all the fields to proceed. Thanks.</div>";
    }

    else
    {
        $sel_user = "SELECT * FROM enduser WHERE `email` ='$email'";
        $run_user = mysqli_query($con, $sel_user);  
        $check_user = mysqli_num_rows($run_user);
        if($check_user>0){

                //$_SESSION[‘user_email’]=$email;
            echo "<div class='alert alert-danger'>Sorry, Email Already Exists. Thanks.</div>";
        }

        else {  
            $query  = "INSERT INTO enduser (";
                $query .= "  first_name, last_name,pwd, mob,email,gender,active";
                $query .= ") VALUES (";
                $query .= "  '{$fname}', '{$lname}', '{$password}',{$mobile},'{$email}','{$gender}',1";
                $query .= ")";    

                $result = mysqli_query($con, $query);
                if ($result) {

                   echo "<div class='alert alert-success' style='text-align: center;''><strong>  $email  </strong>Registered Successfully Thanks.</div>";
                } else {
                                                        // Failure
                                                        // $message = "Subject creation failed";
                    die("Database query failed. " . mysqli_error($con));
                }
                }

            }
        }
else
{
    echo "<div class='info'>Sorry, the operation was unsuccessful.<br>Please try again or contact this website admin to report this error message if the problem persist. Thanks.</div>";
>>>>>>> 3ea91a58820df17897b8aaa740579a56f53cc160
}
?>