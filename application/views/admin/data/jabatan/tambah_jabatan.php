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
            <div class="card pb-3 mb-4">
                <div class="card-body px-5">
                    <form action="" method="POST" class="mt-4">
                        <div class="form-group">
                            <label for="nama_jabatan" class="text-dark font-weight-bold">Nama Jabatan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  <?= (form_error('nama_jabatan')) ? 'is-invalid' : '' ?>" id="nama_jabatan" name="nama_jabatan" value="<?= set_value('nama_jabatan');  ?>" autocomplete="off">
                            <?= form_error('nama_jabatan', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="perusahaan" class="text-dark font-weight-bold">Perusahaan<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker border border-secondary" id="perusahaan" name="perusahaan" title="Pilih Perusahaan" data-size="7" data-live-search="true">
                                <?php foreach ($perusahaan as $pt) : ?>
                                    <option value="<?= $pt['id_perusahaan'] ?>"><?= $pt['nama_perusahaan'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('perusahaan', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-row mt-4">
                            <div class="form-group col-md-4">
                                <label for="gaji_pokok" class="text-dark font-weight-bold">Gaji Pokok<span class="text-danger">*</span></label>
                                <input type="text" class="form-control uang <?= (form_error('gaji_pokok')) ? 'is-invalid' : '' ?>" id="gaji_pokok" name="gaji_pokok" value="<?= set_value('gaji_pokok');  ?>" autocomplete="off">
                                <?= form_error('gaji_pokok', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tj_makan" class="text-dark font-weight-bold">Tunjangan Makan</label>
                                <input type="text" class="form-control uang" id="tj_makan" name="tj_makan" value="<?= set_value('tj_makan');  ?>" autocomplete="off">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tj_transportasi" class="text-dark font-weight-bold">Tunjangan Transportasi</label>
                                <input type="text" class="form-control uang" id="tj_transportasi" name="tj_transportasi" value="<?= set_value('tj_transportasi');  ?>" autocomplete="off">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block mt-3 float-right py-2">Simpan Data Jabatan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>