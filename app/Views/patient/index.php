<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>
<?= validation_list_errors() ?>

<h2>Add new patient</h2>

<form action="<?= url_to('patient') ?>" method="post">
    <?= csrf_field() ?>

    <!-- Name -->
    <p>Name</p>
    <input type="text" name="name" id="name" value="<?= set_value('name') ?>">

    <!-- gender -->
    <p>Gender</p>
    <input type="radio" name="gender" id="gender" value="male" <?= set_radio('gender', 'male') ?>>Male
    <br>
    <input type="radio" name="gender" id="gender" value="female" <?= set_radio('gender', 'female') ?>>Female

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