<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<?= form_open_multipart() ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Personal Information</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Full Name <font color="red">*</font></label>
                    <?= form_input($name) ?>
                </div>

                <div class="form-group">
                    <label for="phone_no">Phone No</label>
                    <?= form_input($phone) ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <?= form_input($email) ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= $this->endSection(); ?>