<?php include("application/views/header_view.php"); ?>

<style>
    .contactpage-form {
        top: 0;
        right: 0px;
        position: relative;
        background: #fff;
        padding: 10px 30px 20px;
        margin: 2px;
        /* margin-left: 10px;
    margin-right: -70px; */
    }

    @media (max-width: 992px) {

        .contactpage-form {
            top: 0;
            right: 0px;
            position: relative;
            background: #fff;
            padding: 10px 30px 20px;
            margin: 2px;
            margin-left: 10px;
            margin-right: 10px;
        }
    }

    /* img {
        max-width: 100%;
    } */
</style>
<section class="innerbanner"></section>
<section class="bg-con">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12">
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <img src="<?php echo base_url('images/signin-img.jpg'); ?>" alt="" />
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
                            <h2 class="mb-0" style="color: #1D4E66;">Sign In</h2>
                            <span class="d-block fs-6 mb-4">Sign In to Your Account</span>
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
    <div class="row"></div>

    <!-- Enquiry button code start from here -->
    <!-- <div class="floating-button">

        <a href="<?php echo base_url('Home/enquire'); ?>">
            <button type="button" class="btn enquire-btn custom-enquire-btn sticky-btn">
                Enquire Now
            </button>
        </a>

    </div>

    <style>
        .custom-enquire-btn {
            background-color: #1D4E66;
            color: white;
            margin-top: 408px;
            border-radius: 100px;
            font-weight: 600;
            position: fixed;
            /* Add padding to increase the clickable area */
            padding: 10px 20px;
            /* Add transition for smooth effect */
            transition: border-color 0.3s ease;
            /* Initial border color */
            border: 2px solid transparent;
        }

        .custom-enquire-btn:hover {
            border-color: black;
        }
    </style> -->
    <!-- Enquiry button code end here -->


</section>

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
            toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url("images/openE.png"); ?>" alt="open-eye-icon">';
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
                    <a href="<?php echo base_url(''); ?>">Home</a> |
                    <a href="<?php echo base_url('Home/vision'); ?>">Our vision</a> |
                    <a href="<?php echo base_url('Home/career'); ?>">Careers</a> |
                    <a href="<?php echo base_url('Home/video'); ?>">Videos</a> |
                    <a href="<?php echo base_url('Home/ads'); ?>">Ads</a>|
                    <a href="<?php echo base_url('Home/policy'); ?>">Privacy Policy </a>
                </p>
                <p>contact@dozendiamonds.com</p>
                <p>Copyright © 2023 DozenDiamonds. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<!--  Captcha API -->
<script src='https://www.google.com/recaptcha/api.js'></script>


<!-- <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="venobox.min.js"></script>
    <script>

          function togglePassword() {
                const passwordInput = document.getElementById("passwordInput");
                const toggleButton = document.getElementById("toggleButton");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    // toggleButton.textContent = "Hide";
                    toggleButton.innerHTML = `<img style="height: 30px;" src="images/openE.png" alt="open-eye-icon">`;
                } else {
                    passwordInput.type = "password";
                    // toggleButton.textContent = "Show";
                     toggleButton.innerHTML = `<img style="height: 30px;" src="images/closeE.jpg" alt="close-eye-icon">`;
                }
            }
        $(document).ready(function () {
            $(".venobox").venobox({
                closeColor: "#f4f4f4",
                spinColor: "#f4f4f4",
                arrowsColor: "#f4f4f4",
                closeBackground: "#17191D",
                overlayColor: "rgba(23,25,29,0.8)",
            });
        });

      

        $(document).ready(function () {
            $("#validationDefault02").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if (
                    $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl/cmd+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+C
                    (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+X
                    (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow ctrl/cmd + v
                    e.keyCode === 86 ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)
                ) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if (
                    (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
                    (e.keyCode < 96 || e.keyCode > 105)
                ) {
                    e.preventDefault();
                }
            });
             
            // Close button of alert message
            $(".btn-close").click(function () {
                $("#successAlert").hide();
            });

            // Hide error message on click of respective input field
           
            $("input[name='email']").click(function () {
                $("#emailError").hide();
            });
            $("input[name='password']").click(function () {
                $("#passwordError").hide();
            });

             

            $("#submitEnquiry").click(function () {
                


                var inputEmail = $("input[name='email']").val();
                var inputPassword = $("input[name='password']").val();
                

                function IsEmail(email) {
                    var regex =
                        /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test(email)) {
                        return false;
                    } else {
                        return true;
                    }
                }

                function IsValidPassword(password){
                    var regex=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/;
                     if (!regex.test(password)) {
                        return false;
                    } else {
                        return true;
                    }

                }
             

                function validEmail() {
                    if (IsEmail(inputEmail) == false) {
                        $("#emailError").show();
                        return false;
                    } else {
                        return true;
                    }
                }

                function validPassword(){
                    if (IsValidPassword(inputPassword) == false) {
                        $("#passwordError").show();
                        return false;
                    } else {
                        return true;
                    }
                }

                // Validation check
                var emailValidation = validEmail();
                var passwordValidation= validPassword();
            

                var formData = new FormData();
               
                formData.append('web_user_email', inputEmail);
                formData.append('web_password', inputPassword);
                console.log(inputEmail, inputPassword)

                if (
                    emailValidation &&
                    passwordValidation
                ) {
                   
                    fetch("https://uatdd.virtualglobetechnology.com/web/user/signin",{method:"POST" , body : formData },)
                    .then(response=> response.json())
                    .then(
                        async(data)=>{
                            
                            
                            if(data.status==true){
                               localStorage.setItem("authToken" ,data.data.token)
                               localStorage.setItem("user_id" ,data.data.web_user_id)
                            //   
                            await renderData(data)
                                 $("#successAlert").show();
                                setTimeout(() => { $("#successAlert").hide(); }, 10000);
                                setTimeout(() => { window.location.href = "notifymepage.html" }, 1000);
                               
                                
                            }

                            if(data.status ==false){
                                // window.alert(data.message)
                                 await renderData(data)
                                $("#successAlert").show();
                                setTimeout(() => { $("#successAlert").hide(); }, 10000);
                            }
                            
                        console.log(data)
                    }
                       
                        )
                    .catch((err)=>{
                        console.log(err)
                        window.alert(err)
                    })
                 function renderData(data) {
                        console.log("comming from render", data.message)
                        const messageContainer = document.getElementById('successAlert')
                        messageContainer.innerHTML = ""
                        const messageData = document.createElement("strong")

                        messageData.textContent = data.message
                        messageContainer.appendChild(messageData)


                    }
                
                }
            });
        });
    </script> -->
<!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>-->
</body>

</html>