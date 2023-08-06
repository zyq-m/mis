<?= $this->extend("layout/menusubpage") ?>

<?= $this->section("pageTitle") ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="ui two column centered grid" style="width: 100%">
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
                            <input type="file" name="memoimg" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput" aria-hidden="true">
                            <label for="embedpollfileinput" class="ui small green left floated button" id="uploadButton">
                                <i class="ui upload icon"></i>
                                Upload Image
                            </label>
                            <input type="file" name="memoimg1" (change)="fileEvent($event)" class="inputfile1" id="embedpollfileinput1" aria-hidden="true">
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
                                    <textarea name="descriptions" rows="3" placeholder="Please Enter Current Symptoms or Concerns"></textarea>
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
        </div>
    </div>
</div>

<script>
    // Get the file input elements and buttons
    const fileInput = document.getElementById('embedpollfileinput');
    const fileInput1 = document.getElementById('embedpollfileinput1');
    const uploadButton = document.getElementById('uploadButton');
    const reuploadButton = document.getElementById('reuploadButton');

    // Add event listeners to the file inputs
    fileInput.addEventListener('change', () => {
        toggleButtons();
    });
    fileInput1.addEventListener('change', () => {
        toggleButtons();
    });

    // Function to toggle the visibility and disabled state of the buttons
    function toggleButtons() {
        if (fileInput.files.length > 0) {
            uploadButton.style.display = 'none';
            reuploadButton.style.display = 'inline-block';
            // Show the success text when the red button is visible and a file is selected
            successText.style.display = 'block';
        } else if (fileInput1.files.length > 0) {
            uploadButton.style.display = 'none';
            reuploadButton.style.display = 'inline-block';
            // Show the success text when the red button is visible and a file is selected
            successText.style.display = 'block';
        } else {
            uploadButton.style.display = 'inline-block';
            reuploadButton.style.display = 'none';
            // Hide the success text when neither the green nor the red button is visible
            successText.style.display = 'none';
        }
    }
</script>

<?= $this->endSection() ?>