<?= $this->extend("layout/menusubpage") ?>

<?= $this->section("pageTitle") ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="ui two column centered grid" style="width: 100%">
<<<<<<< HEAD:app/Views/old-file/form/image_repo.php
    <div class="middle aligned column">
        <div class="ui container">
            <h1>Image Repository</h1>
            <div>Please fill in the Image Upload details:</div>
            <form style="margin-top: 10px;" action="<?= url_to('image_repo/upload') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="ui raised segment">
                    <div class="ui one column centered grid">
                        <div class="column">
                            <div class="bold-text" style="margin-top: 10px;">Upload Image:</div>
<<<<<<< HEAD:app/Views/old-file/form/image_repo.php
                            <input type="file" name="memoimg" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput" aria-hidden="true">
=======
                            <input type="file" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput" aria-hidden="true">
>>>>>>> d0388b1 (make popup message in image repo):app/Views/form/image_repo.php
                            <label for="embedpollfileinput" class="ui small green left floated button" id="uploadButton">
                                <i class="ui upload icon"></i>
                                Upload Image
                            </label>
<<<<<<< HEAD:app/Views/old-file/form/image_repo.php
                            <input type="file" name="memoimg1" (change)="fileEvent($event)" class="inputfile1" id="embedpollfileinput1" aria-hidden="true">
=======
                            <input type="file" (change)="fileEvent($event)" class="inputfile1" id="embedpollfileinput1" aria-hidden="true">
>>>>>>> d0388b1 (make popup message in image repo):app/Views/form/image_repo.php
                            <label for="embedpollfileinput1" class="ui small red left floated button" id="reuploadButton" style="display: none;">
                                <i class="ui upload icon"></i>
                                Reupload Image
                            </label>
                            <div id="successText" style="display: none; color: green; font-weight: bold; margin-top: 10px;">
                                Image has been inserted!
                            </div>
                        </div>
                        <div class="column">
                            <div class="bold-text">Comment:</div>
                            <div class="ui form">
                                <div class="field">
<<<<<<< HEAD:app/Views/old-file/form/image_repo.php
                                    <textarea name="descriptions" rows="3" placeholder="Please Enter Current Symptoms or Concerns"></textarea>
=======
                                    <textarea rows="3" placeholder="Please describe the image"></textarea>
>>>>>>> d0388b1 (make popup message in image repo):app/Views/form/image_repo.php
                                </div>
                            </div>
                            <!-- error message -->
                            <?php foreach ($errors as $error) : ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach ?>
                            <!-- success message -->
                            <?php if ($success != null) : ?>
                                <p><?= $success ?></p>
                            <?php endif ?>
                        </div>
                        <button type="submit" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 20px;">Submit Request</button>
                    </div>
                </div>
            </form>
=======
    <!-- For Error Popup -->
    <div class="ui modal" id="errorModal">
        <div class="header">Error</div>
        <div class="content">
            <p>Invalid format! Only PNG and JPG images are allowed.</p>
>>>>>>> 9a685e8 (adjust some menu layout and image repo for validation and notification popup):app/Views/form/image_repo.php
        </div>
        <div class="actions">
            <div class="ui black deny button">Close</div>
        </div>
    </div>
    <!-- for success popup -->
    <div class="ui modal" id="successModal">
        <div class="header">Success</div>
        <div class="content">
            <p>Image has been inserted!</p>
        </div>
        <div class="actions">
            <div class="ui black deny button">Close</div>
        </div>
    </div>
    <div class="middle aligned column">
        <h1>Image Repository</h1>
        <div>Please fill in the Image Upload details:</div>
        <form style="margin-top: 10px;" action="/ImageRep" method="post" enctype="multipart/form-data">
            <div class="ui raised segment">
                <div class="ui one column centered grid">
                    <div class="column">
                        <div class="bold-text" style="margin-top: 10px;">Upload Image:</div>
                        <input type="file" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput" aria-hidden="true">
                        <label for="embedpollfileinput" class="ui small green left floated button" id="uploadButton">
                            <i class="ui upload icon"></i>
                            Upload Image
                        </label>
                        <input type="file" (change)="fileEvent($event)" class="inputfile1" id="embedpollfileinput1" aria-hidden="true">
                        <label for="embedpollfileinput1" class="ui small red left floated button" id="reuploadButton" style="display: none;">
                            <i class="ui upload icon"></i>
                            Reupload Image
                        </label>
                    </div>
                    <div class="column">
                        <div class="bold-text">Comment:</div>
                        <div class="ui form">
                            <div class="field">
                                <textarea rows="3" placeholder="Please describe the image"></textarea>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="ui red button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 20px;" onclick="resetForm()">Reset Form</a>
                    <a href="/dashboard" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 20px;">Submit Request</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Get the file input elements and buttons
    const fileInput = document.getElementById('embedpollfileinput');
    const fileInput1 = document.getElementById('embedpollfileinput1');
    const uploadButton = document.getElementById('uploadButton');
    const reuploadButton = document.getElementById('reuploadButton');

    // Add event listener to the file inputs
    fileInput.addEventListener('change', () => {
        handleFileInputChange(fileInput.files[0]);
    });
    fileInput1.addEventListener('change', () => {
        handleFileInputChange(fileInput1.files[0]);
    });

    function handleFileInputChange(file) {
        if (file && file.type === 'image/jpeg' || file && file.type === 'image/png') {
            toggleButtons();
            hideErrorMessage();
        } else {
            showErrorMessage();
            resetFileInput(fileInput);
            resetFileInput(fileInput1);
            hideButtonsAndText();
        }
    }

    // Function to hide the buttons and success text when the image is invalid
    function hideButtonsAndText() {
        uploadButton.style.display = 'inline-block';
        reuploadButton.style.display = 'none';
    }

    // Function to reset the file input value
    function resetFileInput(input) {
        input.value = '';
    }

    // Function to show the error message for invalid formats
    function showErrorMessage() {
        $('#errorModal').modal('show'); // Display the error modal
    }

    // Function to toggle the visibility and disabled state of the buttons
    function toggleButtons() {
        if (fileInput.files.length > 0 || fileInput1.files.length > 0) {
            uploadButton.style.display = 'none';
            reuploadButton.style.display = 'inline-block';

            // Display the success modal
            $('#successModal').modal('show');
        } else {
            uploadButton.style.display = 'inline-block';
            reuploadButton.style.display = 'none';
        }
    }
    // Add the fade-in effect on page load
    $('.message').hide().fadeIn(1);

    $(document).ready(function() {
        $('.message .close').on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade');
        });
    });
    $('#notification').animate({
        opacity: 1
    }, 300);
    // Function to reset the entire form
    function resetForm() {
        // Reset file inputs
        resetFileInput(fileInput);
        resetFileInput(fileInput1);

        // Reset comment textarea
        const commentTextArea = document.querySelector('textarea');
        commentTextArea.value = '';

        // Hide buttons and success text
        hideButtonsAndText();
    }
</script>

<?= $this->endSection() ?>