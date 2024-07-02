<?php include("application/views/header_view.php"); ?>


<br><br><br><br><br>
<!-- <section class="innerbanner ">
</section> -->


<main class="align-self-center">
    <!-- <section class="bg-con"> -->

        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <img src="<?php echo base_url('images/fpassword.jpg'); ?>" alt="" class="img-fluid d-block mx-auto">
                        </div>
                        <div class="col-lg-6">
                            <div class="alert alert-success alert-dismissible fade show" id="successAlert" style="
                            top: 0;
                            right: 60px;
                            position: relative;
                            display: none;
                        " role="alert">
                                <button type="button" class="btn-close"></button>
                                <div id="successMessage"></div>
                            </div>

                            <div class="alert alert-danger alert-dismissible fade show" id="errorAlert" style="
                            top: 0;
                            right: 60px;
                            position: relative;
                            display: none;
                        " role="alert">
                                <button type="button" class="btn-close"></button>
                                <div id="errorMessage"></div>
                            </div>

                            <div class="contactpage-form shadow rounded" id="formContainer">
                                <h2 class="mb-0">Forget Password</h2>
                                <span class="d-block fs-6 mb-3">Reset Your Account Password</span>

                                <form class="row g-3" id="resetForm" method="post">
                                    <div class="col-lg-12 position-relative">
                                        <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                                        <input type="email" class="form-control" name="email" id="validationDefault03" required="">
                                        <span id="emailError" class="text-danger" style="display: none">Please enter a valid email</span>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-primary enquir-btn" id="submitEnquiry">SUBMIT</button>
                                    </div>
                                    <div>
                                        <span>
                                            Don't have an account? <a href="<?php echo base_url('Home/signin'); ?>" style="color: #2f73b2;">LogIn</a>
                                        </span>
                                    </div>
                                </form>
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



<script>
    $(document).ready(function() {
        var form = document.getElementById('resetForm');
        var formContainer = $('#formContainer');
        var emailInput = document.getElementById('validationDefault03');
        var emailError = document.getElementById('emailError');
        var successAlert = $('#successAlert');
        var successMessage = $('#successMessage');
        var errorAlert = $('#errorAlert');
        var errorMessage = $('#errorMessage');

        $('#submitEnquiry').click(function() {
            if (!isValidEmail(emailInput.value)) {
                emailError.style.display = 'block';
            } else {
                emailError.style.display = 'none';

                var formData = new FormData(form);
                var requestData = {
                    reg_email: formData.get('email')
                };

                fetch('https://uatdd.virtualglobetechnology.com/web/user/resetPasswordViaEmail', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestData),
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status) {
                            // Successful response
                            var successHtml = '<div class="alert alert-success" style="margin-top: 10px;">Success! ' + data.message + '</div>';
                            formContainer.html(successHtml); // Replace form with success message
                            successAlert.hide(); // Hide the success alert (if shown)
                            errorAlert.hide(); // Hide the error alert (if shown)
                        } else {
                            // Unsuccessful response
                            errorMessage.html('<strong>Error!</strong> ' + data.message);
                            errorAlert.fadeIn().css('color', 'red');
                        }
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                        errorMessage.html('<strong>Error!</strong> Unable to send the password reset link. Please ensure the provided email address is valid and associated with an existing account. If the issue persists, contact our support team for assistance.');
                        errorAlert.fadeIn().css('color', 'red');
                        setTimeout(function() {
                            errorAlert.fadeOut('slow');
                        }, 10000);
                    });
            }
        });

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
</script>

</body>

</html>