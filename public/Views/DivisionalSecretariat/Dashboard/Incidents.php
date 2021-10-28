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
 
        <!-- TABLE -->
        <div class="container">
            <div class="">

            <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Approved
                                <select id="assigned-user-filter" class="form-control">
                                    <option>All</option>
                                    <option>Approved</option>
                                    <option>Not Approved</option>
                                </select>
                            </th>
                            <th>Type
                                <select id="status-filter" class="form-control">
                                    <option>All</option>
                                    <option>Initial</option>
                                    <option>Relief</option>
                                    <option>Final</option>
                                </select>
                            </th>
                            
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>


                <div class="panel panel-primary filterable">
                    <table id="task-list-tbl" class="table">
                        <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>DS Note</th>
                                <th>DMC Note</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                            
                                <td>01/24/2021 1:50</td>
                                <td>Flood</td>
                                <td>Initial</td>
                                <td>Approved</td>
                                <td>Approved</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>01/24/2021 12:20</td>
                                <td>Flood</td>
                                <td>Final</td>
                                <td>Approved</td>
                                <td>Pending</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                <td>03/28/2021  1:54</td>
                                <td>Flood</td>
                                <td>Relief</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>

                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                <td>02/04/2021 9:54</td>
                                <td>Flood</td>
                                <td>Final</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>

                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                <td>02/02/2021 10:54</td>
                                <td>Flood</td>
                                <td>Relief</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>

                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                <td>02/02/2021 9:54</td>
                                <td>Flood</td>
                                <td>Relief</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>

                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                <td>02/05/2021 6:54</td>
                                <td>LandSlide</td>
                                <td>Initial</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>

                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                <td>02/06/2021 9:54</td>
                                <td>Lightning</td>
                                <td>Relief</td>
                                <td>Approved</td>
                                <td>Approved</td>
                                <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/ViewIncidents" class="btn-box">View</a></td>

                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

           
               

    </section>
    <script>
        var thisPage = "#Incidents";
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