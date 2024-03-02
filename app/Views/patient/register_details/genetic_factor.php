<div class="mt-4">
    <h4>Genetic Factor</h4>

    <div class="form-row">
        <!-- Family History -->
        <div class="form-group col <?= (validation_show_error('family_history')) ? 'has-error' : '' ?>">
            <label for="family_history">Family History</label>
            <?= form_dropdown($family_option['name'], $family_option['options'], $family_option['selected'], $family_option['extra']) ?>
            <?php if (validation_show_error('family_history')) : ?>
                <span class="error-message"><?= validation_show_error('family_history') ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group col" id="family_history" style="display:none;">
            <label for="other_family_history">Other Family History</label>
            <input type="text" name="other_family_history" id="family_history" class="form-control" placeholder="Others Family History" value="<?= set_value('other_family_history') ?>" />
        </div>
        <!-- End Family History -->

        <!-- Past Cancer History -->
        <div class="form-group col <?= (validation_show_error('past_cancer_history')) ? 'has-error' : '' ?>">
            <label for="past_cancer_history">Past Cancer History</label>
            <?= form_dropdown($past_option['name'], $past_option['options'], $past_option['selected'], $past_option['extra']) ?>
            <input type="text" name="other_past_cancer_history" id="past_cancer_history" class="form-control" style="display:none;" placeholder="Others symptom" value=" <?= set_value('other_past_cancer_history') ?>" />
            <input type="number" name="weight_loss" id="weight" class="form-control" style="display:none;" placeholder="Weight (kg)" value=" <?= set_value('weight') ?>" />
            <?php if (validation_show_error('past_cancer_history')) : ?>
                <span class="error-message"><?= validation_show_error('past_cancer_history') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Past Cancer History -->
    </div>

    <div id="Yes" class="form-row" style="display: none;">
        <!-- Date of diagnose -->
        <div class="form-group col-md-6 <?= (validation_show_error('date')) ? 'has-error' : '' ?>">
            <label for="date">Date of diagnose</label>
            <?= form_input(['name' => 'date', 'type' => 'date', 'id' => 'date', 'class' => 'form-control', 'value' => set_value('date')]) ?>
            <?php if (validation_show_error('date')) : ?>
                <span class="error-message"><?= validation_show_error('date') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Date of diagnose -->

        <!-- Hospital diagnose -->
        <div class="form-group col-md-6 <?= (validation_show_error('diagnose')) ? 'has-error' : '' ?>">
            <label for="diagnose">Hospital diagnose with</label>
            <?= form_input(['name' => 'diagnose', 'id' => 'diagnose', 'class' => 'form-control', 'value' => set_value('diagnose')]) ?>
            <?php if (validation_show_error('diagnose')) : ?>
                <span class="error-message"><?= validation_show_error('diagnose') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Hospital diagnose -->
    </div>
</div>