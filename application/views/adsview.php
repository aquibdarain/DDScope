<?php include("application/views/header_view.php"); ?>

<section class="innerbanner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Proposed Ads</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-con">
    <div class="container-fluid"> <!-- Add padding on the left side -->
        <div class="row row-cols-3"> <!-- Display videos in 3 columns -->
            <?php
            // YouTube video URLs
            $video_urls = [
                "https://www.youtube.com/embed/90W9p1tkzZk",
                "https://www.youtube.com/embed/Pu2QwQVbmo8",
                "https://www.youtube.com/embed/EZvCpjfWRPI",
                "https://www.youtube.com/embed/Tyr9Ba9JEpY",
                "https://www.youtube.com/embed/uxH7t14zdGQ",
                "https://www.youtube.com/embed/G9t5y_AflIM",
                "https://www.youtube.com/embed/8HTCqWIwE-w",
                "https://www.youtube.com/embed/IOlX--QkPrc",
                "https://www.youtube.com/embed/MtWSBbgQZUQ",
                "https://www.youtube.com/embed/009CrzVj6mc",
                "https://www.youtube.com/embed/wEnHlmMUr8w",
                "https://www.youtube.com/embed/QGCtWkxZmj4",
                "https://www.youtube.com/embed/MymQomnaJoQ",
                "https://www.youtube.com/embed/wFk124epsoQ",
                "https://www.youtube.com/embed/d3XzMX6ungI",
                "https://www.youtube.com/embed/pNh5aCNfhCg",
                "https://www.youtube.com/embed/QzqkbO4aJnI",
                "https://www.youtube.com/embed/vQFg0QqoCh4",
                "https://www.youtube.com/embed/tSVRLyoFkBc",
                "https://www.youtube.com/embed/MoxMva7mtvk",
                "https://www.youtube.com/embed/yWVPwmlaM1I",
                "https://youtube.com/embed/NzPzov3xNAA"
            ];

            // Static captions for the videos
            $captions = [
                "Stressless Trading Method and Extra Cash on a Spreadsheet.",
                "Don’t mix lots purchased at different times for the same stock.",
                "Track profits and losses for each purchased lot of a given stock.",
                "Make sure you never run out of cash no matter how low the market goes.",
                "Don’t rely on predictions for making stock market decisions.",
                "Using principles of chess in the stock market.",
                "Keep a budget in mind before investing in any particular stock.",
                "Applying principles of marathon running in the stock market.",
                "Don’t rely on predictions for making stock market decisions (marriage proposal).",
                "Why try to predict the unpredictable market?",
                "Use Dozen Diamonds app to avoid mistakes in detailed trading.",
                "Why are you paying your broker?",
                "Manage your portfolio like you run your business.",
                "Understand the market mechanics of buying and selling shares.",
                "Don’t overburden yourself by stressing about your portfolio.",
                "Sources of stress in stock trading.",
                "An application designed for automatic trading.",
                "Dozen Diamonds offers systematic purchase lot management.",
                "Suminderpal singh testimonial for Dozen Diamonds.",
                "DD ads unpredictable markets and extra cash.",
                "DD shorts 2 Lending money to a friend 16 9 ratio",
                "Dozen Diamonds introduction"
            ];


            // Loop through each video URL
            for ($i = 0; $i < count($video_urls); $i++) {
            ?>
                <div class="col mb-4">
                    <div class="card-box shadow rounded">
                        <iframe width="100%" height="200" class="video" src="<?php echo $video_urls[$i]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <p class="caption"><?php echo $captions[$i]; ?></p> <!-- Static caption for the video -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
$num_br_tags = 2;
for ($i = 0; $i < $num_br_tags; $i++) {
    echo "<br>";
}
?>
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

<style>
    .col {
        flex-basis: 33.333%;
        max-width: 33.333%;
    }

    @media (max-width: 992px) {
        .col {
            flex-basis: 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 768px) {
        .col {
            flex-basis: 100%;
            max-width: 100%;
        }
    }
</style>

<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
</body>

</html>