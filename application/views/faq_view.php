<?php include("application/views/header_view.php"); ?>
<br><br><br>

<style>
    .faq-section {
        background: #fdfdfd;
        min-height: 100vh;
        padding: 10vh 0 0;
    }
    .faq-title h2 {
        position: relative;
        margin-bottom: 45px;
        display: inline-block;
        font-weight: 600;
        line-height: 1;
    }
    .faq-title h2::before {
        content: "";
        position: absolute;
        left: 50%;
        width: 60px;
        height: 2px;
        background: #E91E63;
        bottom: -25px;
        margin-left: -30px;
    }
    .faq-title p {
        padding: 0 190px;
        margin-bottom: 10px;
    }
    .faq {
        background: #FFFFFF;
        box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
        border-radius: 4px;
    }
    .faq .card {
        border: none;
        background: none;
        border-bottom: 1px dashed #CEE1F8;
    }
    .faq .card .card-header {
        padding: 0px;
        border: none;
        background: none;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }
    .faq .card .card-header:hover {
        background: rgba(233, 30, 99, 0.1);
        padding-left: 10px;
    }
    .faq .card .card-header .faq-title {
        width: 100%;
        text-align: left;
        padding: 0px;
        padding-left: 30px;
        padding-right: 30px;
        font-weight: 400;
        font-size: 15px;
        letter-spacing: 1px;
        color: #3B566E;
        text-decoration: none !important;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .faq .card .card-header .faq-title .badge {
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 14px;
        float: left;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        text-align: center;
        background: #E91E63;
        color: #fff;
        font-size: 12px;
        margin-right: 20px;
    }
    .faq .card .card-body {
        padding: 30px;
        padding-left: 35px;
        padding-bottom: 16px;
        font-weight: 400;
        font-size: 16px;
        color: #6F8BA4;
        line-height: 28px;
        letter-spacing: 1px;
        border-top: 1px solid #F3F8FF;
    }
    .faq .card .card-body p {
        margin-bottom: 14px;
    }
    .search-container {
        margin-bottom: 20px;
        text-align: center;
    }
    .search-container input {
        width: 100%;
        max-width: 600px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    @media (max-width: 991px) {
        .faq {
            margin-bottom: 30px;
        }
        .faq .card .card-header .faq-title {
            line-height: 26px;
            margin-top: 10px;
        }
    }
</style>

<!-- Ensure you include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<section class="faq-section">
  <div class="container">
    <div class="row">
      <!-- Search Field -->
      <div class="col-md-6 offset-md-3">
        <div class="search-container">
          <input type="text" id="searchInput" placeholder="Search FAQs...">
        </div>
      </div>

      <!-- ***** FAQ Start ***** -->
      <div class="col-md-6 offset-md-3">
        <div class="faq" id="accordion">
          <?php foreach ($faqs as $index => $faq): ?>
          <div class="card <?php echo $index >= 5 ? 'hidden-faq' : ''; ?>" data-question="<?php echo strtolower($faq->question); ?>">
            <div class="card-header" id="faqHeading-<?php echo $index + 1; ?>">
              <div class="mb-0">
                <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-<?php echo $index + 1; ?>" aria-expanded="<?php echo $index == 0 ? 'true' : 'false'; ?>" aria-controls="faqCollapse-<?php echo $index + 1; ?>">
                  <span class="badge"><?php echo $index + 1; ?></span> <?php echo $faq->question; ?>
                </h5>
              </div>
            </div>
            <div id="faqCollapse-<?php echo $index + 1; ?>" class="collapse <?php echo $index == 0 ? 'show' : ''; ?>" aria-labelledby="faqHeading-<?php echo $index + 1; ?>" data-parent="#accordion">
              <div class="card-body">
                <p><?php echo $faq->answer; ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- script for searching the questions -->
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".faq .card").filter(function() {
                $(this).toggle($(this).data("question").indexOf(value) > -1)
            });
        });
    });
</script>

<br><br><br><br>
<?php include("application/views/footer.php"); ?>
</html>
