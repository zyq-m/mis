<div class="mt-4">
    <h4>Demographic</h4>

    <div class="form-row">
        <!-- Sex -->
        <div class="form-group col-md-4 <?= (validation_show_error('sex')) ? 'has-error' : '' ?>">
            <label for="sex">Sex</label>
            <select name="sex" id="sex" class="custom-select <?= (validation_show_error('sex')) ? 'is-invalid' : '' ?>">
                <option value="">Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <?php if (validation_show_error('sex')) : ?>
                <span class="error-message"><?= validation_show_error('sex') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Sex -->

        <!-- Race -->
        <div class="form-group col-md-4 <?= (validation_show_error('race')) ? 'has-error' : '' ?>">
            <label for="race">Race</label>
            <select name="race" class="custom-select <?= (validation_show_error('race')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'race', null)">
                <option value="">Choose...</option>
                <option value="Malay">Malay</option>
                <option value="Chinese">Chinese</option>
                <option value="Indian">Indian</option>
                <option value="Others">Others (specify)</option>
            </select>
            <input type="text" name="other_race" id="race" style='display:none;' class="form-control border-top-0 border-left-0 border-right-0" placeholder="Others race" />
            <?php if (validation_show_error('race')) : ?>
                <span class="error-message"><?= validation_show_error('race') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Race -->

        <!-- Educational Status -->
        <div class="form-group col-md-4 <?= (validation_show_error('educational_status')) ? 'has-error' : '' ?>">
            <label for="educational_status">Educational Status</label>
            <select name="educational_status" class="custom-select <?= (validation_show_error('educational_status')) ? 'is-invalid' : '' ?>">
                <option value="Not set">Choose...</option>
                <option value="None">None</option>
                <option value="Non-formal">Non-formal</option>
                <optgroup label="Formal">
                    <option value="Primary">Primary</option>
                    <option value="Secondary">Secondary</option>
                </optgroup>
                <optgroup label="Tertiary">
                    <option value="Sijil">Sijil</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Degree">Degree</option>
                    <option value="Master">Master</option>
                    <option value="PhD">PhD</option>
                </optgroup>
            </select>
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
            <select name="marital_status" class="custom-select <?= (validation_show_error('marital_status')) ? 'is-invalid' : '' ?>">
                <option value="Not set">Choose...</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced/Seperated">Divorced/Seperated</option>
                <option value="Widowed (Spoused died)">Widowed (Spoused died)</option>
            </select>
            <?php if (validation_show_error('marital_status')) : ?>
                <span class="error-message"><?= validation_show_error('marital_status') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Marital Status -->

        <!-- Occupation -->
        <div class="form-group col-md-6 <?= (validation_show_error('occupation')) ? 'has-error' : '' ?>">
            <label for="occupation">Occupation</label>
            <select name="occupation" class="custom-select <?= (validation_show_error('occupation')) ? 'is-invalid' : '' ?>" onchange="checkValue(this.value, 'occupation', null)">
                <option value="Not set">Choose...</option>
                <option value="Not working">Not working</option>
                <option value="Students">Students</option>
                <optgroup label="Government">
                    <option value="Police">Police</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Others">Others (specify)</option>
                </optgroup>
                <option value="Forestry, agriculture">Forestry, agriculture</option>
                <option value="Fishing">Fishing</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Mining">Mining</option>
                <option value="Contruction">Contruction</option>
                <option value="Painting">Painting</option>
                <option value="Textile">Textile</option>
                <option value="Others">Others (specify)</option>
            </select>
            <input type="text" name="other_occupation" id="occupation" class="form-control border-top-0 border-left-0 border-right-0" style="display:none;" placeholder="Others occupation" />
            <?php if (validation_show_error('occupation')) : ?>
                <span class="error-message"><?= validation_show_error('occupation') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Occupation -->
    </div>
</div>