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
                    <?= form_open_multipart('user/edit'); ?>
                    <input type="hidden" name="id_user" value="<?= $profile['id_user'] ?>">
                    <input type="hidden" name="id_pegawai" value="<?= $profile['id_pegawai'] ?>">
                    <div class="row">
                        <div class="col-md-4 pr-4">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control text-capitalize" id="username" value="<?= $profile['username'] ?>" disabled>
                            </div>
                            <img src="<?= base_url() ?>assets/img/profile/<?= $profile['foto'] ?>" alt="" class="img-thumbnail border border-dark">

                            <div class="form-group mt-3">
                                <label for="image" class="text-dark">Update Foto Profil</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama_pegawai">Nama Pegawai</label>
                                <input type="text" class="form-control text-capitalize" id="nama_pegawai" name="nama_pegawai" value="<?= $profile['nama_pegawai'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control text-capitalize" id="jabatan" value="<?= $profile['nama_jabatan'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan</label>
                                <input type="text" class="form-control text-capitalize" id="perusahaan" value="<?= $profile['nama_perusahaan'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="role">Role Aplikasi</label>
                                <?php if ($user['role_id'] == 1) : ?>
                                    <input type="text" class="form-control text-capitalize" id="role" value="Admin" disabled>
                                <?php else : ?>
                                    <input type="text" class="form-control text-capitalize" id="role" value="Pegawai" disabled>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_masuk">Tanggal Masuk</label>
                                <input type="text" class="form-control text-capitalize" id="tgl_masuk" value="<?= $profile['tgl_masuk'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-dark btn-block mt-3 py-2" type="submit">Simpan Profil</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section>