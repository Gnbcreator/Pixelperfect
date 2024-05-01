<?php include 'php-files/feedbackdata.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/feedback.css">
</head>

<body>
    <div class="container-fluid" style="background-image: url('images/about-bg/3765.jpg');" loading="lazy">
        <h1 class="text-center pt-3">Feedback</h1>
        <div class="row mt-5">
            <div class="col-md-4">
                <form class="mt-5" method="post" >
                    <div class="form-group">
                        <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comments" id="comments" rows="5" placeholder="Comments" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
 required