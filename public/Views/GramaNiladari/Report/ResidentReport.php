<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari - Report </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchList.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




</head>

<body>
    <?php
    include_once('./public/Views/GramaNiladari/includes/sidebar_reports.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/GramaNiladari/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>Resident Report</h1>
                    <!-- <h3>Generate resident report</h3> -->
                </center>
                <form action="<?php echo HOST;?>/GramaNiladari/Report/ViewResidents" target="_blank">
                    <div class="">

                        <h3 class="text-center">Generate resident report</h3>

                        <div class="row" style="justify-content: center;">

                            <input type="submit" value="Generate" class="btn-alerts" />
                            <!-- <input type="reset" value="Cancel" class="btn-alerts" /> -->
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/responsiblePersonAidReport.js"></script>
    <script>
        var thisPage = "#safehouse";
        $(document).ready(function() {
            $("#compensation,#safehouse").each(function() {
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
        document.getElementById('reset').onclick = function() {

        }
    </script>
</body>

</html>