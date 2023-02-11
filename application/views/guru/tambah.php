<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Data Guru</h1>
                        </div>
                        <?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('guru/tambah');
                        ?>
                        <div class="form-group">
                            <label for="">Nama Guru</label>
                            <input class="form-control" type="text" name="nama_guru" placeholder="Silahkan Isi Dengan Nama Guru">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Tempat Lahir</label>
                                <input class="form-control" type="text" name="tempat_lahir" placeholder="Silahkan Isi Dengan Tempat Lahir">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Perhitungan</label>
                            <input class="form-control" type="date" name="tahun_perhitungan" placeholder="Tahun Perhitungan">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Unik Pendidik dan Tenaga Kependidikan</label>
                            <input class="form-control" type="text" name="nuptk" placeholder="Silahkan Isi Dengan NUPTK">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Instansi Induk</label>
                            <input class="form-control" type="text" name="instansi_induk" placeholder="Silahkan Isi Dengan Instansi Induk">
                        </div>
                        <div class="form-group">
                            <label for="">Pendidikan</label>
                            <input class="form-control" type="text" name="ijasah_terakhir" placeholder="Silahkan Isi Dengan Pendidikan">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input class="form-control" type="text" name="alamat" placeholder="Silahkan Isi Dengan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="">Tugas Tambahan</label>
                            <input class="form-control" type="text" name="tugas_tambahan" placeholder="Silahkan Isi Dengan Tugas Tambahan">
                        </div>
                        <div class="form-group">
                            <label for="">Mata Pelajaran</label>
                            <select name="id_mapel" class="form-control">
                                <option value="">--Pilih Mata Pelajaran--</option>
                                <?php foreach ($matpel as $key => $value) : ?>
                                    <option value="<?= $value->id_mapel ?>"><?= $value->nama_mapel ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Foto</label>
                            <input class="form-control" type="file" name="foto_guru" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-success">Reset</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>