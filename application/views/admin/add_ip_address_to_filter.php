<!-- Include Header -->
<?php include("application/views/admin/admin_header_view.php"); ?>

<!-- Content Wrapper -->
<div class="app-content">
    <div class="side-app">
        <!-- Page Header -->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-map-marker mr-1"></i> Exclude IP Address</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exclude IP Address</li>
            </ol>
        </div>

        <!-- Content Header -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title" style="font-size:22px;">Add IP Address to Exclude</h3>
                    <a href="<?php echo base_url('admin/IpAddress/index'); ?>" class="btn btn-secondary mt-3">Back to IP Address list Page</a>

                    </div>

                    <div class="card-body">
                        <!-- Form to Add IP Address to Exclude -->
                        <?php echo form_open('admin/IpAddress/add_excluded_ip'); ?>
                        <div class="form-group">
                            <label for="ipAddress">IP Address:</label>
                            <input type="text" class="form-control" id="ipAddress" name="ip_address" placeholder="Enter IP Address to exclude from View Table">
                        </div>
                        <button type="submit" class="btn btn-primary">Add IP Address</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Excluded IP Addresses -->
        <div class="row mt-4">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title" style="font-size:22px;">Excluded IP Addresses</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($excluded_ips)) : ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>IP Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($excluded_ips as $index => $ip) : ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $ip; ?></td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin/IpAddress/delete_excluded_ip/' . urlencode($ip)); ?>">
                                                    <i class="fa fa-trash"></i> Delete
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>No IP addresses have been excluded yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>

<!-- Include Footer -->
<?php include("application/views/admin/admin_footer_view.php"); ?>