<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php

$disaster = $_GET['disaster'];
$from = $_GET['from'];
$to = $_GET['to'];

// $array = explode("/", $_GET["url"]);
// echo end($array);
// exit;
?>

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_admin.css">
    <!-- <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/report.css"> -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
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
                    <h1 class="text-center">Property Compensation</h1>
                    <div class="row">
                        <div class="col6">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="district" name="district" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">DS Office</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="ds" name="ds" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col6">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">GN division</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="gn" name="gn" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr style="margin:10px;">











                    <!-- <div class="report-container">
                        <div class="report-content">
                            <div class="report-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width:130px;">Date</th>
                                            <th class="text-center">Transaction</th>
                                            <th class="text-center" style="width:100px;">Num</th>
                                            <th class="text-center">Vendor</th>
                                            <th>Description</th>
                                            <th class="text-right" style="width:100px;">Qty</th>
                                            <th class="text-right" style="width:100px;">Rate</th>
                                            <th class="text-right" style="width:100px;">Amount</th>
                                            <th class="text-right" style="width:100px;">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-primary open" id="tr_2">
                                            <td colspan="9">
                                                <a class="report-collapse-trigger" href="#tr_2">
                                                    <i class="fas fa-caret-right"></i>
                                                </a>
                                                Front Bumpber Bracket
                                            </td>

                                        </tr>
                                        <tr class="tr-secondary">
                                            <td>11/05/2018</td>
                                            <td class="text-center">Inventory Starting Value</td>
                                            <td class="text-center">START</td>
                                            <td>&nbsp;</td>

                                            <td>Bonnet/hood - Opening inventory</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">0.00</td>

                                        </tr>

                                        <tr class="tr-total">
                                            <td colspan="5">Total for Front Bumpber Bracket</td>

                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">$0.00</td>

                                            <td class="text-right">0.00</td>

                                        </tr>

                                        <tr class="tr-primary open" id="tr_2">
                                            <td colspan="9">
                                                <a class="report-collapse-trigger" href="#tr_2">
                                                    <i class="fas fa-caret-right"></i>
                                                </a>
                                                Front Bumpber Bracket
                                            </td>

                                        </tr>
                                        <tr class="tr-secondary">
                                            <td>11/05/2018</td>
                                            <td class="text-center">Inventory Starting Value</td>
                                            <td class="text-center">START</td>
                                            <td>&nbsp;</td>

                                            <td>Bonnet/hood - Opening inventory</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">0.00</td>

                                        </tr>

                                        <tr class="tr-total">
                                            <td colspan="5">Total for Front Bumpber Bracket</td>

                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">$0.00</td>

                                            <td class="text-right">0.00</td>

                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" class="text-left">TOTAL</th>
                                            <th class="text-right">0.00</th>
                                            <th class="text-right">&nbsp;</th>
                                            <th class="text-right">$0.00</th>
                                            <th class="text-right">&nbsp;</th>
                                        </tr>
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
                    </div> -->



                    <!-- <div class="report-container">
                        <div class="report-content">
                            <div class="report-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width:130px;">Date</th>
                                            <th class="text-center">Transaction</th>
                                            <th class="text-center" style="width:100px;">Num</th>
                                            <th class="text-center">Vendor</th>
                                            <th>Description</th>
                                            <th class="text-right" style="width:100px;">Qty</th>
                                            <th class="text-right" style="width:100px;">Rate</th>
                                            <th class="text-right" style="width:100px;">Amount</th>
                                            <th class="text-right" style="width:100px;">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-primary open" id="tr_2">
                                            <td colspan="9">
                                                <a class="report-collapse-trigger" href="#tr_2">
                                                    <i class="fas fa-caret-right"></i>
                                                </a>
                                                Front Bumpber Bracket
                                            </td>

                                        </tr>
                                        <tr class="tr-secondary">
                                            <td>11/05/2018</td>
                                            <td class="text-center">Inventory Starting Value</td>
                                            <td class="text-center">START</td>
                                            <td>&nbsp;</td>

                                            <td>Bonnet/hood - Opening inventory</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">0.00</td>

                                        </tr>

                                        <tr class="tr-total">
                                            <td colspan="5">Total for Front Bumpber Bracket</td>

                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">$0.00</td>

                                            <td class="text-right">0.00</td>

                                        </tr>

                                        <tr class="tr-primary open" id="tr_2">
                                            <td colspan="9">
                                                <a class="report-collapse-trigger" href="#tr_2">
                                                    <i class="fas fa-caret-right"></i>
                                                </a>
                                                Front Bumpber Bracket
                                            </td>

                                        </tr>
                                        <tr class="tr-secondary">
                                            <td>11/05/2018</td>
                                            <td class="text-center">Inventory Starting Value</td>
                                            <td class="text-center">START</td>
                                            <td>&nbsp;</td>

                                            <td>Bonnet/hood - Opening inventory</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">0.00</td>
                                            <td class="text-right">0.00</td>

                                        </tr>

                                        <tr class="tr-total">
                                            <td colspan="5">Total for Front Bumpber Bracket</td>

                                            <td class="text-right">0.00</td>
                                            <td class="text-right">&nbsp;</td>
                                            <td class="text-right">$0.00</td>

                                            <td class="text-right">0.00</td>

                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5" class="text-left">TOTAL</th>
                                            <th class="text-right">0.00</th>
                                            <th class="text-right">&nbsp;</th>
                                            <th class="text-right">$0.00</th>
                                            <th class="text-right">&nbsp;</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="report-footer">
                                <div class="report-timestamp text-center">
                                    Thursday March 7, 2019 6:12pm IST
                                </div>
                            </div>
                        </div>
                    </div> -->










                </div>
            </div>

        </form>

    </div>



    <!-- </section> -->
    <script>
        var thisPage = "#incidents";
        $(document).ready(function() {
            // $("#stats,#alerts").each(function() {
            //     if ($(this).hasClass('active')) {
            //         $(this).removeClass("active");
            //     }
            //     $(thisPage).addClass("active");
            // });
            // document.getElementById('datePicker1').valueAsDate = new Date();
            // document.getElementById('datePicker2').valueAsDate = new Date();
            $("#btnprint").click(function() {
                console.log("sdfsdf");
                $("#btnprint").hide();
                window.print();
                $("#btnprint").show();
            });
console.log("sdfsdfsdf");
            // getProperty();
            
        });

        // let sidebar = document.querySelector(".sidebar");
        // let sidebarBtn = document.querySelector(".sidebarBtn");
        // sidebarBtn.onclick = function() {
        //     sidebar.classList.toggle("active");
        // }

        function getProperty() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gnprop/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var obj = output['main'];
            console.log(obj);
            $('#district').val(obj['dsName']);
            $('#ds').val(obj['dvName']);
            $('#gn').val(obj['gnDvName']);


            // if(obj['disaster'])
            // $('#dis').val(obj['disaster']);
            // getDisasterType(obj['disaster']);
            $('#aname').val(obj['aname']);
            $('#anic').val(obj['anic']);
            $('#aaddress').val(obj['aaddress']);
            $('#atpnumber').val(obj['atpnumber']);
            $('#arelationship').val(obj['arelationship']);
            $('#disaster').val(obj['disaster']);
            $('#tla').val(obj['tla']);
            $('#htype').val(obj['htype']);

            $('#totcomp').val(obj['totcomp']);

            $('#hname').val(obj['hname']);
            $('#hbank').val(obj['hbank']);
            $('#hbranch').val(obj['hbranch']);
            $('#hacc').val(obj['hacc']);

            $('#gnname').text(obj['empName']);
            $('#gntel').text(obj['empTele']);
            $('#timestamp').text(obj['timestamp']);
            if (obj['dvapproved'] == 'p') {
                $('#dsname').text("Pending");
            } else if (obj['dvapproved'] == 'a') {
                $('#dsname').text("Approved");
            } else {
                $('#dsname').text("Rejected");
            }
            if (obj['dvremarks'] != null) {
                $('#dsremarks').append(obj['dvremarks']);
            } else {
                $('#dsremarks').text("");
            }
            if (obj['dmcapproved'] == 'p') {
                $('#dmcname').text("Pending");
            } else if (obj['dmcapproved'] == 'a') {
                $('#dmcname').text("Approved");
            } else {
                $('#dmcname').text("Rejected");
            }
            if (obj['dmcremarks'] != null) {
                $('#dmcremarks').append(obj['dmcremarks']);
            } else {
                $('#dmcremarks').text("");
            }
            obj = output['app'];
            console.log(obj);
            $('#damaged-app').hide();
            if (obj !== null) {
                $('#damaged-app').show();
                var tote = 0;
                for (var i = 0; i < obj.length; i++) {
                    tote += parseFloat(obj[i]['deev']);
                    var html = '';
                    html += "<div class='app'>";
                    html += "<div class='row'><div class='col3'><label for='htype'>Damaged Equipment</label></div><div class='col9'><input type='text' id='detype" + i + "' name='detype" + i + "' placeholder='' readonly></div></div>";
                    html += "<div class='row'><div class='col3'><label for='nic'>Estimated Value</label></div><div class='col9'><input type='number' id='deev" + i + "' name='deev" + i + "' placeholder='0' class='deev' readonly></div></div>";
                    html += "</div><hr>";
                    $('.damaged-app').append(html);
                    $('#detype' + i).val(obj[i]['detype']);
                    $('#deev' + i).val(parseFloat(obj[i]['deev']));

                }
                $('#tvde').val(tote);
            }
            obj = output['serv'];
            console.log(obj);
            $('#damaged-serv').hide();
            if (obj !== null) {
                $('#damaged-serv').show();
                var tote = 0;
                for (var i = 0; i < obj.length; i++) {
                    tote += parseFloat(obj[i]['dsev']);
                    var html = '';
                    html += "<div class='service'>";
                    html += "<div class='row'><div class='col3'><label for='htype'>Damaged Service</label></div><div class='col9'><input type='text' id='dstype" + i + "' name='dstype" + i + "' placeholder='' readonly></div></div>";
                    html += "<div class='row'><div class='col3'><label for='nic'>Estimated Value</label></div><div class='col9'><input type='number' id='dsev" + i + "' name='dsev" + i + "' placeholder='0' class='dsev' readonly></div></div>";
                    html += " </div><hr>";
                    $('.damaged-service').append(html);
                    $('#dstype' + i).val(obj[i]['dstype']);
                    $('#dsev' + i).val(parseFloat(obj[i]['dsev']));

                }
                $('#tvser').val(tote);
            }
            obj = output['prop'];
            console.log(obj);
            $('#damaged-prop').hide();
            if (obj !== null) {
                $('#damaged-prop').show();
                var tote = 0;
                for (var i = 0; i < obj.length; i++) {
                    tote += parseFloat(obj[i]['dpvod']);
                    var html = '';
                    html += "<div class='damaged'><div class='row'><div class='col3'><label for='relationship'>Damaged property</label></div><div class='col9'><input type='text' id='dptype" + i + "' name='dptype" + i + "' placeholder='' readonly></div></div>";
                    html += " <div class='row'><div class='col3'><label for='relationship'>Description</label></div><div class='col9'><input type='text' id='dpdes" + i + "' name='dpdes" + i + "' placeholder='' readonly></div></div><div class='row'><div class='col3'><label for='nic'>Total Area</label></div><div class='col9'><input type='text' id='dpta" + i + "' name='dpta" + i + "' placeholder='0' class='dpta' readonly></div></div>";
                    html += " <div class='row'><div class='col3'><label for='nic'>Damaged Area</label></div><div class='col9'><input type='text' id='dpda" + i + "' name='dpda" + i + "' placeholder='0' class='dpda' readonly></div></div><div class='row'><div class='col3'><label for='nic'>Value of Damage</label></div><div class='col9'><input type='text' id='dpvod" + i + "' name='dpvod" + i + "' placeholder='' class='dpvod' readonly></div></div>";
                    html += "</div><hr>";
                    $('.damaged-property').append(html);
                    $('#dptype' + i).val(obj[i]['dptype']);
                    $('#dpdes' + i).val(obj[i]['dpdes']);
                    $('#dpta' + i).val(obj[i]['dpta']);
                    $('#dpda' + i).val(obj[i]['dpda']);
                    $('#dpvod' + i).val(parseFloat(obj[i]['dpvod']));

                }
                $('#tvprop').val(tote);
            }

            // $('#infra').val(obj['infras']);
            // $('#safenum').val(obj['numofsafe']);
            // $('#sfam').val(obj['sffamily']);
            // $('#speople').val(obj['sfpeople']);
            // $('#dry').val(obj['dryrationsRs']);
            // $('#cooked').val(obj['cookingRs']);
            // $('#emer').val(obj['emergencyRs']);
            // $('#remarks').val(obj['remarks']);
        }

        function getDisasterType(obj) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>getProperty",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $('#dis').val(output[obj - 1]['dis']);
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