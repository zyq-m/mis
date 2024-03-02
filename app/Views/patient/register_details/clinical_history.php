<div class="mt-4">
    <h4>Clinical History</h4>

    <div class="form-row">
        <!-- Presenting Illness -->
        <div class="form-group col-md-4 <?= (validation_show_error('illness_present')) ? 'has-error' : '' ?>">
            <label for="illness_present">Presenting Illness</label>
            <?= form_dropdown($illness_option['name'], $illness_option['options'], $illness_option['selected'], $illness_option['extra']) ?>
            <?php if (validation_show_error('illness_present')) : ?>
                <span class="error-message"><?= validation_show_error('illness_present') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Presenting Illness -->

        <!-- Symptoms of Metastases -->
        <div class="form-group col-md-4 <?= (validation_show_error('metastases_symptom')) ? 'has-error' : '' ?>">
            <label for="metastases_symptom">Symptoms of Metastases</label>
            <?= form_dropdown($symptom_option['name'], $symptom_option['options'], $symptom_option['selected'], $symptom_option['extra']) ?>
            <?php if (validation_show_error('metastases_symptom')) : ?>
                <span class="error-message"><?= validation_show_error('metastases_symptom') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Symptoms of Metastases -->

        <!-- Medical History -->
        <div class="form-group col-md-4 <?= (validation_show_error('med_history')) ? 'has-error' : '' ?>">
            <label for="med_history">Medical History</label>
            <?= form_dropdown($medical_option['name'], $medical_option['options'], $medical_option['selected'], $medical_option['extra']) ?>
            <?php if (validation_show_error('med_history')) : ?>
                <span class="error-message"><?= validation_show_error('med_history') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Medical History -->
    </div>

    <div class="form-row">
        <div class="form-group col" id="illness_present" style="display:none;">
            <label for="other_illness_present">Other Presenting Illness</label>
            <input type="text" name="other_illness_present" class="form-control" placeholder="Others presenting illness" value="<?= set_value('other_illness_present') ?>" />
        </div>

        <div class="form-group col" id="metastases_symptoms" style="display:none;">
            <label for="other_metastases_symptom">Other Metastases Symptom</label>
            <input type="text" name="other_metastases_symptom" class="form-control" placeholder="Others symptom" value=" <?= set_value('other_metastases_symptom') ?>" />
        </div>

        <div class="form-group col" id="weight" style="display:none;">
            <label for="weight_loss">Weight Lost</label>
            <input type="number" name="weight_loss" class="form-control" placeholder="Weight (kg)" value=" <?= set_value('weight') ?>" />
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col" id="med_history" style="display:none;">
            <label for="weight_loss">Other Medical History</label>
            <input type="text" name="other_med_history" class="form-control" placeholder="Others medical history" value="<?= set_value('other_med_history') ?>" />
        </div>
        <div class="form-group col" id="stage" style="display:none;">
            <label for="weight_loss">Stage</label>
            <input type="text" name="stage" class="form-control" placeholder="Specify stage" value="<?= set_value('stage') ?>" />
        </div>
    </div>
</div>