<?php include("application/views/header_view.php"); ?>

<br><br><br><br><br>

<div class="container">
    <h1 style="color: #1D4E66;">Blogs</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
        </ol>
    </nav>
</div>

<style>
    .blog .blog-area {
        position: relative;
    }

    .blog .blog-area figure img {
        width: 100%;
        height: 35vh;
        object-fit: cover;
    }

    .blog-area .date {
        position: absolute;
        border-radius: 0 20px 0 0;
        background: rgb(30 78 102);
        color: #fff;
        font-size: 44px;
        top: 200px;
        left: 0;
        padding: 10px;
        text-align: left;
    }

    .blog .blog-area .date span {
        font-size: 14px;
        color: #f3ebd6;
        display: inline-block;
        line-height: 18px;
        font-weight: 700;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-.5 * var(--bs-gutter-x));
        margin-left: calc(-.5 * var(--bs-gutter-x));
    }

    .main-content {
        padding: 15px 0px;
        margin: 50px 0px 70px;
        min-height: 600px;
        font-weight: 500;
    }

    .blog .blog-area h3 {
        text-transform: capitalize;
        margin: 10px 0 0px;
        font-size: 20px;
    }

    .main-content h3 {
        font-size: 26px;
        padding: 10px 0;
        font-weight: 600;
    }

    p {
        margin-bottom: 15px;
        font-weight: normal;
    }

    .pagination {
        display: inline-block;
    }

    .pagination li {
        display: inline;
    }

    .pagination a,
    .pagination span {
        color: #1D4E66;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;
    }

    .pagination a.active,
    .pagination span.active {
        background-color: #1D4E66;
        color: white;
        border: 1px solid #1D4E66;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>

<main>
    <section class="main-content">
        <div class="container blog">
            <div class="row pb-5">
                <?php foreach ($blogs as $blog) : ?>
                    <div class="col-lg-4 ">
                        <div class="blog-area">
                            <a href="<?php echo base_url('blog/blogdetails/' . encrypt_id($blog['blog_id'])); ?>" style="color:black;">
                                <?php
                                $databaseDate = $blog['blog_date'];
                                $formattedDate = date('d', strtotime($databaseDate));
                                $formattedYear = date('Y', strtotime($databaseDate));
                                $formattedMonth = date('F', strtotime($databaseDate));
                                ?>
                                <figure>
                                    <div class="date"><?php echo $formattedDate; ?>
                                        <span><?php echo $formattedYear; ?><br /><?php echo $formattedMonth; ?></span>
                                    </div>
                                    <a href="<?php echo $blog['blog_url']; ?>" target="_blank">
                                    <img src="<?php echo base_url('upload/blog/' . $blog['blog_image']); ?>" alt="">
                                    </a>
                                </figure>
                                <h3><?php echo $blog['blog_name']; ?></h3>
                                <?php
                                $description = $blog['blog_desc'];
                                $maxLength = 150;

                                if (strlen($description) > $maxLength) {
                                    $shortDescription = substr($description, 0, $maxLength) . '...';
                                    $fullDescription = $description;
                                ?>
                                    <p><?php echo strip_tags($shortDescription); ?></p>
                                    <a href="<?php echo base_url('blog/blogdetails/' . encrypt_id($blog['blog_id'])); ?>" id="readMoreLink">Read More...</a>
                                    <br><br><br><br><br>
                                    <div id="fullDescription" style="display: none;"><?php echo strip_tags($fullDescription); ?></div>
                                <?php
                                } else {
                                    echo "<p>" . strip_tags($description) . "</p>";
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center">
                <ul class="pagination justify-content-center">
                    <?php if (!empty($links)) {
                        echo $links;
                    } ?>
                </ul>
            </div>
        </div>
    </section>
</main>
<br>
<?php include("application/views/footer.php"); ?>
<script src="<?php echo base_url('assets/front/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="<?php echo base_url('assets/front/js/script.js'); ?>"></script>
</body>

</html>
