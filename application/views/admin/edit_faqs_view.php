<?php include("application/views/admin/admin_header_view.php"); ?>
<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-edit mr-1"></i>Edit FAQ</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/faqs/index'); ?>">FAQs</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit FAQ</li>
            </ol>
        </div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-title">FAQ Edit Form</div>
                            <a href="<?php echo base_url('admin/faqs/index'); ?>" class="btn btn-secondary">Back</a>
                        </div>
                        <div class="card-body">
                            <!-- <?php if ($add_error) { ?>
                                <p class="login-box-msg callout callout-danger"><?php echo $add_error; ?><br></p>
                            <?php } ?> -->
                            <?php $attributes = array('class' => 'form-horizontal'); ?>
                            <?php echo form_open('admin/faqs/update_faq', $attributes); ?>
                            <div class="">
                                <div class="row pb-2 mr-3 ml-4">
                                    <div class="col-xl-6 form-group">
                                        <label for="question" style="font-size:14.5px;">Question</label>
                                        <input type="text" class="form-control" name="question" id="question" placeholder="Question" value="<?php echo stripslashes($faq->question); ?>" required>
                                        <?php echo form_error('question', '<p class="text-danger">', '</p>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="answer" class="ml-5 control-label" style="font-size:14.5px;">Answer</label>
                                    <div class="col-sm-12 ml-4">
                                        <textarea id="answer" name="answer" rows="10" cols="85"><?php echo stripslashes($faq->answer); ?></textarea>
                                        <?php echo form_error('answer', '<p class="text-danger">', '</p>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 mb-0 ml-5">
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $faq->id; ?>">
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br>
<?php include("application/views/admin/admin_footer_view.php"); ?>
