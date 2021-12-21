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
            <div class="card pb-3">
                <div class="card-body px-5">
                    <form action="" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="nama_perusahaan" class="text-dark font-weight-bold">Nama Perusahaan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  <?= (form_error('nama_perusahaan')) ? 'is-invalid' : '' ?>" id="nama_perusahaan" name="nama_perusahaan" value="<?= set_value('nama_perusahaan');  ?>" autocomplete="off">
                            <?= form_error('nama_perusahaan', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="text-dark font-weight-bold">Alamat Perusahaan<span class="text-danger">*</span></label>
                            <textarea type="text" class="form-control  <?= (form_error('alamat')) ? 'is-invalid' : '' ?>" rows="5" id="alamat" name="alamat" value="<?= set_value('alamat');  ?>" autocomplete="off"></textarea>
                            <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jam_masuk" class="text-dark font-weight-bold">Jam Masuk<span class="text-danger">*</span></label>
                                <input type="time" class="form-control  <?= (form_error('jam_masuk')) ? 'is-invalid' : '' ?>" id="jam_masuk" name="jam_masuk" value="<?= set_value('jam_masuk');  ?>" autocomplete="off">
                                <?= form_error('jam_masuk', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jam_pulang" class="text-dark font-weight-bold">Jam Pulang<span class="text-danger">*</span></label>
                                <input type="time" class="form-control  <?= (form_error('jam_pulang')) ? 'is-invalid' : '' ?>" id="jam_pulang" name="jam_pulang" value="<?= set_value('jam_pulang');  ?>" autocomplete="off">
                                <?= form_error('jam_pulang', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark mt-3 btn-block py-2">Simpan Data Perusahaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>