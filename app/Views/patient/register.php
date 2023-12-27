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

                <!-- Genetic Factor -->
                <?= $this->include('patient/register_details/genetic_factor') ?>
                <!-- End Genetic Factor -->
            </div>
        </div>
        <div class="card-footer px-4">
            <div class="row">
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

    function checkValue(val, target, custom, style) {
        if (custom) {
            if (!style) {
                if (val === custom) {
                    changeDisplay(custom, 'block');
                } else {
                    changeDisplay(custom, 'none');
                }
            } else {
                if (val === custom) {
                    changeDisplay(custom, style);
                } else {
                    changeDisplay(custom, 'none');
                }
            }

            if (val === "Others") {
                changeDisplay(target, 'block');
            } else {
                changeDisplay(target, 'none');
            }
        } else {
            if (val === "Others") {
                changeDisplay(target, 'block');
            } else {
                changeDisplay(target, 'none');
            }
        }
    }

    function changeDisplay(target, style) {
        document.getElementById(target).style.display = style;
    }
</script>
<?= $this->endSection() ?>