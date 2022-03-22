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
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .create {
            background-color: rgb(2, 58, 255);
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

        .create:hover {
            background-color: rgb(153, 176, 255);
        }

        .view {
            background-color: rgb(109, 91, 208);
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

        .view:hover {
            background-color: rgb(138, 123, 217);
        }

        tr:hover {
            background: #c9e8f7;
            position: relative;
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
                <form>
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th style="width: 25%;">DV Office
                                    <select id="division" class="form-control">
                                        <option value="">Any</option>
                                    </select>
                                </th>
                                <th>
                                    Starting:
                                    <input type="date" class="form-control" id="start" name="start" max="<?php echo date("Y-m-d"); ?>">
                                </th>
                                <th>
                                    Ending:
                                    <input type="date" class="form-control" id="end" name="end" max="<?php echo date("Y-m-d"); ?>">
                                </th>
                                <th style="width: 25%;text-align: center;">
                                    <a href="<?php echo HOST; ?>InventoryManager/Inventory/serviceRequestForm" class="create">Create Request</a>
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <div class="panel panel-primary filterable">
                        <table id="task-list-tbl" class="table">
                            <thead>
                                <tr>
                                    <th style="width:10%;">Request Id</th>
                                    <th style="width:50%;">DS Office</th>
                                    <th style="width:30%;">Requesting Date</th>
                                    <th style="width:10%;"></th>
                                </tr>
                            </thead>
                            <tbody id="trow">
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#Service";
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
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
        var output, requests;
        serviceRequests();
        getDivision();

        function getDivision() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>division",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            //console.log(output);
            var select = document.getElementById("division");
            for (var i = 0; i < output.length; i++) {
                var opt = document.createElement('option');
                opt.value = output[i]['id'];
                opt.innerHTML = output[i]['division'];
                select.appendChild(opt);
            }
        }

        function serviceRequests() {
            requests = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>serviceRequest",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("trow");
            for (var i = 0; i < requests.length; i++) {
                let obj = requests[i];
                let row = table.insertRow(-1);
                let id = "data_" + i;
                row.id = id;
                row.className = "task-list-row";
                //let cell1 = row.insertCell(-1);
                let cell11 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                var attribute2 = document.createElement("a");
                attribute2.id = obj['id'];
                attribute2.href = "viewRequest/" + obj['id'];
                attribute2.target = "_blank"
                attribute2.className = "btn_views";
                attribute2.name = "delete";
                attribute2.innerHTML = "View";
                cell11.innerHTML = obj['id'];
                cell2.innerHTML = obj['name'];
                cell3.innerHTML = obj['requestedDate'];
                cell4.appendChild(attribute2);
            }
        }
    </script>
</body>
</html>