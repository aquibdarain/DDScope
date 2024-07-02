<?php include("application/views/header_view.php"); ?>

<style>
    .custom-form-container {
        max-width: 500px;
        margin: auto;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    .custom-form-container h3 {
        font-size: 20px;
        margin-bottom: 15px;
        color: #333;
    }

    .custom-form-container .form-label {
        font-weight: bold;
        color: #555;
    }

    .custom-form-container .form-control {
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .custom-form-container .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .custom-form-container .btn-primary:hover {
        background-color: #0056b3;
    }

    .custom-form-container .alert {
        margin-bottom: 10px;
    }

    .custom-form-container .close {
        line-height: 1;
    }

    .custom-form-container .form-group {
        margin-bottom: 15px;
    }
</style>

<br><br><br><br><br><br>

<!-- Breadcrumb Section -->
<div class="container">
    <h1 style="color: #1D4E66;">Contact Us</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </nav>
</div>

<main class="align-self-center">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="custom-form-container mb-4" id="contact">
                    <?php if ($this->session->flashdata('success_message')) : ?>
                        <div class="alert alert-success alert-dismissible" id="success-alert">
                            <?php echo $this->session->flashdata('success_message'); ?>
                            <button type="button" class="close" id="close-success-alert">x</button>
                        </div>
                    <?php elseif ($this->session->flashdata('error_message')) : ?>
                        <div class="alert alert-danger alert-dismissible" id="error-alert">
                            <?php echo $this->session->flashdata('error_message'); ?>
                            <button type="button" class="close" id="close-error-alert">x</button>
                        </div>
                    <?php endif; ?>

                    <h3>Have any questions? Let's talk!</h3>

                    <?= form_open('home/Contactus_submit', array('class' => 'row g-3', 'onsubmit' => 'return validateForm()')); ?>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="validationDefault01" class="form-label">Name<span style="color: red;">*</span></label>
                        <?= form_input(array('type' => 'text', 'name' => 'name', 'id' => 'name', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="nameError" class="text-danger" style="display: none">Please enter your name</span>
                    </div>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                        <?= form_input(array('type' => 'text', 'name' => 'email', 'id' => 'validationDefault03', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="emailError" class="text-danger" style="display: none">Please enter valid email</span>
                    </div>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="validationDefault02" class="form-label">Contact Number<span style="color: red;">*</span></label>
                        <?= form_input(array('type' => 'text', 'name' => 'contactnumber', 'id' => 'contactnumber', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="contactnumberError" class="text-danger" style="display: none">Please enter your contact number</span>
                    </div>

                    <div class="col-lg-12 position-relative pb-2">
                        <label for="exampleInputEmail1" class="form-label">Message<span style="color: red;">*</span></label>
                        <?= form_textarea(array('name' => 'message', 'id' => 'message', 'rows' => '3', 'class' => 'form-control', 'required' => 'required')); ?>
                        <span id="messageError" class="text-danger" style="display: none">Please enter your message</span>
                    </div>

                    <div class="form-group pb-2">
                        <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                        <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                    </div>

                    <div class="col-lg-12">
                        <?= form_submit(array('class' => 'btn btn-primary enquir-btn', 'id' => 'submitButton'), 'SUBMIT'); ?>
                    </div>

                    <?= form_close(); ?>

                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </div>
            </div>
        </div>
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307170.1865132513!2d-84.42797463724812!3d33.767693886330235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f5045d6996e13d%3A0x3abeb31b7855c57b!2sAtlanta%2C%20Georgia!5e0!3m2!1sen!2sus!4v1673263933642!5m2!1en!2sin" width="55%" height="622" style="border:0;padding-left:70px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->

        <script>
            function validateForm() {
                var valid = true;

                if (document.getElementById('name').value === '') {
                    document.getElementById('nameError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('nameError').style.display = 'none';
                }

                var email = document.getElementById('validationDefault03').value;
                var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if (!email.match(emailPattern)) {
                    document.getElementById('emailError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('emailError').style.display = 'none';
                }

                if (document.getElementById('contactnumber').value === '') {
                    document.getElementById('contactnumberError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('contactnumberError').style.display = 'none';
                }

                if (document.getElementById('message').value === '') {
                    document.getElementById('messageError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('messageError').style.display = 'none';
                }

                if (grecaptcha.getResponse() === '') {
                    document.getElementById('recaptchaError').style.display = 'block';
                    valid = false;
                } else {
                    document.getElementById('recaptchaError').style.display = 'none';
                }

                return valid;
            }
        </script>
    </div>
</main>

<?php include("application/views/footer.php"); ?>

<script src='https://www.google.com/recaptcha/api.js'></script>

</body>

</html>