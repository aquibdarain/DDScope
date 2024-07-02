<?php include("application/views/admin/admin_header_view.php"); ?>
<div class=" app-content">
	<div class="side-app">

		<div class="page-header">
			<h3 class="page-title"><i class="fa fa-comments mr-1"></i>Edit Testinomials</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('admin/testimonial/index'); ?>">Testinomials</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Testinomials</li>
			</ol>
		</div>
		<div class="content-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Testinomials Edit Form</div>
						</div>
						<div class="card-body">
							<?php if ($add_error) { ?>
								<p class="login-box-msg callout callout-danger"><?php echo $add_error; ?><BR></p>
							<?php
							} ?>
							<?php $attribute = array('class' => 'form-horizontal'); ?>
							<?php echo form_open_multipart('admin/testimonial/update_testimonial', $attribute); ?>
							<div class="">
								<div class="row pb-2 mr-3 ml-4">

								<div class="col-xl-4 form-group">
										<label for="tes_name" style="font-size:14.5px;">Name</label>
										<input type="text" class="form-control" name="tes_name" id="tes_name" placeholder="Company" value="<?php echo stripslashes($testimonial->tes_name); ?>" required>
										<?php echo form_error('tes_name', '<p class="text-danger">', '</p>') ?>
									</div>

									<!-- <div class="col-xl-4 form-group">
										<label for="tes_name" style="font-size:14.5px;">Destination</label>
										<input type="text" class="form-control" id="tes_name" name="tes_name" value="<?php echo stripslashes($testimonial->tes_name); ?>" required placeholder="tes_name">
										<?php echo form_error('tes_name', '<p class="text-danger">', '</p>') ?>
									</div> -->
									
									<!-- <div class="form-group col-4">
										<label for="download" class="pl-6" style="font-size:14.3px;">Edit Image </label><br>

										<input type="file" class="pl-6" name="tes_image" id="tes_image">
										<? if ($testimonial->tes_image != '') { ?><br>
											<a href="<? echo base_url('upload/je/' . $testimonial->tes_image); ?>" class="pl-6" target="_new">View Image</a>
										<? } ?>
										<input type="hidden" name="old_file" value="<?php echo stripslashes($testimonial->tes_image); ?>">

										<?php echo form_error('tes_image', '<p class="text-danger">', '</p>') ?>
									</div> -->
								</div>

								<div class="form-group">
									<label for="tes_desc" class="ml-5 control-label" style="font-size:14.5px;">Description</label>
									<div class="col-sm-12 ml-4">
										<textarea id="tes_desc" name="tes_desc" rows="10" cols="85"> <?php echo stripslashes($testimonial->tes_desc); ?>
						              </textarea>

										<?php echo form_error('tes_desc', '<p class="text-danger">', '</p>') ?>
									</div>
								</div>
							</div>

							<div class="mt-2 mb-0 ml-5">
								<button type="submit" class="btn btn-sm  btn-info">Update</button>
							</div>
							<input type="hidden" name="tes_id" value="<?php echo $tes_id; ?>">
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div><br><br><br>

<?php include("application/views/admin/admin_footer_view.php"); ?>