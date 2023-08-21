<?= $this->extend("template/layout") ?>

<?= $this->section('stylesheet') ?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

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
        background-color: #edf0f4;
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

            <input type="hidden" name="id" value="<?= $patient_id ?>">

            <div class="card">
                <div class="card-body">

                    <h2 class="mb-3 mt-4">Image Details</h2>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="file" name="memo_img[]" id="memo_img" multiple>
                            </div>
                            <?php if (validation_show_error('memo_img')) : ?>
                                <span class="error-message"><?= validation_show_error('memo_img') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="descriptions">Comment:</label>
                                <textarea rows="3" name="descriptions" id="descriptions" class="form-control <?= (validation_show_error('descriptions')) ? 'is-invalid' : '' ?>" placeholder="Please Describe The Image"><?= set_value('descriptions') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div>
                        <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-submit" id="submit" <?= $patient_id ? '' : 'disabled' ?>>Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
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