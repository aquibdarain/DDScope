<footer class="align-self-end">
  <section class="footer">
    <div class="container">

      <ul class="footlist">
        <li><a href='<?php echo base_url('Home/career'); ?>'>Careers</a> |</li>
        
        <li><a href='<?php echo base_url('Home/video'); ?>'>Video</a> |</li>
        <li><a href='<?php echo base_url('Home/policy'); ?>'>Privacy Policy</a> </li>
        <!-- <li><a href='terms.html'>Terms & Conditions</a></li> -->
      </ul>
      <p class="copywrite">Copyright &copy; 2024 DozenDiamonds. All Rights Reserved.</p>

    </div>
  </section>
</footer>
<div id="back-top"><a href="#top"><span></span></a> </div>

    <script src="<?php echo base_url('js/jquery-3.6.0.min.js')?>"></script>


    <!--Bootstrap Bundle with Popper -->
    <script src="<?php echo base_url('js/bootstrap.bundle.min.js')?>"></script>

    <script src="<?php echo base_url('js/topscroll.js')?>"></script>
    <script src="<?php echo base_url('source/jquery.fancybox.js?v=2.1.5')?>"></script><!-- Fancy Box Popup -->
    <script src="<?php echo base_url('js/scrolla.jquery.min.js')?>"></script><!--Animate JS-->
    <script src="<?php echo base_url('js/menu-script.js')?>"></script><!--Navigation menu-->
    <script src="<?php echo base_url('js/wow.min.js')?>"></script>

    <script src="<?php echo base_url('js/owl.carousel.min.js')?>"></script>


    <!-- loading -->
<script>

  window.onload = function() {
      // Page and resources are fully loaded, execute your code
      $(".se-pre-con").fadeOut(3000);
  };


</script>

<script>
  $('.fadeOut').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    items:1,
    smartSpeed:450,
    loop:true,
    autoplay:true,
    dots:false
});
</script>


    <script src="<?php echo base_url('js/main.js')?>"></script>
    