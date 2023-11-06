<?php

require_once 'database/function.php';

$idSaksi = $_SESSION['id_saksi'];

?>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 JavaScript -->
<script src="assets/plugins/d3/d3.min.js"></script>
<script src="assets/plugins/c3-master/c3.min.js"></script>
<!-- Chart JS -->
<script src="js/dashboard1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart1').getContext('2d');
    let myChart1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                $paslon = mysqli_query($con, "SELECT * FROM calon");
                while ($dataCalon = mysqli_fetch_array($paslon)) {
                    echo "'Paslon-" . $dataCalon['no_urut'] . "',";
                }
                ?> 'Rusak'
                // 'Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'
            ],
            datasets: [{
                label: 'Voting',
                data: [
                    <?php
                    $qry1 = mysqli_query($con, "SELECT * FROM voting WHERE id_saksi = $idSaksi");
                    while ($data = mysqli_fetch_array($qry1)) {
                        echo $data['jumlah'] . ',';
                    }
                    $qry2 = mysqli_query($con, "SELECT * FROM voting_rusak WHERE id_saksi = $idSaksi");
                    $row = mysqli_fetch_array($qry2);
                    echo $row['jumlah'];
                    ?>
                    // 12, 19, 3, 5, 2, 3
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(153, 102, 255)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(153, 102, 255)'
                ],
                borderWidth: 1
            }]
        },
    })
</script>

<script>
    const data2 = {
        labels: [
            <?php
            $paslon = mysqli_query($con, "SELECT * FROM calon");
            while ($dataCalon = mysqli_fetch_array($paslon)) {
                echo "'Paslon-" . $dataCalon['no_urut'] . "',";
            }
            ?> 'Rusak'
            // 'Red',
            // 'Blue',
            // 'Yellow',
            // 'Grey'
        ],
        datasets: [{
            label: 'Voting',
            data: [
                <?php
                $qry1 = mysqli_query($con, "SELECT * FROM voting WHERE id_saksi = $idSaksi");
                while ($data = mysqli_fetch_array($qry1)) {
                    echo $data['jumlah'] . ',';
                }
                $qry2 = mysqli_query($con, "SELECT * FROM voting_rusak WHERE id_saksi = $idSaksi");
                $row = mysqli_fetch_array($qry2);
                echo $row['jumlah'];
                ?>
            ],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(201, 203, 207)',
                'rgb(153, 102, 255)'
            ],
            hoverOffset: 4
        }]
    };

    const config2 = {
        type: 'pie',
        data: data2,
    };

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
</script>
</body>

</html>