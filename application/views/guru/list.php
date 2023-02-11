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
            <a href="<?= base_url('guru/tambah'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Tambah Guru</a>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tahun Perhitungan</th>
                                    <th>Nomor Unik Pendidik dan Tenaga Kependidikan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Instansi Induk</th>
                                    <th>Pendidikan</th>
                                    <th>Alamat</th>
                                    <th>Tugas Tambahan</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Foto</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tahun Perhitungan</th>
                                    <th>Nomor Unik Pendidik dan Tenaga Kependidikan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Instansi Induk</th>
                                    <th>Pendidikan</th>
                                    <th>Alamat</th>
                                    <th>Tugas Tambahan</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($guru as $key => $value) : ?>
                                        <td><?= $i; ?></td>
                                        <td><?= $value->nama_guru; ?></td>
                                        <td><?= $value->tempat_lahir; ?></td>
                                        <td><?= $value->tanggal_lahir; ?></td>
                                        <td><?= $value->tahun_perhitungan; ?></td>
                                        <td><?= $value->nuptk; ?></td>
                                        <td><?= $value->jenis_kelamin; ?></td>
                                        <td><?= $value->instansi_induk; ?></td>
                                        <td><?= $value->ijasah_terakhir; ?></td>
                                        <td><?= $value->alamat; ?></td>
                                        <td><?= $value->tugas_tambahan; ?></td>
                                        <td><?= $value->nama_mapel; ?></td>
                                        <td><img src="<?= base_url('foto_guru/' . $value->foto_guru); ?>" width="100px"></td>
                                        <td>
                                            <a href="<?= base_url('guru/edit/' . $value->id_guru); ?>" class=" btn btn-sm btn-success mb-1"><i class="far fa-fw fa-edit"></i> Edit </a>
                                            <a href="<?= base_url('guru/hapus/' . $value->id_guru); ?>" onclick="return confirm('Apakah Data Ini Ingin Dihapus? ')" class=" btn btn-sm btn-danger"><i class="far fa-fw fa-trash-alt"></i> Hapus </a>
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