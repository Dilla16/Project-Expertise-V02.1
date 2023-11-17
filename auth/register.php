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

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Register</title>
</head>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>

    <div class="container ">
        <div class="row mt-2">
            <div class="col-sm-9 col-md-7 col-lg-7S mx-auto mt-2">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h1 class="card-title text-center fw-bold fs-3">Expertise Quarantine</h1>
                        <h5 class="card-title text-center mt-3 mb-5 fw-light fs-5">Register</h5>
                        <?php if (isset($_GET['success'])) { ?>
                            <script>
                                swal({
                                    icon: 'success',
                                    title: "Success",
                                    text: "Register berhasil, silahkan login! ",
                                    timer: 2000,
                                    button: false,
                                    }).then(function(){
                                    window.location.href = "login.php";
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['failed'])) { ?>
                            <script>
                                swal({
                                    icon: 'error',
                                    title: "Failed",
                                    text: "Register gagal, periksa kembali data anda! ",
                                    timer: 2000,
                                    button: false,
                                    })
                            </script>
                        <?php } ?>
                        <form class="" method="POST" action="authorize.php">
                            <div class="form-group d-flex mx-auto">
                                <input type="text" hidden name="type" value="register" class="form-control" id="floatingInput" placeholder="sesa">
                                <div class="form-floating mb-3 col-sm-5 mx-auto">
                                    <input required name="nama" type="text" class="form-control" id="floatingInput" placeholder="nama">
                                    <label for="floatingInput">nama</label>
                                </div>
                                <div class="form-floating mb-3 col-sm-5 mx-auto">
                                    <input required name="badge" type="text" class="form-control" id="floatingInput" placeholder="badge">
                                    <label for="floatingInput">badge</label>
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <div class="form-floating mb-3 col-sm-5 mx-auto">
                                    <input required name="sesa" type="text" class="form-control" id="floatingInput" placeholder="sesa">
                                    <label for="floatingInput">sesa</label>
                                </div>
                                <div class="form-floating mb-3 col-sm-5 mx-auto">
                                    <input required name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            </div>
                            <div class="form-group inline">
                                <div class="form-floating mb-3 col-sm-11 mx-auto">
                                    <input required name="email" type="text" class="form-control" id="floatingInput" placeholder="email">
                                    <label for="floatingInput">email</label>
                                </div>
                            </div>
                            <div class="form-group col-sm-11 mx-auto">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign Up</button>
                                </div>
                            </div>
                            <h5 class="card-title text-center mt-4 fw-light fs-6">Already have an account <a href="login.php">Sign in</a></h5>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>


</html>