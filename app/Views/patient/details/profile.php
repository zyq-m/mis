<?php foreach ($patient['profile'] as $patient_details) : ?>
    <div class="row mb-4">
        <div class="px-2">
            <img src="<?= $patient_details['avatar'] ?>" alt="" class="img-fluid rounded" style="height: 10rem; object-fit: cover; width: 14rem;">
        </div>
        <div class="col-md">
            <h3 class="mt-4 mb-3 mt-sm-0"><?= $patient_details['name'] ?></h3>
            <div class="row">
                <p class="col-md-2 mb-0 mb-sm-auto">My Kad</p>
                <p class="col"><?= $patient_details['myKad'] ?></p>
            </div>
            <div class="row">
                <p class="col-md-2 mb-0 mb-sm-auto">Email</p>
                <p class="col"><?= $patient_details['email'] or "email" ?></p>
            </div>
            <div class="row">
                <p class="col-md-2 mb-0 mb-sm-auto">Phone Number</p>
                <p class="col"><?= $patient_details['phone_number'] ?></p>
            </div>
        </div>
    </div>
<?php endforeach ?>