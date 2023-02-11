<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url(<?= base_url() ?>template/front-end/images/1.jpg)">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Modul</h2>
                <p>Silahkan Download Modul Jika Di Perlukan </p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="<?= base_url('home'); ?>">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Modul</span>
    </div>
</div>




<!-- DataTales Example -->




<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Modul</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Modul</th>
                        <th>File</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Modul</th>
                        <th>File</th>
                        <th>Download</th>
                    </tr>
                </tfoot>
                <tbody>

                    <tr>
                        <?php $i = 1; ?>
                        <?php foreach ($modul as $key => $value) : ?>
                            <td><?= $i; ?></td>
                            <td><?= $value->nama_file; ?></td>
                            <td><?= $value->file; ?></td>
                            <td><a href="<?= base_url('file/' . $value->file); ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-download"></i> Download</a></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>



</div>
</div>
</div>
</div>