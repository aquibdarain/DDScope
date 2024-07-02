<?php include("application/views/admin/admin_header_view.php"); ?><br>
<div class=" app-content">
    <div class="side-app">

        <div class="page-header" style="margin-top:10px;">
            <h4 class="page-title"><i class="fe fe-layers mr-1"></i>Delete Account Management</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delete Account Management</li>
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
                <form action="<?php echo base_url('admin/Delete_acc/index'); ?>" method="get" <?php echo isset($attributes) ? 'onsubmit="' . $attributes['onsubmit'] . '"' : ''; ?>>
                    <div class="row">
                        <div class="col-xl-3">
                            <br>
                            <div class="wrapper ml-3">
                                <p class="mb-0">
                                <h5><label class="label">Name</label></h5>
                                </p>
                                <!-- Set the name attribute to "name" -->
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo !empty($searchInputdelete['name']) ? urldecode($searchInputdelete['name']) : ''; ?>">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <br>
                            <div class="wrapper ml-3">
                                <p class="mb-0">
                                <h5><label class="label">Email</label></h5>
                                </p>
                                <!-- Set the name attribute to "email" -->
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo !empty($searchInputdelete['email']) ? $searchInputdelete['email'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <br>
                            <div class="wrapper ml-3">
                                <p class="mb-0">
                                <h5><label class="label">&nbsp; </label></h5>
                                </p>
                                <input type="submit" name="search_submit" class="btn btn-secondary mr-3" value="Search">
                                <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/Delete_acc/reset'); ?>" name="RESET">Reset</a>
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
                <h3 class="card-title" style="font-size:21px;">Delete Account Management</h3>
            </div>

            <div class="card-body">

                <?php
                // Check for success flashdata
                $successMessage = $this->session->flashdata('success');
                if ($successMessage) {
                    echo '<div class="alert alert-success">' . $successMessage . '</div>';
                }

                // Check for error flashdata
                $errorMessage = $this->session->flashdata('error');
                if ($errorMessage) {
                    echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
                }
                ?>



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
                            <?php if ($pageNumber > 1 && !empty($data)) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo base_url('admin/Delete_acc/index/1'); ?>">
                                        << First</a>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($data)) : ?>
                                <?php
                                $startPage = max(1, $pageNumber - 1);
                                $endPage = min($startPage + 2, ceil($TotalCount / $perPage));
                                for ($i = $startPage; $i <= $endPage; $i++) :
                                ?>
                                    <li class="page-item <?php echo $pageNumber == $i ? 'active' : ''; ?>">
                                        <a class="page-link" href="<?php echo base_url('admin/Delete_acc/index/' . $i); ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            <?php endif; ?>

                            <?php if ($pageNumber < ceil($TotalCount / $perPage) && !empty($data)) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo base_url('admin/Delete_acc/index/' . ceil($TotalCount / $perPage)); ?>">Last>> </a>
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

                <div class="table-responsive">
                    <table class="table card-table table-vcenter table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th align="center" width="7%">Sr No.</th>
                                <th align="center">Name</th>
                                <th align="center">Email</th>
                                <th align="center">Mobile</th>
                                <th align="center">Email verified</th>
                                <th align="center">Registered Platform</th>
                                <th align="center">Status</th>
                                <th align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($data)) : ?>
                                <tr>
                                    <td colspan="8" align="center">No records found</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($data as $index => $user) : ?>
                                    <tr>
                                        <td align="center"><?php echo $StartCount + $index; ?></td>
                                        <td align="center"><?php echo $user['reg_username']; ?></td>
                                        <td align="center"><?php echo $user['reg_email']; ?></td>
                                        <td align="center"><?php echo $user['reg_mobile']; ?></td>
                                        <td align="center"><?php echo $user['reg_email_verify'] ? 'Yes' : 'No'; ?></td>
                                        <td align="center"><?php echo $user['created_from']; ?></td>

                                        <td align="center">
                                            <?php
                                            $status = $user['reg_status'];
                                            $badgeClass = ($status == 'Active') ? 'badge badge-success' : 'badge badge-danger';
                                            ?>
                                            <span class="<?= $badgeClass ?>"><?php echo $status; ?></span>
                                        </td>

                                        <td align="center">
                                            <div class="dropdown show">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <!-- Accept Deletion Request Form -->
                                                    <?php echo form_open('admin/Delete_acc/delete_user', array('id' => 'acceptForm')); ?>
                                                    <?php echo form_hidden('reg_id', $user['reg_id']); ?>
                                                    <?php echo form_hidden('action', 'Accept'); ?>
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fa fa-trash"></i>&nbsp;&nbsp;Accept Deletion Request
                                                    </button>
                                                    <?php echo form_close(); ?>

                                                    <!-- Reject Deletion Request Button (to open modal) -->
                                                    <button type="button" class="dropdown-item reject-btn" data-toggle="modal" data-target="#rejectModal">
                                                        <i class="fa fa-times"></i>&nbsp;&nbsp;Reject Deletion Request
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Reject Deletion Request Modal -->
                <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <?php echo form_open('admin/Delete_acc/delete_user', array('id' => 'rejectForm')); ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel">Reject Deletion Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="font-size: 16.5px;">Are you sure you want to reject this user deletion request?</p>
                                <label for="rejectReason" style="font-size: 14px;">Reason for Rejection:</label>
                                <?php echo form_textarea(array(
                                    'name' => 'rejectReason',
                                    'id' => 'rejectReason',
                                    'class' => 'form-control',
                                    'rows' => '5',
                                    'required' => 'required'
                                )); ?>
                                <?php echo form_hidden('reg_id', $user['reg_id']); ?>
                                <?php echo form_hidden('action', 'Reject'); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

                <script>
                    // JavaScript to handle rejection button click
                    $(document).ready(function() {
                        $('.reject-btn').click(function() {
                            var regId = $(this).closest('tr').find('input[name="reg_id"]').val();
                            $('#rejectForm input[name="reg_id"]').val(regId);
                        });
                    });
                </script>

                <?php include("application/views/admin/admin_footer_view.php"); ?>