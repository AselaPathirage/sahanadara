<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
// exit;
?>

<head>
    <meta charset="UTF-8">
    <title>Disaster Officer</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .tab {
            display: none;
        }

        button {
            margin-top: 15px;
            margin-left: 20px;

            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }


        #prevBtn {
            background-color: #bbbbbb;
        }

        .inputs_in_table {
            width: 50px;
            padding: 5px 10px;
            type: number;

        }
    </style>
</head>

<body>
    <?php
    include_once('./public/Views/DisasterOfficer/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DisasterOfficer/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div id="alertBox">
        </div>
        <div class="container col10">
            <form id="add">
                <div class="box">
                    <div class="box1">
                        <h1 class="text-center">Divisional Final Incident Report</h1>

                        <div class="tab">
                            <div class="row">
                                <div class="col3">
                                    <label for="crusttype">Date of commenced</label>
                                </div>
                                <div class="col9 row-content" style="align-items: center;">
                                    <input type="date" id="datePicker1" name="datePicker1" class="datesInForms">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="crusttype">End date</label>
                                </div>
                                <div class="col9 row-content" style="align-items: center;">
                                    <input type="date" id="datePicker2" name="datePicker2" class="datesInForms">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">Disaster</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="disaster" name="disaster" placeholder="Disaster" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">GN Divisions</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="gns" name="gns" placeholder="GN divisions" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">Cause</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="cause" name="cause" placeholder="Cause" required>
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
                        </div>
                        <div class="tab">
                            <h3 class="text-center">Impact of Disaster</h3>

                            <div class="row" style="display:block;">
                                <div class="panel panel-primary filterable">
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
                            <h4 class="text-center">Safe House Usage</h4>

                            <div class="row" style="display:block;">
                                <div class="panel panel-primary filterable">
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
                            <h4 class="text-center">Damages</h4>

                            <div class="row" style="display:block;">
                                <div class="panel panel-primary filterable">
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
                            <h4 class="text-center">Requested amount for relief distribution
                            </h4>
                            <div class="row" style="display:block;">
                                <div class="panel panel-primary filterable">
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


                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="nextBtn" onclick="nextPrev(1)" style="background-color:lightblue">Next</button>
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>



    </section>
    <script>
        var thisPage = "#incidents";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            document.getElementById('datePicker1').valueAsDate = new Date();
            document.getElementById('datePicker2').valueAsDate = new Date();


            getFinalDetails();

            $(".fam").each(function() {
                $('.fam').on('input', this, function() {
                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".fam").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#fam").val(sum);
                    });
                });
            });
            $(".people").each(function() {
                $('.people').on('input', this, function() {
                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".people").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#people").val(sum);
                    });
                });
            });
            $(".death").each(function() {
                $('.death').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".death").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#death").val(sum);
                    });
                });
            });
            $(".hos").each(function() {
                $('.hos').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".hos").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#hos").val(sum);
                    });
                });
            });
            $(".inj").each(function() {
                $('.inj').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".inj").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#inj").val(sum);
                    });
                });
            });
            $(".miss").each(function() {
                $('.miss').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".miss").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#miss").val(sum);
                    });
                });
            });
            $(".safenum").each(function() {
                $('.safenum').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".safenum").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#safenum").val(sum);
                    });
                });
            });
            $(".sffam").each(function() {
                $('.sffam').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".sffam").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#sffam").val(sum);
                    });
                });
            });
            $(".sfpeople").each(function() {
                $('.sfpeople').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".sfpeople").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#sfpeople").val(sum);
                    });
                });
            });
            $(".damhfull").each(function() {
                $('.damhfull').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".damhfull").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#damhfull").val(sum);
                    });
                });
            });
            $(".damhpartial").each(function() {
                $('.damhpartial').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".damhpartial").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#damhpartial").val(sum);
                    });
                });
            });
            $(".damenter").each(function() {
                $('.damenter').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".damenter").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#damenter").val(sum);
                    });
                });
            });
            $(".daminfra").each(function() {
                $('.daminfra').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".daminfra").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#daminfra").val(sum);
                    });
                });
            });
            $(".reldry").each(function() {
                $('.reldry').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".reldry").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#reldry").val(sum);
                    });
                });
            });
            $(".relcooked").each(function() {
                $('.relcooked').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".relcooked").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#relcooked").val(sum);
                    });
                });
            });
            $(".relemer").each(function() {
                $('.relemer').on('input', this, function() {

                    let sum = 0;
                    // $sum += parseFloat($(this).val());
                    $(".relemer").each(function() {
                        if ($(this).val() != NaN) {
                            sum += parseFloat($(this).val());
                        } else {
                            sum += 0;
                        }
                        $("#relemer").val(sum);
                    });
                });
            });


        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getFinalDetails() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>countdvfinal/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#tbodyidimpact").empty();
            var table = document.getElementById("tbodyidimpact");
            $("#tbodysafehouse").empty();
            var table2 = document.getElementById("tbodysafehouse");
            $("#tbodydamages").empty();
            var table3 = document.getElementById("tbodydamages");
            $("#tbodyrelief").empty();
            var table4 = document.getElementById("tbodyrelief");

            var sumfam = 0;
            var sumpeople = 0;
            var sumdeath = 0;
            var sumhos = 0;
            var suminj = 0;
            var summiss = 0;

            var sumsafenum = 0;
            var sumsffam = 0;
            var sumsfpeople = 0;

            var sumdamhfull = 0;
            var sumdamhpartial = 0;
            var sumdamenter = 0;
            var sumdaminfra = 0;

            var sumreldry = 0;
            var sumrelcooked = 0;
            var sumrelemer = 0;


            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                // console.log(obj);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                let cell6 = row.insertCell(-1);
                let cell7 = row.insertCell(-1);
                cell1.innerHTML = obj['gnDvName'];

                var attribute = document.createElement("input");
                attribute.id = "fam" + i;
                attribute.className = "inputs_in_table fam";
                attribute.name = "imfam" + i;
                attribute.value = obj['fam'];
                sumfam += parseFloat(attribute.value);
                attribute.setAttribute("data-gnid", obj['gndvid']);
                attribute.setAttribute("type", "number");
                attribute.setAttribute("min", 0);
                cell2.appendChild(attribute);
                var attribute1 = document.createElement("input");
                attribute1.id = "people" + i;
                attribute1.className = "inputs_in_table people";
                attribute1.name = "impeople" + i;
                attribute1.value = obj['people'];
                sumpeople += parseFloat(attribute1.value);
                attribute1.setAttribute("data-gnid", obj['gndvid']);
                attribute1.setAttribute("type", "number");
                attribute1.setAttribute("min", 0);
                cell3.appendChild(attribute1);
                var attribute2 = document.createElement("input");
                attribute2.id = "death" + i;
                attribute2.className = "inputs_in_table death";
                attribute2.name = "imdeath" + i;
                attribute2.value = obj['death'];
                sumdeath += parseFloat(attribute2.value);
                attribute2.setAttribute("data-gnid", obj['gndvid']);
                attribute2.setAttribute("type", "number");
                attribute2.setAttribute("min", 0);
                cell4.appendChild(attribute2);
                var attribute3 = document.createElement("input");
                attribute3.id = "hos" + i;
                attribute3.className = "inputs_in_table hos";
                attribute3.name = "imhos" + i;
                attribute3.value = obj['hospitalized'];
                sumhos += parseFloat(attribute3.value);
                attribute3.setAttribute("data-gnid", obj['gndvid']);
                attribute3.setAttribute("type", "number");
                attribute3.setAttribute("min", 0);
                cell5.appendChild(attribute3);
                var attribute4 = document.createElement("input");
                attribute4.id = "inj" + i;
                attribute4.className = "inputs_in_table inj";
                attribute4.name = "iminj" + i;
                attribute4.value = obj['injured'];
                suminj += parseFloat(attribute4.value);
                attribute4.setAttribute("data-gnid", obj['gndvid']);
                attribute4.setAttribute("type", "number");
                attribute4.setAttribute("min", 0);
                cell6.appendChild(attribute4);
                var attribute6 = document.createElement("input");
                attribute6.id = "miss" + i;
                attribute6.className = "inputs_in_table miss";
                attribute6.name = "immiss" + i;
                attribute6.value = obj['missing'];
                summiss += parseFloat(attribute6.value);
                attribute6.setAttribute("data-gnid", obj['gndvid']);
                attribute6.setAttribute("type", "number");
                attribute6.setAttribute("min", 0);
                cell7.appendChild(attribute6);


                // Safehouse usage
                let row2 = table2.insertRow(-1);
                let cell8 = row2.insertCell(-1);
                let cell9 = row2.insertCell(-1);
                let cell10 = row2.insertCell(-1);
                let cell11 = row2.insertCell(-1);

                cell8.innerHTML = obj['gnDvName'];

                var attribute9 = document.createElement("input");
                attribute9.id = "safenum" + i;
                attribute9.className = "inputs_in_table safenum";
                attribute9.name = "sfnum" + i;
                attribute9.value = obj['numofsafe'];
                sumsafenum += parseFloat(attribute9.value);
                attribute9.setAttribute("data-gnid", obj['gndvid']);
                attribute9.setAttribute("type", "number");
                attribute9.setAttribute("min", 0);
                cell9.appendChild(attribute9);
                var attribute10 = document.createElement("input");
                attribute10.id = "sffam" + i;
                attribute10.className = "inputs_in_table sffam";
                attribute10.name = "sffam" + i;
                attribute10.value = obj['sffamily'];
                sumsffam += parseFloat(attribute10.value);
                attribute10.setAttribute("data-gnid", obj['gndvid']);
                attribute10.setAttribute("type", "number");
                attribute10.setAttribute("min", 0);
                cell10.appendChild(attribute10);
                var attribute11 = document.createElement("input");
                attribute11.id = "sfpeople" + i;
                attribute11.className = "inputs_in_table sfpeople";
                attribute11.name = "sfpeople" + i;
                attribute11.value = obj['sfpeople'];
                sumsfpeople += parseFloat(attribute11.value);
                attribute11.setAttribute("data-gnid", obj['gndvid']);
                attribute11.setAttribute("type", "number");
                attribute11.setAttribute("min", 0);
                cell11.appendChild(attribute11);


                // Damages
                let row3 = table3.insertRow(-1);
                let cell12 = row3.insertCell(-1);
                let cell13 = row3.insertCell(-1);
                let cell14 = row3.insertCell(-1);
                let cell15 = row3.insertCell(-1);
                let cell16 = row3.insertCell(-1);

                cell12.innerHTML = obj['gnDvName'];

                var attribute13 = document.createElement("input");
                attribute13.id = "damhfull" + i;
                attribute13.className = "inputs_in_table damhfull";
                attribute13.name = "damhfull" + i;
                attribute13.value = obj['hfull'];
                sumdamhfull += parseFloat(attribute13.value);
                attribute13.setAttribute("data-gnid", obj['gndvid']);
                attribute13.setAttribute("type", "number");
                attribute13.setAttribute("min", 0);
                cell13.appendChild(attribute13);
                var attribute14 = document.createElement("input");
                attribute14.id = "damhpartial" + i;
                attribute14.className = "inputs_in_table damhpartial";
                attribute14.name = "damhpartial" + i;
                attribute14.value = obj['hpartial'];
                sumdamhpartial += parseFloat(attribute14.value);
                attribute14.setAttribute("data-gnid", obj['gndvid']);
                attribute14.setAttribute("type", "number");
                attribute14.setAttribute("min", 0);
                cell14.appendChild(attribute14);
                var attribute15 = document.createElement("input");
                attribute15.id = "damenter" + i;
                attribute15.className = "inputs_in_table damenter";
                attribute15.name = "damenter" + i;
                attribute15.value = obj['enterprise'];
                sumdamenter += parseFloat(attribute15.value);
                attribute15.setAttribute("data-gnid", obj['gndvid']);
                attribute15.setAttribute("type", "number");
                attribute15.setAttribute("min", 0);
                cell15.appendChild(attribute15);
                var attribute16 = document.createElement("input");
                attribute16.id = "daminfra" + i;
                attribute16.className = "inputs_in_table daminfra";
                attribute16.name = "daminfra" + i;
                attribute16.value = obj['infras'];
                sumdaminfra += parseFloat(attribute16.value);
                attribute16.setAttribute("data-gnid", obj['gndvid']);
                attribute16.setAttribute("type", "number");
                attribute16.setAttribute("min", 0);
                cell16.appendChild(attribute16);


                // relief
                let row4 = table4.insertRow(-1);
                let cell17 = row4.insertCell(-1);
                let cell18 = row4.insertCell(-1);
                let cell19 = row4.insertCell(-1);
                let cell20 = row4.insertCell(-1);

                cell17.innerHTML = obj['gnDvName'];

                var attribute18 = document.createElement("input");
                attribute18.id = "reldry" + i;
                attribute18.className = "inputs_in_table reldry";
                attribute18.name = "reldry" + i;
                attribute18.value = obj['dryrationsRs'];
                sumreldry += parseFloat(attribute18.value);
                attribute18.setAttribute("data-gnid", obj['gndvid']);
                attribute18.setAttribute("type", "number");
                attribute18.setAttribute("min", 0);
                cell18.appendChild(attribute18);
                var attribute19 = document.createElement("input");
                attribute19.id = "relcooked" + i;
                attribute19.className = "inputs_in_table relcooked";
                attribute19.name = "relcooked" + i;
                attribute19.value = obj['cookingRs'];
                sumrelcooked += parseFloat(attribute19.value);
                attribute19.setAttribute("data-gnid", obj['gndvid']);
                attribute19.setAttribute("type", "number");
                attribute19.setAttribute("min", 0);
                cell19.appendChild(attribute19);
                var attribute20 = document.createElement("input");
                attribute20.id = "relemer" + i;
                attribute20.className = "inputs_in_table relemer";
                attribute20.name = "relemer" + i;
                attribute20.value = obj['emergencyRs'];
                sumrelemer += parseFloat(attribute20.value);
                attribute20.setAttribute("data-gnid", obj['gndvid']);
                attribute20.setAttribute("type", "number");
                attribute20.setAttribute("min", 0);
                cell20.appendChild(attribute20);

            }
            $("#relemer").val(sumrelemer);
            $("#relcooked").val(sumrelcooked);
            $("#reldry").val(sumreldry);
            $("#damhfull").val(sumdamhfull);
            $("#damhpartial").val(sumdamhpartial);
            $("#damenter").val(sumdamenter);
            $("#daminfra").val(sumdaminfra);
            $("#safenum").val(sumsafenum);
            $("#sffam").val(sumsffam);
            $("#sfpeople").val(sumsfpeople);
            $("#fam").val(sumfam);
            $("#people").val(sumpeople);
            $("#death").val(sumdeath);
            $("#hos").val(sumhos);
            $("#inj").val(suminj);
            $("#miss").val(summiss);


        }

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            // fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:

            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                event.preventDefault();
                console.log("asdasdasdasdtarget");
                var formElement = document.querySelector("form");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key) {
                    // if (key.includes("h")) {
                    if (key.startsWith('h')) {
                        return;
                    }
                    object[key] = value;
                });
                // let e = document.getElementById("safeHouseId");
                // let safeHouseId = e.value;
                // object['safeHouseId'] = safeHouseId;
                object['heir'] = new Object();
                count = 0
                $('#heirs #heir1').each(function() {
                    // console.log("w");
                    var hname = $(this).find("input[id^='hname']").val();
                    var hnic = $(this).find("input[id^='hnic']").val();
                    var hrelationship = $(this).find("input[id^='hrelationship']").val();
                    var hbranch = $(this).find("input[id^='hbranch']").val();
                    var haccnum = $(this).find("input[id^='haccnum']").val();
                    var hbank = $(this).find("input[id^='hbank']").val();
                    // var words = item.split(" ");
                    // for (let i = 0; i < words.length; i++) {
                    //     words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                    // }
                    // words = words.join(" ");
                    // var quantity = $(this).find("td:nth-child(2)").find("input").val();
                    // object['item'][words] = quantity;
                    var h = {};
                    h['hname'] = hname;
                    h['hnic'] = hnic;
                    h['hrelationship'] = hrelationship;
                    h['hbranch'] = hbranch;
                    h['haccnum'] = haccnum;
                    h['hbank'] = hbank;
                    object['heir'][count++] = h;

                });
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "POST",
                    url: "<?php echo API; ?>deathcomp",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        var url = "<?php echo HOST; ?>/GramaNiladari/Compensation";
                        if (result.code == 806) {
                            $("#regForm").trigger('reset');
                            alertGen("Record Added Successfully!", 1);
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                        setTimeout(function() {
                            $(location).attr('href', url);
                        }, 1000);
                        console.log(result);
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
                        console.log(err);
                    }
                });
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
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