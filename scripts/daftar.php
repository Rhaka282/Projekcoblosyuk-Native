<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran User</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, #ff0000 50%, #ffffff 50%);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }

    .register-box {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      width: 380px;
      padding: 30px;
      text-align: center;
    }

    .register-box h3 {
      margin-bottom: 20px;
      color: #d32f2f;
      font-size: 22px;
    }

    .register-box input[type="text"],
    .register-box input[type="password"] {
      width: 90%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .register-box button {
      width: 95%;
      padding: 10px;
      margin-top: 10px;
      background-color: #d32f2f;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-box button:hover {
      background-color: #b71c1c;
    }

    .register-box a {
      display: inline-block;
      margin-top: 10px;
      color: #d32f2f;
      text-decoration: none;
      font-weight: bold;
    }

    .register-box a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['Gmail'])) {
    $username = $_POST['username'];
    $Gmail = $_POST['Gmail'];
    $password = md5($_POST['password']);

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE Gmail='$Gmail'");
    if (mysqli_num_rows($cek) > 0) {
      echo '<script>
        alert("Gmail sudah terdaftar. Silakan gunakan Gmail lain atau login.");
        window.location.href = "daftar.php";
      </script>';
    } else {
      $query = mysqli_query($koneksi, "INSERT INTO users(username, Gmail, password) VALUES('$username','$Gmail','$password')");
      if ($query) {
        echo '<script>
          alert("Selamat, Anda sudah terdaftar! Silakan login.");
          window.location.href = "login.php";
        </script>';
      } else {
        echo '<script>alert("Pendaftaran gagal.")</script>';
      }
    }
  }
  ?>

  <div class="register-box">
    <h3>🔴 Pendaftaran User ⚪</h3>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Masukkan Nama" required><br>
      <input type="text" name="Gmail" placeholder="Masukkan Gmail" required><br>
      <input type="password" name="password" placeholder="Masukkan Password" required><br>
      <button type="submit">Daftar</button>
      <a href="login.php">Sudah punya akun? Login</a>
    </form>
  </div>
</body>

</html>