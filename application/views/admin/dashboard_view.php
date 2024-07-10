<?php include("application/views/admin/admin_header_view.php"); ?>
<style>
	.bg-dark {
		background-color: #4b545c !important;
		color: #fff;
	}
</style>
<div class="app-content">
	<div class="side-app">

		<!--Page Header-->
		<div class="page-header">
			<h3 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">
					Dashboard
				</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="card">

					<div class="card-body">
						<div class="row">

							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-dark rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/User/index'); ?>" class="ajax-link"> <i class="fa fa-users user-profile-statictics-icon" style="color: #4b545c;" style="line-height:50px"></i></span>
									<div class="mini-stat-dark float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/User/index'); ?>"> User Management</a></h5>
										<h2><?php echo $userCount; ?></h2>
									</div>
								</div>
							</div>


							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-secondary rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/Delete_acc/index'); ?>" class="ajax-link"> <i class="fa fa-trash user-profile-statictics-icon text-secondary" style="line-height:50px"></i></span>
									<div class="mini-stat-secondary float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/Delete_acc/index'); ?>">Delete Account Request</a></h5>
										<h2><?php echo $deleteRequestCount; ?></h2>

									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-success rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/Delete_acc/acceptRequest'); ?>" class="ajax-link"> <i class="fas fa-check-circle user-profile-statictics-icon text-success" style="line-height:50px"></i></span>
									<div class="mini-stat-success float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/Delete_acc/acceptRequest'); ?>">Accept Deletion Request Management</a></h5>
										<h2><?php echo $acceptdeleteRequestCount; ?></h2>
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-danger rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/Delete_acc/rejectRequest'); ?>" class="ajax-link"> <i class="fa fa-window-close user-profile-statictics-icon text-danger" style="line-height:50px"></i></span>
									<div class="mini-stat-danger float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/Delete_acc/rejectRequest'); ?>">Reject Deletion Request Management</a></h5>
										<h2><?php echo $rejectdeleteRequestCount; ?></h2>
									</div>
								</div>
							</div>


							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-purple rounded">
									<span class="mini-stat-icon">
										<a href="<?php echo base_url('admin/User/send_verification_mail'); ?>" class="ajax-link">
											<i class="fa fa-envelope user-profile-statictics-icon text-purple" style="line-height:50px"></i>
										</a>
									</span>
									<div class="mini-stat-purple float-right text-right text-white">
										<h5 class="mb-1">
											<a href="<?php echo base_url('admin/User/send_verification_mail'); ?>">Send Verification Mail</a>
										</h5>
										<h2><?php echo $userCount; ?></h2>
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-info rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/blog/index'); ?>" class="ajax-link"> <i class="si si-layers custom-blog-icon" style="color: #45aaf2;line-height:56px"></i></a></span>
									<div class="mini-stat-info float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/blog/index'); ?>">Blogs</a></h5>
										<h2 class="num-font mb-1 counter"><?php echo $blogCount; ?></h2>
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-warning rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/testimonial/index'); ?>" class="ajax-link"> <i class="fa fa-comments suser-profile-statictics-icon text-warning" style="line-height:50px"></i></a></span>
									<div class="mini-stat-warning float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/testimonial/index'); ?>">Testimonials</a></h5>
										<h2 class="num-font mb-1 counter"><?php echo $testimonialCount; ?></h2>
									</div>
								</div>
							</div>

	                        <div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-warning rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/contactus/index'); ?>" class="ajax-link"> <i class="fa fa-comments suser-profile-statictics-icon text-warning" style="line-height:50px"></i></a></span>
									<div class="mini-stat-warning float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/contactus/index'); ?>">Contactus</a></h5>
										<h2 class="num-font mb-1 counter"><?php echo $contactusCount; ?></h2>
									</div>
								</div>
							</div>
							
							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-warning rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/aboutus/index'); ?>" class="ajax-link"> <i class="fa fa-comments suser-profile-statictics-icon text-warning" style="line-height:50px"></i></a></span>
									<div class="mini-stat-warning float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/aboutus/index/'); ?>">About us</a></h5>

										<h2 class="num-font mb-1 counter"><?php echo $aboutusCount; ?></h2>
									</div>
								</div>
							</div>

							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-warning rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/faqs/index'); ?>" class="ajax-link"> <i class="fa fa-comments suser-profile-statictics-icon text-warning" style="line-height:50px"></i></a></span>
									<div class="mini-stat-warning float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/faqs/index/'); ?>">FAQ's</a></h5>

										<h2 class="num-font mb-1 counter"><?php echo $faqsCount; ?></h2>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-6 col-md-12">
								<div class="mini-stat clearfix bg-warning rounded">

									<span class="mini-stat-icon"><a href="<? echo base_url('admin/faqs/index'); ?>" class="ajax-link"> <i class="fa fa-comments suser-profile-statictics-icon text-warning" style="line-height:50px"></i></a></span>
									<div class="mini-stat-warning float-right text-right text-white">
										<h5 class="mb-1"><a href="<?php echo base_url('admin/Job_controller/view_jobs/'); ?>">Career</a></h5>

										<h2 class="num-font mb-1 counter"><?php echo $job_count; ?></h2>
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
<br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>