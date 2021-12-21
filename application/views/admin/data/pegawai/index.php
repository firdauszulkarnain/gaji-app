<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-info px-4 py-2" href="<?= base_url() ?>data/tambah_pegawai"><i class="fas fa-fw fa-plus"></i> Tambah Data Pegawai</a>
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
                                <label for="perusahaan" class="text-dark">Perusahaan</label>
                                <select class="form-control selectpicker border border-secondary" id="perusahaan" name="perusahaan" data-size="5" data-live-search="true" title="Pilih Perusahaan">
                                    <?php foreach ($perusahaan as $pt) : ?>
                                        <option value="<?= $pt['id_perusahaan'] ?>"><?= $pt['nama_perusahaan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jabatan" class="text-dark font-weight-bold">Jabatan<span class="text-danger">*</span></label>
                                <select class="form-control selectpicker border border-secondary" id="jabatan" name="jabatan" title="Pilih Jabatan" data-size="5" data-live-search="true">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-2 mt-4">
                                <button type="submit" class="btn btn-info btn-block mt-2"><i class="fas fa-search"></i> <b> Cari Data</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="mytabel">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Foto Profil</th>
                                <th>Nama Pegawai</th>
                                <th>Jabatan</th>
                                <th>Perusahaan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pegawai as $pg) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td width="15%"> <img class="rounded-circle img-thumbnail" src="<?= base_url() ?>assets/img/profile/<?= $pg['foto'] ?>"></td>
                                    <td class="align-middle"><?= $pg['nama_pegawai'] ?></td>
                                    <td class="align-middle"><?= $pg['nama_jabatan'] ?></td>
                                    <td class="align-middle"><?= $pg['nama_perusahaan'] ?></td>
                                    <td class="align-middle">
                                        <!-- Button Detail -->
                                        <a href="<?= base_url() ?>data/detail_pegawai/<?= $pg['slug_pegawai'] ?>" class="btn btn-sm btn-warning text-light"><i class="fas fa-info-circle"></i></a>
                                        <!-- Button Hapus -->
                                        <form action="<?= base_url() ?>data/delete_pegawai" method="POST" class="d-inline">
                                            <input type="hidden" name="id_pegawai" value="<?= $pg['id_pegawai'] ?>">
                                            <button class="btn btn-sm btn-danger text-light tombol-hapus" type="submit">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>