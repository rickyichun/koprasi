<?php 
    include "componen/basisdata.php";
    include "componen/cek-login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashboard - Koperasi KSUA</title>
    <?php include "componen/header.php" ?>
    <!-- Custom styles for this template -->
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <?php include "componen/webtitle.php" ?>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <?php include "componen/menu.php" ?>
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-9 main-chart">
                        <!--CUSTOM CHART START -->
                        <div class="border-head">
                            <h3>Tabel Keuntungan per Tahun</h3>
                        </div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>10.000</span></li>
                                <li><span>8.000</span></li>
                                <li><span>6.000</span></li>
                                <li><span>4.000</span></li>
                                <li><span>2.000</span></li>
                                <li><span>0</span></li>
                            </ul>
                            <div class="bar">
                                <div class="title">JAN</div>
                                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip"
                                    data-placement="top">85%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">FEB</div>
                                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip"
                                    data-placement="top">50%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">MAR</div>
                                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip"
                                    data-placement="top">60%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">APR</div>
                                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip"
                                    data-placement="top">45%</div>
                            </div>
                            <div class="bar">
                                <div class="title">MAY</div>
                                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip"
                                    data-placement="top">32%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">JUN</div>
                                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip"
                                    data-placement="top">62%</div>
                            </div>
                            <div class="bar">
                                <div class="title">JUL</div>
                                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip"
                                    data-placement="top">75%</div>
                            </div>
                        </div>
                        <!--custom chart end-->
                        <div class="row mt">

                        </div>
                        <!-- /row -->
                        <div class="row">

                        </div>
                        <div class="row">

                        </div>
                        <!-- /row -->
                        <div class="row">

                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /col-lg-9 END SECTION MIDDLE -->
                    <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
                    <div class="col-lg-3 ds">
                        <!--COMPLETED ACTIONS DONUTS CHART-->
                        <div class="donut-main">
                            <h4>Pendapatan & Pengeluaran</h4>
                            <canvas id="newchart" height="130" width="130"></canvas>
                            <script>
                            var doughnutData = [{
                                    value: 70,
                                    color: "#4ECDC4"
                                },
                                {
                                    value: 30,
                                    color: "#fdfdfd"
                                }
                            ];
                            var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(
                                doughnutData);
                            </script>
                        </div>
                        <!--NEW EARNING STATS -->
                        <div class="panel terques-chart">
                            <div class="panel-body">
                                <div class="chart">
                                    <div class="centered">
                                        <span>Grafik Jumlah Peserta</span>

                                    </div>
                                    <br>
                                    <div class="sparkline" data-type="line" data-resize="true" data-height="75"
                                        data-width="90%" data-line-width="1" data-line-color="#fff"
                                        data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                        data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col-lg-3 -->
                </div>
                <!-- /row -->
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <?php include "componen/header.php" ?>
        </footer>
        <!--footer end-->
    </section>
    <?php include "componen/js.php" ?>
    <script src="lib/common-scripts.js"></script>
    <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="lib/gritter-conf.js"></script>
    <!--script for this page-->
    <script src="lib/sparkline-chart.js"></script>
    <script src="lib/zabuto_calendar.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Selamat datang di AdminPage Koprasi KSUA!',
            // (string | mandatory) the text inside the notification
            text: 'Silahkan menggunakan aplikasi ini untuk mengelola koprasi anda!',
            // (string | optional) the image to display on the left
            image: 'img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 8000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
    </script>
    <script type="application/javascript">
    $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function() {
                return myDateFunction(this.id, false);
            },
            action_nav: function() {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                    type: "text",
                    label: "Special event",
                    badge: "00"
                },
                {
                    type: "block",
                    label: "Regular event",
                }
            ]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
    </script>
</body>

</html>