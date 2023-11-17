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
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title" style="font-weight:bold; font-size:30px; margin-left:15px;">About</h3>
            </div>
            <div class="box-body text-left">
                <!-- Gambar -->
                <img src="<?= base_url('images/ktm_arip.jpg'); ?>" alt="Company Logo" style="max-width: 14%; height: auto; margin-right: 20px;">
                <!-- Tulisan -->
                <p style="margin-top: -90px; font-size:110%; font-family:Segoe UI Semibold;">
                    Aplikasi ini dibuat oleh:<br>
                    Nama: Moch Arif Syarifudin Taufiq Putra<br>
                    Prodi: D3-MI PSDKU Kediri<br>
                    NIM: 2131730135<br>
                    Tanggal: 15 November 2023
                </p>
            </div>
            <br><br><br><br><br><br>
        </div>
    </div>
</div>
</div>

</html>