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

    <title>Hello, world!</title>
  </head>
  <body>
  <?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "scraplab";

    $mysqli = new mysqli($server, $user, $password, $database);

    session_start();
    if(!isset($_SESSION["userId"]) || !$_SESSION["userId"]) {
      header('HTTP/1.0 403 Forbidden');
      die('Access forbidden.');     
    }
    ?>
    <div class="d-flex justify-content-center">
    <a href="index.html">
            <img
        src="./img/logo.png"
        class="img-fluid p-3"
        height="10%"
        />
        </a>
    </div>
    <div class="container">
        <?php
        if($_SESSION["account_type"] != "admin") {
            header('HTTP/1.0 403 Forbidden');
            die('Access forbidden.');  
        }
        if($accounts_query = $mysqli->query("SELECT * FROM users WHERE userId <> '" .  $_SESSION["userId"] . "' ;")){
            while($row = $accounts_query->fetch_assoc()){
                echo '<div class="card m-3">
                    <div class="card-body">
                        <h5 class="card-title">USER ID: <input type="text" name="userId" style="border: 0; outline: 0" value=' . $row["userId"] . ' readonly></h5>
                        <p class="card-text">Username: ' . $row["username"] . '</p>
                        <p class="card-text">Email: ' . $row["email"] . '</p>
                        <p class="card-text">Password hash: ' . $row["password"] . '</p>
                        <p class="card-text">Name: ' . $row["name"] . '</p>
                        <p class="card-text">Surname: ' . $row["surname"] . '</p>
                        <p class="card-text">Birthdate: ' . $row["birthdate"] . '</p>
                        <p class="card-text">Account type: ' . $row["account_type"] . '</p>
                        <p class="card-text">Collection team ID: ' . $row["collection_team_id"] . '</p>
                        <div class="row g-3">
                        <form method="POST" action="delete-account.php">
                          <input type="text" name="userId" style="display: none" value=' . $row["userId"] . ' readonly>
                          <input type="submit" class="btn btn-danger" value="Delete account"></input>
                        </form>
                        <form method="POST" action="make-admin.php">
                          <input type="text" name="userId" style="display: none" value=' . $row["userId"] . ' readonly>
                          <input type="submit" class="btn btn-primary" value="Make admin"></input>
                        </form>
                        <form method="POST" action="add-to-collection-team.php">
                          <input type="text" name="userId" style="display: none" value=' . $row["userId"] . ' readonly>
                          <input type="submit" class="btn btn-primary" value="Add to collection team"></input>
                          <input type="text"class="form-control mb-2 mt-2" id="staticEmail2" name="collection_team_id" placeholder="Collection team ID"></input>
                        </form>
                        </div>
                    </div>
                </div>';
            }
        } else {
            die("Retrieval of user account details failed");
        }
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
