<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Menunggu Konfirmasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $menungguKonfirmasi ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Sudah Bayar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sudahBayar ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Belum bayar
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $belumBayar ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Ditolak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ditolak ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kelulusan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="hasilLulus"></canvas>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">SIM</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="sim"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>
<script src="<?= 'assets/' ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= 'assets/' ?>js/chartjs-plugin-labels.js"></script>
<script>
    $(document).ready(function() {
        $('#master-dashboard').addClass('active');
    })

    var ctx = document.getElementById("hasilLulus");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [<?php foreach ($status_hasil as $hasil) {
                            echo "'$hasil->status_hasil'" . ", ";
                        } ?>],
            datasets: [{
                data: [<?php foreach ($status_hasil as $hasil) {
                            echo "'$hasil->jumlah'" . ", ";
                        } ?>],
                backgroundColor: ['#a58faa', '#a6d6d6'],
                hoverBackgroundColor: ['#a58faa', '#a6d6d6'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true,
                position: 'bottom'
            },
            cutoutPercentage: 80,
            plugins: {
                labels: {
                    render: 'percentage',
                    fontColor: '#000',
                    position: 'outside'
                }
            }
        },
    });

    var rtx = document.getElementById("sim");
    var myPieChart = new Chart(rtx, {
        type: 'doughnut',
        data: {
            labels: [<?php foreach ($totalsim as $sim) {
                            echo "'$sim->jenis_sim'" . ", ";
                        } ?>],
            datasets: [{
                data: [<?php foreach ($totalsim as $sim) {
                            echo "'$sim->jumlah'" . ", ";
                        } ?>],
                backgroundColor: ['#02475e', '#687980', '#ffc288', '#ca8a8b', '#fb3640', '#fdca40', '#a799b7', '#81b214', '#ffe268', '#d8ac9c', '#9ddfd3'],
                hoverBackgroundColor: ['#02475e', '#687980', '#ffc288', '#ca8a8b', '#fb3640', '#fdca40', '#a799b7', '#81b214', '#ffe268', '#d8ac9c', '#9ddfd3'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true,
                position: 'bottom'
            },
            cutoutPercentage: 80,
            plugins: {
                labels: {
                    render: 'percentage',
                    fontColor: '#000',
                    position: 'outside'
                }
            }
        },
    });
</script>