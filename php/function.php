<?php
$conn = mysqli_connect("localhost", "root", "", "db_tugas");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($rows = mysqli_fetch_assoc($result)) {
        $row[] = $rows;
    }
    return $row;
}
function menentukan($data)
{
    global $conn;
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);
    $nim = htmlspecialchars($data["nim"]);
    $query = "INSERT INTO anggota_kelompok VALUES ('','$nama_anggota','$nim')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_anggota($data)
{
    global $conn;
    $nama_anggota = htmlspecialchars($data['nama_mahasiswa']);
    $nim =   htmlspecialchars($data['nim']);
    $kelas = htmlspecialchars($data['kelas']);
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data["alamat"]);
    $ketua = htmlspecialchars($data["anggota_kelompok_id"]);
    $user =  htmlspecialchars($data["id_user"]);
    $pendaftaran = new tambah_anggota($nama_anggota, $nim, $kelas, $email, $alamat, $user, $ketua);
    $up = $pendaftaran->ambilInputUser();
    foreach ($up as $key => $value) {
        $k[] = $key;
        $v[] = "'" . $value . "'";
    }
    $nama_tabel  = implode(", ", $k);

    $values = implode(", ", $v);
    $query = "INSERT INTO mahasiswa ($nama_tabel) VALUES ($values)";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    // global $conn;
    // $nama_anggota = htmlspecialchars($data["nama_mahasiswa"]);
    // $nim = htmlspecialchars($data["nim"]);
    // $kelas = htmlspecialchars($data["kelas"]);
    // $email = htmlspecialchars($data["email"]);
    // $alamat = htmlspecialchars($data["alamat"]);
    // $ketua = ($data["anggota_kelompok_id"]);
    // $kel =  ($data["id_user"]);
    // $query = "INSERT INTO mahasiswa VALUES ('','$nama_anggota','$nim','$kelas','$email','$alamat','$kel','$ketua')";
    // mysqli_query($conn, $query);
    // return mysqli_affected_rows($conn);
}
function update_mahasiswa($data)
{
    global $conn;
    $id = $data["id"];
    $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
    $nim = htmlspecialchars($data["nim"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $email = htmlspecialchars($data["email"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $ketua = $data["anggota_kelompok_id"];
    $kelompok =  $data["id_user"];
    $query = "UPDATE mahasiswa SET 
        nama_mahasiswa = '$nama_mahasiswa',
        nim = '$nim',
        kelas = '$kelas',
        email = '$email',
        alamat = '$alamat',
        id_user = '$kelompok',
        anggota_kelompok_id = '$ketua'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_mahasiswa($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM anggota_kelompok WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah_anggota($data)
{
    global $conn;
    $id = $data["id"];
    $nama_anggota = htmlspecialchars($data["nama_anggota"]);
    $nim = htmlspecialchars($data["nim"]);
    $query = "UPDATE anggota_kelompok SET 
        nama_anggota = '$nama_anggota',
        nim = '$nim'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function register($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = $data["id"];
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    // $regex = "/^[0-9]{12}$/";
    // if (!preg_match($regex, $username)) {
    //     echo "<script>
    //                 alert ('username harus angka dengan 12 digit');
    //             </script>";
    //     return false;
    // }
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert ('username yang dipilih sudah ada');
                </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
                    alert ('Konfirmasi password salah');
                </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$role')");
    return mysqli_affected_rows($conn);
}
function lupa_password($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    if ($password !== $password2) {
        echo "<script>
                    alert ('Konfirmasi password salah');
                </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE user SET 
                password = '$password'
                WHERE user.username = $username";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function daftar_kp($data)
{
    global $conn;
    $tempat_kp = htmlspecialchars($data["tempat_kp"]);
    $alamat_kp = htmlspecialchars($data["alamat_kp"]);
    $tanggal_mulai = htmlspecialchars($data["tanggal_mulai"]);
    $tanggal_selesai = htmlspecialchars($data["tanggal_selesai"]);
    $anggota_kelompok_id = ($data["anggota_kelompok_id"]);
    $dosen_id =  ($data["dosen_id"]);
    $proposal = upload_prop();
    if (!$proposal) {
        return false;
    }
    $perusahaan_id =  ($data["perusahaan_id"]);
    $query = "INSERT INTO pendaftaran_kp VALUES ('','$tempat_kp','$alamat_kp','$tanggal_mulai','$tanggal_selesai','$proposal','$anggota_kelompok_id','$dosen_id','$perusahaan_id')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload_prop()
{
    $file = $_FILES['proposal']['name'];
    $lokasi = $_FILES['proposal']['tmp_name'];
    $ekstensiFileValid = ['pdf'];
    $error = $_FILES['proposal']['error'];
    $ekstensiFile = explode('.', $file);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if ($error === 4) {
        echo "
        <script>
        alert('Masukan File Terlebih dahulu');
        </script>
        ";
    }
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('Pastikan File Berektensi PDF');
        </script>
        ";
        return false;
    }
    move_uploaded_file($lokasi, "File/" . $file);
    return $file;
}
function update_pendaftaran($data)
{
    global $conn;
    $id = $data["id"];
    $tempat_kp = htmlspecialchars($data["tempat_kp"]);
    $alamat_kp = htmlspecialchars($data["alamat_kp"]);
    $tanggal_mulai = htmlspecialchars($data["tanggal_mulai"]);
    $tanggal_selesai = htmlspecialchars($data["tanggal_selesai"]);
    $proposal_lama = $data["file_lama"];
    $anggota_kelompok_id = $data["anggota_kelompok_id"];
    $dosen_id = $data["dosen_id"];
    $perusahaan_id =  $data["perusahaan_id"];
    if ($_FILES['proposal']['error'] === 4) {
        $proposal = $proposal_lama;
    } else {
        $proposal =  upload_prop();
    }
    $query = "UPDATE pendaftaran_kp SET 
        tempat_kp = '$tempat_kp',
        alamat_kp = '$alamat_kp',
        tanggal_mulai = '$tanggal_mulai',
        tanggal_selesai = '$tanggal_selesai',
        proposal = '$proposal',
        anggota_kelompok_id = '$anggota_kelompok_id',
        dosen_id = '$dosen_id',
        perusahaan_id = '$perusahaan_id'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_pendaftaran($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pendaftaran_kp WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function pendaftran_ujian($data)
{
    global $conn;
    $laporan = upload_lap();
    if (!$laporan) {
        return false;
    }
    $accujian = htmlspecialchars($data["acc_ujian_id"]);
    $jadwal_uji = mysqli_query($conn, "SELECT jadwal_ujian FROM acc_ujian WHERE id = $accujian");
    $result = mysqli_fetch_assoc($jadwal_uji);
    $jadduji = join($result);
    $pendafkp = ($data["pendaftaran_kp_id"]);
    $query = "INSERT INTO pendaftaran_ujian_kp VALUES ('','$laporan','$jadduji','$pendafkp','$accujian')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload_lap()
{
    $file = $_FILES['laporan_kp']['name'];
    $lokasi = $_FILES['laporan_kp']['tmp_name'];
    $ekstensiFileValid = ['pdf'];
    $error = $_FILES['laporan_kp']['error'];
    $ekstensiFile = explode('.', $file);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if ($error === 4) {
        echo "
        <script>
        alert('Masukan File Terlebih dahulu');
        </script>
        ";
    }
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('Pastikan File Berektensi PDF');
        </script>
        ";
        return false;
    }
    move_uploaded_file($lokasi, "File/" . $file);
    return $file;
}
function hapus_pendaftaran_ujian($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pendaftaran_ujian_kp WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function update_pendaftaran_ujian($data)
{
    global $conn;
    $laporan_lama = $data["file_lama"];
    $id = $data["id"];
    $accujian = htmlspecialchars($data["acc_ujian_id"]);
    $jadwal_uji = mysqli_query($conn, "SELECT jadwal_ujian FROM acc_ujian WHERE id = $accujian");
    $result = mysqli_fetch_assoc($jadwal_uji);
    $jadduji = join($result);
    $pendafkp = ($data["pendaftaran_kp_id"]);
    if ($_FILES['laporan_kp']['error'] === 4) {
        $laporan = $laporan_lama;
    } else {
        $laporan =  upload_lap();
    }
    $query = "UPDATE pendaftaran_ujian_kp SET 
        laporan_kp = '$laporan',
        jadwal_ujian = '$jadduji',
        pendaftaran_kp_id = '$pendafkp',
        acc_ujian_id = '$accujian'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function lembar_kerja($data)
{
    global $conn;
    $file = upload_file();
    if (!$file) {
        return false;
    }
    $tanggal = htmlspecialchars($data["tanggal"]);
    $ketua = ($data["anggota_kelompok_id"]);
    $query = "INSERT INTO lembar_kerja VALUES ('','$tanggal','$file','$ketua')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload_file()
{
    $file = $_FILES['file']['name'];
    $lokasi = $_FILES['file']['tmp_name'];
    $ekstensiFileValid = ['pdf'];
    $error = $_FILES['file']['error'];
    $ekstensiFile = explode('.', $file);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if ($error === 4) {
        echo "
        <script>
        alert('Masukan File Terlebih dahulu');
        </script>
        ";
    }
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('Pastikan File Berektensi PDF');
        </script>
        ";
        return false;
    }
    move_uploaded_file($lokasi, "File/" . $file);
    return $file;
}
function update_lembar_kerja($data)
{
    global $conn;
    $id = $data["id"];
    $file_lama = $data["file_lama"];
    $tanggal = htmlspecialchars($data["tanggal"]);
    $ketua = ($data["anggota_kelompok_id"]);
    if ($_FILES['file']['error'] === 4) {
        $file = $file_lama;
    } else {
        $file =  upload_file();
    }
    $query = "UPDATE lembar_kerja SET 
        tanggal = '$tanggal',
        file = '$file',
        anggota_kelompok_id = '$ketua'
        WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus_lembar_kerja($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM lembar_kerja WHERE id = $id");
    return mysqli_affected_rows($conn);
}
