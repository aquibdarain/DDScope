<?php include("application/views/header_view.php");?>

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0; 
    }

    .wrapper {
        flex: 1;
    }

    footer {
        padding: 20px 0;
        width: 100%;
        background-color: #1e2f4d;
        color: white;
        min-height: 10vh;
        text-align: center;
    }

    .content {
        flex: 1;
        padding-bottom: 60px;  
        box-sizing: border-box;
    }

    .notifymepage-form {
        margin-bottom: 20px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <section class="innerbanner"></section>
    <section class="bg-con">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12">
                <div class="notifymepage-form shadow rounded">
                    <div id="userNameWithContaint"></div>
                    <span class="d-block fs-6 mb-4">
                        You have selected the following "Notify Me" options:
                        <?php if (!empty($result)): ?>
                            <ul>
                                <?php foreach ($result as $row): ?>
                                    <li>
                                    
                                        <strong>Notify List:</strong> <?= $row['notify_list']; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No data found.</p>
                        <?php endif; ?>
                    </span>
                    <div id="listContainer"></div>
                    <div id="editMessage"></div>
                    <!-- Add Edit button here -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
    Edit
</button>

                </div>

                <div class="notifymepage-form shadow rounded">
                    <div id="userNameWithContaint"></div>
                    <span class="d-block fs-6 mb-4">
                        You have selected the following "Interested In" options:
                        <?php if (!empty($results)): ?>
                            <ul>
                                <?php foreach ($results as $row): ?>
                                    <li>
                                    
                                        <strong>Interested In:</strong> <?= $row['interestedin_list']; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No data found.</p>
                        <?php endif; ?>
                    </span>
                    <div id="listContainer"></div>
                    <div id="editMessage"></div>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal1">
    Edit
</button>

                </div>
            </div>
            
        </div>
    </div>
    <div class="row"></div>
</section>

    <div class="wrapper"></div>

    <footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>
                    <a href="<?php echo base_url('');?>">Home</a> |
                    <a href="<?php echo base_url('Home/vision');?>">Our vision</a> |
                    <a href="<?php echo base_url('Home/career');?>">Careers</a> |
                    <a href="<?php echo base_url('Home/video');?>">Videos</a> |
                    <a href="<?php echo base_url('Home/ads');?>">Ads</a>|
                    <a href="<?php echo base_url('Home/policy');?>">Privacy Policy </a>
                </p>
                <p>contact@dozendiamonds.com</p>
                <p>Copyright © 2023 DozenDiamonds. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <form id="editForm" action="<?= base_url('Home/save_changes') ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $options = [
                        'Data' => 5,
                        'Video tutorials' => 4,
                        'Updates on Milestones' => 3,
                        'News Letter' => 1,
                        'Investment' => 2
                    ];

                    $notifyLists = isset($result) ? array_column($result, 'notify_list') : [];
                    
                    ?>
                     <?php foreach ($options as $option => $value): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="selected_options[]" value="<?= $value ?>" id="<?= strtolower(str_replace(' ', '', $option)) ?>"
                                <?php echo in_array(strtolower($option), array_map('strtolower', $notifyLists)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="<?= strtolower(str_replace(' ', '', $option)) ?>">
                                <?= $option ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <div id="errorMessage" style="color: red;"></div>

                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>


 
<div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <form id="editForm1" action="<?= base_url('Home/save_interestedin') ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel1">Edit Options</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $options = [
                        'Working at Dozen Diamonds' => 5,
                        'Conducting Research' => 4,
                        'Investing in Dozen Diamonds' => 3,
                        'Using the App' => 1,
                        'Becoming a Partner' => 2
                    ];

                    $interestLists = isset($results) ? array_column($results, 'interestedin_list') : [];
                    
                    ?>
                    <?php foreach ($options as $option => $value): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="selected_options[]" value="<?= $value ?>" id="<?= strtolower(str_replace(' ', '', $option)) ?>"
                                <?php echo in_array(strtolower($option), array_map('strtolower', $interestLists)) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="<?= strtolower(str_replace(' ', '', $option)) ?>">
                                <?= $option ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <div id="errorMessage1" style="color: red;"></div>

                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="saveChangesButton1">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>

 
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function handleFormSubmit(formId, buttonId, errorMessageId) {
            var form = document.getElementById(formId);
            var button = document.getElementById(buttonId);
            var errorMessage = document.getElementById(errorMessageId);

            if (form) {
                form.addEventListener('submit', function (event) {
                    // Check if at least one option is selected
                    var checkboxes = form.querySelectorAll('input[name="selected_options[]"]:checked');
                    if (checkboxes.length === 0) {
                        errorMessage.textContent = 'Please select at least one option.';
                        event.preventDefault(); // Prevent form submission
                    } else {
                        errorMessage.textContent = ''; // Clear previous error message
                        // Change the button color to light blue
                        button.style.backgroundColor = '#7aa6e7';
                        button.disabled = true;
                    }
                });
            }
        }

        handleFormSubmit('editForm', 'saveChangesButton', 'errorMessage');
        handleFormSubmit('editForm1', 'saveChangesButton1', 'errorMessage1');
    });
</script>




    <!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>-->
</body>

</html>  