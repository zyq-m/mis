<?= $this->extend('layout/default') ?>

<?= $this->section('pageTitle') ?> Login <?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Login</h1>

<form action="./login" method="post">
    <?= csrf_field() ?>
    <!-- creates a hidden input with a CSRF token that helps protect against some common attacks. -->

    <?= helper('form') ?>
    <!-- load form helper lib -->

    <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
    <br>
    <input type="password" name="password" placeholder="Password" value="<?= set_value('password') ?>">
    <br>
    <button type="submit">Login</button>
</form>

<?= $this->endSection() ?>