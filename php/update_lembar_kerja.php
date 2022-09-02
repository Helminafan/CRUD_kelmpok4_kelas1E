<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "function.php";
$id = $_GET['id'];
$lembar = query("SELECT lembar_kerja.id, file, tanggal,anggota_kelompok_id, nama_anggota  FROM lembar_kerja INNER JOIN anggota_kelompok ON lembar_kerja.anggota_kelompok_id = anggota_kelompok.id")[0];
if (isset($_POST["submit"])) {
  if (update_lembar_kerja($_POST) > 0) {
    echo "<script>
                alert ('data berhasil ditambah');
                document.location.href = 'lembar_kerja.php'
            </script>";
  } 
  // else {
  //   echo "<script>
  //               alert ('data gagal ditambah');
  //               document.location.href = 'lembar_kerja.php'
  //           </script>";
  // }
}
$username = $_SESSION['username'];
$user = query("SELECT * FROM mahasiswa WHERE nim = $username");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/daftar_ujian.css">
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">Poliwangi</span>
    </div>
    <ul class="nav-links">
      <li class="pend_btn">
        <a href="#" class="pend_btn klik">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name pend_btn">Pendaftaran KP</span>
          <i class="bx bxs-down-arrow pend_btn"></i>
        </a>
      </li>
      <ul class="menuS">
        <li>
          <a href="daftarKetua.php">
            <span class="sub-menu">Menentukan Ketua</span>
          </a>
        </li>
        <li>
          <a href="anggota.php" class="active">
            <span class="sub-menu">Daftar Anggota</span>
          </a>
        </li>
        <li>
          <a href="pendaftar.php">
            <span class="sub-menu">Daftar KP</span>
          </a>
        </li>
      </ul>
      <li>
        <a href="surat_izin.php">
          <i class="bx bx-box"></i>
          <span class="links_name">Surat Izin KP</span>
        </a>
      </li>
      <li>
        <a href="lembar_kerja.php" class="active">
          <i class="bx bx-list-ul"></i>
          <span class="links_name">Lembar Kerja KP</span>
        </a>
      </li>
      <li>
        <a href="pendaftran_ujian.php">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="links_name">Pendaftaran Ujian KP</span>
        </a>
      </li>
      <li>
        <a href="jadwal.php">
          <i class="bx bx-coin-stack"></i>
          <span class="links_name">Jadwal Ujian KP</span>
        </a>
      </li>
      <li>
        <a href="nilai.php">
          <i class="bx bx-book-alt"></i>
          <span class="links_name"> Nilai </span>
        </a>
      </li>
      <li class="log_out">
        <a href="logout.php">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Lembar Kerja KP</span>
      </div>
      <div class="profile-details">
        <a href="profil.php ">
          <?php foreach ($user as $mhs) : ?>
            <span class="admin_name"><?= $mhs['nama_mahasiswa']; ?></span>
            <i class="bx bx-chevron-down"></i>
          <?php endforeach; ?>
        </a>
      </div>
    </nav>
    <!-- isi -->
    <div class="cont">
      <div class="box-form">
        <div class="title">
          <h1>Lembar Kerja KP </h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id" required value="<?= $lembar["id"]; ?>" />
          <input type="hidden" name="file_lama" id="id" value="<?= $lembar["file"]; ?>" />
          <div class="box1">
            <div class="input">
              <label for="tanggal">Tanggal Upload</label>
              <input type="date" name="tanggal" id="tanggal" required value="<?= $lembar["tanggal"]; ?>" />
            </div>
            <div class="input">
              <label for="dosen">Ketua</label>
              <select name="anggota_kelompok_id" id="dosen" required>
                <option value="">Pilih ketua</option>
                <?php
                $lihat = mysqli_query($conn, "SELECT * FROM anggota_kelompok");
                while ($role = mysqli_fetch_assoc($lihat)) {
                  echo "<option value=$role[id]> $role[nama_anggota] </option>";
                }
                ?>
              </select>
            </div>
            <div class="input">
              <label for="file">File Lembar kerja</label>
              <input class="file" type="file" name="file" id="file" />
            </div>
            <div class="input">
              <label>View File</label>
              <button class="view" name="submit"><i class='bx bxs-file-find'></i>Upload File</button>
            </div>
          </div>
        </form>
      </div>

    </div>
    </div>
  </section>
  <script>
    $(".pend_btn").click(function() {
      $(".sidebar .nav-links .klik").toggleClass("klak");
      $(".sidebar .nav-links .menuS").toggleClass("show");
      $(".sidebar .nav-links .bxs-down-arrow").toggleClass("putar");
    });
  </script>
  <!-- isi end -->
</body>

</html>