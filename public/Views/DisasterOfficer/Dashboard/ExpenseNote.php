<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_disofficer.css">
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
            <div class="container" style="text-align: right;">
            </div>
 
        <!-- TABLE -->
        <div class="container">
        <div class="container col8">
    <div class="box">
        <div class="box1">
            <h1 class="text-center">Expense Note</h1>
            <div class="row">
                <div class="col3">
                    <label for="name">Name</label>
                </div>
                <div class="col9">
                    <input type="text" id="name" name="name" placeholder="Name">
                </div>
            </div>
           
            <div class="row">
                <div class="col3">
                    <label for="price">Price</label>
                </div>
                <div class="col9">
                    <input type="text" id="price" name="price" placeholder="Price">
                </div>
            </div>
            

            <div class="row " style="text-align:right;justify-content: right;">
                <input type="submit" style="background-color: red;" value="Cancel">
                <input type="submit" style="background-color: darkblue;" value="Submit">
            </div>
            </form>
        </div>
    </div>
               

    </section>
    <script>
        var thisPage = "#IncidentReporting";
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