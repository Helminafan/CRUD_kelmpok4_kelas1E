<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "function.php";
$username = $_SESSION['username'];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE nim = $username");
$daftar_kp = query("SELECT * FROM pendaftaran_kp");
$profil = query("SELECT * FROM user");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style20.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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
      <ul class="lihat">
        <li>
          <a href="daftarKetua.php">
            <span class="sub-menu">Menentukan Ketua</span>
          </a>
        </li>
        <li>
          <a href="anggota.php">
            <span class="sub-menu">Daftar Anggota</span>
          </a>
        </li>
        <li>
          <a href="pendaftar.php" class="active">
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
          <?php foreach ($mahasiswa as $mhs) : ?>
            <span class="admin_name"><?= $mhs['nama_mahasiswa']; ?></span>
            <i class="bx bx-chevron-down"></i>
          <?php endforeach; ?>
        </a>
      </div>
    </nav>
    <!-- isi -->
    <div class="container">
      <div class="boxin">
        <div class="tombol">
          <a href="daftar_kp.php">
            <button>Daftar KP</button>
          </a>
        </div>
        <div class="activity-data">
          <div class="box">
            <h2>Daftar KP</h2>
            <div class="boxn">
              <div class="data name">
                <span class="data-title">No Pendaftaran</span>
                <?php foreach ($daftar_kp as $dfp) : ?>
                  <span class="data-list  kp"><?= $dfp["id"]; ?></span>
                <?php endforeach; ?>
              </div>
              <div class="data name">
                <span class="data-title">Tempat KP</span>
                <?php foreach ($daftar_kp as $dfp) : ?>
                  <span class="data-list  kp"><?= $dfp["tempat_kp"]; ?></span>
                <?php endforeach; ?>
              </div>
              <div class="data alamat">
                <span class="data-title">Alamat KP</span>
                <?php foreach ($daftar_kp as $dfp) : ?>
                  <span class="data-list  kp"><?= $dfp["alamat_kp"]; ?></span>
                <?php endforeach; ?>
              </div>
              <div class="data joined">
                <span class="data-title">Tangal Mulai</span>
                <?php foreach ($daftar_kp as $dfp) : ?>
                  <span class="data-list  kp"><?php $tanggal = $dfp["tanggal_mulai"];
                                              echo date("d-M-Y", strtotime($tanggal)) ?></span>
                <?php endforeach; ?>
              </div>
              <div class="data proposal">
                <span class="data-title">Proposal</span>
                <?php foreach ($daftar_kp as $dfp) : ?>
                  <a href="preview_prop.php?id=<?= $dfp['id']; ?>"><span class="data-list kp"><i class='bx bx-file'></i></span></a>
                <?php endforeach; ?>
              </div>
              <div class="data status">
                <span class="data-title">Aksi</span>
                <?php foreach ($daftar_kp as $dfp) : ?>
                  <span class="data-list  kp">
                    <a href="update_pendaftar.php?id=<?= $dfp["id"]; ?>"><button class="update">Update</button></a>
                    <a href="hapus_pendaftaran.php?id=<?= $dfp["id"]; ?>"><button class="delete">delete</button></a>
                  </span>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- isi end -->
  <script>
    $(".pend_btn").click(function() {
      $(".sidebar .nav-links .klik").toggleClass("klak");
      $(".sidebar .nav-links .lihat").toggleClass("show");
      $(".sidebar .nav-links .bxs-down-arrow").toggleClass("putar");
    });
  </script>
</body>

</html>