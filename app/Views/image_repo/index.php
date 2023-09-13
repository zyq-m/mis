<?= $this->section("stylesheet"); ?>
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<div class="card">
    <div class="card-body">
        <?php if (!empty($images)) : ?>
            <div class="table-responsive-xl">
                <table class="table table-borderless table-hover" id="tblist">
                    <thead>
                        <tr>
                            <th scope="col" style="padding-left: 44px;">Name</th>
                            <th scope="col">Date taken</th>
                            <th scope="col">Date uploaded</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($images as $image) : ?>
                            <tr id="table-row">
                                <td scope="row">
                                    <a href="#">
                                        <img src="<?= base_url('image/' . $image['path']) ?>" alt="..." class="img-fluid mr-1" style="height: 25px; object-fit: cover; width: 25px;">
                                    </a>
                                    <?= $image['path'] ?>
                                </td>
                                <td><?= $image['screening_date'] . $image['screening_time'] ?></td>
                                <td class="text-muted"><?= $image['time_stamp'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('components/imageModal') ?>

<?= $this->endSection(); ?>

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