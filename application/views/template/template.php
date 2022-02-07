<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='<?= base_url(); ?>/assets/img/icon/favicon.ico' rel='shortcut icon'>
    <title>GAJI-APP | <?= $title; ?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">

    <!-- DATATABLE -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SELECTPICKER -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select/bootstrap-select.css">
    <!-- DATEPICKER -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker/bootstrap-datepicker.css">

    <!-- CKEDITOR -->
    <script src="//cdn.ckeditor.com/4.17.1/basic/ckeditor.js"></script>
    <style>
        .mycontent-left {
            border-right: 1px solid #acacac;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-n2">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
                        <i class="bg- fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center">
                <span class="brand-text font-weight-bolder">GAJI APP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/img/profile/<?= $user['foto'] ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url() ?>user/profile" class="d-block text-capitalize"><?= $user['username'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if ($user['role_id'] == 1) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>dashboard" class="nav-link  <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == ''  ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">MASTER DATA</li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link  <?= $this->uri->segment(2) == 'perusahaan' || $this->uri->segment(2) == 'jabatan' || $this->uri->segment(2) == 'tambah_perusahaan' || $this->uri->segment(2) == 'update_perusahaan' || $this->uri->segment(2) == 'tambah_jabatan' || $this->uri->segment(2) == 'update_jabatan' ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>data/perusahaan" class="nav-link <?= $this->uri->segment(2) == 'perusahaan'  || $this->uri->segment(2) == 'tambah_perusahaan' || $this->uri->segment(2) == 'update_perusahaan' ? "active" : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Perusahaan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>data/jabatan" class="nav-link  <?= $this->uri->segment(2) == 'jabatan' || $this->uri->segment(2) == 'tambah_jabatan' || $this->uri->segment(2) == 'update_jabatan' ? "active" : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Jabatan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item  ">
                                <a href="<?= base_url() ?>data/pegawai" class="nav-link <?= $this->uri->segment(2) == 'pegawai' || $this->uri->segment(2) == 'detail_kehadiran' ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Data Pegawai
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header mt-3">MAIN</li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>main/bayaran" class="nav-link <?= $this->uri->segment(2) == 'bayaran' || $this->uri->segment(2) == 'detail_bayaran'  ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-money-check-alt"></i>
                                    <p>
                                        Gaji Pegawai
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>main/absensi" class="nav-link <?= $this->uri->segment(2) == 'absensi'  ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-clipboard"></i>
                                    <p>
                                        Absensi Pegawai
                                    </p>
                                </a>
                            </li>
                        <?php else : ?><li class="nav-item">
                                <a href="<?= base_url() ?>pegawai" class="nav-link <?= $this->uri->segment(1) == 'pegawai' && $this->uri->segment(2) == ''   ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header mt-3">MAIN</li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>pegawai/kehadiran" class="nav-link <?= $this->uri->segment(2) == 'kehadiran' || $this->uri->segment(2) == 'tambah_kehadiran' || $this->uri->segment(2) == 'edit_kehadiran' ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-clipboard"></i>
                                    <p>
                                        Data Absensi
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>pegawai/bayaran" class="nav-link <?= $this->uri->segment(2) == 'bayaran' || $this->uri->segment(2) == 'detail_bayaran' ? "active" : "" ?>">
                                    <i class="nav-icon fas fa-money-check-alt"></i>
                                    <p>
                                        Data Gaji
                                    </p>
                                </a>
                            </li>
                        <?php endif ?>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <?= $contens ?>

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>&copy <?= date('Y') ?> Muhammad Firdaus Zulkarnain </strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk keluar dari aplikasi?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DATA TABLE -->
    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>


    <!-- SWEETALERT2 -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- SELECT PICKER -->
    <script src="<?= base_url() ?>assets/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= base_url('assets/js/select/defaults-id_ID.min.js') ?>"></script>

    <!-- JQUERY MASKING UANG -->
    <script src="<?= base_url() ?>assets/js/jquery-mask/jquery.mask.js"></script>

    <!-- DATEPICKER -->
    <script src="<?= base_url() ?>assets/js/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <!-- MYJS -->
    <script src="<?= base_url() ?>assets/js/myjs.js"></script>

    <script>
        $("#perusahaan").change(function() {
            var id = $(this).val();
            var url = "<?= base_url('data/cari_jabatan/') ?>";
            $.ajax({
                type: "post",
                url: url,
                dataType: "html",
                data: "id_perusahaan=" + id,
                success: function(msg) {
                    $("#jabatan").html(msg).selectpicker('refresh');
                    $("#jabatan").selectpicker('refresh');
                }
            });
        });

        $(document).on("click", ".kehadiran", function() {
            var data = $(this).data('id');
            CKEDITOR.instances['report'].setData(data)
        });
    </script>
</body>

</html>