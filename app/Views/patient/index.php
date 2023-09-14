<?= $this->extend("template/layout"); ?>

<?= $this->section("stylesheet"); ?>
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

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

<?= $this->section("content"); ?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body pb-5">

                    <div class="text-right"><a href="<?= url_to('patient/register') ?>"><span class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</span></a><br><br></div>

                    <table class="table table-borderless table-hover" id="tblist">
                        <thead>
                            <tr role="row">
                                <th width="3%">No</th>
                                <th>Name</th>
                                <th width="10%">My Kad</th>
                                <th width="15%">Email</th>
                                <th width="15%">Phone No.</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if (!empty($patientList) && is_array($patientList)) : ?>

                                <?php $no = 1; ?>

                                <?php foreach ($patientList as $patient) : ?>

                                    <tr>
                                        <td class="text-center">
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <a href="<?= url_to('patient') . '/' . esc($patient['myKad']) ?>">
                                                <?= esc($patient['name']) ?>
                                            </a>
                                        </td>
                                        <td><?= esc($patient['myKad']) ?></td>
                                        <td><?= esc($patient['email']) ?></td>
                                        <td><?= esc($patient['phone_number']) ?></td>
                                    </tr>

                                    <?php $no++ ?>

                                <?php endforeach ?>

                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>