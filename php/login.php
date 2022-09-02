<?php
session_start();
require "function.php";
if (isset($_SESSION["login"])) {
  exit;
}
if (isset($_POST['login'])) {
  $un = $_POST['username'];
  $ps = $_POST['password'];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$un'");
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($ps, $row["password"])) {
      $_SESSION["login"] = true;
      // cek login
      if ($row['id_role'] == 1) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: daftarKetua.php");
      } elseif ($row['id_role'] == 2) {
        header("Location: dosen.php");
      } elseif ($row['id_role'] == 3) {
        header("Location: koordinator.php");
      } elseif ($row['id_role'] == 4) {
        header("Location: admin.php");
      }
      exit;
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/Style.css" />

  <title>Hello, world!</title>
</head>

<body>
  <div class="contain">
    <div class="card">
      <div class="card-body">
        <h1>LOGIN</h1>
        <form action="" method="post">
          <div class="mb-3">
            <label for="nama" class="form-label">Username</label>
            <input type="nama" class="form-control" id="nama" name="username" placeholder="Username" aria-describedby="emailHelp" required />
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">
              Password
            </label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required />
          </div>

          <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </form>
        <p>
          Tidak Punya Akun
          <a href="register.php">klik disini</a>
        </p>
        <p>
          Lupa Password 
          <a href="lupa_password.php">klik disini</a>
        </p>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>