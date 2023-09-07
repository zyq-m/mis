<div class="mt-4">
    <h4>Clinical History</h4>

    <div class="form-row">
        <!-- Presenting Illness -->
        <div class="form-group col-md-4 <?= (validation_show_error('illness_present')) ? 'has-error' : '' ?>">
            <label for="illness_present">Presenting Illness</label>
            <select name="illness_present" class="form-control <?= (validation_show_error('illness_present')) ? 'is-invalid' : '' ?>">
                <option>Choose...</option>
                <option value="Lump">Lump</option>
                <option value="Pain">Pain</option>
                <option value="Nipple discharge">Nipple discharge</option>
                <option value="Asymptomatic">Asymptomatic</option>
                <option value="Others">Others (specify)</option>
            </select>
            <input type="text" name="illness_present" id="illness_present" style='display:none;' />
            <?php if (validation_show_error('illness_present')) : ?>
                <span class="error-message"><?= validation_show_error('illness_present') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Presenting Illness -->

        <!-- Symptoms of Metastases -->
        <div class="form-group col-md-4 <?= (validation_show_error('metastases_symptom')) ? 'has-error' : '' ?>">
            <label for="metastases_symptom">Symptoms of Metastases</label>
            <select name="metastases_symptom" class="form-control <?= (validation_show_error('metastases_symptom')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'mestastases', 'weight')">
                <option>Choose...</option>
                <option value="Shortness of breath">Shortness of breath</option>
                <optgroup label="Lost of weight">
                    <option value="weight">Weight loss (kg)</option>
                </optgroup>
                <option value="Jaudice">Jaudice</option>
                <option value="Headache">Headache</option>
                <option value="Bone pain">Bone pain</option>
                <option value="Others">Others</option>
            </select>
            <input type="text" name="metastases_symptom" id="metastases_symptom" style='display:none;' />
            <input type="text" name="metastases_symptom" id="weight" style='display:none;' />
            <?php if (validation_show_error('metastases_symptom')) : ?>
                <span class="error-message"><?= validation_show_error('metastases_symptom') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Symptoms of Metastases -->

        <!-- Medical History -->
        <div class="form-group col-md-4 <?= (validation_show_error('med_history')) ? 'has-error' : '' ?>">
            <label for="med_history">Medical History</label>
            <select name="med_history" class="form-control <?= (validation_show_error('med_history')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'med_history', 'stage')">
                <option>Choose...</option>
                <option value="Hypertension">Hypertension</option>
                <option value="Diabetes mellitus">Diabetes mellitus</option>
                <option value="Hyperlipidaemia">Hyperlipidaemia</option>
                <optgroup label="Chronic kidney disease">
                    <option value="Stage">Stage</option>
                </optgroup>
                <option value="Others">Others (specify)</option>
                <option value="Students">Students</option>
                <optgroup label="Government">
                    <option value="Police">Police</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Others">Others (specify)</option>
                </optgroup>
            </select>
            <input type="text" name="med_history" id="med_history" style='display:none;' />
            <input type="text" name="med_history" id="stage" style='display:none;' />
            <?php if (validation_show_error('med_history')) : ?>
                <span class="error-message"><?= validation_show_error('med_history') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Medical History -->
    </div>
</div>