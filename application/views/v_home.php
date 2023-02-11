<div class="hero-slide owl-carousel site-blocks-cover">
    <div class="intro-section" style="background-image: url(<?= base_url() ?>template/front-end/images/9.png);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    <h1>SMK MATHLA'UL ANWAR</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="intro-section" style="background-image: url(<?= base_url() ?>template/front-end/images/10.jpg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    <h1>SMK MATHLA'UL ANWAR</h1>
                </div>
            </div>
        </div>
    </div>

</div>


<div></div>

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


<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline mb-3">
                    <span>Gallery</span>
                </h2>
                <p>Gallery Sekolah Yang Berisikan Fasiltas Sekolah Atau Acara Kegiatan Di SMK MATHLA’UL ANWAR</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="owl-slide-3 owl-carousel">
                    <?php foreach ($galery as $key => $value) : ?>
                        <div class="course-1-item">
                            <figure class="thumnail">
                                <img src="<?= base_url('sampul/' . $value->sampul); ?>" alt="Image" class="img-fluid"></a>
                                <div class="category">
                                    <h3><?= $value->nama_galey; ?></h3>
                                </div>
                            </figure>
                        </div>

                    <?php endforeach; ?>

                </div>

            </div>
        </div>



    </div>
</div>




<div class="section-bg style-1" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="section-title-underline style-2">
                    <span>About SMK MATHLA’UL ANWAR</span>
                </h2>
            </div>
            <div class="col-lg-8">
                <p class="lead">Bidang Studi/Kompetensi Keahlian<br>
                    a. Program Studi Keahlian Teknik : - Multimedia
                    - Teknik dan Sepeda Motor<br>
                    b. Program Studi Keahlian Bismen : Akuntansi dan Keuangan Lembaga
                </p>
            </div>
        </div>
    </div>
</div>

<!-- // 05 - Block -->
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4">
                <h2 class="section-title-underline">
                    <span>Guru</span>
                </h2>
            </div>
        </div>


        <div class="owl-slide owl-carousel">
            <?php foreach ($guru as $key => $value) : ?>
                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="<?= base_url('foto_guru/' . $value->foto_guru) ?>" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3><?= $value->nama_guru; ?></h3>
                            <span><?= $value->tugas_tambahan; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>


<div class="section-bg style-1" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <span class="icon flaticon-mortarboard"></span>
                <h3>Multimedia</h3>
                <p>Program Multimedia Terakreditasi “A”</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <span class="icon flaticon-school-material"></span>
                <h3>Akuntansi dan Keuangan Lembaga</h3>
                <p>Program Akuntansi Terakreditasi “B”</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <span class="icon flaticon-library"></span>
                <h3>Teknik dan Sepeda Motor</h3>
                <p>Program Teknik Sepeda Motor Terakreditasi “B”</p>
            </div>
        </div>
    </div>
</div>

<div class="news-updates">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="text-black">News &amp; Updates</h2>
                </div>
                <div class="row">
                    <?php foreach ($berita as $key => $value) : ?>
                        <div class="col-lg-6">
                            <div class="post-entry-big">
                                <a href="news-single.html" class="img-link"><img src="<?= base_url('gambar_berita/' . $value->gambar_berita); ?>" alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <i class="fas fa-fw fa-calendar" aria-hidden="true"></i><?= $value->tgl_berita; ?>
                                    </div>
                                    <h3 class="post-heading"><a href="<?= base_url('home/berita'); ?>"><?= $value->judul_berita; ?></a></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>