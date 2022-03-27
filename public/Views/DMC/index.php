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
            <h1 class="text-center">Welcome DMC</h1>
            <div class="space"></div>


            <section class="services">
                <a href="<?php echo HOST; ?>/DMC/Compensation">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#ffb508">
                            <ion-icon name="videocam-outline">
                                <i class='bx bxs-report '></i>
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;" id="compCount">
                                55
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 150px;">
                            <h2 class="services__title">
                                Compensation Requests
                            </h2>
                        </div>
                    </div>
                </a>
                <a href="<?php echo HOST; ?>/DMC/IncidentReporting">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#4eb7ff">
                            <ion-icon name="videocam-outline">
                                <i class='bx bxs-report '></i>
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;" id="reportApprovals">
                                20
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 150px;">
                            <h2 class="services__title">
                                Pending Report Approvals
                            </h2>
                        </div>
                    </div>
                </a>
                <a href="<?php echo HOST; ?>/DMC/SafeHouse">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#fd6494">
                            <ion-icon name="videocam-outline">
                                <i class='bx bx-building-house '></i>

                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;" id="activesfs">
                                180
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 150px;">
                            <h2 class="services__title">
                                Active SafeHouses
                            </h2>

                        </div>
                    </div>
                </a>

            </section>






        </div>
        <div class="space"></div>
        <div class="container">
            <div class="text-center" style="display:block;">
                <a href="<?php echo HOST; ?>/DMC/Alerts" class="btn_alerts">Send Alert</a>
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

            getIncidentCount();
            getCompCount();
            getSafeCount();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }


        function getIncidentCount() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incidentcount",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#reportApprovals").text(output['c']);
        }

        function getCompCount() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>compcount",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#compCount").text(output['c']);
        }

        function getSafeCount() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safecount",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#activesfs").text(output['c']);
        }
    </script>
</body>

</html>