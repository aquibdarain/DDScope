<?php include("application/views/header_view.php"); ?>

<style>
    .contactpage-form {
        top: 30px;
        right: 0px;
        position: relative;
        background: #fff;
        padding: 10px 30px 20px;
        margin: 2px;
    }

    img {
        max-width: 100%;
    }

    .shadow {
        box-shadow: 0 .1rem 1rem rgba(-1, -1, -1) !important;
    }

    @media (max-width: 992px) {
        .contactpage-form {
            top: 10px;
        }
    }
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
                            <h2 class="mb-0">WaitList Form</h2>
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

                            <form action="<?php echo base_url('Home/waitlist_submit'); ?>" method="post" class="row g-3" onsubmit="return validateForm()">
                                <div class="col-lg-12 position-relative mt-4">
                                    <label for="validationDefault03" class="form-label">Full Name<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="name" id="validationDefault03" required />
                                    <span id="nameError" class="text-danger" style="display: none">Please enter a valid name</span>
                                </div>

                                <div class="col-lg-12 position-relative">
                                    <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="email" id="validationDefault03" required />
                                    <span id="emailError" class="text-danger" style="display: none">Please enter valid email</span>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary enquir-btn" id="submitButton">SUBMIT</button>
                                </div>
                                <!-- <div>
                                    <span>
                                        Don't have an account? <a href="<?php echo base_url('home/Signup'); ?>" style="color: #2f73b2;">Sign Up</a>
                                    </span>
                                </div>
                                <span>
                                    <a href="<?php echo base_url('home/forgetpassword'); ?>" style="color: #2f73b2;">Forget Password?</a>
                                </span> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row"></div>
</section>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script>
    function validateForm() {
        var isValid = true;

        // Validate name
        var nameInput = document.getElementById("nameInput");
        var nameRegex = /^[A-Za-z\s]+$/; // Regular expression to allow only alphabetical characters and spaces

        if (nameInput.value.trim() === "" || !nameRegex.test(nameInput.value.trim())) {
            document.getElementById("nameError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("nameError").style.display = "none";
        }

        // Validate email
        var emailInput = document.getElementById("emailInput");
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regular expression for email validation

        if (emailInput.value.trim() === "" || !emailRegex.test(emailInput.value.trim())) {
            document.getElementById("emailError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("emailError").style.display = "none";
        }

        // Validate password
        var passwordInput = document.getElementById("passwordInput");
        if (passwordInput.value.trim() === "") {
            document.getElementById("passwordError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("passwordError").style.display = "none";
        }

        if (isValid) {
            document.getElementById("submitButton").disabled = true;
        }
        return isValid;
    }
</script>

<!-- i am adding this for latest form validation -->
<script>
    function validateForm() {
        var isValid = true;

        var nameInput = document.getElementById("validationDefault03");
        var nameRegex = /^[A-Za-z\s]+$/; // Regular expression to allow only alphabetical characters and spaces

        if (nameInput.value.trim() === "" || !nameRegex.test(nameInput.value.trim())) {
            document.getElementById("nameError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("nameError").style.display = "none";
        }

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

        if (isValid) {
            document.getElementById("submitButton").disabled = true;
        }
        return isValid;
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