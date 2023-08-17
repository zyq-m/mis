<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<div>
    <?php if (!empty($images)) : ?>
        <?php foreach ($images as $image) : ?>

            <div>
                <img src="<?= str_contains($image['path'], 'memo-img') ? base_url('image/' . esc($image['path'])) : esc($image['path']) ?>" class="img-reponsive" alt="Image Repository">
                <p><?= esc($image['descriptions']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>