<?= $this->extend("template/layout") ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-md-12">
        <form action="<?= url_to('image_repo') ?>" method="post" class="form-horizontal ui raised segment" enctype="multipart/form-data" id="imageUploadForm">
            <?= csrf_field() ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <h5>Please fill in the Image Upload details:</h5>
                        </div>

                        <div class="col-md-4 offset-md-4">
                            <div class="form-group">
                                <label>Upload Image:</label>
                                <div>
                                    <label for="fileInput" class="custom-file-upload" id="customFileLabel">
                                        Select Image
                                        <input type="file" name="memoimg" id="fileInput" accept=".jpg, .jpeg, .png" required style="display: none;">
                                    </label>
                                    <span id="imageInsertedMessage" style="margin-left: 10px;"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Comment:</label>
                                <div>
                                    <textarea rows="3" name="descriptions" id="descriptions" class="form-control" placeholder="Please Enter Current Symptoms or Concerns" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="reset" class="btn btn-danger btn-reset" id="reset">Reset</button>
                        <button type="submit" class="btn btn-primary btn-submit" id="submit">Submit Form</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('imageUploadForm').addEventListener('submit', function(event) {
        var fileInput = document.querySelector('input[name="memoimg"]');
        var descriptions = document.getElementById('descriptions').value;

        if (!fileInput.files[0] || descriptions === '') {
            alert('Please fill in all required fields.');
            event.preventDefault();
        } else if (!validateFileExtension(fileInput)) {
            alert('Please upload a PNG, JPEG, or JPG image only.');
            event.preventDefault();
        }
    });

    function validateFileExtension(fileInput) {
        var allowedExtensions = /\.(jpg|jpeg|png)$/i; // Case-insensitive regex for jpg, jpeg, and png
        return allowedExtensions.test(fileInput.value);
    }

    var fileInput = document.getElementById('fileInput');
    var customFileUpload = document.querySelector('.custom-file-upload');
    var imageInsertedMessage = document.getElementById('imageInsertedMessage');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            if (validateFileExtension(fileInput)) {
                customFileUpload.classList.add('image-uploaded');
                imageInsertedMessage.textContent = 'Image has been inserted.';
                imageInsertedMessage.classList.add('image-inserted'); // Apply the green color class
            } else {
                alert('Please upload a PNG, JPEG, or JPG image only.');
                fileInput.value = ''; // Clear the invalid selection
                customFileUpload.classList.remove('image-uploaded'); // Remove uploaded class
                imageInsertedMessage.textContent = ''; // Clear the message
                imageInsertedMessage.classList.remove('image-inserted'); // Remove the green color class
            }
        } else {
            customFileUpload.classList.remove('image-uploaded');
            imageInsertedMessage.textContent = ''; // Clear the message
            imageInsertedMessage.classList.remove('image-inserted'); // Remove the green color class
        }
    });

    document.getElementById('reset').addEventListener('click', function() {
        document.getElementById('fileInput').value = ''; // Clear the file input
        document.getElementById('descriptions').value = ''; // Clear the textarea
        var customFileUpload = document.querySelector('.custom-file-upload');
        customFileUpload.classList.remove('image-uploaded'); // Remove uploaded class
        imageInsertedMessage.textContent = ''; // Clear the message
        imageInsertedMessage.classList.remove('image-inserted'); // Remove the green color class
    });
</script>

<style>
    .custom-file-upload {
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
    }

    .custom-file-upload.image-uploaded {
        background-color: #dc3545;
    }

    .image-inserted {
        color: #50C878;
    }
</style>

<?= $this->endSection() ?>