<?php include("application/views/header_view.php"); ?>


<br>
<br>
<br>
<br>
<br>

<main class="align-self-center">
<section class="bg-con">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-12">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <img src="<?php echo base_url('images/fpassword.jpg');?>" alt="" />
                        </div>
                        <div class="col-lg-6">
                            <div class="alert alert-success alert-dismissible fade show" id="successAlert" style="
                                top: 0;
                                right: 60px;
                                position: relative;
                                display: none;
                            " role="alert">
                                <button type="button" class="btn-close"></button>
                            </div>
                            <?php   $success_message = $this->session->flashdata('success_message');?>
                                     
                            <div class="contactpage-form shadow rounded">
                                <?php if (isset($link_expired) && $link_expired): ?>
                                    <div class="message-box">
                                        <div style="border: 2px solid #ff6666; background-color: #ffe6e6; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                                            <p style="color: #cc0000; font-size: 18px; font-weight: bold;">Oops! The link has expired.</p>
                                            <p style="color: #ff6666; font-size: 16px; margin-top: 5px;">Please go to <a href="<?php echo base_url('home/forgetpassword');?>" style="color: #2f73b2;">Forget Password</a> to request a reset password link.</p>
                                        </div>
                                    </div>

                                <?php elseif (isset($link_expiredforverify) && $link_expiredforverify): ?>
                                    <div class="message-box">
                                        <div style="border: 2px solid #ff6666; background-color: #ffe6e6; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                                            <p style="color: #cc0000; font-size: 18px; font-weight: bold;">Oops! The link has expired.</p>
                                            <p style="color: #ff6666; font-size: 16px; margin-top: 5px;">
                                                Please <a href="<?php echo base_url('home/resendlink?token=' . urlencode($this->input->get('token'))); ?>" style="color: #2f73b2;">click here</a> to resend Reverification Link.
                                            </p>
                                        </div>
                                    </div>

                                    <?php elseif (isset($verification_email_sent) && $verification_email_sent): ?>
                                <div class="message-box">
                                    <div style="border: 2px solid #66ff66; background-color: #e6ffe6; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                                        <p style="color: #00cc00; font-size: 18px; font-weight: bold;">Success! Verification email has been sent.</p>
                                    </div>
                                </div>

                                <?php elseif (isset($verificationemail) && $verificationemail): ?>
                                <div class="message-box">
                                    <div style="border: 2px solid #66ff66; background-color: #e6ffe6; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                                        <p style="color: #00cc00; font-size: 18px; font-weight: bold;">Email already Verified.</p>
                                    </div>
                                </div>


                                    </div> <?php elseif (isset($invalid_token) && $invalid_token): ?>
                                    <div class="message-box">
                                        <div style="border: 2px solid #ff6666; background-color: #ffe6e6; padding: 10px; border-radius: 5px; text-align: center; margin-top: 20px;">
                                            <p style="color: #cc0000; font-size: 18px; font-weight: bold;">404 Error. Not Found.</p>
                                            
                                        </div>
                                    </div>    

                                    <?php elseif (!empty($success_message)): ?>
                                    <div class="message-box">
                                        <div class="alert alert-success text-center" role="alert">
                                            <?php echo $success_message; ?>
                                         </div>
                                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                         
                                    </div>
                                <?php else: ?>
                                    <script>window.location.href = "<?php echo base_url('Home/signin');?>";</script>;

                                 
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  

</main>

<?php include("application/views/footer.php"); ?>


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
      $(".se-pre-con").fadeOut("slow");
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
<script>
    function validateForm() {
        var isPasswordValid = validatePasswordFormat(document.getElementById("passwordInput"));
        var doPasswordsMatch = confirmPasswordMatch(document.getElementById("confPasswordInput"));

        return isPasswordValid && doPasswordsMatch;
    }

    function validatePasswordFormat(input) {
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!<>])[0-9a-zA-Z@$#%^&*!<>]{8,}$/;
        var isValid = passwordRegex.test(input.value);

        document.getElementById("passwordError").style.display = isValid ? "none" : "block";
        return isValid;
    }

    function confirmPasswordMatch(input) {
        var passwordInput = document.getElementById("passwordInput");
        var isValid = input.value === passwordInput.value;

        document.getElementById("passwordConfError").textContent = isValid ? "" : "Passwords must match.";
        document.getElementById("passwordConfError").style.display = isValid ? "none" : "block";

        return isValid;
    }

    function togglePassword(fieldId, buttonId) {
        const passwordInput = document.getElementById(fieldId);
        const toggleButton = document.getElementById(buttonId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url("assets/images/openE.png"); ?>" alt="open-eye-icon">';
        } else {
            passwordInput.type = "password";
            toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url("images/closeE.jpg"); ?>" alt="close-eye-icon">';
        }
    }
</script>

    <script src="<?php echo base_url('js/main.js')?>"></script>
    

  </body>
</html>
