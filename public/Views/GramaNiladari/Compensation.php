<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once('./public/Views/GramaNiladari/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/GramaNiladari/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1>Compensation Requests</h1>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a href="/<?php echo baseUrl; ?>/GramaNiladari/CreateDeathComp" class="btn_blue">Create Death Compensation</a>
                    <a href="/<?php echo baseUrl; ?>/GramaNiladari/CreatePropertyComp" class="btn_blue">Create Property Compensation</a>
                </div>
            </div>
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
                                        <option>Death</option>
                                        <option>Property</option>
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
                                    <th>Applicant Name</th>
                                    <th>Type</th>
                                    <th>DS note</th>
                                    <th>DMC note</th>
                                    <th>Status</th>
                                    <th>View</th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/20/2021 12:50</td>
                                    <td>N Nimesh </td>
                                    <td>Death</td>
                                    <td>Approved</td>
                                    <td>Pending</td>
                                    <td>Not Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>09/24/2021 11:30</td>
                                    <td>Y Abeysinghe</td>
                                    <td>Death</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>09/20/2021 11:50</td>
                                    <td>N Nirmal </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>08/24/2021 09:50</td>
                                    <td>Bhasuru Lakshan</td>
                                    <td>Death</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/14/2021 15:45</td>
                                    <td>Y Dulana </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/12/2021 15:45</td>
                                    <td>C Kushan </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/04/2021 15:45</td>
                                    <td>T Eranga </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>07/14/2021 15:45</td>
                                    <td>K Hasith </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>07/10/2021 15:45</td>
                                    <td>K Galagedara </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#compensations";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
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