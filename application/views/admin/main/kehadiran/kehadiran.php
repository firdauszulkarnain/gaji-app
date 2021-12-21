<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5 class="text-light text-center">FILTER PENCARIAN</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="perusahaan" class="text-dark font-weight-bold">Perusahaan</label>
                                <select class="form-control selectpicker border border-secondary" id="perusahaan" name="perusahaan" data-size="5" data-live-search="true" title="Pilih Perusahaan">
                                    <?php foreach ($perusahaan as $pt) : ?>
                                        <option value="<?= $pt['id_perusahaan'] ?>"><?= $pt['nama_perusahaan'] ?></option>
                                    <?php endforeach; ?>
                                    <?php if ($detail['perusahaan'] != 'Semua Perusahaan') : ?>
                                        <option value="">Semua Perusahaan</option>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="jabatan" class="text-dark font-weight-bold">Jabatan</label>
                                <select class="form-control selectpicker border border-secondary" id="jabatan" name="jabatan" title="Pilih Jabatan" data-size="5" data-live-search="true">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="tanggal" class="text-dark font-weight-bold">Tanggal</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" autocomplete="off" placeholder="<?= $detail['tanggal'] ? $detail['tanggal'] : date('Y-m-d') ?>">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-block mt-2"><i class="fas fa-search"></i> <b> Cari Data</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if ($detail['jabatan'] != 'Semua Jabatan' && $detail['perusahaan'] != 'Semua Perusahaan') : ?>
        <div class="alert alert-primary" role="alert">
            Menampilkan data untuk <strong>Pegawai <?= $detail['jabatan'] ?> </strong> dari <strong> Perusahaan <?= $detail['perusahaan'] ?></strong>
        </div>
    <?php elseif ($detail['perusahaan'] != 'Semua Perusahaan') : ?>
        <div class="alert alert-primary" role="alert">
            Menampilkan data untuk <strong>Perusahaan <?= $detail['perusahaan'] ?></strong>
        </div>
    <?php endif ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="mytabel">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Jabatan</th>
                                <th>Perusahaan</th>
                                <th>Today Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kehadiran as $kh) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><?= $kh['nama_pegawai'] ?></td>
                                    <td><?= $kh['nama_jabatan'] ?></td>
                                    <td><?= $kh['nama_perusahaan'] ?></td>
                                    <td class="text-primary font-weight-bold"><a href="#" data-id="<?= $kh['report'] ?>" data-toggle="modal" data-target="#staticBackdrop" class="kehadiran">View Report</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Modal -->
<div class="modal fade mt-5" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Report Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mb-3">
                <textarea class="form-control ckeditor" name="report" id="report" rows="7" disabled></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>