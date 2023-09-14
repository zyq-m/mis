<?= $this->extend("template/layout"); ?>

<?= $this->section("stylesheet"); ?>
<link href="<?= base_url('node_modules/filepond/dist/filepond.css') ?>" rel="stylesheet" />
<link href="<?= base_url('node_modules/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css') ?>" rel="stylesheet" />
<link href="<?= base_url('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css') ?>" rel="stylesheet" />

<style>
    .filepond--root {
        width: 170px;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<?php $session = session(); ?>
<!-- buat template utk error message -->
<!-- jgn ubah field -->

<?php if ($session->getFlashdata('register_error')) : ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $session->getFlashdata('register_error'); ?>
    </div>
<?php endif; ?>
<?php if ($session->getFlashdata('register_success')) : ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $session->getFlashdata('register_success'); ?>
    </div>
<?php endif; ?>

<form action="<?= url_to('patient/register') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="card">
        <div class="card-body px-4 row">
            <div class="ml-2 mr-3">
                <input type="file" id="img" name="filepond" accept="image/png, image/jpeg, image/gif" />
            </div>
            <div class="col">
                <!-- Indetity -->
                <?= $this->include('patient/register_details/identity') ?>
                <!-- End indentity -->
                <!-- Demographic -->
                <?= $this->include('patient/register_details/demographic') ?>
                <!-- End Demographic -->
                <!-- Clinical History -->
                <?= $this->include('patient/register_details/clinical_history') ?>
                <!-- End Clinical History -->
            </div>
        </div>
        <div class="card-footer px-4">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-submit" id="submit">Add</button>
                </div>
            </div>
        </div>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    function updateFileName(input) {
        const label = input.nextElementSibling;
        label.textContent = input.files[0] ? input.files[0].name : label.getAttribute("data-placeholder");
    }

    function checkValue(val, target, custom) {
        if (custom) {
            if (val === custom) {
                document.getElementById(custom).style.display = 'block';
            } else {
                document.getElementById(custom).style.display = 'none';
            }

            if (val === "Others") {
                document.getElementById(target).style.display = 'block';
            } else {
                document.getElementById(target).style.display = 'none';
            }
        } else {
            if (val === "Others") {
                document.getElementById(target).style.display = 'block';
            } else {
                document.getElementById(target).style.display = 'none';
            }
        }
    }
</script>
<script src="<?= base_url('node_modules/filepond/dist/filepond.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js') ?>"></script>
<script type="module">
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform,
        FilePondPluginImageEdit
    );
    const pond = FilePond.create(document.querySelector('#img'), {
        labelIdle: `Drag & Drop profile picture or <span class="filepond--label-action">Browse</span>`,
        imagePreviewHeight: 170,
        imageCropAspectRatio: '1:1',
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: 'compact circle',
        styleLoadIndicatorPosition: 'center bottom',
        styleProgressIndicatorPosition: 'right bottom',
        styleButtonRemoveItemPosition: 'left bottom',
        styleButtonProcessItemPosition: 'right bottom',
    });
</script>
<?= $this->endSection() ?>