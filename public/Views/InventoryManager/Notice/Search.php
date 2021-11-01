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
        .radio-custom {
        opacity: 0;
        position: absolute;   
    }
    .radio-custom, .radio-custom-label {
        display: inline-block;
        vertical-align: middle;
        margin: 5px;
        cursor: pointer;
    }
    .radio-custom-label {
        position: relative;
    }
    .radio-custom + .radio-custom-label:before {
        content: '';
        background: #fff;
        border: 2px solid rgb(0, 0, 0);
        display: inline-block;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        padding: 2px;
        margin-right: 10px;
        text-align: center;
    }
    .radio-custom + .radio-custom-label:before {
        border-radius: 10%;
    }

    .radio-custom:checked + .radio-custom-label:before {
        content: "\E9A4";
        font-family: 'boxicons';
        color: #000;
    }
    .radio-custom:focus + .radio-custom-label {
    outline: 1px solid #ddd; /* focus style */
    }
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
        background-color: rgb(66, 245, 96);
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
        /* background-color: rgb(66, 245, 96); */
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
            <form>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th style="width: 55%;text-align:center">Approval Status
                                <select id="assigned-user-filter" class="form-control">
                                    <option>All</option>
                                    <option>Approved</option>
                                    <option>Pending</option>
                                </select>
                            </th>

                            <th style="width: 15%;text-align: center;">
                                <a href="/<?php echo baseUrl; ?>/InventoryManager/Notice/viewNotice" class="create">View</a>
                            </th> 
                            <th style="width: 15%;text-align:center;">
                                <a href="/<?php echo baseUrl; ?>/InventoryManager/Notice/editNotice" class="view">Edit</a>
                            </th>
                            <th style="width: 15%;text-align:center;">
                                <a href="#" style="background-color: rgb(245, 66, 66);" class="view">Remove</a>
                            </th>
                        </tr>
                    </thead>
                </table>

                <div class="panel panel-primary filterable">
                    <table id="task-list-tbl" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Topic</th>
                                <th>Created Date</th>
                                <th>Approval State</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td> 
                                        <input id="radio-1" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-1" class="radio-custom-label"></label>
                                    </td>
                                    <td>Bellapitiya Maha Vidyalaya</td>
                                    <td>10/21/2021</td>
                                    <td>Pending</td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-2" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-2" class="radio-custom-label"></label>
                                    </td>
                                    <td>Donation Request Notice for Bolossagama </td>
                                    <td>02/24/2021</td>
                                    <td>Approved</td>
                                </tr>
                                <tr id="task-3" class="task-list-row" data-task-id="3" data-user="Donald" data-status="Not Started" data-milestone="Milestone 1" data-priority="Low" data-tags="Tag 3">
                                    <td> 
                                        <input id="radio-3" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-3" class="radio-custom-label"></label>
                                    </td>
                                    <td>We need your donations</td>
                                    <td>01/16/2021</td>
                                    <td>Approved</td>
                                </tr>
                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald" data-status="Completed" data-milestone="Milestone 1" data-priority="High" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-4" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-4" class="radio-custom-label"></label>
                                    </td>
                                    <td>Donation Request Notice for Dodangoda  </td>
                                    <td>01/16/2021</td>
                                    <td>Approved</td>
                                </tr>
                                <tr id="task-3" class="task-list-row" data-task-id="3" data-user="Donald" data-status="Not Started" data-milestone="Milestone 1" data-priority="Low" data-tags="Tag 3">
                                    <td> 
                                        <input id="radio-3" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-3" class="radio-custom-label"></label>
                                    </td>
                                    <td>We need your donations</td>
                                    <td>11/10/2020</td>
                                    <td>Approved</td>
                                </tr>
                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald" data-status="Completed" data-milestone="Milestone 1" data-priority="High" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-4" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-4" class="radio-custom-label"></label>
                                    </td>
                                    <td>Donation Request Notice for Dodangoda  </td>
                                    <td>08/25/2020</td>
                                    <td>Approved</td>
                                </tr>
                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald" data-status="Completed" data-milestone="Milestone 1" data-priority="High" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-4" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-4" class="radio-custom-label"></label>
                                    </td>
                                    <td>Donation Request Notice for Sapugahawatta  </td>
                                    <td>05/16/2020</td>
                                    <td>Approved</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                </form>
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