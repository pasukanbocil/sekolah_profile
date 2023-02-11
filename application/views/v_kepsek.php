<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg)">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Visi Misi</h2>
                <p>Visi Misi SMK MATHLA’UL ANWAR</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="<?= base_url('home'); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Visi Misi</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php foreach ($kepsek as $key => $value) : ?>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p>
                        <img src="<?= base_url('foto_kepsek/' . $value->foto_kepsek) ?>" alt="Image" class="img-fluid">
                    </p>
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>VISI MISI</span>
                    </h2>

                    <p><strong class="text-black d-block">Kepala Sekolah:</strong> <?= $value->nama_kepsek; ?></p>
                    <p><strong class="text-black d-block">Visi Misi</strong></p>
                    <p><?= $value->visi_misi; ?></p>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>