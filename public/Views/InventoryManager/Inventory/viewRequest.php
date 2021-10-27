<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Inventory </title>
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
    .create{
        background-color: rgb(148, 215, 190);
        height: 50px;
        width: 100%;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        text-decoration: none;
        color: black;
        font-weight: bold;
    }
    .create:hover{
        background-color: rgb(163, 230, 205);   
    }
    .view{
        background-color:rgb(241,67,67);
        height: 50px;
        width: 100%;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        color: black;
        font-weight: bold;
    }
    .view:hover{
        background-color: rgb(246, 139, 139);
    }
    td{
            border: none;
            text-align: left;
            vertical-align: middle;
    }
    </style>
</head>
<body>
    <?php
        include_once('./public/Views/InventoryManager/includes/sidebar_inventory.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/InventoryManager/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center><h1>Service Request Form - Kamburupitiya</h1></center>
                <form>
                <fieldset>
                        <div style="padding-left:15% ;">
                                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                            <table style="border: none !important;width:70%;">
                                                <tr>
                                                    <td>Requesting for</td>
                                                    <td><input type="text" id="your_name" name="yourname" disabled='true'/></td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: #fff;">Required Date</td>
                                                    <td style="background-color: #fff;"><input type="date" id="your_name" name="yourname"  style="width: 100%;" disabled='true'></td>
                                                </tr>
                                                <tr>
                                                    <td>Note</td>
                                                    <td><textarea id="notes" name="drivernotes" rows="8" cols="50" disabled='true'></textarea></td>
                                                </tr>
                                            </table>
                                            <div style="float: right;width:30%">
                                                <table style="border: none !important;width:100%;">
                                                    <tr>
                                                        <td><input type="button" class="view" value="Decline"></td>
                                                        <td><input type="button" class="create" value="Accept"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#Service";
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
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