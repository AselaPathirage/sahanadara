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
            <h1>Safehouses</h1>

            <div class="container">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Active
                                    <select id="assigned-user-filter" class="form-control">
                                        <option>All</option>
                                        <option>Active</option>
                                        <option>Not Active</option>

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

                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <div class="container">
                        <div class="row">
                            <div class="col6">
                                <div class="box row-content">
                                    <h4>Bellapitiya Maha Vidyalaya</h4>
                                    <p>Bellapitiya, Horana</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                        <a href="/<?php echo baseUrl; ?>" class="btn_views">View</a>
                                    </div>
                                </div>
                                <div class="box row-content">
                                    <h4>Taxila Central College</h4>
                                    <p>Horana</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_views">View</a>
                                    </div>
                                </div>

                                <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>
                    <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div> -->
                            </div>
                            <div class="col6" style="overflow: auto">
                                <div class="box row-content" style="height:100%;min-height: 300px;">
                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                    </div>
                                    <h4>Bellapitiya Maha Vidyalaya</h4>
                                    <p>Bellapitiya, Horana</p>
                                    <p>Families - 30</p>
                                    <p>People - 100</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#safehouse";
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