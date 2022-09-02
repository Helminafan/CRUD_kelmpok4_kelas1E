<?php
 session_start();
     if (!isset($_SESSION["login"])){
      header("Location: login.php");
      exit;
     }
require "function.php";
$id = $_GET['id'];
$sql = $conn->query("SELECT * FROM lembar_kerja WHERE id='$id'");
$result = $sql->fetch_assoc();
?>
<title>Preview PDF</title>
<embed src="file/<?= $result['file'];?>" type="application/pdf" width="100%" height="100%">