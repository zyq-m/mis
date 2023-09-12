<?php foreach ($patient['demographic'] as $patient_details) : ?>
    <div class="">
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Sex</p>
            <p class="col"><?= $patient_details['sex'] ?></p>
        </div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Educational status</p>
            <p class="col"><?= $patient_details['educational_status'] ?></p>
        </div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Marital status</p>
            <p class="col"><?= $patient_details['marital_status'] or "email" ?></p>
        </div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Occupation</p>
            <p class="col"><?= $patient_details['occupation'] ?></p>
        </div>
    </div>
<?php endforeach ?>