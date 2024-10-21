<?php include("application/views/header_view.php"); ?>

<br><br><br><br><br><br>

<!-- <section class="innerbanner "> -->
<div class="container">
    <h1 style="color: #1D4E66;">Careers</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Careers</li>
        </ol>
    </nav>
</div>
<!-- </section> -->

<main class="align-self-center">
    <!-- <section class="bg-con"> -->

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(!empty($jobs)): ?>
                            <?php foreach($jobs as $job): ?>
                                <div class="d-block cardbox">
                                    <h3 style="color: #1D4E66;"><?php echo $job['title']; ?></h3>
                                    <span class="me-3">
                                        <i class="fa fa-user-o text-primary" aria-hidden="true"></i>
                                        <span class="m-2"><?php echo $job['openings']; ?> Open position</span>
                                    </span>
                                    <span class="me-3">
                                        <i class="fa fa-clock-o text-primary" aria-hidden="true"></i>
                                        <span class="m-2"><?php echo date('Y-m-d', strtotime($job['created_at'])); ?></span>
                                    </span>
                                    <span class="me-3">
                                        <i class="fa fa-map-marker text-primary" aria-hidden="true"></i>
                                        <span class="m-2"><?php echo $job['location']; ?></span>
                                    </span>
                                    <!-- <span class="me-3">
                                        <i class="fa fa-laptop text-primary" aria-hidden="true"></i>
                                        <span class="m-2">Work from office</span>
                                    </span> -->
                                    <span class="me-3">
                                        <i class="fa fa-briefcase text-primary" aria-hidden="true"></i>
                                        <span class="m-2"><?php echo $job['job_type']; ?></span>
                                    </span>
                                    <div class="row">
                                        <div class="mt-2 col-lg-10">
                                            <p><b>Job Details:</b> <?php echo $job['description']; ?></p>
                                            <p><b>Requirements:</b> <?php echo $job['requirements']; ?></p>
                                            <p><b>Responsibilities:</b> <?php echo $job['responsibilities']; ?></p>
                                            <p><b>Salary:</b> <?php echo $job['salary']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No job postings available at the moment.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <img src="<?php echo base_url('images/career.png') ?>" alt="" class="img-fluid d-block mx-auto">
            </div>
        </div>
    </div>
    <!-- </section> -->

</main>

<?php include("application/views/footer.php"); ?>

</body>

</html>
