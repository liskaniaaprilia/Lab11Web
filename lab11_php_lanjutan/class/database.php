<?php
// Konfigurasi database
$host = "localhost"; // Ganti dengan nama host MySQL Anda
$username = "root"; // Ganti dengan nama pengguna MySQL Anda
$password = ""; // Ganti dengan kata sandi MySQL Anda
$database = "latihan-1"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk menambahkan barang ke database
function tambahBarang($gambar, $nama, $kategori, $harga_jual, $harga_beli, $stok, $aksi) {
    global $conn;

    $sql = "INSERT INTO data_barang (gambar, nama, kategori, harga_jual, harga_beli, stok, aksi) VALUES ('$gambar', '$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$aksi')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


// Fungsi untuk mengupdate barang di database
function updateBarang($gambar, $nama, $kategori, $harga_jual, $harga_beli, $stok) {
    global $conn;

    $sql = "UPDATE barang SET gambar = '$gambar', nama = '$nama', kategori = '$kategori', harga_jual = '$harga_jual', harga_beli = '$harga_beli', stok = '$stok' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menghapus barang dari database
function hapusBarang($id) {
    global $conn;

    $sql = "DELETE FROM barang WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Menutup koneksi database
function tutupKoneksi() {
    global $conn;
    $conn->close();
}
?>
