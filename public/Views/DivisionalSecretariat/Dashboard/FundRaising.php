<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_divsec.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php'); 
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
                <br>
            <a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/Createfundraise" class="btn-fun">Create New Fundraise</a>

                <div class="container">
                    <div class="row">
                        <div class="col6">
                            <div class="box row-content">Title<br>Description<br><a href="./viewres.php" class="btn-box">View</a></div>
                            <div class="box row-content">Title<br>Description<br><a href="./viewres.php" class="btn-box">View</a></div>   
                           
                        </div>
                        <div class="col6" style="overflow: auto">
                            <div class="box row-content" style="height:100%;min-height: 300px;">
                                <h2>Fundraises</h1>
                                <label for="title">Title</label>
                                <input type="text" id="tuitle" name="title" />

                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" />

                               
                                <div class="space"></div>
                                <a href="" class="btn-box">Remove</a>
                                <a href="" class="btn-box">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <script>
        var thisPage = "#FundRaising";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
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