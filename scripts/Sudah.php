<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['users'])) {
  header('location:login.php');
  exit;
}


$nama_user = $_SESSION['users']['username'];
$pilihan = $_POST['vote'];

// mapping pilihan ke id paslon
$map = ['paslon1' => 1, 'paslon2' => 2, 'paslon3' => 3];
if (!array_key_exists($pilihan, $map)) {
  die("Pilihan tidak valid.");
}
$id_paslon = $map[$pilihan];


$cek = $koneksi->prepare("SELECT COUNT(*) FROM vote_log WHERE nama_user = ?");
$cek->bind_param("s", $nama_user);
$cek->execute();
$cek->bind_result($jumlah);
$cek->fetch();
$cek->close();

if ($jumlah > 0) {
  die("❌ Anda sudah memilih sebelumnya.");
}

$stmt = $koneksi->prepare("INSERT INTO vote_log (nama_user, id_paslon, waktu_vote) VALUES (?, ?, NOW())");
$stmt->bind_param("si", $nama_user, $id_paslon);
$stmt->execute();

echo "✅ Terima kasih sudah memilih!";
