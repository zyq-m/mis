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
                            <div class="form-group">
                                <label>Upload Image:</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="memo_img" class="custom-file-input" id="inputGroupFile01" value="<?= set_value('memo_img') ?>">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file_name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Your file name" name="file_name" id="file_name" value="<?= set_value('file_name') ?>">
                                </div>
                                <div class="form-group">
                                    <label>Comment:</label>
                                    <textarea rows="3" name="descriptions" id="descriptions" class="form-control" placeholder="Please Enter Current Symptoms or Concerns"><?= set_value('descriptions') ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <button type="reset" class="btn btn-danger btn-reset" id="reset">Reset</button>
                        <button type="submit" class="btn btn-primary btn-submit" id="submit">Submit Form</button>
                    </div>
                </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>