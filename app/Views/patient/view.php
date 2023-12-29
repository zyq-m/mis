<?= $this->extend("template/layout"); ?>

<?= $this->section("stylesheet"); ?>
<style>
    .gap-4 {
        gap: 1.5rem;
    }
</style>
<?= $this->endSection(); ?>

<?php $session = session() ?>
<?php $is_img = $session->getFlashdata('img') ?>
<?= $this->section("content"); ?>

<!-- utk view specific patient -->

<div class="row">
    <div class="col-md-12">
        <div class="ui raised segment">
            <div class="card">
                <div class="card-body">
                    <!-- Profile -->
                    <?= view('patient/details/profile', ['patient' => $patient]) ?>
                    <!-- End Profile -->

                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li role="presentation">
                            <button class="btn nav-link active" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Demographic</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link" id="clinical-tab" data-toggle="tab" data-target="#clinical" type="button" role="tab" aria-controls="clinical" aria-selected="false">Clinical History</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link" id="genetic-tab" data-toggle="tab" data-target="#genetic" type="button" role="tab" aria-controls="genetic" aria-selected="false">Genetic Factor</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link" id="urine-tab" data-toggle="tab" data-target="#urine" type="button" role="tab" aria-controls="urine" aria-selected="false">Urine Test</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link" id="repo-tab" data-toggle="tab" data-target="#repo" type="button" role="tab" aria-controls="repo" aria-selected="false">Image Repository</button>
                        </li>
                    </ul>
                    <!-- End Nav Tabs -->

                    <?php if (!empty($patient) && is_array($patient['profile'])) : ?>

                        <div class="tab-content" id="myTabContent">
                            <!-- Demographic Detail -->
                            <div class="tab-pane fade show active mt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?= view('patient/details/demographic', ['patient' => $patient]) ?>
                            </div>

                            <!-- Clinical Detail -->
                            <div class="tab-pane fade show mt-4" id="clinical" role="tabpanel" aria-labelledby="clinical-tab">
                                <?= view('patient/details/clinical_history', ['patient' => $patient]) ?>
                            </div>

                            <!-- Genetic Factor Detail -->
                            <div class="tab-pane fade show mt-4" id="genetic" role="tabpanel" aria-labelledby="genetic-tab">
                                <?= view('patient/details/genetic_factor', ['patient' => $patient]) ?>
                            </div>

                            <!-- Urine Test -->
                            <div class="tab-pane fade mt-4" id="urine" role="tabpanel" aria-labelledby="urine-tab">
                                <?= view('patient/details/urine_test', ['patient' => $patient]) ?>
                            </div>

                            <!-- Image Repository -->
                            <div class="tab-pane fade mt-4" id="repo" role="tabpanel" aria-labelledby="repo-tab">
                                <?= view('patient/details/image_repo', ['patient' => $patient]) ?>
                            </div>
                        </div>

                    <?php else : ?>
                        <h3>No patient found</h3>

                        <p>Unable to find patient with id <b><?= esc($id) ?></b></p>

                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('components/imageModal') ?>

<?= $this->endSection(); ?>