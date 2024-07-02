<?php include("application/views/header_view.php"); ?>

<style>
    /* Assuming you have a styles.css linked to your HTML or inline styles */
    .innerbanner {
        background-color: #1D4E66;
        padding: 50px 0;
    }

    .innerbanner h1 {
        font-size: 36px;
        font-weight: bold;
        color: white;
        text-align: center;
        text-transform: capitalize;
    }

    .breadcrumb {
        background-color: transparent;
        margin-bottom: 0;
    }

    .breadcrumb-item {
        font-size: 14px;
    }

    .breadcrumb-item a,
    .breadcrumb-item.active {
        color: #1D4E66;
    }

    .breadcrumb-item.active {
        font-weight: bold;
    }

    .main-content {
        padding: 50px 0;
    }

    .cardbox {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .cardbox h3 {
        color: #1D4E66;
        font-size: 22px;
        margin-bottom: 10px;
    }

    .job-details p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .job-details b {
        font-weight: bold;
    }

    .job-info {
        margin-bottom: 10px;
    }

    .job-info i {
        color: #1D4E66;
    }

    .job-info span {
        margin-left: 5px;
    }

    .job-image {
        text-align: center;
    }

    .job-image img {
        max-width: 100%;
        height: auto;
    }
</style>

<br><br><br><br><br><br>

<div class="container">
    <h1>About Us</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </nav>
</div>

<main class="main-content">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-8">
              
                <div class="cardbox">
                <h2 class="section-title">Who We Are</h2>
                    <?php if (!empty($aboutus_data)) : ?>
                        <?php foreach ($aboutus_data as $aboutus) : ?>
                            <div class="aboutus-item">
                                <h3><?php echo $aboutus['abt_title']; ?></h3>
                                <p><?php echo $aboutus['abt_desc']; ?></p>
                                <!-- If you have images, you can display them here -->
                                <!-- Example: -->
                                <!-- <img src="<?php echo base_url('path_to_your_image_directory/' . $aboutus['abt_image']); ?>" alt="About Us Image"> -->
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No data available</p>
                    <?php endif; ?>
                </div>
            </div>

            <!--<div class="col-lg-4 job-image">-->
            <!--    <img src="<?php echo base_url('images/career.png') ?>" alt="Career Image" class="img-fluid">-->
            <!--</div>-->
        </div>
    </div>
</main>

<?php include("application/views/footer.php"); ?>
