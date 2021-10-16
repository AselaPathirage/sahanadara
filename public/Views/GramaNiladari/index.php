<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari </title>
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
    include_once('./public/Views/GramaNiladari/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/GramaNiladari/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1 class="text-center">Welcome Grama Niladari</h1>
            <div class="space"></div>
            <div class="stat-row">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Approved Compensation Requests</div>
                        <div class="number">40</div>

                    </div>
                    <i class='bx bxs-report cart one'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Approved Incident Reports</div>
                        <div class="number">38</div>

                    </div>
                    <i class='bx bxs-report cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Residents</div>
                        <div class="number">320</div>

                    </div>
                    <i class='bx bx-building-house cart three'></i>
                </div>

            </div>
        </div>
        <div class="space"></div>
        <div class="container text-center">
            <div class="row-content alert-div" style="margin: 10px auto;">
                <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                    of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                </p>
            </div>
            <div class="row-content alert-div" style="margin: 10px auto;">
                <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                    of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                </p>
            </div>
            <div class="row-content alert-div" style="margin: 10px auto;">
                <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                    of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                </p>
            </div>

        </div>
    </section>
    <script>
        var thisPage = "#stats";
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