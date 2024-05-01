<?php 
include 'dbconnection.php';

$fullname = $email = $password = $confirm = null;
$email_error = $password_error = $confirm_error = null;

if(isset($_POST['submit']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirmpassword'];

    if(empty($fullname)){
        echo'fullname is required';
    }
    if(empty($email))
    {
        echo'email is required';
    }
    if(empty($password))
    {
        echo 'create the password!';
    }
    if(empty($confirm))
    {
        echo 'confirm the password!';
    }
    if(strlen($password) < 8)
    {
        $password_error="password should be minimum 8 characters!";
    }
    if($password!=$confirm)
    {
        $confirm_error= "password not match!";
    }
    else
    {
        $check="SELECT * FROM user WHERE E_mail = '$email'";

        $query=mysqli_query($conn,$check);
        $email_availability=mysqli_fetch_array($query);
        if($email_availability>0)
        {
            $email_error ="E-mail already exists!";
        }
        else
        {
           $store_data = "INSERT INTO user (Full_name,E_mail,Create_Password,Confirm_Password) VALUES('$fullname','$email','$password','$confirm')";
           $query=mysqli_query($conn,$store_data);

           if($query)
           {
            session_start();
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
              $_SESSION['logged_in'] = true;
            header("location:login.php");
            echo"<script>alert('Account added successfully')</script>";
           }
        }
    }
}
?>