<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <h2 style="margin-left: 400px; ">Laporan Data Transaksi </h2>
        <table  style="margin-left: 10px; margin-top: 50px;">
            <tr>
                <th>No. </th>
                <th>ID Transaksi </th>
                <th>ID Barang </th>
                <th>Nama Penjual  </th>
                <th>Nama Pembeli </th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Alamat Pengiriman </th>
                <th>Tangaal</th>
            </tr>
            <?php
            $no = 1;
            foreach ($transaksi as $tsk) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $tsk['id_transaksi']; ?></td>
                    <td><?= $tsk['id_barang']; ?></td>
                    <td><?= $tsk['nama_penjual']; ?></td>
                    <td><?= $tsk['nama_pembeli']; ?></td>
                    <td><?= $tsk['nama_barang']; ?></td>
                    <td><?= $tsk['harga']; ?></td>
                    <td><?= $tsk['alamat_pengiriman']; ?></td>
                    <td><?= $tsk['tanggal']; ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
    </center>
</body></html>