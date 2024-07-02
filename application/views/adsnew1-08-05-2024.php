<?php include("application/views/header_view.php"); ?>


<section class="video-header">
    <div class="video-container">
        <?php if (isset($vidnum)) : ?>
            <video id="adVideo" controls autoplay muted style="width: 100%; height: 100%;">
                <source src="<?php echo base_url('uploads/' . $vidnum); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php elseif (!empty($adsvideos) && !empty($adsvideos[0]->vidnum)) : ?>
            <video id="adVideo" controls autoplay muted style="width: 100%; height: 100%;">
                <source src="<?php echo base_url('uploads/' . $adsvideos[0]->vidnum); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php endif; ?>
        <?php if (!empty($adsvideos) && !empty($adsvideos[0]->title)) : ?>
            <div class="video-title-tab">
                <p><?php echo $adsvideos[0]->title; ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .video-title-tab {
        background-color: #ffff;
        /* Background color of the tab */
        color: black;
        font-size: 24px;
        /* Font size of the title */
        text-align: left;
        padding: 10px;
        margin-top: 10px;
        /* Adjust as needed */
        margin-left: 10px;
        /* Adjust as needed */
    }
</style>


<style>
    .col {
        margin-bottom: 10px;
        padding: 5px;
    }

    .card-box {
        margin-bottom: 0;
        padding: 10px;
    }

    .container-fluid {
        padding-left: 2;
        padding-right: 2;

        .selected-video {
            border: 2px solid blue;
        }
    }
</style>

<style>
    .thumbnail-container {
        width: 270px;
        /* Adjust the width as needed */
        height: 150px;
        /* Adjust the height as needed */
        overflow: hidden;
    }

    .thumbnail-image {
        width: 100%;
        /* Ensure the image fills the container */
        height: auto;
        /* Maintain aspect ratio */
        display: block;
    }
</style>
<br>
<br>
<br>


<style>
    .col {
        margin-bottom: 10px;
        padding: 5px;
    }

    .card-box {
        margin-bottom: 0;
        padding: 10px;
    }

    .container-fluid {
        padding-left: 2;
        padding-right: 2;

        .selected-video {
            border: 2px solid blue;
        }
    }
</style>

<style>
    .thumbnail-container {
        width: 270px;
        /* Adjust the width as needed */
        height: 150px;
        /* Adjust the height as needed */
        overflow: hidden;
    }

    .thumbnail-image {
        width: 100%;
        /* Ensure the image fills the container */
        height: auto;
        /* Maintain aspect ratio */
        display: block;
    }
</style>
<main class="align-self-center">
    <!-- <section class="bg-con"> -->
        <div class="container-fluid">
            <div class="row row-cols-lg-5 row-cols-1 row-cols-md-2">
                <?php foreach ($adsvideos as $video) : ?>
                    <div class="col mb-2">
                        <div class="card-box shadow rounded">
                            <?php
                            $thumbnail_url = 'http://i3.ytimg.com/vi/' . $video->vid_code . '/hqdefault.jpg';
                            ?>
                            <?php echo form_open('Home/AdsVideo'); ?>
                            <?php echo form_hidden('vidnum', encrypt_id($video->vidnum)); ?>
                            <button type="submit" style="background: none; border: none; padding: 0; margin: 0;">
                                <img src="<?php echo $thumbnail_url; ?>" alt="Video Thumbnail" class="thumbnail-image">
                            </button>
                            <?php echo form_close(); ?>
                            <p class="caption"><?php echo $video->caption; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <!-- </section> -->
</main>




<?php include("application/views/footer.php"); ?>