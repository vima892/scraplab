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
        <?php
        if($prepared_query = $mysqli->prepare("SELECT userId, username, email, `name`, surname, birthdate, account_type, collection_team_id FROM users WHERE username=?;")){
            $prepared_query->bind_param("s", $_SESSION["username"]);
            $prepared_query->execute();
            $result = $prepared_query->get_result();
            $values = $result->fetch_object();
            echo '
            <div class="row justify-content-center align-self-center">
              <div class="col-sm-6">
                <div class="card" style="width: 24rem">
                  <div class="card-body">
                    <h5 class="card-title">ACCOUNT DETAILS</h5>
                    <hr>
                    <p class="card-text">User ID: ' . $values->userId . '</p>
                    <p class="card-text">Username: ' . $values->username . '</p>
                    <p class="card-text">Email: ' . $values->email . '</p>
                    <p class="card-text">Name: ' . $values->name . '</p>
                    <p class="card-text">Surname: ' . $values->surname . '</p>
                    <p class="card-text">Birthdate: ' . $values->birthdate . '</p>
                    <p class="card-text">Account type: ' . $values->account_type . '</p>';
            if($values->account_type == "collection_team") {
              echo '<p class="card-text">Collection Team ID: ' . $values->collection_team_id . '</p>';
            } else if($values->account_type == "admin") {
              echo '<a href="#" class="btn btn-primary">Administer accounts</a>';
            }
            echo '</div>
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">SLDMS</h5>
                      <hr>';
            if($values->account_type == "collection_team" || $values->account_type == "admin") {
              $sldm_statement = "SELECT * FROM SLDMs;";
            } else {
              $sldm_statement = "SELECT * FROM SLDMs WHERE userId = " . $values->username . ";";
            }
            if($sldm_query = $mysqli->query("SELECT * FROM SLDMs;")){
              while($row = $sldm_query->fetch_assoc()){
                echo
              }
            }
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
            
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
