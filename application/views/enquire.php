<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('header_view'); ?>
<?php echo form_hidden('g-recaptcha-response', ''); ?>


<style>
  .contactpage-form {
    position: relative;
    background: #fff;
    padding: 20px;
    margin: 2px;
  }

  @media (max-width: 992px) {
    .contactpage-form {
      margin: 2px 10px;
    }
  }
</style>

<section class="bg-con">
  <div class="container">
    <div class="row mt-5 mb-5">
      <div class="col-lg-12">
        <div class="row mb-5">
          <div class="col-lg-6">
            <img src="<?php echo base_url('assets/images/enquiry.png'); ?>" alt="" />
          </div>
          <div class="col-lg-6">
            <!-- Display validation errors quickly -->
            <?php if (validation_errors()) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-right: 60px;margin-left: -60px">
                <?php echo validation_errors(); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <!-- Display success message if form is submitted successfully -->
            <?php if ($this->session->flashdata('success_message')) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-right: 60px;margin-left: -60px">
                <?php echo $this->session->flashdata('success_message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <div class="contactpage-form shadow rounded">
              <h2 class="mb-0" style="color: #1D4E66;">Enquire Now</h2>
              <span class="d-block fs-6 mb-4">Leave us a message for further Information</span>

              <!-- Form with CodeIgniter form_open and form_close -->
              <?php echo form_open('Home/enquire', array('class' => 'row g-3')); ?>
              <div class="col-lg-6 position-relative">
                <label for="validationDefault01" class="form-label">Name</label>
                <?php echo form_input(array('type' => 'text', 'name' => 'name', 'id' => 'validationDefault01', 'class' => 'form-control', 'required' => 'required')); ?>
              </div>
              <div class="col-lg-6 position-relative">
                <label for="validationDefault02" class="form-label">Mobile Number</label>
                <?php echo form_input(array('type' => 'tel', 'name' => 'number', 'id' => 'validationDefault02', 'class' => 'form-control', 'required' => 'required')); ?>
              </div>
              <div class="col-lg-12 position-relative">
                <label for="validationDefault03" class="form-label">Email</label>
                <?php echo form_input(array('type' => 'email', 'name' => 'email', 'id' => 'validationDefault03', 'class' => 'form-control', 'required' => 'required')); ?>
              </div>
              <div class="col-lg-12 position-relative">
                <label for="validationDefault03" class="form-label">Message</label>
                <?php echo form_textarea(array('name' => 'message', 'rows' => '4', 'class' => 'form-control', 'required' => 'required')); ?>
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                <span id="recaptchaError" style="color: red; display: <?php echo form_error('g-recaptcha-response') ? 'block' : 'none'; ?>"><?php echo form_error('g-recaptcha-response'); ?></span>
              </div>

              <div class="col-lg-12">
                <?php echo form_submit(array('class' => 'btn enquir-btn', 'style' => 'background-color: #1D4E66; color: white;'), 'SUBMIT'); ?>
              </div>
              <?php echo form_close(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row"></div>
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
          <a href="<?php echo base_url('Home/ads'); ?>">Ads</a> |
          <a href="<?php echo base_url('Home/policy'); ?>">Privacy Policy</a>
        </p>
        <p>contact@dozendiamonds.com</p>
        <p>Copyright © 2023 DozenDiamonds. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>

<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- JavaScript for sending mail -->
<script>
  $(document).ready(function() {
    // Function to validate email
    function IsEmail(email) {
      var regex =
        /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (!regex.test(email)) {
        return false;
      } else {
        return true;
      }
    }

    // Function to validate phone number
    function validPhoneNumber(number) {
      const numberRegex = /^[0-9]+$/;
      if (numberRegex.test(number) && number.length === 10) {
        return true;
      } else {
        return false;
      }
    }

    // Handle form submission
    $('form').submit(function(e) {
      e.preventDefault();

      // Get form data
      var formData = $(this).serializeArray();
      var requestData = {};

      // Convert form data to object
      formData.forEach(function(input) {
        requestData[input.name] = input.value;
      });

      // Validate email and phone number
      if (!IsEmail(requestData.email)) {
        // Handle invalid email
        alert('Please enter a valid email address.');
        return;
      }

      if (!validPhoneNumber(requestData.number)) {
        // Handle invalid phone number
        alert('Please enter a valid phone number.');
        return;
      }

      // Add authorization token to request headers
      var headers = new Headers();
      headers.append('Authorization', '<?php echo $token; ?>');
      headers.append('Content-Type', 'application/json');

      // Send data using fetch API
      fetch('https://uatdd.virtualglobetechnology.com/web/user/submit-message', {
          method: 'POST',
          headers: headers,
          body: JSON.stringify(requestData)
        })
        .then(function(response) {
          return response.json();
        })
        .then(function(data) {
          if (data.status) {
            // Show success message
            alert('Your enquiry has been submitted successfully!');
            // Reset form
            $('form')[0].reset();
          } else {
            // Show error message
            alert('Failed to submit enquiry. Please try again later.');
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
    });
  });
</script>
</body>

</html>
