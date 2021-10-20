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
               
        
        <!-- TABLE -->
        <div class="container">
            <div class="">
                <br>
            <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/sendalerts" class="btn-fun">Send Alert</a>

                <!-- <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Assigned User
                                <select id="assigned-user-filter" class="form-control">
                                    <option>None</option>
                                    <option>John</option>
                                    <option>Rob</option>
                                    <option>Larry</option>
                                    <option>Donald</option>
                                    <option>Roger</option>
                                </select>
                            </th>
                            <th>Status
                                <select id="status-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Not Started</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                            </th>
                            <th>Milestone
                                <select id="milestone-filter" class="form-control">
                                    <option>None</option>
                                    <option>Milestone 1</option>
                                    <option>Milestone 2</option>
                                    <option>Milestone 3</option>
                                </select>
                            </th>
                            <th>Priority
                                <select id="priority-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                    <option>Urgent</option>
                                </select>
                            </th>
                            <th>Tags
                                <select id="tags-filter" class="form-control">
                                    <option>None</option>
                                    <option>Tag 1</option>
                                    <option>Tag 2</option>
                                    <option>Tag 3</option>
                                </select>
                            </th>
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table> -->


                <div class="panel panel-primary filterable">
                    <table id="task-list-tbl" class="table">
                        <thead>
                            <tr>
                                
                                <th>Date/Time</th>
                                <th>Message</th>
                                <th>Officers only</th>
                                <th>Location</th>
                    
                            </tr>
                        </thead>

                        <tbody>

                            <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                
                                <td>01/24/2015</td>
                                <td>Task 1</td>
                                <td>Yes</td>
                                <td>Horana</td>
                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                
                                <td>03/14/2015</td>
                                <td>Task 2</td>
                                <td>No</td>
                                <td>Colombo</td>
                            </tr>

                            <tr id="task-3" class="task-list-row" data-task-id="3" data-user="Donald" data-status="Not Started" data-milestone="Milestone 1" data-priority="Low" data-tags="Tag 3">
                                
                                <td>11/16/2014</td>
                                <td>Task 3</td>
                                <td>Yes</td>
                                <td>Matara</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

           
               

    </section>
    <script>
        var thisPage = "#Alerts";
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
    <script src="/<?php echo baseUrl; ?>/public/assets/js/table.js"></script>
</body>
</html>