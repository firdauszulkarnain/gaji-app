 <section class="content-header">
     <div class="container-fluid">
         <div class="d-sm-flex align-items-center justify-content-between ">
             <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
         </div>
     </div>
 </section>

 <section class="content">
     <div class="row">
         <div class="col-md-6">
             <div class="card mb-5">
                 <div class="card-body">
                     <form action="" method="POST" class="mt-3">
                         <div class="form-group">
                             <label for="nama_perusahaan" class="text-dark font-weight-bold">Nama Perusahaan</label>
                             <input type="text" class="form-control" name="nama_perusahaan" value="<?= $detail['nama_perusahaan']  ?>" autocomplete="off">
                         </div>
                         <div class="form-group">
                             <label for="alamat" class="text-dark font-weight-bold">Alamat Perusahaan</label>
                             <textarea type="text" class="form-control" rows="5" id="alamat" name="alamat" autocomplete="off"><?= $detail['alamat']  ?></textarea>
                         </div>
                         <div class="form-group">
                             <label for="jam_masuk" class="text-dark font-weight-bold">Jam Masuk</label>
                             <input type="time" class="form-control" name="jam_masuk" value="<?= $detail['jam_masuk']  ?>" autocomplete="off">
                         </div>
                         <div class="form-group">
                             <label for="jam_pulang" class="text-dark font-weight-bold">Jam Pulang</label>
                             <input type="time" class="form-control" name="jam_pulang" value="<?= $detail['jam_pulang']  ?>" autocomplete="off">
                         </div>
                         <button type="submit" class="btn btn-dark mt-3">Simpan Data Perusahaan</button>
                     </form>
                 </div>
             </div>
         </div>
         <div class="col-md-6">
             <div class="card">
                 <div class="card-body">
                     <table class="table table-striped table-bordered" id="mytabel">
                         <thead>
                             <tr class="text-center">
                                 <th>No</th>
                                 <th>Nama Jabatan</th>
                                 <th>Jumlah Pegawai</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($jabatan as $jb) : ?>
                                 <tr>
                                     <td></td>
                                     <td><?= $jb['nama_jabatan'] ?></td>
                                     <td><?= $jb['jumlah'] ?> Pegawai</td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </section>