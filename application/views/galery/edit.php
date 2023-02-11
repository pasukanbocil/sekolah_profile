<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Galery</h1>
                        </div>
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-danger alert-dismissible">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
                        }

                        echo form_open_multipart('galery/edit/' . $galery->id_galery);
                        ?>
                        <div class="form-group">
                            <label for="">Nama Galery</label>
                            <input class="form-control" type="text" value="<?= $galery->nama_galey ?>" name="nama_galey" placeholder="Silahkan Isi Dengan Nama Galery">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label><br>
                            <img src="<?= base_url('sampul/' . $galery->sampul) ?>" width="500px" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Ganti Sampul</label>
                            <input class="form-control" type="file" name="sampul">
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