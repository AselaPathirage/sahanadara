<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> District Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_divsec.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DistrictSecretariat/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DistrictSecretariat/includes/topnav.php'); 
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
                            
                                <td>01/24/2021 12:10</td>
                                <td>ABC Perera</td>
                                <td>Death</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>


                            </tr>

                            <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                            <td>05/20/2021 9:51</td>
                                <td>KD Silva</td>
                                <td>Property</td>
                                <td>Approved</td>
                                <td>Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>

                            </tr>

                            <td>06/19/2021 5:20</td>
                                <td>KD Silva</td>
                                <td>Death</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>

                            </tr>

                            <td>07/21/2021 4:20</td>
                                <td>KD Silva</td>
                                <td>Property</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>

                            </tr>

                            <td>08/25/2021 3:20</td>
                                <td>S Rashmika</td>
                                <td>Property</td>
                                <td>Approved</td>
                                <td>Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>

                            </tr>

                            <td>09/11/2021 2:40</td>
                                <td>AD Pathirage</td>
                                <td>Death</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>

                            </tr>

                            <td>01/24/2021 4:50</td>
                                <td>YD Abeysinghe</td>
                                <td>Property</td>
                                <td>Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>

                            </tr>

                            <td>01/25/2021 3:50</td>
                                <td>HT Pasindu</td>
                                <td>Death</td>
                                <td>Not Approved</td>
                                <td>Not Approved</td>
                                <td>Active</td>
                                <td><a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/ViewCompensation" class="btn-box">View</a></td>

                            </tr>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        var thisPage = "#Compensation";
        $(document).ready(function() {
            $("#Home,#Compensation").each(function() {
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