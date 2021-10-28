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
        <br>
        <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/DonationRequests" class="btn-fun">Create Donation Request</a>
            </div>
        <div class="container">
            <div class="">

                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Status
                                <select id="assigned-user-filter" class="form-control">
                                    <option>All</option>
                                    <option>Approved</option>
                                    <option>Not Approved</option>
                                </select>
                            </th>
                            <th>Type
                                <select id="status-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Flood</option>
                                    <option>Landslide</option>
                                    <option>Lightning</option>
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
                                <th>Date</th>
                                <th>Applicant Name</th>
                                <th>Type</th>
                                <th>DS Note</th>
                                <th>DMC Note</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                            
                                <td>01/24/2021</td>
                                <td>ABC Perera</td>
                                <td>Flood</td>
                                <td>Approved</td>
                                <td>Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Donationrequests" class="btn-box">View</a>&nbsp<a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Compensation" class="btn-box2">Remove</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>01/24/2021</td>
                                <td>ABC Silva</td>
                                <td>Flood</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Donationrequests" class="btn-box">View</a>&nbsp<a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Compensation" class="btn-box2">Remove</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>01/24/2021</td>
                                <td>ABC Silva</td>
                                <td>Flood</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Donationrequests" class="btn-box">View</a>&nbsp<a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Compensation" class="btn-box2">Remove</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>01/24/2021</td>
                                <td>ABC Silva</td>
                                <td>Flood</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Donationrequests" class="btn-box">View</a>&nbsp<a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Compensation" class="btn-box2">Remove</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>01/24/2021</td>
                                <td>ABC Silva</td>
                                <td>Flood</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Donationrequests" class="btn-box">View</a>&nbsp<a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Compensation" class="btn-box2">Remove</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>01/24/2021</td>
                                <td>ABC Silva</td>
                                <td>Flood</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Donationrequests" class="btn-box">View</a>&nbsp<a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Compensation" class="btn-box2">Remove</a></td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>01/24/2021</td>
                                <td>ABC Silva</td>
                                <td>Flood</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Donationrequests" class="btn-box">View</a>&nbsp<a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/Compensation" class="btn-box2">Remove</a></td>
                            </tr>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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