<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>
<?= validation_list_errors() ?>

<!-- buat template utk error message -->
<!-- jgn ubah field -->
<form action="<?= url_to('patient/register') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Avatar:</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                <label class="custom-file-label" for="avatar">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" id="name" value="<?= set_value('name') ?>" class="form-control" placeholder="Please Enter Full Name" required>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="male" checked>
                            <label class="form-check-label" for="gender1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                            <label class="form-check-label" for="gender2">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>IC Number:</label>
                        <input type="text" name="ic_no" id="ic_no" value="<?= set_value('ic_no') ?>" class="form-control" placeholder="Please Enter IC Number" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" name="phone_number" id="phone_number" value="<?= set_value('phone_number') ?>" class="form-control" placeholder="Please Enter Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea name="address" id="address" rows="3" class="form-control" placeholder="Please Enter Address" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div>
                <button type="reset" class="btn btn-danger btn-reset" id="reset">Reset</button>
                <button type="submit" class="btn btn-primary btn-submit" id="submit">Submit Details</button>
            </div>
        </div>
    </div>

</form>
<?= $this->endSection(); ?>