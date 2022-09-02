<?php
 session_start();
     if (!isset($_SESSION["login"])){
      header("Location: login.php");
      exit;
     }
require "function.php";
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM pendaftaran_kp WHERE id='$id'");
$result = $sql->fetch_assoc();
?>

<title>Preview PDF</title>

<embed src="file/<?= $result['proposal'];?>" type="application/pdf" width="100%" height="100%">