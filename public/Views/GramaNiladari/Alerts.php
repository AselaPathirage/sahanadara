<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
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
            <h1>Alerts</h1>
            <div class="container text-center">
                <div class="row-content alert-div alert-warning" style="margin: 10px auto;">
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
                <div class="row-content alert-div alert-warning" style="margin: 10px auto;">
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