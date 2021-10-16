<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Safe House </title>
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
        include_once('./public/Views/DisasterOfficer/includes/sidebar_safeHouse.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">

        <!-- TABLE -->
        <div class="container">
            <div class="box">
                <h1 style="text-align:center;">Add Safe House</h1>
                <!-- FORM -->
        <div class="container">
            <form action="#" method="post">

                <div class="column">

                    <label for="number">Safe house number</label>
                    <input type="number" id="number" name="number">
                    
                    <label for="address">Safe house address</label>
                    <textarea id="address" name="address"></textarea>

                    <label for="Name">Name</label>
                    <input type="text" name="address">

                    <label for="tp">TP Number</label>
                    <input type="text" name="tp">

                    <label  style="text-align:center;">
                            <input type="checkbox" name="sendalerts" value="safehouses" />
                            Is Available
                        </label>

                    <!-- <label for="location">GN Division</label>
                    <select id="gndivision" name="gndivision">
                        <option value="Keselwatta">Keselwatta</option>
                        <option value="Maradana">Maradana</option>
                        <option value="Kochchikade">Kochchikade</option>
                        <option value="Welikala">Welikala</option>
                    </select>
 -->

                    <!-- <fieldset>
                        <legend>Send alerts -</legend>
                        <label>
                            <input type="checkbox" name="officers" value="officers" />
                            Only Officers
                        </label>
                        <label  style="text-align:center;">
                            <input type="checkbox" name="sendalerts" value="safehouses" />
                            Assigned Safe Houses
                        </label>
                    </fieldset>
                    -->
                    <input type="submit" value="Submit" />
                    <input type="reset" value="Cancel" />
                </div>
            </form>
        </div>
            </div>
        </div>

    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
    </script>
</body>
</html>