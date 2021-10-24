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
        <div class="container">
        <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Active Status
                                <select id="status-filter" class="form-control">
                                    <option>Active</option>
                                    <option>Not Started</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                            </th>
                            <th>GN Division
                                <select id="milestone-filter" class="form-control">
                                    <option>None</option>
                                    <option>Palannoruwa</option>
                                    <option>Koralaema</option>
                                    <option>Olaboduwa </option>
                                </select>
                            </th>
                            
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>


                <div class="container">
                    <div class="row">
                        <div class="col6">
                            <div class="box row-content">Name<br>Office<br>NIC<br><a href="./viewres.php" class="btn-box">View</a></div>
                            <div class="box row-content">Name<br>Office<br>NIC<br><a href="./viewres.php" class="btn-box">View</a></div> 
                            <div class="box row-content">Name<br>Office<br>NIC<br><a href="./viewres.php" class="btn-box">View</a></div> 
                            <div class="box row-content">Name<br>Office<br>NIC<br><a href="./viewres.php" class="btn-box">View</a></div>    
                           
                        </div>
                        <div class="col6" style="overflow: auto">
                            <div class="box row-content" style="height:100%;min-height: 300px;">
                                <h2>Responsible Person</h1>
                                <label for="your_name">NIC</label>
                                <input type="text" id="nic" name="yourname" />

                                <label for="f_name">First name</label>
                                <input type="text" id="f_name" name="f_name" />

                                <label for="l_name">Last Name</label>
                                <input type="text" id="l_name" name="l_name" />

                                <label for="address">Address</label>
                                <input type="text" id="adress" name="address" />

                                <label for="safehouse">Safehouse</label>
                                <input type="text" id="safehouse" name="safehouse" />

                                <label for="email">Email</label>
                                <input type="email" id="adress" name="youremail" />

                                <label for="address">Tele Number</label>
                                <input type="text" id="tp" name="tpnum" />


                                <div class="space"></div>
                                <a href="" class="btn-box">Add</a>
                                <a href="" class="btn-box">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <script>
        var thisPage = "#ResponsiblePerson";
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