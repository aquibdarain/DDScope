<?php include("application/views/admin/admin_header_view.php"); ?>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-edit mr-1"></i>Edit About Us</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/aboutus/index'); ?>">About Us</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit About Us</li>
            </ol>
        </div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title">About Us Edit Form</div>
                            <a href="<?php echo base_url('admin/aboutus/index'); ?>" class="btn btn-secondary">Back</a>
                        </div>
                        <div class="card-body">
                            <?php $attributes = array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'); ?>
                            <?php echo form_open('admin/Aboutus/edit_aboutus/'.$aboutus['about_id'], $attributes); ?>
                            <div class="row pb-2 mr-3 ml-4">
                                <div class="col-xl-6 form-group">
                                    <label for="about_name" style="font-size:14.5px;">Name</label>
                                    <input type="text" class="form-control" name="about_name" id="about_name" placeholder="Name" value="<?php echo htmlspecialchars($aboutus['about_name']); ?>" required>
                                    <?php echo form_error('about_name', '<p class="text-danger">', '</p>') ?>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <label for="about_designation" style="font-size:14.5px;">Designation</label>
                                    <input type="text" class="form-control" name="about_designation" id="about_designation" placeholder="Designation" value="<?php echo htmlspecialchars($aboutus['about_designation']); ?>" required>
                                    <?php echo form_error('about_designation', '<p class="text-danger">', '</p>') ?>
                                </div>
                                <div class="col-xl-12 form-group">
                                    <label for="about_bio" style="font-size:14.5px;">Bio</label>
                                    <textarea class="form-control" name="about_bio" id="about_bio" placeholder="Bio" rows="4" required><?php echo htmlspecialchars($aboutus['about_bio']); ?></textarea>
                                    <?php echo form_error('about_bio', '<p class="text-danger">', '</p>') ?>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <label for="about_image" style="font-size:14.5px;">Image</label><br>
                                    <input type="file" class="form-control" name="about_image" id="about_image">
                                    <?php if ($aboutus['about_image']): ?><br>
                                        <small>Current Image:</small><br>
                                        <img src="<?php echo base_url('/upload/aboutus/' . $aboutus['about_image']); ?>" alt="About Image" width="100">
                                    <?php endif; ?>
                                    <?php echo form_error('about_image', '<p class="text-danger">', '</p>') ?>
                                </div>
                            </div>
                            <div class="mt-2 mb-0 ml-5">
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                            </div>
                            <input type="hidden" name="about_id" value="<?php echo $aboutus['about_id']; ?>">
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>
