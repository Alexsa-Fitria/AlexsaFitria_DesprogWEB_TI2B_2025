<?php
session_start();

if (isset($_POST['nama_lengkap'])) {
    $_SESSION['biodata'] = [
        'nama_lengkap' => $_POST['nama_lengkap'],
        'email' => $_POST['email'],
        'kelas' => $_POST['kelas'],
        'jurusan' => $_POST['jurusan'],
        'nama_kampus' => $_POST['nama_kampus'],
        'tanggal_lahir' => $_POST['tanggal_lahir'],
        'tempat_lahir' => $_POST['tempat_lahir'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'gol_darah' => $_POST['gol_darah'],
        'alamat' => $_POST['alamat'],
        'kota' => $_POST['kota'],
        'provinsi' => $_POST['provinsi'],
        'kewarganegaraan' => $_POST['kewarganegaraan'],
        'no_telp' => $_POST['no_telp']
    ];
}

if (!isset($_SESSION['transaksi'])) {
    $_SESSION['transaksi'] = [];
}

if (isset($_POST['jenis_transaksi'])) {
    $_SESSION['transaksi'][] = [
        'jenis' => $_POST['jenis_transaksi'],
        'jumlah' => $_POST['jumlah_transaksi'],
        'deskripsi' => $_POST['deskripsi_transaksi']
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS - Pencatatan Keuangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Aplikasi Pencatatan Keuangan Mahasiswa</h2>
    
    <form id="form-transaksi" action="halaman2.php" method="POST">
        <table>
            <tr>
                <td>Jenis Transaksi</td>
                <td>
                    <select name="jenis_transaksi" required>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Transaksi (Rp)</td>
                <td><input type="number" name="jumlah_transaksi" required></td>
            </tr>
            <tr>
                <td>Deskripsi Transaksi</td>
                <td>
                    <textarea id="deskripsi" name="deskripsi_transaksi" rows="3" required></textarea>
                    <small id="deskripsi-error" class="error-message" style="display: none;">Wajib diisi, minimal 10 karakter.</small>
                </td>
            </tr>
        </table>
        <div class="action-buttons">
            <button type="submit" class="btn">Catat Transaksi</button>
        </div>
    </form>

    <?php
    if (!empty($_SESSION['transaksi'])) {
        echo '<div class="action-buttons">';
        echo '<h3>Transaksi Berhasil Dicatat!</h3>';
        echo '<a href="halaman3.php" class="btn btn-secondary">Ringkasan Laporan Keuangan</a>';
        echo '</div>';
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#form-transaksi").submit(function(event){
        var deskripsi = $("#deskripsi").val();
        var errorContainer = $("#deskripsi-error");
        var deskripsiInput = $("#deskripsi");

        if (deskripsi.trim().length <= 10) {
            // Batalkan submit
            event.preventDefault(); 
            
            // Tampilkan pesan error dan tambahkan kelas kotak merah
            errorContainer.show();
            deskripsiInput.addClass('input-error');

        } else {
            // Jika valid, sembunyikan pesan error dan hapus kelas kotak merah
            errorContainer.hide();
            deskripsiInput.removeClass('input-error');
        }
    });
});
</script>
</body>
</html>