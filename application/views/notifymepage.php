<?php include("application/views/header_view.php"); ?>

<section class="innerbanner ">
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<main class="align-self-center">
    <section class="bg-con bg-large"> <!-- Added bg-large class -->
        <div class="container container-large"> <!-- Added container-large class -->
            <div class="row mt-3 mb-3"> <!-- Reduced margin classes -->
                <div class="col-lg-12">
                    <div class="notifymepage-form shadow rounded bg-light p-3"> <!-- Adjusted padding -->
                        <div id="userNameWithContaint"></div>
                        <span class="d-block fs-6 mb-3"> <!-- Reduced margin -->
                            You have selected the following "Notify Me" options:
                            <?php if (!empty($result)) : ?>
                                <ul>
                                    <?php foreach ($result as $row) : ?>
                                        <li>
                                            <strong>Notify List:</strong> <?= $row['notify_list']; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <p>No data found.</p>
                            <?php endif; ?>
                        </span>
                        <div id="listContainer"></div>
                        <div id="editMessage"></div>
                        <!-- Add Edit button here -->
                        <button type="button" class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal">
                            Edit
                        </button>
                    </div>
                    <br>
                    <br>

                    <div class="notifymepage-form shadow rounded bg-light p-3"> <!-- Adjusted padding -->
                        <div id="userNameWithContaint"></div>
                        <span class="d-block fs-6 mb-3"> <!-- Reduced margin -->
                            You have selected the following "Interested In" options:
                            <?php if (!empty($results)) : ?>
                                <ul>
                                    <?php foreach ($results as $row) : ?>
                                        <li>
                                            <strong>Interested In:</strong> <?= $row['interestedin_list']; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <p>No data found.</p>
                            <?php endif; ?>
                        </span>
                        <div id="listContainer"></div>
                        <div id="editMessage"></div>
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal1">
                            Edit
                        </button>
                    </div>
                    <br><br><br>
                    <!-- Delete Account Button -->
                    <!-- <div class="notifymepage-form shadow rounded bg-light p-3 mt-3"> Adjusted padding -->
                    <button type="button" class="btn btn-danger rounded-pill" onclick="confirmDeleteAccount()">
                        Delete Account
                    </button>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <div class="row"></div>
    </section>
</main>

<br><br><br><br><br><br>
<?php include("application/views/footer.php"); ?>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <?php echo form_open('Home/save_changes', array('id' => 'editForm')); ?>
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
                <?php foreach ($options as $option => $value) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selected_options[]" value="<?= $value ?>" id="<?= strtolower(str_replace(' ', '', $option)) ?>" <?php echo in_array(strtolower($option), array_map('strtolower', $notifyLists)) ? 'checked' : ''; ?>>
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
    <?php echo form_close(); ?>
</div>

<div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <?php echo form_open('Home/save_interestedin', array('id' => 'editForm1')); ?>
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
                <?php foreach ($options as $option => $value) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selected_options[]" value="<?= $value ?>" id="<?= strtolower(str_replace(' ', '', $option)) ?>" <?php echo in_array(strtolower($option), array_map('strtolower', $interestLists)) ? 'checked' : ''; ?>>
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
    <?php echo form_close(); ?>
</div>

<script>
    function confirmDeleteAccount() {
        if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
            // Redirect to the delete account URL or call a function to handle the deletion
            window.location.href = '<?= base_url("Home/user_delete") ?>';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        function handleFormSubmit(formId, buttonId, errorMessageId) {
            var form = document.getElementById(formId);
            var button = document.getElementById(buttonId);
            var errorMessage = document.getElementById(errorMessageId);

            if (form) {
                form.addEventListener('submit', function(event) {
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

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

</html>