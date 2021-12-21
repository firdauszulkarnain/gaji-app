<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-info px-4 py-2" href="<?= base_url() ?>data/tambah_perusahaan"><i class="fas fa-fw fa-plus"></i> Tambah Data Perusahaan</a>
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
                                <th>Nama Cabang/Perusahaan</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($perusahaan as $pt) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><?= $pt['nama_perusahaan'] ?></td>
                                    <td><?= $pt['alamat'] ?></td>
                                    <td class="text-center">
                                        <!-- Button Edit -->
                                        <a href="<?= base_url() ?>data/update_perusahaan/<?= $pt['slug'] ?>" class="btn btn-sm btn-info text-light"><i class="fas fa-edit"></i></a>
                                        <!-- Button Hapus -->
                                        <form action="<?= base_url() ?>data/delete_perusahaan" method="POST" class="d-inline">
                                            <input type="hidden" name="id_perusahaan" value="<?= $pt['id_perusahaan'] ?>">
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
<!-- /.content -->