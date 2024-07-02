<?php include("application/views/admin/admin_header_view.php"); ?>

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-comments mr-1"></i>Testimonials</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-default">
                        <div class="card-title" style="font-size:20px;"><i class="fa fa-user-circle mr-2"></i>Search
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>
                        <?php echo form_open_multipart('admin/testimonial/index', $attributes); ?>

                        <div class="row">
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Search</label></h5>
                                    </p>

                                    <input type="text" name="tes_name" id="tes_name" class="form-control" placeholder="Search by Name" value="<?php if (!empty($tes_name)) {
                                                                                                                                                    echo $tes_name;
                                                                                                                                                } ?>">
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">&nbsp; </label></h5>
                                    </p>

                                    <input type="submit" name="search" class="btn btn-secondary mr-3" value="Search">

                                    <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/testimonial/reset'); ?>" name="RESET">Reset</a>
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
                        <h3 class="card-title" style="font-size:21px;">Testimonials List</h3>
                    </div>

                    <div class="card-body">

                        <?php if ($this->session->flashdata('add_success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('add_success'); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('update_success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('update_success'); ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->session->flashdata('delete_successfully')) { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('delete_successfully'); ?>
                            </div>
                        <?php } ?>

                        <div class="row pb-1">
                            <div class="text-left col-md-4 pb-2">
                                <ul class="pagination">
                                    <?php if (!empty($links)) {
                                        echo $links;
                                    } ?>
                                </ul>
                            </div>

                            <div class="text-right col-md-8 pb-2">
                                <button class="btn btn-primary btn-sm" style="cursor:auto"> <strong><?php echo "[ " . $StartCount . " - " . $EndCount . " OF " . $TotalCount . " ]"; ?> </strong></button>

                                <a class="btn bg-red btn-sm" href="<?php echo site_url('admin/testimonial/add_Testimonial'); ?>"><i class="fa fa-plus-square"></i>&nbsp;Add</a>

                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table card-table table-vcenter table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <!-- <th>Destination</th> -->
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($testimonials)) {
                                        $count = $row + 1;
                                        foreach ($testimonials as $testimonial) {
                                    ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo stripslashes($testimonial['tes_name']); ?></td>
                                                <td><?php echo stripslashes($testimonial['tes_desc']); ?></td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Actions </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?php echo site_url('/admin/testimonial/edit_testimonial/' . $testimonial['tes_id']); ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('/admin/testimonial/delete_testimonial/' . $testimonial['tes_id']); ?>"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5" style="font-size: 14px;">No records found.</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>