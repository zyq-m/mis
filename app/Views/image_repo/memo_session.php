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
                    <li class="breadcrumb-item active" aria-current="page"><?= $images[0]['name'] ?></li>
                </ol>
            </nav>
            <div class="row">
                <div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                        <input type="search" name="input" id="input" onkeyup="onSearch()" class="form-control" placeholder="Search for file..">
                    </div>
                </div>
                <div class="col-auto pl-0">
                    <button class="btn btn-default" id="download-btn">
                        <i class="fa-solid fa-arrow-down"></i>
                        Download
                    </button>
                </div>
                <div class="col-auto">
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
            <?= form_open(base_url('image_repo/download/folder'), ['method' => 'post', 'id' => 'download-img']) ?>
            <?= csrf_field() ?>
            <?= form_hidden('myKad', $images[0]['myKad']) ?>
            <div class="row justify-content-center justify-content-md-start" style="gap: 1.5rem;">
                <div class="col-12 pl-0 pr-0">
                    <input type="checkbox" id="all" />
                    <label for="all">Select all</label>
                </div>
                <?php foreach ($images as $image) : ?>
                    <a href="<?= base_url('image_repo/patient/' . $image['myKad'] . '/' . $image['session']) ?>" id="output">
                        <input type="checkbox" name="selectedImg[]" value="<?= $image['session'] ?>" />
                        <div class="col-auto file-card pl-0 pr-0 row justify-content-center">
                            <i class="col-auto fa-solid fa-folder" style="font-size: 14rem;"></i>
                            <div class="col-auto text-center text-muted text-sm mt-2" id="target">Session <?= $image['session'] ?></div>
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
    function onSearch() {
        const input = document.getElementById('input');
        const filter = input.value.toUpperCase();
        const target = document.querySelectorAll("#target");
        const output = document.querySelectorAll("#output");

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < target.length; i++) {
            let targetTxt = target[i].textContent || target[i].innerHTML;
            if (targetTxt.toUpperCase().indexOf(filter) > -1) {
                output[i].style.display = "";
            } else {
                output[i].style.display = "none";
            }
        }
    }

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