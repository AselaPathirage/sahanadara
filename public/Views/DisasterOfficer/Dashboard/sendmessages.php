<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_divsec.css">
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
        <div class="space" style="margin-bottom: 30px;"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col6 box" style="margin:0 auto;">
                    <form action="#" method="post">
                        <h1>New Message</h1>

                        <div class="row-content">

                            <label for="address">Message</label>
                            <textarea id="address" name="youraddress"></textarea>

                            
                            <div class="row" style="justify-content: center;">

                                <input type="submit" value="Send" class="btn-alerts" />
                                <input type="reset" value="Cancel" class="btn-alerts" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#Messages";
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
    <script src="/<?php echo baseUrl; ?>/public/assets/js/table.js"></script>
</body>
</html>