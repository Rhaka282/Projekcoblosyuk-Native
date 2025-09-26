<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Pendaftaran</title>
</head>

<body>
  <?php
  if (isset($_POST['Gmail'])) {
    $nama = $_POST['nama'];
    $Gmail = $_POST['Gmail'];
    $password = md5($_POST['password']); // masih pakai md5 sesuai kodinganmu

    // Cek apakah Gmail sudah ada di database
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE Gmail='$Gmail'");
    if (mysqli_num_rows($cek) > 0) {
      echo '<script>
        alert("Gmail sudah terdaftar. Silahkan gunakan Gmail lain atau login.");
        window.location.href = "daftar.php";
      </script>';
    } else {
      // Kalau belum ada, baru daftar
      $query = mysqli_query($koneksi, "INSERT INTO users(nama, Gmail, password) VALUES('$nama','$Gmail','$password')");
      if ($query) {
        echo '<script>
          alert("Selamat Anda Sudah Terdaftar. Silahkan Login");
          window.location.href = "login.php";
        </script>';
      } else {
        echo '<script>alert("Pendaftaran Gagal.")</script>';
      }
    }
  }
  ?>

  <form method="post" action="">
    <table align="center">
      <tr>
        <td colspan="2" align="center">
          <h3>Pendaftaran User</h3>
        </td>
      </tr>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" required></td>
      </tr>
      <tr>
        <td>Gmail</td>
        <td><input type="text" name="Gmail" required></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" required></td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="submit">Daftar User</button>
          <a href="index.php">Login</a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>