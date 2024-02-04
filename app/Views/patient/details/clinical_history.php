<?php foreach ($patient['clinical'] as $patient_details) : ?>
    <div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Presenting Illness</p>
            <p class="col"><?= $patient_details['presenting_illness'] ?></p>
        </div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Metastases Symptom</p>
            <p class="col"><?= $patient_details['metastases_symptom'] ?></p>
        </div>
        <div class="row">
            <p class="col-md-2 mb-0 mb-sm-auto">Medical History</p>
            <p class="col"><?= $patient_details['medical_history'] ?></p>
        </div>
        <div class="row">
            <a class="col-md-2 mb-0 mb-sm-auto" href="<?= base_url('patient/edit/' . $patient_details['myKad']) ?>">Edit</a>
        </div>
    </div>
<?php endforeach ?>