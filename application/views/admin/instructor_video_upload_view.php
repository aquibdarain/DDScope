<?php include("application/views/admin/admin_header_view.php"); ?>

<div class="app-content">
    <div class="side-app">

        <div class="page-header">
            <h3 class="page-title"><i class="si si-wrench mr-1"></i>Upload Video</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Instructor_video/index'); ?>">Videos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload Video</li>
            </ol>
        </div>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Upload Video</div>
                        </div>
                        <div class="card-body">

                            <?php if ($this->session->flashdata('success')): ?>
                                <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                            <?php endif; ?>

                            <?php if (isset($error)): ?>
                                <p class="alert alert-danger"><?php echo $error; ?></p>
                            <?php endif; ?>

                            <!-- form start -->
                            <?php echo form_open_multipart('admin/Instructor_video/save_video', ['class' => 'form-horizontal']); ?>

                            <div class="row pl-2">
                                <div class="col-xl-6 pr-7 form-group">
                                    <label for="caption" style="font-size:14.5px;">Caption</label>
                                    <input type="text" class="form-control" id="caption" name="caption" required placeholder="Video Caption">
                                </div>

                                <div class="col-xl-6 form-group">
                                    <label for="vidnum" class="control-label" style="font-size:14.5px;">Upload Video</label>
                                    <input type="file" class="form-control" name="vidnum" required>
                                </div>

                                <!-- New Duration Field -->
                                <div class="col-xl-6 form-group">
                                    <label for="duration" class="control-label" style="font-size:14.5px;">Duration (HH:MM)</label>
                                    <input type="text" class="form-control" id="duration" name="duration" required placeholder="e.g., 01:30 for 1 hour 30 minutes">
                                </div>
                            </div>


                            <div class="mt-2 pl-2">
                                <input type="submit" class="btn btn-sm btn-info" value="Upload Video">
                            </div>

                            <?php echo form_close(); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include("application/views/admin/admin_footer_view.php"); ?>