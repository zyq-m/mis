<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>
<?= validation_list_errors() ?>

<!-- buat template utk error message -->
<!-- jgn ubah field -->
<form action="<?= url_to('patient/register') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- avatar -->
    <p>Avatar</p>
    <input type="file" name="avatar" id="avatar">

    <!-- name -->
    <p>Name</p>
    <input type="text" name="name" id="name" value="<?= set_value('name') ?>">

    <!-- gender -->
    <p>Gender</p>
    <input type="radio" name="gender" id="gender" value="male" <?= set_radio('gender', 'male') ?>>Male
    <br>
    <input type="radio" name="gender" id="gender" value="female" <?= set_radio('gender', 'female') ?>>Female

    <!-- ic number -->
    <p>IC Number</p>
    <input type="text" name="ic_no" id="ic_no" value="<?= set_value('ic_no') ?>">
    <br>

    <!-- phone number -->
    <p>Phone Number</p>
    <input type="text" name="phone_number" id="phone_number" value="<?= set_value('phone_number') ?>">
    <br>

    <!-- address -->
    <p>Address</p>
    <textarea name="address" id="address" cols="30" rows="10"><?= set_value('address') ?></textarea>
    <br>

    <button type="submit">Save</button>
</form>
<?= $this->endSection(); ?>