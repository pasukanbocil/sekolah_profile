<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Data Siswa</h1>
                        </div>
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('siswa/edit/' . $siswa->id_siswa);
                        ?>
                        <div class="form-group">
                            <label for="">Nomor Induk Sekolah</label>
                            <input class="form-control" type="text" value="<?= $siswa->nisn ?>" name="nisn" placeholder="Silahkan Isi Dengan Nisn">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input class="form-control" type="text" value="<?= $siswa->nama_siswa ?>" name="nama_siswa" placeholder="Silahkan Isi Dengan Nama Siswa">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Tempat Lahir</label>
                                <input class="form-control" type="text" value="<?= $siswa->tempat_lahir ?>" name="tempat_lahir" placeholder="Silahkan Isi Dengan Tempat Lahir">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Tanggal Lahir</label>
                                <input class="form-control" type="date" value="<?= $siswa->tanggal_lahir ?>" name="tanggal_lahir" placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="<?= $siswa->jenis_kelamin ?>"><?= $siswa->jenis_kelamin ?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <select name="jurusan" class="form-control">
                                    <option value="<?= $siswa->jurusan ?>"><?= $siswa->jurusan ?></option>
                                    <option value="MM">Multimedia</option>
                                    <option value="TBSM">Teknik dan Bisnis Sepeda Motor</option>
                                    <option value="AKL">Akuntansi Keuangan Lembaga</option>
                                    <option value="DKV">Desain Komunikasi Visual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="kelas" class="form-control">
                                    <option value="<?= $siswa->kelas ?>"><?= $siswa->kelas ?></option>
                                    <option value="X-">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="<?= $siswa->agama ?>"><?= $siswa->agama ?></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input class="form-control" type="text" value="<?= $siswa->alamat ?>" <?= $siswa->alamat ?>" name="alamat" placeholder="Silahkan Isi Dengan Alamat">
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <img src="<?= base_url('foto_siswa/' . $siswa->foto_siswa) ?>" width="100px" alt="">
                                <input class="form-control" type="file" name="foto_siswa">
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