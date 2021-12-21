<html><head>
<title></title>
<style>
    h2 {
      font-family: Arial;
      text-transform: uppercase;
      font-weight: 400;
      margin-top: 10px;
      text-align: center;
      color: black
    }

    hr {
      border-top: 1px solid black;
      width: 70%;
      margin-top: -10px;

    }

    .judul {
      font-family: Arial;
      text-transform: capitalize;
      margin-top: 5px;
      text-align: center;
      color: black;
    }

    #pegawai {
      margin-top: 10px;
      font-family: Arial, Helvetica, sans-serif;
      width: 50%;
      margin-bottom: 20px;
    }

    #penghasilan {
      margin-top: 10px;
      font-family: Arial, Helvetica, sans-serif;
      width: 100%;
      margin-bottom: 20px;
    }

    .column {
      float: left;
      width: 50%;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    #tabel {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }

    #tabel td,
    #tabel th {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    #tabel th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #6777EF;
      color: white;
    }

    .text {
      font-size: 16px;
    }

    .nama {
      font-size: 16px;
      margin-top: 100px;
      margin-right: 30px;
    }
    .ttd {
      text-align: right;
      margin-right: 20px;
    }
  </style>
</head><body>
  <h2 class="judul"><?= $laporan['nama_perusahaan'] ?></h2>
  <br>
  <p class="judul"><?= $laporan['alamat'] ?></p>
  <hr>
  <table id="pegawai">
    <tr>
      <td>Nama Pegawai</td>
      <td>: <?= $laporan['nama_pegawai'] ?></td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td>: <?= $laporan['nama_jabatan'] ?></td>
    </tr>
    <tr>
      <td>Perusahaan</td>
      <td>: <?= $laporan['nama_perusahaan'] ?></td>
    </tr>
  </table>
  <table id="tabel">
    <tr>
      <th>No</th>
      <th>Nama Penghasilan</th>
      <th>Jumlah (IDR)</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Gaji Pokok</td>
      <td>Rp. <?= number_format($laporan['gaji_pokok'], 0, ',', '.') ?></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Tunjangan Makan</td>
      <td>Rp. <?= number_format($laporan['tj_makan'], 0, ',', '.') ?></td>
    </tr>
    <tr>
      <td>3</td>
      <td>Tunjangan Transportasi</td>
      <td>Rp. <?= number_format($laporan['tj_transportasi'], 0, ',', '.') ?></td>
    </tr>
  <tr>
    <td colspan="2"><b>Total Gaji</b></td>
    <td><b>Rp. <?= number_format($laporan['gaji_total'], 0, ',', '.') ?></b></td>
  </tr>
  </table>
<div class="ttd">
    <p class="text"><?= $tanggal ?></p>
    <p class="nama"><b>Manajer - HRD</b></p>
</div>
</body></html>