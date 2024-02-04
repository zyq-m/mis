<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<?= form_open_multipart("profile/password"); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card box-default">
            <div class="card-header with-border">
                <h3 class="card-title">Change Your Password</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="new_pwd">New Password</label>
                            <?= form_password(['name' => 'new_pwd', 'class' => validation_show_error('new_pwd') ? 'form-control is-invalid' : 'form-control']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="re_pwd">Retype Password</label>
                            <?= form_password(['name' => 're_pwd', 'class' => validation_show_error('re_pwd') ? 'form-control is-invalid' : 'form-control']) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Change</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close() ?>

<?= $this->endSection(); ?>