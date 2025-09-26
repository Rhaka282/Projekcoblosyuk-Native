<?php
session_start();
include "koneksi.php";

if (isset($_POST['Gmail'])) {
  $Gmail = $_POST['Gmail'];
  $password = md5($_POST['password']);

  $query = mysqli_query($koneksi, "SELECT * FROM users WHERE Gmail='$Gmail' And password='$password'");
  $cek = mysqli_num_rows($query);

  if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['users'] = [
      'nama' => $data['nama'],
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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>

<body>
  <form method="post">
    <table align="center">
      <tr>
        <td colspan="2" align="center">
          <h3>Login User</h3>
        </td>
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
          <button type="submit">Login</button>
          <a href="daftar.php">Daftar</a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>