<?php if (!empty($patient['urine_test'])) : ?>
    <div class="row mt-4 gap-4">
        <?php foreach ($patient['urine_test'] as $patient_details) : ?>
            <div class="col-md-4 table-responsive-sm">
                <table class="table table-bordered">
                    <tr>
                        <td scope="row">Blood</td>
                        <td class="text-center"><?= $patient_details['blood'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Bilirubin</td>
                        <td class="text-center"><?= $patient_details['bilirubin'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Keton</td>
                        <td class="text-center"><?= $patient_details['keton'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Protein</td>
                        <td class="text-center"><?= $patient_details['protein'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Nitrit</td>
                        <td class="text-center"><?= $patient_details['nitrit'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Glucose</td>
                        <td class="text-center"><?= $patient_details['glucose'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">pH</td>
                        <td class="text-center"><?= $patient_details['pH'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Specific Gravity</td>
                        <td class="text-center"><?= $patient_details['s_gravity'] ?></td>
                    </tr>
                    <tr>
                        <td scope="row">Leukocytes</td>
                        <td class="text-center"><?= $patient_details['leukocytes'] ?></td>
                    </tr>
                </table>

                <div class="row justify-content-end">
                    <div class="col-sm-auto font-weight-bold">Date of Test</div>
                    <div class="col-sm-auto"><?= $patient_details['test_taken'] ?></div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-auto font-weight-bold">Date of Result</div>
                    <div class="col-sm-auto"><?= $patient_details['test_result'] ?></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <div>
        <div>No record found. Click <a href="<?= base_url('urine_test/patient?patient=' . $patient['profile'][0]['myKad']) ?>">here</a> to add.</div>
    </div>
<?php endif ?>