<?php foreach ($patient['profile'] as $patient_details) : ?>
    <div class="row mt-4">
        <div class="col-sm-4 col-md-3 pr-md-4 mb-4">
            <img src="<?= $patient_details['avatar'] ?>" alt="" class="img-fluid rounded">
        </div>
        <div class="col">
            <div class="row mb-3">
                <div class="col-md-2 font-weight-bold">Name</div>
                <div class="col-md-6"><?= $patient_details['name'] ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 font-weight-bold">IC No.</div>
                <div class="col-md-6"><?= $patient_details['ic_no'] ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 font-weight-bold">Gender</div>
                <div class="col-md-6"><?= $patient_details['gender'] ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 font-weight-bold">Phone No.</div>
                <div class="col-md-6"><?= $patient_details['phone_number'] ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 font-weight-bold">Address</div>
                <div class="col-md-6"><?= $patient_details['address'] ?></div>
            </div>
        </div>
    </div>
<?php endforeach ?>