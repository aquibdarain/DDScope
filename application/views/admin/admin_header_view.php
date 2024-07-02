<!doctype html>
<html lang="en" dir="ltr">

<head>
	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="Admin ~ Virtual Globe Technology" name="description">
	<meta content="Admin ~ Virtual Globe Technology" name="author">
	<meta name="keywords" content="bootstrap panel, bootstrap admin template, dashboard template, bootstrap dashboard, dashboard design, best dashboard, html css admin template, html admin template, admin panel template, admin dashbaord template, bootstrap dashbaord template, it dashbaord, hr dashbaord, marketing dashbaord, sales dashbaord, dashboard ui, admin portal, bootstrap 4 admin template, bootstrap 4 admin" />

	<!-- <link rel="shortcut icon" type="image/x-icon" href="</?php echo base_url('assets/images/locate_new.png'); ?>" /> -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/locate_new.png'); ?>">

	<!-- Title -->
	<title>Admin ~ Virtual Globe Technology</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/bootstrap/css/bootstrap.min.css'); ?>">

	<link href="<?php echo base_url('assets/admin/picture.css'); ?>" rel="stylesheet" />
	<!--Font Awesome-->
	<link href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.css'); ?>" rel="stylesheet">
	<!-- WYSIWYG Editor css -->
	<link href="<?php echo base_url('assets/admin/plugins/jquery.richtext/richtext.min.css'); ?>" rel="stylesheet" />

	<!-- Dashboard Css -->
	<link href="<?php echo base_url('assets/admin/css/style.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/admin/styleh.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/admin/css/dark-style.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/admin/css/color-styles.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/admin/css/skin-modes.css'); ?>" rel="stylesheet" />

	<!-- vector-map -->
	<link href="<?php echo base_url('assets/admin/plugins/jquery.vmap/jqvmap.min.css'); ?>" rel="stylesheet">
	<!-- p-scroll bar css-->
	<link href="<?php echo base_url('assets/admin/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="<?php echo base_url('assets/admin/css/sidemenu.css'); ?>" rel="stylesheet">

	<!-- Sidebar css -->
	<link href="<?php echo base_url('assets/admin/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

	<!-- morris Charts Plugin -->
	<link href="<?php echo base_url('assets/admin/plugins/morris/morris.css'); ?>" rel="stylesheet" />

	<!---Font icons-->
	<link href="<?php echo base_url('assets/admin/plugins/iconfonts/plugin.css'); ?>" rel="stylesheet" />


	<!-- COLOR-SKINS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/admin/skins/demo.css'); ?>" />

<body class="app sidebar-mini rtl" style="background-color:#f1f1f1;">

	<!-- Global Loader-->
	<div id="global-loader"><img src="<?php echo base_url('assets/admin/images/loader.svg'); ?>" alt="loader"></div>

	<div class="page">
		<div class="page-main">

			<!-- Navbar-->
			<header class="app-header header">
				<!-- Navbar Right Menu-->
				<div class="container-fluid">
					<div class="d-flex">
						<a class="header-brand" href="<?php echo base_url('admin/dashboard') ?>">
							<img alt="logo" class="header-brand-img main-logo" style="width: 150px; height: 55px;" src="<?php echo base_url('assets/admin/images/dozendiamond_logo_new.png'); ?>">

						</a>
						<!-- Sidebar toggle button-->
						<a aria-label="Hide Sidebar" class="app-sidebar__toggle" style="color:#271956;" data-toggle="sidebar" href="#"></a>

						<div class="dropdown d-sm-flex d-none">

							<div class="dropdown-menu header-search dropdown-menu-left dropdown-menu-arrow">
								<div class="input-group w-100 p-2">
									<input type="text" class="form-control " placeholder="Search....">
									<div class="input-group-append ">
										<button type="button" class="btn btn-primary ">
											<i class="fas fa-search" aria-hidden="true"></i>
										</button>
									</div>
								</div>
							</div>

						</div>

						<div class="dropdown d-sm-flex d-none header-message">
						</div>

						<div class="d-flex order-lg-2 ml-auto">

							<div class="dropdown d-none d-md-flex">


							</div><!-- flag -->
							<div class="dropdown d-sm-flex d-none header-message">


							</div>
							<div class="dropdown d-sm-flex d-none header-message">
								<div class="d-sm-flex d-none">
									<a href="#" class="nav-link icon full-screen-link">
										<i class="fe fe-minimize fullscreen-button"></i>
									</a>
								</div>

							</div>

							<!--Navbar -->
							<div class="dropdown">
								<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
									<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url('assets/admin/images/avatarimage.jpg'); ?>"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<div class="drop-heading pb-2">
										<div class="text-center">
											<h4 class="" style="font-size:19.7px;">Admin</h4>
											<small class="text-muted"></small>
										</div>
									</div>

									<div class="dropdown-divider m-0"></div>

									<a class="dropdown-item" href="<? echo base_url('admin/dashboard'); ?>"><i class="dropdown-icon si si-home"></i>Home</a>

									<a class="dropdown-item" href="<?php echo base_url('admin/Login/logout'); ?>"><i class="dropdown-icon fe fe-power"></i> Log Out</a>
									<div class="dropdown-divider"></div>

									<!-- Sidebar toggle button-->

								</div>
							</div>

							<div class="dropdown d-md-flex header-settings">
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-sm-none bg-white">
				<div class="collapse navbar-collapse" id="navbarSupportedContent-4">

				</div>
			</div>
			<!--/.Navbar -->

			<!-- Sidebar menu-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
			<aside class="app-sidebar" style="overflow: scroll;">
				<div class="app-sidebar__user">
					<div class="user-body">
						<span class="avatar avatar-lg brround text-center cover-image" data-image-src="<?php echo base_url('assets/admin/images/avatarimage.jpg'); ?>"></span>
					</div>
					<div class="user-info">
						<a href="#" class="ml-2"><span class="mr-3 text-dark app-sidebar__user-name font-weight-semibold">Admin</span><br>
							<span class="text-muted app-sidebar__user-name text-sm"></span>
						</a>
					</div>

				</div>
				<ul class="side-menu">
					<li class="slide">
						<a class="side-menu__item " data-toggle="slide" href="<?php echo base_url('admin/dashboard/index'); ?>"><i class="side-menu__icon si si-home"></i><span class="side-menu__label">Home</span></a>

					</li>

					<!-- <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="<?php echo base_url('admin/banner/addBanner'); ?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Header Banner</span></a>
							</li> -->

					<li>
						<a class="side-menu__item" href="<?php echo base_url('admin/User/index'); ?>"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">User Management</span></a>
					</li>

					<li>
						<a class="side-menu__item" href="<?php echo base_url('admin/Delete_acc/index'); ?>"><i class="side-menu__icon fa fa-trash"></i><span class="side-menu__label">Delete Account Management</span></a>
					</li>

					<li>
						<a class="side-menu__item" href="<?php echo base_url('admin/Delete_acc/acceptRequest'); ?>"><i class="side-menu__icon fas fa-check-circle"></i><span class="side-menu__label">Accept Deletion Request Account Management</span></a>
					</li>

					<li>
						<a class="side-menu__item" href="<?php echo base_url('admin/Delete_acc/rejectRequest'); ?>"><i class="side-menu__icon fa fa-window-close"></i><span class="side-menu__label">Reject Deletion Request Account Management</span></a>
					</li>

					<li>
						<a class="side-menu__item" href="<?php echo base_url('admin/User/send_verification_mail'); ?>">
							<i class="side-menu__icon fa fa-envelope user-profile-statistics-icon"></i>
							<span class="side-menu__label">Email Verification Management</span>
						</a>
					</li>

					<li>
						<a class="side-menu__item" href="<?php echo base_url('admin/blog/index'); ?>"><i class="side-menu__icon si si-layers"></i><span class="side-menu__label">Blogs</span></a>
					</li>

					<li>
						<a class="side-menu__item" href="<?php echo base_url('admin/testimonial/index'); ?>"><i class="side-menu__icon fa fa-comments"></i><span class="side-menu__label">Testimonials</span></a>
					</li>

                    <li>
						<a class="side-menu__item" href="<?php echo base_url('admin/contactus/index'); ?>"><i class="side-menu__icon si si-user"></i><span class="side-menu__label">Contactus</span></a>
					</li>



					<!-- <ul class="slide-menu">
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/banner/addBanner');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Home Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/bannerA/addBannerA');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">About Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/bannerB/addBannerB');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Services Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/bannerC/addBannerC');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Projects Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/bannerE/addBannerE');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Products Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //pphp echo base_url('admin/bannerF/addBannerF');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Team Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/bannerG/addBannerG');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Client Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/bannerH/addBannerH');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Testimonial Banner</span></a>
							</li>
							
							<li>
							<a class="slide-item" href="<? //php echo base_url('admin/bannerD/addBannerD');
														?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Contacts Banner</span></a>
							</li> -->

					<!-- </ul>
						</li> -->

					<!-- <li>
							<a class="side-menu__item" href="<?php echo base_url('admin/aboutus/index'); ?>"><i class="side-menu__icon fa fa-building"></i><span class="side-menu__label">About Us</span></a>
						</li>	
						
						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/traveller/index'); ?>"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Traveller Management</span></a>
						</li> 

						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/Planner/index'); ?>"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Planner Management</span></a>
						</li> 
                

						<li>
							<a class="side-menu__item" href="<?php echo base_url('api/Create_itinerary/index'); ?>"><i class="side-menu__icon si si-layers"></i><span class="side-menu__label">Itineraries</span></a>
						</li>

						<li>
						<a class="side-menu__item" data-toggle="slide" href="<?php echo base_url('admin/Country/add_country'); ?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Country Management</span></a>
						</li>
						
						<li>
						<a class="side-menu__item" data-toggle="slide" href="<?php echo base_url('admin/Destination'); ?>"><i class="side-menu__icon si si-picture"></i><span class="side-menu__label">Destination Management</span></a>
						</li> -->

					<!-- <li>
							<a class="side-menu__item" href="<?php echo base_url('admin/service/index'); ?>"><i class="side-menu__icon si si-wrench"></i><span class="side-menu__label">Our Services</span></a>
						</li>-->

					<!-- <li>
							<a class="side-menu__item" href="<?php echo base_url('admin/project/index'); ?>"><i class="side-menu__icon fas fa-project-diagram"></i><span class="side-menu__label">Projects</span></a>
						</li> -->

					<!-- <li>
							<a class="side-menu__item" href="<?php echo base_url('admin/product/index'); ?>"><i class="side-menu__icon si si-paypal"></i><span class="side-menu__label">Products</span></a>
						</li>
						
						
						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/team/index'); ?>"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Team</span></a>
						</li> -->
					<!-- 						
						 <li>
							<a class="side-menu__item" href="<?php echo base_url('admin/testimonial/index'); ?>"><i class="side-menu__icon fa fa-comments"></i><span class="side-menu__label">Testimonials</span></a>
						</li> 

						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/blog/index'); ?>"><i class="side-menu__icon si si-layers"></i><span class="side-menu__label">Blogs</span></a>
						</li>

						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/Order/index'); ?>"><i class="side-menu__icon fas fa-project-diagram"></i><span class="side-menu__label">Orders</span></a>
						</li>
						
						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/contacts/index'); ?>"><i class="side-menu__icon si si-user"></i><span class="side-menu__label">Contact Us</span></a>
						</li> -->



					<!--<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/client/index'); ?>"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Clients</span></a>
						</li>
						
						
						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/whychoose/index'); ?>"><i class="side-menu__icon si si-layers"></i><span class="side-menu__label">Why Choose Us</span></a>
						</li>
						
						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/FAQ/index'); ?>"><i class="side-menu__icon si si-social-foursqare"></i><span class="side-menu__label">FAQ</span></a>
						</li>
						<li>
							<a class="side-menu__item" href="<?php echo base_url('admin/Login/logout'); ?>"><i class="side-menu__icon fe fe-power"></i><span class="side-menu__label">Logout</span></a>
						</li> -->
				</ul>
			</aside>
			<!--side-menu-->
			<!--Page Header-->