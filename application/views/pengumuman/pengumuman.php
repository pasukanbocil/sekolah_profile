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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPengumuman"><i class="fas fa-fw fa-plus"></i> Tambah Pengumuman</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengumuman</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengumuman</th>
                                    <th>Isi Pengumuman</th>
                                    <th>Tanggal Pengumuman</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pengumuman</th>
                                    <th>Isi Pengumuman</th>
                                    <th>Tanggal Pengumuman</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pengumuman as $key => $value) : ?>
                                        <td><?= $i; ?></td>
                                        <td><?= $value->judul_pengumuman; ?></td>
                                        <td><?= $value->isi_pengumuman; ?></td>
                                        <td><?= $value->tgl; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#edit<?= $value->id_pengumuman; ?>"><i class="far fa-fw fa-edit"></i> Edit </button>
                                            <a href="<?= base_url('pengumuman/hapus/' . $value->id_pengumuman); ?>" onclick="return confirm('Apakah Data Ini Ingin Dihapus? ')" class=" btn btn-sm btn-danger"><i class="far fa-fw fa-trash-alt"></i> Hapus </a>
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

<!-- Modal -->
<div class="modal fade" id="newPengumuman" tabindex="-1" role="dialog" aria-labelledby="newPengumumanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPengumumanLabel">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('pengumuman/tambah'); ?>
                <div class="form-group">
                    <label for="">Judul Pengumuman</label>
                    <input class="form-control" type="text" name="judul_pengumuman" placeholder="Silahkan Isi Dengan Judul Pengumuman" required>
                </div>
                <label for="">Isi Pengumuman</label>
                <textarea class="form-control" name="isi_pengumuman" id="" cols="30" rows="10"></textarea>
                <div class="form-group">
                    <label for="">Tanggal Pengumuman</label>
                    <input class="form-control" type="date" name="tgl" placeholder="Silahkan Isi Dengan Tanggal Pengumuman" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Edit Modal -->


<!-- Modal -->
<?php foreach ($pengumuman as $key => $value) : ?>
    <div class="modal fade" id="edit<?= $value->id_pengumuman; ?>" tabindex="-1" role="dialog" aria-labelledby="newPengumumanlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPengumumanLabel">Edit Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('pengumuman/edit/' . $value->id_pengumuman); ?>
                    <div class="form-group">
                        <label for="">Judul Pengumuman</label>
                        <input class="form-control" type="text" name="judul_pengumuman" value="<?= $value->judul_pengumuman; ?>" placeholder="Silahkan Isi Dengan Judul Pengumuman" required>
                    </div>
                    <div class="form-group">
                        <label for="">Isi Pengumuman</label>
                        <textarea class="form-control" name="isi_pengumuman" cols="40" rows="5"><?= $value->isi_pengumuman; ?></textarea>
                    </div>
                    <div class="form group">
                        <label for="">Tanggal Pengumuman</label>
                        <input class="form-control" type="date" name="tgl" value="<?= $value->tgl; ?>" placeholder="Silahkan Isi Dengan Tanggal Pengumuman" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- End Edit Modal -->