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
                    <form action="<?= base_url() ?>main/cari_gaji" method="POST">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-row">
                                    <div class="form-group col-md-6 mr-3">
                                        <label for="pegawai">Nama Pegawai</label>
                                        <select class="form-control selectpicker border border-secondary" id="pegawai" name="pegawai" data-size="5" data-live-search="true" title="Pilih Pegawai">
                                            <?php if ($this->session->userdata('pegawai')) : ?>
                                                <option value="<?= $this->session->userdata('pegawai') ?>" selected><?= $det_pegawai['nama_pegawai'] ?></option>
                                            <?php endif ?>
                                            <?php foreach ($pegawai as $pg) : ?>
                                                <?php if ($this->session->userdata('pegawai') != $pg['id_pegawai']) : ?>
                                                    <option value="<?= $pg['id_pegawai'] ?>"><?= $pg['nama_pegawai'] ?></option>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                            <?php if ($this->session->userdata('pegawai')) : ?>
                                                <option value="">Semua Pegawai</option>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="perusahaan">Perusahaan</label>
                                        <select class="form-control selectpicker border border-secondary" id="perusahaan" name="perusahaan" data-size="5" data-live-search="true" title="Pilih Perusahaan">
                                            <?php if ($this->session->userdata('perusahaan')) : ?>
                                                <option value="<?= $this->session->userdata('perusahaan') ?>" selected><?= $det_perusahaan['nama_perusahaan'] ?></option>
                                            <?php endif ?>
                                            <?php foreach ($perusahaan as $pt) : ?>
                                                <option value="<?= $pt['id_perusahaan'] ?>"><?= $pt['nama_perusahaan'] ?></option>
                                            <?php endforeach; ?>
                                            <?php if ($this->session->userdata('perusahaan')) : ?>
                                                <option value="">Semua Perusahaan</option>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="bulan">Bulan</label>
                                        <select class="form-control selectpicker border border-secondary" id="bulan" name="bulan" data-size="5" data-live-search="true">
                                            <?php
                                            $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                            if ($this->session->userdata('bulan')) {
                                                $bln = $this->session->userdata('bulan') - 1;
                                                $temp = $this->session->userdata('bulan');
                                            } else {
                                                $bln = date('n') - 1;
                                                $temp = date('n');
                                            }
                                            echo "<option value=$temp> $bulan[$bln] </option>";

                                            $nilai = count($bulan);
                                            for ($i = 0; $i < $nilai; $i += 1) {
                                                $j = $i + 1;
                                                if ($bulan[$i] != $bulan[$bln]) {
                                                    echo "<option value=$j> $bulan[$i] </option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control selectpicker border border-secondary" id="tahun" name="tahun" title="<?= $this->session->userdata('tahun') ? '' : date('Y')  ?>" data-size="5" data-live-search="true">
                                            <?php
                                            if ($this->session->userdata('tahun')) {
                                                $j = $this->session->userdata('tahun');
                                            } else {
                                                $j = date('Y');
                                            }
                                            echo "<option value=$j> $j </option>";
                                            for ($i = 2021; $i <= date('Y') + 10; $i += 1) {
                                                if ($i != $j) {
                                                    echo "<option value='$i'> $i </option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 mt-4">
                                        <button type="submit" class="btn btn-primary btn-block mt-2"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
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
                                <th>Nama Pegawai</th>
                                <th>Perusahaan</th>
                                <th>Gaji Total</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($gaji as $gj) : ?>
                                <tr class="text-center">
                                    <td></td>
                                    <td><?= $gj['nama_pegawai'] ?></td>
                                    <td><?= $gj['nama_perusahaan'] ?></td>
                                    <td>Rp. <?= number_format($gj['gaji_total'], 0, ',', '.') ?></td>
                                    <td><?= $gj['tanggal'] ?></td>
                                    <td class="text-center">
                                        <!-- Button Detail -->
                                        <a href="<?= base_url() ?>main/detail_bayaran/<?= $gj['id_gaji'] ?>" class="btn btn-sm btn-warning text-light"><i class="fas fa-info-circle"></i></a>
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