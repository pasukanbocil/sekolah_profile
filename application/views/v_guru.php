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
        <span class="current">Guru</span>
    </div>
</div>

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