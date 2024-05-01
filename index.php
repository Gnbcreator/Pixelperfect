<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="css/home.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<!-- pre-loader -->
<div id="preloader">
  <svg viewBox="0 0 240 240" height="240" width="240" class="loader">
    <circle stroke-linecap="round" stroke-dashoffset="-330" stroke-dasharray="0 660" stroke-width="20" stroke="#000" fill="none" r="105" cy="120" cx="120" class="loader-ring loader-ring-a"></circle>
    <circle stroke-linecap="round" stroke-dashoffset="-110" stroke-dasharray="0 220" stroke-width="20" stroke="#000" fill="none" r="35" cy="120" cx="120" class="loader-ring loader-ring-b"></circle>
    <circle stroke-linecap="round" stroke-dasharray="0 440" stroke-width="20" stroke="#000" fill="none" r="70" cy="120" cx="85" class="loader-ring loader-ring-c"></circle>
    <circle stroke-linecap="round" stroke-dasharray="0 440" stroke-width="20" stroke="#000" fill="none" r="70" cy="120" cx="155" class="loader-ring loader-ring-d"></circle>
  </svg>
  
</div>

<!-- main content -->
<div id="main-content" style="display: none;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PixelPerfect</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#features">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="designs.php">Designs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a href="login.php"><button class="btn btn-primary">Login</button></a>
          
        </li>
      </ul>
    </div>
  </nav>
  
  <!-- home section -->
  <section class="home-section" style="background-image: url('images/background.jpg');" >
    <div class="home-content">
      <h1>Think, Imagine And <span id="typer"></span></h1>
      <div class="line mt-4 mb-3"></div>
      <h3>A Creative UI Design For Your Web</h3>
      <h4>Using Our UI Designing Tool</h4>
      <a href="login.php"><button class="btn btn-primary">Get Started</button></a>  
    </div>
  </section>
  
  <!-- Features section -->
  <section class="features-section py-5" id="features" >
    <div class="container text-center">
      <h1 class="text-center mb-5">Our <span class="text-primary" >Features</span></h1>
      <div class="row mt-5">
        <div class="col-sm-4 text-center">
          <div class="card shadow-sm">
            <img class="m-2" src="images/f1.jpg" alt="">
            <div class="card-body">
              <h5 class="card-title">Creative</h5>
              <p class="card-text"> You Can create <br> An Creative UI Designs Here.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 text-center">
          <div class="card shadow-sm">
            <img class="m-2" src="images/f2.jpg" alt="">
            <div class="card-body">
              <h5 class="card-title">Simple</h5>
              <p class="card-text"> It is Easy To <br> Use And Simple Options T Create.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 text-center">
          <div class="card shadow-sm">
            <img class="m-2" src="images/f3.jpg" alt="">
            <div class="card-body">
              <h5 class="card-title">Multi-Purpose</h5>
              <p class="card-text"> You can Use <br> This Tool For Multi-Purpose</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer Section -->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <h1>PixelPerfect</h1>
          <h5>By Creator's Studio</h5>
          <h4>Follow Us On Social Media</h4>
          <div class="social-icons mt-4">
            <a href=""><img src="images/instagramlogo.png.png" alt="Social Media Icon"></a>
            <a href="https://www.linkedin.com/in/pixel-perfect-28841a2b7/"><img src="images/linkdinlogo.png.png" alt="Social Media Icon"></a>
            <a href=""><img src="images/facebooklogo.png.png" alt="Social Media Icon"></a>
            <a href="http://www.youtube.com/@PixelPerfecttool"><img src="images/youtubelogo.png.png" alt="Social Media Icon"></a>
          </div>
        </div>
        <div class="col-md-3">
          <h1>Services</h1>
          <ul class="footer-menu mt-4">
            <li>Design</li>
            <li>Develop</li>
            <li>Import</li>
            <li>Export</li>
            <li>Download</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h1>Explore</h1>
          <ul class="footer-menu mt-4">
            <li>Designing Features</li>
            <li>Creative Tools</li>
            <li>Resource Sharing</li>
            <li>Pricing</li>
            <li>Design Process</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h1 class="mb-4" >Developers</h1>
          <h3><a href="http://www.youtube.com/@mrganeshbochare">GNB CREATOR</a></h3>
          <h3><a href="http://www.youtube.com/@DV_GRAPHICS">DV GRAPHICS</a></h3>
        </div>
      </div>
    </div>
  </footer>
  
</div>

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
</body>
<script>
  var typed = new Typed('#typer', {
      strings: ['Design', 'Create'],
      typeSpeed:80,
      backSpeed:80,
      loop:true,
    });

    // Function to hide the preloader and display the main content
  function showMainContent() {
    document.getElementById("preloader").style.display = "none";
    document.getElementById("main-content").style.display = "block";
  }

  // Call the showMainContent function after 2 seconds (2000 milliseconds)
  setTimeout(showMainContent, 2000);
</script>
</html>
