<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_divsec.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
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
        <div class="box">
                <!-- FORM -->
        <div class="container">
            <form action="#" method="post">
                <h1>Inventory Manager</h1>

                <div class="column">
                    <label for="your_name">First Name</label>
                    <input type="text" id="your_name" name="yourname" />

                    <label for="your_email">Last Name</label>
                    <input type="email" id="your_email" name="youremail" />

                    <label for="nic">NIC</label>
                    <input type="nic" id="nic" name="nic" />

                    <label for="email">email</label>
                    <textarea id="email" name="email"></textarea>

                    <label for="address">Address</label>
                    <textarea id="address" name="youraddress"></textarea>

                    <label for="your_phone">TP Number</label>
                    <input type="tel" id="your_phone" name="yourphone" />

                    </div>
                    <div>
                    <td><a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/Assignnewinventorymanager" class="btn-box">Assign New Manager</a></td>

                    <input type="reset" value="Cancel" />
                </div>

            </form>
        </div>

    </section>
    <script>
        var thisPage = "#InventoryManager";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
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