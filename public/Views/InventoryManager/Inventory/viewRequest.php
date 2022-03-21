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
        .create {
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

        .create:hover {
            background-color: rgb(163, 230, 205);
        }

        .view {
            background-color: rgb(241, 67, 67);
            height: 50px;
            width: 100%;
            padding: 14px;
            text-align: center;
            border-radius: 5px;
            line-height: 25px;
            color: black;
            font-weight: bold;
        }

        .view:hover {
            background-color: rgb(246, 139, 139);
        }

        td {
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
                <center>
                    <h1 id="header"></h1>
                </center>
                    <fieldset>
                        <div style="padding-left:15% ;">
                            <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                <table style="border: none !important;width:70%;">
                                    <tr>
                                        <td style="background-color: #fff;">Required Date</td>
                                        <td style="background-color: #fff;"><input type="date" id="requiredDate" name="requiredDate" style="width: 100%;" disabled='true' disabled='true'></td>
                                    </tr>
                                    <tr id="check">
                                        <td style="background-color: #fff;">Note</td>
                                        <td style="background-color: #fff;"><textarea id="notes" name="notes" rows="4" cols="50" disabled='true'></textarea></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div id="request"  class="container text-center">
                                    <form id="list">
                                        <center>
                                        <table id="ajaxFilter" class="table" style="width: 70%;">
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
                                        </center>
                                    </form>
                                </div>
                                <h4 id='stat'></h4>
                                <div style="float: right;width:50%">
                                    <table style="border: none !important;width:100%;height:40%">
                                        <tr>
                                            <td style="border: none !important;width:50%;"><input type="button" style="height:100%;font-size:20px" class="form-control btn_delete" value="Decline"></td>
                                            <td style="border: none !important;width:50%;"><input type="button" style="height:100%;font-size:20px" class="form-control btn_active" value="Accept"></td>
                                        </tr>
                                    </table>
                                </div>
                    </fieldset>
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
        var request,available = 0;;
        serviceRequests();
        setData();

        function serviceRequests() {
            request = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>serviceRequest/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
        }
        function setData() {
            document.getElementById('header').innerHTML = "Service Request From - " + request[0]['name'];
            if(request[0]['note']==""){
                document.getElementById('check').innerHTML = "";
            }else{
                document.getElementById('notes').innerHTML = request[0]['note'];
            }
            document.getElementById('requiredDate').value = request[0]['requestedDate'];
            var table = document.getElementById("trow");
            for (var i = 0; i < request[0]['item'].length; i++) {
                let obj = request[0]['item'][i];console.log(obj);
                let row = table.insertRow(-1);
                let cell0 = row.insertCell(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                cell0.innerHTML = "<input type='checkbox' class='form-control check' value='" + obj['itemName'] + "' name='items' data-id='" + obj['itemId'] + "' data-quantity='" + obj['requestedAmount'] + "' data-available='" + obj['quantity'] + "'>";
                cell1.innerHTML = obj['itemId'];
                cell2.innerHTML = obj['itemName'];
                cell3.innerHTML = obj['requestedAmount'] + " " + obj['unit'];
                cell4.innerHTML = obj['quantity'] + " " + obj['unit'];
                if (parseFloat(obj['requestedAmount']) <= parseFloat(obj['quantity'])) {
                    available++;
                } else {
                    cell0.bgColor = "#eb6e6e";
                    cell1.bgColor = "#eb6e6e";
                    cell2.bgColor = "#eb6e6e";
                    cell3.bgColor = "#eb6e6e";
                    cell4.bgColor = "#eb6e6e";
                }
            }
            console.log(available)
            if (request[0]['item'].length == 1) {
                document.getElementById('stat').innerHTML = "(" + available + "/" + request[0]['item'].length + ")" + " item available to proceed the request.";
            } else {
                document.getElementById('stat').innerHTML = "(" + available + "/" + request[0]['item'].length + ")" + " items available to proceed the request.";
            }
        }
    </script>
</body>

</html>