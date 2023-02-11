<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>
            <a href="<?= base_url('berita/tambah'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Berita</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Berita</th>
                                    <th>Isi Berita</th>
                                    <th>Gambar Berita</th>
                                    <th>Tanggal Berita</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Berita</th>
                                    <th>Isi Berita</th>
                                    <th>Gambar Berita</th>
                                    <th>Tanggal Berita</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($berita as $key => $value) : ?>
                                        <td><?= $i; ?></td>
                                        <td><?= $value->judul_berita ?></td>
                                        <td><?= $value->isi_berita ?></td>
                                        <td><img src="<?= base_url('gambar_berita/' . $value->gambar_berita); ?>" width="100px"></td>
                                        <td><?= $value->tgl_berita ?></td>
                                        <td>
                                            <a href="<?= base_url('berita/edit/' . $value->id_berita); ?>" class=" btn btn-sm btn-success mb-1"><i class="far fa-fw fa-edit"></i> Edit </a>
                                            <a href="<?= base_url('berita/hapus/' . $value->id_berita); ?>" onclick="return confirm('Apakah Data Ini Ingin Dihapus? ')" class=" btn btn-sm btn-danger"><i class="far fa-fw fa-trash-alt"></i> Hapus </a>
                                        </td>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->