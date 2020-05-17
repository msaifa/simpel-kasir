<!-- 
    created by msaifa
    @ 2020
 -->

<?php
    require './conf/init.php' ;
    cek();

    $tahun = date('Y');
    $bulan = date('m');
    $tanggal = date('Y-m-d');

    $sql = "select 
            (select sum(tratotal) from transaksi t where month (tratanggal) = 1 and year(tratanggal) = {$tahun}) as Jan,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 2 and year(tratanggal) = {$tahun}) as Feb,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 3 and year(tratanggal) = {$tahun}) as Mar,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 4 and year(tratanggal) = {$tahun}) as Apr,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 5 and year(tratanggal) = {$tahun}) as May,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 6 and year(tratanggal) = {$tahun}) as Jun,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 7 and year(tratanggal) = {$tahun}) as Jul,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 8 and year(tratanggal) = {$tahun}) as Aug,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 9 and year(tratanggal) = {$tahun}) as Sep,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 10 and year(tratanggal) = {$tahun}) as Okt,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 11 and year(tratanggal) = {$tahun}) as Nov,
            (select sum(tratotal) from transaksi t where month (tratanggal) = 12 and year(tratanggal) = {$tahun}) as Des,
            (select count(proid) from produk) as totalbarang,
            (select sum(tratotal) from transaksi t where tratanggal='{$tanggal}') as hari,
            (select sum(tratotal) from transaksi t where month (tratanggal) = {$bulan} and year(tratanggal) = {$tahun}) as bulan" ;

    $res = query($sql) ;
    $row = mysqli_fetch_assoc($res) ;

    $sql = "" ;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - msaifa</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=3c16114e461561544db42dd299b535e5">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=d41d8cd98f00b204e9800998ecf8427e">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>msaifa</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt" style="font-size: 20px;"></i><span style="margin-left: 10px;font-size: 18px;">Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pages/barang.php"><i class="icon-layers" style="font-size: 20px;"></i><span style="margin-left: 10px;font-size: 18px;">Data Barang</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pages/penjualan.php"><i class="icon-basket" style="font-size: 20px;"></i><span style="margin-left: 10px;font-size: 18px;">Penjualan</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pages/laporan.php"><i class="icon-list" style="font-size: 20px;"></i><span style="font-size: 18px;margin-left: 10px;">Laporan</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="pages/about.php"><i class="icon-info" style="font-size: 20px;"></i><span style="font-size: 18px;margin-left: 10px;">Tentang msaifa</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                                <div class="text-center d-none d-md-inline">
                    <div class="row">
                        <div class="col"><a href="pages/logout.php" class="btn btn-primary" style="background-color: #e74a3b;"><i class="icon-logout" style="margin-right: 10px;font-size: 18px;"></i>Logout</a></div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"></nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <!-- Start: Chart -->
                    <div class="row">
                        <div class="col-lg-7 col-xl-8" style="width: auto;">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center" style="width: auto;">
                                    <h6 class="text-primary font-weight-bold m-0">Grafik Omset</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                            role="menu">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" role="presentation" href="#">&nbsp;Action</a><a class="dropdown-item" role="presentation" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#">&nbsp;Something else here</a></div>
                                    </div>
                                </div>
                                <div class="card-body" style="width: auto;">
                                    <div class="chart-area">
                                        <canvas data-bs-chart="{
                                            &quot;type&quot;:&quot;line&quot;,
                                            &quot;data&quot;:{
                                                &quot;labels&quot;:
                                                [
                                                    &quot;Jan&quot;,
                                                    &quot;Feb&quot;,
                                                    &quot;Mar&quot;,
                                                    &quot;Apr&quot;,
                                                    &quot;May&quot;,
                                                    &quot;Jun&quot;,
                                                    &quot;Jul&quot;,
                                                    &quot;Aug&quot;,
                                                    &quot;Sep&quot;,
                                                    &quot;Okt&quot;,
                                                    &quot;Nov&quot;,
                                                    &quot;Dec&quot;
                                                ],
                                                &quot;datasets&quot;:
                                                [
                                                    {
                                                        &quot;label&quot;:&quot;Earnings&quot;,
                                                        &quot;fill&quot;:true,
                                                        &quot;data&quot;:
                                                        [
                                                            &quot;<?= $row['Jan'] ? $row['Jan'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Feb'] ? $row['Feb'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Mar'] ? $row['Mar'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Apr'] ? $row['Apr'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['May'] ? $row['May'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Jun'] ? $row['Jun'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Jul'] ? $row['Jul'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Aug'] ? $row['Aug'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Sep'] ? $row['Sep'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Okt'] ? $row['Okt'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Nov'] ? $row['Nov'] : '' ; ?>&quot;,
                                                            &quot;<?= $row['Des'] ? $row['Des'] : '' ; ?>&quot;
                                                        ],
                                                        &quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,
                                                        &quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},
                                                        &quot;options&quot;:{
                                                            &quot;maintainAspectRatio&quot;:false,
                                                            &quot;legend&quot;:{
                                                                &quot;display&quot;:false
                                                            },
                                                            &quot;title&quot;:{},
                                                            &quot;scales&quot;:{
                                                                &quot;xAxes&quot;:
                                                                [
                                                                    {
                                                                        &quot;gridLines&quot;:{
                                                                            &quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,
                                                                            &quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,
                                                                            &quot;drawBorder&quot;:false,
                                                                            &quot;drawTicks&quot;:false,
                                                                            &quot;borderDash&quot;:
                                                                            [
                                                                                &quot;2&quot;
                                                                            ],
                                                                            &quot;zeroLineBorderDash&quot;:[&quot;2&quot;],
                                                                            &quot;drawOnChartArea&quot;:false
                                                                        },
                                                                        &quot;ticks&quot;:{
                                                                            &quot;fontColor&quot;:&quot;#858796&quot;,
                                                                            &quot;padding&quot;:20
                                                                        }
                                                                    }
                                                                ],
                                                                &quot;yAxes&quot;:
                                                                [
                                                                    {
                                                                        &quot;gridLines&quot;:{
                                                                            &quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,
                                                                            &quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,
                                                                            &quot;drawBorder&quot;:false,
                                                                            &quot;drawTicks&quot;:false,
                                                                            &quot;borderDash&quot;:[&quot;2&quot;],
                                                                            &quot;zeroLineBorderDash&quot;:[&quot;2&quot;]
                                                                        },
                                                                        &quot;ticks&quot;:{
                                                                            &quot;fontColor&quot;:&quot;#858796&quot;,
                                                                            &quot;padding&quot;:20
                                                                        }
                                                                    }
                                                                ]
                                                            }
                                                        }
                                                    }"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4" style="width: auto;">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Jumlah produk</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $row['totalbarang']?> Produk</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow border-left-success py-2" style="margin-top: 10px;width: auto;">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Omset hari ini</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= number_format($row['hari'], 2) ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow border-left-info py-2" style="margin-top: 10px;width: auto;">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Omset Bulan ini</span></div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col"><span><?= number_format($row['bulan'], 2) ?></span></div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © msaifa 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js?h=b86d882c5039df370319ea6ca19e5689"></script>
</body>

</html>