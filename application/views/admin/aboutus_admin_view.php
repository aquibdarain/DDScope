<?php include("application/views/admin/admin_header_view.php"); ?><br>
<!-- Content Wrapper. Contains page content -->
<div class=" app-content">
    <div class="side-app">

        <!--Page Header-->
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
                        <div class="card-title" style="font-size:20px;"><i class="fa fa-user-circle mr-2"></i>Search
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>

                        <?php echo form_open_multipart('admin/aboutus/index', $attributes); ?>


                        <div class="row">
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Search</label></h5>
                                    </p>

                                    <input type="text" name="abt_title" id="abt_title" class="form-control" placeholder="Search" value="<?php if (!empty($abt_title)) {
                                                                                                                                            echo $abt_title;
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

                                    <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/aboutus/reset'); ?>" name="RESET">Reset</a>
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


                        <div class="row pb-3">
                            <div class="text-left col-md-4 pb-2">
                                <ul class="pagination">
                                    <?php if (!empty($links)) {
                                        echo $links;
                                    } ?>
                                </ul>
                            </div>

                            <div class="text-right col-md-8">
                                <button class="btn btn-primary btn-sm" style="cursor:auto"> <strong><?php echo "[ " . $StartCount . " - " . $EndCount . " OF " . $TotalCount . " ]"; ?> </strong></button>
                                <!-- <a class="btn bg-red btn-sm" href="<php echo site_url('/admin/aboutus/addaboutus');?>"><i class="fa fa-plus-square"></i>&nbsp;Add</a> -->
                            </div>
                        </div>



                        <div class="table-responsive">

                            <table class="table card-table table-vcenter table-bordered">
                                <thead>
                                    <tr>
                                        <th align="center" width="7%">Sr No.</th>
                                        <th align="center">Title</th>
                                        <!--<th class="text-white">URL</th>-->
                                        <th align="center">Description</th>
                                        <th align="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($aboutuss)) {
                                        $count = $row + 1;
                                        foreach ($aboutuss as $about) {
                                    ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo stripslashes($about['abt_title']); ?></td>
                                                <td><?php echo stripslashes($about['abt_desc']); ?></td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Actions </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="<?php echo site_url('/admin/aboutus/editaboutus/' . encrypt_id($about['abt_id'])); ?>" class="btn btn-sm bg-purple"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                            <!-- <a class="dropdown-item" href="<php echo site_url('/admin/aboutus/delete_aboutus/'.encrypt_id($about['abt_id']));?>" class="btn btn-sm bg-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a> -->
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
                                            <td colspan="4" style="font-size: 14px;">No records found.</td>
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
</div>
<br><br>
<!-- /.content-wrapper -->
<?php include("application/views/admin/admin_footer_view.php"); ?>