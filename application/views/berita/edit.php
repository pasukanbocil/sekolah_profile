<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Berita</h1>
                        </div>
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('berita/edit/' . $berita->id_berita);
                        ?>
                        <div class="form-group">
                            <label for="">Judul Berita</label>
                            <input class="form-control" type="text" value="<?= $berita->judul_berita ?>" name="judul_berita" placeholder="Silahkan Isi Dengan Judul Berita">
                        </div>
                        <div class="form-group">
                            <label for="">Isi Berita</label>
                            <textarea class="form-control" name="isi_berita" cols="40" rows="5"><?= $berita->isi_berita ?></textarea>
                            <!-- <input class="form-control" type="text" name="isi_berita" placeholder="Silahkan Isi Dengan Judul Berita"> -->
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <img src="<?= base_url('gambar_berita/' . $berita->gambar_berita) ?>" width="100px" alt="">
                            <input class="form-control" type="file" name="gambar_berita">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="">Tanggal Berita</label>
                                <input class="form-control" type="date" value="<?= $berita->tgl_berita ?>" name="tgl_berita">
                            </div>
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