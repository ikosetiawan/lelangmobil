<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Lelang Nusantara</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>penjual/tambahDataBarang"> Tambah Lelang </a>
                </li>
                <li class="nav-item mr-5">
                    <p class="nav-link "><?= $username ?> </p>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary font-weight-bold nav-link js-scroll-trigger" href="<?= base_url(); ?>login">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Daftar Mobil -->
<section class="bg-light page-section" id="portfolio">
    <div class="container">
        <div class="card shadow mb-4 col-sm-10" style="margin-left: 100px;">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary text-center">Daftar Barang </h4>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($barang as $brg) : ?>

                        <tbody>
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $brg['id_barang']; ?></td>
                                <td><?= $brg['nama_barang']; ?></td>
                                <td><?= $brg['harga']; ?></td>
                                <td><?= $brg['status']; ?></td>
                                <td><a href="<?= base_url(); ?>penjual/updateBarang/<?= $brg['id_barang']; ?>" class="badge badge-primary ">Update</a></td>
                            </tr>
                        </tbody>
                    <?php $no++;
                    endforeach; ?>
                </table>
                <div class="text-center">
                    <a href="<?= base_url() ?>penjual/tambahDataBarang" class="btn btn-primary"> Tambah Data Barang </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>