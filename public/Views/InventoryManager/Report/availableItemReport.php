<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
try {
    $from = $array[4];
    $to = $array[6];
} catch (Exception $e) {
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/report.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            /* height: 842px;
            width: 595px; */
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }

        #btnprint {
            background: #efc468;
            border-radius: 0;
            color: #232323;
            display: inline-block;
            font-size: 1rem;
            height: 50px;
            line-height: 50px;
            position: fixed;
            right: 0;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            -webkit-transform: rotate(-90deg);
            transform-origin: bottom right;
            width: 150px;

        }
    </style>
</head>

<body>
    <div class="space"></div>
    <a id="btnprint">Print</a>
    <div class="container col12">
        <form id="add">
            <div class="box">
                <div class="box1">
                    <div style="text-align: center;">
                        <img src="<?php echo HOST; ?>/public/assets/img/social-care (1).png" height="50" alt="LOGO">
                    </div>
                    <h1 class="text-center">Available Item Report</h1>
                    <h4>From : <?php echo " " . $from; ?><span></span> To : <?php echo " " . $to; ?></h4>
                    <div class="row">
                        <div class="col4">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="district" name="district" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col4">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">Division</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="division" name="division" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col4">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">Inventory ID</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="inventory" name="inventory" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin:10px;">

                    <div class="report-container">
                        <div class="report-content">
                            <div class="report-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width:130px;">Item Id</th>
                                            <th class="text-center">Item Name</th>
                                            <th class="text-center">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <span class="nothing"></span>
                                    </tbody>
                                </table>
                            </div>
                            <div class="report-footer">
                                <div class="report-timestamp" style="margin-left: 5px;">
                                    Created by :<span id="user"></span><br>
                                    <?php
                                    echo "Created date : " . date("Y-m-d h:i:sa");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        var thisPage = "#availableItemReport";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#btnprint").click(function() {
                $("#btnprint").hide();
                window.print();
                $("#btnprint").show();
            });

        });
        var output;
        setInventoryData();
        availableItem();

        function availableItem() {
            var object = {};
            object['from'] = "<?php echo $from; ?>";
            object['to'] = "<?php echo $to; ?>";
            var json = JSON.stringify(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>report/availableItemReport/<?php echo $from; ?>/<?php echo $to; ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            let count = output.length;
            if (count == 0) {
                $('.nothing').text('No records');
            } else {
                var table = document.getElementById("tbody");
                for (var i = 0; i < output.length; i++) {
                    let obj = output[i];
                    let row = table.insertRow(-1);
                    let id = "data_" + i;
                    row.id = id;
                    row.className = "task-list-row";
                    let cell1 = row.insertCell(-1);
                    let cell2 = row.insertCell(-1);
                    let cell3 = row.insertCell(-1);
                    cell1.innerHTML = obj['itemId'];
                    cell2.innerHTML = obj['itemName'];
                    cell3.innerHTML = obj['inInventory']+" "+obj['unitName'];
                }
            }
        }

        function setInventoryData() {
            var data = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>user/self/all",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(data)
            document.getElementById('district').value = data.district;
            document.getElementById('division').value = data.division;
            document.getElementById('inventory').value = data.inventoryId;
            document.getElementById('user').innerHTML = " " + data.empName;
        }
    </script>
</body>

</html>