<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card pb-3 p-2">
                <div class="card-body">
                    <div class="form-group row mt-3">
                        <label for="nama_pegawai" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled value="<?= $detail['nama_pegawai'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled value="<?= $detail['nama_jabatan'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Perusahaan" class="col-sm-4 col-form-label">Perusahaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled value="<?= $detail['nama_perusahaan'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card pb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <h5 class="text-dark">Tanggal/Waktu Hari Ini</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-primary text-center" role="alert">
                                <strong> <?= date('d-m-Y'); ?> </strong> || <span id="jamServer"><?= date("H:i:s"); ?></span>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST" class="mt-3">
                        <div class="form-group">
                            <input type="hidden" name="id_pegawai" value="<?= $detail['id_pegawai'] ?>">
                            <label for="report" class="text-dark font-weight-bold">Report Harian<span class="text-danger">*</span></label>
                            <textarea class="form-control ckeditor  <?= (form_error('report')) ? 'is-invalid' : '' ?>" id="report" rows="10" id="report" name="report"><?= set_value('report');  ?></textarea>
                            <?= form_error('report', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block mt-3">Simpan Kehadiran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>