<?php include("application/views/header_view.php"); ?>
<style>
    .contactpage-form {
        top: 0;
        right: 0px;
        position: relative;
        background: #fff;
        padding: 10px 30px 20px;
        margin: 2px;
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

    /* 
    img {
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
                        <img src="<?php echo base_url('assets/images/signup-img.jpg'); ?>" alt="" />

                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-success alert-dismissible fade show" id="successAlert" style="
                                top: 0;
                                right: 60px;
                                position: relative;
                                display: none;
                                " role="alert">
                            <!-- <strong>Congratulations!</strong>Your registration was successful. You can now sign in.. -->
                            <button type="button" class="btn-close"></button>
                        </div>
                        <div class="contactpage-form shadow rounded">

                            <h2 class="mb-0" style="color: #1D4E66;">Sign Up</h2>
                            <span class="d-block fs-6 mb-4">Sign Up for an Account</span>

                            <?= form_open('home/Signupdata', array('class' => 'row g-3', 'onsubmit' => 'return validateForm()')); ?>

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

                            <!-- <div class="col-lg-12 position-relative">
                                        <label for="validationDefault03" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="validationDefault01" value="" required
                                            onkeydown="return /^[A-Za-z\s]+$/i.test(event.key)" />
                                        <span id="nameError" class="text-danger" style="display: none">Please enter valid name</span>
                                    </div>
                                    <div class="col-lg-12 position-relative">
                                        <label for="validationDefault03" class="form-label">Mobile Number</label>
                                        <input type="tel" class="form-control" name="number" id="validationDefault02" value="" required
                                            />
                                        <span id="phoneError" class="text-danger" style="display: none">Please enter valid phone number</span>
                                    </div> -->
                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault01" class="form-label">Name<span style="color: red;">*</span></label>
                                <?= form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'name', 'id' => 'validationDefault01', 'value' => '', 'required' => 'required', 'oninput' => 'validateName(this)')); ?>
                                <span id="nameError" class="text-danger" style="display: none">
                                    Please enter a valid name (up to 50 characters).
                                </span>
                            </div>

                            <script>
                                function validateName(input) {
                                    var regex = /^[A-Za-z\s]+$/;
                                    var isValid = regex.test(input.value);
                                    var maxCharacters = 50;

                                    var errorSpan = document.getElementById("nameError");

                                    if (input.value.length > maxCharacters) {
                                        errorSpan.textContent = "Name should not exceed " + maxCharacters + " characters.";
                                        errorSpan.style.display = "block";
                                    } else if (isValid || input.value.trim() === "") {
                                        errorSpan.style.display = "none";
                                    } else {
                                        errorSpan.textContent = "Please enter a valid name.";
                                        errorSpan.style.display = "block";
                                    }
                                }
                            </script>




                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="email" id="validationDefault03" value="" required oninput="validateEmail(this)" />
                                <span id="emailError" class="text-danger" style="display: none">Please enter a valid email</span>
                            </div>

                            <script>
                                function validateEmail(input) {
                                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                    var isValid = regex.test(input.value);

                                    var errorSpan = document.getElementById("emailError");

                                    if (isValid || input.value.trim() === "") {
                                        errorSpan.style.display = "none";
                                    } else {
                                        errorSpan.style.display = "block";
                                    }
                                }
                            </script>

                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault01" class="form-label">City<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="city" id="validationDefault01" value="" required oninput="validateCity(this)" />
                                <span id="cityError" class="text-danger" style="display: none">
                                    Please enter a valid city.
                                </span>
                            </div>

                            <script>
                                function validateCity(input) {
                                    var regex = /^[A-Za-z\s]+$/;
                                    var isValid = regex.test(input.value);
                                    var maxCharacters = 50;

                                    var errorSpan = document.getElementById("cityError");

                                    if (input.value.length > maxCharacters) {
                                        errorSpan.textContent = "City should not exceed " + maxCharacters + " characters.";
                                        errorSpan.style.display = "block";
                                    } else if (isValid || input.value.trim() === "") {
                                        errorSpan.style.display = "none";
                                    } else {
                                        errorSpan.textContent = "Please enter a valid city.";
                                        errorSpan.style.display = "block";
                                    }
                                }
                            </script>





                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault02" class="form-label">Mobile Number<span style="color: red;">*</span></label>
                                <div style="display: flex;" class="dropdown">
                                    <select style="width: 94px;" class="form-control" name="country-code" id="countryCodeSelect">
                                        <option name="ind" value="+91">IND(+91)</option>
                                        <option name="us" value="+1">US(+1)</option>
                                    </select>
                                    <input type="tel" class="form-control" name="number" id="validationDefault02" value="" required oninput="validatePhoneNumber(this)" onblur="clearError('phoneError')" />
                                </div>
                                <span id="phoneError" class="text-danger" style="display: none">Please enter a valid mobile number (10 digits)</span>
                            </div>

                            <script>
                                function validatePhoneNumber(input) {
                                    input.value = input.value.replace(/\D/g, '').slice(0, 10);

                                    var isValid = true;

                                    var selectedCountryCode = document.getElementById('countryCodeSelect').value;

                                    if (selectedCountryCode === '+91') {
                                        isValid = validateIndianPhoneNumber(input.value);
                                    } else if (selectedCountryCode === '+1') {
                                        isValid = validateUSPhoneNumber(input.value);
                                    }

                                    var errorSpan = document.getElementById("phoneError");
                                    errorSpan.style.display = isValid ? "none" : "block";
                                }

                                function validateIndianPhoneNumber(phoneNumber) {
                                    //   var regex = /^[789]\d{9}$/;
                                    var regex = /^\d{10}$/;
                                    return regex.test(phoneNumber);
                                }

                                function validateUSPhoneNumber(phoneNumber) {
                                    var regex = /^\d{10}$/;
                                    return regex.test(phoneNumber);
                                }

                                function clearError(errorId) {
                                    const errorElement = document.getElementById(errorId);
                                    errorElement.style.display = "none";
                                }
                            </script>



                            <div class="col-lg-12 position-relative">
                                <label class="form-label">Notify About<span style="color: red;">*</span></label><br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption1" value="1">
                                    <label class="form-check-label" for="notifyOption1">News Letter</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption2" value="2">
                                    <label class="form-check-label" for="notifyOption2">Investment</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption3" value="3">
                                    <label class="form-check-label" for="notifyOption3">Updates on Milestones</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption4" value="4">
                                    <label class="form-check-label" for="notifyOption4">Video tutorials</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption5" value="5">
                                    <label class="form-check-label" for="notifyOption5">Data</label>
                                </div>

                                <span id="notifyError" class="text-danger" style="display: none">Please select at least one option</span>
                            </div>


                            <div class="col-lg-12 position-relative">
                                <label class="form-label">I'm Interested in: <span style="color: red;">*</span></label><br>

                                <style>
                                    .checkbox-spacing {
                                        margin-right: 127px;
                                    }
                                </style>

                                <div class="form-check form-check-inline checkbox-spacing">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption1" value="1">
                                    <label class="form-check-label" for="interestOption1">Using the App</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption2" value="2">
                                    <label class="form-check-label" for="interestOption2">Becoming a Partner</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption3" value="3">
                                    <label class="form-check-label" for="interestOption3">Investing in Dozen Diamonds</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption4" value="4">
                                    <label class="form-check-label" for="interestOption4">Conducting Research</label>
                                </div>



                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption5" value="5">
                                    <label class="form-check-label" for="interestOption5">Jobs at Dozen Diamonds</label>
                                </div>

                                <span id="interestError" class="text-danger" style="display: none">Please select at least one option</span>
                            </div>






                            <!-- <div class="col-lg-12 position-relative">
                                        <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="email" id="validationDefault03"
                                            value="" required />
                                        <span id="emailError" class="text-danger" style="display: none">Please enter
                                            valid email</span>
                                    </div> -->






                            <div class="col-lg-12 position-relative">
                                <label for="validationDefault03" class="form-label">Password<span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="passwordInput" value="" required oninput="validatePassword(this)" />
                                    <style>
                                        #togglePasswordButton:hover {
                                            background-color: #ffffff !important;
                                        }
                                    </style>

                                    <button type="button" id="togglePasswordButton" class="btn btn-outline-secondary" onclick="togglePassword('passwordInput', 'togglePasswordButton')">
                                        <img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg'); ?>" alt="close-eye-icon">
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
                                    </style>

                                    <button type="button" id="toggleConfPasswordButton" class="btn btn-outline-secondary" onclick="togglePassword('confPasswordInput', 'toggleConfPasswordButton')">
                                        <img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg'); ?>" alt="close-eye-icon">
                                    </button>

                                </div>
                                <span id="passwordConfError" class="text-danger" style="display: none">Passwords must match.</span>
                            </div>

                            <!-- <div class="form-group" required>
                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                            </div> -->

                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                                <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                            </div>

                            <script>
                                function validatePassword(input) {
                                    var isValid = true;
                                    var errorMessage = "";

                                    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!<>])[0-9a-zA-Z@$#%^&*!<>]{8,}$/;

                                    if (!passwordRegex.test(input.value)) {
                                        isValid = false;
                                        errorMessage = "Password must contain: at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.";
                                    }

                                    document.getElementById("passwordError").textContent = errorMessage;
                                    document.getElementById("passwordError").style.display = isValid ? "none" : "block";
                                }

                                function confirmPasswordMatch(input) {
                                    var passwordInput = document.getElementById("passwordInput");
                                    var isValid = input.value === passwordInput.value;

                                    document.getElementById("passwordConfError").textContent = isValid ? "" : "Passwords must match.";
                                    document.getElementById("passwordConfError").style.display = isValid ? "none" : "block";
                                }

                                function togglePassword(fieldId, buttonId) {
                                    const passwordInput = document.getElementById(fieldId);
                                    const toggleButton = document.getElementById(buttonId);

                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                        toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url("assets/images/openE.png"); ?>" alt="open-eye-icon">';
                                    } else {
                                        passwordInput.type = "password";
                                        toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url("assets/images/closeE.jpg"); ?>" alt="close-eye-icon">';
                                    }
                                }
                            </script>


                            <div class="col-lg-12">
                                <?= form_submit(array('class' => 'btn enquir-btn', 'id' => 'submitButton', 'style' => 'background-color: #1D4E66;', 'value' => 'SUBMIT')); ?>
                            </div>
                            <span>
                                Already have an account?<a href="<?php echo base_url('home/signin'); ?>" style="color: #2f73b2 ;"> Sign In</a>
                            </span>

                            <?= form_close(); ?>

                            <script>
                                function validateForm() {
                                    var isValid = true;

                                    var nameInput = document.getElementById("validationDefault01");
                                    if (nameInput.value.trim() === "" || !/^[A-Za-z\s]+$/.test(nameInput.value.trim())) {
                                        document.getElementById("nameError").textContent = "Name is required and should not contain numbers.";
                                        document.getElementById("nameError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("nameError").style.display = "none";
                                    }

                                    var emailInput = document.getElementById("validationDefault03");
                                    if (emailInput.value.trim() === "" || !validateEmail(emailInput)) {
                                        document.getElementById("emailError").style.display = "block";
                                        isValid = false;
                                    }

                                    var cityInput = document.getElementById("validationDefault01");
                                    if (cityInput.value.trim() === "") {
                                        document.getElementById("cityError").style.display = "block";
                                        isValid = false;
                                    }


                                    var numberInput = document.getElementById("validationDefault02");
                                    var phoneNumber = numberInput.value.replace(/\D/g, '').slice(0, 10);
                                    var selectedCountryCode = document.getElementById('countryCodeSelect').value;

                                    if (numberInput.value.trim() === "" ||
                                        // (selectedCountryCode === '+91' && !/^[789]\d{9}$/.test(phoneNumber)) ||
                                        (selectedCountryCode === '+91' && !/^\d{10}$/.test(phoneNumber)) ||
                                        (selectedCountryCode === '+1' && !/^\d{10}$/.test(phoneNumber))) {
                                        document.getElementById("phoneError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("phoneError").style.display = "none";
                                    }

                                    var checkboxes = document.querySelectorAll('input[name="notify_options[]"]');
                                    var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                                    if (!isChecked) {
                                        document.getElementById("notifyError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("notifyError").style.display = "none";
                                    }

                                    var checkboxes = document.querySelectorAll('input[name="interest_options[]"]');
                                    var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                                    if (!isChecked) {
                                        document.getElementById("interestError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("interestError").style.display = "none";
                                    }


                                    var passwordInput = document.getElementById("passwordInput");
                                    if (!validatePasswordFormat(passwordInput)) {
                                        document.getElementById("passwordError").style.display = "block";
                                        isValid = false;
                                    }

                                    var confirmPasswordInput = document.getElementById("confPasswordInput");
                                    if (confirmPasswordInput.value !== passwordInput.value) {
                                        document.getElementById("passwordConfError").textContent = "Passwords must match.";
                                        document.getElementById("passwordConfError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("passwordConfError").style.display = "none";
                                    }
                                    if (isValid) {
                                        document.getElementById("submitButton").disabled = true;
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
                                    } else {
                                        document.getElementById("submitButton").disabled = false;
                                    }

                                    return isValid;
                                }

                                function validateEmail(input) {
                                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                    return regex.test(input.value);
                                }

                                function validatePasswordFormat(input) {
                                    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!<>])[0-9a-zA-Z@$#%^&*!<>]{8,}$/;
                                    return passwordRegex.test(input.value);
                                }
                            </script>
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
            margin-top: 362px;
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
<!-- captcha API -->
<script src='https://www.google.com/recaptcha/api.js'></script>


<!-- <script>
         const chBoxes =
            document.querySelectorAll('.dropdown-menu input[type="checkbox"]');
        const dpBtn =
            document.getElementById('multiSelectDropdown');
           
        let mySelectedListItems = [];
        let mySelectedListValues=[]

        function handleCB() {
            mySelectedListItems = [];
            mySelectedListValues=[]
            let mySelectedListItemsText = '';

            chBoxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    mySelectedListItems.push(checkbox.name);
                    mySelectedListValues.push(checkbox.value);
                    // mySelectedListItemsText += checkbox.name + ', ';
                    mySelectedListItemsText += `${checkbox.name} \n`;
                }
            });

            dpBtn.innerText =
                mySelectedListItems.length > 0
                    ? mySelectedListItemsText.slice(0, -2) : 'Select';
        }

        chBoxes.forEach((checkbox) => {
            checkbox.addEventListener('change', handleCB);
        });

        function scrollToTop(){

            window.scrollTo({top:0 ,behavior:"smooth"})
        } -->

<!-- //  function togglePassword() {
        //         const passwordInput = document.getElementById("passwordInput");
        //         const confPasswordInput = document.getElementById("confPasswordInput");
        //         const toggleButton = document.getElementById("toggleButton");
        //         const toggleConfPasswordButton = document.getElementById("toggleConfPasswordButton");

        //         if (passwordInput.type === "password") {
        //             passwordInput.type = "text";
        //             toggleButton.innerHTML = `<img style="height: 30px;" src="<?php echo base_url('assets/images/openE.png'); ?>" alt="open-eye-icon">`;
        //         } else {
        //             passwordInput.type = "password";
        //             // toggleButton.textContent = "Show";
        //             toggleButton.innerHTML = `<img style="height: 30px;" src="<?php echo base_url('assets/images/closeE.jpg'); ?> " alt="close-eye-icon">`;
        //         }
        //         if (confPasswordInput.type === "password") {
        //             confPasswordInput.type = "text";
        //             toggleConfPasswordButton.textContent = "Hide";
        //         } else {
        //             confPasswordInput.type = "password";
        //             toggleConfPasswordButton.textContent = "Show";
        //         }
        //     }
    </script> -->

<!-- <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="venobox.min.js"></script>

    
    <script>
         const chBoxes =
            document.querySelectorAll('.dropdown-menu input[type="checkbox"]');
        const dpBtn =
            document.getElementById('multiSelectDropdown');
           
        let mySelectedListItems = [];
        let mySelectedListValues=[]

        function handleCB() {
            mySelectedListItems = [];
            mySelectedListValues=[]
            let mySelectedListItemsText = '';

            chBoxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    mySelectedListItems.push(checkbox.name);
                    mySelectedListValues.push(checkbox.value);
                    // mySelectedListItemsText += checkbox.name + ', ';
                    mySelectedListItemsText += `${checkbox.name} \n`;
                }
            });

            dpBtn.innerText =
                mySelectedListItems.length > 0
                    ? mySelectedListItemsText.slice(0, -2) : 'Select';
        }

        chBoxes.forEach((checkbox) => {
            checkbox.addEventListener('change', handleCB);
        });

        function scrollToTop(){

            window.scrollTo({top:0 ,behavior:"smooth"})
        }

         function togglePassword() {
                const passwordInput = document.getElementById("passwordInput");
                const confPasswordInput = document.getElementById("confPasswordInput");
                const toggleButton = document.getElementById("toggleButton");
                const toggleConfPasswordButton = document.getElementById("toggleConfPasswordButton");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleButton.innerHTML = `<img style="height: 30px;" src="<?php echo base_url('assets/images/openE.png'); ?>" alt="open-eye-icon">`;
                } else {
                    passwordInput.type = "password";
                    // toggleButton.textContent = "Show";
                    toggleButton.innerHTML = `<img style="height: 30px;" src="<?php echo base_url('assets/images/closeE.jpg'); ?> " alt="close-eye-icon">`;
                }
                if (confPasswordInput.type === "password") {
                    confPasswordInput.type = "text";
                    toggleConfPasswordButton.textContent = "Hide";
                } else {
                    confPasswordInput.type = "password";
                    toggleConfPasswordButton.textContent = "Show";
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

            $("input[name='name']").click(function () {
                $("#nameError").hide();

                
            });
            $("input[name='number']").click(function () {
                $("#phoneError").hide();
            });
            $("input[name='city']").click(function () {
                $("#cityError").hide();
            });
            $("input[name='email']").click(function () {
                $("#emailError").hide();
            });
            $("input[name='notifyme']").click(function () {
                $("#notifyError").hide();
            });
            $("input[name='password']").click(function () {
                $("#passwordError").hide();
            });
            $("input[name='conf-password']").click(function () {
                $("#passwordConfError").hide();
            });

           
            $("#submitEnquiry").click(function () {

                var inputName = $("input[name='name']").val();
                var inputNumber = $("input[name='number']").val();
                var inputCity = $("input[name='city']").val();
                var inputEmail = $("input[name='email']").val();
                var inputPassword = $("input[name='password']").val();
                var inputConfPassword = $("input[name='conf-password']").val();
                var inputCountryCode = $("select[name='country-code']").val();
                // var inputNotifyList = $("input[name='News Letter']").val();

                // console.log(mySelectedListItems)
                // console.log(mySelectedListValues)
                console.log("Country Code",inputCountryCode)
               
               
                function IsEmail(email) {
                    var regex =
                        /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test(email)) {
                        return false;
                    } else {
                        return true;
                    }
                }

                function IsValidPassword(password) {
                    var regex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/;
                    if (!regex.test(password)) {
                        return false;
                    } else {
                        return true;
                    }

                }

                 function validName() {
                    const alphabetRegex = /^[A-Za-z\s]+$/;
                    if (alphabetRegex.test(inputName) && inputName.length < 30) {
                        return true;
                    } else {
                        $("#nameError").show();
                        return false;
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

                function validCity() {
                    const alphabetRegex = /^[A-Za-z\s]+$/;
                    if (alphabetRegex.test(inputCity) && inputCity.length < 30) {
                        return true;
                    } else {
                        $("#cityError").show();
                        return false;
                    }
                }
                 function validPhoneNumber() {
                    const numberRegex = /^[0-9]+$/;
                    if (
                        numberRegex.test(inputNumber) &&
                        inputNumber.length >= 10
                    ) {
                        return true;
                    } else {
                        $("#phoneError").show();
                        return false;
                    }
                }


               

                function validPassword() {
                    if (IsValidPassword(inputPassword) == false) {
                        $("#passwordError").show();
                        return false;
                    } else {
                        return true;
                    }
                }

               
                 function IsPasswordMistmached() {
                    //  console.log(inputPassword != inputConfPassword , inputPassword, inputConfPassword)
                    if (inputPassword != inputConfPassword) {
                         $("#passwordConfError").show();
                        return false;
                    }
                    else {
                        return true
                    }
                }

              

                // Validation check

                var nameValidation = validName();
                var cityValidation = validCity();
                var numberValidation = validPhoneNumber();
                var emailValidation = validEmail();
                var passwordValidation = validPassword();
                var passwordConfValidation = IsPasswordMistmached();

               var formData = new FormData();
                formData.append('web_user_name', inputName);
                formData.append('web_user_phone', `${inputCountryCode}-` + parseInt(inputNumber));
                formData.append('web_user_city', inputCity);
                formData.append('web_user_notify_about', mySelectedListValues);
                formData.append('web_user_email', inputEmail);
                formData.append('web_password', inputPassword);
                console.log(`${inputCountryCode}-`+ parseInt(inputNumber))
                if (
                    nameValidation &&
                    cityValidation &&
                    numberValidation &&
                    emailValidation &&
                    passwordValidation &&
                    passwordConfValidation

                ) {
                    // $.ajax({
                    //     url: "http://localhost:3000/web/user/signup",
                    //     // url: "https://dduat.virtualglobetechnology.com/user/sendemail",
                    //     type: "post",
                    //     data: formData,
                    //     processData: false,
                    //     contentType: false,
                    //     dataType: "json",
                    //     success: function (data, textStatus) {
                    //         console.log(textStatus)
                    //         if (textStatus === "success") {
                    //             if (data.status) {
                    //                 $("#successAlert").show();
                    //                 // Form value to empty
                    //                 $("input[name='name']").val("");
                    //                 $("input[name='number']").val("");
                    //                 $("input[name='email']").val("");
                    //                 $("input[name='city']").val("");
                    //                 $("input[name='password']").val("");
                    //                 $("input[name='conf-password']").val("");
                    //                 $("input[name='notifyme']").val("");
                    //                 setTimeout(() => {
                    //                     $("#successAlert").hide();
                    //                 }, 10000);
                    //                 alert(data.responseJSON.message);
                    //                 window.location.href="signin.html"
                    //             }
                                
                    //         }
                           
                    //     },
                    //     error: function (data) {
                            
                    //         //  if(data.responseJSON.status==false){
                    //         //      $("#errorAlert").show(data.responseJSON.message);
                    //         //  }
                    //         // console.log(data.responseJSON);
                    //         // console.log(data.responseJSON.message);
                    //        alert(data.responseJSON.message);
                    //     },
                    // })
                    //https://uatdd.virtualglobetechnology.com/web/user/signup
                    fetch("https://uatdd.virtualglobetechnology.com/web/user/signup" ,{method:"POST" ,body:formData })
                    .then(response=>response.json())
                    .then(async(data)=>{
                        
                          if(data.status==true){

                           await renderData(data)
                             $("#successAlert").show();
                                setTimeout(() => {$("#successAlert").hide();}, 10000);
                                setTimeout(() => { window.location.href = "signin.html" }, 1000);
                          }
                          if(data.status==false){
                            // window.alert(data.message) 
                             await renderData(data)
                              $("#successAlert").show();
                              setTimeout(() => { $("#successAlert").hide(); }, 10000);
                          }
                          
                        console.log(data)
                    })
                    .catch((err)=>{
                        window.alert(err)
                        console.log(err)
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