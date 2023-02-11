<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg)">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Berita</h2>
                <p>Berita Seputar Sekolah Dan Pendidikan</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="<?= base_url('home'); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Berita</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php foreach ($berita as $key => $value) : ?>
            <div class="row mb-5">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <img src="<?= base_url('gambar_berita/' . $value->gambar_berita); ?>" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span><?= $value->judul_berita; ?></span>
                    </h2>
                    <p><?= $value->isi_berita; ?></p>
                    <p><i class="fas fa-fw fa-calendar" aria-hidden="true"></i><?= $value->tgl_berita; ?></p>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>