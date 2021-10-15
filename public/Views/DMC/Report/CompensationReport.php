<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> DMC - Report </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/searchList.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php
    include_once('./public/Views/DMC/includes/sidebar_reports.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DMC/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>Compensation Report</h1>
                </center>
                <form>
                    <div class="row-content">

                        <h2>Select the area</h2>
                        <div class="row">
                            <div class="col3"><label for="crusttype">District</label>
                                <select id="crusttype" name="crust">
                                    <option value="white">All</option>
                                    <option value="wheat">Kaluatara</option>
                                    <option value="thin">Gampaha</option>
                                </select>
                            </div>
                            <div class="col3"><label for="crusttype">DS Division</label>
                                <select id="crusttype" name="crust">
                                    <option value="wheat">All</option>
                                    <option value="wheat">Horana</option>
                                    <option value="white">Millaniya</option>

                                </select>
                            </div>
                            <div class="col3"><label for="crusttype">GN Division</label>
                                <select id="crusttype" name="crust">
                                    <option value="wheat">All</option>
                                    <option value="wheat">Bellapitiya West</option>
                                    <option value="white">Bellapitiya North</option>
                                    <option value="thin">Horana North</option>
                                </select>
                            </div>
                            <div class="col3">
                                <label for="crusttype">Type</label>
                                <select id="crusttype" name="crust">
                                    <option value="wheat">All</option>
                                    <option value="wheat">Death</option>
                                    <option value="white">Property</option>
                                </select>
                            </div>
                            <div class="col3">
                                <label for="crusttype">Start Date</label>
                                <input type="date" id="birthday" name="birthday">
                            </div>
                            <div class="col3">
                                <label for="crusttype">End Date</label>
                                <input type="date" id="birthday" name="birthday">
                            </div>
                        </div>

                        <div class="row" style="justify-content: center;">

                            <input type="submit" value="Generate" class="btn-alerts" />
                            <input type="reset" value="Cancel" class="btn-alerts" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script src="/<?php echo baseUrl; ?>/public/assets/js/responsiblePersonAidReport.js"></script>
    <script>
        var thisPage = "#compensation";
        $(document).ready(function() {
            $("#incident,#safehouse,#user").each(function() {
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