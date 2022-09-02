<?php 
require 'function.php';

   $id = $_GET["id"];
   if ( hapus_pendaftaran_ujian($id) > 0) {
    echo "<script>
                alert ('data berhasil dihapus');
                document.location.href = 'pendaftran_ujian.php'
            </script>";
            
        }
        else {
            echo "<script>
                alert ('data gagal dihapus');
                document.location.href = 'pendaftran_ujian.php'
            </script>";
        }
