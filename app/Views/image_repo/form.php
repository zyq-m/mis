<?= $this->extend("template/layout") ?>

<?= $this->section('stylesheet') ?>
<link href="<?= base_url('node_modules/filepond/dist/filepond.css') ?>" rel="stylesheet" />
<link href="<?= base_url('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css') ?>" rel="stylesheet" />

<style>
    /**
 * FilePond Custom Styles
 */
    .filepond--drop-label {
        color: #4c4e53;
    }

    .filepond--label-action {
        text-decoration-color: #babdc0;
    }

    .filepond--panel-root {
        border-radius: .25rem;
        background-color: #e9ecef;
        height: 1em;
    }

    .filepond--item-panel {
        background-color: #595e68;
    }

    .filepond--drip-blob {
        background-color: #7f8a9a;
    }

    .filepond--credits {
        display: none;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-md-12">

        <?= view('patient/search', ['route' => 'image_repo/patient']) ?>

        <form action="<?= url_to('image_repo/upload') ?>" method="post" class="form-horizontal ui raised segment" enctype="multipart/form-data" id="imageUploadForm">
            <?= csrf_field() ?>

            <input type="hidden" name="myKad" value="<?= $patient_id ?>">

            <div class="card">
                <div class="card-body">

                    <h4 class="mb-3">Image Details</h4>

                    <div class="form-row">
                        <div class="col-md-4 form-group">
                            <input type="file" name="memo_img[]" id="memo_img" multiple>
                        </div>
                        <?php if (validation_show_error('memo_img')) : ?>
                            <span class="error-message"><?= validation_show_error('memo_img') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 form-group">
                            <label for="screening_date">Date of Screening</label>
                            <input type="date" name="screening_date" id="screening_date" class="form-control" value="<?= set_value('screening_date') ?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="screening_time">Time of Screening</label>
                            <input type="time" name="screening_time" id="screening_time" class="form-control" value="<?= set_value('screening_time') ?>">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="hospital">Hospital</label>
                            <input type="text" name="hospital" id="hospital" class="form-control" value="<?= set_value('hospital') ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Any comments or recomendation" rows="3"><?= set_value('description') ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div>
                        <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-submit" id="submit" <?= $patient_id ? '' : 'disabled' ?>>Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script> -->

<script src="<?= base_url('node_modules/filepond/dist/filepond.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js') ?>"></script>
<script type="module">
    const inputElement = document.querySelector('#memo_img');

    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageValidateSize
    );

    // Create a FilePond instance
    const pond = FilePond.create(inputElement, {
        storeAsFile: true,
    });
</script>
<?= $this->endSection() ?>