<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg)">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Gallery</h2>
                <p>Gallery Sekolah Yang Berisikan Fasiltas Sekolah Atau Acara Kegiatan Di SMK MATHLA’UL ANWAR</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="<?= base_url('home'); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Gallery</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <?php foreach ($galery as $key => $value) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="course-single.html"><img src="<?= base_url('sampul/' . $value->sampul); ?>" alt="Image" class="img-fluid"></a>
                        </figure>
                        <p class="desc mb-4"><?= $value->nama_galey; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                        <a href="course-single.html"><img src="images/course_2.jpg" alt="Image" class="img-fluid"></a>
                        <div class="price">$99.00</div>
                        <div class="category">
                            <h3>Mobile Application</h3>
                        </div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <h2>How To Create Mobile Apps Using Ionic</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->