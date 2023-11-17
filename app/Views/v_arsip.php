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
                <h3 class="box-title" style="font-weight:bold; font-size:25px;">Arsip Surat</h3>
                <br>
                <h5 style="font-weight:100px;">
                    Berikut ini adalah surat-surat yang telah terbit dan siarsipkan.
                    <br>Klik "Lihat" untuk menampilkan surat.
                </h5>
            </div>

            <div class="box-body table-responsive offset-1 d-flex col-10">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $arsip) :
                            $sanitized = preg_replace('/[^a-zA-Z0-9_\-]/', '', $arsip['nomorsurat']);
                        ?>
                            <tr>
                                <td><?= $arsip['nomorsurat']; ?></td>
                                <td><?= $arsip['idkategori']; ?></td>
                                <td><?= $arsip['judul']; ?></td>
                                <td><?= $arsip['waktuarsip']; ?></td>
                                <td class="action-buttons">
                                    <form method="post" action="<?= base_url('arsip/hapus'); ?>" style="display: inline;">
                                        <input type="hidden" name="nomorsurat" value="<?= $arsip['nomorsurat']; ?>">
                                        <button type="submit" class="btn btn-danger" style="width:35%;" onclick="return confirmDelete();">Hapus</button>
                                    </form>
                                    <a href="<?= base_url('uploads/') . $sanitized . '.pdf' ?>" class="btn btn-warning" download="<?= $sanitized ?>.pdf">
                                        Unduh
                                    </a>
                                    <a type="submit" class="btn btn-primary" href="<?= base_url('arsip/lihat/') ?><?= $arsip['id']; ?>">Lihat >></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <button type="button" class="btn btn-primary btn-sm btn-flat" onclick="window.location.href='<?= base_url('arsip/tambah') ?>'">
                    <i class="fa fa-plus"> Arsipkan Surat </i>
                </button>
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