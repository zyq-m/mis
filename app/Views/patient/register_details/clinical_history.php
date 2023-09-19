<div class="mt-4">
    <h4>Clinical History</h4>

    <div class="form-row">
        <!-- Presenting Illness -->
        <div class="form-group col-md-4 <?= (validation_show_error('illness_present')) ? 'has-error' : '' ?>">
            <label for="illness_present">Presenting Illness</label>
            <?= form_dropdown($illness_option['name'], $illness_option['options'], $illness_option['selected'], $illness_option['extra']) ?>
            <input type="text" name="other_illness_present" id="illness_present" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others presenting illness" value="<?= set_value('other_illness_present') ?>" />
            <?php if (validation_show_error('illness_present')) : ?>
                <span class="error-message"><?= validation_show_error('illness_present') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Presenting Illness -->

        <!-- Symptoms of Metastases -->
        <div class="form-group col-md-4 <?= (validation_show_error('metastases_symptom')) ? 'has-error' : '' ?>">
            <label for="metastases_symptom">Symptoms of Metastases</label>
            <?= form_dropdown($symptom_option['name'], $symptom_option['options'], $symptom_option['selected'], $symptom_option['extra']) ?>
            <input type="text" name="other_metastases_symptom" id="metastases_symptom" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others symptom" value=" <?= set_value('other_metastases_symptom') ?>" />
            <input type="number" name="weight_loss" id="weight" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Weight (kg)" value=" <?= set_value('weight') ?>" />
            <?php if (validation_show_error('metastases_symptom')) : ?>
                <span class="error-message"><?= validation_show_error('metastases_symptom') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Symptoms of Metastases -->

        <!-- Medical History -->
        <div class="form-group col-md-4 <?= (validation_show_error('med_history')) ? 'has-error' : '' ?>">
            <label for="med_history">Medical History</label>
            <?= form_dropdown($medical_option['name'], $medical_option['options'], $medical_option['selected'], $medical_option['extra']) ?>
            <input type="text" name="other_med_history" id="med_history" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others medical history" value="<?= set_value('other_med_history') ?>" />
            <input type="text" name="stage" id="stage" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Specify stage" value="<?= set_value('stage') ?>" />
            <?php if (validation_show_error('med_history')) : ?>
                <span class="error-message"><?= validation_show_error('med_history') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Medical History -->
    </div>
</div>