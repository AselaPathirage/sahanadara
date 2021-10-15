<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> DMC </title>
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
    include_once('./public/Views/DMC/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DMC/includes/topnav.php');
        ?>
        <div class="space" style="margin-bottom: 30px;"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col6 box" style="margin:0 auto;">
                    <form action="#" method="post">
                        <h1>New Alert</h1>

                        <div class="row-content">

                            <label for="address">Message</label>
                            <textarea id="address" name="youraddress"></textarea>

                            <label for="crusttype">District</label>
                            <select id="crusttype" name="crust">
                                <option value="white">All</option>
                                <option value="wheat">Kaluatara</option>
                                <option value="thin">Gampaha</option>
                            </select>
                            <label for="crusttype">DS Division</label>
                            <select id="crusttype" name="crust">
                                <option value="wheat">All</option>
                                <option value="wheat">Horana</option>
                                <option value="white">Millaniya</option>

                            </select>
                            <label for="crusttype">GN Division</label>
                            <select id="crusttype" name="crust">
                                <option value="wheat">All</option>
                                <option value="wheat">Bellapitiya West</option>
                                <option value="white">Bellapitiya North</option>
                                <option value="thin">Horana North</option>
                            </select>
                            <fieldset>
                                <div class="row">
                                    <div class="col6">
                                        <label>
                                            <input type="checkbox" name="toppings" value="pepperoni" />
                                            Assign Safe Houses
                                        </label>
                                    </div>
                                    <div class="col6">
                                        <label>
                                            <input type="checkbox" name="toppings" value="veggies" style="text-align: center" />
                                            Only Officers
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row" style="justify-content: center;">

                                <input type="submit" value="Send" class="btn-alerts" />
                                <input type="reset" value="Cancel" class="btn-alerts" />
                            </div>
                        </div>
                    </form>
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