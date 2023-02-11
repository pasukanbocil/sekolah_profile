<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg)">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Guru</h2>
                <p>Nama Guru SMK MATHLA’UL ANWAR</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="<?= base_url('home'); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Siswa</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4">
                <h2 class="section-title-underline">
                    <span>Siswa</span>
                </h2>
            </div>
        </div>


        <div class="owl-slide owl-carousel">
            <?php foreach ($siswa as $key => $value) : ?>
                <div class="ftco-testimonial-1">
                    <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                        <img src="<?= base_url('foto_siswa/' . $value->foto_siswa) ?>" alt="Image" class="img-fluid mr-3">
                        <div>
                            <h3><?= $value->nama_siswa; ?></h3>
                            <span><?= $value->jenis_kelamin; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>