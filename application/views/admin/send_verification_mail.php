<?php include("application/views/admin/admin_header_view.php"); ?>
<br>
<style>
    /* Style for selected records */
    .selected {
        background-color: #007bff;
        color: #fff;
    }

    /* Style for multiselect options */
    .multiselect-wrapper {
        position: relative;
    }

    .multiselect-options {
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        border: 1px solid #ced4da;
        border-top: none;
        border-radius: 0 0 5px 5px;
        background-color: #fff;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
        width: auto;
        /* Adjusted width */
    }

    .multiselect-option {
        padding: 5px;
        cursor: pointer;
        text-align: left;
        /* Align text to the left */
    }

    .multiselect-option:hover {
        background-color: #f8f9fa;
    }

    .selected-count {
        margin-top: 5px;
    }

    /* Style for page header */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .selected-count {
        font-weight: bold;
    }
</style>
<div class="app-content">
    <div class="side-app">
        <div class="page-header" style="margin-top:10px;">
            <h4 class="page-title"><i class="fe fe-layers mr-1"></i>Email Verification Management</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard/index'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Email Verification Management</li>
            </ol>
        </div>
        <?php if (!empty($success_message)) : ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header border-bottom" style="display: flex; justify-content: space-between;">
                <h3 class="card-title" style="font-size:21px;">Email Verification Management</h3>
                <div class="selected-count">
                    Selected: <span id="selectedCount">0</span>
                </div>
            </div>

            <br>
            <!-- <style>
        #searchBox {
    width: 40%; /* Adjust the width as needed */
}
</style> -->

            <div class="text-right">
                <div class="multiselect-wrapper">
                    <div class="input-group mb-2">
                        <input type="text" id="searchBox" placeholder="Search" class="form-control">
                        <div class="input-group-append">
                            <button id="selectAllBtn" class="btn btn-secondary">Select All</button>
                            <button id="unselectAllBtn" class="btn btn-secondary">Unselect All</button>
                        </div>
                    </div>
                    <div class="multiselect-options">
                        <?php foreach ($users as $user) : ?>
                            <div class="multiselect-option">
                                <label>
                                    <input type="checkbox" class="user-checkbox" value="<?php echo $user->reg_email; ?>">
                                    <?php echo $user->reg_username . ' (' . $user->reg_email . ')'; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- New div containing subject, message input, and send button -->
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Send Message</h3>
            </div>
            <div class="card-body">
                <?php echo form_open('admin/User/send_verification_mails', 'id="sendMessageForm"'); ?>
                <!-- Your form elements -->
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                </div>
                <!-- Hidden input field to store selected emails -->
                <!-- This will be populated dynamically via JavaScript -->
                <!-- Your submit button -->
                <button type="submit" class="btn btn-primary">Send</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('sendMessageForm').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the selected emails
        var selectedEmails = [];
        var checkboxes = document.querySelectorAll('.user-checkbox:checked');
        checkboxes.forEach(function(checkbox) {
            selectedEmails.push(checkbox.value);
        });

        // Remove any existing hidden input fields
        var existingHiddenInputs = document.querySelectorAll('input[name="selectedEmails[]"]');
        existingHiddenInputs.forEach(function(input) {
            input.parentNode.removeChild(input);
        });

        // Create a hidden input field for each selected email
        selectedEmails.forEach(function(email) {
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'selectedEmails[]');
            hiddenInput.setAttribute('value', email);
            document.getElementById('sendMessageForm').appendChild(hiddenInput);
        });

        // Submit the form
        this.submit();
    });
</script>



<?php include("application/views/admin/admin_footer_view.php"); ?>

<!-- JavaScript to handle multiselect functionality -->
<script>
    var users = <?php echo json_encode($users); ?>;
    var selectedEmails = [];

    function search() {
        var input, filter, options, i, txtValue;
        input = document.getElementById('searchBox');
        filter = input.value.toUpperCase();
        options = document.querySelectorAll('.multiselect-option');
        for (i = 0; i < options.length; i++) {
            txtValue = options[i].textContent || options[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                options[i].style.display = "";
            } else {
                options[i].style.display = "none";
            }
        }
        var dropdown = document.querySelector('.multiselect-options');
        dropdown.style.width = input.offsetWidth + 'px'; // Set dropdown width same as input width
        dropdown.style.display = filter ? 'block' : 'none'; // Show or hide the multiselect dropdown based on search input
    }

    document.getElementById('searchBox').addEventListener('input', search);

    function updateSelectedCount() {
        document.getElementById('selectedCount').innerText = selectedEmails.length;
    }

    function selectAll() {
        var checkboxes = document.querySelectorAll('.user-checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            if (!checkboxes[i].checked) {
                checkboxes[i].checked = true;
                selectedEmails.push(checkboxes[i].value);
            }
        }
        updateSelectedCount();
    }


    document.getElementById('selectAllBtn').addEventListener('click', selectAll);

    function unselectAll() {
        selectedEmails = [];
        var checkboxes = document.querySelectorAll('.user-checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
        updateSelectedCount();
    }

    document.getElementById('unselectAllBtn').addEventListener('click', unselectAll);

    // Update selected count on checkbox change
    var checkboxes = document.querySelectorAll('.user-checkbox');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function() {
            if (this.checked) {
                selectedEmails.push(this.value);
            } else {
                var index = selectedEmails.indexOf(this.value);
                if (index !== -1) {
                    selectedEmails.splice(index, 1);
                }
            }
            updateSelectedCount();
        });
    }
</script>
<script>
    // Function to show the dropdown
    function showDropdown() {
        var dropdown = document.querySelector('.multiselect-options');
        dropdown.style.display = 'block';
    }

    // Function to hide the dropdown
    function hideDropdown() {
        var dropdown = document.querySelector('.multiselect-options');
        dropdown.style.display = 'none';
    }

    // Event listener to show the dropdown when clicking on the input field
    document.getElementById('searchBox').addEventListener('click', showDropdown);

    // Event listener to hide the dropdown when clicking anywhere else
    document.body.addEventListener('click', function(event) {
        var dropdown = document.querySelector('.multiselect-options');
        if (!dropdown.contains(event.target) && event.target !== document.getElementById('searchBox')) {
            hideDropdown();
        }
    });

    // Event listener to prevent hiding when clicking on the dropdown
    document.querySelector('.multiselect-options').addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent the click event from bubbling up
    });
</script>
<!-- <script>
document.getElementById('sendButton').addEventListener('click', function() {
    // Get the subject and message content
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;

    // Make sure at least one user is selected
    if (selectedEmails.length === 0) {
        alert('Please select at least one user.');
        return;
    }
    if (subject.trim() === '' || message.trim() === '') {
        alert('Subject and message are required.');
        return;
    }
    // Prepare data to send via AJAX
    var data = {
        selectedEmails: selectedEmails, // Include selected emails in the data object
        subject: subject,
        message: message
    };
    // alert('Data to be sent: ' + JSON.stringify(data));

    // Make AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo base_url("admin/User/send_verification_mails"); ?>', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            window.location.reload();
            alert('Emails sent successfully!');
        } else if (xhr.readyState === 4 && xhr.status !== 200) {
            window.location.reload();  
            alert('Failed to send emails. Please try again later.');
        }
    };
    xhr.send(JSON.stringify(data));
});

</script> -->