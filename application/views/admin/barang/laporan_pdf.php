<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <h2 style="margin-left: 400px; ">Laporan Daftar Barang</h2>
        <table  style="margin-left: 250px; margin-top: 50px;">
            <tr>
                <th>NO</th>
                <th>Nama Penjual </th>
                <th>Nama Barang </th>
                <th>Harga</th>
            </tr>
            <?php
            $no = 1;
            foreach ($barang as $brg) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $brg['nama_penjual']; ?></td>
                    <td><?= $brg['nama_barang']; ?></td>
                    <td><?= $brg['harga']; ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
    </center>
</body></html>