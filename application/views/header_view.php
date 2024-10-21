<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dozen Diamonds</title>
  <link rel="shortcut icon" href="<?php echo base_url('images/favicon.png') ?>">


  <link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

  <link href="<?php echo base_url('css/animate.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('source/jquery.fancybox.css?v=2.1.5') ?>" media="screen" /><!-- Fancy Box Popup -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/menu-styles.css') ?>" /> <!--Navigation menu-->

  <!-- carousel -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/owl.theme.default.min.css') ?>">
  <!-- carousel -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-**********************" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url('css/style-main.css') ?>" rel="stylesheet">
</head>

<style>
  .custom-button {
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
  }

  .custom-button:hover {
    background-color: #163c4e;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .custom-dropdown-button {
    color: #1e4e65;
    background-color: transparent;
    border: none;
    width: 130px;
    height: 44px;
    font-size: 12px;
    padding: 5px 10px;
    font-weight: bold;
    margin-left: -15px;
  }


  .dropdown-menu a {
    color: #1e4e65;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
  }

  .custom-dropdown-button:hover {
    color: #1e4e65;
  }

  .dropdown-menu {
    text-align: center;
  }

  .dropdown-menu .dropdown-item {
    font-size: 14px;
  }

  .custom-button:hover {
    background-color: #163c4e;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .custom-dropdown-button {
    color: #1e4e65;
    background-color: transparent;
    border: none;
    width: 130px;
    height: 44px;
    font-size: 12px;
    padding: 5px 10px;
    font-weight: bold;
    margin-left: -15px;
  }

  .dropdown-menu a {
    color: #1e4e65;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
  }

  .custom-dropdown-button:hover {
    color: #1e4e65;
  }

  .custom-dropdown-menu {
    margin-left: 22px;
  }

  @media (max-width: 767px) {
    .mobile-font-size {
      font-size: 12px;
      /* Adjust this size as needed */
    }
  }

  @media (max-width: 767px) {
    .navbar-nav .nav-link {
      padding-right: 10px;
      padding-left: 5px;
    }
  }
  
   #toggleButton.btn,
  #toggleConfPasswordButton.btn,
  #togglePasswordButton.btn {
    padding: 3px 10px;
    border-color: #ccc;
    border-radius: 0 4px 4px 0;
  }

</style>

<body>

  <div class="se-pre-con"></div>

  <header id="top">

    <nav class="navbar fixed-top">
      <div class="container">
        <div id="logo">
          <a class="navbar-brand" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('images/logo.png') ?>" alt="logo"></a>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Links</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
<<<<<<< HEAD
          </ul>
=======
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

              <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/career'); ?>" style="color: #000;">Careers</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/video'); ?>" style="color: #000;">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/ads'); ?>" style="color: #000;">ads</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/blog'); ?>" style="color: #000;">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('home/Faq_view'); ?>" style="color: #000;">FAQ's</a>
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
                <a class="nav-link" href="<?php echo base_url('Home/waitlist'); ?>" style="color: #000;">Join Waitlist</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Home/enquire'); ?>" style="color: #000;">Enquire Now</a>
              </li>
              <li class="nav-item investbtn">
                <a class="nav-link" href='https://wefunder.com/dozendiamonds/' target="_blank">Invest</a>
              </li>
            </ul>
          </div>
>>>>>>> d7b4c3740d35bee2dc96027519bbb507d762e6c8
        </div>
      </div>
      </div>
    </nav>

  </header>
  <!-- for navigate the code -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>