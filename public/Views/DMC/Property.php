<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
// echo $array[count($array)-2];
// exit;
?>

<head>
    <meta charset="UTF-8">
    <title> DMC</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
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
    <div id="alertBox">
    </div>
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




                    <div class="tab">
                        <div class="row">
                            <div class="col3">
                                <label for="fname">Applicant Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="aname" name="aname" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="nic">NIC</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="anic" name="anic" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col9">
                                <textarea type="text" id="aaddress" name="aaddress" placeholder="" height="20" readonly></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="TP number">Telephone Number</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="atpnumber" name="atpnumber" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="relationship">Relationship</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="arelationship" name="arelationship" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="TP number">Disaster</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="disaster" name="disaster" placeholder="" readonly>
                            </div>
                        </div>

                    </div>


                    <hr style="margin:10px;">


                    <div class="tab">
                        <h3 class="text-center">Damaged Property Details</h3>





                        <div class="row">
                            <div class="col3">
                                <label for="tla">Total Land Area</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="tla" name="tla" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="htype">House Type</label>
                            </div>
                            <div class="col9">

                                <input type="text" id="htype" name="htype" placeholder="" readonly>
                            </div>
                        </div>

                        <div id="damaged-prop">
                            <hr style="margin:10px;">
                            <h3 class="text-center">Assessment of Damaged Property</h3>

                            <div class="damaged-property">
                                <!-- <div class="damaged">


                                    <div class="row">
                                        <div class="col3">
                                            <label for="relationship">Damaged property</label>
                                        </div>
                                        <div class="col9">

                                            <input type="text" id="dptype0" name="dptype0" placeholder="">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col3">
                                            <label for="relationship">Description</label>
                                        </div>
                                        <div class="col9">
                                            <input type="text" id="dpdes0" name="dpdes0" placeholder="">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col3">
                                            <label for="nic">Total Area</label>
                                        </div>
                                        <div class="col9">
                                            <input type="number" id="dpta0" name="dpta0" placeholder="1" class="dpta">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col3">
                                            <label for="nic">Damaged Area</label>
                                        </div>
                                        <div class="col9">
                                            <input type="text" id="dpda0" name="dpda0" placeholder="0" class="dpda">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col3">
                                            <label for="nic">Value of Damage</label>
                                        </div>
                                        <div class="col9">
                                            <input type="text" id="dpvod0" name="dpvod0" placeholder="" class="dpvod">
                                        </div>
                                    </div>




                                </div> -->

                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col3">
                                <label for="nic"><b>Total Value (Rs)</b></label>
                            </div>
                            <div class="col9">
                                <input type="text" id="tvprop" name="tvprop" placeholder="0" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="tab" id="damaged-serv">
                        <!-- <div class="row">
                                <div class="col3">
                                    <label for="relationship">Photographs</label>
                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="status">Damage rate per cent</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="status" name="status" placeholder="">
                                </div>
                            </div> -->

                        <hr style="margin:10px;">
                        <h3 class="text-center">Assessment of Damaged Services</h3>

                        <div class="damaged-service">


                            <!-- <div class="service">


                                <div class="row">
                                    <div class="col3">
                                        <label for="htype">Damaged Service</label>
                                    </div>
                                    <div class="col9">
                                        <input type="text" id="dstype0" name="dstype0" placeholder="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col3">
                                        <label for="nic">Estimated Value</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="dsev0" name="dsev0" placeholder="0" class="dsev">
                                    </div>
                                </div>

                            </div> -->


                        </div>

                        <br>




                        <div class="row">
                            <div class="col3">
                                <label for="nic"><b>Total Value (Rs)</b></label>
                            </div>
                            <div class="col9">
                                <input type="text" id="tvser" name="tvser" placeholder="0" readonly>
                            </div>
                        </div>

                        <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

                    </div>
                    <div class="tab" id="damaged-app">
                        <hr style="margin:10px;">
                        <h3 class="text-center">Assessment of Damaged Appliances</h3>
                        <div class="damaged-app">
                            <!-- <div class="app">

                                <div class="row">
                                    <div class="col3">
                                        <label for="htype">Damaged Equipment</label>
                                    </div>
                                    <div class="col9">
                                        <input type="text" id="detype0" name="detype0" placeholder="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col3">
                                        <label for="nic">Estimated Value</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="deev0" name="deev0" placeholder="0" class="deev">
                                    </div>
                                </div>

                            </div> -->


                        </div>


                        <br>
                        <div class="row">
                            <div class="col3">
                                <label for="nic"><b>Total Value (Rs)</b></label>
                            </div>
                            <div class="col9">
                                <input type="text" id="tvde" name="tvde" placeholder="" readonly>
                            </div>
                        </div>


                        <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

                    </div>
                    <br>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col3">
                            <label for="nic"><b>Total Compensation (Rs)</b></label>
                        </div>
                        <div class="col9">
                            <input type="text" id="totcomp" name="totcomp" placeholder="0" readonly>
                        </div>
                    </div>
                    <hr>
                    <hr>

                    <div class="tab">
                        <h3 class="text-center">Bank Details</h3>
                        <div class="row">
                            <div class="col3">
                                <label for="nic">Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="hname" name="hname" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="nic">Bank</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="hbank" name="hbank" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="nic">Branch</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="hbranch" name="hbranch" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="nic">Account Number</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="hacc" name="hacc" placeholder="" readonly>
                            </div>
                        </div>

                        <!-- <h3>Upload certified Copies</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Deed</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Home insurance certificate photocopy</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Bank pass book photocopy</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div> -->

                    </div>

                    <!-- <div class="row " style="text-align:right;justify-content: right;">
                        <input type="reset" style="background-color: red;" value="Cancel">
                        <input type="submit" style="background-color: darkblue;" value="Submit">
                    </div> -->

                    <hr style="margin:10px;">

                    <div class="row">
                        <div class="col6 row-content">
                            <h4>GramaNiladari : <span id="gnname"></span></h4>
                        </div>
                        <!-- <div class="col6 row-content">
                            <h4>Remarks : <span id="gnremarks">* </span></h4>
                        </div> -->
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col6 row-content">
                            <h4>Divisional Secretariat : <span id="dsname"></span></h4>
                        </div>
                        <div class="col6 row-content">
                            <h4>Remarks : <span id="dsremarks">* </span></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="mystatus">
                        <div class="col6 row-content">
                            <h4>Final Status : <span id="finalstatus"></span></h4>
                        </div>
                        <div class="col6 row-content">
                            <h4>Remarks : <span id="dmcremarks">* </span></h4>
                        </div>
                    </div>


                </div>
                <br>
                <div id="mystatus2">

                    <div class="row">
                        <div class="col3">
                            <label for="nic">Remarks</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="dmcremarksnew" name="dmcremarksnew" placeholder="Remarks">
                        </div>
                    </div>
                    <br>
                    <div class="row " style="text-align:right;justify-content: right;">
                        <div class="" style="text-align: right;margin-right: 0;">
                            <div style="display:block;">
                                <a id="reject" data-app="r" class="btn_blue" style="background-color: #9B0000;">Reject</a>&nbsp; &nbsp;
                                <a id="accept" data-app="a" class="btn_blue" style="background-color: #357C3C;">Approve</a>
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

            getProperty();

            $(document).on('click', '.btn_blue', function(e) {
                e.preventDefault();
                var x = $(this).data('app');
                var report = "<?php echo $array[count($array) - 2]; ?>";
                var last = <?php echo $array[count($array) - 1]; ?>;
                console.log(x);
                var object = {};

                object['dmcremarks'] = $('#dmcremarksnew').val();
                object['dmcapproved'] = x;
                object['report'] = report;
                object['reportId'] = last;



                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "PUT",
                    url: "<?php echo API; ?>dmccompapprove",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        console.log(result);
                        var url = "<?php echo HOST; ?>/DMC/Compensation";
                        console.log(result.code);
                        if (result.code == 806) {
                            alertGen("Record Added Successfully!", 1);
                        } else {
                            alertGen(" Unable to handle request.", 2);
                        }
                        setTimeout(function() {
                            $(location).attr('href', url);
                        }, 500);
                    },
                    error: function(err) {
                        alertGen(" Something went wrong.", 3);
                        console.log(err);
                    }
                });

            });
            $('textarea').height(this.scrollHeight);;
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getProperty() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>dmcprop/<?php echo end($array); ?>",
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

            $('#gnname').text(obj['gnname']);
            $('#dsname').text(obj['dsname']);
            $('#dsremarks').append(obj['disremarks']);
            if (obj['dmcapproved'] == 'p') {
                $('#mystatus').hide();
            } else {
                $('#mystatus2').hide();
                $('#dmcremarks').append(obj['dmcremarks']);
                if (obj['dmcapproved'] == 'a') {
                    $('#finalstatus').text("Approved");
                } else if (obj['dmcapproved'] == 'r') {
                    $('#finalstatus').text("Rejected");
                }
            }
            // if (obj['dvapproved'] == 'p') {
            //     $('#dsname').text("Pending");
            // } else if (obj['dvapproved'] == 'a') {
            //     $('#dsname').text("Approved");
            // } else {
            //     $('#dsname').text("Rejected");
            // }
            // if (obj['dvremarks'] != null) {
            //     $('#dsremarks').append(obj['dvremarks']);
            // } else {
            //     $('#dsremarks').text("");
            // }
            // if (obj['dmcapproved'] == 'p') {
            //     $('#dmcname').text("Pending");
            // } else if (obj['dmcapproved'] == 'a') {
            //     $('#dmcname').text("Approved");
            // } else {
            //     $('#dmcname').text("Rejected");
            // }
            // if (obj['dmcremarks'] != null) {
            //     $('#dmcremarks').append(obj['dmcremarks']);
            // } else {
            //     $('#dmcremarks').text("");
            // }
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