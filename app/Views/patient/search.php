<?php $session = session() ?>
<!-- Search Patient -->

<?php if (empty($patient)) : ?>
    <form action="<?= base_url($route) ?>" method="get" class="form-group">
        <div class="input-group">
            <input type="search" id="patient" name="patient" class="form-control <?= validation_show_error('patient') || $session->getFlashdata('error') ? 'is-invalid' : '' ?>" placeholder="Search patient by IC No." value="<?= set_value("patient") ?>">
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

            <h3 class="mb-3">Patient Details</h3>

            <?php foreach ($patient as $patient_details) : ?>
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" value="<?= $patient_details['name'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="ic_no">IC No.</label>
                        <input type="text" id="ic_no" class="form-control" value="<?= $patient_details['ic_no'] ?>" readonly>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" class="form-control" value="<?= $patient_details['gender'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="age">Age</label>
                        <input type="text" id="age" class="form-control" value="<?= '34 years old' ?>" readonly>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="phone_number">Phone No.</label>
                        <input type="text" id="phone_number" class="form-control" value="<?= $patient_details['phone_number'] ?>" readonly>
                    </div>
                </div>
        </div>
    </div>
<?php endforeach ?>
<?php endif; ?>