<!-- Include Header -->
<?php include("application/views/admin/admin_header_view.php"); ?>

<!-- Content Wrapper -->
<div class="app-content">
    <div class="side-app">
        <!-- Page Header -->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-map-marker mr-1"></i> IP Address Geolocation</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">IP Address Geolocation</li>
            </ol>
        </div>

        <!-- Content Header -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h3 class="card-title" style="font-size:22px;">IP Address Geolocation</h3>

                       <a class="btn bg-red btn-sm" href="<?php echo site_url('admin/IpAddress/add_ip_address_view'); ?>"><i class="fa fa-plus-square"></i>&nbsp;Add IP Address To Filter</a>
                        
                        <!-- <input type="text" class="form-control" id="ipAddressFilter" placeholder="Enter IP Address"> -->

                    </div>

                    <div class="card-body">
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>

<!-- Include Footer -->
<?php include("application/views/admin/admin_footer_view.php"); ?>

<!-- Include DataTables JS and Bootstrap JS/CSS for Modal -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- DataTable Initialization and Modal Script -->
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#ipTable').DataTable({
            dom: 'Bfrtip',
            serverSide: true,
            processing: true,
            ajax: {
                url: '<?php echo base_url('admin/IpAddress/fetch_geolocations'); ?>',
                type: 'GET',
                data: function(d) {
                    // Add search parameters for all columns
                    d.search.value = d.search.value; // Global search value
                    d.video_id = d.columns[7].search.value; // Video ID search value
                    d.filter_ip = $('#ipAddressFilter').val(); // IP filter value
                }
            },
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1; // Correctly calculates Sr No.
                    }
                },
                { data: 'ip_address' },
                { data: 'city' },
                { data: 'region' },
                { data: 'country' },
                { data: 'latitude' },
                { data: 'longitude' },
                { data: 'video_id' },
                { data: 'created_at' }
            ],
            buttons: [{
                extend: 'excel',
                text: 'Export to Excel',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all' // Export all pages
                    }
                }
            }]
        });

        // Event Listener for Enter key on IP Address Input Field
        $('#ipAddressFilter').keypress(function(e) {
            if (e.which == 13) { // Enter key pressed
                var ipAddress = $(this).val();
                if (ipAddress) {
                    // Draw DataTable with the IP Address filter applied
                    table.draw();
                } else {
                    alert('Please enter an IP address to filter');
                }
            }
        });
    });
</script>