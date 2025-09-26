<?php
session_start();
session_destroy();
header('location:login.php');
?>
<script type="text/javascript">
  alert('Anda Sudah Logout.');
  location.href = "login.php";
</script>