<?php include("application/views/admin/admin_header_view.php"); ?>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-edit mr-1"></i>Edit Admin</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/admins/index'); ?>">Admins</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
            </ol>
        </div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title">Admin Edit Form</div>
                            <a href="<?php echo base_url('admin/admins/index'); ?>" class="btn btn-secondary">Back</a>
                        </div>
                        <div class="card-body">
                            <?php $attributes = array('class' => 'form-horizontal'); ?>
                            <?php echo form_open('admin/AdminController/edit_admin', $attributes); ?>
                            <div class="row pb-2 mr-3 ml-4">
                                <div class="col-xl-6 form-group">
                                    <label for="username" style="font-size:14.5px;">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo stripslashes($admin['admin_username']); ?>" required>
                                    <?php echo form_error('username', '<p class="text-danger">', '</p>') ?>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <label for="role" style="font-size:14.5px;">Role</label>
                                    <select class="form-control" name="role" id="role" required>
                                        <option value="admin" <?php echo ($admin['admin_role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="superadmin" <?php echo ($admin['admin_role'] == 'superadmin') ? 'selected' : ''; ?>>Super Admin</option>
                                    </select>
                                    <?php echo form_error('role', '<p class="text-danger">', '</p>') ?>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <label for="password" style="font-size:14.5px;">password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?php echo stripslashes($admin['admin_password']); ?>" required>
                                    <?php echo form_error('password', '<p class="text-danger">', '</p>') ?>
                                </div>
                            </div>
                            <div class="mt-2 mb-0 ml-5">
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                            </div>
                            <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>
