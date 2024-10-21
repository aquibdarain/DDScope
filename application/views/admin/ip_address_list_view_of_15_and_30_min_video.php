<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">
        <!--Page Header-->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-map-marker mr-1"></i> IP Address Geolocation</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">IP Address Geolocation</li>
            </ol>
        </div>

        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title" style="font-size:22px;">IP Address Geolocation</h3>
                        
                        <!-- Display Total Entries -->
                        <button class="btn btn-primary btn-sm mb-4" style="cursor: auto;">
                            <strong><?php echo "[ " . $StartCount . " - " . $EndCount . " OF " . $TotalCount . " ]"; ?></strong>
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Video Count Section -->
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <div style="position: relative; left: -20px;">
                                <button class="btn btn-danger btn-sm" style="width: auto;">
                                    <strong>15-Minute Videos count: <?php echo $count_15_min_videos; ?></strong>
                                </button>
                                <button class="btn btn-danger btn-sm" style="width: auto;">
                                    <strong>30-Minute Videos count: <?php echo $count_30_min_videos; ?></strong>
                                </button>
                            </div>
                        </div>

                        <!-- Flash Message -->
                        <?php if ($this->session->flashdata('data_updated')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('data_updated'); ?>
                            </div>
                        <?php } ?>

                        <!-- Table Data -->
                        <div class="table-responsive">
                            <table id="ipTable" class="table card-table table-vcenter table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>IP Address</th>
                                        <th>City</th>
                                        <th>Region</th>
                                        <th>Country</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Video ID</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($all_ip_locations)) {
                                        $count = 1;
                                        foreach ($all_ip_locations as $loc) { ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $loc['ip_address']; ?></td>
                                                <td><?php echo $loc['city']; ?></td>
                                                <td><?php echo $loc['region']; ?></td>
                                                <td><?php echo $loc['country']; ?></td>
                                                <td><?php echo $loc['latitude']; ?></td>
                                                <td><?php echo $loc['longitude']; ?></td>
                                                <td><?php echo $loc['video_id']; ?></td>
                                                <td><?php echo $loc['created_at']; ?></td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="9" style="font-size: 14px;">No location data found.</td>
                                        </tr>
                                    <?php } ?>
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

<!-- Include DataTables JS and CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- DataTable Initialization -->
<script>
    $(document).ready(function() {
        $('#ipTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all' // Export all data
                        }
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all' // Export all data
                        }
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all' // Export all data
                        }
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all' // Export all data
                        }
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {
                            page: 'all' // Export all data
                        }
                    }
                }
            ]
        });
    });
</script>