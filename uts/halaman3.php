<?php
session_start();

if (!isset($_SESSION['biodata'])) {
    header("Location: index.php");
    exit();
}

$biodata = $_SESSION['biodata'];
$transaksi = isset($_SESSION['transaksi']) ? $_SESSION['transaksi'] : [];

$total_pemasukan = 0;
$total_pengeluaran = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS - Ringkasan Keuangan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Detail Transaksi dan Ringkasan Keuangan</h2>
    
    <h3>Detail Mahasiswa</h3>
    <table>
        <tr>
            <td>Nama</td>
            <td><?php echo htmlspecialchars($biodata['nama_lengkap']); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo htmlspecialchars($biodata['email']); ?></td>
        </tr>
         <tr>
            <td>Kelas</td>
            <td><?php echo htmlspecialchars($biodata['kelas']); ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td><?php echo htmlspecialchars($biodata['jurusan']); ?></td>
        </tr>
        <tr>
            <td>Kampus</td>
            <td><?php echo htmlspecialchars($biodata['nama_kampus']); ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?php echo htmlspecialchars($biodata['tanggal_lahir']); ?></td>
        </tr>
    </table>

    <h3>Ringkasan Keuangan</h3>
    <table>
        <tr style="background-color:#8ab8ea; color:white;">
            <td style="width:40%;">Deskripsi</td>
            <td style="width:20%;">Jenis</td>
            <td style="width:40%;">Jumlah</td>
        </tr>
        <?php foreach ($transaksi as $t) : ?>
            <tr>
                <td><?php echo htmlspecialchars($t['deskripsi']); ?></td>
                <td><?php echo htmlspecialchars($t['jenis']); ?></td>
                <td>Rp <?php echo number_format($t['jumlah'], 0, ',', '.'); ?></td>
            </tr>
            <?php
            if ($t['jenis'] == 'Pemasukan') {
                $total_pemasukan += $t['jumlah'];
            } else {
                $total_pengeluaran += $t['jumlah'];
            }
            ?>
        <?php endforeach; ?>
    </table>

    <h3>Total</h3>
    <table>
        <tr>
            <td>Total Pemasukan</td>
            <td><strong>Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></strong></td>
        </tr>
        <tr>
            <td>Total Pengeluaran</td>
            <td><strong>Rp <?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></strong></td>
        </tr>
        <tr>
            <td>Saldo Akhir</td>
            <td><strong>Rp <?php echo number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.'); ?></strong></td>
        </tr>
    </table>

    <div class="action-buttons">
        <a href="halaman2.php" class="btn">Tambahkan Transaksi Lain</a>
    </div>
    
</div>

</body>
</html>