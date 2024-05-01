<?php 
include 'php-files/forgetdata.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/forget.css">
</head>
<body>

<div class="container-fluid" style="background-image: url('images/97124.jpg');" loading="lazy">
  <div class="row p-2">
    <div class="col-md-6 img middle-column" style="background-color: aliceblue; background-image: url('images/lgbg.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover; border-radius: 7px;" loading="lazy">
      <div>
        <h2 class="text-center">WELCOME</h2>
        <div class="line mt-3 mb-2"></div>
        <h6 class="text-center">Enter your details to Login on our UI designing tool.</h6>
      </div>
    </div>
    <div class="col-md-6 form middle-column pl-4 pr-4">
      <form class="forget-form" method="post">
        <h1 class="text-center mb-5">Forget Password</h1>
        <div class="form-group pt-3">
          <input type="email" class="form-control" name="email" placeholder="E-mail" required>
        </div>
        <?php
        // Check if $error variable is set and not empty, then display error
        if(isset($error) && !empty($error)) {
          echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        ?>
        <div class="form-group mb-4">
          <div class="input-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="New Password" required>
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-eye-slash" id="togglePassword"></i>
              </span>
            </div>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block mb-2">Submit</button>
      </form>
    </div>
  </div>
</div>

<script>
document.getElementById('togglePassword').addEventListener('click', function() {
  const passwordInput = document.getElementById('password');
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
  this.classList.toggle('fa-eye');
});
</script>

</body>
</html>
