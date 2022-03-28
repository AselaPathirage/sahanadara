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
        /* .create {
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
        } */

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

        .btn-fun {
            padding: 5px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 20px;
            color: #fff;
            background-color: lightslategrey;
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
                                    <input type="date" class="form-control searchInput" id="start" name="start" max="<?php echo date("Y-m-d"); ?>">
                                </th>
                                <th>
                                    Ending:
                                    <input type="date" class="form-control searchInput" id="end" name="end" max="<?php echo date("Y-m-d"); ?>">
                                </th>
                                <th style="width: 25%;text-align: center;">
                                    <a href="<?php echo HOST; ?>InventoryManager/Inventory/serviceRequestForm" class="create btn_blue">Create Request</a>
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <div class="panel panel-primary filterable">
                        <table id="task-list-tbl" class="table">
                            <thead>
                                <tr>
                                    <th style="width:10%;">Request Id</th>
                                    <th style="width:40%;">Requesting From</th>
                                    <th style="width:15%;">Created Date</th>
                                    <th style="width:15%;">Requesting Date</th>
                                    <th style="width:10%;"></th>
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
            $(".searchInput").on("change", function() {
                var from = $("#start").val();
                var to = $("#end").val();
                $("#trow tr").each(function() {
                    var row = $(this);
                    var date = row.find("td").eq(2).text();
                    console.log(date);
                    var show = true;
                    if (from && date < from)
                        show = false;
                    if (to && date > to)
                        show = false;
                    if (show)
                        row.show();
                    else
                        row.hide();
                });
            });
            $('#division').on('change', function() {
                let value = $('#division').val();
                $('#trow').empty();
                var table = document.getElementById("trow");
                for (var i = 0; i < requests.length; i++) {
                    if (requests[i]['requestingDivisionId'] == value || !value) {
                        let obj = requests[i];
                        let row = table.insertRow(-1);
                        let id = "data_" + i;
                        row.id = id;
                        row.className = "task-list-row";
                        //let cell1 = row.insertCell(-1);
                        let cell11 = row.insertCell(-1);
                        let cell2 = row.insertCell(-1);
                        let cell22 = row.insertCell(-1);
                        let cell3 = row.insertCell(-1);
                        let cell4 = row.insertCell(-1);
                        let cell5 = row.insertCell(-1);
                        var attribute2 = document.createElement("a");
                        attribute2.id = obj['id'];
                        attribute2.href = "viewSentRequest/" + obj['id'];
                        attribute2.target = "_blank"
                        attribute2.className = "btn_views";
                        attribute2.name = "View";
                        attribute2.innerHTML = "View";
                        var attribute = document.createElement("a");
                        attribute.id = obj['id'];
                        //attribute.href = "viewRequest/" + obj['id'];
                        attribute.target = "_blank"
                        attribute.className = "btn_delete";
                        attribute.name = "delete";
                        attribute.value = obj['id'];
                        attribute.innerHTML = "delete";
                        attribute.setAttribute("style", "cursor:pointer;");
                        cell11.innerHTML = obj['id'];
                        cell2.innerHTML = obj['requestingFrom'];
                        cell22.innerHTML = obj['createdDate'];
                        cell3.innerHTML = obj['requestedDate'];
                        cell4.appendChild(attribute2);
                        cell5.appendChild(attribute);
                    }
                }
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
            var opt = document.createElement('option');
            opt.value = 0;
            opt.innerHTML = "All";
            select.appendChild(opt);
            for (var i = 0; i < output.length; i++) {
                opt = document.createElement('option');
                opt.value = output[i]['id'];
                opt.innerHTML = output[i]['division'];
                select.appendChild(opt);
            }
        }

        function serviceRequests() {
            requests = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>serviceRequest/self",
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
                let cell22 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                var attribute2 = document.createElement("a");
                attribute2.id = obj['id'];
                attribute2.href = "viewSentRequest/" + obj['id'];
                attribute2.target = "_blank"
                attribute2.className = "btn_views";
                attribute2.name = "View";
                attribute2.innerHTML = "View";
                var attribute = document.createElement("a");
                attribute.id = obj['id'];
                //attribute.href = "viewRequest/" + obj['id'];
                attribute.target = "_blank"
                attribute.className = "btn_delete";
                attribute.name = "delete";
                attribute.value = obj['id'];
                attribute.innerHTML = "delete";
                attribute.setAttribute("style", "cursor:pointer;");
                cell11.innerHTML = obj['id'];
                cell2.innerHTML = obj['requestingFrom'];
                cell22.innerHTML = obj['createdDate'];
                cell3.innerHTML = obj['requestedDate'];
                cell4.appendChild(attribute2);
                cell5.appendChild(attribute);
            }
        }
    </script>
</body>

</html>