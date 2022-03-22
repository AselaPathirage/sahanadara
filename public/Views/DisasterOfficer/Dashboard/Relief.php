<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
// exit;
?>

<head>
    <meta charset="UTF-8">
    <title> Disaster Officer</title>
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
        //include_once('./public/Views/DisasterOfficer/includes/sidebar_dashboard.php');
     ?>
    <!-- <section class="dashboard-section"> -->
        <?php 
        // include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
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
                    <h1 class="text-center">Relief Report</h1>

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
                            <label for="crusttype">Date</label>
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
                            <label for="fname">Cause</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="cause" name="cause" placeholder="Cause" readonly>
                        </div>
                    </div>


                    <hr style="margin:10px;">



                    <h4 class="text-center">Relief Required Families</h4>
                    <h4 class="text-center">Dry Rations</h4>

                    <div class="row">
                        <div class="col6">
                            <div class="row">
                                <div class="col5" style="text-align: right;">
                                    <label for="TP number">1 member</label>
                                </div>
                                <div class="col7">
                                    <input type="number" id="m1" name="m1" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col5" style="text-align: right;">
                                    <label for="TP number">2 members</label>
                                </div>
                                <div class="col7">
                                    <input type="number" id="m2" name="m2" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col5" style="text-align: right;">
                                    <label for="TP number">3 members</label>
                                </div>
                                <div class="col7">
                                    <input type="number" id="m3" name="m3" placeholder="0" readonly>
                                </div>
                            </div>


                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col5" style="text-align: right;">
                                    <label for="TP number">4 members</label>
                                </div>
                                <div class="col7">
                                    <input type="number" id="m4" name="m4" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col5" style="text-align: right;">
                                    <label for="TP number">5 members</label>
                                </div>
                                <div class="col7">
                                    <input type="number" id="m5" name="m5" placeholder="0" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    <h4 class="text-center">Other (Rs)</h4>

                    <div class="row">
                        <div class="col6">
                            <div class="row">
                                <div class="col5" style="text-align: right;">
                                    <label for="TP number">Cooked food</label>
                                </div>
                                <div class="col7">
                                    <input type="number" id="cooked" name="cooked" placeholder="Rs 0" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col5" style="text-align: right;">
                                    <label for="TP number">Emergency suppliess</label>
                                </div>
                                <div class="col7">
                                    <input type="number" id="emer" name="emer" placeholder="Rs 0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>




                    <hr style="margin:10px;">




                    <h4 class="text-center">Grama Niladari - Status (Total by the date)
                    </h4>

                    <div class="row">
                        <div class="col6">
                            <div class="col6">
                                <h4 class="" style="padding:0 80px">Affected</h4>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Families</label>
                                </div>
                                <div class="col9">
                                    <input type="number" id="fam" name="fam" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">People</label>
                                </div>
                                <div class="col9">
                                    <input type="number" id="people" name="people" placeholder="0" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Deaths</label>
                                </div>
                                <div class="col9">
                                    <input type="number" id="deaths" name="deaths" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Injured</label>
                                </div>
                                <div class="col9">
                                    <input type="number" id="injured" name="injured" placeholder="0" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Missing</label>
                                </div>
                                <div class="col9">
                                    <input type="number" id="missing" name="missing" placeholder="0" readonly>
                                </div>
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



                    </div>




                </div>
            </div>

        </form>

    </div>



    <!-- </section> -->
    <script>
        var thisPage = "#IncidentReporting";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
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
            getRelief()
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        
        function getRelief() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>dorelief/<?php echo end($array); ?>",
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
            $('#datePicker1').val(obj['startDate']);
            $('#datePicker2').val(obj['endDate']);

            // if(obj['disaster'])
            // $('#dis').val(obj['disaster']);
            getDisasterType(obj['disaster']);
            $('#location').val(obj['location']);
            $('#cause').val(obj['cause']);
            $('#afam').val(obj['fam']);
            $('#apeople').val(obj['people']);
            $('#efam').val(obj['evafam']);
            $('#epeople').val(obj['evapeople']);
            $('#deaths').val(obj['death']);
            $('#injured').val(obj['injured']);
            $('#missing').val(obj['missing']);
            $('#hos').val(obj['hospitalized']);
            $('#hfull').val(obj['hfull']);
            $('#hpartial').val(obj['hpartial']);
            $('#enterprises').val(obj['enterprise']);
            $('#infra').val(obj['infras']);
            $('#safenum').val(obj['numofsafe']);
            $('#sfam').val(obj['sffamily']);
            $('#speople').val(obj['sfpeople']);
            $('#dry').val(obj['dryrationsRs']);
            $('#cooked').val(obj['cookingRs']);
            $('#emer').val(obj['emergencyRs']);
            $('#remarks').val(obj['remarks']);
            $('#gnname').text(obj['empName']);
            $('#gntel').text(obj['empTele']);
            $('#timestamp').text(obj['timestamp']);
            if (obj['disoffapproved'] == 'p') {
                $('#dsname').text("Pending");
            } else if (obj['disoffapproved'] == 'a') {
                $('#dsname').text("Approved");
            } else {
                $('#dsname').text("Rejected");
            }
            if (obj['disRemarks'] != null) {
                $('#dsremarks').append(obj['disRemarks']);
            } else {
                $('#dsremarks').text("");
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