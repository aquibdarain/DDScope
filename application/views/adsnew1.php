<?php include("application/views/header_view.php"); ?>

<section class="video-header">
    <div class="video-container" id="video-container">
        <?php if (isset($vidnum)): ?>
            <video id="adVideo" controls autoplay muted style="width: 100%; height: 100%;">
                <source src="<?php echo base_url('uploads/' . $vidnum); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php elseif (!empty($adsvideos) && !empty($adsvideos[0]->vidnum)): ?>
            <video id="adVideo" controls autoplay muted style="width: 100%; height: 100%;">
                <source src="<?php echo base_url('uploads/' . $adsvideos[0]->vidnum); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="video-title-tab" id="video-title-tab">
                <p><?php echo $adsvideos[0]->title; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($caption)): ?>
            <div class="video-title-tab" id="video-title-tab">
                <p><?php echo $caption; ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.video-title-tab {
    position: absolute;
    top: 2px; /* Adjust top position as needed */
    left: 5px; /* Adjust left position as needed */
    color: black;
    background-color: #fff; 
    font-size: 24px; /* Font size of the title */
    padding: 5px; /* Add padding for better appearance */
    z-index: 1; /* Ensure captions are above the video */
    opacity: 0; /* Hide caption by default */
    transition: opacity 0.5s ease; /* Add transition effect for smooth hiding/showing */
    height: 30px; /* Adjust the height as needed */
    line-height: 25px; /* Center the text vertically */
}


/* Ensure the video container has relative positioning */
.video-container {
    position: relative;
}

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
    width: 270px; /* Adjust the width as needed */
    height: 150px; /* Adjust the height as needed */
    overflow: hidden;
}

.thumbnail-image {
    width: 100%; /* Ensure the image fills the container */
    height: auto; /* Maintain aspect ratio */
    display: block;
}

</style>
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
    width: 270px; /* Adjust the width as needed */
    height: 150px; /* Adjust the height as needed */
    overflow: hidden;
}

.thumbnail-image {
    width: 100%; /* Ensure the image fills the container */
    height: auto; /* Maintain aspect ratio */
    display: block;
}

</style>

<script>
// JavaScript to handle cursor movement detection and caption visibility
document.addEventListener("DOMContentLoaded", function() {
    var videoContainer = document.getElementById("video-container");
    var videoTitleTab = document.getElementById("video-title-tab");
    var timer;

    // Function to show caption when the cursor moves
    function showCaption() {
        videoTitleTab.style.opacity = "1";
    }

    // Function to hide caption after a delay when the cursor stops moving
    function hideCaption() {
        videoTitleTab.style.opacity = "0";
    }

    // Event listener to detect cursor movement
    videoContainer.addEventListener("mousemove", function() {
        clearTimeout(timer);
        showCaption();
        // Set a timer to hide the caption after 3 seconds
        timer = setTimeout(hideCaption, 2500);
    });

    // Event listener to handle when the cursor leaves the video container
    videoContainer.addEventListener("mouseleave", function() {
        clearTimeout(timer);
        hideCaption();
    });
});
</script>

<main class="align-self-center">
    <section class="bg-con">      
        <div class="container-fluid">
            <div class="row row-cols-lg-5 row-cols-1 row-cols-md-2">
                <?php foreach ($adsvideos as $video): ?>
                    <div class="col mb-2">
                        <div class="card-box shadow rounded">
                             <?php 
                        if (!empty($video->vid_code)) {
                            $thumbnail_url = 'http://i3.ytimg.com/vi/' . $video->vid_code . '/hqdefault.jpg';
                        } else {
                             $picnum = $video->picnum;  
                            $uploads_dir = 'uploads/';
                            $thumbnail_path = $uploads_dir . $picnum;
                               
                            if (file_exists($thumbnail_path)) {
                                 $thumbnail_url = base_url($thumbnail_path);
                            }  
                         }
                    ?>
                            <?php echo form_open('Home/ads'); ?>
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
    </section>
</main>

<?php include("application/views/footer.php"); ?>