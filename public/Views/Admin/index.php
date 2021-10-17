<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin </title>
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
    include_once('./public/Views/Admin/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/Admin/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1 class="text-center">Welcome Admin</h1>
            <div class="space"></div>
            <div class="stat-row">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">District Secretariats</div>
                        <div class="number">20</div>

                    </div>
                    <i class='bx bx-user cart one'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Divisional Secretariats</div>
                        <div class="number">80</div>

                    </div>
                    <i class='bx bx-user cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Disaster Management Officers</div>
                        <div class="number">80</div>

                    </div>
                    <i class='bx bx-user cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Grama Niladari</div>
                        <div class="number">520</div>

                    </div>
                    <i class='bx bx-user cart four'></i>
                </div>

            </div>
        </div>
        <div class="space"></div>

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