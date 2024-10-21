<?php include("application/views/admin/admin_header_view.php"); ?>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-list mr-1"></i> Waitlist</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Waitlist</li>
            </ol>
        </div>

        <div class="card">
            <div class="card-header bg-default">
                <div class="card-title" style="font-size:20px;">
                    <i class="fa fa-search mr-2"></i>Search
                </div>
            </div>
            <div class="card-body pt-0">
                <?php $attributes = ['role' => 'form']; ?>
                <form action="<?php echo base_url('admin/Waitlist_controller/index'); ?>" method="get">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="wrapper ml-3 mt-3">
                                <p class="mb-0">
                                    <h5><label class="label">Name</label></h5>
                                </p>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?php echo !empty($searchInput['name']) ? $searchInput['name'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="wrapper ml-3 mt-3">
                                <p class="mb-0">
                                    <h5><label class="label">Email</label></h5>
                                </p>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo !empty($searchInput['email']) ? $searchInput['email'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="wrapper ml-3 mt-7">
                                <input type="submit" name="search_submit" class="btn btn-secondary mr-3" value="Search">
                                <a class="btn btn-danger mr-3" href="<?php echo base_url('admin/Waitlist_controller/reset'); ?>" name="RESET">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h3 class="card-title" style="font-size:22px;">Waitlist</h3>
                <div>Total Entries: <?php echo $TotalCount; ?></div>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('data_updated')) { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <?php echo $this->session->flashdata('data_updated'); ?>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-between">
                    <div class="text-left col-md-4 pb-2">
                        <?php echo $links; ?>
                    </div>
                    <button class="btn btn-primary btn-sm mb-4" style="cursor: auto;">
                        <strong><?php echo "[ " . $StartCount . " - " . $EndCount . " OF " . $TotalCount . " ]"; ?></strong>
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter table-bordered">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($waitlist_entries as $index => $entry) : ?>
                                <tr>
                                    <td><?php echo $StartCount + $index; ?></td>
                                    <td><?php echo $entry['name']; ?></td>
                                    <td><?php echo $entry['email']; ?></td>
                                    <td><?php echo $entry['createdAt']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("application/views/admin/admin_footer_view.php"); ?>
