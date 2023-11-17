<?php
if (session()->getFlashdata('gagal')) {
    echo '<div class="alert alert-danger alert-dismissible">';
    echo session()->getFlashdata('gagal');
    echo '</div>';
}
?>

<div class="row">
    <div class="col-md-12">
        <form method="post" action="<?= base_url('kategori/storeall'); ?>">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Kategori Baru</h3>
                </div>
                <div class="box-body">

                    <!-- ID Kategori (readonly) -->
                    <div class="form-group">
                        <label for="id_kategori">ID :</label>
                        <input type="text" class="form-control" name="id_kategori" value="<?= $NextID ?>" readonly required>
                    </div>
                    <!-- Nama Kategori -->
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori :</label>
                        <input class="form-control" type="text" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                    </div>
                    <!-- Keterangan -->
                    <div class="form-group">
                        <label for="keterangan">Keterangan :</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
                    </div>
                    <!-- Tombol Kembali dan Simpan -->
                    <div class="form-group">
                        <button class="btn btn-warning" type="submit" style="margin-top: 20px;" href="<?= base_url('kategori/index') ?>"> << Kembali</button>
                        <button class="btn btn-success" type="submit" style="margin-top: 20px;">Simpan</button>
                    </div>
                </div>
                <div class="box-footer">
                </div>
            </div>
        </form>

    </div>
    <div class="col-md-3"></div>
</div>