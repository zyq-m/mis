<?= $this->extend("template/layout"); ?>

<?= $this->section("content"); ?>

<!-- utk view specific patient -->

<?php if (!empty($patient) && is_array($patient)) : ?>

    <?php foreach ($patient as $patient_details) : ?>

        <img src="<?= esc($patient_details['avatar']) ?>" alt="avatar" class="mx-auto d-block" style="max-width: 300px;">

        <br>

        <!-- terpulang nk buat pakai table ke x, better rujuk bootstrap -->
        <table class="table table-striped table-bordered table-sm">
            <tr>
                <th>Name</th>
                <td><?= esc($patient_details['name']) ?></td>
            </tr>

            <tr>
                <th>Gender</th>
                <td><?= esc($patient_details['gender']) ?></td>
            </tr>

            <tr>
                <th>IC No.</th>
                <td><?= esc($patient_details['ic_no']) ?></td>
            </tr>

            <tr>
                <th>Date of Birth</th>
                <td>12/12/2001</td>
            </tr>

            <tr>
                <th>Age</th>
                <td>22 years-old</td>
            </tr>

            <tr>
                <th>Phone No.</th>
                <td><?= esc($patient_details['phone_number']) ?></td>
            </tr>

            <tr>
                <th>Address</th>
                <td><?= esc($patient_details['address']) ?></td>
            </tr>
        </table>

    <?php endforeach ?>

<?php else : ?>

    <h3>No patient found</h3>

    <p>Unable to find patient with id <b><?= esc($id) ?></b></p>

<?php endif ?>

<?= $this->endSection(); ?>