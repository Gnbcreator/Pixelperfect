<?php 
include 'dbconnection.php';

$error = null;

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_query = "SELECT * FROM user WHERE E_mail = '$email'";
    $result = mysqli_query($conn,$sql_query);
    $check=mysqli_fetch_array($result);
    $row=mysqli_num_rows($result);

    if($row == 1)
    {
        $sql = "UPDATE user SET Create_Password = '$password', Confirm_Password = '$password' WHERE E_mail = '$email'";
        $query = mysqli_query($conn,$sql);
        if($query)
    {
        header("location:login.php");
    }

    }
    else
    {
        $error = "Invalid E-mail";
    }

   

    
}

?>