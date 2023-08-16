<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<div>
    <?php if (!empty($images)) : ?>
        <?php foreach ($images as $image) : ?>
            <img src="<?= esc($image['path']) ?>" class="img-reponsive" alt="Image Repository">
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>