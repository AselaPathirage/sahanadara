<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
// exit;
?>

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
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
                    <h1 class="text-center">Initial Incident Report</h1>
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




                    <div class="row">
                        <div class="col3">
                            <label for="crusttype">Date of commenced</label>
                        </div>
                        <div class="col9 row-content" style="align-items: center;">
                            <input type="date" id="datePicker1" name="datePicker1" class="datesInForms" readonly>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col3">
                            <label for="crusttype">End date</label>
                        </div>
                        <div class="col9 row-content" style="align-items: center;">
                            <input type="date" id="datePicker2" name="datePicker2" class="datesInForms">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col3">
                            <label for="user role">Disaster</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="dis" name="dis" placeholder="Location of incident" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="fname">Location of incident</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="location" name="location" placeholder="Location of incident" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="fname">Cause</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="cause" name="cause" placeholder="Cause" readonly>
                        </div>
                    </div>


                    <hr style="margin:10px;">


                    <h4 class="text-center">Reporting on the Impact of Disaster</h4>
                    <div class="row">
                        <div class="col6">
                            <div class="col12">
                                <h4 class="" style="padding:0 80px">Affected</h4>
                            </div>

                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Families</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="afam" name="afam" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">People</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="apeople" name="apeople" placeholder="0" readonly>
                                </div>
                            </div>


                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Deaths</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="deaths" name="deaths" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Injured</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="injured" name="injured" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row" id="missingrow">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Missing</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="missing" name="missing" placeholder="0" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col6">
                            <div class="col12">

                                <h4 class="" style="padding:0 80px">Houses Damaged</h4>
                            </div>

                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Fully</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="hfull" name="hfull" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Partially</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="hpartial" name="hpartial" placeholder="0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="col12">

                                <h4 class="" style="padding:0 80px">Other Damages</h4>
                            </div>

                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Enterprises </label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="enterprises" name="enterprises" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Infrastructure
                                    </label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="infra" name="infra" placeholder="0" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col12">
                            <h4 class="" style="padding:0 80px">Safe Locations</h4>
                        </div>

                        <div class="row">
                            <div class="col4" style="text-align: right;">
                                <label for="TP number">Number of safe houses</label>
                            </div>
                            <div class="col8">
                                <input type="number" id="safenum" name="safenum" placeholder="0" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col4" style="text-align: right;">
                                <label for="TP number">Families</label>
                            </div>
                            <div class="col8">
                                <input type="number" id="sfam" name="sfam" placeholder="0" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col4" style="text-align: right;">
                                <label for="TP number">People</label>
                            </div>
                            <div class="col8">
                                <input type="number" id="speople" name="speople" placeholder="0" readonly>
                            </div>
                        </div>

                    </div>


                    <div class="row" style="margin-top:20px;">
                        <div class="row">
                            <div class="col2" style="text-align: right;">
                                <label for="remarks">Remarks</label>
                            </div>
                            <div class="col10">
                                <textarea type="text" id="remarks" name="remarks" placeholder="Remarks" readonly></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row " style="text-align:right;justify-content: right;">
                        <input type="reset" style="background-color: red;" value="Cancel">
                        <input type="submit" style="background-color: darkblue;" value="Submit">
                    </div> -->

                    <hr style="margin:10px;">

                    <div class="row">
                        <div class="col6">
                            <h3>Prepared by : <span id="gnname"></span> - <span id="gntel"></span><br>(<span id="timestamp"></span>)</h3>
                        </div>
                        <div class="col6">
                            <h3>Approved Status : <span id="dsname"></span></h3>
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

            getInitial();
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getInitial() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gninitial/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var obj = output;
            console.log(obj);
            $('#district').val(obj['dsName']);
            $('#ds').val(obj['dvName']);
            $('#gn').val(obj['gnDvName']);
            $('#datePicker1').val(obj['date']);

            // if(obj['disaster'])
            // $('#dis').val(obj['disaster']);
            getDisasterType(obj['disaster']);
            $('#location').val(obj['location']);
            $('#cause').val(obj['cause']);
            $('#afam').val(obj['fam']);
            $('#apeople').val(obj['people']);
            $('#deaths').val(obj['death']);
            $('#injured').val(obj['injured']);
            $('#missing').val(obj['missing']);
            $('#hfull').val(obj['hfull']);
            $('#hpartial').val(obj['hpartial']);
            $('#enterprises').val(obj['enterprise']);
            $('#infra').val(obj['infra']);
            $('#safenum').val(obj['safenumber']);
            $('#sfam').val(obj['safefam']);
            $('#speople').val(obj['safepeople']);
            $('#remarks').val(obj['remarks']);
            $('#gnname').text(obj['empName']);
            $('#gntel').text(obj['empTele']);
            $('#timestamp').text(obj['timestamp']);
            if (obj['disoffapproved'] == 'p') {
                $('#dsname').text("Pending");
            } else if (obj['disoffapproved'] == 'a') {
                $('#dsname').text("Approved");
            } else {
                $('#dsname').text("Rejeted");
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


        function alertGen($messege, $type) {
            if ($type == 1) {
                $("#alertBox").html("  <div class='alert success-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else if ($type == 2) {
                $("#alertBox").html("  <div class='alert warning-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else {
                $("#alertBox").html("  <div class='alert danger-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }
        }
    </script>
</body>

</html>