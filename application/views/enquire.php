<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php include("application/views/header_view.php"); ?>
<?php echo form_hidden('g-recaptcha-response', ''); ?>

<br><br><br><br>

<!-- <section class="innerbanner ">
</section> -->

<style>
  .contact-info {
    display: inline-block;
  }
</style>
<main class="align-self-center">
  <!-- <section class="bg-con"> -->

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12">
        <div class="row mb-5">
          <div class="col-lg-6 text-center">
            <img src="<?php echo base_url('images/enquiry.png'); ?>" alt="" class="img-fluid d-block mx-auto">
            <div class="contact-info mt-3">
              <h6><i class="fas fa-envelope"></i> Email: contact@dozendiamonds.com</h6>
              <h6><i class="fas fa-phone"></i> Phone: +91 9579775081</h6>
            </div>
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

              <!--<div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required=""><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-a7gptoliggue" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU&amp;co=aHR0cHM6Ly9kb3plbmRpYW1vbmRzLmNvbTo0NDM.&amp;hl=en&amp;v=V6_85qpc2Xf2sbe3xTnRte7m&amp;size=normal&amp;cb=kh78kfyy8x7h"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
                    <span id="recaptchaError" style="color: red; display: </?php echo form_error('g-recaptcha-response') ? 'block' : 'none'; ?>"></?php echo form_error('g-recaptcha-response'); ?></span>
                  </div>--->

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

  <!-- </section> -->
  </section>



</main>

<?php include("application/views/footer.php"); ?>

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