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
            <nav aria-label="breadcrumb" class="col-auto">
                <ol class="breadcrumb p-0 m-0 bg-white">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?= base_url('image_repo') ?>">All</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?= base_url('image_repo/patient/' . $images[0]['myKad']) ?>">
                            <?= $images[0]['name'] ?>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Session <?= $images[0]['session'] ?></li>
                </ol>
            </nav>
            <div class="row">
                <form class="col-auto pl-0 pr-4" action="" method="get">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                        <input type="search" name="" id="" class="form-control" placeholder="Search for file..">
                    </div>
                </form>
                <div class="col-auto pl-0">
                    <button class="btn btn-default" id="download-btn">
                        <i class="fa-solid fa-arrow-down"></i>
                        Download
                    </button>
                </div>
                <div class="col-auto pl-0">
                    <a href="<?= base_url('image_repo/form') ?>" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-up"></i>
                        Upload
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php if (!empty($images)) : ?>
            <?= form_open(base_url('image_repo/download/file'), ['method' => 'post', 'id' => 'download-img']) ?>
            <?= csrf_field() ?>
            <?= form_hidden('myKad', $images[0]['myKad']) ?>
            <?= form_hidden('session', $images[0]['session']) ?>
            <div class="row justify-content-center justify-content-md-start" style="gap: 1.5rem;">
                <div class="col-12 pl-0 pr-0">
                    <input type="checkbox" id="all" />
                    <label for="all">Select all</label>
                </div>
                <?php foreach ($images as $image) : ?>
                    <div class="col-auto file-card pl-0 pr-0">
                        <input type="checkbox" name="selectedImg[]" value="<?= $image['file_name'] ?>" />
                        <img loading="lazy" src="<?= base_url('image/' . $image['file_name']) ?>" alt="..." class="img-file">
                        <div class="text-center text-muted text-sm mt-2"><?= $image['file_name'] ?></div>
                    </div>
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

    const selectAll = document.getElementById('all');
    const imgs = document.querySelectorAll("input[name='selectedImg[]']")

    selectAll.addEventListener('change', () => {
        imgs.forEach(img => {
            if (selectAll.checked) {
                img.checked = true
            } else {
                img.checked = false
            }

            img.addEventListener('change', () => {
                if (!img.checked) {
                    selectAll.checked = false;
                } else {
                    selectAll.checked = true;
                }
            });
        });
    })


    const btn = document.getElementById('download-btn');
    const form = document.getElementById('download-img');

    btn.addEventListener('click', () => {
        form.submit();
    })
</script>
<?= $this->endSection() ?>