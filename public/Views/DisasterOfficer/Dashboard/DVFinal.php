<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
// exit;
?>

<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard</title>
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
                                        <input type="date" id="disdate" name="disdate" class="datesInForms" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="gns">Grama Niladhari Divisions</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="gns" name="disaster" placeholder="" readonly>
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
                <!-- <div id="mystatus2">

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
                </div> -->
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
                    url: "<?php echo API; ?>docompapprove",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        console.log(result);
                        var url = "<?php echo HOST; ?>/DisasterOfficer/Dashboard/Compensation";
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
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>dodeath/<?php echo end($array); ?>",
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

            $('#gnname').text(obj['gnname']);

            if (obj['dvapproved'] == 'p') {
                $('#mystatus3').hide();
                $('#mystatus4').hide();
                $('#mystatus').hide();
            } else {
                $('#mystatus2').hide();
                $('#doremarks').append(obj['dvremarks']);
                if (obj['dvapproved'] == 'a') {
                    $('#dostatus').text("Approved");
                } else if (obj['dvapproved'] == 'r') {
                    $('#dostatus').text("Rejected");
                }
            }
            if (obj['dvapproved'] == 'a' && obj['disapproved'] == 'p') {
                $('#mystatus2').hide();
                $('#dsname').text("Pending");
                $('#dsremarks').append("Pending");
                $('#mystatus4').hide();
                // $('#mystatus').hide();
            } else if (obj['dvapproved'] == 'a' && (obj['disapproved'] == 'r' || obj['disapproved'] == 'a')) {

                $('#mystatus2').hide();
                $('#dsremarks').append(obj['disremarks']);
                if (obj['disapproved'] == 'a') {
                    $('#dsname').text("Approved");
                } else if (obj['disapproved'] == 'r') {
                    $('#dsname').text("Rejected");
                    $('#mystatus4').hide();
                }

            }
            if (obj['dvapproved'] == 'a' && obj['disapproved'] == 'a' && obj['dmcapproved'] == 'p') {
                $('#mystatus2').hide();
                $('#dmcname').text("Pending");
                $('#dmcremarks').append("Pending");
                // $('#mystatus').hide();
            } else if (obj['dvapproved'] == 'a' && obj['disapproved'] == 'a' && (obj['dmcapproved'] == 'r' || obj['dmcapproved'] == 'a')) {
                // $('#dmcname').text(obj['dsname']);
                $('#mystatus2').hide();
                $('#dmcremarks').append(obj['dmcremarks']);
                if (obj['dmcapproved'] == 'a') {
                    $('#dmcname').text("Approved - ");
                    if (obj['collected'] == '1') {
                        $('#dmcname').append("Collected");
                    } else {
                        $('#dmcname').append("Not Collected");
                    }
                } else if (obj['dmcapproved'] == 'r') {
                    $('#dmcname').text("Rejected");
                }
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