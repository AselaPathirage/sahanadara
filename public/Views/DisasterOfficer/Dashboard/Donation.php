<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_disofficer.css">
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
        <br>
        <div class="container" style="text-align: right;>
                <div style="display:block;">
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/DonationRequests" class="btn-fun">Create Donation Request</a>
                    <div class="space"></div>
            </div>
            <div class="box">
            <div class="row text-center">
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                    </div>
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                    </div>
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                    </div>
                </div>
            </div>
        </div>        
    <script>
        var thisPage = "#Donation";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
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