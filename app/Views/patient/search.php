<?php
$session = session();
$searchInput = [
    'name' => 'patient',
    'id' => 'patient',
    'class' => validation_show_error('patient') || $session->getFlashdata('error') ? 'form-control is-invalid' : 'form-control',
    'placeholder' => 'Search patient by MyKad',
    'type' => 'search'
];
?>
<!-- Search Patient -->

<?php if (empty($patient)) : ?>
    <form action="<?= base_url($route) ?>" method="get" class="form-group">
        <div class="input-group">
            <?= form_input($searchInput) ?>
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Search</button>
            </span>
        </div>
        <?php if (validation_show_error('patient') or $session->getFlashdata('error')) : ?>
            <span class="error-message"><?= validation_show_error('patient') ?><?= $session->getFlashdata('error') ?></span>
        <?php endif; ?>
    </form>
<?php else : ?>
    <div class="card">
        <div class="card-body">

            <h4 class="mb-3">Patient Details</h4>

            <?php foreach ($patient as $patient_details) : ?>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="<?= $patient_details['name'] ?>" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="myKad">My Kad</label>
                        <input type="text" id="myKad" class="form-control" value="<?= $patient_details['myKad'] ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 form-group">
                        <label for="gender">Email</label>
                        <input type="text" id="gender" class="form-control" value="<?= $patient_details['email'] ?>" readonly>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="age">Age</label>
                        <input type="text" id="age" class="form-control" value="<?= '34 years old' ?>" readonly>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="phone_number">Phone No.</label>
                        <input type="text" id="phone_number" class="form-control" value="<?= $patient_details['phone_number'] ?>" readonly>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php endif; ?>