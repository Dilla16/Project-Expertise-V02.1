<body onload="sweetalert()">
    <?php
    include('../components/header.php');
    $date = date('y-m-d');
    $days7 = date('y-m-d', strtotime('+7days'));
    $total = mysqli_num_rows($GLOBALS['mysqli']->query("SELECT * FROM data_quarantine"));
    $overdue_scrap = mysqli_num_rows($GLOBALS['mysqli']->query("SELECT * FROM data_quarantine WHERE `due_date`<'$date'"));
    $this_week = mysqli_num_rows($GLOBALS['mysqli']->query("SELECT * FROM data_quarantine WHERE `due_date`<'$days7' AND `due_date`> '$date'"));
    ?>
    <div id="container">
        <div class="judul">Expertise Quarantine</div>
        <div class="container ms-auto">
        <div class="card card-custom">
                <div class="card-body card-body-custom">
                    <div class="card-title card-title-custom">Total</div>
                    <div class="card-text card-text-custom"><?php echo $total; ?></div>
                    <div class="card-bottom-custom">Keep in storage</div>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-body card-body-custom">
                    <div class="card-title card-title-custom">Overdue</div>
                    <div class="card-text card-text-custom"><?php echo $overdue_scrap; ?></div>
                    <div class="card-bottom-custom">Overdue RTA on quarantine</div>
                </div>
            </div>

            <div class="card card-custom">
                <div class="card-body card-body-custom">
                    <div class="card-title card-title-custom">This Week</div>
                    <div class="card-text card-text-custom"><?php echo $this_week; ?></div>
                    <div class="card-bottom-custom">RTA almost 3 months saved</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        function sweetalert() {
            swal({
                icon: 'warning',
                title: "<?php echo $overdue_scrap?> Pcs",
                text: "Have been overdue!",
                button: true
            });

        }
    </script>
    <?php 
    include('../components/footer.php');
    ?>
</body>