<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">
        <!--Page Header-->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-briefcase mr-1"></i> Add Job</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/view_jobs'); ?>">Job Listings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Job</li>
            </ol>
        </div>
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title" style="font-size:22px;">Add Job</h3>
                        <a href="<?php echo base_url('admin/Job_controller/view_jobs/'); ?>" class="btn btn-secondary">Back to Job Listings</a>
                    </div>
                    <div class="card-body">

                    <?php if ($this->session->flashdata('job_added')): ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('job_added'); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo form_open('admin/Job_controller/add_job'); ?>
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="<?php echo set_value('location'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"><?php echo set_value('description'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="requirements">Requirements</label>
                                <textarea class="form-control" id="requirements" name="requirements"><?php echo set_value('requirements'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="responsibilities">Responsibilities</label>
                                <textarea class="form-control" id="responsibilities" name="responsibilities"><?php echo set_value('responsibilities'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo set_value('salary'); ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Job</button>
                        <?php echo form_close(); ?>

                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>
