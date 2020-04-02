<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= base_url(); ?>">Lelang Nusantara</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="btn btn-primary font-weight-bold nav-link js-scroll-trigger" href="<?= base_url(); ?>login">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h5 class="card-header text-center"> Silahkan Lengkapi Data Berikut </h5>
                <div class="card-body">
                    <form action="<?= base_url() ?>daftar/prosesDaftar" method="post">
                        <div class="form-group">
                            <label for="status"> Pilih Sebagai </label>
                            <select class="form-control" name="status" id="status">
                                <option value="pembeli"> Pembeli </option>
                                <option value="penjual"> Penjual </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            <!-- <small id="username" class="form-text text-muted">Masukkan nama lengkap anda </small> -->
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            <small id="nama" class="form-text text-muted">Masukkan nama lengkap anda </small>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Nomor Telephone</label>
                            <input type="number" name="telephone" class="form-control" id="telephone" value="<?= set_value('telephone'); ?>" placeholder="">
                            <?= form_error('telephone', '<small class="text-danger">', '</small>'); ?>
                            <small id="telephone" class="form-text text-muted"> Harap masukkan nomor yang dapat dihubungi </small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                            <small id="alamat" class="form-text text-muted">Masukkan alamat lengkap anda </small>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= set_value('email'); ?>" />
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" name="password1" class="form-control" id="password1" value="<?= set_value('password1'); ?>">
                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password2">Konfirmasi Password</label>
                            <input type="password" name="password2" class="form-control" id="password2">
                            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="col-sm-4 offset-5">
                            <button type="submit" name="daftar" class="btn btn-primary mt-3 mb-2"> Daftar </button>
                        </div>
                        <div class="col-sm-10 offset-1 text-center mt-4">
                            <p>
                                Sudah mempunyai akun ? <a href="<?= base_url(); ?>login">Masuk</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>