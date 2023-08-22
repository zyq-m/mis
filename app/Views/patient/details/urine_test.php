<div class="row">
    <?php foreach ($patient['urine_test'] as $patient_details) : ?>
        <div class="col-md-4 mt-4 table-responsive-sm">
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
                <div class="col-md-auto font-weight-bold">Date of Test</div>
                <div class="col-md-auto"><?= $patient_details['test_taken'] ?></div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-auto font-weight-bold">Date of Result</div>
                <div class="col-md-auto"><?= $patient_details['test_result'] ?></div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<!-- {
"id": "6",
"descriptions": "",
"blood": "1",
"bilirubin": "1",
"urobilinogen": "1",
"keton": "1",
"protein": "1",
"nitrit": "1",
"glucose": "1",
"pH": "1",
"s_gravity": "1",
"leukocytes": "1",
"test_taken": "2023-08-22",
"test_result": "2023-08-22",
"patient_id": "2",
"time_stamp": "2023-08-22 00:26:35"
}, -->