<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg)">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Pengumuman</h2>
                <p>Pengumuman Tentang Yang Berkaitan Di Lingkungan Sekolah SMK MATHLA’UL ANWAR</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="<?= base_url('home'); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Pengumuman</span>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-4 mb-5">
                <h2 class="section-title-underline mb-5">
                    <span>Pengumuman</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($pengumuman as $key => $value) : ?>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="feature-1 border">
                        <div class="feature-1-content">
                            <h2><?= $value->judul_pengumuman; ?></h2>
                            <p><?= $value->isi_pengumuman; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>