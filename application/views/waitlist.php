<?php include("application/views/header_view.php"); ?>

<br><br><br><br><br><br>

<!-- <section class="innerbanner ">
</section> -->


<main class="align-self-center">
    <!-- <section class="bg-con"> -->

        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <img src="<?php echo base_url('images/signin-img.jpg'); ?>" alt="" class="img-fluid d-block mx-auto">
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

                            <div class="contactpage-form shadow rounded">
                                <h2 class="mb-0" style="color: #1D4E66;">WaitList Form</h2>
                                <?php
                                $success_message = $this->session->flashdata('success_message');
                                $error_message = $this->session->flashdata('error_message');

                                if (!empty($success_message)) {
                                    echo '<div class="alert alert-success">' . $success_message . '</div>';
                                } elseif (!empty($error_message)) {
                                    echo '<div class="alert alert-danger">' . $error_message . '</div>';
                                }
                                ?>
                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                <script>
                                    $(document).ready(function() {
                                        setTimeout(function() {
                                            $('.alert').fadeOut('slow');
                                        }, 100000);
                                    });
                                </script>
                                <!--<form action="https://dozendiamonds.com/Home/waitlist_submit" class="row g-3" onsubmit="return validateForm()" method="post" accept-charset="utf-8">-->

                                <?php echo form_open('Home/waitlist_submit', array('class' => 'row g-3', 'onsubmit' => 'return validateForm()')); ?>

                                <div class="col-lg-12 position-relative mt-4">
                                    <label for="validationDefault03" class="form-label">Full Name<span style="color: red;">*</span></label>

                                    <?php echo form_input(array('type' => 'text', 'name' => 'name', 'id' => 'validationDefault03', 'class' => 'form-control', 'required' => 'required')); ?>

                                    <!--</?= form_input(array('type' => 'text', 'name' => 'name', 'id' => 'validationDefault03', 'class' => 'form-control', 'required' => 'required')); ?>
                                 <span id="nameError" class="text-danger" style="display: none">Please enter a valid name (at least 3 characters)</span> -->
                                </div>

                                <div class="col-lg-12 position-relative">
                                    <label for="validationDefault04" class="form-label">Email<span style="color: red;">*</span></label>
                                    <?php echo form_input(array('type' => 'email', 'name' => 'email', 'id' => 'validationDefault04', 'class' => 'form-control', 'required' => 'required')); ?>
                                    <!-- <span id="emailError" class="text-danger" style="display: none">Please enter a valid email</span> -->
                                </div>

                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                                    <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                                </div>

                                <!---<div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required>
								<div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-vsyqwcmq5i6c" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU&amp;co=aHR0cHM6Ly9kb3plbmRpYW1vbmRzLmNvbTo0NDM.&amp;hl=en&amp;v=V6_85qpc2Xf2sbe3xTnRte7m&amp;size=normal&amp;cb=a6evzsj9gjp5"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
								
                                <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                            </div>-->

                                <div class="col-lg-12">
                                    <?php echo form_submit(array('class' => 'btn btn-primary enquir-btn', 'id' => 'submitButton', 'style' => 'background-color: #1D4E66;'), 'SUBMIT'); ?>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- </section> -->
    </section>

</main>

<script>
    function validateForm() {
        var isValid = true;

        var nameInput = document.getElementById("validationDefault03");
        var nameRegex = /^[A-Za-z\s]{3,}$/; // Regular expression to allow only alphabetical characters and spaces, minimum 3 characters

        if (nameInput.value.trim() === "" || !nameRegex.test(nameInput.value.trim())) {
            document.getElementById("nameError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("nameError").style.display = "none";
        }

        var emailInput = document.getElementById("validationDefault04");
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailInput.value.trim() === "" || !emailRegex.test(emailInput.value.trim())) {
            document.getElementById("emailError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("emailError").style.display = "none";
        }

        // var recaptchaResponse = grecaptcha.getResponse();
        // if (!recaptchaResponse || recaptchaResponse.length === 0) {
        //     document.getElementById("recaptchaError").style.display = "block";
        //     isValid = false;
        // } else {
        //     document.getElementById("recaptchaError").style.display = "none";
        // }

        return isValid;
    }
</script>

<script>
    function validateForm() {
        var isValid = true;

        // Captcha validation
        var recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse || recaptchaResponse.length === 0) {
            document.getElementById("recaptchaError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("recaptchaError").style.display = "none";
        }

        return isValid;
    }
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include("application/views/footer.php"); ?>



<div id="back-top"><a href="#top"><span></span></a> </div>

<script src="<?php echo base_url('js/jquery-3.6.0.min.js'); ?>"></script>


<!--Bootstrap Bundle with Popper -->
<script src="<?php echo base_url('js/bootstrap.bundle.min.js'); ?>"></script>

<script src="<?php echo base_url('js/topscroll.js'); ?>"></script>
<script src="<?php echo base_url('source/jquery.fancybox.js?v=2.1.5'); ?>"></script><!-- Fancy Box Popup -->
<script src="<?php echo base_url('js/scrolla.jquery.min.js'); ?>"></script><!--Animate JS-->
<script src="<?php echo base_url('js/menu-script.js'); ?>"></script><!--Navigation menu-->
<script src="<?php echo base_url('js/wow.min.js'); ?>"></script>

<script src="<?php echo base_url('js/owl.carousel.min.js'); ?>"></script>


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
        items: 1,
        smartSpeed: 450,
        loop: true,
        autoplay: true,
        dots: false
    });
</script>


<script src="<?php echo base_url('js/main.js'); ?>"></script>

</body>

</html>