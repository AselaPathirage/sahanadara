<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
// $array = explode("/", $_GET["url"]);
// echo end($array);
// exit;
// $di = $_GET['type'];
// $f = $_GET['from'];
// $t = $_GET['to'];
// echo $t;exit;
?>
<?php

$dis = $_GET['district'];
$dv = $_GET['dividion'];
$gn = $_GET['gnDivision'];
$u = "";
if (empty($dis)) {
    $u = "";
} else if (empty($dv)) {
    $u = "/" . $dis;
} else if (empty($gn)) {
    $u = "/" . $dis . "/" . $dv;
} else {
    $u = "/" . $dis . "/" . $dv . "/" . $gn;
}
// echo($u);
?>



<head>
    <meta charset="UTF-8">
    <title> DMC</title>
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
    <?php
    // include_once('./public/Views/GramaNiladari/includes/sidebar_dashboard.php');
    ?>
    <!-- <section class="dashboard-section"> -->
    <?php
    // include_once('./public/Views/GramaNiladari/includes/topnav.php');
    ?>
    <div class="space"></div>
    <!-- <div id="alertBox">
    </div> -->
    <!-- Print  -->
    <a id="btnprint">Print</a>
    <div class="container col12">
        <form id="add">
            <div class="box">
                <div class="box1">
                    <div style="text-align: center;">
                        <img src="<?php echo HOST; ?>/public/assets/img/social-care (1).png" height="50" alt="LOGO">
                    </div>
                    <h1 class="text-center">Safehouse Report</h1>
                    <hr style="margin:10px;">

                    <div class="report-container">
                        <div class="report-content">
                            <div class="report-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width:130px;">Safehouse ID</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center" style="width:130px;">Contact</th>
                                            <th class="text-right" style="width:220px;">GN Division</th>
                                            <th class="text-right" style="width:120px;">Division</th>
                                            <th class="text-right" style="width:120px;">District</th>
                                            <!-- <th class="text-right" style="width:100px;">Injured</th> -->

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <span class="nothing"></span>

                                        <!-- <tr class="tr-primary open" id="tr_2">
                                            <td colspan="7">
                                                Front Bumpber Bracket
                                            </td>
                                        </tr> -->
                                        <!-- <tr class="tr-secondary1">
                                            <td id="date">11/05/2018</td>
                                            <td id="report" class="text-center">Inventory Starting Value</td>
                                            <td id="aname">Bonnet/hood - Opening inventory</td>
                                            <td id="disaster">Bonnet/hood - Opening inventory</td>
                                            <td id="dvapp" class="text-center">0</td>
                                            <td id="dmcapp" class="text-center">0</td>
                                            <td id="collected" class="text-center">0</td>

                                        </tr> -->



                                    </tbody>
                                    <tfoot>
                                        <!-- <tr>
                                            <th colspan="3" class="text-left">TOTAL</th>
                                            <th id="totfam" class="text-right">0</th>
                                            <th id="totpeople" class="text-right">0</th>
                                            <th id="totdeaths" class="text-right">0</th>
                                            <th id="totinjured" class="text-right">0</th>
                                        </tr> -->
                                    </tfoot>
                                </table>
                            </div>

                            <div class="report-footer">
                                <div class="report-timestamp text-center">
                                    <?php
                                    // $d = date("h:i:sa");
                                    echo "Created date is " . date("Y-m-d h:i:sa");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>



    <!-- </section> -->
    <script>
        var thisPage = "#incidents";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            // document.getElementById('datePicker1').valueAsDate = new Date();
            // document.getElementById('datePicker2').valueAsDate = new Date();
            $("#btnprint").click(function() {
                console.log("sdfsdf");
                $("#btnprint").hide();
                window.print();
                $("#btnprint").show();

            });
            let f = "<?php echo API; ?>safeHouseReport<?php echo $u; ?>";
            console.log(f);
            getSafeHouse();
        });

        function getSafeHouse() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safeHouseReport<?php echo $u; ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            let count = output.length;
            if (count == 0) {
                $('#tbody').text('No records');
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
                    let cell4 = row.insertCell(-1);
                    let cell5 = row.insertCell(-1);
                    let cell6 = row.insertCell(-1);
                    let cell7 = row.insertCell(-1);
                    cell1.innerHTML = obj['safeHouseID'];
                    cell2.innerHTML = obj['safeHouseName'];
                    cell3.innerHTML = obj['safeHouseAddress'];
                    cell4.innerHTML = obj['safeHouseTelno'];
                    cell5.innerHTML = obj['gnDvName'];
                    cell6.innerHTML = obj['dvName'];
                    cell7.innerHTML = obj['dsName'];
                }
            }
        }

        function getDisasterType(obj) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>disaster",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output[obj - 1]['dis']);
            return output[obj - 1]['dis'];
            // var select = document.getElementById("disaster");
            // for (var i = 0; i < output.length; i++) {
            //     if (output[i]['disId'] == 3) continue;
            //     var opt = document.createElement('option');
            //     opt.value = output[i]['disId'];
            //     opt.innerHTML = output[i]['dis'];
            //     select.appendChild(opt);
            // }
        }
    </script>
</body>

</html>