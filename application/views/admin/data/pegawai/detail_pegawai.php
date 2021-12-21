 <section class="content-header">
     <div class="container-fluid">
         <div class="d-sm-flex align-items-center justify-content-between ">
             <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
         </div>
     </div>
 </section>

 <section class="content">
     <div class="row d-flex justify-content-center">
         <div class="col-md-10">
             <div class="card p-3 mb-5shadow-sm p-3 mb-5 bg-white rounded">
                 <div class="card-body">
                     <div class="media">
                         <img src="<?= base_url() ?>assets/img/profile/<?= $user['foto'] ?>" width="35%" class="align-self-center border border-dark mr-5">
                         <div class="media-body">
                             <div class="form-group">
                                 <label for="nama_pegawai">Nama Pegawai</label>
                                 <input type="text" class="form-control" id="nama_pegawai" value="<?= $detail['nama_pegawai'] ?>" disabled>
                             </div>
                             <div class="form-group">
                                 <label for="jabatan">Jabatan</label>
                                 <input type="text" class="form-control" id="jabatan" value="<?= $detail['nama_jabatan'] ?>" disabled>
                             </div>
                             <div class="form-group">
                                 <label for="perusahaan">Perushaan</label>
                                 <input type="text" class="form-control" id="perusahaan" value="<?= $detail['nama_perusahaan'] ?>" disabled>
                             </div>
                             <div class="form-group">
                                 <label for="tanggal">Tanggal Masuk</label>
                                 <input type="text" class="form-control" id="tanggal" value="<?= $detail['tgl_masuk'] ?>" disabled>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>


 </section>