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
            <div class="card" style="width: 18rem">
                <div class="card-body">
                  <h5 class="card-title">REGISTRATION - PART 2</h5>
                  <hr>
                  <form class="row g-3" method="POST" action="complete-registration.php">
                    <?php echo `<div class="col-auto">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="`. $_POST["email"] .`">
                    </div>`; ?>
                    <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden">Name</label>
                    <input type="text"class="form-control" name="name" id="staticEmail2" placeholder="Name">
                    </div>
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">Surname</label>
                        <input type="text" class="form-control" name="surname" id="inputPassword2" placeholder="Surname">
                    </div>
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" id="inputPassword2" placeholder="Birthdate">
                    </div>
                    <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">End registration</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
    <?php  
      session_start();
      $_SESSION["email"] = $_POST["email"];
      $_SESSION["username"] = $_POST["username"];
      $_SESSION["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 12,]);  
    ?>
  </body>
</html>
