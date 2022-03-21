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
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_admin.css">
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
                    <h1 class="text-center">Death Compensation</h1>
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
                                <label for="disaster">Disaster</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="disaster" name="disaster" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="doc" style="margin-top:6px">Date</label>
                            </div>

                            <div class="col9 row-content" style="align-items: center;">
                                <input type="date" id="disdate" name="disdate" class="datesInForms" readonly>
                            </div>

                        </div>
                        <h4 class="text-center">Details of the deceased person</h4>
                        <div class="row">
                            <div class="col3">
                                <label for="fname" style="margin-top:0">Full name of deceased person</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="dname" name="dname" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="ddate" style="margin-top:6px">Date of death</label>
                            </div>

                            <div class="col9 row-content" style="align-items: center;">
                                <input type="date" id="ddate" name="ddate" class="datesInForms" readonly>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="dnic">NIC</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="dnic" name="dnic" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col9">
                                <textarea type="text" id="daddress" name="daddress" placeholder="" readonly></textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col3">
                                <label for="doccupation">Occupation</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="doccupation" name="doccupation" placeholder="" readonly>
                            </div>
                        </div>

                    </div>
                    <hr style="margin:10px;">
                    <div class="tab">
                        <h4 class="text-center">Details of the applicant</h4>
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

                                <input type="text" id="relationship" name="relationship" placeholder="" readonly>

                            </div>
                        </div>

                    </div>

                    <div class="tab" id="heirs-list">
                        <hr style="margin:10px;">
                        <h4 class="text-center">Details of heirs</h4>
                        <div class="table-repsonsive">
                            <div id="heirs">


                                <!-- <span id="error"></span>
                                <table class="table table-bordered" style="width:70%;margin:0" id="item_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50%;">Item</th>
                                            <th style="width: 30%;">Quantity</th>
                                            <th style="width: 20%;"><button type="button" name="add" class="form-control add">Add</button></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table> -->

                                <!-- <div id="heir1">
                                    <div class="row">
                                        <div class="col10">
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="fname">Name</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="hname0" name="hname0" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="fname">NIC</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="hnic0" name="hnic0" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="fname">Relationship</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="hrelationship0" name="hrelationship0" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="bank">Bank</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="hbank0" name="hbank0" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="branch">Branch</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="hbranch0" name="hbranch0" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="nic" style="">Account Number</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="number" id="haccnum0" name="haccnum0" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                       

                                    </div>

                                </div> -->
                            </div>



                        </div>


                        <!-- <div class="row">
                                <div class="col3">
                                    <label for="upload">Upload certified photocopies</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Incident Report</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Death Certificate</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">NIC or ID Certification</label>
                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Heirs certification and their identity certification</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div> -->
                        <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

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
                        <div class="col6 row-content">
                            <h3>Approved Status (Divisional) : <span id="dsname"></span></h3>
                            <h4 style="text-align:left;padding-top:0;padding-left: 25px;"> <span id="dsremarks">* </span></h4>
                            <h3>Approved Status (DMC) : <span id="dmcname"></span></h3>
                            <h4 style="text-align:left;padding-top:0;padding-left: 25px;"> <span id="dmcremarks">* </span></h4>
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
                url: "<?php echo API; ?>gndeath/<?php echo end($array); ?>",
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

            $('#disaster').val(obj['disaster']);
            $('#disdate').val(obj['disasterdate']);
            $('#dname').val(obj['dname']);
            $('#ddate').val(obj['deathdate']);
            $('#dnic').val(obj['dnic']);
            $('#daddress').val(obj['daddress']);
            $('#doccupation').val(obj['doccupation']);
            $('#aname').val(obj['aname']);
            $('#anic').val(obj['anic']);
            $('#atpnumber').val(obj['atelno']);
            $('#relationship').val(obj['arelationship']);
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
                $('#dmcremarks').append(obj['disRemarks']);
            } else {
                $('#dmcremarks').text("");
            }
            obj = output['heir'];
            console.log(obj);
            $('#heirs-list').hide();
            if (obj !== null) {
                $('#heirs-list').show();
                for (var i = 0; i < obj.length; i++) {
                    
                    var html = '';
                    html += "<div id='heir1'><div class='row'><div class='col3'><label for='fname'>Name</label></div><div class='col9'><input type='text' id='hname" + i + "' name='hname" + i + "' readonly></div></div><div class='row'><div class='col3'><label for='fname'>NIC</label></div><div class='col9'><input type='text' id='hnic" + i + "' name='hnic" + i + "' readonly></div></div>";
                    html += " <div class='row'><div class='col3'><label for='fname'>Relationship</label></div> <div class='col9'><input type='text' id='hrelationship" + i + "' name='hrelationship" + i + "' placeholder='' readonly></div></div><div class='row'><div class='col3'><label for='bank'>Bank</label></div><div class='col9'><input type='text' id='hbank" + i + "' name='hbank" + i + "' readonly></div></div>";
                    html += "<div class='row'><div class='col3'><label for='branch'>Branch</label></div><div class='col9'><input type='text' id='hbranch" + i + "' name='hbranch" + i + "' readonly></div></div> <div class='row'><div class='col3'><label for='nic' style=''>Account Number</label></div><div class='col9'><input type='number' id='haccnum" + i + "' name='haccnum" + i + "' readonly></div></div>";
                    html += " <hr></div>";
                    $('#heirs').append(html);
                    $('#hname' + i).val(obj[i]['name']);
                    $('#hbank' + i).val(obj[i]['bank']);
                    $('#hbranch' + i).val(obj[i]['branch']);
                    $('#haccnum' + i).val(obj[i]['accno']);
                    $('#hnic' + i).val(obj[i]['nic']);
                    $('#hrelationship' + i).val(obj[i]['relationship']);
                    // $('#deev' + i).val(parseFloat(obj[i]['deev']));

                }
                
            }



            // $('#hpartial').val(obj['hpartial']);
            // $('#enterprises').val(obj['enterprise']);
            // $('#infra').val(obj['infras']);
            // $('#safenum').val(obj['numofsafe']);
            // $('#sfam').val(obj['sffamily']);
            // $('#speople').val(obj['sfpeople']);
            // $('#dry').val(obj['dryrationsRs']);
            // $('#cooked').val(obj['cookingRs']);
            // $('#emer').val(obj['emergencyRs']);
            // $('#remarks').val(obj['remarks']);
            // $('#gnname').text(obj['empName']);
            // $('#gntel').text(obj['empTele']);
            // $('#timestamp').text(obj['timestamp']);
            // if (obj['disoffapproved'] == 'p') {
            //     $('#dsname').text("Pending");
            // } else if (obj['disoffapproved'] == 'a') {
            //     $('#dsname').text("Approved");
            // } else {
            //     $('#dsname').text("Rejected");
            // }
            // if (obj['disRemarks'] != null) {
            //     $('#dsremarks').append(obj['disRemarks']);
            // } else {
            //     $('#dsremarks').text("");
            // }
        }
    </script>
</body>

</html>