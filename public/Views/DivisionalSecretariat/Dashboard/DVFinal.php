<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
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


    <?php
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php'); 
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
                    <h1 class="text-center">Divisional Final Incident Report</h1>
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
                            <div class="col6">
                                <div class="row">
                                    <div class="col6" style="text-align: right;">
                                        <label for="doc" style="margin-top:6px">Date of Commenced</label>
                                    </div>

                                    <div class="col6 row-content" style="align-items: center;padding-left: 8px;">
                                        <input type="date" id="disdate" name="disdate" class="datesInForms" readonly>
                                    </div>
                                </div>


                            </div>
                            <div class="col6">
                                <div class="row">
                                    <div class="col4" style="text-align: right;">
                                        <label for="doc" style="margin-top:6px">End Date</label>
                                    </div>

                                    <div class="col8 row-content" style="align-items: center;">
                                        <input type="date" id="enddate" name="enddate" class="datesInForms" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="gns">Grama Niladhari Divisions</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="gns" name="gns" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="cause">Cause</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="cause" name="disaster" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3" style="text-align: right;">
                                <label for="remarks">Remarks</label>
                            </div>
                            <div class="col9">
                                <textarea type="text" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                            </div>
                        </div>

                        <h3 class="text-center">Impact of Disaster</h3>

                        <div class="row" style="display:block;text-align: center;">
                            <div class="panel panel-primary filterable " style="text-align: center;padding: 0 40px;">
                                <table id="task-list-tbl" class="table">
                                    <thead>
                                        <tr>
                                            <th>GN Division</th>
                                            <th style="width:50px;">Families</th>
                                            <th style="width:50px;">People</th>
                                            <th style="width:50px;">Deaths</th>
                                            <th style="width:50px;">Hospitalized</th>
                                            <th style="width:50px;">Injured</th>
                                            <th style="width:50px;">Missing</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tbodyidimpact">

                                        <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                            <td>01/24/2021 12:50</td>
                                            <td>Initial</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <th>Total</th>
                                            <th><input id="fam" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="people" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="death" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="hos" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="inj" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="miss" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tab">
                        <h3 class="text-center">Safe House Usage</h3>

                        <div class="row" style="display:block;">
                            <div class="panel panel-primary filterable" style="text-align: center;padding: 0 40px;">
                                <table id="task-list-tbl" class="table">
                                    <thead>
                                        <tr>
                                            <th>GN Division</th>
                                            <th style="width:150px;">Number of Safehouses</th>
                                            <th style="width:150px;">Families</th>
                                            <th style="width:150px;">People</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbodysafehouse">
                                        <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                            <td>Total</td>
                                            <td>Initial</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <th>Total</th>
                                            <th><input id="safenum" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="sffam" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="sfpeople" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>



                    </div>
                    <div class="tab">
                        <h3 class="text-center">Damages</h3>

                        <div class="row" style="display:block;">
                            <div class="panel panel-primary filterable" style="text-align: center;padding: 0 40px;">
                                <table id="task-list-tbl" class="table">
                                    <thead>
                                        <tr>
                                            <th>GN Division</th>
                                            <th style="width:150px;">Fully Damaged Houses</th>
                                            <th style="width:150px;">Partially Damaged Houses</th>
                                            <th style="width:150px;">Enterprises</th>
                                            <th style="width:150px;">Infrastructure</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbodydamages">
                                        <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                            <td>01/24/2021 12:50</td>
                                            <td>Initial</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <th>Total</th>
                                            <th><input id="damhfull" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="damhpartial" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="damenter" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="daminfra" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>


                    </div>

                    <div class="tab">
                        <h3 class="text-center">Requested amount for Relief distribution
                        </h3>
                        <div class="row" style="display:block;">
                            <div class="panel panel-primary filterable" style="text-align: center;padding: 0 40px;">
                                <table id="task-list-tbl" class="table">
                                    <thead>
                                        <tr>
                                            <th>GN Division</th>
                                            <th style="width:150px;">Dry Rations</th>
                                            <th style="width:150px;">Cooked Food</th>
                                            <th style="width:150px;">Emergency Supplies</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbodyrelief">
                                        <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                            <td>01/24/2021 12:50</td>
                                            <td>Initial</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <th>Total</th>
                                            <th><input id="reldry" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="relcooked" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>
                                            <th><input id="relemer" class="tot inputs_in_table" readonly type="number" min="0" name="task"></th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>


                    </div>





                    <hr style="margin:10px;">


                    <div class="row" id="mystatus3">
                        <div class="col6 row-content">
                            <h4>Divisional Secretariat Status : <span id="dsname"></span></h4>
                        </div>
                        <div class="col6 row-content">
                            <h4>Remarks : <span id="dsremarks">* </span></h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="mystatus4">
                        <div class="col6 row-content">
                            <h4>DMC Status : <span id="dmcname"></span></h4>
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
        var thisPage = "#Incidents";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
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
            getFinal();
            $(document).on('click', '.btn_blue', function(e) {
                e.preventDefault();
                var x = $(this).data('app');
                var last = <?php echo $array[count($array) - 1]; ?>;
                console.log(x);
                var object = {};

                object['dmcremarks'] = $('#dmcremarksnew').val();
                object['dmcapproved'] = x;
                object['reportId'] = last;



                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "PUT",
                    url: "<?php echo API; ?>divsecfinalapprove",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        console.log(result);
                        var url = "<?php echo HOST; ?>/DMC/IncidentReporting";
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
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getFinal() {
            var output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incidentfinal/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var obj = output[0];

            $('#ds').val(getDVbyId(obj['dvId']));
            $('#district').val(districtbydvid(obj['dvId']));



            // if(obj['disaster'])
            // $('#dis').val(obj['disaster']);

            $('#disaster').val(obj['disaster']);
            $('#disdate').val(obj['startDate']);
            $('#enddate').val(obj['endDate']);
            $('#cause').val(obj['cause']);
            $('#remarks').val(obj['remarks']);
            obj = obj['impact'];
            $("#tbodyidimpact").empty();
            var table = document.getElementById("tbodyidimpact");
            let fam = 0;
            let people = 0;
            let death = 0;
            let hos = 0;
            let inj = 0;
            let miss = 0;
            for (var i = 0; i < obj.length; i++) {
                let imp = obj[i];
                console.log(imp);
                $('#gns').val($('#gns').val() + " " + getgnbyid(imp['gndvId']));
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                let cell6 = row.insertCell(-1);
                let cell7 = row.insertCell(-1);
                cell1.innerHTML = getgnbyid(imp['gndvId'])
                cell2.innerHTML = imp['afam'];
                cell3.innerHTML = imp['apeople'];
                cell4.innerHTML = imp['deaths'];
                cell5.innerHTML = imp['hos'];
                cell6.innerHTML = imp['injured'];
                cell7.innerHTML = imp['missing'];
                fam += parseFloat(imp['afam']);
                people += parseFloat(imp['apeople']);
                death += parseFloat(imp['deaths']);
                hos += parseFloat(imp['hos']);
                inj += parseFloat(imp['injured']);
                miss += parseFloat(imp['missing']);
            }
            $('#fam').val(fam);
            $('#people').val(people);
            $('#death').val(death);
            $('#hos').val(hos);
            $('#inj').val(inj);
            $('#miss').val(miss);
            console.log(output[0]);
            obj = output[0]['safehouse'];
            $("#tbodysafehouse").empty();
            var table = document.getElementById("tbodysafehouse");
            let safenum = 0;
            let sffam = 0;
            let sfpeople = 0;

            for (var i = 0; i < obj.length; i++) {
                let imp = obj[i];
                console.log(imp);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                cell1.innerHTML = getgnbyid(imp['gndvId'])
                cell2.innerHTML = imp['numofsafe'];
                cell3.innerHTML = imp['sffamily'];
                cell4.innerHTML = imp['sfpeople'];
                safenum += parseFloat(imp['numofsafe']);
                sffam += parseFloat(imp['sffamily']);
                sfpeople += parseFloat(imp['sfpeople']);
            }
            $('#safenum').val(safenum);
            $('#sffam').val(sffam);
            $('#sfpeople').val(sfpeople);


            obj = output[0]['damage'];
            $("#tbodydamages").empty();
            var table = document.getElementById("tbodydamages");
            let damhfull = 0;
            let damhpartial = 0;
            let damenter = 0;
            let daminfra = 0;

            for (var i = 0; i < obj.length; i++) {
                let imp = obj[i];
                console.log(imp);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                cell1.innerHTML = getgnbyid(imp['gndvId'])
                cell2.innerHTML = imp['hf'];
                cell3.innerHTML = imp['he'];
                cell4.innerHTML = imp['ent'];
                cell5.innerHTML = imp['infra'];
                damhfull += parseFloat(imp['hf']);
                damhpartial += parseFloat(imp['he']);
                damenter += parseFloat(imp['ent']);
                daminfra += parseFloat(imp['infra']);
            }
            $('#damhfull').val(damhfull);
            $('#damhpartial').val(damhpartial);
            $('#damenter').val(damenter);
            $('#daminfra').val(daminfra);


            obj = output[0]['relief'];
            $("#tbodyrelief").empty();
            var table = document.getElementById("tbodyrelief");
            let reldry = 0;
            let relcooked = 0;
            let relemer = 0;


            for (var i = 0; i < obj.length; i++) {
                let imp = obj[i];
                console.log(imp);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);

                cell1.innerHTML = getgnbyid(imp['gndvId'])
                cell2.innerHTML = imp['dry'];
                cell3.innerHTML = imp['cook'];
                cell4.innerHTML = imp['emer'];

                reldry += parseFloat(imp['dry']);
                relcooked += parseFloat(imp['cook']);
                relemer += parseFloat(imp['emer']);

            }
            $('#reldry').val(reldry);
            $('#relcooked').val(relcooked);
            $('#relemer').val(relemer);


            // if (obj['disapproved'] == 'p') {
            //     $('#mystatus3').hide();
            //     $('#mystatus4').hide();
            //     $('#mystatus').hide();
            // } else {
            //     $('#mystatus2').hide();
            //     $('#doremarks').append(obj['dvremarks']);
            //     if (obj['dvapproved'] == 'a') {
            //         $('#dostatus').text("Approved");
            //     } else if (obj['dvapproved'] == 'r') {
            //         $('#dostatus').text("Rejected");
            //     }
            // }
            // if (obj['dvapproved'] == 'a' && obj['disapproved'] == 'p') {
            //     $('#mystatus2').hide();
            //     $('#dsname').text("Pending");
            //     $('#dsremarks').append("Pending");
            //     $('#mystatus4').hide();
            //     // $('#mystatus').hide();
            // } else if (obj['dvapproved'] == 'a' && (obj['disapproved'] == 'r' || obj['disapproved'] == 'a')) {

            //     $('#mystatus2').hide();
            //     $('#dsremarks').append(obj['disremarks']);
            //     if (obj['disapproved'] == 'a') {
            //         $('#dsname').text("Approved");
            //     } else if (obj['disapproved'] == 'r') {
            //         $('#dsname').text("Rejected");
            //         $('#mystatus4').hide();
            //     }

            // }
            if (output[0]['disapproved'] == 'a' && output[0]['dmcapproved'] == 'p') {
                $('#mystatus4').hide();
                $('#dsname').text("Approved");
                $('#dmcremarks').append(output[0]['dmcremarks']);
                // $('#mystatus').hide();
            } else if (output[0]['disapproved'] == 'a' && (output[0]['dmcapproved'] == 'r' || output[0]['dmcapproved'] == 'a')) {
                // $('#dmcname').text(obj['dsname']);
                $('#mystatus2').hide();
                $('#dmcremarks').append(output[0]['dmcremarks']);
                if (output[0]['dmcapproved'] == 'a') {
                    $('#dmcname').text("Approved");

                } else if (output[0]['dmcapproved'] == 'r') {
                    $('#dmcname').text("Rejected");
                }
            }






        }


        function getDVbyId(i) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>divisionbyid/" + i,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            return output['dvName'];
        }

        function districtbydvid(i) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>districtbydvid/" + i,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            return output['dsName'];
        }

        function getgnbyid(i) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>getgnbyid/" + i,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            return output['gnDvName'];
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