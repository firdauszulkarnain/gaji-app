<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-primary px-4 py-2" href="<?= base_url() ?>pegawai/tambah_kehadiran"><i class="fas fa-fw fa-plus"></i> ABSEN HARI INI!</a>
        </div>
    </div>
</section>

<section class="content">
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal <?= $this->session->flashdata('error') ?></strong> || Kehadiran Hari Ini Sudah Diinputkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="mytabel">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Perusahaan</th>
                                <th>Report</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kehadiran as $kh) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><?= $kh['nama_pegawai'] ?></td>
                                    <td><?= $kh['nama_perusahaan'] ?></td>
                                    <td class="text-primary font-weight-bold"><a href="#" data-id="<?= $kh['report'] ?>" data-toggle="modal" data-target="#staticBackdrop" class="kehadiran">View Report</a></td>
                                    <td><?= $kh['tgl_kehadiran'] ?></td>
                                    <td class="text-center">
                                        <!-- Button Detail
                                         <a href="<?= base_url() ?>data/detail_perusahaan/<?= $kh['id_kehadiran'] ?>" class="btn btn-sm btn-warning text-light"><i class="fas fa-info-circle"></i></a> -->
                                        <!-- Button Edit -->
                                        <a href="<?= base_url() ?>pegawai/edit_kehadiran/<?= $kh['id_kehadiran'] ?>" class="btn btn-sm btn-primary text-light"><i class="fas fa-edit"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Report Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control ckeditor" name="report" rows="3" disabled></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>