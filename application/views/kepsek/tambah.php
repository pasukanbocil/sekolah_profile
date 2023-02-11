<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Data Kepala Sekolah</h1>
                        </div>
                        <?php
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('kepsek/tambah');
                        ?>
                        <div class="form-group">
                            <label for="">Nama Kepala Sekolah</label>
                            <input class="form-control" type="text" name="nama_kepsek" placeholder="Silahkan Isi Dengan Nama Kepala Sekolah">
                        </div>
                        <div class="form-group">
                            <label for="">Visi Misi</label>
                            <textarea class="form-control" name="visi_misi" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input class="form-control" type="file" name="foto_kepsek" required>
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