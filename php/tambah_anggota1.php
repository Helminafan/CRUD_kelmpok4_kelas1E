<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "function.php";
class tambah_anggota
{
  //atribut objek
  public $nama_mahasiswa;
  public $nim;
  public $kelas;
  public $email;
  public $alamat;
  private $id_user;
  private $anggota_kelompok_id;
  // set atributnya 
  // set atributnya untuk mengAkses privat atribut
  public function setAtribut($anggota_kelompok_id, $id_user,)
  {
    $this->anggota_kelompok_id = $anggota_kelompok_id;
    $this->id_user = $id_user;
  }
  public function __construct($nama_mahasiswa, $nim, $kelas, $email, $alamat, $id_user, $anggota_kelommpok_id)
  {
    $this->nama_mahasiswa = $nama_mahasiswa;
    $this->nim = $nim;
    $this->kelas = $kelas;
    $this->email = $email;
    $this->alamat = $alamat;
    $this->id_user = $id_user;
    $this->anggota_kelompok_id = $anggota_kelommpok_id;
  }
  // ambil getAtribut untuk meng akses privat atribut
  public function getuser_id()
  {
    return  $this->id_user;
  }
  public function get_anggota_kelompok_id()
  {
    return  $this->anggota_kelompok_id;
  }

  //ambil semua data array dalam variable global $_FILES
  // Ambil semua inputan user yang  dimasukan
  function ambilInputUser()
  {
    //masukan satu array
    $array = [
      "nama_mahasiswa" => $this->nama_mahasiswa,
      "nim" =>  $this->nim,
      "kelas" => $this->kelas,
      "email" =>  $this->email,
      "alamat" => $this->alamat,
      "id_user" => $this->id_user,
      "anggota_kelompok_id" =>  $this->anggota_kelompok_id
    ];
    return $array;
  }
}
if (isset($_POST["submit"])) {
  if (tambah_anggota($_POST) > 0) {
    echo "<script>
                alert ('data berhasil ditambah');
                document.location.href = 'anggota.php'
          </script>";
  } else {
    echo "<script>
                alert ('data gagal ditambah');
                document.location.href = 'anggota.php'
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
        <a href="anggota.php"><i class='bx bxs-chevrons-left'></i></a>
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
      <div class="box-form1">
        <div class="title">
          <h1>Daftar Mahasiswa</h1>
        </div>
        <form action="" method="post">
          <div class="box1">
            <input type="hidden" name="id" id="id" required />
            <div class="input">
              <label for="nama">Nama</label>
              <input type="text" name="nama_mahasiswa" placeholder="nama" id="nama" />
            </div>
            <div class="input">
              <label for="NIM">NIM</label>
              <input type="text" name="nim" placeholder="NIM" id="NIM" />
            </div>
            <div class="input">
              <label for="Alamat">Alamat</label>
              <input type="text" name="alamat" placeholder="Alamat" id="Alamat" />
            </div>
            <div class="input">
              <label for="Kelas">Kelas</label>
              <input type="text" name="kelas" placeholder="Kelas" id="Kelas" />
            </div>
            <div class="input">
              <label for="Email">Email</label>
              <input type="text" name="email" placeholder="Email" id="Email" />
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
              <label for="dosen">Kelompok</label>
              <select name="id_user" id="dosen">
                <option value="">Pilih Ketua</option>
                <?php
                $lihat = mysqli_query($conn, "SELECT * FROM user");
                while ($role = mysqli_fetch_assoc($lihat)) {
                  echo "<option value=$role[id]> $role[username] </option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="tombol">
            <button name="submit">tambah data</button>
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