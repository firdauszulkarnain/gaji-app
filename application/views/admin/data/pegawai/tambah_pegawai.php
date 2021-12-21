 <section class="content-header">
     <div class="container-fluid">
         <div class="d-sm-flex align-items-center justify-content-between ">
             <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
         </div>
     </div>
 </section>

 <section class="content">
     <div class="row d-flex justify-content-center">
         <div class="col-md-12">
             <div class="card pb-3 mb-5">
                 <div class="card-body px-5">
                     <form action="" method="POST" class="mt-3">
                         <div class="row">
                             <div class="col-md-6 mycontent-left pr-4">
                                 <div class="form-group">
                                     <label for="nik_pegawai" class="text-dark font-weight-bold">NIK Pegawai<span class="text-danger">*</span></label>
                                     <input type="text" class="form-control  <?= (form_error('nik_pegawai')) ? 'is-invalid' : '' ?>" id="nik_pegawai" name="nik_pegawai" value="<?= set_value('nik_pegawai');  ?>" autocomplete="off">
                                     <?= form_error('nik_pegawai', '<small class="form-text text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_pegawai" class="text-dark font-weight-bold">Nama Pegawai<span class="text-danger">*</span></label>
                                     <input type="text" class="form-control  <?= (form_error('nama_pegawai')) ? 'is-invalid' : '' ?>" id="nama_pegawai" name="nama_pegawai" value="<?= set_value('nama_pegawai');  ?>" autocomplete="off">
                                     <?= form_error('nama_pegawai', '<small class="form-text text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="perusahaan" class="text-dark font-weight-bold">Perusahaan<span class="text-danger">*</span></label>
                                     <select class="form-control selectpicker border border-secondary" name="perusahaan" title="Pilih perusahaan" id="perusahaan" data-size="5" data-live-search="true">
                                         <?php foreach ($perusahaan as $pt) : ?>
                                             <option value="<?= $pt['id_perusahaan'] ?>"><?= $pt['nama_perusahaan'] ?></option>
                                         <?php endforeach ?>
                                     </select>
                                     <?= form_error('perusahaan', '<small class="form-text text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="jabatan" class="text-dark font-weight-bold">Jabatan<span class="text-danger">*</span></label>
                                     <select class="form-control selectpicker border border-secondary" id="jabatan" name="jabatan" title="Pilih Jabatan" data-size="5" data-live-search="true">
                                         <option value=""></option>
                                     </select>
                                     <?= form_error('jabatan', '<small class="form-text text-danger">', '</small>'); ?>
                                 </div>

                                 <div class="form-group">
                                     <label for="tgl_masuk" class="text-dark font-weight-bold">Tanggal Masuk<span class="text-danger">*</span></label>
                                     <input type="date" class="form-control  <?= (form_error('tgl_masuk')) ? 'is-invalid' : '' ?>" id="tgl_masuk" name="tgl_masuk" value="<?= set_value('tgl_masuk');  ?>" autocomplete="off">
                                     <?= form_error('tgl_masuk', '<small class="form-text text-danger">', '</small>'); ?>
                                 </div>
                                 <!-- <div class="form-group">
                                     <label for="foto" class="text-dark font-weight-bold">Foto Profil</label>
                                     <input type="file" class="form-control-file" id="foto" name="foto" value="<?= set_value('foto');  ?>" autocomplete="off">
                                 </div> -->
                             </div>
                             <!-- <div class="col-md-1"></div> -->
                             <div class="col-md-6 pl-4">
                                 <div class="form-group">
                                     <label for="username" class="text-dark font-weight-bold">Username<span class="text-danger">*</span></label>
                                     <input type="text" class="form-control  <?= (form_error('username')) ? 'is-invalid' : '' ?>" name="username" value="<?= set_value('username');  ?>" autocomplete="off">
                                     <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="password" class="text-dark font-weight-bold">Password<span class="text-danger">*</span></label>
                                     <input type="password" class="form-control  <?= (form_error('password')) ? 'is-invalid' : '' ?>" name="password" value="<?= set_value('password');  ?>" autocomplete="off">
                                     <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="password" class="text-dark font-weight-bold">Role Aplikasi<span class="text-danger">*</span></label>
                                     <select class="form-control" id="role" name="role">
                                         <option value="1">Admin</option>
                                         <option value="2">Pegawai</option>
                                     </select>
                                 </div>
                             </div>
                             <button type="submit" class="btn btn-dark btn-block mt-3 float-right ml-2">Simpan Data Pegawai</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 </section>