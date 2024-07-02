<?php include("application/views/header_view.php"); ?>


 

<main class="align-self-center">
  <section class="blankSection">
    <div class="banneroverlay"></div>
    <div class="container">
      <div class="row align-items-md-center ">
        <div class="col-lg-6 mobwelcomepic">
          <img src="<?php echo base_url('images/home-img-mob.jpg') ?>" alt="" class="img-fluid  d-block mx-auto ">
        </div>
        <div class="col-lg-6">
  <div class="welcometxt">
  <div id="messageContainer" class="message-container">  
  <h2 class="title" id="message1">
    WORLD’S FIRST EQUITY INVESTMENT PLATFORM AUTOMATING THE "STRESSLESS TRADING METHOD" TO 
    EARN <a href="<?php echo base_url('Home/ads'); ?>" class="button">EXTRA CASH</a> 
    FOR YOU AT EVERY TRADE.
</h2>
 <h2 class="title" id="message2" style="display: none;">Use a truly mathematical prediction-less strategy that you can clearly understand and trust.</h2>
    </div>
    <p class="pb-3" style="border-top: 3px solid #2A4D63; padding-top: 10px;">Sign up for our waitlist and be the first to know more!</p>
    <a href="<?php echo base_url('Home/waitlist'); ?>" class="btn btn-primary" style="background-color: #1e4e65;">JOIN WAITLIST</a>
  </div>
</div>
      </div>
    </div>
  </section>
  <br>
  <br>
 
  <img id="scrollPhoto" src="<?php echo base_url('images/DD_Mobile_App.png') ?>" style="max-width: 100%; height: auto;">

</main>

<?php include("application/views/footer.php"); ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var messageContainer = document.getElementById("messageContainer");
  var message1 = document.getElementById("message1");
  var message2 = document.getElementById("message2");
  var containerHeight = messageContainer.clientHeight;
  var messageHeight = 100;
  var currentPosition = 0;
  var currentMessage = 1;
  var increment = 2; // Adjust the increment for smoother scrolling
  var initialPosition = 0; // Initial position of the message

  function scrollMessages() {
    currentPosition -= increment;
    if (currentPosition <= -messageHeight) {
      currentPosition = containerHeight;
      if (currentMessage === 1) {
        message1.style.display = "none";
        message2.style.display = "block";
        currentMessage = 2;
      } else {
        message1.style.display = "block";
        message2.style.display = "none";
        currentMessage = 1;
      }
    }
     if (currentPosition === initialPosition) {
      setTimeout(function() {
        scrollMessages();  
      }, 10000);  
      return;  
    }
    message1.style.transform = "translateY(" + currentPosition + "px)";
    message2.style.transform = "translateY(" + currentPosition + "px)";
    requestAnimationFrame(scrollMessages);  
  }

  setTimeout(function() {
    scrollMessages();  
  }, 10000);
});
</script>



</body>

</html>