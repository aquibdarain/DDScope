<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">
        <!-- Page Header -->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-user-circle mr-1"></i>Add About Us</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add About Us</li>
            </ol>
        </div>

        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-default">
                        <div class="card-title" style="font-size:20px;"><i class="fa fa-plus-circle mr-2"></i>Add About Us</div>
                    </div>

                    <div class="card-body pt-0">
                        <?php if ($this->session->flashdata('add_success')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('add_success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo validation_errors(); ?>

                        <?php $attributes = array('role' => 'form', 'enctype' => 'multipart/form-data'); ?>
                        <?php echo form_open('admin/aboutus/add_aboutus', $attributes); ?>

                        <div class="row">
                            <div class="col-xl-6">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Name</label></h5>
                                    </p>
                                    <input type="text" name="about_name" class="form-control" placeholder="Enter the name" value="<?php echo set_value('about_name'); ?>">
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Designation</label></h5>
                                    </p>
                                    <input type="text" name="about_designation" class="form-control" placeholder="Enter the designation" value="<?php echo set_value('about_designation'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Bio</label></h5>
                                    </p>
                                    <textarea name="about_bio" class="form-control" placeholder="Enter the bio"><?php echo set_value('about_bio'); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Image</label></h5>
                                    </p>
                                    <input type="file" name="about_image" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-xl-6">
                                <div class="wrapper ml-3">
                                    <input type="submit" name="submit" class="btn btn-secondary mr-3" value="Add About Us">
                                </div>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- /.content-wrapper -->
<?php include("application/views/admin/admin_footer_view.php"); ?>
