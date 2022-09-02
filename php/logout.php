<?php 
session_start();
$_SESSION =[];
session_unset();
session_unset();

header("Location: login.php");
exit;
?>