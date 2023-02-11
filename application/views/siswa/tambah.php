<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Data Siswa</h1>
                        </div>
                        <?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('siswa/tambah');
                        ?>
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input class="form-control" type="text" name="nisn" placeholder="Silahkan Isi Dengan Nama NISN">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input class="form-control" type="text" name="nama_siswa" placeholder="Silahkan Isi Dengan Nama Siswa">
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
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="jurusan" class="form-control">
                                <option value="">--Pilih Jurusan--</option>
                                <option value="MM">Multimedia</option>
                                <option value="TBSM">Teknik dan Bisnis Sepeda Motor</option>
                                <option value="AKL">Akuntansi Keuangan Lembaga</option>
                                <option value="DKV">Desain Komunikasi Visual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas" class="form-control">
                                <option value="">--Pilih Kelas--</option>
                                <option value="X-">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Agama</label>
                            <select name="agama" class="form-control">
                                <option value="">--Pilih Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input class="form-control" type="text" name="alamat" placeholder="Silahkan Isi Dengan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input class="form-control" type="file" name="foto_siswa" required>
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