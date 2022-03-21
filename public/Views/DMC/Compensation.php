<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> DMC </title>
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
    include_once('./public/Views/DMC/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DMC/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1>Compensations</h1>

            <div class="container">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Status
                                    <select id="assigned-user-filter" class="form-control">
                                        <option>All</option>
                                        <option>Pending</option>
                                        <option>Approved</option>
                                        <option>Not Approved</option>

                                    </select>
                                </th>
                                <th>District
                                    <select id="status-filter" class="form-control">
                                        <option>All</option>
                                        <option>Kaluatara</option>
                                        <option>Gamapaha</option>

                                    </select>
                                </th>
                                <th>Divisional Sec office
                                    <select id="status-filter" class="form-control">
                                        <option>All</option>
                                        <option>Kaluatara</option>
                                        <option>Madurawala</option>

                                    </select>
                                </th>
                                <th>GN Division
                                    <select id="status-filter" class="form-control">
                                        <option>All</option>
                                        <option>Kaluatara West</option>
                                        <option>Madurawala South</option>

                                    </select>
                                </th>
                                <th>Type
                                    <select id="status-filter" class="form-control">
                                        <option>All</option>
                                        <option>Property</option>
                                        <option>Death</option>
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
                                    <th>Status</th>
                                    <th>District</th>
                                    <th>Div S Office</th>
                                    <th>GN Division</th>
                                    <th>Type</th>
                                    <th>View</th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Pending</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Death </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Pending</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Death </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Pending</td>
                                    <td>Gampaha</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Property </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Death </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Yes</td>
                                    <td>Gampaha</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Property </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/22/2021 12:50</td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Death </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/22/2021 12:50</td>
                                    <td>Yes</td>
                                    <td>Gampaha</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Property </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/21/2021 12:50</td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Death </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/21/2021 12:50</td>
                                    <td>Yes</td>
                                    <td>Gampaha</td>
                                    <td>Millaniya</td>
                                    <td>Bellapitiya </td>
                                    <td>Property </td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewCompensation" class="btn_views">View</a></td>

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