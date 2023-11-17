<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


<body onload="sweetalert()">
    <?php include('../components/header.php'); ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7S mx-auto mt-5">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">

                        <!-- INSERT RTA -->
                            <?php if (isset($_GET['insertRTA'])) { ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data Quarantine</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                <?php if (isset($_GET['successinsertRTA'])) { ?>
                                    <script>
                                        swal({
                                            icon: 'success',
                                            title: "Success",
                                            text: "Data Berhasil Ditambahkan",
                                            timer: 2000,
                                            button: false,
                                        }).then(function(){
                                                window.location.href = "../contents/insert.php?insertRTA=1";
                                            });
                                    </script>
                                <?php } ?>
                                <?php if (isset($_GET['failedinsertRTA'])) { ?>
                                    <script>
                                        swal({
                                            icon: 'error',
                                            title: 'Failed!',
                                            text: 'Duplicate serial number!',
                                            timer: 2000,
                                            button: false,
                                        })
                                    </script>
                                <?php } ?>
                                <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="quarantineInsert">
                                    <?php
                                        if ($_SESSION['level'] == 2) { ?>
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="sector" class="form-label fw-bold">Sector</label>
                                            <input required name="sector" type="text" class="form-control" id="sector" placeholder="Data Sector" <?php if ($_SESSION['level'] == 1) { ?>readonly <?php } ?>>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="family" class="form-label fw-bold">Family</label>
                                            <input required name="family" type="text" class="form-control" id="family" placeholder="Data Family" <?php if ($_SESSION['level'] == 1) { ?>readonly <?php } ?>>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="reference" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" id="reference" placeholder="Data Reference" <?php if ($_SESSION['level'] == 1) { ?>readonly <?php } ?>>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group d-flex mx-auto mb-4">
                                        <div class="mb-3 col-sm-5">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input required name="serial_number" type="text" id="serial_number" onkeyup="autofill()" class="form-control" placeholder="Scan Serial Number" autofocus autocomplete="off">
                                        </div>
                                        <div class="mb-3 col-sm-5">
                                            <label for="localtion" class="form-label fw-bold">Location</label>
                                            <input required name="location" type="text" class="form-control" id="location" placeholder="Scan Location">
                                        </div>
                                        <div class="">
                                        <button type="submit" class="btn btn-primary btn-block col-md mx-auto btn-lg">Submit</button>
                                        </div>

                                    </div>
                        <!-- END OF INSERT RTA             -->

                        <!-- INSERT USER -->
                                </form>
                            <?php } elseif (isset($_GET['insertUser'])) { ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data User</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                <?php if (isset($_GET['successinsertUser'])) { ?>
                                    <!-- <div class="alert alert-success text-center" role="alert">
                                        New user created successfully!
                                    </div> -->
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Data added successfully!',
                                            timer: 2000,
                                            showConfirmButton: false
                                        })
                                    </script>
                                <?php } ?>
                                <?php if (isset($_GET['failedinsertUser'])) { ?>
                                    <!-- <div class="alert alert-danger text-center" role="alert">
                                        Failed to add user, Duplicate Sesa!
                                    </div> -->
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Failed!',
                                            text: 'Data failed to add due to duplicate sesa!',
                                            timer: 2000,
                                            showConfirmButton: false
                                        })
                                    </script>
                                <?php } ?>
                                <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="userInsert">
                                    
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="nama" class="form-label fw-bold">Nama</label>
                                            <input required name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="badge" class="form-label fw-bold">Badge</label>
                                            <input required name="badge" type="text" class="form-control" id="badge" placeholder="Nomor ID">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="sesa" class="form-label fw-bold">Sesa</label>
                                            <input required name="sesa" type="text" class="form-control" id="sesa" placeholder="Masukkan sesa">
                                        </div>

                                    </div>
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="email" class="form-label fw-bold">Email</label>
                                            <input required name="email" type="text" class="form-control" id="email" placeholder="Masukkan email">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="password" class="form-label fw-bold">Password</label>
                                            <input required name="password" type="text" class="form-control" id="password" placeholder="Masukkan password">
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="hak_akses" class="form-label fw-bold">Hak Akses</label>
                                            <select class="form-select" aria-label=".form-select-sm example" id="hak_akses" name="hak_akses">
                                                <option hidden>Pilih Hak akses</option>
                                                <option value="1">User</option>
                                                <option value="2">Admin</option>
                                                <option value="3">Owner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF INSERT USER -->

                        <!-- INSERT PRODUCT -->
                            <?php } elseif (isset($_GET['insertProduct'])) { ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data Product</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                <?php if (isset($_GET['successInsertProduct'])) { ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        New user created successfully!
                                    </div>
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'Data added successfully!',
                                            timer: 2000,
                                            showConfirmButton: false
                                        })
                                    </script>
                                <?php } ?>
                                <?php if (isset($_GET['failedInsertProduct'])) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        Failed to add user, Duplicate Sesa!
                                    </div>
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Failed!',
                                            text: 'Data failed to add due to duplicate sesa!',
                                            timer: 2000,
                                            showConfirmButton: false
                                        })
                                    </script>
                                <?php } ?>
                                <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="productInsert">
                                    
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-4">
                                            <label for="sector" class="form-label fw-bold">Sector</label>
                                            <select class="form-select" aria-label=".form-select-sm example" id="sector" name="sector">
                                                <option hidden>Pilih Sector</option>
                                                <option value="Auto">Auto</option>
                                                <option value="Drive">Drive</option>
                                                <option value="Sector">Sector</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="family" class="form-label fw-bold">Family</label>
                                            <select class="form-select" aria-label=".form-select-sm example" id="family" name="family">
                                                <option hidden>Pilih Family</option>
                                                <option value="ATS48">ATS48</option>
                                                <option value="ATV212">ATV212</option>
                                                <option value="ATS22">ATS22</option>
                                                <option value="ATV320">ATV320</option>
                                                <option value="ATV610">ATV610</option>
                                                <option value="ATV630">ATV630</option>
                                                <option value="ATV310">ATV310</option>
                                                <option value="ATV930">ATV930</option>
                                                <option value="ATV340">ATV340</option>
                                                <option value="ATV12">ATV12</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-sm-4">
                                            <label for="product_id" class="form-label fw-bold">Product ID</label>
                                            <input required name="product_id" type="text" class="form-control" id="product_id" placeholder="Masukkan 5 digit product ID">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-6">
                                            <label for="reference" class="form-label fw-bold">Reference</label>
                                            <input required name="reference" type="text" class="form-control" id="reference" placeholder="Masukkan Reference">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label for="kode" class="form-label fw-bold">Kode Produksi</label>
                                            <input required name="kode" type="text" class="form-control" id="kode" placeholder="Masukkan kode produksi 8B/HL">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block col-md-6 mx-auto btn-lg">Submit</button>
                                </form>
                        <!-- END OF INSERT PRODUCT -->

                        <!-- INSERT SCRAP -->
                            <?php } elseif (isset($_GET['insertScrap'])) { ?>
                                <h1 class="card-title text-center fw-bold fs-3">Data Scrap</h1>
                                <h5 class="card-title text-center mt-2 mb-4 fw-light fs-5">Insert</h5>
                                <?php if (isset($_GET['successinsertScrap'])) { ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        Scrap successfully!
                                    </div>
                                <?php }
                                if (isset($_GET['failedinsertScrap'])) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        Failed to Scrap, Serial Number not found or have been scrapped!
                                    </div>
                                <?php }
                                if (isset($_GET['notFound'])) { ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        Failed to Scrap, Serial Number not found!
                                    </div>
                                <?php } ?>
                                <form class="mx-5" method="POST" action="create.php">
                                    <input type="text" hidden name="type" value="scrapInsert">
                                    <div class="form-group d-flex mx-auto">
                                        <div class="mb-3 col-sm-10">
                                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                                            <input required name="serial_number" type="text" class="form-control" id="serial_number" placeholder="Scan Serial Number">
                                        </div>
                                        <div class="mb-3 col-sm-2 align-self-end">
                                            <button type="submit" class="btn btn-primary btn-block mx-auto ">Submit</button>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mx-auto">
                                        <table id="tableScrap" class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Loc</th>
                                                    <th>Sector</th>
                                                    <th>Family</th>
                                                    <th>Reference</th>
                                                    <th>Serial Number</th>
                                                    <th>date Insert</th>
                                                    <th>Due Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = sprintf("SELECT * FROM data_gudang order by `due_date` ASC");
                                                $result = $GLOBALS['mysqli']->query($query);
                                                $idx = 1;
                                                ?>
                                                <?php while ($row = $result->fetch_assoc()) {
                                                    if (($row['due_date']) <= date('Y-m-d')) {
                                                        echo  "<tr style='background-color:red;'>";
                                                    } else {
                                                        echo  "<tr>";
                                                    }
                                                ?>
                                                    <td><?= $idx++ ?></td>
                                                    <td><?= $row['loc'] ?></td>
                                                    <td><?= $row['sector'] ?></td>
                                                    <td><?= $row['family'] ?></td>
                                                    <td><?= $row['reference'] ?></td>
                                                    <td><?= $row['serial_number'] ?></td>
                                                    <td><?= $row['date_insert'] ?></td>
                                                    <td><?= $row['due_date'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </form>
                        <!-- END OF INSERT SCRAP -->

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function autofill() {
            var serial_number = $("#serial_number").val();
            $.ajax({
                url: 'autofill.php',
                data: 'serial_number=' + serial_number,
                success: function(data) {
                    var json = data,
                        obj = JSON.parse(json);
                    $('#sector').val(obj.sector);
                    $('#family').val(obj.family);
                    $('#reference').val(obj.reference);
                }
            });
        }
    </script>

    <?php include('../components/footer.php'); ?>
</body>