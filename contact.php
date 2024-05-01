<?php 
include 'php-files/contact.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .contact-form {
            margin-top: 50px;
            padding: 50px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
        .contact-form{
            background: #ffffffb7;
        }
        .form-group textarea{
            resize: none;
        }
        @media (min-width: 768px) {
            .contact-form {
                margin-top: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="height: 100vh; background-image: url('images/ctbg.jpg'); background-position: center; background-repeat: no-repeat;background-size: cover;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="contact-form">
                    <h2 class="text-center mb-4">Contact Us</h2>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="5" name="message" placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
