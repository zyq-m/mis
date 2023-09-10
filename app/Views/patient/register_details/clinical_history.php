<div class="mt-4">
    <h4>Clinical History</h4>

    <div class="form-row">
        <!-- Presenting Illness -->
        <div class="form-group col-md-4 <?= (validation_show_error('illness_present')) ? 'has-error' : '' ?>">
            <label for="illness_present">Presenting Illness</label>
            <select name="illness_present" class="custom-select <?= (validation_show_error('illness_present')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'illness_present')">
                <option>Choose...</option>
                <option value="Lump">Lump</option>
                <option value="Pain">Pain</option>
                <option value="Nipple discharge">Nipple discharge</option>
                <option value="Asymptomatic">Asymptomatic</option>
                <option value="Others">Others (specify)</option>
            </select>
            <input type="text" name="illness_present" id="illness_present" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others presenting illness" />
            <?php if (validation_show_error('illness_present')) : ?>
                <span class="error-message"><?= validation_show_error('illness_present') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Presenting Illness -->

        <!-- Symptoms of Metastases -->
        <div class="form-group col-md-4 <?= (validation_show_error('metastases_symptom')) ? 'has-error' : '' ?>">
            <label for="metastases_symptom">Symptoms of Metastases</label>
            <select name="metastases_symptom" class="custom-select <?= (validation_show_error('metastases_symptom')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'metastases_symptom', 'weight')">
                <option>Choose...</option>
                <option value="Shortness of breath">Shortness of breath</option>
                <optgroup label="Lost of weight">
                    <option value="weight">Weight loss (kg)</option>
                </optgroup>
                <option value="Jaudice">Jaudice</option>
                <option value="Headache">Headache</option>
                <option value="Bone pain">Bone pain</option>
                <option value="Others">Others (specify)</option>
            </select>
            <input type="text" name="metastases_symptom" id="metastases_symptom" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others symptom" />
            <input type="number" name="metastases_symptom" id="weight" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Weight (kg)" />
            <?php if (validation_show_error('metastases_symptom')) : ?>
                <span class="error-message"><?= validation_show_error('metastases_symptom') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Symptoms of Metastases -->

        <!-- Medical History -->
        <div class="form-group col-md-4 <?= (validation_show_error('med_history')) ? 'has-error' : '' ?>">
            <label for="med_history">Medical History</label>
            <select name="med_history" class="custom-select <?= (validation_show_error('med_history')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'med_history', 'stage')">
                <option>Choose...</option>
                <option value="Hypertension">Hypertension</option>
                <option value="Diabetes mellitus">Diabetes mellitus</option>
                <option value="Hyperlipidaemia">Hyperlipidaemia</option>
                <optgroup label="Chronic kidney disease">
                    <option value="stage">Stage</option>
                </optgroup>
                <option value="Others">Others (specify)</option>
            </select>
            <input type="text" name="med_history" id="med_history" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others medical history" />
            <input type="text" name="med_history" id="stage" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Specify stage" />
            <?php if (validation_show_error('med_history')) : ?>
                <span class="error-message"><?= validation_show_error('med_history') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Medical History -->
    </div>
</div>