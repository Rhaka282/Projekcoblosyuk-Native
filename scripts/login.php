<?php
session_start();
include "koneksi.php";

if (isset($_POST['Gmail'])) {
  $Gmail = $_POST['Gmail'];
  $password = md5($_POST['password']);

  $query = mysqli_query($koneksi, "SELECT * FROM users WHERE Gmail='$Gmail' AND password='$password'");
  $cek = mysqli_num_rows($query);

  if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['users'] = [
      'username' => $data['username'],
      'Gmail' => $data['Gmail']
    ];

    echo '<script>
        alert("Login Berhasil");
        window.location.href = "index.php";
    </script>';
    exit;
  } else {
    echo '<script>alert("Gmail/Password Tidak Sesuai.");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login User</title>
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

    .login-box {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      width: 350px;
      padding: 30px;
      text-align: center;
    }

    .login-box h3 {
      margin-bottom: 20px;
      color: #d32f2f;
      font-size: 22px;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
      width: 90%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .login-box button {
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

    .login-box button:hover {
      background-color: #b71c1c;
    }

    .login-box a {
      display: inline-block;
      margin-top: 10px;
      color: #d32f2f;
      text-decoration: none;
      font-weight: bold;
    }

    .login-box a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="login-box">
    <h3>🔴 Login User ⚪</h3>
    <form method="post">
      <input type="text" name="Gmail" placeholder="Masukkan Gmail" required><br>
      <input type="password" name="password" placeholder="Masukkan Password" required><br>
      <button type="submit">Login</button>
      <a href="daftar.php">Belum punya akun? Daftar</a>
    </form>
  </div>

</body>

</html>