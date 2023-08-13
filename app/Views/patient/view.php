<?= $this->extend("template/layout"); ?>

<?= $this->section("content"); ?>

<!-- utk view specific patient -->

<?php if (!empty($patient) && is_array($patient)) : ?>

    <?php foreach ($patient as $patient_details) : ?>

        <img src="<?= esc($patient_details['avatar']) ?>" alt="avatar">

        <!-- terpulang nk buat pakai table ke x, better rujuk bootstrap -->
        <table>
            <tr>
                <td>Name</td>
                <td><?= esc($patient_details['name']) ?></td>
            </tr>

            <tr>
                <td>Gender</td>
                <td><?= esc($patient_details['gender']) ?></td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td><?= esc($patient_details['phone_number']) ?></td>
            </tr>

            <tr>
                <td>Address</td>
                <td><?= esc($patient_details['address']) ?></td>
            </tr>
        </table>

    <?php endforeach ?>

<?php else : ?>

    <h3>No patient found</h3>

    <p>Unable to find patient with id <b><?= esc($id) ?></b></p>

<?php endif ?>

<?= $this->endSection(); ?>