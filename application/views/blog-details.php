<?php include("application/views/header_view.php"); ?>
<br><br><br><br><br>
<!-- <section class="innerbanner"> -->
<div class="container">
	<div class="row  ">
		<div class="col-lg-7 col-md-6 ">
			<h1 class="text" style="color: white; text-transform: capitalize;">Blog Details</h1>
		</div>
	</div>
</div>

<!-- </section> -->
<section class="main-content">
	<div class="container blog">
		<div class="row">
			<div class="col-lg-12 mb-5">
				<h3 class="mb-0"><?php echo $blog->blog_name; ?></h3>
				<div class="d-block">
					<span>
						<?php
						$originalDate = $blog->blog_date;
						$formattedDate = date("j F Y", strtotime($originalDate));
						echo $formattedDate;
						?>
					</span>
				</div>
			</div>

			<div class="col-lg-12">
				<div class="l-shaped-content">
					<img src="<?php echo base_url('upload/blog/' . $blog->blog_image); ?>" alt="" class="l-shaped-image">
					<p><?php echo $blog->blog_desc; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.l-shaped-content {
		position: relative;
	}

	.l-shaped-image {
		float: left;
		margin-right: 20px;
		margin-bottom: 20px;
		max-width: 40%;
		height: auto;
	}

	@media (max-width: 768px) {
		.l-shaped-image {
			float: none;
			margin-right: 0;
			margin-bottom: 20px;
			max-width: 100%;
		}
	}
</style>


<script src="<?php echo base_url('assets/front/js/bootstrap.bundle.min.js'); ?>"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="<?php echo base_url('assets/front/js/script.js'); ?>"></script>
<script>
	$(function() {
		$('.scroll-down').click(function() {
			$('html, body').animate({
				scrollTop: $('section.ok').offset().top
			}, 'slow');
			return false;
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#datePicker')
			.datepicker({
				format: 'mm/dd/yyyy'
			})
			.on('changeDate', function(e) {

				$('#eventForm').formValidation('revalidateField', 'date');
			});

		$('#eventForm').formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				name: {
					validators: {
						notEmpty: {
							message: 'The name is required'
						}
					}
				},
				date: {
					validators: {
						notEmpty: {
							message: 'The date is required'
						},
						date: {
							format: 'MM/DD/YYYY',
							message: 'The date is not a valid'
						}
					}
				}
			}
		});
	});
</script>
<br><br>
<?php include("application/views/footer.php"); ?>