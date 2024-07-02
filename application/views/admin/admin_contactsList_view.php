<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">

        <!--Page Header-->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-user mr-1"></i>Contacts</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacts</li>
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
                        <?php echo form_open_multipart('admin/contactus/index', $attributes); ?>


                        <div class="row">
                            <div class="col-xl-3">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Search</label></h5>
                                    </p>

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Search by Name, Contact Number, Email" value="<?php if (!empty($name)) {
                                                                                                                                                                    echo $name;
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

                                    <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/contactus/reset'); ?>" name="RESET">Reset</a>
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
                        <h3 class="card-title" style="font-size:22px;">Contacts List</h3>
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


                        <div class="row">
                            <div class="text-left col-md-4 pb-2">
                                <ul class="pagination">
                                    <?php if (!empty($links)) {
                                        echo $links;
                                    } ?>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>
                                <?php echo form_open_multipart('admin/contactus/index', $attributes); ?>


                                <?php echo form_close(); ?>
                            </div>

                        </div>


                        <div class="table-responsive">

                            <table class="table card-table table-vcenter table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                        <!--<th>Message</th>-->
                                        <!--<th>Action</th>-->
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (!empty($main)) {
                                        $count = $row + 1;
                                        foreach ($main as $contact) {
                                    ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo stripslashes($contact['name']); ?></td>
                                                <td><?php echo stripslashes($contact['contactnumber']); ?></td>
                                                <td><?php echo stripslashes($contact['email']); ?></td>
                                                <td><?php echo stripslashes($contact['message']); ?></td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Actions </button>
                                                        <div class="dropdown-menu">
                                                            <!---<a class="dropdown-item" href="<?php echo site_url('/admin/contactus/edit_Contacts/' . $contact['id']); ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a>-->
                                                            <a class="dropdown-item" href="<?php echo site_url('/admin/contactus/delete_Contacts/' . $contact['id']); ?>"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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
                                            <td colspan="6" style="font-size: 14px;">No records found.</td>
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
</div><br><br><!-- /.content-wrapper -->
<?php include("application/views/admin/admin_footer_view.php"); ?>