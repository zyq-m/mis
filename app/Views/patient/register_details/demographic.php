<div class="mt-4">
    <h4>Demographic</h4>

    <div class="form-row">
        <!-- Sex -->
        <div class="form-group col-md-4 <?= (validation_show_error('sex')) ? 'has-error' : '' ?>">
            <label for="sex">Sex</label>
            <?= form_dropdown($sex_option['name'], $sex_option['options'], $sex_option['selected'], $sex_option['extra']) ?>
            <?php if (validation_show_error('sex')) : ?>
                <span class="error-message"><?= validation_show_error('sex') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Sex -->

        <!-- Race -->
        <div class="form-group col-md-4 <?= (validation_show_error('race')) ? 'has-error' : '' ?>">
            <label for="race">Race</label>
            <?= form_dropdown($race_option['name'], $race_option['options'], $race_option['selected'], $race_option['extra']) ?>
            <input type="text" name="other_race" id="race" style='display:none;' class="form-control border-top-0 border-left-0 border-right-0" placeholder="Others race" value="<?= set_value('other_race') ?>" />
            <?php if (validation_show_error('race')) : ?>
                <span class="error-message"><?= validation_show_error('race') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Race -->

        <!-- Educational Status -->
        <div class="form-group col-md-4 <?= (validation_show_error('educational_status')) ? 'has-error' : '' ?>">
            <label for="educational_status">Educational Status</label>
            <?= form_dropdown($educational_option['name'], $educational_option['options'], $educational_option['selected'], $educational_option['extra']) ?>
            <?php if (validation_show_error('educational_status')) : ?>
                <span class="error-message"><?= validation_show_error('educational_status') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Educational Status -->
    </div>

    <div class="form-row">
        <!-- Marital Status -->
        <div class="form-group col-md-6 <?= (validation_show_error('marital_status')) ? 'has-error' : '' ?>">
            <label for="marital_status">Marital Status</label>
            <?= form_dropdown($marital_option['name'], $marital_option['options'], $marital_option['selected'], $marital_option['extra']) ?>
            <?php if (validation_show_error('marital_status')) : ?>
                <span class="error-message"><?= validation_show_error('marital_status') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Marital Status -->

        <!-- Occupation -->
        <div class="form-group col-md-6 <?= (validation_show_error('occupation')) ? 'has-error' : '' ?>">
            <label for="occupation">Occupation</label>
            <?= form_dropdown($occupation_option['name'], $occupation_option['options'], $occupation_option['selected'], $occupation_option['extra']) ?>
            <input type="text" name="other_occupation" id="occupation" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others occupation" value="<?= set_value('other_occupation',) ?>" />
            <?php if (validation_show_error('occupation')) : ?>
                <span class="error-message"><?= validation_show_error('occupation') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Occupation -->
    </div>
</div>