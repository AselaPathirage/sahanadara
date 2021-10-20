<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

    </style>
</head>
<body>
    <?php
        include_once('./public/Views/ResponsiblePerson/includes/sidebar_safeHouse.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/ResponsiblePerson/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center><h1>Safe House - Ullala 321/A</h1></center>
                <form>
                    <fieldset>
                    <h3>Displaced person's details</h3>
                                    <div class="column" style="width:70%;float: none;padding-left:15%;padding-top:2px;">
                                            <label for="your_name">Number of adult males</label>
                                            <input type="text" id="your_name" name="yourname" />

                                            <label for="your_email">Number of adult females</label>
                                            <input type="email" id="your_email" name="youremail" />

                                            <label for="your_phone">Number of children</label>
                                            <input type="tel" id="your_phone" name="yourphone" />

                                            <label for="address">Number of disabled persons</label>
                                            <input type="tel" id="your_phone" name="yourphone" />
                                    </div>
                                    <h3>Other details</h3>
                                    <div class="column" style="width:70%;float: none;padding-left:15%;padding-top:2px;">
                                            <label for="notes">Remarks</label>
                                            <textarea id="notes" name="drivernotes" rows="8" cols="50"></textarea>
                                    </div>
                                    <div style="float: right;">
                                    
                                    </div>
                    </fieldset>
                    <fieldset style="display: none;position: relative">
                    <p>hfjkhfjkzhjk</p>

                    </fieldset>
                    <fieldset style="display: none;position: relative">
                    <p>submitted.</p>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#updates";
        $(document).ready(function() {
            $("#stats,#updates").each(function() {
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