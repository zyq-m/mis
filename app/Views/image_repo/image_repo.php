<?= $this->extend("template/layout") ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-md-12">
        <form action="<?= url_to('image_repo/upload') ?>" method="post" class="form-horizontal ui raised segment" enctype="multipart/form-data" id="imageUploadForm">
            <?= csrf_field() ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group <?= (validation_show_error('memoimg')) ? 'has-error' : '' ?>">
                                <label for="memoimg">Upload Image:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= (validation_show_error('memoimg')) ? 'is-invalid' : '' ?>" id="memoimg" name="memoimg" onchange="updateFileName(this)">
                                        <label class="custom-file-label" for="memoimg"><?= empty(set_value('memoimg')) ? 'Choose file' : set_value('memoimg') ?></label>
                                    </div>
                                </div>
                                <?php if (validation_show_error('memoimg')) : ?>
                                    <span class="error-message"><?= validation_show_error('memoimg') ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group <?= (validation_show_error('descriptions')) ? 'has-error' : '' ?>">
                                <label for="descriptions">Comment:</label>
                                <textarea rows="3" name="descriptions" id="descriptions" class="form-control <?= (validation_show_error('descriptions')) ? 'is-invalid' : '' ?>" placeholder="Please Describe The Image"><?= set_value('descriptions') ?></textarea>
                                <?php if (validation_show_error('descriptions')) : ?>
                                    <span class="error-message"><?= validation_show_error('descriptions') ?></span>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-submit" id="submit">Submit Form</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function updateFileName(input) {
        const fileName = input.files[0] ? input.files[0].name : 'Choose file';
        const label = input.nextElementSibling;
        label.textContent = fileName;
    }
</script>

<?= $this->endSection() ?>