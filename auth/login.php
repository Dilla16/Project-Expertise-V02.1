<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="assets/icon.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Expertise</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5 bg-light">
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="card-title text-center fw-bold fs-3 mb-5">Expertise Quarantine</h1>
                        <?php if (isset($_GET['failed'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                Kombinasi SESA dan Password salah!
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                Akun berhasil dibuat, silahkan login
                            </div>
                        <?php } ?>
                        <form method="POST" action="authorize.php">
                            <input type="text" hidden name="type" value="login" class="form-control" id="floatingInput" placeholder="sesa">
                            <div class="form-floating mb-3">
                                <input required autofocus name="sesa" type="text" class="form-control" id="floatingInput" placeholder="sesa" autocomplete="off">
                                <label for="floatingInput">SESA</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold mt-3" type="submit">Login</button>
                            </div>
                            <h5 class="card-title text-center mt-4 fw-light fs-6">Doesn't have an account? <a href="register.php">Sign Up</a></h5>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>