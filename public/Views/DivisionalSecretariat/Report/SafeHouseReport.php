<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Safe House - Report </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_reports.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
        <div class="container">
        <div class="box">
                <center>
                    <h1>Safehouse Report</h1>
                </center>
                <form>
                    <div class="row-content">

                        <h2>Select the area</h2>
                        <div class="row">
                            <div class="col4"><label for="crusttype">District</label>
                                <select id="crusttype" name="crust">
                                    <option value="white">All</option>
                                    <option value="wheat">Kaluatara</option>
                                    <option value="thin">Gampaha</option>
                                </select>
                            </div>
                            <div class="col4"><label for="crusttype">DS Division</label>
                                <select id="crusttype" name="crust">
                                    <option value="wheat">All</option>
                                    <option value="wheat">Horana</option>
                                    <option value="white">Millaniya</option>

                                </select>
                            </div>
                            <div class="col4"><label for="crusttype">GN Division</label>
                                <select id="crusttype" name="crust">
                                    <option value="wheat">All</option>
                                    <option value="wheat">Bellapitiya West</option>
                                    <option value="white">Bellapitiya North</option>
                                    <option value="thin">Horana North</option>
                                </select>
                            </div>

                            <div class="col4"><label for="crusttype">Safe House</label>
                                <select id="crusttype" name="crust">
                                    <option value="wheat">All</option>
                                    <option value="wheat">1</option>
                                    <option value="white">2</option>
                                    <option value="thin">3</option>
                                </select>
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
    <script>
        var thisPage = "#safe";
        $(document).ready(function() {
            $("#incident,#safe,#compensation,#inventory").each(function() {
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