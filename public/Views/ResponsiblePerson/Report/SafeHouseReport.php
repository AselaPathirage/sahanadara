<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Responsible Person - Report </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .generate{
            width: 100px;
            height: 100px;
            color: wheat;
            background-color: rgb(109,91,208);
            border-radius: 5px;
        }
        .generate:hover{
            background-color:rgb(69,50,173);
        }
        .generate:active {
            border-style: outset;
        }
        td{
            border: none;
            text-align: center;
            vertical-align: middle;
        }
        .reset{
            width: 100px;
            color: wheat;
            background-color: rgb(255, 87, 51);
            text-decoration: none !important;
        }
        .reset:hover{
            background-color:rgb(161, 40, 14);
        }
    </style>
    </head>
<body>
    <?php
        include_once('./public/Views/ResponsiblePerson/includes/sidebar_reports.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/ResponsiblePerson/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
        <div class="box">
                <center><h1>Safe House Report</h1></center>
                <h3>Time Period</h3>
                <form>
                    <div style="display:flex;">
                            <div style="width: 70%;padding-left:10%">
                                <table style="border: none !important;width:100%;">
                                    <tr>
                                        <td>
                                        <label for="your_name">Starting Date</label>
                                        </td>
                                        <td>
                                        <input type="date" id="birthday" name="birthday">
                                        </td>
                                        <td>
                                        <label for="your_name">End Date</label>
                                        </td>
                                        <td>
                                        <input type="date" id="birthday" name="birthday">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="float: right;padding-left:5%">
                                <table style="border: none !important;width:100%;">
                                        <tr>
                                            <td>
                                            <input type="button" class="generate" value="Generate">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <input type="reset" class="reset" value="Cancel">
                                            </td>
                                        </tr>
                                    </table> 
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#safe";
        $(document).ready(function() {
            $("#inventory,#safe").each(function() {
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