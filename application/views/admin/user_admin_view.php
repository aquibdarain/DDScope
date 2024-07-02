<?php include("application/views/admin/admin_header_view.php"); ?><br>
<div class=" app-content">
    <div class="side-app">

        <div class="page-header" style="margin-top:10px;">
            <h4 class="page-title"><i class="fe fe-layers mr-1"></i>User Management</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
            </ol>
        </div>

        <div class="card">
            <div class="card-header bg-default">
                <div class="card-title" style="font-size:20px;">
                    <i class="fa fa-user-circle mr-2"></i>Search
                </div>
            </div>
            <div class="card-body pt-0">
                <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>
                <form action="<?php echo base_url('admin/User/index'); ?>" method="get" <?php echo isset($attributes) ? 'onsubmit="' . $attributes['onsubmit'] . '"' : ''; ?>>
                    <div class="row">
                        <div class="col-xl-3">
                            <br>
                            <div class="wrapper ml-3">
                                <p class="mb-0">
                                <h5><label class="label">Name</label></h5>
                                </p>
                                <!-- Set the name attribute to "name" -->
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo !empty($searchInput['name']) ? $searchInput['name'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <br>
                            <div class="wrapper ml-3">
                                <p class="mb-0">
                                <h5><label class="label">Email</label></h5>
                                </p>
                                <!-- Set the name attribute to "email" -->
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo !empty($searchInput['email']) ? $searchInput['email'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <br>
                            <div class="wrapper ml-3">
                                <p class="mb-0">
                                <h5><label class="label">&nbsp; </label></h5>
                                </p>
                                <input type="submit" name="search_submit" class="btn btn-secondary mr-3" value="Search">
                                <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/User/reset'); ?>" name="RESET">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title" style="font-size:21px;">User Management</h3>
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

                <?php if ($this->session->flashdata('status_inactive')) { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        Record is Inactive now!
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('status_active')) { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        Record is Active now!
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('delete_successfully')) { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <?php echo $this->session->flashdata('delete_successfully'); ?>
                    </div>
                <?php } ?>



                <div class="row justify-content-between pb-3">

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <!-- Previous Page Link -->
                            <?php if (!empty($data)) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo base_url('admin/User/index/1'); ?>">
                                        << First</a>
                                </li>
                            <?php endif; ?>

                            <!-- Pagination Links -->
                            <?php if (!empty($data)) : ?>
                                <?php
                                $startPage = max(1, $pageNumber - 1);
                                $endPage = min($startPage + 2, ceil($TotalCount / $perPage));
                                for ($i = $startPage; $i <= $endPage; $i++) :
                                ?>
                                    <li class="page-item <?php echo $pageNumber == $i ? 'active' : ''; ?>">
                                        <a class="page-link" href="<?php echo base_url('admin/User/index/' . $i); ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            <?php endif; ?>


                            <?php if (!empty($data)) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo base_url('admin/User/index/' . ceil($TotalCount / 10)); ?>">Last >></a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </nav>
                    <br>
                    <div class="col-md-8 text-right">
                        <button class="btn btn-primary btn-sm" style="cursor: auto;">
                            <strong><?php echo "[ " . $StartCount . " - " . $EndCount . " OF " . $TotalCount . " ]"; ?></strong>
                        </button>
                    </div>
                </div>


                <table class="table card-table table-vcenter table-bordered">
                    <thead>
                        <tr>
                            <th align="center" width="7%">Sr No.</th>
                            <th align="center">Name</th>
                            <th align="center">Email</th>
                            <th align="center">Mobile</th>
                            <th align="center">Email verified</th>
                            <th align="center">Registered Platform</th>
                            <th align="center">Status</th>
                            <!-- <th align="center">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $index => $user) : ?>
                            <tr>
                                <td align="center"><?php echo $StartCount + $index; ?></td>
                                <td align="center"><?php echo $user['reg_username']; ?></td>
                                <td align="center"><?php echo $user['reg_email']; ?></td>
                                <td align="center"><?php echo $user['reg_mobile']; ?></td>
                                <td align="center"><?php echo $user['reg_email_verify'] ? 'Yes' : 'No'; ?></td>
                                <td align="center"><?php echo $user['created_from']; ?></td>
                                <td align="center"><?php echo $user['reg_status']; ?></td>
                                <!-- <td align="center">
                                    <?php echo form_open('admin/User/delete_user', array('method' => 'post', 'onsubmit' => "return confirm('Are you sure you want to delete this user?');")); ?>
                                    <input type="hidden" name="reg_id" value="<?php echo $user['reg_id']; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <?php echo form_close(); ?>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php include("application/views/admin/admin_footer_view.php"); ?>