<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASIL PROSES BARANG</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <style>
        html,
        body {

            margin: 0;
            padding: 0;
        }

        body {
            /* font-family: arial; */
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.65;
            padding-bottom: 1000px;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;
            background-color: DodgerBlue;
        }

        .flex-container>div {
            background-color: #f1f1f1;
            width: 100px;
            margin: 10px;
            text-align: center;
            line-height: 75px;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <img style="width: 115%; height: 100%;" src="<?= base_url('assets/'); ?>img/report_logo.png" alt="">
    <h2 style="text-align:center;">DAFTAR INDUK ALAT UKUR</h2>
    <div style="height: 10px;"></div>
    
    <table   style="margin: 30px; text-align: center;">
        <?php foreach ($getDataProgressResultWithID as $row) : ?>
            <?php if( $row['alat_bantu'] == '') : ?>
            <tr>
            <td>Jenis Alat Ukur</td> 
            <td>:</td>       
            <td style="width: 5cm;"><?= $row['alat_ukur']; ?></td>
            <td>Jumlah</td>
            <td>:</td>
            <td style="width: 5cm;"><?= $row['jumlah']; ?></td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        <tr>
        <td style="width: 5cm">Tanggal Peminjaman  </td>
        <td>:</td>
        <td><?= $getDataBarangById['tanggal_peminjaman']; ?></td>
            <td>Jam </td>
            <td>:</td>
            <td> <?= $getDataBarangById['jam_peminjaman']; ?></td>
        </tr>
        <tr>
            <td style="width: 5cm">Tanggal Pengembalian  </td>
            <td>:</td>
            <td><?= $getDataBarangById['tanggal_pengembalian']; ?></td>
            <td>Jam </td>
            <td>:</td>
            <td><?= $getDataBarangById['jam_pengembalian']; ?></td>
        </tr>
    </table>

    <table style="margin: 30px; text-align: center;">
        <tr>
            <td style="width: 7cm">Yang Meminjam</td>
            <td> Bogor, <?= $getDataBarangById['tanggal_peminjaman']; ?> <br> Status Barang</td>
        </tr>
        
        <?php foreach ($getDataProgressResultWithID as $row) : ?>
            <?php if( $row['alat_bantu'] == '') : ?>
           <tr>
           <td><?= $row['nama_peminjam']; ?> <br> (.......)</td>
           <td><?= $row['status']; ?></td>
           </tr>
           <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <div style="text-align:left; margin-left:50px;">
    <p>Yang Memberikan</p>
    <img style="width: 10%; height: 10%;" src="<?= base_url('assets/'); ?>img/ttd.png" alt="">
    <p>Aris Dwinanto</p>
    </div>

    <br><br><br> <br><br><br> <br><br><br> <br><br><br>
    <img style="width: 115%; height: 100%;" src="<?= base_url('assets/'); ?>img/report_logo.png" alt="">

    <h2 style="text-align:center;">DAFTAR INDUK ALAT BANTU</h2>
    <div style="height: 10px;"></div>
    
    <table   style="margin: 30px; text-align: center;">
        <?php foreach ($getDataProgressResultWithID as $row) : ?>
            <?php if( $row['alat_ukur'] == '') : ?>
            <tr>
            <td>Jenis Alat Bantu</td> 
            <td>:</td>       
            <td style="width: 5cm;"><?= $row['alat_bantu']; ?></td>
            <td>Jumlah</td>
            <td>:</td>
            <td style="width: 5cm;"><?= $row['jumlah']; ?></td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        <tr>
        <td style="width: 5cm">Tanggal Peminjaman  </td>
        <td>:</td>
        <td><?= $getDataBarangById['tanggal_peminjaman']; ?></td>
            <td>Jam </td>
            <td>:</td>
            <td> <?= $getDataBarangById['jam_peminjaman']; ?></td>
        </tr>
        <tr>
            <td style="width: 5cm">Tanggal Pengembalian  </td>
            <td>:</td>
            <td><?= $getDataBarangById['tanggal_pengembalian']; ?></td>
            <td>Jam </td>
            <td>:</td>
            <td><?= $getDataBarangById['jam_pengembalian']; ?></td>
        </tr>
    </table>

   

    <table style="margin: 30px; text-align: center;">
        <tr>
            <td style="width: 7cm">Yang Meminjam</td>
            <td> Bogor, <?= $getDataBarangById['tanggal_peminjaman']; ?> <br> Status Barang</td>
        </tr>
        
        <?php foreach ($getDataProgressResultWithID as $row) : ?>
            <?php if( $row['alat_ukur'] == '') : ?>
           <tr>
           <td><?= $row['nama_peminjam']; ?> <br> (....)</td>
           <td><?= $row['status']; ?></td>
           </tr>
           <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <div style="text-align:left; margin-left:50px;">
    <p>Yang Memberikan</p>
    <img style="width: 10%; height: 10%;" src="<?= base_url('assets/'); ?>img/ttd.png" alt="">
    <p>Aris Dwinanto</p>
    </div>
    
   


</body>

</html>


