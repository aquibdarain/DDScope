<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dozen Diamonds</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/locate_new.png'); ?>">

  <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->
  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <!-- external CSS -->
  <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" />
  <!-- <link href="</?php echo base_url('assets/css/customs.css'); ?>" rel="stylesheet" /> -->
  <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<style>
  @media (max-width: 992px) {
    .navbar-collapse {
      position: absolute;
      top: 95px;
      z-index: 9999;
      background: #319ad1f7;
      width: 100%;
      padding: 10px;
      right: 0px;
    }

    @media (max-width: 992px) {
      .navbar-toggler {
        border: 1px solid #319ad1 !important;
        background: #319ad1;
        height: auto;
        /* margin-top: 71px; */
        /* margin-bottom: 22px; */
        position: absolute;
        right: 0;
        top: 45px;
        margin: 0 0;
      }
    }

    @media (max-width: 820px) {
      .innerbanner {
        min-height: 50px;
        padding-top: 100px;
        color: #333;
      }
    }

    @media (max-width: 820px) {
      .card-box {
        padding: 15px;
        border: 0;
        background: #fff;
        margin: 10px;
        margin-bottom: 50px;
      }
    }
  }

  @media (max-width: 992px) {
    @media (max-width: 820px) {
      .innerbanner {
        min-height: 96px;
        padding-top: 50px;
        color: #333;
      }
    }

    .blog {
      margin: -50px auto;
      text-align: center;
      display: block;
    }

    .innerbanner h1 {
      font-size: 30px;
      margin-bottom: 0px;
      font-weight: bold;
      color: #111a5a;
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      /* margin-top: 0;
    margin-bottom: 0.5rem;
    font-weight: 500; */
      line-height: 1.6;
    }
  }

  .primary-btn {
    background-color: #007bff;
    /* Use your desired primary color */
    color: #fff;
    /* Text color for contrast */
    /* Add any additional styling you need */
  }
</style>

<body>
  <!-- Header Start -->
  <header>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!--  Nav  Start-->
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('images/dozendiamond_logo_new.png'); ?>" border="0" /></a>
            <button class="navbar-toggler navbar-toggler-right collapsed" id="navbarSideCollapse" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
            </button>
            <div class="collapse navbar-collapse offcanvas-collapse" id="navbarsExample06">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(''); ?>">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('Home/vision'); ?>"> Our Vision </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('Home/career'); ?> ">Careers</a>
                </li>
                <!-- <li class="nav-item "> <a class="nav-link" href="blog.html">BLOG</a> </li>-->

                <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BLOG <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="<?php echo base_url('Home/video'); ?>" target="" class="nav-link">Video</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('Home/ads'); ?>" target="" class="nav-link">Ads</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="<?php echo base_url('Home/enquire'); ?>"><button type="button" class="btn enquir-btn">
                      Enquire Now
                    </button></a>
                </li>

                <?php if ($this->session->userdata('is_logged_in')) : ?>
                  <li>
                    <div class="dropdown">
                      <button class="btn enquir-btn dropdown-toggle" type="button" id="myAccountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        My Account
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="myAccountDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('Home/notifymepage'); ?>">Manage Preferences</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('Home/profile'); ?>">My Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('Home/logout'); ?>">Logout</a></li>
                      </ul>
                    </div>
                  </li>
                <?php else : ?>

                  <li>
                    <a href="<?php echo base_url('Home/signup'); ?>"><button type="button" class="btn enquir-btn">
                        Sign Up
                      </button></a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('Home/signin'); ?>"><button type="button" class="btn enquir-btn">
                        Sign In
                      </button></a>
                  </li>
                 

                <?php endif; ?>
              </ul>
            </div>
          </nav>
          <!--  Nav  end-->
        </div>
      </div>
    </div>
  </header>