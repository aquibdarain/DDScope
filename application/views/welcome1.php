<?php include("application/views/header.php"); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
  .card-box {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .video {
    max-width: 100%;
    max-height: 100%;
  }

  .video-section {
    margin-left: 220px;
  }

  .invest-button {
    position: fixed;
    top: 80%;
    right: -1400px;
    transform: translateY(-50%);
    z-index: 999;
  }

  .carousel-indicators li {
    background-color: grey;
  }
  
  .fixed-button {
  position: fixed;
  top: 70%;
  bottom: 20px; /* Adjust as needed */
  right: 20px; /* Adjust as needed */
  z-index: 999; /* Ensure it appears above other content */
}

.carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden;
    margin-left: 20px;
}
.card-box {
  width: 650px; /* Adjust as needed */
  height: 350px; /* Equal to width for a square shape */
  overflow: hidden; /* Ensure the content doesn't overflow */
  margin-left: 200px;
}
.carousel-indicators .active {
    width: 15px;
    height: 15px;
    margin: 0;
    background-color: black;
}
.carousel-indicators li {
  width: 15px; 
  height: 15px; 
  background-color: grey; /* Change color as needed */
}


</style>
<!-- <section class="innerbanner ">
</section> -->
<div class="container">
  <!-- <h2>Carousel Example</h2>   -->
  <br><br><br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="card-box shadow rounded">
          <iframe width="100%" height="350" class="video" src="https://www.youtube.com/embed/XSFN7xBaHIM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>

      <div class="item">
        <div class="card-box shadow rounded">
          <iframe width="100%" height="350" class="video" src="https://www.youtube.com/embed/EMBqhlFp9rg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>

      <div class="item">
        <div class="card-box shadow rounded">
          <iframe width="100%" height="350" class="video" src="https://www.youtube.com/embed/cjKGk8bia_s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>

      <div class="item">
        <div class="card-box shadow rounded">
          <iframe width="100%" height="350" class="video" src="https://www.youtube.com/embed/JZJWluSkk5o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
      <div class="item">
        <div class="card-box shadow rounded">
          <iframe width="100%" height="350" class="video" src="https://www.youtube.com/embed/bRnp-SuHIGs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
      <div class="item">
        <div class="card-box shadow rounded">
          <iframe width="100%" height="350" class="video" src="https://www.youtube.com/embed/ob08LRKOpDc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
      <div class="item">
        <div class="card-box shadow rounded">
          <iframe width="100%" height="350" class="video" src="https://www.youtube.com/embed/nxR_8O6z0r0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a> -->
  </div>

  <div class="fixed-button">
    <a href="https://wefunder.com/dozendiamonds/" target="_blank">
      <button type="button" class="btn enquir-btn" style="background-color: #1D4E66; color: white;">
        <span style="margin-right: 5px;">Invest</span> <i class="fas fa-external-link-alt fa-m"></i>
      </button>
    </a>
  </div>


</div>
<br><br><br><br>
<br><br><br><br>
<footer class="footer-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <p>
          <a href="#">Home</a> |
          <a href="#">Our vision</a> |
          <a href="#">Careers</a> |
          <a href="#">Videos</a> |
          <a href="#">Ads</a>|
          <a href="#">Privacy Policy </a>|
          <a href="#">Enquire Now</a>|
        </p>
        <p>contact@dozendiamonds.com</p>
        <p>Copyright © 2023 DozenDiamonds. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script>
  $(document).ready(function() {
    var carousel = $(".carousel");
    var videos = carousel.find(".video");

    // Function to check if any video is playing
    function isAnyVideoPlaying() {
      var playing = false;
      videos.each(function() {
        var video = $(this).get(0);
        if (video && !video.paused) {
          playing = true;
          return false; // Exit the loop early
        }
      });
      return playing;
    }
    // Pause all videos when next slide is shown
    carousel.on("slide.bs.carousel", function(event) {
      if (carousel.data('pause-on-video') && isAnyVideoPlaying()) {
        event.preventDefault(); // Prevent moving to the next slide
      }
      var currentSlide = $(event.relatedTarget);
      var currentVideo = currentSlide.find(".video");

      // Pause all videos except the current one
      videos.not(currentVideo).each(function() {
        var videoSrc = $(this).attr("src");
        $(this).attr("src", videoSrc); // This stops the video
      });
    });
  });
</script>
<script>
  function changeColor() {

    const videoInput = document.getElementById("btn-video")
    // <!--const adsInput = document.getElementById("btn-ads") -- >
    if (videoInput) {
      videoInput.style.backgroundColor = "#006400"
    }


  }
</script>
<!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>-->
</body>

</html>