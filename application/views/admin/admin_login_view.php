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
	
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/locate_new.png'); ?>">

	<!-- Title -->
	<title>Administrator ~ Virtual Globe Technology</title>

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css'); ?>">

	<!-- p-scroll bar css-->
	<link href="<?php echo base_url('assets/admin/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/admin/css/color-styles.css'); ?>" rel="stylesheet" />

	<!-- Dashboard css -->
	<link href="<?php echo base_url('assets/admin/css/style.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/admin/css/dark-style.css'); ?>" rel="stylesheet" />

	<!--Font Awesome css-->
	<link href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.css'); ?>" rel="stylesheet">

	<!---Font icons css-->
	<link href="<?php echo base_url('assets/admin/plugins/iconfonts/plugin.css'); ?>" rel="stylesheet" />

	<!-- COLOR-SKINS -->
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('assets/admin/skins/color-skins/color15.css'); ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/skins/demo.css'); ?>" />
	<script src="<?php echo base_url('assets/admin/js/sha512.js'); ?>"></script>

	<script language="javascript" src="<?php echo base_url('assets/admin/thickbox/jquery/jquery.min.js'); ?>" type='text/javascript'></script>
	<script language="javascript" src="<?php echo base_url('assets/admin/thickbox/thickbox/thickbox.js'); ?>" type="text/javascript"></script>
	<link href="<?php echo base_url('assets/admin/thickbox/thickbox/thickbox.css'); ?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url('assets/admin/scss/bootstrap/_buttons.scss'); ?>" rel='stylesheet' type='text/css' />
</head>

<body class="hold-transition login-page">

	<!-- Global Loader-->
	<div id="global-loader"><img src="<?php echo base_url('assets/admin/images/svgs/loader.svg'); ?>" alt="loader"></div>

	<div class="page custom-pages">
		<div class="container">
			<div class="row">
				<div class="col mx-auto">
					<!-- <div class="text-center mb-6">
							<img src="<?php echo base_url('assets/site/images/brand/logo.png'); ?>" class="" alt="">
						</div> -->
					<div class="row justify-content-center">

						<div class="col-xl-4  col-md-12">
							<div class="card box-widget widget-user">
								<!-- <div class="widget-user-header bg-gradient-primary text-white" style="padding: 20px; height: 140px; border-top-right-radius: 12px; border-top-left-radius: 12px;"> -->
									
								<div class="widget-user-header bg-gradient-primary text-white" style="padding: 20px; height: 140px; border-top-right-radius: 12px; border-top-left-radius: 12px;">
								<center><h4>Administrator Login
									</h4></center>
									<div class="text-center">
									<!-- <img alt="User Avatar" class="col-xl-5" src="<php echo base_url('assets/admin/images/icon.png'); ?>"style="width: 200px; height: 100px;"> -->
									<center><img alt="User Avatar" class="rectangle" src="<?php echo base_url('images/dozendiamond_logo_new.png');?>"
										style="width: 200px; height: 80px;"></center>
									</div>
								</div>
						
						
								<div class="card-body text-center">
									<div class="pro-user">
										<div class="col-md-12">
                                         
										
								
	<?php if(!empty($this->session->flashdata('success'))) { ?>
	
		<div class="alert alert-success col-sm-12" style="text-align:center">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
    <?php } ?> 


    
    
		 <?php if($this->session->flashdata('invalid'))
    {?>
    <p class="alert alert-danger"><?php echo $this->session->flashdata('invalid');?><BR></p>
    <?php
    }?>
    <?php if($this->session->flashdata('captcha'))
    {?>
    <p class="alert alert-danger"><?php echo $this->session->flashdata('captcha');?><BR></p>
    <?php
    }?>
    <?php if($this->session->flashdata('logout'))
    {?>
    <p class="alert alert-succss"><?php echo $this->session->flashdata('logout');?><BR></p>
    <?php
    }?>
    
    <?php if($this->session->flashdata('sessionlaps'))
    {?>
    <p class="login-box-msg callout callout-warning"><?php echo $this->session->flashdata('sessionlaps');?><BR></p>
    <?php
    }?>
                                            <form action="<?= base_url('admin/login/submitLogin') ?>" method="post">
    <div class="form-group">
        <label class="form-label text-left" for="exampleInputEmail1">Username / Email Id</label>
        <input type="email" class="form-control" placeholder="Enter Email" name="admin_useremail" id="exampleInputEmail1" required>
    </div>

    <div class="form-group">
        <label class="form-label text-left" for="inputPassword3">Password</label>
        <input type="password" class="form-control" placeholder="Enter Password" name="admin_password" id="inputPassword3" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="inputCaptcha" class="text-left form-label">Captcha Security Code</label>
        <div class="row">
            <div class="col-sm-5">
                <?= $image; ?>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="admin_captcha" name="admin_captcha" placeholder="Security Code" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="text-left">
        <button type="submit" class="btn btn-info">Sign In</button>
    </div>
</form>

										 
											
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
 
 function getEncryptMd5(passvalue)
 {
	document.getElementById('password').value=calcMD5(passvalue);	
	
 }
 
 </script>
    <script>localStorage.removeItem('remaining');</script>
	<!-- Dashboard js -->
	<script src="<?php echo base_url('assets/admin/js/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/admin/js/vendors/jquery.sparkline.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/admin/js/vendors/selectize.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/admin/js/vendors/jquery.tablesorter.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/admine/js/vendors/circle-progress.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/admin/plugins/jquery.rating/jquery.rating-stars.js'); ?>"></script>

	<!--Bootstrap.min js-->
	<script src="<?php echo base_url('assets/admin/plugins/bootstrap/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<!-- p-scroll bar js-->
	<script src="<?php echo base_url('assets/admin/plugins/p-scroll/p-scroll.js'); ?>"></script>
	<script src="<?php echo base_url('assets/admin/plugins/p-scroll/p-scroll-1.js'); ?>"></script>

	<!--Peitychart js-->
	<script src="<?php echo base_url('assets/admin/plugins/peitychart/jquery.peity.min.js'); ?>"></script>

	<!--Counters js-->
	<script src="<?php echo base_url('assets/admin/plugins/counters/counterup.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/admin/plugins/counters/waypoints.min.js'); ?>"></script>

	<!-- Custom js -->
	<script src="<?php echo base_url('assets/admin/js/custom.js'); ?>"></script>
	
    <script src="<? echo base_url("assets/admin/js/thickbox.js");?>"></script>
</body>
</html>