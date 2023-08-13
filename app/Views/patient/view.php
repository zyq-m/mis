<?= $this->extend("template/layout"); ?>

<?= $this->section("content"); ?>

<?php if (!empty($patient) && is_array($patient)) : ?>

    <?php foreach ($patient as $patient_details) : ?>

        <img src="<?= esc($patient_details['avatar']) ?>" alt="avatar">

        <table>
            <tr>
                <td>Name</td>
                <td>Gender</td>
                <td>Phone Number</td>
                <td>Address</td>
            </tr>
            <tr>
                <td><?= esc($patient_details['name']) ?></td>
                <td><?= esc($patient_details['gender']) ?></td>
                <td><?= esc($patient_details['phone_number']) ?></td>
                <td><?= esc($patient_details['address']) ?></td>
            </tr>
        </table>

    <?php endforeach ?>

<?php else : ?>

    <h3>No patient found</h3>

    <p>Unable to find patient with id <b><?= esc($id) ?></b></p>

<?php endif ?>

<?= $this->endSection(); ?>