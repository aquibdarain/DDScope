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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-**********************" crossorigin="anonymous" />

</head>
<style>
  @media (max-width: 992px) {
    .navbar-collapse {
      position: absolute;
      top: 95px;
      z-index: 9999;
      background: #def4ff;
      width: 100%;
      padding: 10px;
      right: 1px;
    }

    @media (max-width: 992px) {
      .navbar-toggler {
        border: 1px solid #319ad1 !important;
        background: #1d4e66;
        height: auto;
        /* margin-top: 71px; */
        /* margin-bottom: 22px; */
        position: absolute;
        right: 0px;
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
        /* margin-left: 20px; */
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

  h1,
  h2,
  h3,
  h4,
  h5 {
    margin: 1.5rem 0;
    font-family: 'Montserrat';
  }

  .primary-btn {
    background-color: #007bff;
    color: #fff;
  }

  @media (max-width: 992px) {
    @media (max-width: 820px) {
      .innerbanner {
        min-height: 0px;
        padding-top: 0px;
        color: #333;
      }
    }
  }

  .innerbanner {
    min-height: 10px;
    padding-top: 0px;
    color: #333;
  }

  .enquir-btn {
    background: #1d4e66;
    color: #fff;
    border: none;
    border-radius: 20px;
    font-size: 11px;
    padding: 8px 12px;
    line-height: 25px;
    font-weight: 700;
    font-family: 'Montserrat';
    margin-top: -1px;
    text-transform: uppercase;
    margin-left: 11px;
  }

  body {
    font-family: 'Montserrat', sans-serif;
  }

  @media (max-width: 992px) {
    .row>* {
      flex-shrink: 0;
      width: 100%;
      max-width: 100%;
      padding-right: calc(var(--bs-gutter-x)* .5);
      padding-left: calc(var(--bs-gutter-x)* .5);
      margin-top: var(--bs-gutter-y);
    }

    .form-check {
      display: block;
      min-height: 1rem;
      padding-left: 0rem;
      margin-bottom: .125rem;
    }

    /* to handle the width of the calander box  */
    .form-control {
      display: block;
      width: 100%;
      padding: .2rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1;
      color: #212529;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: .375rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    footer {
      background: #1e2f4d;
      padding: 100px 0 30px;
      font-size: 14px;
      color: #fff;
      font-weight: 300;
      position: relative;
      z-index: 0;
      margin-top: -89px;
      min-height: 185px;
      margin-right: 0px;
    }


  }

  /* to adjust size of the background effect of the buttons */
  .navbar-expand-lg .navbar-nav .nav-link {
    padding: 7px 9px;
    color: #121846;
    margin: 2px 5px;
  }
</style>

<body>
  <!-- Header Start -->

  <!-- sticky header -->
  <header class="sticky-top" style="background-color: #def4ff;">

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!--  Nav  Start-->
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?php echo base_url(''); ?>"><img height="75px" width="260px" src="<?php echo base_url('images/dozendiamond_new1.png'); ?>" border="0" /></a>
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

                <!-- <li>
                    <a href="https://wefunder.com/dozendiamonds/" target="_blank">
                      <button type="button" class="btn enquir-btn" style="background-color: #1D4E66; color: white;">
                        <span style="margin-right: 5px;">Invest</span> <i class="fas fa-external-link-alt fa-m"></i>
                      </button>
                    </a>
                  </li> -->

                <!-- Profile avatar section -->



                <?php if ($this->session->userdata('is_logged_in')) : ?>
                  <li>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home/waitlist'); ?>">Join Waitlist</a>
                  </li>

                  <li class="nav-item mb-2">
                    <a class="nav-link" href="<?php echo base_url('Home/enquire'); ?>">Enquire Now</a>
                  </li>
                  </li>
                  <li>
                    <a href="https://wefunder.com/dozendiamonds/" target="_blank">
                      <button type="button" class="btn enquir-btn" style="background-color: #1D4E66; color: white;">
                        <span style="margin-right: 5px;">Invest</span> <i class="fas fa-external-link-alt fa-m"></i>
                      </button>
                    </a>
                  </li>
                  <div class="dropdown">
                    <button class="btn enquir-btn dropdown-toggle" type="button" id="myAccountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      My Account
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="myAccountDropdown">
                      <li><a class="dropdown-item" href="<?php echo base_url('Home/notifymepage'); ?>">Manage Preferences</a></li>
                      <!-- <li><a class="dropdown-item" href="<?php echo base_url('#'); ?>">My Profile</a></li> -->
                      <li><a class="dropdown-item" href="<?php echo base_url('Home/logout'); ?>">Logout</a></li>
                    </ul>
                  </div>

                  <div class="profile-section">
                    <?php if (!empty($user_name)) : ?>
                      <!-- Display user's profile photo -->
                      <div class="avatar-placeholder rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; border: 2px solid #fff; background-color: #181633ab; font-size: 20px; color: #fff;">
                        <?php echo strtoupper(substr($user_name, 0, 1)); ?>
                      </div>
                    <?php endif; ?>
                    <!-- Profile dropdown -->
                    <div class="dropdown">
                      <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('Home/notifymepage'); ?>">Manage Preferences</a></li>
                        <!-- Add more profile options here if needed -->
                        <li><a class="dropdown-item" href="<?php echo base_url('Home/logout'); ?>">Logout</a></li>
                      </ul>
                    </div>
                  </div>

                <?php else : ?>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home/signup'); ?>">Sign Up</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home/signin'); ?>">Sign In</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home/waitlist'); ?>">Join Waitlist</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Home/enquire'); ?>">Enquire Now</a>
                  </li>


                  <!-- <li style="margin-right: 1px;"></li> -->

                  <!-- <li>
                    <a href="https://wefunder.com/dozendiamonds/">
                      <button type="button" class="btn enquir-btn" style="background-color: #1D4E66; color: white;">
                        Invest
                      </button>
                    </a>
                  </li> -->

                  <!-- <li>
                    <a href="https://wefunder.com/dozendiamonds/" target="_blank">
                      <button type="button" class="btn enquir-btn" style="background-color: #1D4E66; color: white;">
                        Invest <i class="fas fa-external-link-alt"></i>
                      </button>
                    </a>
                  </li> -->
                  <li>
                    <a href="https://wefunder.com/dozendiamonds/" target="_blank">
                      <button type="button" class="btn enquir-btn" style="background-color: #1D4E66; color: white;">
                        <span style="margin-right: 5px;">Invest</span> <i class="fas fa-external-link-alt fa-m"></i>
                      </button>
                    </a>
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
</body>