<body>
    <?php
    include('../components/header.php');
    ?>
    <div id="content">

        <!-- Three columns of text below the carousel -->

    <!-- CODE VIEW DATA -->

        
        <div class="row mb-5">
            <div class="col-lg-12 mx-auto">
                <!-- SWEETALERT -->
                    <?php if (isset($_GET['successDeleted'])) { ?>
                        <script>
                            swal({
                                icon: 'success',
                                title: "Success",
                                text: "Data Berhasil Dihapus",
                                timer: 2000,
                                button: false,
                            })
                        </script>
                    <?php } elseif (isset($_GET['failedDeleted'])) { ?>
                        <script>
                            swal({
                                icon: 'error',
                                title: "Failed!",
                                text: "Data gagal di hapus",
                                timer: 2000,
                                button: false,
                            })
                        </script>
                        <?php }?>
                <!-- END OF CODE SWEETALERT -->

            <!-- VIEW RTA -->
                <?php if (isset($_GET['viewRTA'])) { ?>
                    <h1 class="text-center">Data Quarantine</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a href="../contents/insert.php?insertRTA=1.php" class="btn btn-success text-white text-white">Tambah Data</a>
                    </h1>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loc</th>
                                <th>Sector</th>
                                <th>Family</th>
                                <th>Reference</th>
                                <th>Serial No.</th>
                                <th>date Insert</th>
                                <th>Due Date</th>
                                <th>Sesa</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='quarantine' AND remark='sample RTA'order by `due_date` ASC");
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
                                <td><?= $row['nameplate_serial_number'] ?></td>
                                <td><?= $row['date_insert'] ?></td>
                                <td><?= $row['due_date'] ?></td>
                                <td><?= $row['sesa_insert'] ?></td>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <td>
                                        <a href="Edit.php?quarantineEdit=1&serial_number=<?= $row['nameplate_serial_number'] ?>" class='edit'><i class='fa fa-eye' data-toggle='tooltip' title='Edit'></i></a>
                                        <a href="Delete.php?quarantineDelete=1&serial_number=<?= $row['serial_number'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW RTA -->


            <!-- VIEW SAMPLE NDF -->
                <?php } elseif (isset($_GET['viewSampleNDF'])) { ?>
                    <h1 class="text-center">Data Sample NDF</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a data-toggle="modal" data-target="#InsertRTA" class="btn btn-success text-white">Tambah Data</a>
                    </h1>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loc</th>
                                <th>Sector</th>
                                <th>Family</th>
                                <th>Reference</th>
                                <th>Serial No.</th>
                                <th>Sesa</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='quarantine' AND remark='sample NDF'order by `due_date` ASC");
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
                                <td><?= $row['nameplate_serial_number'] ?></td>
                                <td><?= $row['sesa_insert'] ?></td>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <td>
                                        <a href="Edit.php?quarantineEdit=1&serial_number=<?= $row['nameplate_serial_number'] ?>" class='edit'><i class='fa fa-eye' data-toggle='tooltip' title='Edit'></i></a>
                                        <a href="Delete.php?quarantineDelete=1&serial_number=<?= $row['serial_number'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SAMPLE NDF -->


            <!-- VIEW SAMPLE MANUFACTURING -->
                <?php } elseif (isset($_GET['viewManufacturing'])) { ?>
                    <h1 class="text-center">Data Sample Manufacturing</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a data-toggle="modal" data-target="#InsertRTA" class="btn btn-success text-white">Tambah Data</a>
                    </h1>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Loc</th>
                                <th>Sector</th>
                                <th>Family</th>
                                <th>Reference</th>
                                <th>Serial No.</th>
                                <th>Sesa</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='quarantine' AND remark='manufacturing'order by `due_date` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr>
                                <td><?= $idx++ ?></td>
                                <td><?= $row['loc'] ?></td>
                                <td><?= $row['sector'] ?></td>
                                <td><?= $row['family'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['nameplate_serial_number'] ?></td>
                                <td><?= $row['sesa_insert'] ?></td>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <td>
                                        <a href="Edit.php?quarantineEdit=1&serial_number=<?= $row['nameplate_serial_number'] ?>" class='edit'><i class='fa fa-eye' data-toggle='tooltip' title='Edit'></i></a>
                                        <a href="Delete.php?quarantineDelete=1&serial_number=<?= $row['serial_number'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SAMPLE MANUFACTURING -->


            <!-- VIEW PRODUCT -->
                <?php } elseif (isset($_GET['viewProduct'])) { ?>
                    <h1 class="text-center">Data Product</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a href="../contents/insert.php?insertProduct=1" class="btn btn-success text-white text-white">Tambah Data</a>
                    </h1>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sector</th>
                                <th>Family</th>
                                <th>Reference</th>
                                <th>Product ID</th>
                                <th>Kode Produksi</th>
                                <?php if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3 ) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM product order by `sector` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) {

                            ?>
                                <tr>
                                <td><?= $idx++ ?></td>
                                <td><?= $row['sector'] ?></td>
                                <td><?= $row['family'] ?></td>
                                <td><?= $row['reference'] ?></td>
                                <td><?= $row['product_id'] ?></td>
                                <td><?= $row['kode'] ?></td>
                                <?php if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3) { ?>
                                    <td>
                                        <a href="Delete.php?productDelete=1&product_id=<?= $row['product_id'] ?>" id="delete" class='delete alert_delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                    </td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SAMPLE PRODUCT -->


            <!-- VIEW USER -->
                <?php } elseif (isset($_GET['viewUser'])) { ?>
                    <h1 class="text-center">Data User</h1>
                    <?php if ($_SESSION['level'] == 2) { ?>
                        <h1 class="text-center mb-3 mt-3">
                            <a href="Insert.php?insertUser=1" class="btn btn-success text-white">Tambah Data</a>
                        </h1>
                    <?php } ?>

                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Akses</th>
                                <th>Sesa</th>
                                <th>Badge</th>
                                <th>Nama</th>
                                <th>Email</th>

                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM user order by `sesa` DESC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $idx++ ?></td>
                                    <td><?= $row['hak_akses'] ?></td>
                                    <td><?= $row['sesa'] ?></td>
                                    <td><?= $row['badge'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['email'] ?></td>

                                    <?php if ($_SESSION['level'] == 2) { ?>
                                        <td>
                                            <a href="Edit.php?userEdit=1&sesa=<?= $row['sesa'] ?>" class='edit'><i class='fa fa-eye' data-toggle='tooltip' title='Edit'></i></a>
                                            <a href="Delete.php?userDelete=1&sesa=<?= $row['sesa'] ?>" class='delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW USER -->

            
            <!-- VIEW SCRAP -->
                <?php } elseif (isset($_GET['viewScrap'])) { ?>
                    <h1 class="text-center">Data Scrcap</h1>
                    <h1 class="text-center mb-3 mt-3">
                        <a data-toggle="modal" data-target="#myModal" class="btn btn-success text-white">Tambah Data</a>
                    </h1>
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sector</th>
                                <th>Reference</th>
                                <th>Serial Number</th>
                                <th>Scrap Date</th>
                                <?php if ($_SESSION['level'] == 2) { ?>
                                    <th>Sesa Scrap</th>
                                    <th>Aksi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = sprintf("SELECT * FROM data_quarantine where status='scrapped' order by `scrap_date` ASC");
                            $result = $GLOBALS['mysqli']->query($query);
                            $idx = 1;
                            ?>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $idx++ ?></td>
                                    <td><?= $row['sector'] ?></td>
                                    <td><?= $row['reference'] ?></td>
                                    <td><?= $row['serial_number'] ?></td>
                                    <td><?= $row['scrap_date'] ?></td>
                                    <?php if ($_SESSION['level'] == 2) { ?>
                                        <td><?= $row['sesa_scrap'] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $row['serial_number'] ?>" class='edit'><i class='fa fa-eye' data-toggle='tooltip' title='Edit'></i></a>
                                            <a href="Delete.php?scrapDelete=1&serial_number=<?= $row['serial_number'] ?>" class='delete'><i class='fa fa-trash' data-toggle='tooltip' title='Delete'></i></a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <!-- END OF VIEW SCRAP -->


                <?php } ?>


            </div>
        </div>

    <!-- END OF CODE VIEW DATA -->
    
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#delete').on('click', function() {
            // var getLink = $(this).attr('href');
            Swal.fire({
                title: "Yakin hapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            })
            // .then(result => {
            //     //jika klik ya maka arahkan ke proses.php
            //     if (result.isConfirmed) {
            //         window.location.href = getLink
            //     }
            // })
            // return false;
        });
    </script>
    <?php include('../components/footer.php'); ?>
</body>