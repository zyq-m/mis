<?= $this->extend("template/layout") ?>

<?= $this->section("content") ?>

<?php $session = session(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">

                        <!-- Search Patient -->
                        <?php if (empty($patient)) : ?>
                            <form action="<?= base_url('urine_test/patient') ?>" method="get" class="form-group">
                                <label for="patient">Patient</label>
                                <div class="input-group">
                                    <input type="search" id="patient" name="patient" class="form-control <?= validation_show_error('patient') || $session->getFlashdata('error') ? 'is-invalid' : '' ?>" placeholder="Search for IC No..." value="<?= set_value("patient") ?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Search</button>
                                    </span>
                                </div>
                                <?php if (validation_show_error('patient') or $session->getFlashdata('error')) : ?>
                                    <span class="error-message"><?= validation_show_error('patient') ?><?= $session->getFlashdata('error') ?></span>
                                <?php endif; ?>
                            </form>
                        <?php else : ?>
                            <h2 class="mb-3">Patient Information</h2>
                            <?php foreach ($patient as $patient_details) : ?>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" value="<?= $patient_details['name'] ?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="ic_no">IC No.</label>
                                        <input type="text" id="ic_no" class="form-control" value="<?= $patient_details['ic_no'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="gender">Gender</label>
                                        <input type="text" id="gender" class="form-control" value="<?= $patient_details['gender'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="age">Age</label>
                                        <input type="text" id="age" class="form-control" value="<?= '34 years old' ?>" readonly>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="phone_number">Phone No.</label>
                                        <input type="text" id="phone_number" class="form-control" value="<?= $patient_details['phone_number'] ?>" readonly>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif; ?>

                        <!-- Test Information -->
                        <h2 class="mb-3 mt-4">Test Information</h2>
                        <form action="<?= base_url('urine_test') ?>" method="post" class="form-horizontal ui raised segment" id="urineTestForm">
                            <?= csrf_field() ?>
                            <!-- Patient Id -->
                            <input type="hidden" name="id" value="<?= $patient_id ?>">

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="blood">Blood</label>
                                    <input type="text" class="form-control <?= (validation_show_error('blood')) ? 'is-invalid' : '' ?>" id="blood" name="blood" value="<?= set_value('blood') ?>">

                                    <?php if (validation_show_error('blood')) : ?>
                                        <span class="error-message"><?= validation_show_error('blood') ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="bilirubin">Bilirubin</label>
                                    <input type="text" class="form-control <?= (validation_show_error('bilirubin')) ? 'is-invalid' : '' ?>" id="bilirubin" name="bilirubin" value="<?= set_value('bilirubin') ?>">

                                    <?php if (validation_show_error('bilirubin')) : ?>
                                        <span class="error-message"><?= validation_show_error('bilirubin') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="urobilinogen">Urobilinogen</label>
                                    <input type="text" class="form-control <?= (validation_show_error('urobilinogen')) ? 'is-invalid' : '' ?>" id="urobilinogen" name="urobilinogen" value="<?= set_value('urobilinogen') ?>">

                                    <?php if (validation_show_error('urobilinogen')) : ?>
                                        <span class="error-message"><?= validation_show_error('urobilinogen') ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="keton">Keton</label>
                                    <input type="text" class="form-control <?= (validation_show_error('keton')) ? 'is-invalid' : '' ?>" id="keton" name="keton" value="<?= set_value('keton') ?>">

                                    <?php if (validation_show_error('keton')) : ?>
                                        <span class="error-message"><?= validation_show_error('keton') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="protein">Protein</label>
                                    <input type="text" class="form-control <?= (validation_show_error('protein')) ? 'is-invalid' : '' ?>" id="protein" name="protein" value="<?= set_value('protein') ?>">

                                    <?php if (validation_show_error('protein')) : ?>
                                        <span class="error-message"><?= validation_show_error('protein') ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pH">Nitrit</label>
                                    <input type="text" class="form-control <?= (validation_show_error('nitrit')) ? 'is-invalid' : '' ?>" id="nitrit" name="nitrit" value="<?= set_value('nitrit') ?>">

                                    <?php if (validation_show_error('nitrit')) : ?>
                                        <span class="error-message"><?= validation_show_error('nitrit') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="glucose">Glucose</label>
                                    <input type="text" class="form-control <?= (validation_show_error('glucose')) ? 'is-invalid' : '' ?>" id="glucose" name="glucose" value="<?= set_value('glucose') ?>">

                                    <?php if (validation_show_error('glucose')) : ?>
                                        <span class="error-message"><?= validation_show_error('glucose') ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pH">pH</label>
                                    <input type="text" class="form-control <?= (validation_show_error('pH')) ? 'is-invalid' : '' ?>" id="pH" name="pH" value="<?= set_value('pH') ?>">

                                    <?php if (validation_show_error('pH')) : ?>
                                        <span class="error-message"><?= validation_show_error('pH') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="s_gravity">Specific Gravity</label>
                                    <input type="text" class="form-control <?= (validation_show_error('s_gravity')) ? 'is-invalid' : '' ?>" id="s_gravity" name="s_gravity" value="<?= set_value('s_gravity') ?>">

                                    <?php if (validation_show_error('s_gravity')) : ?>
                                        <span class="error-message"><?= validation_show_error('glucose') ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="leukocytes">Leukocytes</label>
                                    <input type="text" class="form-control <?= (validation_show_error('leukocytes')) ? 'is-invalid' : '' ?>" id="leukocytes" name="leukocytes" value="<?= set_value('leukocytes') ?>">

                                    <?php if (validation_show_error('leukocytes')) : ?>
                                        <span class="error-message"><?= validation_show_error('leukocytes') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Date of test taken -->
                                <div class="col-md-6 form-group">
                                    <label for="test_taken">Test Taken At</label>
                                    <input type="date" class="form-control <?= (validation_show_error('test_taken')) ? 'is-invalid' : '' ?>" id="test_taken" name="test_taken" value="<?= set_value('test_taken') ?>">

                                    <?php if (validation_show_error('test_taken')) : ?>
                                        <span class="error-message"><?= validation_show_error('test_taken') ?></span>
                                    <?php endif; ?>
                                </div>

                                <!-- Result -->
                                <div class="col-md-6 form-group">
                                    <label for="test_result">Result</label>
                                    <input type="date" class="form-control <?= (validation_show_error('test_result')) ? 'is-invalid' : '' ?>" id="test_result" name="test_result" value="<?= set_value('test_result') ?>">

                                    <?php if (validation_show_error('test_result')) : ?>
                                        <span class="error-message"><?= validation_show_error('test_result') ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Others -->
                            <div class="form-group">
                                <label for="descriptions">Description</label>
                                <textarea class="form-control <?= (validation_show_error('descriptions')) ? 'is-invalid' : '' ?>" id="descriptions" name="descriptions" rows="3" placeholder="Any comments or recomendation"><?= set_value('descriptions') ?></textarea>

                                <?php if (validation_show_error('descriptions')) : ?>
                                    <span class="error-message"><?= validation_show_error('descriptions') ?></span>
                                <?php endif; ?>
                            </div>

                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div>
                    <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submit" <?= $patient_id ? '' : 'disabled' ?>>Submit</button>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>