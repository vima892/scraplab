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
        if($_SESSION["account_type"] == "client") {
            header('HTTP/1.0 403 Forbidden');
            die('Access forbidden.');  
        }
        if($accounts_query = $mysqli->query("SELECT * FROM collection_jobs WHERE collection_datetime <> '2000-01-01 00:00:00.000000';")){
            while($row = $accounts_query->fetch_assoc()){
                echo '<div class="card m-3">
                    <div class="card-body">
                        <h5 class="card-title">COLLECTION JOB ID: ' . $row["collection_job_id"] . '</h5>
                        <p class="card-text">SLDM ID: ' . $row["SLDM_ID"] . '</p>
                        <p class="card-text">Collection date and time: ' . $row["collection_datetime"] . '</p>
                        <p class="card-text">Collection team ID: ' . $row["collection_team_id"] . '</p>
                    </div>
                </div>';
            }
        } else {
            die("Retrieval of past collection jobs failed");
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
