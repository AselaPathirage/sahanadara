<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari- Report </title>
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
                    <h1>Compensation Report</h1>
                </center>
                <form action="<?php echo HOST;?>/GramaNiladari/Report/ViewCompensation" target="_blank">
                    <div class="row-content">

                        <h2>Select </h2>
                        <div class="row">

                            <div class="col3">
                                <label for="crusttype">Type</label>
                                <select id="type" name="type">
                                    <option value="all">All</option>
                                    <option value="Death">Death</option>
                                    <option value="Property">Property</option>
                                </select>
                            </div>
                            <div class="col3">
                                <label for="df">From</label>
                                <input type="date" id="from" name="from">
                            </div>
                            <div class="col3">
                                <label for="crusttype">To</label>
                                <input type="date" id="to" name="to">
                            </div>
                        </div>

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
        var thisPage = "#compensation";
        $(document).ready(function() {
            $("#incident,#safehouse").each(function() {
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