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
        <div class="container">
            <br>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/FinalIncidents" class="btn-box">Create Final Incident</a>
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/ExpenseNote" class="btn-box">Add Expense Note</a>
                </div>
            </div>
 
        <!-- TABLE -->
        <div class="container">
            <div class="">

                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Active
                                <select id="assigned-user-filter" class="form-control">
                                    <option>None</option>
                                    <option>John</option>
                                    <option>Rob</option>
                                    <option>Larry</option>
                                    <option>Donald</option>
                                    <option>Roger</option>
                                </select>
                            </th>
                            <th>Type
                                <select id="status-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Not Started</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
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
                                <th>Incident Descreption</th>
                                <th>Type</th>
                                <th>DS Note</th>
                                <th>DMC Note</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                
                                <td>09/24/2015</td>
                                <td>Task title 1</td>
                                <td>Initial</td>
                                <td>Approved</td>
                                <td>Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/InitialIncidents" class="btn-box">View</a></td>

                                
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                <td>02/24/2015</td>
                                <td>Task title 2</td>
                                <td>Relief</td>
                                <td>Approved</td>
                                <td>Approved</td>
                                <td>Active</td>
                                <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/InitialIncidents" class="btn-box">View</a></td>

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