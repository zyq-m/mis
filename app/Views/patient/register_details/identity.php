<div>
    <h4>Identity</h4>

    <div class="form-row">
        <!-- Name -->
        <div class="form-group col-md-6 <?= (validation_show_error('name')) ? 'has-error' : '' ?>">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= set_value('name') ?>" class="form-control <?= (validation_show_error('name')) ? 'is-invalid' : '' ?>" placeholder="Please Enter Full Name">
            <?php if (validation_show_error('name')) : ?>
                <span class="error-message"><?= validation_show_error('name') ?></span>
            <?php endif; ?>
        </div>
        <!-- My Kad -->
        <div class="form-group col-md-6 <?= (validation_show_error('myKad')) ? 'has-error' : '' ?>">
            <label for="myKad">My Kad</label>
            <input type="text" name="myKad" id="myKad" value="<?= set_value('myKad') ?>" class="form-control <?= (validation_show_error('myKad')) ? 'is-invalid' : '' ?>" placeholder="1234567890">
            <?php if (validation_show_error('myKad')) : ?>
                <span class="error-message"><?= validation_show_error('myKad') ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-row">
        <!-- Email -->
        <div class="form-group col-md-6 <?= (validation_show_error('gender')) ? 'has-error' : '' ?>">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= set_value('email') ?>" class="form-control <?= (validation_show_error('email')) ? 'is-invalid' : '' ?>" placeholder="example@email.com">
            <?php if (validation_show_error('email')) : ?>
                <span class="error-message"><?= validation_show_error('email') ?></span>
            <?php endif; ?>
        </div>

        <!-- Phone number -->
        <div class="form-group col-md-6 <?= (validation_show_error('phone_number')) ? 'has-error' : '' ?>">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="<?= set_value('phone_number') ?>" class="form-control <?= (validation_show_error('phone_number')) ? 'is-invalid' : '' ?>" placeholder="01234567890">
            <?php if (validation_show_error('phone_number')) : ?>
                <span class="error-message"><?= validation_show_error('phone_number') ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>