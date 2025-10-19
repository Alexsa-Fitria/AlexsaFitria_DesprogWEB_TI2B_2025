<?php
// (BARIS BARU) -> Mulai session
session_start();
// (BARIS BARU) -> Hapus semua data di dalam session yang ada
session_unset();
// (BARIS BARU) -> Hancurkan sessionnya
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS - Biodata Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>BIODATA MAHASISWA POLITEKNIK NEGERI MALANG</h1>
    <img src="profile2.jpg" alt="Foto Profil" class="profile-pic">
    <h3>FOTO PROFIL</h3>

    <form action="halaman2.php" method="POST">
        <table>
            <tr>
                <td>NAMA LENGKAP</td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap" required></td>
            </tr>
             <tr>
                <td>EMAIL</td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td><input type="text" id="kelas" name="kelas" required></td>
            </tr>
            <tr>
                <td>JURUSAN</td>
                <td><input type="text" id="jurusan" name="jurusan" required></td>
            </tr>
            <tr>
                <td>NAMA KAMPUS</td>
                <td><input type="text" id="nama_kampus" name="nama_kampus" value="Politeknik Negeri Malang" required></td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td><input type="date" id="tanggal_lahir" name="tanggal_lahir" required></td>
            </tr>
            <tr>
                <td>TEMPAT LAHIR</td>
                <td><input type="text" id="tempat_lahir" name="tempat_lahir" required></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td class="radio-group">
                    <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required> <label for="laki">Laki-laki</label>
                    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan"> <label for="perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>AGAMA</td>
                <td>
                    <select id="agama" name="agama" required>
                        <option value="">-- Pilih Agama --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>GOLONGAN DARAH</td>
                <td class="radio-group">
                    <input type="radio" id="a" name="gol_darah" value="A" required> <label for="a">A</label>
                    <input type="radio" id="b" name="gol_darah" value="B"> <label for="b">B</label>
                    <input type="radio" id="ab" name="gol_darah" value="AB"> <label for="ab">AB</label>
                    <input type="radio" id="o" name="gol_darah" value="O"> <label for="o">O</label>
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><textarea id="alamat" name="alamat" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td>KOTA</td>
                <td><input type="text" id="kota" name="kota" required></td>
            </tr>
            <tr>
                <td>PROVINSI</td>
                <td><input type="text" id="provinsi" name="provinsi" required></td>
            </tr>
            <tr>
                <td>KEWARGANEGARAAN</td>
                <td><input type="text" id="kewarganegaraan" name="kewarganegaraan" required></td>
            </tr>
             <tr>
                <td>NOMOR TELEPON</td>
                <td><input type="text" id="no_telp" name="no_telp" required></td>
            </tr>
        </table>

        <div class="action-buttons">
            <button type="button" id="btn-tampilkan" class="btn btn-secondary">Tampilkan</button>
            <button type="submit" class="btn">Next</button>
        </div>
    </form>

    <div id="hasil-tampil" style="display: none;">
        <h2>Hasil Biodata Sementara:</h2>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#btn-tampilkan").click(function(){
        var nama = $("#nama_lengkap").val();
        var email = $("#email").val();
        var kelas = $("#kelas").val();
        var jurusan = $("#jurusan").val();
        var kampus = $("#nama_kampus").val();
        var tgl_lahir = $("#tanggal_lahir").val();
        var tempat_lahir = $("#tempat_lahir").val();
        var jk = $("input[name='jenis_kelamin']:checked").val();
        var agama = $("#agama").val();
        var gol_darah = $("input[name='gol_darah']:checked").val();
        var alamat = $("#alamat").val();
        var kota = $("#kota").val();
        var provinsi = $("#provinsi").val();
        var negara = $("#kewarganegaraan").val();
        var telp = $("#no_telp").val();

        var hasilHtml = "<table>" +
            "<tr><td>Nama Lengkap:</td><td>" + (nama || '') + "</td></tr>" +
            "<tr><td>Email:</td><td>" + (email || '') + "</td></tr>" +
            "<tr><td>Kelas:</td><td>" + (kelas || '') + "</td></tr>" +
            "<tr><td>Jurusan:</td><td>" + (jurusan || '') + "</td></tr>" +
            "<tr><td>Kampus:</td><td>" + (kampus || '') + "</td></tr>" +
            "<tr><td>Tanggal Lahir:</td><td>" + (tgl_lahir || '') + "</td></tr>" +
            "<tr><td>Tempat Lahir:</td><td>" + (tempat_lahir || '') + "</td></tr>" +
            "<tr><td>Jenis Kelamin:</td><td>" + (jk || '') + "</td></tr>" +
            "<tr><td>Agama:</td><td>" + (agama || '') + "</td></tr>" +
            "<tr><td>Gol. Darah:</td><td>" + (gol_darah || '') + "</td></tr>" +
            "<tr><td>Alamat:</td><td>" + (alamat || '') + "</td></tr>" +
            "<tr><td>Kota:</td><td>" + (kota || '') + "</td></tr>" +
            "<tr><td>Provinsi:</td><td>" + (provinsi || '') + "</td></tr>" +
            "<tr><td>Kewarganegaraan:</td><td>" + (negara || '') + "</td></tr>" +
            "<tr><td>No. Telepon:</td><td>" + (telp || '') + "</td></tr>" +
            "</table>";

        $("#hasil-tampil").html(hasilHtml).fadeIn("slow");
    });
});
</script>

</body>
</html>