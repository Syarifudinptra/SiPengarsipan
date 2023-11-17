<html>

<?php
if (session()->getFlashdata('updaterole')) {
    echo '<div class="alert alert-danger alert-dismissible">';
    echo session()->getFlashdata('updaterole');
    echo '</div>';
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary ">
            <div class="box-header with-border">
                <h3 class="box-title" style="font-weight:bold; font-size:25px;">Kategori Surat</h3>
                <br>
                <h5 style="font-weight:100px;">
                    Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.
                    <br>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.
                </h5>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" onclick="window.location.href='<?= base_url('kategori/tambah') ?>'">
                        <i class="fa fa-plus"> Tambah Kategori Baru</i>
                    </button>
                </div>
            </div>

            <div class="box-body table-responsive offset-1 d-flex col-10">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($datakategori as $kategori): ?>
                            <tr>
                                <td><?=$kategori['idkategori'];?></td>
                                <td><?=$kategori['namakategori'];?></td>
                                <td><?=$kategori['keterangan'];?></td>
                                <td class="action-buttons">
                                    <form method="post" action="<?= base_url('kategori/hapus'); ?>" style="display: inline;" >
                                        <input type="hidden" name="id_kategori" value="<?= $kategori['idkategori']; ?>">
                                        <button type="submit" class="btn btn-danger" style="width:35%;" onclick="return confirmDelete();">Hapus</button>
                                    </form>
                                    <form method="post" action="<?= base_url('kategori/edit'); ?>" style="display: inline;" >
                                        <input type="hidden" name="id_kategori" value="<?= $kategori['idkategori']; ?>">
                                        <button type="submit" class="btn btn-warning " style="width:35%;" >Edit</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Danger Modal</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
            </div>
        </div>
    </div>
</div>
</html>