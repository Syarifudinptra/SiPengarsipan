<html>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary ">

            <div class="box-header with-border">
                <h3 class="box-title">Arsip Surat</h3>
                <div class="box-tools pull-right">
                </div>
            </div>

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }

            if (session()->getFlashdata('gagal')) {
                echo '<div class="alert alert-success alert-dismissible">';
                echo session()->getFlashdata('gagal');
                echo '</div>';
            }
            ?>

            <div class="box-body table-responsive offset-1 d-flex col-10">
                <div class="form-group">
                    <div>
                        <label for="nomorsurat">Nomor Surat : <?= $arsip[0]['nomorsurat']; ?></label>
                    </div>
                    <div>
                        <label for="nomorsurat">Kategori : <?= $arsip[0]['idkategori']; ?></label>
                    </div>
                    <div>
                        <label for="nomorsurat">Judul : <?= $arsip[0]['judul']; ?></label>
                    </div>
                    <div>
                        <label for="nomorsurat">Waktu Unggah : <?= $arsip[0]['waktuarsip']; ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <?php
                    $sanitized = preg_replace('/[^a-zA-Z0-9_\-]/', '', $arsip[0]['nomorsurat']);
                    $filePath = FCPATH . 'uploads/' . $sanitized . '.pdf';

                    if (file_exists($filePath)) {
                    ?>
                        <iframe src="<?= base_url('uploads/') . $sanitized . '.pdf' ?>" height="600" width="1500" frameborder="0"></iframe>
                    <?php
                    } else {
                        echo "File does not exist: $filePath";
                    }
                    ?>
                </div>
                <a href="<?= base_url('arsip') ?>" class="btn btn-success">
                    << Kembali</a>
                        <a href="<?= base_url('uploads/') . $sanitized . '.pdf' ?>" class="btn btn-primary" download="<?= $sanitized ?>.pdf">
                            Download PDF
                        </a>
                        <a href="<?= base_url('arsip/edit') ?>" class="btn btn-warning">Edit/Ganti File</a>
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