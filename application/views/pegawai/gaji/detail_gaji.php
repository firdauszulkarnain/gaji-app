<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-success px-5" href="<?= base_url() ?>pegawai/slip_gaji/<?= $detail['id_gaji'] ?>"><i class="fas fa-file-pdf"></i> PDF</a>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-6">
            <div class="card pb-3 p-2">
                <div class="card-body">
                    <h5 class="text-dark"><b>Informasi Detail Pegawai</b></h5>
                    <hr>
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
                    <div class="form-group row">
                        <label for="tanggal_masuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" disabled value="<?= $detail['tgl_masuk'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card pb-3 p-2">
                <div class="card-body">
                    <h5 class="text-dark"><b>Informasi Detail Gaji Pegawai</b></h5>
                    <hr>
                    <div class="form-group row mt-3">
                        <label for="nama_pegawai" class="col-sm-3 col-form-label">Gaji Pokok</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled value="Rp. <?= number_format($detail['gaji_pokok'], 0, ',', '.') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-3 col-form-label">Tj. Transport</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled value="Rp. <?= number_format($detail['tj_transportasi'], 0, ',', '.') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Perusahaan" class="col-sm-3 col-form-label">Tj. Makan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled value="Rp. <?= number_format($detail['tj_makan'], 0, ',', '.') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gaji_total" class="col-sm-3 col-form-label">Gaji Total</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled value="Rp. <?= number_format($detail['gaji_total'], 0, ',', '.') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>