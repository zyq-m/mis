<div class="mt-4">
    <h4>Clinical History</h4>

    <div class="form-row">
        <!-- Presenting Illness -->
        <div class="form-group col-md-4 <?= (validation_show_error('illness_present')) ? 'has-error' : '' ?>">
            <label for="illness_present">Presenting Illness</label>
            <select name="illness_present" class="custom-select <?= (validation_show_error('illness_present')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'illness_present')">
                <option value="Not set" <?= set_select('illness_present', 'Not set') ?>>Choose...</option>
                <option value="Lump" <?= set_select('illness_present', 'Lump') ?>>Lump</option>
                <option value="Pain" <?= set_select('illness_present', 'Pain') ?>>Pain</option>
                <option value="Nipple discharge" <?= set_select('illness_present', 'Nipple discharge') ?>>Nipple discharge</option>
                <option value="Asymptomatic" <?= set_select('illness_present', 'Asymptomatic') ?>>Asymptomatic</option>
                <option value="Others" <?= set_select('illness_present', 'Others') ?>>Others (specify)</option>
            </select>
            <input type="text" name="other_illness_present" id="illness_present" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others presenting illness" value="<?= set_value('other_illness_present') ?>" />
            <?php if (validation_show_error('illness_present')) : ?>
                <span class="error-message"><?= validation_show_error('illness_present') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Presenting Illness -->

        <!-- Symptoms of Metastases -->
        <div class="form-group col-md-4 <?= (validation_show_error('metastases_symptom')) ? 'has-error' : '' ?>">
            <label for="metastases_symptom">Symptoms of Metastases</label>
            <select name="metastases_symptom" class="custom-select <?= (validation_show_error('metastases_symptom')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'metastases_symptom', 'weight')">
                <option value="Not set" <?= set_select('metastases_symptom', 'Not set') ?>>Choose...</option>
                <option value="Shortness of breath" <?= set_select('metastases_symptom', 'Shortness of breath') ?>>Shortness of breath</option>
                <optgroup label="Lost of weight">
                    <option value="weight" <?= set_select('metastases_symptom', 'weight') ?>>Weight loss (kg)</option>
                </optgroup>
                <option value="Jaudice" <?= set_select('metastases_symptom', 'Jaudice') ?>>Jaudice</option>
                <option value="Headache" <?= set_select('metastases_symptom', 'Headache') ?>>Headache</option>
                <option value="Bone pain" <?= set_select('metastases_symptom', 'Bone pain') ?>>Bone pain</option>
                <option value="Others" <?= set_select('metastases_symptom', 'Others') ?>>Others (specify)</option>
            </select>
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
            <select name="med_history" class="custom-select <?= (validation_show_error('med_history')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'med_history', 'stage')">
                <option value="Not set" <?= set_select('med_history', 'Not set') ?>>Choose...</option>
                <option value="Hypertension" <?= set_select('med_history', 'Hypertension') ?>>Hypertension</option>
                <option value="Diabetes mellitus" <?= set_select('med_history', 'Diabetes mellitus') ?>>Diabetes mellitus</option>
                <option value="Hyperlipidaemia" <?= set_select('med_history', 'Hyperlipidaemia') ?>>Hyperlipidaemia</option>
                <optgroup label="Chronic kidney disease">
                    <option value="stage" <?= set_select('med_history', 'stage') ?>>Stage</option>
                </optgroup>
                <option value="Others" <?= set_select('med_history', 'Others') ?>>Others (specify)</option>
            </select>
            <input type="text" name="other_med_history" id="med_history" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others medical history" value="<?= set_value('other_med_history') ?>" />
            <input type="text" name="stage" id="stage" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Specify stage" value="<?= set_value('stage') ?>" />
            <?php if (validation_show_error('med_history')) : ?>
                <span class="error-message"><?= validation_show_error('med_history') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Medical History -->
    </div>
</div>