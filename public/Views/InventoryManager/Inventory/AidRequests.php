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
        tr:hover {
            background: #c9e8f7;
            position: relative;
        }

        .radio-custom {
            opacity: 0;
            position: absolute;
        }

        .radio-custom,
        .radio-custom-label {
            display: inline-block;
            vertical-align: middle;
            margin: 5px;
            cursor: pointer;
        }

        .radio-custom-label {
            position: relative;
        }

        .radio-custom+.radio-custom-label:before {
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

        .radio-custom+.radio-custom-label:before {
            border-radius: 10%;
        }

        .radio-custom:checked+.radio-custom-label:before {
            content: "\E9A4";
            font-family: 'boxicons';
            color: #000;
        }

        .radio-custom:focus+.radio-custom-label {
            outline: 1px solid #ddd;
            /* focus style */
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

                <table class="table">
                    <thead>
                        <form>
                            <tr class="filters">
                                <th>Safe House
                                    <select id="safeHouseId" class="form-control">
                                        <option value="0">Select Safe House</option>
                                    </select>
                                </th>
                                <th>Priority
                                    <select id="milestone-filter" class="form-control">
                                        <option>All</option>
                                        <option>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
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
                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                                <th>
                                    <input type="reset" id="reset" class="form-control btn_alerts" value="Reset">
                                </th>
                            </tr>
                        </form>
                    </thead>
                </table>

                <div class="panel panel-primary filterable">
                    <table id="task-list-tbl" class="table">
                        <thead>
                            <tr>
                                <!-- <th style="width: 5%;"></th> -->
                                <th style="width: 15%;">Safe House Id</th>
                                <th style="width: 40%;">Name</th>
                                <th style="width: 15%;">Priority</th>
                                <th style="width: 15%;">Date Received</th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody id="trow">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
    <script>
        var thisPage = "#Aid";
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#start").on("change", function() {
                var from = $("#start").val();
                var input = document.getElementById("end");
                input.setAttribute("min",from);
            });
            $(".searchInput").on("change", function() {
                var from = $("#start").val();
                var to = $("#end").val();
                $("#trow tr").each(function() {
                    var row = $(this);
                    var date = row.find("td").eq(3).text();
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
        });
        document.getElementById('end').value = new Date().toISOString().slice(0, 10);
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        var output;
        aidRequests();
        safeHouseList();

        function aidRequests() {
            var x = "<?php echo $_SESSION['key'] ?>";
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>aids/safehouse",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("trow");
            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                let row = table.insertRow(-1);
                let id = "data_" + i;
                row.id = id;
                row.className = "task-list-row";
                //let cell1 = row.insertCell(-1);
                let cell11 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                var attribute2 = document.createElement("a");
                attribute2.id = obj['safehouseId'];
                attribute2.href = "viewAidRequest/" + obj['safehouseId'];
                attribute2.target = "_blank"
                attribute2.className = "btn_views";
                attribute2.name = "delete";
                attribute2.innerHTML = "View";
                //cell1.innerHTML = "<input id='" + obj['safehouseId'] + "' value='" + obj['safehouseId'] + "' data-itemId='" + obj['safehouseId'] + "' class='radio-custom' name='radio-group' type='radio'><label for='" + obj['safehouseId'] + "' class='radio-custom-label'></label>";
                cell11.innerHTML = obj['safehouseId'];
                cell2.innerHTML = obj['safeHouseName'];
                cell3.innerHTML = obj['priority'];
                cell4.innerHTML = obj['createdDate'];
                cell5.appendChild(attribute2);
            }
        }

        function safeHouseList() {
            var data =
                $.parseJSON($.ajax({
                    type: "GET",
                    url: "<?php echo API; ?>safehouse/name",
                    dataType: "json",
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    async: false
                }).responseText);
            for (var i = 0; i < data.length; i++) {
                var option = document.createElement("option");
                option.text = data[i].safeHouseName;
                option.value = data[i].safeHouseID;
                var select = document.getElementById("safeHouseId");
                select.appendChild(option);
            }
        }
        (function() {
            var showResults;
            $('#search').keyup(function() {
                var searchText;
                searchText = $('#search').val();
                return showResults(searchText);
            });
            showResults = function(searchText) {
                $('tbody tr').hide();
                return $('tbody tr:Contains(' + searchText + ')').show();
            };
            jQuery.expr[':'].Contains = jQuery.expr.createPseudo(function(arg) {
                return function(elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
        }.call(this));
    </script>
</body>

</html>