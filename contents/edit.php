<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <?php include('../components/header.php');
    ?>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7S mx-auto mt-5">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">

                        <!-- EDIT QUARANTINE -->
                            <?php if (isset($_GET['quarantineEdit'])) {
                                $query = sprintf("SELECT * FROM data_gudang WHERE `serial_number`='%s' LIMIT 1", $_GET['serial_number']);
                                $result = $GLOBALS['mysqli']->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                }
                                if (isset($_GET['quarantineSuccess'])) { ?>
                                    <div class="alert text-center alert-success" role="alert">
                                        Data berhasil di record
                                    </div>
                                <?php } ?>
                                <h1 class="card-title text-center fw-bold fs-3">Edit Data Quarantine</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5"><?= $row['reference'] ?> (<?= $row['serial_number'] ?>)</h5>
                                <form class="mx-5" method="POST" action="update.php?quarantineEdit=1&serial_number=<?= $row['serial_number'] ?>">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sector</label>
                                            <input required name="sector" type="text" class="form-control" value="<?= $row['sector'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Family</label>
                                            <input required name="family" type="text" class="form-control" value="<?= $row['family'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" value="<?= $row['reference'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto mb-4">
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Location</label>
                                            <input required name="loc" type="text" class="form-control" id="loc" value="<?= $row['loc'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Date Insert</label>
                                            <input required name="date_insert" type="date" class="form-control" id="date_insert" value="<?= $row['date_insert'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="exampleFormControlInput1" class="form-label fw-bold">Sesa Insert</label>
                                            <input required name="sesa" type="text" class="form-control" id="sesa" value="<?= $row['sesa'] ?>" readonly>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF EDIT QUARANTINE -->

                        <!-- EDIT USER -->
                                <?php } elseif (isset($_GET['userEdit'])) {
                                $query = sprintf("SELECT * FROM user WHERE `sesa`='%s' LIMIT 1", $_GET['sesa']);
                                $result = $GLOBALS['mysqli']->query($query);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                }
                                if (isset($_GET['userSuccess'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        Data berhasil di record
                                    </div>
                                <?php } ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data user</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5"><?= $row['nama'] ?> (<?= $row['sesa'] ?>)</h5>
                                <form class="mx-5" method="POST" action="update.php?userEdit=1&sesa=<?= $row['sesa'] ?>">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="nama" class="form-label fw-bold">Nama</label>
                                            <input required name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama" value="<?= $row['nama'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="badge" class="form-label fw-bold">Badge</label>
                                            <input required name="badge" type="text" class="form-control" id="badge" placeholder="Nomor ID" value="<?= $row['badge'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="sesa" class="form-label fw-bold">Sesa</label>
                                            <input required name="sesa" type="text" class="form-control" id="sesa" placeholder="Masukkan sesa" value="<?= $row['sesa'] ?>" readonly>
                                        </div>

                                    </div>
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="email" class="form-label fw-bold">Email</label>
                                            <input required name="email" type="text" class="form-control" id="email" placeholder="Masukkan email" value="<?= $row['email'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="password" class="form-label fw-bold">Password</label>
                                            <input required name="password" type="text" class="form-control" id="password" placeholder="Masukkan password" value="<?= $row['password'] ?>">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="hak_akses" class="form-label fw-bold">Hak Akses</label>
                                            <select class="form-select" aria-label=".form-select-sm example" id="hak_akses" name="hak_akses">
                                                <?php
                                                if ($row['hak_akses'] == "admin") echo "<option value='admin' selected>admin</option>";
                                                else echo "<option value='admin'>admin</option>";

                                                if ($row['hak_akses'] == "user") echo "<option value='user' selected>user</option>";
                                                else echo "<option value='user'>user</option>";

                                                if ($row['hak_akses'] == "owner") echo "<option value='owner' selected>owner</option>";
                                                else echo "<option value='owner'>owner</option>";
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF EDIT USER -->

                            <?php } ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../components/footer.php'); ?>
</body>