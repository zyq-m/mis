<?= $this->section("stylesheet"); ?>
<style>
    .img-file {
        height: 20rem;
        object-fit: contain;
        width: 20rem
    }

    .file-card {
        width: 20rem;
    }

    .file-card:hover {
        background-color: #e4e4e4;
    }
</style>
<?= $this->endSection() ?>

<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<div class="card">
    <div class="card-body">
        <?php if (!empty($images)) : ?>
            <div class="row px-2 justify-content-center justify-content-md-start" style="gap: 2rem;">
                <?php foreach ($images as $image) : ?>
                    <div class="col-auto file-card pl-0 pr-0">
                        <img src="<?= base_url('image/' . $image['path']) ?>" alt="..." class="img-file">
                        <div class="text-center text-muted text-sm"><?= $image['name'] ?></div>
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