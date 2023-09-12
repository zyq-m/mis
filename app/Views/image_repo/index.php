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
                        <?php foreach ($images as $image) : ?>
                            <tr id="table-row">
                                <td scope="row">
                                    <a href="#">
                                        <img src="<?= base_url('image/' . $image['path']) ?>" alt="..." class="img-fluid mr-1" style="height: 25px; object-fit: cover; width: 25px;">
                                    </a>
                                </td>
                                <td><?= $image['screening_date'] ?></td>
                                <td><?= $image['screening_time'] ?></td>
                                <td class="text-muted"><?= $image['time_stamp'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="" id="show-img">
                <p id="modal-taken"></p>
                <p id="modal-uploaded"></p>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section("scripts"); ?>
<script src="<?= base_url('assets/v3/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $("img").click(function() {
            const img = $(this).attr('src');

            $("#show-img").attr('src', img);
            $("#imgmodal").modal('show');
        });
    });
    $(function() {
        $('#tblist').DataTable();
    });
</script>
<?= $this->endSection() ?>