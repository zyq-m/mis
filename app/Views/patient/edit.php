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

<form action="<?= base_url('patient/edit/' . $patient[0]['myKad']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="card">
        <div class="card-body px-4">
            <!-- Indetity -->
            <?= view('patient/register_details/identity') ?>
            <!-- End indentity -->

            <!-- Demographic -->
            <?= view('patient/register_details/demographic') ?>
            <!-- End Demographic -->

            <!-- Clinical History -->
            <?= view('patient/register_details/clinical_history') ?>
            <!-- End Clinical History -->

            <!-- Genetic Factor -->
            <?= $this->include('patient/register_details/genetic_factor') ?>
            <!-- End Genetic Factor -->
        </div>
        <div class="card-footer">
            <div>
                <a class="btn btn-default" href="<?= base_url('patient') ?>">Cancel</a>
                <button type="submit" class="btn btn-primary btn-submit" id="submit">Save</button>
            </div>
        </div>
    </div>

</form>

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

    $(document).ready(function() {
        $('#name').val('<?= $patient[0]['name'] ?>');
        $('#email').val('<?= $patient[0]['email'] ?>');
        $('#myKad').val('<?= $patient[0]['myKad'] ?>');
        $('#phone_number').val('<?= $patient[0]['phone_number'] ?>');

        $('select[name="sex"]').val('<?= $patient[0]['sex'] ?>');
        $('select[name="race"]').val('<?= $patient[0]['race'] ?>');
        $('select[name="educational_status"]').val('<?= $patient[0]['educational_status'] ?>');
        $('select[name="marital_status"]').val('<?= $patient[0]['marital_status'] ?>');
        $('select[name="occupation"]').val('<?= $patient[0]['occupation'] ?>');

        $('select[name="illness_present"]').val('<?= $patient[0]['presenting_illness'] ?>');
        $('select[name="metastases_symptom"]').val('<?= $patient[0]['metastases_symptom'] ?>');
        $('select[name="med_history"]').val('<?= $patient[0]['medical_history'] ?>');
    });
</script>
<?= $this->endSection() ?>


<?= $this->endSection(); ?>