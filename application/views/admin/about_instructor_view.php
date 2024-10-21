<?php include("application/views/admin/admin_header_view.php"); ?>
<br>
<div class="app-content">
    <div class="side-app">
        <!-- Page Header -->
        <div class="page-header" style="margin-top:10px;">
            <h4 class="page-title"><i class="fe fe-layers mr-1"></i>About Us</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
                        <?php echo form_open_multipart('admin/aboutus/index'); ?>
                        <div class="row">
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <h5><label class="label">Search</label></h5>
                                    <input type="text" name="abt_title" id="abt_title" class="form-control" placeholder="Search" value="<?php echo set_value('abt_title'); ?>">
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <h5><label class="label">&nbsp;</label></h5>
                                    <input type="submit" name="search" class="btn btn-secondary mr-3" value="Search">
                                    <a class="btn btn-danger mr-3" href="<?php echo base_url('admin/aboutus/reset'); ?>">Reset</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title" style="font-size:21px;">About Us</h3>
                    </div>

                    <div class="card-body">
                        <?php if ($this->session->flashdata('add_success')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('add_success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('update_success')): ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('update_success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('delete_successfully')): ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('delete_successfully'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="row pb-3">
                            <div class="text-left col-md-4 pb-2">
                                <ul class="pagination">
                                    <?php echo $links; ?>
                                </ul>
                            </div>
                            <div class="text-right col-md-8 pb-2">
                                <button class="btn btn-primary btn-sm" style="cursor:auto"> <strong><?php echo "[ " . $StartCount . " - " . $EndCount . " OF " . $TotalCount . " ]"; ?> </strong></button>

                                <a class="btn bg-red btn-sm" href="<?php echo site_url('admin/About_instructor_controller/add_aboutus'); ?>"><i class="fa fa-plus-square"></i>&nbsp;Add</a>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table card-table table-vcenter table-bordered">
                                <thead>
                                    <tr>
                                        <th width="7%">Sr No.</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Bio</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($aboutus)): ?>
                                        <?php $count = $StartCount; ?>
                                        <?php foreach ($aboutus as $about): ?>
                                            <?php
                                            $path_to_file = base_url('/upload/instructors/' . $about['about_image']);
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo htmlspecialchars($about['about_name']); ?></td>
                                                <td><?php echo htmlspecialchars($about['about_designation']); ?></td>
                                                <td><?php echo htmlspecialchars($about['about_bio']); ?></td>
                                                <td>
                                                    <a href="#" onclick="open('<?php echo $path_to_file; ?>','image_popup','scrollbars=1,toolbar=0,location=0,resizable=0,width=500,height=520')">
                                                        <img src="<?php echo $path_to_file; ?>" alt="About Image" width="95px;" height="75px;">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?php echo site_url('/admin/About_instructor_controller/edit_aboutus/' . $about['about_id']); ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('/admin/About_instructor_controller/delete_aboutus/' . $about['about_id']); ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $count++; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" style="font-size: 14px;">No records found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>