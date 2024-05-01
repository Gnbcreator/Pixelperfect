<?php
include 'dbconnection.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message  = $_POST['message'];

    $store_data ="INSERT INTO contact (name,E_mail,message) VALUES('$name','$email','$message')";
    $query=mysqli_query($conn,$store_data);

    if($query)
    {
        header("location:dashboard.php");
    }

}

?>