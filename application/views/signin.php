<?php include("application/views/header_view.php"); ?>


<!-- <section class="innerbanner ">
</section> -->

<br><br><br>
<main class="align-self-center">
    <!-- <section class="bg-con"> -->
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <img src="<?php echo base_url('images/signin-img.jpg') ?>" alt="" class="img-fluid d-block mx-auto">
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
                                <h2 class="mb-0" style="color: #1D4E66;">Log In</h2>
                                <span class="d-block fs-6 mb-4">Log In to Your Account</span>
                                <?php
                                $success_message = $this->session->flashdata('success_message');
                                $error_message = $this->session->flashdata('error_messages');

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

                                <?= form_open('home/Signindata', array('class' => 'row g-3', 'onsubmit' => 'return validateForm()')); ?>

                                <div class="col-lg-12 position-relative">
                                    <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                                    <?= form_input(array('type' => 'text', 'name' => 'email', 'id' => 'validationDefault03', 'class' => 'form-control', 'required' => 'required')); ?>
                                    <span id="emailError" class="text-danger" style="display: none">Please enter valid email</span>
                                </div>

                                <div class="col-lg-12 position-relative">
                                    <label for="validationDefault03" class="form-label">Password<span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <?= form_password(array('name' => 'password', 'id' => 'passwordInput', 'class' => 'form-control', 'required' => 'required')); ?>
                                        <style>
                                            #toggleButton:hover {
                                                background-color: #ffffff !important;
                                            }
                                        </style>

                                        <button type="button" id="toggleButton" class="btn btn-outline-secondary" onclick="togglePassword()">
                                            <img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg'); ?>" alt="close-eye-icon">
                                        </button>
                                    </div>
                                    <span id="passwordError" class="text-danger" style="display: none">Please enter a valid password</span>
                                </div>

                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                                    <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                                </div>

                                <!---<div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required=""> 
								
								<div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-9p6v944xmp06" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU&amp;co=aHR0cHM6Ly9kb3plbmRpYW1vbmRzLmNvbTo0NDM.&amp;hl=en&amp;v=V6_85qpc2Xf2sbe3xTnRte7m&amp;size=normal&amp;cb=y7ovz75wvl7q"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
								
                                <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                            </div>--->

                                <div class="col-lg-12">
                                    <?= form_submit(array('class' => 'btn btn-primary enquir-btn', 'id' => 'submitButton'), 'SUBMIT'); ?>
                                </div>

                                <div>
                                    <span>
                                        Don't have an account? <?= anchor('home/Signup', 'Sign Up', array('style' => 'color: #2f73b2;')); ?>
                                    </span>
                                </div>
                                <span>
                                    <?= anchor('home/forgetpassword', 'Forget Password?', array('style' => 'color: #2f73b2;')); ?>
                                </span>
                                <?= form_close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- </section> -->
    </section>



</main>

<?php include("application/views/footer.php"); ?>

<script src='https://www.google.com/recaptcha/api.js'></script>


<script>
    function validateForm() {
        var isValid = true;

        var emailInput = document.getElementById("validationDefault03");
        if (emailInput.value.trim() === "" || !validateEmail(emailInput)) {
            document.getElementById("emailError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("emailError").style.display = "none";
        }

        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.value.trim() === "") {
            document.getElementById("passwordError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("passwordError").style.display = "none";
        }

        // captcha validation 
        var recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse || recaptchaResponse.length === 0) {
            document.getElementById("recaptchaError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("recaptchaError").style.display = "none";
        }

        if (isValid) {
            document.getElementById("submitButton").disabled = true;
        }

        return isValid;
    }

    function validateEmail(input) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(input.value);
    }

    function togglePassword() {
        var passwordInput = document.getElementById("passwordInput");
        var toggleButton = document.getElementById("toggleButton");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url('images/openE.png') ?>" alt="open-eye-icon">';
        } else {
            passwordInput.type = "password";
            toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg') ?>" alt="close-eye-icon">';
        }
    }
</script>

</body>

</html>