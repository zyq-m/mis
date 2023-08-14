<?= $this->extend("template/layout"); ?>

<?= $this->section("content"); ?>

<!-- utk view specific patient -->

<?php if (!empty($patient) && is_array($patient)) : ?>

    <?php foreach ($patient as $patient_details) : ?>

        <div class="row">
            <div class="col-md-12">
                <div class="ui raised segment">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="card-body">
                                    <div class="card-body text-center">
                                        <img src="<?= esc($patient_details['avatar']) ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 170px; height: 170px;">
                                        <br>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= esc($patient_details['name']) ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Gender</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= esc($patient_details['gender']) ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">IC No.</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= esc($patient_details['ic_no']) ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Date of Birth</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">12/12/2001</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Age</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">22 years-old</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone No.</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= esc($patient_details['phone_number']) ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= esc($patient_details['address']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach ?>

<?php else : ?>

    <h3>No patient found</h3>

    <p>Unable to find patient with id <b><?= esc($id) ?></b></p>

<?php endif ?>

<?= $this->endSection(); ?>