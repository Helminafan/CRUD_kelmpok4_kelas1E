<?php
 session_start();
     if (!isset($_SESSION["login"])){
      header("Location: login.php");
      exit;
     }
require "function.php";
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM pendaftaran_ujian_kp WHERE id='$id'");
$result = $sql->fetch_assoc();
?>

<title>Preview PDF</title>

<embed src="file/<?= $result['laporan_kp'];?>" type="application/pdf" width="100%" height="100%">