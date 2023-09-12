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
                    <div class="row mb-4">
                        <div class="px-2">
                            <img src="https://raw.githubusercontent.com/gist/patevs/b007a0e98fb216438d4cbf559fac4166/raw/88f20c9d749d756be63f22b09f3c4ac570bc5101/programming.gif" alt="" class="img-fluid rounded" style="height: 10rem; object-fit: cover; width: 14rem;">
                        </div>
                        <div class="col-md">
                            <h3 class="mt-4 mb-3 mt-sm-0">Haziq Musa</h3>
                            <div class="row">
                                <p class="col-md-2 mb-0 mb-sm-auto">My Kad</p>
                                <p class="col">01010101010</p>
                            </div>
                            <div class="row">
                                <p class="col-md-2 mb-0 mb-sm-auto">Email</p>
                                <p class="col">email@gmail.com</p>
                            </div>
                            <div class="row">
                                <p class="col-md-2 mb-0 mb-sm-auto">Phone Number</p>
                                <p class="col">01234567890</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Profile -->

                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li role="presentation">
                            <button class="btn nav-link <?= $session->getFlashdata('img') ? '' : 'active' ?>" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link" id="urine-tab" data-toggle="tab" data-target="#urine" type="button" role="tab" aria-controls="urine" aria-selected="false">Urine Test</button>
                        </li>
                        <li role="presentation">
                            <button class="btn nav-link <?= $session->getFlashdata('img') ? 'active' : '' ?>" id="repo-tab" data-toggle="tab" data-target="#repo" type="button" role="tab" aria-controls="repo" aria-selected="false">Image Repository</button>
                        </li>
                    </ul>
                    <!-- End Nav Tabs -->

                    <?php if (!empty($patient) && is_array($patient['profile'])) : ?>

                        <div class="tab-content" id="myTabContent">
                            <!-- Profile Detail -->
                            <div class="tab-pane fade <?= $session->getFlashdata('img') ? '' : 'show active' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <?= view('patient/details/profile', ['patient' => $patient]) ?>
                            </div>

                            <!-- Urine Test -->
                            <div class="tab-pane fade" id="urine" role="tabpanel" aria-labelledby="urine-tab">
                                <?= view('patient/details/urine_test', ['patient' => $patient]) ?>
                            </div>

                            <!-- Image Repository -->
                            <div class="tab-pane fade <?= $session->getFlashdata('img') ? 'show active' : '' ?>" id="repo" role="tabpanel" aria-labelledby="repo-tab">
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

<?= $this->endSection(); ?>