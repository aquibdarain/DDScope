<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trading Platform</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
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


    <link href="<?php echo base_url('css/style-main.css') ?>" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: linear-gradient(90deg, #0047ab, #005ecb);
            padding: 20px 0;
        }

        header .navbar-brand {
            font-size: 1.5em;
            font-weight: bold;
        }

        header .nav-link {
            color: #fff !important;
            margin-right: 20px;
            font-weight: 500;
        }

        .hero {
            background: url('../images/home-img.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 200px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        .hero .btn {
            font-size: 1.2em;
            padding: 15px 30px;
        }

        .section {
            padding: 80px 20px;
        }

        .section h2 {
            font-size: 2.5em;
            margin-bottom: 40px;
            font-weight: bold;
            position: relative;
            display: inline-block;
        }

        .section h2::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background-color: #ff5722;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .features .card,
        .benefits .card,
        .testimonials .card,
        .pricing .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .features .card:hover,
        .benefits .card:hover,
        .testimonials .card:hover,
        .pricing .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .features .card-body,
        .benefits .card-body {
            padding: 40px;
        }

        .pricing .card-body {
            padding: 60px;
        }

        .team-member,
        .testimonial-item {
            margin-bottom: 20px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        footer {
            background: #333;
            color: #fff;
            padding: 40px 20px;
            text-align: center;
        }

        footer a {
            color: #ff5722;
            text-decoration: none;
        }

        .footer-links a {
            font-weight: bold;
        }

        .faq-section {
            background-color: #f9f9f9;
            padding: 60px 20px;
        }

        .faq-section .faq-title {
            font-size: 2em;
            margin-bottom: 30px;
        }

        .faq-section .faq-item {
            margin-bottom: 20px;
        }

        .faq-section .faq-item .faq-question {
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .faq-section .faq-item .faq-answer {
            display: none;
            padding-left: 20px;
            color: #333;
        }
    </style>
</head>

<body>

    <header id="top">

        <nav class="navbar fixed-top">
            <div class="container">
                <div id="logo">
                    <a class="navbar-brand" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('images/logo.png') ?>" alt="logo"></a>
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
                </div>
            </div>
        </nav>

    </header>

    <style>
        .hero {
            text-align: left;
        }

        .hero .container {
            text-align: left;
        }

        .hero h1,
        .hero p,
        .hero .btn {
            text-align: left;
        }
    </style>
    <section class="hero">
        <div class="container" style="text-align: left; color: black;">
            <h1>Welcome to Our</h1>
            <h1> Featured Quotes</h1>
            <p>Trade smarter, not harder.</p>
            <a href="#signup" class="btn btn-warning btn-lg">Get Started</a>
        </div>
    </section>
    <section id="articles" class="section articles">
        <div class="container">
            <h2 class="text-center mb-4">Featured Quotes</h2>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Define the specific testimonials to display
                    $specificTestimonials = [
                        (object)[
                            'tes_id' => 27,
                            'tes_name' => '<a href="https://www.benzinga.com/content/39029565/financial-solutions-provider-dozen-diamonds-calls-for-investors-to-disrupt-retail-trading" target="_blank">Benzinga</a>',
                            'tes_desc' => 'Rather than obsessing over daily stock prices, traders are encouraged to think like business owners - focusing on cash flow rather than asset prices.'
                        ],
                        (object)[
                            'tes_id' => 28,
                            'tes_name' => '<a href="https://markets.businessinsider.com/news/stocks/dozen-diamonds-is-set-to-launch-an-app-to-alleviate-financial-stress-in-retail-trading-1033413318" target="_blank">Business Insider</a>',
                            'tes_desc' => 'Dozen Diamonds\' overarching vision is to create financial tools that enhance the lives of families by making financial decisions less stressful and more intuitive.'
                        ]
                    ];
                    ?>

                    <div class="container mt-5">
                        <div class="row">
                            <?php foreach ($specificTestimonials as $testimonial) : ?>
                                <div class="col-lg-6 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><?php echo $testimonial->tes_name; ?></h3>
                                            <p class="card-text"><?php echo $testimonial->tes_desc; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <style>
        .card {
            margin-bottom: 1.5rem;
        }
    </style>


    <section id="features" class="section features">
        <div class="container">
            <h2 class="text-center mb-4">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line fa-3x mb-3"></i>
                            <h3 class="card-title">Real-Time Data</h3>
                            <p>Access real-time market data to make informed decisions. Our platform provides up-to-the-minute data to ensure you are always ahead of the curve.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-tachometer-alt fa-3x mb-3"></i>
                            <h3 class="card-title">Customizable Dashboards</h3>
                            <p>Tailor your trading environment to suit your needs. Customize your dashboard with widgets and tools that are most relevant to your trading style.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-pie fa-3x mb-3"></i>
                            <h3 class="card-title">Advanced Charting Tools</h3>
                            <p>Utilize our advanced tools for better analysis. From technical indicators to drawing tools, our charting suite has everything you need to perform in-depth market analysis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="benefits" class="section benefits">
        <div class="container">
            <h2 class="text-center mb-4">Benefits</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-cogs fa-3x mb-3"></i>
                            <h3 class="card-title">Efficient Trading</h3>
                            <p>Streamline your trading process with our platform. Enjoy fast execution, minimal latency, and an intuitive interface designed for traders of all levels.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-lightbulb fa-3x mb-3"></i>
                            <h3 class="card-title">Data-Driven Insights</h3>
                            <p>Make better decisions with powerful insights. Our platform leverages machine learning and AI to provide you with actionable insights and predictions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-shield-alt fa-3x mb-3"></i>
                            <h3 class="card-title">Secure and Reliable</h3>
                            <p>Trade with confidence knowing your data is secure. Our platform uses advanced security measures to protect your information and ensure system reliability.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="section testimonials bg-light">
        <div class="container">
            <h2 class="text-center mb-4">What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="testimonial-item">
                                <p>"This platform has revolutionized the way I trade. The real-time data and customizable dashboards are game-changers."</p>
                                <h5>- John D.</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="testimonial-item">
                                <p>"I've tried many trading platforms, but this one is by far the best. The advanced charting tools are exactly what I need."</p>
                                <h5>- Sarah K.</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="testimonial-item">
                                <p>"The efficiency and reliability of this platform are unparalleled. I can trust it to execute my trades quickly and securely."</p>
                                <h5>- Michael B.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="section pricing">
        <div class="container">
            <h2 class="text-center mb-4">Pricing Plans</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="card-title">Basic</h3>
                            <h4 class="card-price">$29<span>/month</span></h4>
                            <ul class="list-unstyled">
                                <li>Access to real-time data</li>
                                <li>Basic charting tools</li>
                                <li>Email support</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Sign Up</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="card-title">Standard</h3>
                            <h4 class="card-price">$49<span>/month</span></h4>
                            <ul class="list-unstyled">
                                <li>Access to real-time data</li>
                                <li>Advanced charting tools</li>
                                <li>Priority email support</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Sign Up</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="card-title">Premium</h3>
                            <h4 class="card-price">$99<span>/month</span></h4>
                            <ul class="list-unstyled">
                                <li>All Standard features</li>
                                <li>Personalized trading advice</li>
                                <li>24/7 support</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section about bg-light">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/400" alt="About Us" class="img-fluid rounded mb-4">
                </div>
                <div class="col-md-8">
                    <p>Our trading platform was built by traders for traders. We understand the challenges faced by modern traders and have designed a platform that addresses these challenges. With a focus on reliability, speed, and usability, our platform is ideal for traders of all levels.</p>
                    <p>Our mission is to provide a powerful and intuitive trading environment that empowers traders to make better decisions and achieve their trading goals.</p>
                </div>
            </div>
        </div>
    </section>


    <div class="container my-5">
        <h1 class="text-center">Frequently Asked Questions</h1>
        <div id="accordion">
            <?php foreach ($faqs as $index => $faq): ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $index; ?>">
                        <h5 class="mb-0 d-flex justify-content-between align-items-center">
                            <span class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                                <?php echo $faq->question; ?>
                            </span>
                            <i class="fas fa-plus-circle" data-toggle="collapse" data-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>"></i>
                        </h5>
                    </div>
                    <div id="collapse<?php echo $index; ?>" class="collapse" aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordion">
                        <div class="card-body">
                            <?php echo $faq->answer; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-warning">Start Investing</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#accordion .card-header').on('click', function() {
                var icon = $(this).find('i');
                if (icon.hasClass('fa-plus-circle')) {
                    icon.removeClass('fa-plus-circle').addClass('fa-minus-circle');
                } else {
                    icon.removeClass('fa-minus-circle').addClass('fa-plus-circle');
                }
                $('#accordion .card-header').not(this).find('i').removeClass('fa-minus-circle').addClass('fa-plus-circle');

                // Toggle the background color of the card header
                $(this).toggleClass('active-header');
                $('#accordion .card-header').not(this).removeClass('active-header');

                // Toggle text color
                $(this).find('.btn-link').toggleClass('text-white');
                $('#accordion .card-header').not(this).find('.btn-link').removeClass('text-white');
            });
        });
    </script>


    <style>
        .faq-section {
            padding-top: 40px;
            /* Adjust as needed */
            padding-bottom: 40px;
            /* Adjust as needed */
        }

        .faq-title {
            margin-bottom: 30px;
            /* Adjust as needed */
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .question-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .plus-icon {
            padding: 0;
            /* Optional: Remove default padding */
            margin-left: auto;
            /* Align to the right */
        }

        .fa-plus:before {
            content: "\f067";
            margin-left: 400px;
        }

        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .card-header {
            background-color: #e9ecef;
            cursor: pointer;
        }

        .card-header .btn-link {
            color: #333;
            font-weight: bold;
            text-decoration: none;
            width: 100%;
            text-align: left;
            padding: 1rem;
            cursor: pointer;
        }

        .card-header .btn-link:hover,
        .card-header .btn-link:focus {
            text-decoration: none;
        }

        .card-body {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-top: 1px solid #e9ecef;
        }

        .active-header {
            background-color: #4b809f !important;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            font-weight: bold;
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .card-header .btn-link {
            color: #333;
            font-weight: bold;
            text-decoration: none;
            width: 100%;
            text-align: left;
            padding: 1rem;
            cursor: pointer;
            transition: color 0.3s ease;
            /* Smooth transition for color change */
        }

        .card-header .btn-link:hover,
        .card-header .btn-link:focus {
            text-decoration: none;
        }

        .active-header {
            background-color: #4b809f !important;
            color: white;
        }

        .text-white {
            color: white !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.plus-icon').click(function() {
                $(this).find('i').toggleClass('fa-plus fa-minus');
            });
        });
    </script>

    <section id="contact" class="section contact">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Get in Touch</h4>
                    <p>If you have any questions or need assistance, please do not hesitate to contact us. We are here to help you.</p>
                    <p><i class="fas fa-envelope"></i> Email: contact@dozendiamonds.com</p>
                    <p><i class="fas fa-phone"></i> Phone: +1 (617) 501-9021</p>
                    <p><i class="fas fa-map-marker-alt"></i> Address: 625 Piedmont Ave NE, unit 4001, Atlanta, GA 30308, USA.</p>
                </div>
                <div class="col-md-6">
                    <?php if ($this->session->flashdata('success_message')) : ?>
                        <div class="alert alert-success alert-dismissible" id="success-alert">
                            <?php echo $this->session->flashdata('success_message'); ?>
                            <button type="button" class="close" id="close-success-alert">x</button>
                        </div>
                    <?php elseif ($this->session->flashdata('error_message')) : ?>
                        <div class="alert alert-danger alert-dismissible" id="error-alert">
                            <?php echo $this->session->flashdata('error_message'); ?>
                            <button type="button" class="close" id="close-error-alert">x</button>
                        </div>
                    <?php endif; ?>
                    <h4>Contact Form</h4>

                    <?= form_open('home/Contactus_submit', array('class' => 'row g-3', 'onsubmit' => 'return validateForm()')); ?>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="validationDefault01" class="form-label">Name<span style="color: red;">*</span></label>
                        <?= form_input(array('type' => 'text', 'name' => 'name', 'id' => 'name', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="nameError" class="text-danger" style="display: none">Please enter your name</span>
                    </div>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                        <?= form_input(array('type' => 'text', 'name' => 'email', 'id' => 'validationDefault03', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="emailError" class="text-danger" style="display: none">Please enter valid email</span>
                    </div>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="validationDefault02" class="form-label">Contact Number<span style="color: red;">*</span></label>
                        <?= form_input(array('type' => 'text', 'name' => 'contactnumber', 'id' => 'contactnumber', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="contactnumberError" class="text-danger" style="display: none">Please enter your contact number</span>
                    </div>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="exampleInputEmail1" class="form-label">Message<span style="color: red;">*</span></label>
                        <?= form_textarea(array('name' => 'message', 'id' => 'message', 'rows' => '3', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="messageError" class="text-danger" style="display: none">Please enter your message</span>
                    </div>

                    <div class="form-group pb-2">
                        <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                        <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                    </div>

                    <div class="col-lg-12">
                        <?= form_submit(array('class' => 'btn btn-primary enquir-btn', 'id' => 'submitButton'), 'SUBMIT'); ?>
                    </div>

                    <?= form_close(); ?>

                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </div>
            </div>
        </div>
    </section>

    <?php include("application/views/footer.php"); ?>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.faq-question').click(function() {
                $(this).next('.faq-answer').slideToggle();
            });
        });
    </script>
    <script>
        function validateForm() {
            var valid = true;

            if (document.getElementById('name').value === '') {
                document.getElementById('nameError').style.display = 'block';
                valid = false;
            } else {
                document.getElementById('nameError').style.display = 'none';
            }

            var email = document.getElementById('validationDefault03').value;
            var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                document.getElementById('emailError').style.display = 'block';
                valid = false;
            } else {
                document.getElementById('emailError').style.display = 'none';
            }

            if (document.getElementById('contactnumber').value === '') {
                document.getElementById('contactnumberError').style.display = 'block';
                valid = false;
            } else {
                document.getElementById('contactnumberError').style.display = 'none';
            }

            if (document.getElementById('message').value === '') {
                document.getElementById('messageError').style.display = 'block';
                valid = false;
            } else {
                document.getElementById('messageError').style.display = 'none';
            }

            if (grecaptcha.getResponse() === '') {
                document.getElementById('recaptchaError').style.display = 'block';
                valid = false;
            } else {
                document.getElementById('recaptchaError').style.display = 'none';
            }

            return valid;
        }
    </script>

</body>

</html>