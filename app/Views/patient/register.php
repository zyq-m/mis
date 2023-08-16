<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<?php $session = session(); ?>
<!-- buat template utk error message -->
<!-- jgn ubah field -->

<?php if ($session->getFlashdata('register_error')) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?= $session->getFlashdata('register_error'); ?>
    </div>
<?php endif; ?>
<?php if ($session->getFlashdata('register_success')) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?= $session->getFlashdata('register_success'); ?>
    </div>
<?php endif; ?>

<form action="<?= url_to('patient/register') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group <?= (validation_show_error('avatar')) ? 'has-error' : '' ?>">
                        <label for="avatar">Avatar:</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= (validation_show_error('avatar')) ? 'is-invalid' : '' ?>" name="avatar" id="avatar" onchange="updateFileName(this)">
                                <label class="custom-file-label" data-placeholder="Choose file" for="avatar">Choose file</label>
                            </div>
                        </div>
                        <?php if (validation_show_error('avatar')) : ?>
                            <span class="error-message"><?= validation_show_error('avatar') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?= (validation_show_error('name')) ? 'has-error' : '' ?>">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?= set_value('name') ?>" class="form-control <?= (validation_show_error('name')) ? 'is-invalid' : '' ?>" placeholder="Please Enter Full Name">
                        <?php if (validation_show_error('name')) : ?>
                            <span class="error-message"><?= validation_show_error('name') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?= (validation_show_error('gender')) ? 'has-error' : '' ?>">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                            <input class="form-check-input <?= (validation_show_error('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="gender1" value="male">
                            <label class="form-check-label" for="gender1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input <?= (validation_show_error('gender')) ? 'is-invalid' : '' ?>" type="radio" name="gender" id="gender2" value="female">
                            <label class="form-check-label" for="gender2">
                                Female
                            </label>
                        </div>
                        <?php if (validation_show_error('gender')) : ?>
                            <span class="error-message"><?= validation_show_error('gender') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?= (validation_show_error('ic_no')) ? 'has-error' : '' ?>">
                        <label for="ic_no">IC Number:</label>
                        <input type="text" name="ic_no" id="ic_no" value="<?= set_value('ic_no') ?>" class="form-control <?= (validation_show_error('ic_no')) ? 'is-invalid' : '' ?>" placeholder="Please Enter IC Number">
                        <?php if (validation_show_error('ic_no')) : ?>
                            <span class="error-message"><?= validation_show_error('ic_no') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?= (validation_show_error('phone_number')) ? 'has-error' : '' ?>">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" name="phone_number" id="phone_number" value="<?= set_value('phone_number') ?>" class="form-control <?= (validation_show_error('phone_number')) ? 'is-invalid' : '' ?>" placeholder="Please Enter Phone Number">
                        <?php if (validation_show_error('phone_number')) : ?>
                            <span class="error-message"><?= validation_show_error('phone_number') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group <?= (validation_show_error('address')) ? 'has-error' : '' ?>">
                        <label for="address">Address:</label>
                        <textarea name="address" id="address" rows="3" class="form-control <?= (validation_show_error('address')) ? 'is-invalid' : '' ?>" placeholder="Please Enter Address"><?= set_value('address') ?></textarea>
                        <?php if (validation_show_error('address')) : ?>
                            <span class="error-message"><?= validation_show_error('address') ?></span>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-footer">
            <div>
                <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                <button type="submit" class="btn btn-primary btn-submit" id="submit">Submit Details</button>
            </div>
        </div>
    </div>

</form>

<script>
    function updateFileName(input) {
        const label = input.nextElementSibling;
        label.textContent = input.files[0] ? input.files[0].name : label.getAttribute("data-placeholder");
    }
</script>


<?= $this->endSection(); ?>