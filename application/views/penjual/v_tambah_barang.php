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
                <li class="nav-item mr-5">
                    <p class="nav-link "><?= $username ?> </p>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary font-weight-bold nav-link js-scroll-trigger" href="<?= base_url(); ?>login/keluar">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="card shadow col-sm-10 " style="margin-top:150px; margin-left: 150px;  margin-bottom: 200px;">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">Tambah Data Barang </h4>
    </div>
    <div class="card-body">
        <div class="text-center">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <form action="<?= base_url() ?>penjual/tambahDatabarang" method="post">
            <div class="form-group">
                <label for="id_penjual">ID Penjual</label>
                <input type="text" name="id_penjual" class="form-control" id="id_penjual">
                <?= form_error('id_penjual', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="nama_penjual">Nama Penjual </label>
                <input type="text" name="nama_penjual" class="form-control" id="nama_penjual">
                <?= form_error('nama_penjual', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang </label>
                <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="harga">Harga </label>
                <input type="text" name="harga" class="form-control" id="harga">
                <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <textarea class="form-group" name="deskripsi" id="deskripsi" cols="124" rows="10">

                            </textarea>
                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="col-sm-4 offset-5">
                <a class="btn mt-3 mb-2 mr-4" href="<?= base_url() ?>penjual"> Batal </a>

                <button type="submit" name="ubah" class="btn btn-primary mt-3 mb-2"> Tambah </button>
        </form>
    </div>
</div>