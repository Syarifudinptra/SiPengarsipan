<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <form method="post" action="<?= base_url('kategori/update'); ?>">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">NID</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <input class="form-control disabled" type="text" id="id_kategori" name="id_kategori" value="<?= $datakategori['idkategori']; ?>" readonly required>
                </div>
                <div class="box-footer">
                    <p>nomor identitas paten tidak dapat diubah</p>
                </div>
            </div>

            <div class="form-group">
                <input class="form-control" type="text" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="<?= $datakategori['namakategori']; ?>" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= $datakategori['keterangan']; ?>" required>
            </div>
            <div>
                <button class="btn btn-warning" type="submit" style="margin-top: 20px;" href="<?= base_url('kategori/index') ?>"> << Kembali</button>
                <button class="btn btn-success" type="submit" style="margin-top: 20px;">Update</button>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>