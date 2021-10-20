<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer- Notice </title>
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
        include_once('./public/Views/DisasterOfficer/includes/sidebar_notice.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
        <div class="box">
                <center><h1>Donation Request</h1></center>
                <form>
                <fieldset>
                        <div style="padding-left:15% ;">
                                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                            <table style="border: none !important;width:70%;">
                                                <tr>
                                                    <td>Title</td>
                                                    <td><input type="text" id="your_name" name="yourname"/></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of Families</td>
                                                    <td><input type="text" id="your_name" name="yourname"  style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of People</td>
                                                    <td><input type="text" id="your_name" name="yourname"  style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Location</td>
                                                    <td>
                                                    <select id="assigned-user-filter" class="form-control">
                                                        <option>321/A</option>
                                                        <option>321/B</option>
                                                        <option>321/C</option>
                                                        <option>322</option>
                                                    </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td><textarea id="notes" name="drivernotes" rows="8" cols="50"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Required Items</td>
                                                    <td>
                                                        <span id="combo3-remove" style="display: none">remove</span> <!-- used as descriptive text for option buttons; if used within the button text itself, it ends up being read with the input name -->
                                                        <div class="combo js-inline-buttons">
                                                            <div role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-owns="listbox3" class="input-wrapper multiselect-inline">
                                                            <ul class="selected-options" aria-live="assertive" aria-atomic="false" aria-relevant="additions removals" id="combo3-selected"></ul>
                                                            <input
                                                                aria-activedescendant=""
                                                                aria-autocomplete="list"
                                                                aria-labelledby="combo3-label combo3-selected"
                                                                id="combo3"
                                                                class="combo-input"
                                                                type="text">
                                                            </div>
                                                            <div class="combo-menu" role="listbox" aria-multiselectable="true" id="listbox3"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="float: right;width:30%">
                                                <table style="border: none !important;width:100%;">
                                                    <tr>
                                                        <td><input type="reset" class="view" value="Cancel"></td>
                                                        <td><input type="submit" class="create" value="Create"></td>
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
        var thisPage = "#add";
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