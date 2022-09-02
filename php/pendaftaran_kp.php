<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "function.php";
$id_user = $_SESSION['id'];
$anggota_kelompk = query("SELECT * FROM anggota_kelompok");
$mahasiswa =  query("SELECT * FROM mahasiswa  WHERE id_user = '$id_user'");
$daftar_kp = query("SELECT * FROM pendaftaran_kp");
$username = $_SESSION['username'];
$user = query("SELECT * FROM mahasiswa WHERE nim = $username");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style21.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <title>Document</title>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">Poliwangi</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="pendaftaran_kp.php" class="active">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Pendaftaran KP</span>
        </a>
      </li>
      <li>
        <a href="surat_izin.php">
          <i class="bx bx-box"></i>
          <span class="links_name">Surat Izin KP</span>
        </a>
      </li>
      <li>
        <a href="lembar_kerja.php">
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
        <span class="dashboard">Pendaftaran KP</span>
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
    <div class="container">

      <div class="tombol">
        <a href="menentukan.php"><button>Menentukkan Kelompok</button></a>
      </div>
      <h2>Ketua</h2>
      <div class="activity-data">
        <div class="box1">
          <div class="data names">
            <span class="data-title">Name</span>
            <?php foreach ($anggota_kelompk as $tmb) : ?>
              <span class="data-list"><?= $tmb["nama_anggota"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data email">
            <span class="data-title">Nim</span>
            <?php foreach ($anggota_kelompk as $tmb) : ?>
              <span class="data-list"><?= $tmb["nim"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data status">
            <span class="data-title">Status</span>
            <?php foreach ($anggota_kelompk as $tmb) : ?>
              <span class="data-list">
                <a href="update_menentukan.php?id=<?= $tmb["id"]; ?>"><button class="update">Update</button></a>
                <a href="hapus.php?id=<?= $tmb["id"]; ?>"><button class="delete">delete</button></a>
              </span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="tombol">
        <a href="tambah_anggota1.php"><button>Tambah Kelompok</button></a>
      </div>
      <h2>Kelompok</h2>
      <div class="activity-data">
        <div class="box1">
          <div class="data names">
            <span class="data-title">Name</span>
            <?php foreach ($mahasiswa as $tmb) : ?>
              <span class="data-list"><?= $tmb["nama_mahasiswa"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data email">
            <span class="data-title">Nim</span>
            <?php foreach ($mahasiswa as $tmb) : ?>
              <span class="data-list"><?= $tmb["nim"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data kelas">
            <span class="data-title">kelas</span>
            <?php foreach ($mahasiswa as $tmb) : ?>
              <span class="data-list"><?= $tmb["kelas"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data Email">
            <span class="data-title">Email</span>
            <?php foreach ($mahasiswa as $tmb) : ?>
              <span class="data-list"><?= $tmb["email"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data alam">
            <span class="data-title">alamat</span>
            <?php foreach ($mahasiswa as $tmb) : ?>
              <span class="data-list"><?= $tmb["alamat"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data status">
            <span class="data-title">Status</span>
            <?php foreach ($mahasiswa as $tmb) : ?>
              <span class="data-list">
                <a href="update_anggota.php?id=<?= $tmb["id"]; ?>"><button class="update">Update</button></a>
                <a href="hapus_mahasiswa.php?id=<?= $tmb["id"]; ?>"><button class="delete">delete</button></a>
              </span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="tombol">
        <a href="daftar_kp.php"><button> daftar kp</button></a>
      </div>
      <div class="activity-data">
        <div class="box">
          <div class="data name">
            <span class="data-title">No Pendaftaran</span>
            <?php foreach ($daftar_kp as $dfp) : ?>
              <span class="data-list"><?= $dfp["id"]; ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data name">
            <span class="data-title">Tempat KP</span>
            <?php foreach ($daftar_kp as $dfp) : ?>
              <span class="data-list"><?= $dfp["tempat_kp"]; ?></span>
            <?php endforeach; ?>

          </div>
          <div class="data alamat">
            <span class="data-title">Alamat KP</span>
            <?php foreach ($daftar_kp as $dfp) : ?>
              <span class="data-list"><?= $dfp["alamat_kp"]; ?></span>
            <?php endforeach; ?>

          </div>
          <div class="data joined">
            <span class="data-title">Tangal Mulai</span>
            <?php foreach ($daftar_kp as $dfp) : ?>
              <span class="data-list"><?php $tanggal = $dfp["tanggal_mulai"];
                                      echo date("d-M-Y", strtotime($tanggal)) ?></span>
            <?php endforeach; ?>
          </div>
          <div class="data proposal">
            <span class="data-title">Proposal</span>
            <?php foreach ($daftar_kp as $dfp) : ?>
              <a href="preview_prop.php?id=<?= $dfp['id']; ?>"><span class="data-list"><i class='bx bx-file'></i></span></a>
            <?php endforeach; ?>
          </div>
          <div class="data status">
            <span class="data-title">Aksi</span>
            <?php foreach ($daftar_kp as $dfp) : ?>
              <span class="data-list">
                <a href="update_pendaftar.php?id=<?= $dfp["id"]; ?>"><button class="update">Update</button></a>
                <a href="hapus_pendaftaran.php?id=<?= $dfp["id"]; ?>"><button class="delete">delete</button></a>
              </span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- isi end -->
</body>

</html>