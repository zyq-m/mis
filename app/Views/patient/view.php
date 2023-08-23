<?= $this->extend("template/layout"); ?>

<?= $this->section("stylesheet"); ?>

<style>
    .gap-4 {
        gap: 1.5rem;
    }
</style>

<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<!-- utk view specific patient -->

<div class="row">
    <div class="col-md-12">
        <div class="ui raised segment">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li role="presentation">
                            <button class="btn nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link" id="urine-tab" data-toggle="tab" data-target="#urine" type="button" role="tab" aria-controls="urine" aria-selected="false">Urine Test</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link active" id="repo-tab" data-toggle="tab" data-target="#repo" type="button" role="tab" aria-controls="repo" aria-selected="false">Image Repository</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <?php if (!empty($patient) && is_array($patient['profile'])) : ?>

                        <div class="tab-content" id="myTabContent">
                            <!-- Profile -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?= view('patient/details/profile', ['patient' => $patient]) ?>
                            </div>

                            <!-- Urine Test -->
                            <div class="tab-pane fade" id="urine" role="tabpanel" aria-labelledby="urine-tab">
                                <?= view('patient/details/urine_test', ['patient' => $patient]) ?>
                            </div>

                            <!-- Image Repository -->
                            <div class="tab-pane fade show active" id="repo" role="tabpanel" aria-labelledby="repo-tab">
                                <pre><?= json_encode($patient['img_repo'], JSON_PRETTY_PRINT) ?></pre>
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

<?= $this->endSection(); ?>