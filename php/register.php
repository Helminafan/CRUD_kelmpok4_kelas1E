<?php 
  require "function.php";
  if(isset($_POST["register"])){
        if (register($_POST) > 0){
            echo "<script>
                alert ('data berhasil ditambah');
                document.location.href = 'login.php'
            </script>" ;
        }
        else {
            echo "<script>
                alert ('data gagal ditambah');
            </script>";
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/style.css" />

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="contain">
      <div class="card">
        <div class="card-body">
          <h1>Register</h1>
          <form action="" method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Username</label>
              <input
                type="nama"
                class="form-control"
                id="nama"
                name="username"
                placeholder="Username"
                aria-describedby="emailHelp"
              />
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">
                Email address
              </label>
              <input
                type="email"
                name="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">
                Password
              </label>
              <input
                type="password"
                class="form-control"
                name="password"
                id="exampleInputPassword1"
              />
            </div>
            <div class="mb-3">
              <label for=" Confirm_Password" class="form-label">
                Confirm Password
              </label>
              <input
                type="password"
                name="password2"
                class="form-control"
                id=" Confirm_Password"
              />
            </div>
            <select
              class="form-select  mb-3"
              aria-label=".form-select-lg example"
              name="id"
              
            >
              <option selected>Open this select user</option>
              <?php 
              $lihat = mysqli_query($conn, "SELECT * FROM user_role");
              while($role = mysqli_fetch_assoc($lihat)){
                echo "<option value=$role[id_user]> $role[role] </option>";
              }  
              ?>
            </select>
            <button type="submit" name="register" class="btn btn-primary">Submit</button>
          </form>
          <p>
            Sudah Punya Akun
            <a href="login.php">klik disini</a>
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
