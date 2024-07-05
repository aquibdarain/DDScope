<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Administrator Login ~ Virtual Globe Technology" name="description">
    <meta content="Administrator Login ~ Virtual Globe Technology" name="author">
    <meta name="keywords" content="Administrator Login ~ Virtual Globe Technology" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/locate_new.png'); ?>">

    <!-- Title -->
    <title>Administrator ~ Virtual Globe Technology</title>

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css'); ?>">

    <!-- p-scroll bar css-->
    <link href="<?= base_url('assets/admin/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/css/color-styles.css'); ?>" rel="stylesheet" />

    <!-- Dashboard css -->
    <link href="<?= base_url('assets/admin/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/css/dark-style.css'); ?>" rel="stylesheet" />

    <!--Font Awesome css-->
    <link href="<?= base_url('assets/admin/plugins/fontawesome-free/css/all.css'); ?>" rel="stylesheet">

    <!---Font icons css-->
    <link href="<?= base_url('assets/admin/plugins/iconfonts/plugin.css'); ?>" rel="stylesheet" />

    <!-- COLOR-SKINS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/admin/skins/color-skins/color15.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/skins/demo.css'); ?>" />
    <script src="<?= base_url('assets/admin/js/sha512.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/thickbox/jquery/jquery.min.js'); ?>" type='text/javascript'></script>
    <script src="<?= base_url('assets/admin/thickbox/thickbox/thickbox.js'); ?>" type="text/javascript"></script>
    <link href="<?= base_url('assets/admin/thickbox/thickbox/thickbox.css'); ?>" rel='stylesheet' type='text/css' />
    <link href="<?= base_url('assets/admin/scss/bootstrap/_buttons.scss'); ?>" rel='stylesheet' type='text/css' />
</head>

<body class="hold-transition login-page">

    <!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url('assets/admin/images/svgs/loader.svg'); ?>" alt="loader"></div>

    <div class="page custom-pages">
        <div class="container">
            <div class="row">
                <div class="col mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-12">
                            <div class="card box-widget widget-user">
                                <div class="widget-user-header bg-gradient-primary text-white" style="padding: 20px; height: 140px; border-top-right-radius: 12px; border-top-left-radius: 12px;">
                                    <center>
                                        <h4>Administrator Login</h4>
                                    </center>
                                    <div class="text-center">
                                        <center><img alt="User Avatar" class="rectangle" src="<?= base_url('images/loading.png'); ?>" style="width: 200px; height: 80px;"></center>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="pro-user">
                                        <div class="col-md-12">
                                            <?php if (!empty($this->session->flashdata('success'))) { ?>
                                                <div class="alert alert-success col-sm-12" style="text-align:center">
                                                    <?= $this->session->flashdata('success'); ?>
                                                </div>
                                            <?php } ?>
                                            <?php if ($this->session->flashdata('invalid')) { ?>
                                                <p class="alert alert-danger"><?= $this->session->flashdata('invalid'); ?><BR></p>
                                            <?php } ?>
                                            <?php if ($this->session->flashdata('captcha')) { ?>
                                                <p class="alert alert-danger"><?= $this->session->flashdata('captcha'); ?><BR></p>
                                            <?php } ?>
                                            <?php if ($this->session->flashdata('logout')) { ?>
                                                <p class="alert alert-succss"><?= $this->session->flashdata('logout'); ?><BR></p>
                                            <?php } ?>
                                            <?php if ($this->session->flashdata('sessionlaps')) { ?>
                                                <p class="login-box-msg callout callout-warning"><?= $this->session->flashdata('sessionlaps'); ?><BR></p>
                                            <?php } ?>
                                            <?= form_open('admin/login/submitLogin'); ?>
                                            <div class="form-group">
                                                <label class="form-label text-left" for="exampleInputEmail1">Username / Email Id</label>
                                                <?= form_input(['type' => 'email', 'class' => 'form-control', 'placeholder' => 'Enter Email', 'name' => 'admin_useremail', 'id' => 'exampleInputEmail1', 'required' => 'required']); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label text-left" for="inputPassword3">Password</label>
                                                <?= form_password(['class' => 'form-control', 'placeholder' => 'Enter Password', 'name' => 'admin_password', 'id' => 'inputPassword3', 'autocomplete' => 'off', 'required' => 'required']); ?>
                                            </div>
                                           <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                                                <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                                            </div>
                                            <div class="text-left">
                                                <?= form_submit(['class' => 'btn btn-info', 'value' => 'Sign In']); ?>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getEncryptMd5(passvalue) {
            document.getElementById('password').value = calcMD5(passvalue);
        }
    </script>
    <script>
        localStorage.removeItem('remaining');
    </script>
    <!-- Dashboard js -->
    <script src="<?= base_url('assets/admin/js/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/vendors/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/vendors/selectize.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/vendors/jquery.tablesorter.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admine/js/vendors/circle-progress.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/plugins/jquery.rating/jquery.rating-stars.js'); ?>"></script>

    <!--Bootstrap.min js-->
    <script src="<?= base_url('assets/admin/plugins/bootstrap/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- p-scroll bar js-->
    <script src="<?= base_url('assets/admin/plugins/p-scroll/p-scroll.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/plugins/p-scroll/p-scroll-1.js'); ?>"></script>

    <!--Peitychart js-->
    <script src="<?= base_url('assets/admin/plugins/peitychart/jquery.peity.min.js'); ?>"></script>

    <!--Counters js-->
    <script src="<?= base_url('assets/admin/plugins/counters/counterup.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/plugins/counters/waypoints.min.js'); ?>"></script>

    <!-- Custom js -->
    <script src="<?= base_url('assets/admin/js/custom.js'); ?>"></script>

    <script src="<?= base_url('assets/admin/js/thickbox.js'); ?>"></script>

    <!-- Captcha API -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>