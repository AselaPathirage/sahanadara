<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Notice </title>
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
        background-color: rgb(2,58,255);
        height: 50px;
        display: block;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        text-decoration: none;
        color: wheat;
        box-shadow: 2px 1px #000;
    }
    .create:hover{
        background-color: rgb(153,176,255);   
    }
    .view{
        background-color: rgb(109,91,208);
        height: 50px;
        display: block;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        text-decoration: none;
        color: wheat;
        box-shadow: 2px 1px #000;
    }
    .view:hover{
        background-color: rgb(138,123,217);
    }
    td{
        border: none;
    }
    </style>
</head>
<body>
    <?php
        include_once('./public/Views/InventoryManager/includes/sidebar_notice.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/InventoryManager/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
            <center><h1>Service Request Form - Kamburupitiya</h1></center>
            <fieldset>
                        <div style="padding-left:15% ;">
                                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                            <table style="border: none !important;width:70%;">
                                                <tr>
                                                    <td>Title</td>
                                                    <td><input type="text" id="your_name" name="yourname"  value="Emergency situation in Ullala"/></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of Families</td>
                                                    <td><input type="text" id="your_name" name="yourname"  style="width: 100%;"  value="10"></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of People</td>
                                                    <td><input type="text" id="your_name" name="yourname"  style="width: 100%;"  value="55"></td>
                                                </tr>
                                                <tr>
                                                    <td>Location</td>
                                                    <td>
                                                    <input type="text" id="your_name" name="yourname"  style="width: 100%;"  value="321/A">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td><textarea id="notes" name="drivernotes" rows="8" cols="50">We are waiting for your kind responses.</textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Required Items</td>
                                                    <td>
                                                        <ul>
                                                            <li>Water bowser</li>
                                                            <li>Generator</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="float: right;width:30%">
                                                <table style="border: none !important;width:100%;">
                                                    <tr>
                                                        <td><input type="reset" class="view" value="Remove"></td>
                                                        <td><input type="submit" class="create" value="Edit"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                        </div>
                    </fieldset>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#search";
        $(document).ready(function() {
            $("#search,#add").each(function() {
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