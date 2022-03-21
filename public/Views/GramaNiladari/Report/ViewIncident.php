<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
// $array = explode("/", $_GET["url"]);
// echo end($array);
// exit;
$di = $_GET['disaster'];
$f = $_GET['from'];
$t = $_GET['to'];
// echo $t;exit;
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
                    <h1 class="text-center">Incident Report</h1>
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

                    <div class="report-container">
                        <div class="report-content">
                            <div class="report-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width:130px;">Date</th>
                                            <th class="text-center">Disaster</th>
                                            <th class="text-center">Location</th>
                                            <th class="text-center" style="width:100px;">Families</th>
                                            <th class="text-right" style="width:100px;">People</th>
                                            <th class="text-right" style="width:100px;">Deaths</th>
                                            <th class="text-right" style="width:100px;">Injured</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <span class="nothing"></span>

                                        <!-- <tr class="tr-primary open" id="tr_2">
                                            <td colspan="7">
                                                Front Bumpber Bracket
                                            </td>
                                        </tr>
                                        <tr class="tr-secondary">
                                            <td id="date">11/05/2018</td>
                                            <td id="dis" class="text-center">Inventory Starting Value</td>
                                            <td id="loc">Bonnet/hood - Opening inventory</td>
                                            <td id="fam" class="text-right">0</td>
                                            <td id="peo" class="text-right">0</td>
                                            <td id="deaths" class="text-right">0</td>
                                            <td id="injured" class="text-right">0</td>
                                        </tr> -->



                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-left">TOTAL</th>
                                            <th id="totfam" class="text-right">0</th>
                                            <th id="totpeople" class="text-right">0</th>
                                            <th id="totdeaths" class="text-right">0</th>
                                            <th id="totinjured" class="text-right">0</th>
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
            getFinal();
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getFinal() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gninitial",
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
            console.log(obj);
            obj = output['reports'];

            if (obj !== null) {
                var totfam = 0;
                var totpeople = 0;
                var totdeaths = 0;
                var totinjured = 0;
                for (var i = 0; i < obj.length; i++) {
                    // console.log(obj[i]['date'] == <?php echo $t ?>);
                    // console.log(obj[i]['date'] );
                    var ttt = "<?php echo $t; ?>";
                    var fff = "<?php echo $f; ?>";
                    var di = "<?php echo $di; ?>";
                    // console.log(ttt);
                    if ((obj[i]['date'] <= ttt && obj[i]['date'] >= fff) && (di == "all" || di == obj[i]['disaster'])) {
                        // console.log(ttt);
                        // console.log(obj[i]['date']);
                        // console.log(fff);
                        totfam += parseFloat(obj[i]['fam']);
                        totpeople += parseFloat(obj[i]['people']);
                        totdeaths += parseFloat(obj[i]['death']);
                        totinjured += parseFloat(obj[i]['injured']);
                        var html = '';
                        html += "<tr class='tr-primary open' id='tr_2'><td colspan='7'><span id='cause" + i + "'></td></tr>";
                        html += "<tr class='tr-secondary'><td id='date" + i + "'>11/05/2018</td><td id='dis" + i + "' class='text-center'>Inventory Starting Value</td><td id='loc" + i + "'>Bonnet/hood - Opening inventory</td>";
                        html += "<td id='fam" + i + "' class='text-right'>0</td><td id='peo" + i + "' class='text-right'>0</td><td id='deaths" + i + "' class='text-right'>0</td><td id='injured" + i + "' class='text-right'>0</td></tr>";
                        $('#tbody').append(html);

                        $('#cause' + i).html(obj[i]['cause']);
                        $('#date' + i).html(obj[i]['date']);
                        $('#dis' + i).html(getDisasterType(obj[i]['disaster']));
                        $('#loc' + i).html(obj[i]['location']);
                        $('#fam' + i).html(obj[i]['fam']);
                        $('#peo' + i).html(obj[i]['people']);
                        $('#deaths' + i).html(parseFloat(obj[i]['death']));
                        $('#injured' + i).html(parseFloat(obj[i]['injured']));


                    }

                    $('#totfam').html(parseFloat(totfam));
                    $('#totpeople').html(parseFloat(totpeople));
                    $('#totdeaths').html(parseFloat(totdeaths));
                    $('#totinjured').html(parseFloat(totinjured));
                }

            } else {
                $('.nothing').text('No records');
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