<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Inventory </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_disofficer.css">
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
        background-color: blue;
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
        background-color: darkblue;
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
    tr:hover{
  background:#c9e8f7;
  position:relative;
}
    </style>
</head>
<body>
    <?php
        include_once('./public/Views/DisasterOfficer/includes/sidebar_dashboard.php');
        ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
            <form>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th style="width: 25%;">DV Office
                                <select id="division" class="form-control">
                                    <option value="">Any</option>
                                </select>
                            </th>
                            <th style="width: 25%;">Responded
                                <select id="milestone-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Responded</option>
                                    <option>Not Responded</option>
                                </select> 
                            </th>
                            <th style="width: 25%;text-align: center;">
                                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/DonationRequests" class="create">Create Request</a>
                            </th> 
                            <th style="width: 25%;text-align:center;">
                                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/viewDonationRequests" class="view">View</a>
                            </th>
                        </tr>
                    </thead>
                </table>

                <div class="panel panel-primary filterable">
                    <table id="task-list-tbl" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>DS Office</th>
                                <th>Requested for</th>
                                <th>Responded</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td> 
                                        <input id="radio-1" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-1" class="radio-custom-label"></label>
                                    </td>
                                    <td>Divisional Office Agalawatta</td>
                                    <td>Water Bowser</td>
                                    <td>09/24/2021</td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-2" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-2" class="radio-custom-label"></label>
                                    </td>
                                    <td>Divisional Office Beruwala</td>
                                    <td>Generator</td>
                                    <td>12/28/2020</td>
                                </tr>
                                <tr id="task-3" class="task-list-row" data-task-id="3" data-user="Donald" data-status="Not Started" data-milestone="Milestone 1" data-priority="Low" data-tags="Tag 3">
                                    <td> 
                                        <input id="radio-3" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-3" class="radio-custom-label"></label>
                                    </td>
                                    <td>Divisional Office Ingiriya</td>
                                    <td>Water Bowser</td>
                                    <td>02/29/2021</td>
                                </tr>
                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald" data-status="Completed" data-milestone="Milestone 1" data-priority="High" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-4" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-4" class="radio-custom-label"></label>
                                    </td>
                                    <td>Divisional Office Madurawala</td>
                                    <td>Tents</td>
                                    <td>02/20/2021</td>
                                </tr>
                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald" data-status="Completed" data-milestone="Milestone 1" data-priority="High" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-4" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-4" class="radio-custom-label"></label>
                                    </td>
                                    <td>Divisional Office Madurawala</td>
                                    <td>Generator</td>
                                    <td>02/22/2021</td>
                                </tr>
                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald" data-status="Completed" data-milestone="Milestone 1" data-priority="High" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-4" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-4" class="radio-custom-label"></label>
                                    </td>
                                    <td>Divisional Office Walallavita</td>
                                    <td>Boats</td>
                                    <td>03/01/2021</td>
                                </tr>
                                <tr id="task-4" class="task-list-row" data-task-id="4" data-user="Donald" data-status="Completed" data-milestone="Milestone 1" data-priority="High" data-tags="Tag 1">
                                    <td> 
                                        <input id="radio-4" class="radio-custom" name="radio-group" type="radio" checked>
                                        <label for="radio-4" class="radio-custom-label"></label>
                                    </td>
                                    <td>Divisional Office Madurawala</td>
                                    <td>Boats</td>
                                    <td>03/03/2021</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#Donation";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
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

        function getDivision(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>division",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            //console.log(output);
            var select = document.getElementById("division");
            for (var i = 0; i < output.length; i++){
                var opt = document.createElement('option');
                opt.value = output[i]['id'];
                opt.innerHTML = output[i]['division'];
                select.appendChild(opt);
            }
        }
    </script>
</body>
</html>