<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> DMC </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_dmc.css">
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
            <h1>Alerts</h1>
            <div class="container">
                <div style="display:block;text-align: right;">
                    <a href="/<?php echo baseUrl; ?>/DMC/SendAlert" class="btn_alerts">Send Alert</a>
                </div>
            </div>
            <div class="container">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Date
                                    <select id="assigned-user-filter" class="form-control">
                                        <option>None</option>
                                        <option>Past week</option>
                                        <option>Past month</option>

                                    </select>
                                </th>
                                <th>Officers only
                                    <select id="status-filter" class="form-control">
                                        <option>Any</option>
                                        <option>Yes</option>
                                        <option>No</option>

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
                                    <th>Message</th>
                                    <th>Officers Only</th>
                                    <th>District</th>
                                    <th>Div S Office</th>
                                    <th>GN Divisions</th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Flood alert</td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td>Millaniya West</td>

                                </tr>


                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/20/2021 10:26</td>
                                    <td>Lanslide alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Bulathsinhala</td>
                                    <td>Bulathsinhala- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/18/2021 18:43</td>
                                    <td>Flood alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/16/2021 13:56</td>
                                    <td>Landslide alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana- All</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/20/2021 10:26</td>
                                    <td>Lanslide alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Bulathsinhala</td>
                                    <td>Bulathsinhala- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/18/2021 18:43</td>
                                    <td>Flood alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/16/2021 13:56</td>
                                    <td>Landslide alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana- All</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/20/2021 10:26</td>
                                    <td>Lanslide alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Bulathsinhala</td>
                                    <td>Bulathsinhala- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/18/2021 18:43</td>
                                    <td>Flood alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana West</td>

                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/16/2021 13:56</td>
                                    <td>Landslide alert</td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana, Millaniya</td>
                                    <td>Millaniya- All, Horana- All</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#alerts";
        $(document).ready(function() {
            $("#stats,#updates").each(function() {
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