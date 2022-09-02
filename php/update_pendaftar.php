<?php
session_start();
require "function.php";
$id = $_GET['id'];
$updt = query("SELECT * FROM pendaftaran_kp WHERE id = $id")[0];
if (isset($_POST["submit"])) {
  if (update_pendaftaran($_POST) > 0) {
    echo "<script>
                alert ('data berhasil diupdate');
                document.location.href = 'pendaftar.php'
            </script>";
  } else {
    die(update_pendaftaran($data));
    echo "<script>
                alert ('data gagal ditambah');
                document.location.href = 'pendaftar.php'
            </script>";
  }
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
  <link rel="stylesheet" href="../css/style-form.css" />
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
        <a href="pendaftar.php"><i class='bx bxs-chevrons-left'></i></a>
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
    <div class="cont">
      <div class="box-form">
        <div class="title">
          <h1>Pendaftaran</h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id" required value="<?= $updt["id"]; ?>" />
          <input type="hidden" name="file_lama" id="id" value="<?= $updt["proposal"]; ?>" />
          <div class="box1">
            <div class="input">
              <label for="Tempat_KP">Tempat Kerja Praktek</label>
              <input type="text" name="tempat_kp" placeholder="Tempat" id="Tempat_KP" required value="<?= $updt["tempat_kp"]; ?>" />
            </div>
            <div class="input">
              <label for="Alamat_KP">Alamat Kerja Praktek</label>
              <input type="text" name="alamat_kp" placeholder="Alamat" id="Alamat_KP" required value="<?= $updt["alamat_kp"]; ?>" />
            </div>
            <div class="input">
              <label for="Tanggal_Mulai">Tanggal Mulai</label>
              <input type="date" name="tanggal_mulai" placeholder="dd/mm/yyyy" id="Tanggal_Mulai" required value="<?= $updt["tanggal_mulai"]; ?>" />
            </div>
            <div class="input">
              <label for="Tanggal_Selesai">Tanggal Selesai</label>
              <input type="date" name="tanggal_selesai" placeholder="dd/mm/yyyy" id="Tanggal_Selesai" required value="<?= $updt["tanggal_selesai"]; ?>" />
            </div>
            <div class="input">
              <label for="file">Proposal</label>
              <input class="file" type="file" name="proposal" id="file" />
            </div>
            <div class="input">
              <label for="dosen">Dosen</label>
              <select name="dosen_id" id="dosen" required value="<?= $updt["dosen_id"]; ?>">
                <option value="">Pilih Dosen</option>
                <?php
                $lihat = mysqli_query($conn, "SELECT * FROM dosen");
                while ($role = mysqli_fetch_assoc($lihat)) {
                  echo "<option value=$role[id]> $role[nama_dosen] </option>";
                }
                ?>
              </select>
            </div>
            <div class="input">
              <label for="dosen">Ketua</label>
              <select name="anggota_kelompok_id" id="dosen">
                <option value="">Pilih Ketua</option>
                <?php
                $lihat = mysqli_query($conn, "SELECT * FROM anggota_kelompok");
                while ($role = mysqli_fetch_assoc($lihat)) {
                  echo "<option value=$role[id]> $role[nama_anggota] </option>";
                }
                ?>
              </select>
            </div>
            <div class="input">
              <label for="dosen">Perusahaan</label>
              <select name="perusahaan_id" id="dosen">
                <option value="">Pilih Perusahaan</option>
                <?php
                $lihat = mysqli_query($conn, "SELECT * FROM perusahaan");
                while ($role = mysqli_fetch_assoc($lihat)) {
                  echo "<option value=$role[id]> $role[nama_perusahaan] </option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="tombol-daftar">
            <a href=""><button name="submit">update</button></a>
          </div>
        </form>
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
</body>

</html>