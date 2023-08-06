<?= $this->extend("layout/mainpage") ?>

<?= $this->section("pageTitle") ?>
<?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="ui four column centered grid" style="width: 1000vh;">

  <form action="<?= url_to('login') ?>" method="post" class="middle aligned column">
    <?= csrf_field() ?>
    <h1>Login</h1>
    <div>Please insert your account detail:</div>
    <div>
      <div class="ui labeled input fluid" style="margin-top: 10px;">
        <div class="ui black label">
          <i class="mail icon"></i>
        </div>
        <input type="text" id="email" name="email" placeholder="Please enter email *">
      </div>
    </div>
    <div style="margin-top: 10px; margin-bottom: 10px;">
      <div class="ui labeled input fluid">
        <div class="ui black label">
          <i class="lock icon"></i>
        </div>
        <input type="password" id="password" name="password" placeholder="Enter password *">
      </div>
    </div>
    <div class="ui column centered grid">
      <div style="margin-top: 10px;">
        <button type="button" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">Forgot Password?</button>
        <a href="<?= url_to('register') ?>" class="ui black button flat no-caps" style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">Create New Account</a>
      </div>
      <div style="margin-top: 10px;">
        <button type="submit" class="ui black button flat no-caps">Login</button>
      </div>
  </form>
</div>

<div class="middle aligned column">
</div>

<div class="middle aligned column">
  <h1>Memogram Information System(MIS)</h1>
</div>

</div>

<script>
  // Custom JavaScript functions here, including the submitRegistration() function
  function submitRegistration() {
    // Implement the registration form submission
  }
</script>

<?= $this->endSection() ?>