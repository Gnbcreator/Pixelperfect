<?php
session_start();
include 'php-files/signupdata.php'; 
include 'php-files/logindata.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>dashboard</title>
    <style>
        #imgContainer{
           width:350px;
           height:230px;
            border:1px solid rgb(0, 0, 0);
            border-radius:10px;
            
        }
       .design{
           width:350px;
           height:200px;
          
           padding:0px;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- side bar -->   
            <div class="col-md-2">
                
                <div class="navbar navbar-expand">
                    <div class="profile dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#data">
                        <img style="width: 35px; height: 35px;" src="images/profile icon.png" alt="" loading="lazy">
                        <h6><?php echo $_SESSION['fullname']; ?></h6>    
                    </div>

                    <div class="card collapse text-center" id="data" >
                        <img class="mt-4" style="width: 40px; height: 40px; margin: 0 auto;" src="images/profile icon.png" alt="" loading="lazy">
                        <h6><?php echo $_SESSION['fullname']; ?></h6>
                        <a style="text-decoration: none; color: rgb(0, 0, 0)" href=""><?php echo $_SESSION['email']; ?></a>

                    <a class="mt-3" style="width: 100%;" href="signup.php"><button>Log Out</button></a>
                    </div>
                    <input type="search" placeholder="Serach your designs...," class="search-box" >
                </div>

                <div class="row1">
                    <ul class="side-links mt-4 " >
                        <li class="active-links" ><a class="mx-3 d-flex" href=""><img class="mx-3" style="width: 20px; height: 20px;" src="images/dashboard-icons/template_icon_151052.png" alt="" loading="lazy"><p>Tamplets</p></a></li>
                        <li class="active-links" ><a class="mx-3 d-flex" href=""><img class="mx-3" style="width: 20px; height: 20px;" src="images/dashboard-icons/1491254405-recenttimesearchreloadtime_82966.png" alt="" loading="lazy"><p>Recents</p></a></li>
                    </ul>
                </div>

                <div class="row2">
                    <ul class="side-links mt-4 " >
                        <li class="active-links" ><a class="mx-3 d-flex" href=""><img class="mx-3" style="width: 20px; height: 20px;" src="images/dashboard-icons/preliminary_document_file_draft_icon_256874.png" alt="" loading="lazy"><p>Draft</p></a></li>
                        <li class="active-links" ><a class="mx-3 d-flex" href=""><img class="mx-3" style="width: 20px; height: 20px;" src="images/dashboard-icons/1904657-bookmark-favorite-favourite-heart-like-lover-romance_122507.png" alt="" loading="lazy"><p>favourite</p></a></li>
                    </ul>
                </div>
                    <ul class="more p-0 mx-4" id="More" >
                        <li class="mt-4" style="width: 100%; list-style: none;"><a class="mx-3 d-flex" style="text-decoration: none; color: black; font-size: 2.5vmin;" href="about.php"><img style="width: 20px; height: 20px; margin-right: 15px;" src="images/dashboard-icons/about_3697.png" alt=""><p>About</p></a></li>
                        <li class="mt-4" style="width: 100%; list-style: none;"><a class="mx-3 d-flex" style="text-decoration: none; color: black; font-size: 2.5vmin;" href="contact.php"><img style="width: 20px; height: 20px; margin-right: 15px;" src="images/dashboard-icons/pngegg.png" alt=""><p>Contact</p></a></li>
                        <li class="mt-4" style="width: 100%; list-style: none;"><a class="mx-3 d-flex" style="text-decoration: none; color: black; font-size: 2.5vmin;" href="feedback.php"><img style="width: 20px; height: 20px; margin-right: 15px;" src="images/dashboard-icons/-feedback_90269.png" alt=""><p>Feedback</p></a></li>
                        <li class="mt-4" style="width: 100%; list-style: none;"><a class="mx-3 d-flex" style="text-decoration: none; color: black; font-size: 2.5vmin;" href="privacy.php"><img style="width: 20px; height: 20px; margin-right: 15px;" src="images/dashboard-icons/data-privacy_icon-icons.com_71694.png" alt=""><p>Privacy</p></a></li>
                    </ul>
                </li>
                <div class="row3 text-center align-items-center d-flex">
                    <img class="mx-3" style="width: 25px; height: 25px;" src="images/dashboard-icons/web.png" alt="" loading="lazy"><a style="text-decoration: none; color: rgb(0, 0, 0); font-size: 2.1vmin;"  href="">Explore Community</a>
                </div>
            </div>
            <!-- right layout -->
            <div class="col-md-10">
                <!-- navbar -->
                <div class="navbar navbar-expand" id="layout" >
                    <div class="navbar-brand">
                        <div class="col-md-9">
                            Recents
                        </div>
                        <div class="col-md-3">
                            <a id="createButton" href="Newcan.php" style="width: 35%;" ><button style="background-color: rgb(4, 121, 216);" >Create</button></a>
                            <a class="mx-3" style="width: 35%;" href=""><button style="background-color: rgb(140, 0, 255);" >Import</button></a>    
                        </div>
                    </div>
                </div>

                <div class="row6 mt-5 text-center">
                    <a id="new" style="padding: 0; margin: 0; width: 10%;" href="Newcan.php">
                        <img style="padding: 0; margin: 0; width: 100% ;" src="images/icons/create copy.png" alt="">
                    </a>
                    <h1 class="mx-3" >New Project</h1>
                </div>
                <div class="row5 mt-5 pt-5 px-5 text-center">
                    <div class="col-md-3 design">
                       
                            <div class="retrive">
                                <img style="width: 250px ;height: 170px;" src="" alt="" id="imgContainer" class="img-fluid">
                                <button style="width: 70%; margin-top: 5px;" class="btn del btn-primary" data-user-email="<?php echo $_SESSION['email']; ?>">delete</button>
                            </div> 

                    </div>             
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Function to generate a unique session ID
        function generateSessionID() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }
    
        // Function to handle the click event on the "Create" button
        $(document).ready(function(){
            $('#createButton').click(function(e) {
                e.preventDefault(); // Prevent default action of anchor tag
                var uniqueSessionID = generateSessionID(); // Generate unique session ID
                window.location.href = "Newcanva.php?session_id=" + uniqueSessionID; // Redirect to Newcanva.php with session ID as a query parameter
            });
        });

        $(document).ready(function(){
            $('#new').click(function(e) {
                e.preventDefault(); // Prevent default action of anchor tag
                var uniqueSessionID = generateSessionID(); // Generate unique session ID
                window.location.href = "Newcanva.php?session_id=" + uniqueSessionID; // Redirect to Newcanva.php with session ID as a query parameter
            });
        });
    
    
        // AJAX request to fetch image data
        $(document).ready(function(){
            $.ajax({
                url: 'php-files/retriveImageData.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var imageData = response.image_data;
                        $('#imgContainer').attr('src', imageData); // Assuming imageData already contains "data:image/png;base64,"
                    } else {
                        console.log(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching image data');
                }
            });
        });
    
        // Event listener for double-click on image container to redirect to Newcanva.php
        document.getElementById('imgContainer').addEventListener('dblclick', redirectToCanvas);
        function redirectToCanvas() {
            window.location.href = "Newcanva.php";
        }  
// delete button //
        $(document).ready(function(){
    $('.del').click(function(e) {
        e.preventDefault();
        var userEmail = $(this).data('user-email'); // Get the user's email from the data attribute
        var imageData = $(this).closest('.retrive').find('img').attr('src'); // Get the image data
        $.ajax({
            url: 'php-files/deleteDesign.php',
            type: 'POST',
            data: { email: userEmail, image: imageData },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Reload the page or update UI as necessary
            },
            error: function(xhr, status, error) {
                console.log('Error deleting design');
            }
        });
    });
});

    </script>
    
</body>

</html>