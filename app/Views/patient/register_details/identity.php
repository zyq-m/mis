<?php
$nameInput = [
    'name' => 'name',
    'id' => 'name',
    'placeholder' => 'Alisa binti Ahmad',
    'class' => validation_show_error('name') ? 'form-control is-invalid' : 'form-control',
    'value' => set_value('name'),
];
$myKadInput = [
    'name' => 'myKad',
    'id' => 'myKad',
    'placeholder' => '1234567890',
    'class' => validation_show_error('myKad') ? 'form-control is-invalid' : 'form-control',
    'value' => set_value('myKad'),
];
$emailInput = [
    'name' => 'email',
    'id' => 'email',
    'placeholder' => 'example@email.com',
    'class' => validation_show_error('email') ? 'form-control is-invalid' : 'form-control',
    'type' => 'email',
    'value' => set_value('email'),
];
$phoneInput = [
    'name' => 'phone_number',
    'id' => 'phone_number',
    'placeholder' => '01234567890',
    'class' => validation_show_error('phone_number') ? 'form-control is-invalid' : 'form-control',
    'value' => set_value('phone_number'),
];
?>

<div>
    <h4>Identity</h4>

    <div class="form-row">
        <!-- Name -->
        <div class="form-group col-md-6 <?= (validation_show_error('name')) ? 'has-error' : '' ?>">
            <label for="name">Name</label>
            <?= form_input($nameInput) ?>
            <?php if (validation_show_error('name')) : ?>
                <span class="error-message"><?= validation_show_error('name') ?></span>
            <?php endif; ?>
        </div>
        <!-- My Kad -->
        <div class="form-group col-md-6 <?= (validation_show_error('myKad')) ? 'has-error' : '' ?>">
            <label for="myKad">My Kad</label>
            <?= form_input($myKadInput) ?>
            <?php if (validation_show_error('myKad')) : ?>
                <span class="error-message"><?= validation_show_error('myKad') ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-row">
        <!-- Email -->
        <div class="form-group col-md-6 <?= (validation_show_error('gender')) ? 'has-error' : '' ?>">
            <label for="email">Email</label>
            <?= form_input($emailInput) ?>
            <?php if (validation_show_error('email')) : ?>
                <span class="error-message"><?= validation_show_error('email') ?></span>
            <?php endif; ?>
        </div>

        <!-- Phone number -->
        <div class="form-group col-md-6 <?= (validation_show_error('phone_number')) ? 'has-error' : '' ?>">
            <label for="phone_number">Phone Number</label>
            <?= form_input($phoneInput) ?>
            <?php if (validation_show_error('phone_number')) : ?>
                <span class="error-message"><?= validation_show_error('phone_number') ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>