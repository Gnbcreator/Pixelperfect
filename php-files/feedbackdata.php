<?php
include 'dbconnection.php';

if(isset($_POST['submit']))
{
    $fullname = $_POST['fullName'];
    $email =$_POST['email'];
    $comments = $_POST['comments'];

    $sql = "INSERT INTO feedback (Full_name,E_mail,Comments) VALUES ('$fullname','$email','$comments')";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header("location:dashboard.php");
    }
}
?>