<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active">
                            <a href="<?= base_url('home'); ?>" class="nav-link text-left">Home</a>
                        </li>
                        <li class="has-children">
                            <a href="#" class=" nav-link text-left">Akademik</a>
                            <ul class="dropdown">
                                <li><a href="<?= base_url('home/guru'); ?>">Guru</a></li>
                                <li><a href="<?= base_url('home/siswa') ?>">Siswa</a></li>
                                <li><a href="<?= base_url('home/kepsek') ?>">Visi Misi</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url('home/berita'); ?>" class="nav-link text-left">Berita</a>
                        </li>
                        <li>
                            <a href="<?= base_url('home/galery'); ?>" class="nav-link text-left">Gallery</a>
                        </li>
                        <li>
                            <a href="<?= base_url('home/pengumuman'); ?>" class="nav-link text-left">Pengumuman</a>
                        </li>
                        <li>
                            <a href="<?= base_url('home/modul') ?>" class="nav-link text-left">Modul</a>
                        <li>
                            <a href="<?= base_url('home/about') ?>" class="nav-link text-left">About</a>
                        </li>
                    </ul>
                    </ul>
                </nav>

            </div>
            <div class="ml-auto">
                <div class="social-wrap">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>

                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>
            </div>

        </div>
    </div>
</header>