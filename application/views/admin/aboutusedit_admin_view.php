<?php include("application/views/admin/admin_header_view.php"); ?>
<!-- Content Wrapper. Contains page content -->
<div class="app-content">
    <div class="side-app">

        <!--Page Header-->
        <div class="page-header">
            <h3 class="page-title"><i class="fe fe-layers mr-1"></i>Edit About Us</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/aboutus'); ?>">About Us</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit About Us</li>
            </ol>
        </div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">About Us Edit Form</div>
                        </div>
                        <div class="card-body">
                            <?php if ($add_error) { ?>
                                <p class="login-box-msg callout callout-danger"><?php echo $add_error; ?><BR></p>
                            <?php
                            } ?>

                            <!-- form start -->
                            <?php $attribute = array('class' => 'form-horizontal'); ?>
                            <?php echo form_open_multipart('admin/aboutus/updateaboutus', $attribute); ?>

                            <div class="">
                                <div class="row">
                                    <div class="form-group col-md-6 pl-6">
                                        <label for="abt_title" style="font-size:14.4px;">Title</label>
                                        <input type="text" class="form-control" id="abt_title" name="abt_title" value="<?php echo stripslashes($aboutus->abt_title); ?>" required placeholder="abt_title">

                                        <?php echo form_error('abt_title', '<p class="text-danger">', '</p>') ?>
                                    </div>


                                    <!-- <div class="form-group col-3">
                                        <label for="download" class="pl-6" style="font-size:14.3px;">Image 1</label><br>

                                        <input type="file" class="pl-6" name="abt_image" id="abt_image">
                                        <?php if ($aboutus->abt_image != '') { ?><br>
                                            <a href="<?php echo base_url('upload/je/' . $aboutus->abt_image); ?>" class="pl-6" target="_new">View Image</a>
                                        <?php } ?>
                                        <input type="hidden" name="old_file" value="<?php echo stripslashes($aboutus->abt_image); ?>">

                                        <?php echo form_error('abt_image', '<p class="text-danger">', '</p>') ?>
                                    </div> -->

                                    <!-- <div class="form-group col-3">
                                        <label for="download2" class="pl-6" style="font-size:14.3px;">Image 2</label><br>

                                        <input type="file" class="pl-6" name="abth_image" id="abth_image">
                                        <?php if ($aboutus->abth_image != '') { ?>
                                            <a href="<?php echo base_url('upload/je/' . $aboutus->abth_image); ?>" class="pl-6" target="_new">View Image</a>
                                        <?php } ?>
                                        <input type="hidden" name="oldh_file" value="<?php echo stripslashes($aboutus->abth_image); ?>">

                                        <?php echo form_error('abth_image', '<p class="text-danger">', '</p>') ?>
                                    </div> -->
                                </div>


                                <div class="form-group">
                                    <label for="abt_desc" class="pl-5 mt-2" style="font-size:14.3px;">Description</label>
                                    <div class="card-body">
                                        <textarea class="content" name="abt_desc">
							          	<?php echo stripslashes($aboutus->abt_desc); ?>
							          </textarea>

                                        <?php echo form_error('abt_desc', '<p class="text-danger">', '</p>') ?>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-2 mb-0 pl-5">
                                <button type="submit" class="btn btn-sm btn-info">Update</button>
                                <input type="hidden" name="abt_id" value="<?php echo $abt_id; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div><br><br>
<!-- Main content -->

<?php include("application/views/admin/admin_footer_view.php"); ?>