<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='<?= base_url(); ?>/assets/img/icon/favicon.ico' rel='shortcut icon'>
    <title><?= $judul; ?></title>

    <!-- Google Font: Source Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">

    <!-- SWEET ALERT -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="login-box mt-5">
                <!-- /.login-logo -->
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                <div class="card card-outline card-info pt-3 pb-4 mt-4">
                    <div class="card-header text-center mb-4">
                        <h3 class="text-dark"><b>Login Gaji-App</b></h3>
                    </div>

                    <div class=" card-body">
                        <?php if ($this->session->flashdata('error')) :  ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> <?= $this->session->flashdata('error'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url() ?>auth">
                            <div class="mb-3">
                                <div class="input-group <?= (form_error('username')) ? 'is-invalid' : '' ?>">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <span class="fas fa-user"></span></span>
                                    </div>
                                    <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= set_value('username') ?>" name="username" autocomplete="off" autofocus>
                                </div>
                                <div class="invalid-feedback">
                                    <?= form_error('username') ?>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="input-group <?= (form_error('password')) ? 'is-invalid' : '' ?>">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <span class="fas fa-lock"></span></span>
                                    </div>
                                    <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : '' ?>" placeholder="Password" name="password" autocomplete="off">
                                </div>
                                <div class="invalid-feedback">
                                    <?= form_error('password') ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-block mt-4">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            // Flashdata
            const flashData = $('.flash-data').data('flashdata');
            if (flashData) {
                Swal.fire({
                    title: 'Success',
                    text: 'Berhasil ' + flashData,
                    icon: 'success'
                });
            }
        });
    </script>
</body>

</html>