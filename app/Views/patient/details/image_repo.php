<?= $this->section("stylesheet"); ?>
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?php $session = session() ?>
<?php $is_img = $session->getFlashdata('img') ?>

<?php if (!empty($patient['img_repo'])) : ?>
    <div class="table-responsive">
        <table class="table table-borderless table-hover" id="tblist">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date taken</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date uploaded</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patient['img_repo'] as $patient_details) : ?>
                    <tr>
                        <td scope="row">
                            <img src="<?= base_url('image/' . $patient_details['path']) ?>" alt="..." class="img-fluid mr-1" style="height: 20px; object-fit: cover; width: 20px;">
                            <a href="<?= base_url('image/' . $patient_details['path']) ?>" target="_blank">
                                <?= $patient_details['path'] ?>
                            </a>
                        </td>
                        <td><?= $patient_details['screening_date'] ?></td>
                        <td><?= $patient_details['screening_time'] ?></td>
                        <td class="text-muted"><?= $patient_details['time_stamp'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <div>
        <div>No record found. Click <a href="<?= base_url('image_repo/patient?patient=' . $patient['profile'][0]['myKad']) ?>">here</a> to add.</div>
    </div>
<?php endif ?>

<?= $this->section("scripts"); ?>
<script src="<?= base_url('assets/v3/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script>
    $(function() {
        $('#tblist').DataTable();

    });
</script>
<?= $this->endSection() ?>