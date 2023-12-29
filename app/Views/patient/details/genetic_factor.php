<?php foreach ($patient['genetic'] as $patient_details) : ?>
    <div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Family History</p>
            <p class="col"><?= $patient_details['family_history'] ?></p>
        </div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Past Cancer</p>
            <p class="col"><?= $patient_details['past_cancer'] ?></p>
        </div>
        <?php if ($patient_details['past_cancer'] == 'Yes') : ?>
            <div class="row">
                <p class="col-md-2 mb-0 mb-sm-auto">Diagnose Date</p>
                <p class="col"><?= $patient_details['diagnose_date'] ?></p>
            </div>
            <div class="row">
                <p class="col-md-2 mb-0 mb-sm-auto">Diagnose with</p>
                <p class="col"><?= $patient_details['diagnose'] ?></p>
            </div>
        <?php endif ?>
        <div class="row">
            <a class="col-md-2 mb-0 mb-sm-auto" href="<?= base_url('patient/edit/' . $patient_details['myKad']) ?>">Edit</a>
        </div>
    </div>
<?php endforeach ?>