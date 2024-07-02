<?php include("application/views/admin/admin_header_view.php"); ?>
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h3 class="page-title"><i class="si si-wrench mr-1"></i>Edit Blogs</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('admin/blog/index'); ?>">Blogs</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Blogse</li>
			</ol>
		</div>
		<div class="content-wrapper">
			<div class="row">
				<div class="col-lg-12">

					<div class="card">
						<div class="card-header">
							<div class="card-title">Blogs</div>
						</div>
						<div class="card-body">
							<?php if ($add_error) { ?>
								<p class="login-box-msg callout callout-danger"><?php echo $add_error; ?><BR></p>
							<?php
							} ?>
							<?php $attribute = array('class' => 'form-horizontal'); ?>
							<?php echo form_open_multipart('admin/blog/update_blog', $attribute); ?>

							<div class="row pl-2">

								<div class="col-xl-6 pr-8 form-group">
									<label for="blog_name" style="font-size:14.5px;">Blog Name</label>

									<input type="text" class="form-control" id="blog_name" name="blog_name" value="<?php echo stripslashes($blog->blog_name); ?>" required placeholder="blog_name">

									<?php echo form_error('blog_name', '<p class="text-danger">', '</p>') ?>
								</div>

								<div class="col-xl-6 form-group">
                                    <label for="blog_url" style="font-size:14.5px;">Blog URL</label>
                                    <input type="url" class="form-control" id="blog_url" name="blog_url" value="<?php echo set_value('blog_url'); ?>" required placeholder="Blog URL">

                                    <?php echo form_error('blog_url', '<p class="text-danger">', '</p>') ?>
                                </div>
								
								<div class="col-xl-6 pt-0 form-group">

									<label for="download" style="font-size:14px;">Images</label><br>
									<input type="file" name="blog_image" id="blog_image">
									<?php if ($blog->blog_image != '') { ?>
										<a href="<?php echo base_url('upload/blog/' . $blog->blog_image); ?>" target="_new">View Image</a>
									<?php } ?>
									<input type="hidden" name="old_file" value="<?php echo stripslashes($blog->blog_image); ?>">

									<?php echo form_error('blog_image', '<p class="text-danger">', '</p>') ?>
								</div>

							</div>

							<div class="form-group pt-5">
								<label for="blog_desc" class="col-sm-2 control-label" style="font-size:14px;">Blog Description</label>
								<div class="col-sm-12">
									<textarea class="content" id="blog_desc" name="blog_desc"> <?php echo stripslashes($blog->blog_desc); ?> </textarea>

									<?php echo form_error('blog_desc', '<p class="text-danger">', '</p>') ?>
								</div>
							</div>
							<div class="mt-2 pl-2">
								<button type="submit" class="btn btn-sm btn-info">Update</button>
							</div>
						</div>


						<input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php include("application/views/admin/admin_footer_view.php"); ?>