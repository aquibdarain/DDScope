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

  img {
    max-width: 110%;
  }
</style>

<section class="innerbanner"></section>
<section class="bg-con">
  <div class="container">
    <div class="row mt-5 mb-5">
      <div class="col-lg-12">
        <div class="row mb-5">
          <div class="col-lg-6">
            <img src="<?php echo base_url('assets/images/enquiry.png'); ?>" alt="" />
          </div>
          <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" id="successAlert" style="
                  top: 0;
                  right: 60px;
                  position: relative;
                  display: none;
                " role="alert">
              <strong>Thank you for submitting your inquiry!</strong> We
              appreciate your interest in our services. Our team will review
              your request and get back to you shortly.
              <button type="button" class="btn-close"></button>
            </div>
            <div class="contactpage-form shadow rounded">
              <h2 class="mb-0">Enquire Now</h2>
              <span class="d-block fs-6 mb-4">Leave us a message for futher Information</span>

              <form class="row g-3">
                <div class="col-lg-6 position-relative">
                  <label for="validationDefault01" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" id="validationDefault01" value="" required onkeydown="return /^[A-Za-z\s]+$/i.test(event.key)" />
                  <span id="nameError" class="text-danger" style="display: none">Please enter valid name</span>
                </div>
                <div class="col-lg-6" class="col-lg-6 position-relative">
                  <label for="validationDefault02" class="form-label">Mobile Number</label>
                  <input type="tel" class="form-control" name="number" id="validationDefault02" value="" required onkeydown="return onlyNumbers(event)" />
                  <span id="phoneError" class="text-danger" style="display: none">Please enter valid phone number</span>
                </div>
                <div class="col-lg-12 position-relative">
                  <label for="validationDefault03" class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="validationDefault03" value="" required />
                  <span id="emailError" class="text-danger" style="display: none">Please enter valid email</span>
                </div>
                <div class="col-lg-12 position-relative">
                  <label for="validationDefault03" class="form-label">Message</label>
                  <textarea class="form-control" name="message" rows="4" required></textarea>
                  <span id="messageError" class="text-danger" style="display: none">Please enter message</span>
                </div>
                <div class="col-lg-12">
                  <span id="submitEnquiry" class="btn enquir-btn">
                    SUBMIT
                  </span>
                </div>
              </form>
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

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/venobox.min.js'); ?>"></script>
<script>
  $(document).ready(function() {
    $(".venobox").venobox({
      closeColor: "#f4f4f4",
      spinColor: "#f4f4f4",
      arrowsColor: "#f4f4f4",
      closeBackground: "#17191D",
      overlayColor: "rgba(23,25,29,0.8)",
    });

    $("#validationDefault02").keydown(function(e) {
      if (
        $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
        e.keyCode === 86 ||
        (e.keyCode >= 35 && e.keyCode <= 39)
      ) {
        return;
      }
      if (
        (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
        (e.keyCode < 96 || e.keyCode > 105)
      ) {
        e.preventDefault();
      }
    });

    $(".btn-close").click(function() {
      $("#successAlert").hide();
    });

    $("input[name='name']").click(function() {
      $("#nameError").hide();
    });

    $("input[name='email']").click(function() {
      $("#emailError").hide();
    });

    $("input[name='number']").click(function() {
      $("#phoneError").hide();
    });

    $("textarea[name='message']").click(function() {
      $("#messageError").hide();
    });

    $("#submitEnquiry").on('click', function() {
      var inputName = $("input[name='name']").val();
      var inputEmail = $("input[name='email']").val();
      var inputNumber = $("input[name='number']").val();
      var inputMessage = $("textarea[name='message']").val();

      function IsEmail(email) {
        var regex =
          /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
          return false;
        } else {
          return true;
        }
      }

      function validPhoneNumber() {
        const numberRegex = /^[0-9]+$/;
        if (numberRegex.test(inputNumber) && inputNumber.length === 10) {
          return true;
        } else {
          $("#phoneError").show();
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

      function validName() {
        const alphabetRegex = /^[A-Za-z\s]+$/;
        if (alphabetRegex.test(inputName) && inputName.length < 30) {
          return true;
        } else {
          $("#nameError").show();
          return false;
        }
      }

      function validMessage() {
        if (inputMessage.length < 1) {
          $("#messageError").show();
          return false;
        } else {
          return true;
        }
      }

      var phoneValidation = validPhoneNumber();
      var emailValidation = validEmail();
      var nameValidation = validName();
      var messageValidation = validMessage();

      if (phoneValidation && emailValidation && nameValidation && messageValidation) {
        // Prepare data for the fetch request
        var requestData = {
          email: inputEmail,
          number: inputNumber,
          message: inputMessage,
          name: inputName,
        };

        // Send the data to the server
        fetch('https://uatdd.virtualglobetechnology.com/web/user/submit-message', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(requestData),
          })
          .then(response => response.json())
          .then(data => {
            // Handle the response data
            if (data.status) {
              // Successful response
              $("#successAlert").show();
              // Form value to empty
              $("input[name='name']").val("");
              $("input[name='email']").val("");
              $("input[name='number']").val("");
              $("textarea[name='message']").val("");

              setTimeout(() => {
                $("#successAlert").hide();
              }, 10000);
            }
          })
          .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
          });
      }
    });
  });
</script>


<!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>-->
</body>

</html>