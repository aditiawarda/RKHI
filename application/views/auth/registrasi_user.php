<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>RKHI | Register</title>

</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b class="primary-color">Rumah Konsultasi Hukum Islam</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg text-bold"> Registrasi User Baru</p>
            <?php echo $message; ?>
            <?php
            echo form_open('admin/auth/register');
            ?>
            <div class="row form-group">
                <div class="col-lg-6">
                    <?php echo form_error('first_name') ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama Depan">
                        <span class="glyphicon  glyphicon-user form-control-feedback"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php echo form_error('last_name') ?>
                    <div class="input-group">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nama Belakang">
                        <span class="glyphicon  glyphicon-user form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <?php echo form_error('username') ?>
            <div class="form-group has-feedback">
                <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna" />
                <span class="glyphicon  glyphicon-user form-control-feedback"></span>
            </div>
            <?php echo form_error('company') ?>
            <div class="form-group has-feedback">
                <input type="text" name="company" id="company" class="form-control" placeholder="Nama Perusahaan" />
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <?php echo form_error('email') ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
                <span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
            </div>
            <?php echo form_error('password') ?>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <?php echo form_error('password_confirm') ?>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Ulangi Password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="col-xs-8">

            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                <?= anchor('admin/Auth', 'Batal', array('class' => 'btn btn-danger')) ?>
            </div>
            <?php echo form_close(); ?>
            <div class="row">
                <div class="col-xs-8">
                    <a href="login">
                        << Back To Login</a> </div> </div> </div> <!-- /.login-box-body -->
                </div><!-- /.login-box -->

</body>

</html>