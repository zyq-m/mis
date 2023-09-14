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
    <div class="card-header">
        <div class="row justify-content-between align-items-center">
            <nav aria-label="breadcrumb" class="col-3">
                <ol class="breadcrumb p-0 m-0 bg-white">
                    <li class="breadcrumb-item active" aria-current="page"> All </li>
                </ol>
            </nav>
            <div class="row">
                <form action="" method="get">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                        <input type="search" name="input" id="" class="form-control" placeholder="Search for file..">
                    </div>
                </form>
                <div class="col-auto">
                    <a href="<?= base_url('image_repo/form') ?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Upload
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if (!empty($images)) : ?>
            <div class="row justify-content-center justify-content-md-start" style="gap: 2rem;">
                <?php foreach ($images as $image) : ?>
                    <a href="<?= base_url('image_repo/patient/' . $image['myKad']) ?>">
                        <div class="col-auto file-card pl-0 pr-0 row justify-content-center">
                            <i class="col-auto fa-solid fa-folder" style="font-size: 14rem;"></i>
                            <div class="col-auto text-center text-muted text-sm mt-2"><?= $image['name'] ?></div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
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