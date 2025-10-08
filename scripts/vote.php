<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['users'])) {
  header('location:login.php');
  exit;
}

$voter_id = $_SESSION['users']['nama']; // atau 'id' kalau pakai ID
$pilihan = $_POST['vote']; // paslon1, paslon2, paslon3

$valid = ['paslon1', 'paslon2', 'paslon3'];
if (!in_array($pilihan, $valid)) {
  die("Pilihan tidak valid.");
}

// Cek apakah sudah memilih
$cek = $koneksi->prepare("SELECT COUNT(*) FROM save WHERE voter_id = ?");
$cek->bind_param("s", $voter_id);
$cek->execute();
$cek->bind_result($jumlah);
$cek->fetch();
$cek->close();

if ($jumlah > 0) {
  die("❌ Anda sudah memilih sebelumnya.");
}

// Simpan ke tabel save
$stmt = $koneksi->prepare("INSERT INTO save (voter_id, general_election, check_val) VALUES (?, ?, ?)");
$check_val = "valid"; // atau bisa kosong, tergantung kebutuhan
$stmt->bind_param("sss", $voter_id, $pilihan, $check_val);
$stmt->execute();

echo "✅ Terima kasih sudah memilih!";
