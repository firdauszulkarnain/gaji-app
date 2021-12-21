 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1><?= $title ?></h1>
             </div>
             <div class="col-sm-6">
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box">
                 <span class="info-box-icon bg-info elevation-1"> <i class="fas fa-store"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">Cabang Perusahaan</span>
                     <span class="info-box-number">
                         <?php if ($perusahaan < 10) : ?>
                             0<?= $perusahaan ?>
                         <?php else : ?>
                             <?= $perusahaan ?>
                         <?php endif ?>
                     </span>
                 </div>
             </div>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
                 <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-badge"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">Jumlah Jabatan</span>
                     <span class="info-box-number">
                         <?php if ($jabatan < 10) : ?>
                             0<?= $jabatan ?>
                         <?php else : ?>
                             <?= $jabatan ?>
                         <?php endif ?>
                     </span>
                 </div>
             </div>
         </div>
         <div class="clearfix hidden-md-up"></div>

         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
                 <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">Jumlah Pegawai</span>
                     <span class="info-box-number">
                         <?php if ($pegawai < 10) : ?>
                             0<?= $pegawai ?>
                         <?php else : ?>
                             <?= $pegawai ?>
                         <?php endif ?>
                     </span>
                 </div>
             </div>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
             <div class="info-box mb-3">
                 <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard"></i></span>
                 <div class="info-box-content">
                     <span class="info-box-text">Kehadiran (Harian)</span>
                     <span class="info-box-number">
                         <?php if ($hadir < 10) : ?>
                             <div class="h5 mb-0 font-weight-bold text-gray-800">0<?= $hadir ?></div>
                         <?php else : ?>
                             <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hadir ?></div>
                         <?php endif ?>
                     </span>
                 </div>
             </div>
         </div>
     </div>

 </section>
 <!-- /.content -->