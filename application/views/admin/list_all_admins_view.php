<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">
        <!-- Page Header -->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-user mr-1"></i>Admin List</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin List</li>
            </ol>
        </div>
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-default">
                        <div class="card-title" style="font-size:20px;"><i class="fa fa-user-circle mr-2"></i>Search</div>
                    </div>
                    <div class="card-body pt-0">
                        <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>
                        <?php echo form_open_multipart('admin/AdminController/index', $attributes); ?>
                        <div class="row">
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                        <h5><label class="label">Search</label></h5>
                                    </p>
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by Username" value="<?php if (!empty($search)) { echo $search; } ?>">
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                        <h5><label class="label">&nbsp; </label></h5>
                                    </p>
                                    <input type="submit" name="search_submit" class="btn btn-secondary mr-3" value="Search">
                                    <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/AdminController/index'); ?>" name="RESET">Reset</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title" style="font-size:22px;">Admin List</h3>
                        <a href="<?php echo base_url('admin/AdminController/create_admin'); ?>" class="btn btn-primary">Create New Admin</a>
                    </div>
                    <div class="card-body">
                        <!-- Display Flashdata Message -->
                        <?php if ($this->session->flashdata('message')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Admin ID</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($admins)) {
                                        $count = 1;
                                        foreach ($admins as $admin) { ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo htmlspecialchars($admin['admin_id']); ?></td>
                                                <td><?php echo htmlspecialchars($admin['admin_username']); ?></td>
                                                <td><?php echo htmlspecialchars($admin['admin_role']); ?></td>
                                                <td><?php echo htmlspecialchars($admin['admin_status']); ?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Actions</button>
                                                        <div class="dropdown-menu">
                                                            <!-- Edit Option -->
                                                            <!-- <a class="dropdown-item" href="<?php echo site_url('/admin/AdminController/edit_admin/' . $admin['admin_id']); ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a> -->

                                                            <!-- Delete Option -->
                                                            <a class="dropdown-item" href="<?php echo site_url('admin/AdminController/delete_admin/' . $admin['admin_id']); ?>" onclick="return confirm('Are you sure you want to delete this admin?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>

                                                            <!-- Activate Option -->
                                                            <?php if ($admin['admin_status'] != 'Active') { ?>
                                                                <a class="dropdown-item" href="<?php echo site_url('admin/AdminController/change_status/' . $admin['admin_id'] . '/Active'); ?>" onclick="return confirm('Are you sure you want to activate this admin?');">
                                                                    <i class="fa fa-check"></i>&nbsp;Activate
                                                                </a>
                                                            <?php } ?>

                                                            <!-- inactivate Option -->
                                                            <?php if ($admin['admin_status'] != 'Inactive') { ?>
                                                                <a class="dropdown-item" href="<?php echo site_url('admin/AdminController/change_status/' . $admin['admin_id'] . '/Inactive'); ?>" onclick="return confirm('Are you sure you want to deactivate this admin?');">
                                                                    <i class="fa fa-times"></i>&nbsp;Inactivate
                                                                </a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="5" style="font-size: 14px;">No records found.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>
