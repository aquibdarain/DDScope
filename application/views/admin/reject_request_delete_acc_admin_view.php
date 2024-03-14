<?php include("application/views/admin/admin_header_view.php");?><br>
<div class=" app-content">
<div class="side-app">

 						<div class="page-header" style="margin-top:10px;">
							<h4 class="page-title"><i class="fe fe-layers mr-1"></i>Reject Deletion Request Account Management</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index');?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Reject Deletion Request Account Management</li>
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
        <form action="<?php echo base_url('admin/Delete_acc/rejectRequest'); ?>" method="get" <?php echo isset($attributes) ? 'onsubmit="' . $attributes['onsubmit'] . '"' : ''; ?>>
            <div class="row">
                <div class="col-xl-3">
                    <br>
                    <div class="wrapper ml-3">
                        <p class="mb-0">
                            <h5><label class="label">Name</label></h5>
                        </p>
                      
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo !empty($searchInputReject['name']) ? urldecode($searchInputReject['name']) : ''; ?>">
                    </div>
                </div>
                <div class="col-xl-3">
                    <br>
                    <div class="wrapper ml-3">
                        <p class="mb-0">
                            <h5><label class="label">Email</label></h5>
                        </p>
                      
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo !empty($searchInputReject['email']) ? $searchInputReject['email'] : ''; ?>">
                    </div>
                </div>
                <div class="col-xl-3">
                    <br>
                    <div class="wrapper ml-3">
                        <p class="mb-0">
                            <h5><label class="label">&nbsp; </label></h5>
                        </p>
                        <input type="submit" name="search_submit" class="btn btn-secondary mr-3" value="Search">
                        <a type="submit" class="btn btn-danger mr-3" href="<?php echo base_url('admin/Delete_acc/reset_rejectRequest'); ?>" name="RESET">Reset</a>
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
					<h3 class="card-title" style="font-size:21px;">Reject Deletion Request Account Management</h3>
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



				 <?php if($this->session->flashdata('add_success')) { ?>
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('add_success');?>
						</div>
						<?php } ?>
						
						<?php if($this->session->flashdata('update_success')) { ?>
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('update_success');?>
						</div>
						<?php } ?>
						
						<?php if($this->session->flashdata('status_inactive')) { ?>
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Record is Inactive now!
						</div>
						<?php } ?>
						
						<?php if($this->session->flashdata('status_active')) { ?>
						<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						Record is Active now!
						</div>
						<?php } ?>
						
						<?php if($this->session->flashdata('delete_successfully')) { ?>
						<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('delete_successfully');?>
						</div>
						<?php } ?>
						
<div class="row justify-content-between pb-3">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Previous Page Link -->
            <?php if ($pageNumber > 1 && !empty($data)) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo base_url('admin/Delete_acc/rejectRequest/1'); ?>"><< First</a>
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
                        <a class="page-link" href="<?php echo base_url('admin/Delete_acc/rejectRequest/' . $i); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            <?php endif; ?>

            <?php if ($pageNumber < ceil($TotalCount / $perPage) && !empty($data)) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo base_url('admin/Delete_acc/rejectRequest/' . ceil($TotalCount / $perPage)); ?>">Last >></a>
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
				<?php if (!empty($rejectedUsers)): ?>	
                    <table class="table card-table table-vcenter table-bordered">
                        <thead class="text-center">
                               <tr>
                                    <th>Sr.No.</th>
									<!--<th>User ID</th>-->
									<th align="center">Name</th>
									<th align="center">Email</th>
									<th align="center">Reject Reason</th>
									<th align="center">Mobile</th>
									<th align="center">Email verified</th>
									<th align="center">Registered Platform</th>
									<!---<th>Created At</th>
									<th>Updated At</th>-->
									<th>Status</th>
                               </tr>
                        </thead>
                    <tbody>
					
   <?php foreach ($rejectedUsers as $index => $user): ?>
            <tr>
                <td align="center"><?php echo $StartCount + $index; ?></td>
                <td align="center"><?php echo $user['user_name']; ?></td>
                <td align="center"><?php echo $user['user_email']; ?></td>
				<td align="center"><?php echo $user['admin_rejection_reason']; ?></td>
                <td align="center"><?php echo $user['user_mobile']; ?></td>
                <td align="center"><?php echo $user['user_email_verify'] ? 'Yes' : 'No'; ?></td>
                <td align="center"><?php echo $user['created_from']; ?></td>
				
				<td align="center">
					<?php
					$status = $user['status'];
					$badgeClass = ($status == 'approved') ? 'badge badge-success' : 'badge badge-danger';
					?>
					<span class="<?= $badgeClass ?>"><?php echo $status; ?></span>
				</td>
            </tr>
        <?php endforeach; ?>
</tbody>
</table>
<?php else: ?>
    <p>No rejected users for account deletion.</p>
<?php endif; ?>
</div>


<!---<script>
    function setAction(action) {
        document.getElementById('rejectFormAction').value = action;
    }

    function confirmWithReason() {
        $('#rejectModal').modal('show');
    }

    function prepareReject() {
       
        document.getElementById('rejectForm').submit();
    }
</script>-->


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Automatically hide success message after 5 seconds
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 5000);

        // Automatically hide error message after 5 seconds
        setTimeout(function() {
            $('#errorMessage').fadeOut('slow');
        }, 5000);
    });
</script>

<!-- <script>
    function setAction(action) {
        // Set the action directly in the form
        document.getElementById('rejectForm').setAttribute('action', '<?php echo base_url('admin/Delete_acc/delete_user'); ?>');
        document.getElementById('rejectForm').setAttribute('data-action', action); // Add a data attribute to store the action
        // Debugging: log the action to the console
        console.log('Action:', action);
    }

    function confirmWithReason() {
        $('#rejectModal').modal('show');
    }

    function prepareReject() {
        // Set the action before submitting the form
        var action = document.getElementById('rejectForm').getAttribute('data-action');
        document.getElementById('rejectForm').action += '?action=' + action;
        // Submit the form when the Reject button in the modal is clicked
        document.getElementById('rejectForm').submit();
    }
</script> -->





<!-- <script>
    function confirmWithReason() {
        $('#rejectModal').modal('show');
    }

    function prepareReject() {
        // Submit the form when the Reject button in the modal is clicked
        document.getElementById('rejectForm').submit();
    }
</script> -->
                                                                            
 <?php include("application/views/admin/admin_footer_view.php");?>

