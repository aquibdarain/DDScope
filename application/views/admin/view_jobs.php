<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">
        <!--Page Header-->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-briefcase mr-1"></i> Job Listings</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Job Listings</li>
            </ol>
        </div>
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-default">
                        <div class="card-title" style="font-size:20px;"><i class="fa fa-briefcase mr-2"></i>Search
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>
                        <?php echo form_open_multipart('admin/view_jobs', $attributes); ?>
                        <div class="row">
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Search</label></h5>
                                    </p>
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by Job Title" value="<?php if (!empty($search)) { echo $search; } ?>">
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">&nbsp; </label></h5>
                                    </p>
                                    <input type="submit" name="search_submit" class="btn btn-secondary mr-3" value="Search">
                                    <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/view_jobs'); ?>" name="RESET">Reset</a>
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
                        <h3 class="card-title" style="font-size:22px;">Job Listings</h3>
                        <a href="<?php echo base_url('admin/Job_controller/add_job'); ?>" class="btn btn-primary">Add Job</a>
                    </div>

                    <div class="card-body">
                        <?php if ($this->session->flashdata('job_added')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('job_added'); ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Requirements</th>
                                        <th>Responsibilities</th>
                                        <th>Salary</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($jobs)) {
                                        $count = 1;
                                        foreach ($jobs as $job) {
                                    ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $job['title']; ?></td>
                                                <td><?php echo $job['location']; ?></td>
                                                <td><?php echo $job['description']; ?></td>
                                                <td><?php echo $job['requirements']; ?></td>
                                                <td><?php echo $job['responsibilities']; ?></td>
                                                <td><?php echo $job['salary']; ?></td>
                                                <td><?php echo $job['created_at']; ?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Actions </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?php echo site_url('/admin/edit_job/' . $job['id']); ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('admin/delete_job/' . $job['id']); ?>" onclick="return confirm('Are you sure you want to delete this job?');"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $count++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="9" style="font-size: 14px;">No job postings found.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-left col-md-4 pb-2">
                            <ul class="pagination">
                                <?php if (!empty($links)) {
                                    echo $links;
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>
