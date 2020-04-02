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
                    <p class="nav-link "><?= $username ?> </p>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary font-weight-bold nav-link js-scroll-trigger" href="<?= base_url(); ?>login">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>