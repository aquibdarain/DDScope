<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dozen Diamonds</title>
  <link rel="shortcut icon" href="images/favicon.png">

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" /><!-- Fancy Box Popup -->
  <link rel="stylesheet" type="text/css" href="css/menu-styles.css" /> <!--Navigation menu-->

  <!-- carousel -->
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
  <!-- carousel -->


  <link href="css/style-main.css" rel="stylesheet">
</head>
<!-- <style>
  .testimonial-text {
    display: inline; /* Ensures the text and name appear on the same line */
  }

  .cname {
    font-weight: bold; /* Optional: styles the name differently */
  }
</style> -->

<body>

  <div class="se-pre-con"></div>
  <!-- 
  <header id="top">

    <nav class="navbar fixed-top">
      <div class="container">
        <div id="logo">
          <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
        </div>

        <div class="rightnav">
          <div id='cssmenu' class="navigation">
            <ul>
              <li class='active'><a href="<?php echo base_url('') ?>">Home</a></li>
              <li><a href="<?php echo base_url('Home/vision'); ?>">Vision</a></li>
              <?php
              if (!isset($_SESSION['User_id'])) {
                echo '<li><a href="' . base_url('Home/signin') . '">Login</a></li>';
              } else {
                echo '<li><a href="' . base_url('Home/logout') . '">Logout</a></li>';
              }
              ?>
            </ul>
          </div>

          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Links</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('') ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/vision'); ?>">Vision</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/signin'); ?>">Login</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/career'); ?>" style="color: #000;">Careers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/video'); ?>" style="color: #000;">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/ads'); ?>" style="color: #000;">ads</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/blog'); ?>" style="color: #000;">Blog</a>
              </li>
              <?php
              if (!isset($_SESSION['User_id'])) {
                echo '<li class="nav-item">
            <a class="nav-link" href="' . base_url('Home/signup') . '" style="color: #000;">Sign up</a>
          </li>';
              }
              ?>

              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/investor'); ?>" style="color: #000;">Investor's Page</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/waitlist'); ?>" style="color: #000;">Join Waiting list</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/enquire'); ?>" style="color: #000;">Enquire Now</a>
              </li>
              <li class="nav-item investbtn">
                <a class="nav-link" href='https://wefunder.com/dozendiamonds/' target="_blank">Invest</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>


  </header> -->
  <?php include("application/views/header_view.php"); ?>


  <main class="align-self-center">

    <section class="blankSection">
      <div class="banneroverlay"></div>
      <div class="container">
        <div class="row align-items-md-center ">
          <div class="col-lg-6 mobwelcomepic">
            <img src="images/home-img-mob.jpg" alt="" class="img-fluid  d-block mx-auto ">
          </div>
          <div class="col-lg-6">
            <div class="welcometxt">
              <div id="messageContainer" class="message-container mt-5">
                <h2 class="title active" id="message1">
                  WORLD’S FIRST EQUITY INVESTMENT PLATFORM AUTOMATING THE "STRESSLESS TRADING METHOD" TO
                  EARN <a href="https://www.dozendiamonds.com/Home/ads" class="button">EXTRA CASH</a>
                  FOR YOU AT EVERY TRADE.
                </h2>
                <h2 class="title" id="message2">
                  Use a truly mathematical prediction-less strategy that you can clearly understand and trust.
                </h2>
                <h2 class="title" id="message3">
                  Spend time analyzing your portfolio rather than the unpredictable markets.
                </h2>
              </div>

              <p class="pb-3">See what this means for your financial future, sign up for our waitlist and be the first to know!</p>
              <!--<a href="Home/waitlist" class="btn btn-primary">JOIN WAITING LIST</a>-->
              <a href="<?php echo base_url('Home/waitlist'); ?>" class="btn btn-primary">JOIN WAITLIST</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="d-none d-lg-block">
          <img src="images/DD_Mobile_App.png" alt="Mobile App" class="img-fluid  d-block  mx-auto ">
        </div>
        <div class="d-block d-lg-none">
          <img src="images/DD_Mobile_App-mob.png" alt="Mobile App" class="img-fluid  d-block  mx-auto ">
        </div>
      </div>
    </section>

    <section class="testibg" id="testibg">
  <div class="marquee">
    <div class="marquee-content" id="marquee-content">
      <?php
      // print_r($testimonials);exit;

      // Check if $testimonials is set and not empty
      if (isset($testimonials) && !empty($testimonials)) {
        // Loop through each testimonial and generate HTML dynamically
        foreach ($testimonials as $testimonial) {
          echo '<blockquote class="testicontent">';
          echo '<p class="testimonial-text">' . $testimonial->tes_desc . ' - <span class="cname">' . $testimonial->tes_name . '</span></p>';
          echo '</blockquote>';
        }
          foreach ($testimonials as $testimonial) {
          echo '<blockquote class="testicontent">';
          echo '<p class="testimonial-text">' . $testimonial->tes_desc . ' - <span class="cname">' . $testimonial->tes_name . '</span></p>';
          echo '</blockquote>';
        }
      } else {
        // Display a message if there are no testimonials
        echo '<p>No testimonials found.</p>';
      }
      ?>
    </div>
  </div>
</section>



  </main>

  <!-- <footer class="align-self-end">
    <section class="footer">
      <div class="container">
        <ul class="footlist">
          <li><a href='careers.php'>Careers</a> |</li>
          <li><a href='video.php'>Video</a> |</li>
          <li><a href='policy.php'>Privacy Policy</a> </li>
        </ul>
        <p class="copywrite">Copyright &copy; 2024 DozenDiamonds. All Rights Reserved.</p>
      </div>
    </section>
  </footer> -->
  <?php include("application/views/footer.php"); ?>


  <div id="back-top"><a href="#top"><span></span></a> </div>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/topscroll.js"></script>
  <script src="source/jquery.fancybox.js?v=2.1.5"></script>
  <script src="js/scrolla.jquery.min.js"></script>
  <script src="js/menu-script.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    window.onload = function() {
      $(".se-pre-con").fadeOut("slow");
    };
  </script>

  <script>
    $('.fadeOut').owlCarousel({
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      items: 1,
      smartSpeed: 450,
      loop: true,
      autoplay: true,
      dots: false
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const messages = document.querySelectorAll(".message-container h2");
      let currentMessageIndex = 0;

      function showNextMessage() {
        messages[currentMessageIndex].classList.remove("active");
        currentMessageIndex = (currentMessageIndex + 1) % messages.length;
        messages[currentMessageIndex].classList.add("active");
      }

      setInterval(showNextMessage, 5000); // Change message every 3 seconds
    });
  </script>

  <script>
    const marqueeContent = document.getElementById('marquee-content');
    const testibg = document.getElementById('testibg');

    testibg.addEventListener('mouseover', () => {
      marqueeContent.style.animationPlayState = 'paused';
    });

    testibg.addEventListener('mouseout', () => {
      marqueeContent.style.animationPlayState = 'running';
    });
  </script>

</body>

</html>