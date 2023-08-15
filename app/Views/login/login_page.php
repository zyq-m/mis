<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mammogram Information System</title>
    <link href="<?= base_url(); ?>assets/images/pink-ribbon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/backend/images/favicons.ico">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/backend/plugins/iCheck/square/blue.css">

    <style type="text/css">
        body {
            padding-inline: 1rem;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-box-body {
            width: 38rem;
            max-width: 100%;
            margin-inline: auto;
        }
    </style>
</head>
<?php
$validation = \Config\Services::validation();
helper('form');
?>

<body class="hold-transition login-page">
    <div class="login-container">
        <div class="login-logo">
            <img src="<?= base_url(); ?>assets/images/pink-ribbon.png" width="50%" />
            <h3>Mammogram Information System </h3>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Log in to start your session</p>

            <!-- Error message -->
            <?php if (session('error') !== null) : ?>
                <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= $error ?>
                            <br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= session('errors') ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <form action="<?= base_url('login') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Email -->
                <div class="form-group has-feedback <?php if (validation_show_error('email')) : ?>has-error<?php endif; ?>">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <!-- Password -->
                <div class="form-group has-feedback <?php if (validation_show_error('password')) : ?>has-error<?php endif; ?>">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <!-- Remember me -->
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label for="remember">
                                <input type="checkbox" id="remember" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-block btn-flat bg-pink" style="background-color: #e83e8c!important; color: #fff;">Log in</button>
                    </div>
                    <!-- /.col -->
                </div>

            </form>


        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url(); ?>assets/backend/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url(); ?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url(); ?>assets/backend/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>