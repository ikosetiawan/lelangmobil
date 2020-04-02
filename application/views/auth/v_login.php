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
                    <a class="btn btn-primary font-weight-bold nav-link js-scroll-trigger" href="<?= base_url(); ?>/daftar">Daftar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="text-center">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <h5 class="card-header text-center"> Silahkan Login </h5>
                <div class="card-body">
                    <form action="<?= base_url(); ?>login" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            <small id="username" class="form-text text-muted">Masukkan Username Anda </small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            <small id="password" class="form-text text-muted">Masukkan Password Anda </small>
                        </div>
                        <div class="col-sm-4 offset-5">
                            <button type="submit" name="masuk" class="btn btn-primary mt-3 mb-2"> Masuk </button>
                        </div>
                        <div class="col-sm-10 offset-1 text-center mt-4">
                            <p>
                                Belum mempunyai akun ? <a href="<?= base_url(); ?>daftar">Daftar</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>