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
        <!-- End Family History -->

        <!-- Past Cancer History -->
        <div class="form-group col <?= (validation_show_error('past_cancer_history')) ? 'has-error' : '' ?>">
            <label for="past_cancer_history">Past Cancer History</label>
            <?= form_dropdown($past_option['name'], $past_option['options'], $past_option['selected'], $past_option['extra']) ?>
            <?php if (validation_show_error('past_cancer_history')) : ?>
                <span class="error-message"><?= validation_show_error('past_cancer_history') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Past Cancer History -->
    </div>

    <div id="past_cancer_history_extend" class="form-row" style="display: none;">
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

    <div id="family_history_extend" class="form-row" style="display: none;">
        <!-- Parental -->
        <div class="form-group col-md-6 <?= (validation_show_error('date')) ? 'has-error' : '' ?>">
            <label for="date">Parental</label>
            <?= form_dropdown($parental_option['name'], $parental_option['options'], $parental_option['selected'], $parental_option['extra']) ?>
            <?php if (validation_show_error('parental')) : ?>
                <span class="error-message"><?= validation_show_error('parental') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Parental -->

        <!-- Disease -->
        <div class="form-group col-md-6 <?= (validation_show_error('date')) ? 'has-error' : '' ?>">
            <label for="date">Disease</label>
            <?= form_dropdown($disease_option['name'], $disease_option['options'], $disease_option['selected'], $disease_option['extra']) ?>
            <?php if (validation_show_error('disease')) : ?>
                <span class="error-message"><?= validation_show_error('disease') ?></span>
            <?php endif; ?>
        </div>
        <!-- End Disease -->
    </div>
</div>


<!-- THIS LINE OF CODE NEED TO BE REFACTOR!! -->
<script>
    const familyHistory = document.getElementById('family_history');
    const extendedHistory = document.getElementById('family_history_extend');

    const pastCancer = document.getElementById('past_cancer_history');
    const extendedPastCancer = document.getElementById('past_cancer_history_extend');

    function hideForm(parent, child) {
        parent.addEventListener('change', (e) => {
            if (e.target.value === "Yes") {
                child.style.display = 'flex';
            } else {
                child.style.display = 'none';
            }
        });
    }

    hideForm(familyHistory, extendedHistory);
    hideForm(pastCancer, extendedPastCancer);
</script>