<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
    crossorigin="anonymous"
  />

  <title>Dashboard</title>
</head>
<body>
  <?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "scraplab";

    $mysqli = new mysqli($server, $user, $password, $database);

    session_start();
    if(!$_SESSION["userId"]) {
      header('HTTP/1.0 403 Forbidden');
      die('Access forbidden.');     
    }
  ?>
  <div class="d-flex justify-content-center">
    <a href="index.html">
      <img
      src="./img/logo.png"
      alt="triangle with all three sides equal"
      class="img-fluid p-3"
      height="10%"
      />
    </a>
  </div>
  <div class="container">
    <div class="row justify-content-center align-self-center">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ADD SLDM</h5>
                    <hr>
                    <form class="row g-3" action="add-sldm2.php" method="POST">
                        <div class="col-auto">
                            <select class="form-select" name="userId" aria-label="Default select example">
                                <option selected>Choose user</option>
                                <?php
                                    if($users = $mysqli->query("SELECT userId, username FROM users;")) {
                                        while($row = $users->fetch_assoc()) {
                                            echo '<option value="' . $row["userId"] . '">' .  $row["username"] . '</option>';
                                        }
                                    } else {
                                        die("Error fetching users");
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label for="sldmLocation" class="visually-hidden">Location</label>
                            <input type="text"class="form-control mb-2 mt-2" id="sldmLocation" name="location" placeholder="Location">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">ADD SLDM</button>
                        </div>
                    </form>
    <?php

    ?>
    </div>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"
  ></script>
</body>
</html>
