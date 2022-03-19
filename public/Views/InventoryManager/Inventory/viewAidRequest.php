<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
?>

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

        tr:nth-of-type(odd),
        tr:nth-of-type(even) {
            background: #fff;
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
            /* focus sty
            le */
        }

        .container .alert-div.alert-success {
            background-color: #bdf2eb;
            border-color: #3a998c;
            /* color: #a07415; */
        }
        .btn_click{
            color: rgb(255, 255, 255);
            background-color:rgb(16, 163, 65); ;
            border: 2px solid ;
            border-color: rgb(16, 163, 65);
            font-weight: bold;
            font-size:16px;
            text-decoration: none;
            border-radius: 4px;
            height: 50px;
        }
        .btn_blue1{
            color: #fff;
            background-color: rgb(57, 69, 245);
            font-weight: bold;
            font-size:16px;
            text-decoration: none;
            border-radius: 4px;
            height: 50px;
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
                <center>
                    <h1 id="safeHouse" style="text-transform: capitalize;"></h1>
                </center>
                <div id="request" style="width: 70%;" class="container text-center">
                    <table id="ajaxFilter" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">Select
                                </th>
                                <th style="width: 10%;">Item Id
                                </th>
                                <th style="width: 30%;">Item
                                </th>
                                <th style="width: 10%;">Requested Amount
                                </th>
                                <th style="width: 10%;">Available Amount
                                </th>
                                <!-- <th style="width: 10%;">Availability
                                    </th> -->
                            </tr>
                        </thead>
                        <tbody id="trow">
                        </tbody>
                    </table>
                </div>
                <div>
                    <div style="float:right;width:50%">
                        <table style="border: none !important;width:100%;height:20%">
                            <tr>
                                <td style="border: none !important;width:50%;"><input type="button" class="form-control btn_click" value="Create Donation Request" id='notice'></td>
                                <td style="border: none !important;width:50%"><input type="button" class="form-control btn_blue1" value="Release Items" id='inventory'></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4 id='stat'></h4>
            </div>
        </div>
        <div class="custom-model-main" id="confirmProcess">
            <div class="custom-model-inner">
                <div class="close-btn">×</div>
                <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">
                        <div class="row-content">
                            <h2>Proceed with default selection?</h2>
                            <input type="hidden" id="item2" value="">
                            <div class="row" style="justify-content: center;">
                                <input type="hidden" id="find" value="">
                                <button type="button" class="btn-alerts btn_cancel cancel">No</button>
                                <button type="button" class="btn-alerts btn_danger" id="process-confirm">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-overlay"></div>
        </div>
        <div class="custom-model-main" id="process">
            <div class="custom-model-inner">
                <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">
                        <div class="row-content">
                            <center><h2 id="header"></h2></center>
                            <div id="display"></div>
                            <div class="row" style="justify-content: center;">
                                <input type="hidden" id="find" value="">
                                <button type="button" class="btn-alerts btn_cancel cancel">No</button>
                                <button type="button" class="btn-alerts btn_danger" id="process-confirm">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-overlay"></div>
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
            $("#notice").on('click', function() {
                if($(":checkbox:checked").length == 0){
                    $("#confirmProcess").fadeIn();
                    $("#find").val("notice");
                    $("#confirmProcess").addClass('model-open');
                }else{
                    $("#process").fadeIn();
                    $("#process").addClass('model-open');
                }
            });
            $("#inventory").on('click', function() {
                if($(":checkbox:checked").length == 0){
                    $("#confirmProcess").fadeIn();
                    $("#find").val("inventory");
                    $("#header").text("Release From Inventory");
                    $("#confirmProcess").addClass('model-open');
                }else{
                    $("#header").text("Create Donation Request Notice");
                    $("#process").fadeIn();
                    $("#process").addClass('model-open');
                }
            });
            $(".close-btn, .bg-overlay, .cancel").click(function() {
                $(".custom-model-main").removeClass('model-open');
            });
            $("#process-confirm").click(function(e) {
                if($("#find").val() == "notice"){
                    $("#confirmProcess").removeClass('model-open');
                    $("#header").text("Create Donation Request Notice");
                    $("#process").fadeIn();
                    $("#process").addClass('model-open');
                }else if($("#find").val() == "inventory"){
                    $("#confirmProcess").removeClass('model-open');
                    $("#header").text("Release From Inventory");
                    $("#process").fadeIn();
                    $("#process").addClass('model-open');
                }
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        var output;
        basicData();
        aidRequests();

        function basicData() {
            var data = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            if(data.length > 0){
                document.getElementById('safeHouse').innerHTML = data[0].safeHouseName;
            }
        }
        
        function processNotice(){

        }

        function processInventory(){

        }

        function aidRequests() {
            var x = "<?php echo $_SESSION['key'] ?>";
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>aids/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("trow");
            var available = 0;
            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                let row = table.insertRow(-1);
                let cell0 = row.insertCell(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                cell0.innerHTML = "<input type='checkbox' class='form-control check'>";
                cell1.innerHTML = obj['itemId'];
                cell2.innerHTML = obj['itemName'];
                cell3.innerHTML = obj['quantity'] + " " + obj['unit'];
                cell4.innerHTML = obj['inInventory'] + " " + obj['unit'];
                if (obj['availability'] == 'Yes') {
                    available++;
                } else {
                    cell0.bgColor = "#eb6e6e";
                    cell1.bgColor = "#eb6e6e";
                    cell2.bgColor = "#eb6e6e";
                    cell3.bgColor = "#eb6e6e";
                    cell4.bgColor = "#eb6e6e";
                }
            }
            if (output.length == 1) {
                document.getElementById('stat').innerHTML = "(" + available + "/" + output.length + ")" + " item available to proceed the request.";
            } else {
                document.getElementById('stat').innerHTML = "(" + available + "/" + output.length + ")" + " items available to proceed the request.";
            }
        }
    </script>
</body>

</html>