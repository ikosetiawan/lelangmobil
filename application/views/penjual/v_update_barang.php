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

<div class="card shadow mb-4 col-sm-10" style="margin-top:150px; margin-left: 150px;  margin-bottom: 200px;">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary text-center">Update Daftar Barang </h4>
    </div>
    <div class="card-body">
        <div class="text-center">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <form method="post">
            <div class="form-group">
                <label for="nama_penjual">Nama Penjual </label>
                <input type="hidden" name="id" id="id" value="<?= $barang['id_barang'];  ?>">
                <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" value="<?= $barang['nama_penjual']; ?>">
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $barang['nama_barang']; ?>">
                <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" value="<?= $barang['harga']; ?>">
                <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="status"> Perbarui Status </label>
                <select class="form-control" name="status" id="status">
                    <option value="Terjual"> Terjual </option>
                    <option value="Masih Dalam Lelang"> Masih Dalam Lelang </option>
                </select>
            </div>
            <div class="col-sm-4 offset-5">
                <button type="submit" name="ubah" class="btn btn-primary mt-3 mb-2"> Update </button>
        </form>
        <a class="btn mt-3 mb-2 mr-4" href="<?= base_url() ?>admin/tampilBarang"> Batal </a>
    </div>
</div>
</div>