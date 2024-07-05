<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">

        <!-- Page Header -->
        <div class="page-header">
            <h3 class="page-title"><i class="fa fa-question-circle mr-1"></i>Add FAQ</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add FAQ</li>
            </ol>
        </div>

        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header bg-default">
                        <div class="card-title" style="font-size:20px;"><i class="fa fa-plus-circle mr-2"></i>Add FAQ</div>
                    </div>

                    <div class="card-body pt-0">
                        <?php if ($this->session->flashdata('add_success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo $this->session->flashdata('add_success'); ?>
                            </div>
                        <?php } ?>

                        <?php echo validation_errors(); ?>
                        <?php $attributes = array('role' => 'form', 'onsubmit' => 'return validate();'); ?>
                        <?php echo form_open('admin/Faqs/add_faq', $attributes); ?>

                        <div class="row">
                            <div class="col-xl-6">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Question</label></h5>
                                    </p>
                                    <input type="text" name="question" class="form-control" placeholder="Enter the question" value="<?php echo set_value('question'); ?>">
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <br>
                                <div class="wrapper ml-3">
                                    <p class="mb-0">
                                    <h5><label class="label">Answer</label></h5>
                                    </p>
                                    <textarea name="answer" class="form-control" placeholder="Enter the answer"><?php echo set_value('answer'); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-xl-6">
                                <div class="wrapper ml-3">
                                    <input type="submit" name="submit" class="btn btn-secondary mr-3" value="Add FAQ">
                                </div>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><br><br><!-- /.content-wrapper -->
<?php include("application/views/admin/admin_footer_view.php"); ?>
