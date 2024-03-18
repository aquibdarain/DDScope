<?php include("application/views/header_view.php");?>
 

<section class="innerbanner">
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
                                    
                                    <?php elseif (!empty($success_message)): ?>
                                    <div class="message-box">
                                        <div class="alert alert-success text-center" role="alert">
                                            <?php echo $success_message; ?>
                                            <br>
                                            <?php echo "Click here to Sign in. <a href='" . base_url('home/signin') . "' style='color: #2f73b2;'>Sign In</a>"; ?>

                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                         
                                    </div>
                                    <?php elseif (empty($_GET['token'])): ?>
                                         <script>window.location.href = "<?php echo base_url('Home/signin');?>";</script>;

                                  <?php else: ?>
                                    <h2 class="mb-0">Create New Password</h2>
                                    <span class="d-block fs-6 mb-3">Generate Your Account New Password</span>
                                    <?php
                                    $error_message = $this->session->flashdata('error_message');

                                    if (!empty($error_message)) {
                                        echo '<div class="alert alert-danger">' . $error_message . '</div>';
                                    }
                                    ?>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                    <script>
                                        $(document).ready(function () {
                                            setTimeout(function () {
                                                $('.alert').fadeOut('slow');
                                            }, 50000);
                                        });
                                    </script>
                                     <form class="row g-3" action="<?php echo base_url('Home/forgetpassnew');?>" method="post" onsubmit="return validateForm()">
                                        <div class="col-lg-12 position-relative">
                                            <label for="validationDefault03" class="form-label">New Password<span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" id="passwordInput" value="" required oninput="validatePasswordFormat(this)" />
                                                <style>
                                                    #togglePasswordButton:hover {
                                                        background-color: #ffffff !important;
                                                    }
                                                </style><button type="button" id="togglePasswordButton" class="btn btn-outline-secondary" onclick="togglePassword('passwordInput', 'togglePasswordButton')">
                                                    <img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg');?>" alt="close-eye-icon">
                                                </button>
                                            </div>
                                            <span id="passwordError" class="text-danger" style="display: none">Password must contain: at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.</span>
                                        </div>

                                        <div class="col-lg-12 position-relative">
                                            <label for="validationDefault03" class="form-label">Confirm Password<span style="color: red;">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="conf-password" id="confPasswordInput" value="" required oninput="confirmPasswordMatch(this)" />
                                                <style>
                                                    #toggleConfPasswordButton:hover {
                                                        background-color: #ffffff !important;
                                                    }
                                                </style><button type="button" id="toggleConfPasswordButton" class="btn btn-outline-secondary" onclick="togglePassword('confPasswordInput', 'toggleConfPasswordButton')">
                                                    <img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg');?>" alt="close-eye-icon">
                                                </button>
                                            </div>
                                            <span id="passwordConfError" class="text-danger" style="display: none">Passwords must match.</span>
                                        </div>
                                        <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? htmlspecialchars($_GET['token']) : ''; ?>">

                                        <div class="col-lg-12">
                                            <button type="submit" class="btn enquir-btn" id="submitEnquiry">SUBMIT</button>
                                        </div>
                                        <div>
                                            <span>
                                                Don't have an account? <a href="<?php echo base_url('Home/signup');?>" style="color: #2f73b2;">Sign Up</a>
                                            </span>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
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
 
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>
                    <a href="<?php echo base_url('');?>">Home</a> |
                    <a href="<?php echo base_url('Home/vision');?>">Our vision</a> |
                    <a href="<?php echo base_url('Home/career');?>">Careers</a> |
                    <a href="<?php echo base_url('Home/video');?>">Videos</a> |
                    <a href="<?php echo base_url('Home/ads');?>">Ads</a>|
                    <a href="<?php echo base_url('Home/policy');?>">Privacy Policy </a>
                </p>
                <p>contact@dozendiamonds.com</p>
                <p>Copyright © 2023 DozenDiamonds. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

</body>

</html>