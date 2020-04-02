<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <h2 style="margin-left: 400px; ">Laporan Daftar Pembeli</h2>
        <table  style="margin-left: 250px; margin-top: 50px;">
            <tr>
                <th>NO</th>
                <th>Nama  </th>
                <th>Telephone </th>
                <th>Alamat</th>
                <th> Email </th>
            </tr>
            <?php
            $no = 1;
            foreach ($pembeli as $pem) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pem['nama']; ?></td>
                    <td><?= $pem['telephone']; ?></td>
                    <td><?= $pem['alamat']; ?></td>
                    <td><?= $pem['email']; ?></td>
                </tr>

            <?php endforeach; ?>
        </table>
    </center>
</body></html>