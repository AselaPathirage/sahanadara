<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DisasterOfficer/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
            <h1 style="text-align:center;">Welcome Disaster Management Officer</h1>
            <div class="stat-row">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Incident Reports</div>
                        <div class="number">10</div>

                    </div>
                    <i class='bx bxs-report'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Donation Requests Notices</div>
                        <div class="number">5</div>

                    </div>
                    <i class='bx bxs-report'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Active Safe Houses</div>
                        <div class="number">6</div>

                    </div>
                    <i class='bx bxs-report'></i>
                </div>
            </div>
        </div>

        <!-- BOXES -->
        <div class="container">
        <h1 style="text-align:center;">Incidents</h1>
            <div class="row">
                <div class="col3">
                    <div class="box row-content">Title <br> Description </div>
                    <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>-->
                </div>
                <div class="col3">
                    <div class="box row-content">Title <br> Description </div>
                    <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>-->
                </div>
                <div class="col3">
                    <div class="box row-content">Title <br> Description </div>
                    <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>-->
                </div>
                <div class="col3">
                    <div class="box row-content">Title <br> Description </div>
                    <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>-->
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#Dashboard";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
    </script>
</body>
</html>