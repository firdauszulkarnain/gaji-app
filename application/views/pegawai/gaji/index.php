<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>
</section>

<section class="content">

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
                                <th>Gaji Total</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail as $dt) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><?= $dt['nama_pegawai'] ?></td>
                                    <td><?= $dt['nama_perusahaan'] ?></td>
                                    <td>Rp. <?= number_format($dt['gaji_total'], 0, ',', '.') ?></td>
                                    <td><?= $dt['tanggal'] ?></td>
                                    <td class="text-center">
                                        <!-- Button Detail -->
                                        <a href="<?= base_url() ?>pegawai/detail_bayaran/<?= $dt['id_gaji'] ?>" class="btn btn-sm btn-warning text-light"><i class="fas fa-info-circle"></i></a>
                                        <!-- Button Cetak -->
                                        <a href="<?= base_url() ?>pegawai/slip_gaji/<?= $dt['id_gaji'] ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-fw fa-file-alt"></i></a>
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