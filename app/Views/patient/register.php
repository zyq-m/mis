<?= $this->extend("template/layout"); ?>

<?= $this->section("content"); ?>

<?php $session = session(); ?>
<!-- buat template utk error message -->
<!-- jgn ubah field -->

<?php if ($session->getFlashdata('register_error')) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $session->getFlashdata('register_error'); ?>
    </div>
<?php endif; ?>
<?php if ($session->getFlashdata('register_success')) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $session->getFlashdata('register_success'); ?>
    </div>
<?php endif; ?>

<form action="<?= url_to('patient/register') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="card">
        <div class="card-body px-4 row">
            <div class="col">
                <!-- Indetity -->
                <?= $this->include('patient/register_details/identity') ?>
                <!-- End indentity -->
                <!-- Demographic -->
                <?= $this->include('patient/register_details/demographic') ?>
                <!-- End Demographic -->
                <!-- Clinical History -->
                <?= $this->include('patient/register_details/clinical_history') ?>
                <!-- End Clinical History -->
            </div>
        </div>
        <div class="card-footer px-4">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-submit" id="submit">Add</button>
                </div>
            </div>
        </div>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    function updateFileName(input) {
        const label = input.nextElementSibling;
        label.textContent = input.files[0] ? input.files[0].name : label.getAttribute("data-placeholder");
    }

    function checkValue(val, target, custom) {
        if (custom) {
            if (val === custom) {
                document.getElementById(custom).style.display = 'block';
            } else {
                document.getElementById(custom).style.display = 'none';
            }

            if (val === "Others") {
                document.getElementById(target).style.display = 'block';
            } else {
                document.getElementById(target).style.display = 'none';
            }
        } else {
            if (val === "Others") {
                document.getElementById(target).style.display = 'block';
            } else {
                document.getElementById(target).style.display = 'none';
            }
        }
    }
</script>
<?= $this->endSection() ?>