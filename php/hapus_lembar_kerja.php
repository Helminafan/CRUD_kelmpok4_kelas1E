<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';

$id = $_GET["id"];
if (hapus_lembar_kerja($id) > 0) {
    echo "<script>
                alert ('data berhasil dihapus');
                document.location.href = 'lembar_kerja.php'
            </script>";
} else {
    echo "<script>
                alert ('data gagal dihapus');
                document.location.href = 'lembar_kerja.php'
            </script>";
}
