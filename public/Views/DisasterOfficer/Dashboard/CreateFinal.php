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
                        <!-- <div class="row">
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Kalutara</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Kaluthara</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">DS Office</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Kalutara</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Kaluthara</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">

                        <div class="row">
                            <div class="col3">
                                <label for="user role">GN division</label>
                            </div>
                            <div class="col9">
                                <select id="District" name="District">
                                    <option value="null">Kalutara</option>
                                    <option value="Gampaha">Gampaha</option>
                                    <option value="Colombo">Colombo</option>
                                    <option value="Kaluthara">Kaluthara</option>
                                </select>
                            </div>
                        </div>


                    </div> -->



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
                        <h4 class="text-center">Reporting on the Impact of Disaster</h4>

                        <div class="row" style="display:block;">
                            <div class="panel panel-primary filterable">
                                <table id="task-list-tbl" class="table">
                                    <thead>
                                        <tr>
                                            <th>GN Division</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>GN</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Incident</th>
                                            <th><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></th>


                                        </tr>
                                    </thead>

                                    <tbody id="tbodyid">

                                        <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                            <td>01/24/2021 12:50</td>
                                            <td>Initial</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                        </tr>

                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <td>03/14/2021 13:56</td>
                                            <td>Relief</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                        </tr>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <td>03/20/2021 13:56</td>
                                            <td>Relief</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                        </tr>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <td>03/21/2021 13:56</td>
                                            <td>Relief</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                        </tr>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <td>03/25/2021 13:56</td>
                                            <td>Relief</td>
                                            <td>Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                        </tr>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <td>03/28/2021 13:56</td>
                                            <td>Final</td>
                                            <td>Not Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                            <td>Total</td>
                                            <td>Final</td>
                                            <td>Not Approved</td>
                                            <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                        </tr>

                                    </tfoot>
                                </table>
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
                                        <input type="number" id="hfull" name="hfull" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col4" style="text-align: right;">
                                        <label for="TP number">Partially</label>
                                    </div>
                                    <div class="col8">
                                        <input type="number" id="hpartial" name="hpartial" placeholder="0">
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
                                        <input type="number" id="enterprises" name="enterprises" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col4" style="text-align: right;">
                                        <label for="TP number">Infrastructure
                                        </label>
                                    </div>
                                    <div class="col8">
                                        <input type="number" id="infra" name="infra" placeholder="0">
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
                                    <input type="number" id="safenum" name="safenum" placeholder="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Families</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="sfam" name="sfam" placeholder="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">People</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="speople" name="speople" placeholder="0">
                                </div>
                            </div>

                        </div>

                        <h4 class="text-center">Requested amount for relief distribution (Indicate amount in relevant place - Rs)
                        </h4>

                        <div class="row">
                            <div class="col6">
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">Dry rations</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="dry" name="dry" placeholder="Rs 0">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">Cooked food</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="cooked" name="cooked" placeholder="Rs 0">
                                    </div>
                                </div>

                            </div>
                            <div class="col6">
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">Emergency suppliess</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="emer" name="emer" placeholder="Rs 0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="row">
                                <div class="col3" style="text-align: right;">
                                    <label for="remarks">Remarks</label>
                                </div>
                                <div class="col9">
                                    <textarea type="text" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row " style="text-align:right;justify-content: right;">
                            <input type="reset" style="background-color: red;" value="Cancel">
                            <input type="submit" style="background-color: darkblue;" value="Submit">
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

            getDisasterType();
            getFinalDetails();
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getFinalDetails() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>countfinal/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var obj = output[0];
            console.log(obj);

            var tot = (900 * obj['sumf1']) + (1200 * obj['sumf2']) + (1400 * obj['sumf3']) + (1600 * obj['sumf4']) + (1800 * obj['sumf5']);

            $('#dry').val(tot);
            $('#cooked').val(obj['sumcooked']);
            $('#emer').val(obj['sumemer']);


        }

        function getDisasterType() {
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
            console.log("1");
            var select = document.getElementById("disaster");
            for (var i = 0; i < output.length; i++) {
                if (output[i]['disId'] == 3) continue;
                var opt = document.createElement('option');
                opt.value = output[i]['disId'];
                opt.innerHTML = output[i]['dis'];
                select.appendChild(opt);
            }
        }

        $('#disaster').on('change', function() {

            if ($('#disaster').val() == 3) {
                $('#safe').hide();
                $('#missingrow').hide();
            } else {
                $('#safe').show();
                $('#missingrow').show();
            }
        });

        $("#add").submit(function(e) {
            e.preventDefault();

            var str = [];
            var formElement = document.querySelector("#add");
            var formData = new FormData(formElement);
            //var array = {'key':'ABCD'}
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
            });
            object['incidentId'] = <?php echo end($array); ?>;
            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "POST",
                url: "<?php echo API; ?>gnfinal",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    var url = "<?php echo HOST; ?>/GramaNiladari/IncidentReporting";
                    console.log(result.code);
                    if (result.code == 806) {
                        alertGen("Record Added Successfully!", 1);
                    } else {
                        alertGen(" Unable to handle request.", 2);
                    }
                    setTimeout(function() {
                        $(location).attr('href', url);
                    }, 1000);
                },
                error: function(err) {
                    alertGen(" Something went wrong.", 3);
                    console.log(err);
                }
            });
        });

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