<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">

        <!-- Page Header -->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-user-plus mr-1"></i>Create New Admin</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create New Admin</li>
            </ol>
        </div>

        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-default">
                        <div class="card-title" style="font-size:20px;"><i class="fa fa-plus-circle mr-2"></i>Create New Admin</div>
                    </div>

                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title" style="font-size:22px;">Admin List</h3>
                        <a href="<?php echo base_url('admin/AdminController/fetch_all_admins'); ?>" class="btn btn-primary">Back</a>
                    </div>

                    <div class="card-body pt-0">
                        <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        <?php } ?>

                        <?php echo validation_errors(); ?>
                        <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>
                        <?php echo form_open('admin/AdminController/create_admin', $attributes); ?>

                        <div class="row">
                            <div class="col-xl-6">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Username</label></h5>
                                    </p>
                                    <input type="text" name="username" class="form-control" placeholder="Enter username" value="<?php echo set_value('username'); ?>">
                                    <?php echo form_error('username'); ?>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Password</label></h5>
                                    </p>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-xl-6">
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Role</label></h5>
                                    </p>
                                    <select name="role" class="form-control">
                                        <option value="admin" <?php echo set_select('role', 'admin'); ?>>Admin</option>
                                        <option value="superadmin" <?php echo set_select('role', 'superadmin'); ?>>Superadmin</option>
                                    </select>
                                    <?php echo form_error('role'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-xl-6">
                                <div class="wrapper ml-3">
                                    <input type="submit" name="submit" class="btn btn-secondary mr-3" value="Create Admin">
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
<br><br><!-- /.content-wrapper -->
<?php include("application/views/admin/admin_footer_view.php"); ?>
