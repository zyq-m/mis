<?= $this->section("stylesheet"); ?>
<style>
    .img-file {
        height: 25rem;
        object-fit: contain;
        width: 25rem
    }
</style>
<?= $this->endSection() ?>

<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<div class="card">
    <div class="card-body">
        <?php if (!empty($images)) : ?>
            <div class="row">
                <?php foreach ($images as $image) : ?>
                    <div class="col-sm">
                        <img src="<?= base_url('image/' . $image['path']) ?>" alt="..." class="img-fluid img-file">
                        <div><?= $image['name'] ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</div>

<div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <img class="img-fluid" src="" id="show-img">
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
</script>
<?= $this->endSection() ?>