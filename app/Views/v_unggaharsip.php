<div class="row">
    <div class="col-md-12">
        <div class="box box-primary ">

            <div class="box-header with-border">
                <h3 class="box-title">Arsip Surat</h3>
                <div class="box-tools pull-right">
                </div>
            </div>

            <div class="box-body table-responsive offset-1 d-flex col-10">
                <form method="post" action="<?= base_url('arsip/insert'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nomorsurat">Nomor Surat</label>
                        <input class="form-control" type="text" id="nomorsurat" name="nomorsurat" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option value="" disabled selected>Kategori</option>
                            <?php foreach ($kategori as $kategori) { ?>
                                <option value="<?= $kategori['idkategori']; ?>"><?= $kategori['namakategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nomorsurat">Judul</label>
                        <input class="form-control" type="text" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="file">File Surat (PDF)</label>
                        <input type="file" name="file" id="file" accept=".pdf" class="form-control mt-3" required>
                    </div>
                    <div class="form-group">
                        <a href="<?= base_url('arsip') ?>" class="btn btn-warning">
                            << Kembali</a>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>