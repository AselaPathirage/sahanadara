<!DOCTYPE html>
<html lang="en" dir="ltr">


<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
?>

<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_disofficer.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchselect.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        /* .switch-container {
            display: inline-block;
            margin: 10px 10px;
        } */

        /*** iOS Style ***/
        input.ios {
            max-height: 0;
            max-width: 0;
            opacity: 0;
            position: absolute;
            left: -9999px;
            pointer-event: none;
        }

        input.ios+label {
            display: block;
            position: relative;
            box-shadow: inset 0 0 0px 1px #a6a6a6;
            text-indent: -5000px;
            height: 30px;
            width: 50px;
            border-radius: 15px;
        }

        input.ios+label:before {
            content: "";
            position: absolute;
            display: block;
            height: 30px;
            width: 30px;
            top: 0;
            left: 0;
            border-radius: 15px;
            background: transparent;
            -moz-transition: 0.2s ease-in-out;
            -webkit-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
        }

        input.ios+label:after {
            content: "";
            position: absolute;
            display: block;
            height: 30px;
            width: 30px;
            top: 0;
            left: 0px;
            border-radius: 15px;
            background: white;
            box-shadow: inset 0px 0px 0px 1px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.2);
            -moz-transition: 0.2s ease-in-out;
            -webkit-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
        }

        input.ios:checked+label:before {
            width: 50px;
            background: #13bf11;
        }

        input.ios:checked+label:after {
            left: 20px;
            box-shadow: inset 0 0 0 1px #13bf11, 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .spangns {
            border: 1.5px solid;
            padding: 2px;
            border-radius: 5px;
            background-color: #e4e4e4;
            font-weight: 400;

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
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
            <h1>Incident Reporting</h1>
            <a class='btn_active' style='position: absolute; top:120px;right:90px;' id="btn_active">Status : Active</a>
            <div class='button-row-container' style='position: absolute; top:103px;right:30px;'>
                <div class='switch-container switch-ios'><input type='checkbox' name='ios2' id='ios2' class='ios' data-incid='' /><label for='ios2'></label></div>
            </div>
            <h2 style="margin:0;padding:0 15px!important;" id="incidentTitle">sadf</h2>
            <h4 style="padding-top:0!important;padding-left:15px;" id="incidentDes">sdfasdf</h4>
            <h4 style="padding-top:0!important;padding-left:15px;" id="gns"><span class="spangns">Gns<span></h4>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a href="<?php echo HOST; ?>/DisasterOfficer/Dashboard/CreateFinal/<?php echo end($array); ?>" class="btn_blue">Create Final Report</a>


                </div>
            </div>
            <div class="custom-model-main addform">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form action="#" id='add' name="add" method="POST" >
                                <h1>Select Incident</h1>

                                <div class="row-content">
                                    <input type="hidden" id="rid" value="" name="rid">
                                    <input type="hidden" id="rtype" value="" name="rtype">
                                    <input type="hidden" id="rinc" value="" name="rinc">

                                    <label for="gndivision">Incident</label>
                                    <!-- <select id="gndivision" name="gndivision" required="true">
                                                <option>Select a Grama Niladhari Division</option>
                                            </select> -->
                                    <select id="gndivision" name="incident" data-multi-select-plugin>

                                        <!-- <option value="Mercedes" selected>Mercedes</option>
                                                <option value="Hilux">Hilux</option>
                                                <option value="Corsa">Corsa</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Ferrari">Ferrari</option> -->
                                    </select>

                                    <div class="row " style="text-align:right;justify-content: right;">
                                        <input type="submit" class="btn-alerts" value="Submit">
                                        <input type="reset" class="btn-alerts" value="Cancel">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-overlay"></div>
            </div>

            <!-- TABLE -->
            <div class="container">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Approved
                                    <select id="status" class="form-control">
                                        <option value="Any">All</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Rejected</option>

                                    </select>
                                </th>
                                <th>Type
                                    <select id="type" class="form-control">
                                        <option value="Any">All</option>
                                        <option value="1">Initial</option>
                                        <option value="2">Relief</option>
                                        <option value="3">Final</option>

                                    </select>
                                </th>

                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table>


                    <div class="panel panel-primary filterable">
                        <table id="task-list-tbl" class="table">
                            <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>GN</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Incident</th>

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
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/searchselect.js"></script>

    <script>
        var thisPage = "#Incidents";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            // getIncidents();
            getIncidentById();
            getReportsbyIncident();
            getGNsOnIncident();
            getIncidents();
            $(".incidentchange").on('click', function() {
                var rid = $(this).attr("data-id");
                var rtype = $(this).attr("data-type");
                var inc = $(this).attr("data-inc");


                $(".addform").fadeIn();
                $("#add").trigger("reset");
                $(".addform").addClass('model-open');


                $("#rinc").val(inc);
                $("#rtype").val(rtype);
                $("#rid").val(rid);

            });
            $("input[type='checkbox']").change(function(e) {
                console.log((this).id);
                e.preventDefault();
                var object = {};

                if (this.checked) {
                    object['isActive'] = 1;
                } else {
                    object['isActive'] = 0;
                }
                // var id = $(this).data("incid");
                object['incidentId'] = "<?php echo end($array); ?>";
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "PUT",
                    url: "<?php echo API; ?>incidentstatus",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        getIncidentById();

                        // location.reload();
                        if (result.code == 806) {
                            // alertGen("Record Updated Successfully!", 1);
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
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
        $("input[type='checkbox']").change(function(e) {
            console.log((this).id);
            e.preventDefault();
            var object = {};

            if (this.checked) {
                object['isActive'] = 1;
            } else {
                object['isActive'] = 0;
            }
            var id = $(this).data("incid");
            object['incidentId'] = id;
            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "PUT",
                url: "<?php echo API; ?>incidentstatus",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {


                    location.reload();
                    if (result.code == 806) {
                        // alertGen("Record Updated Successfully!", 1);
                    } else {
                        alertGen("Unable to handle request.", 2);
                    }
                },
                error: function(err) {
                    alertGen("Something went wrong.", 3);
                    console.log(err);
                }
            });
        });



        function getIncidentById() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incident/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            let obj = output[0];
            console.log(obj);
            $('#incidentTitle').text(obj['title']);
            $('#incidentDes').text(obj['description']);
            if (obj['isActive'] == 0) {
                $('#btn_active').hide();
            } else {
                $('#ios2').prop('checked', true);

            }
        }

        function getincidentbyid(id) {
            output2 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incident",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            for (var i = 0; i < output2.length; i++) {
                let obj2 = output2[i];

                if (obj2['incidentId'] == id) {
                    console.log(obj2);
                    return obj2['title'];
                }

            }
            return "Select";
        }



        $(".close-btn, .bg-overlay, .cancel").click(function() {
            $(".custom-model-main").removeClass('model-open');
        });

        $("#add").submit(function(e) {
            e.preventDefault();
            $(".custom-model-main").fadeOut();
            $(".custom-model-main").removeClass('model-open');
            var str = [];
            var formElement = document.querySelector("#add");
            var formData = new FormData(formElement);
            //var array = {'key':'ABCD'}
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
            });
            object['inc'] = new Object();
            var count = 0;
            $('.multi-select-component .selected-wrapper').each(function() {
                var item = $(this).find("span").data("gnid");
                console.log(item);
                object['inc'][count++] = item;
            });

            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "PUT",
                url: "<?php echo API; ?>rincident",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    console.log(result);
                    $("#tbodyid").empty();
                    getReportsbyIncident();
                    console.log(result.code);
                    if (result.code == 806) {
                        alertGen("Added Successfully!", 1);

                    } else {
                        alertGen(" Unable to handle request.", 2);

                    }
                },
                error: function(err) {
                    alertGen(" Something went wrong.", 3);
                    console.log(err);
                }
            });
        });

        function getIncidents() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incident",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            var select = document.getElementById("gndivision");

            for (var i = 0; i < output.length; i++) {
                //console.log(i);
                var opt = document.createElement('option');
                opt.value = output[i]['title'];
                opt.innerHTML = output[i]['title'];
                opt.setAttribute("data-gnId", output[i]['incidentId']);
                        
                select.appendChild(opt);


            }
        }




        function getReportsbyIncident() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>doreports/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            $("#tbodyid").empty();
            var table = document.getElementById("tbodyid");

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

                var attribute = document.createElement("a");
                attribute.id = obj['residentId'];
                attribute.target = "_blank";
                attribute.href = obj['report'] + "/" + obj['reportId'];
                attribute.className = "btn_views";
                attribute.name = "view";
                attribute.innerHTML = "View";
                attribute.setAttribute("data-type", obj['report'])
                attribute.setAttribute("data-Id", obj['reportId'])
                cell6.appendChild(attribute);

                var attribute2 = document.createElement("a");
                attribute2.id = obj['residentId'];
                // attribute2.target = "_blank";
                // attribute2.href = obj['report'] + "/" + obj['reportId'];
                attribute2.className = "btn_views incidentchange";
                attribute2.name = "view";
                if (obj['incidentId'] == null) {
                    attribute2.innerHTML = "Select";
                } else {
                    attribute2.innerHTML = getincidentbyid(obj['incidentId']);
                }
                attribute2.setAttribute("data-type", obj['report']);
                attribute2.setAttribute("data-id", obj['reportId']);
                attribute2.setAttribute("data-inc", obj['incidentId']);
                cell7.appendChild(attribute2);


                cell1.innerHTML = obj['timestamp'];
                cell2.innerHTML = obj['cause'];
                cell3.innerHTML = obj['report'];
                cell4.innerHTML = obj['gnDvName'];

                let app = "";
                if (obj['approved'] == 'p') {
                    app = "Pending";
                } else if (obj['approved'] == 'a') {
                    app = "Approved";
                } else if (obj['approved'] == 'r') {
                    app = "Rejected";
                }
                cell5.innerHTML = app;



                // console.log(attribute);
                // console.log(attribute2);
            }
        }

        function getGNsOnIncident() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output3 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gns/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output3);

            let html = "";
            for (var i = 0; i < output3.length; i++) {
                let obj = output3[i];
                // console.log(obj);
                html += "<span class='spangns'>" + obj['gnDvName'] + "</span>  ";
            }
            $('#gns').html(html);
        }

        $("#status").on('change', function() {
            var status = $('#status').val();
            console.log(status);
            $("#tbodyid").empty();
            var table = document.getElementById("tbodyid");
            var $sample = "";
            if (output == null) {
                $sample += "<p>No records</p>";
                $("#tbodyid").append($sample);
            } else {
                for (var i = 0; i < output.length; i++) {

                    let obj = output[i];
                    console.log(obj);

                    if (status == "Any") {
                        let row = table.insertRow(-1);
                        let cell1 = row.insertCell(-1);
                        let cell2 = row.insertCell(-1);
                        let cell3 = row.insertCell(-1);
                        let cell4 = row.insertCell(-1);
                        let cell5 = row.insertCell(-1);

                        var attribute = document.createElement("a");
                        attribute.id = obj['residentId'];
                        // attribute.href = "";
                        attribute.target = "_blank";
                        attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                        attribute.className = "btn_views";
                        attribute.name = "view";
                        attribute.innerHTML = "View";
                        attribute.setAttribute("data-type", obj['report'])
                        attribute.setAttribute("data-Id", obj['reportId'])


                        cell1.innerHTML = obj['timestamp'];
                        cell2.innerHTML = obj['cause'];
                        cell3.innerHTML = obj['report'];

                        let app = "";
                        if (obj['approved'] == 'p') {
                            app = "Pending";
                        } else if (obj['approved'] == 'a') {
                            app = "Approved";
                        } else if (obj['approved'] == 'r') {
                            app = "Rejected";
                        }
                        cell4.innerHTML = app;

                        cell5.appendChild(attribute);

                    } else if (status == "1") {
                        if (obj['approved'] == 'a') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            // attribute.href = "";
                            attribute.target = "_blank";
                            attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'];
                            cell2.innerHTML = obj['cause'];
                            cell3.innerHTML = obj['report'];

                            let app = "Approved";

                            cell4.innerHTML = app;

                            cell5.appendChild(attribute);

                        }
                    } else if (status == "2") {
                        if (obj['approved'] == 'p') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            // attribute.href = "";
                            attribute.target = "_blank";
                            attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'];
                            cell2.innerHTML = obj['cause'];
                            cell3.innerHTML = obj['report'];

                            let app = "Pending";

                            cell4.innerHTML = app;

                            cell5.appendChild(attribute);

                        }
                    } else if (status == "3") {
                        if (obj['approved'] == 'r') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            // attribute.href = "";
                            attribute.target = "_blank";
                            attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'];
                            cell2.innerHTML = obj['cause'];
                            cell3.innerHTML = obj['report'];

                            let app = "Rejected";

                            cell4.innerHTML = app;

                            cell5.appendChild(attribute);

                        }
                    }
                }
            }
            // console.log($sample);


        });
        $("#type").on('change', function() {
            var status = $('#type').val();
            console.log(status);
            $("#tbodyid").empty();
            var table = document.getElementById("tbodyid");
            var $sample = "";
            if (output == null) {
                $sample += "<p>No records</p>";
                $("#tbodyid").append($sample);
            } else {
                for (var i = 0; i < output.length; i++) {

                    let obj = output[i];
                    console.log(obj);

                    if (status == "Any") {
                        let row = table.insertRow(-1);
                        let cell1 = row.insertCell(-1);
                        let cell2 = row.insertCell(-1);
                        let cell3 = row.insertCell(-1);
                        let cell4 = row.insertCell(-1);
                        let cell5 = row.insertCell(-1);

                        var attribute = document.createElement("a");
                        attribute.id = obj['residentId'];
                        // attribute.href = "";
                        attribute.target = "_blank";
                        attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                        attribute.className = "btn_views";
                        attribute.name = "view";
                        attribute.innerHTML = "View";
                        attribute.setAttribute("data-type", obj['report'])
                        attribute.setAttribute("data-Id", obj['reportId'])


                        cell1.innerHTML = obj['timestamp'];
                        cell2.innerHTML = obj['cause'];
                        cell3.innerHTML = obj['report'];

                        let app = "";
                        if (obj['approved'] == 'p') {
                            app = "Pending";
                        } else if (obj['approved'] == 'a') {
                            app = "Approved";
                        } else if (obj['approved'] == 'r') {
                            app = "Rejected";
                        }
                        cell4.innerHTML = app;

                        cell5.appendChild(attribute);

                    } else if (status == "1") {
                        if (obj['report'] == 'Initial') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            // attribute.href = "";
                            attribute.target = "_blank";
                            attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'];
                            cell2.innerHTML = obj['cause'];
                            cell3.innerHTML = obj['report'];

                            let app = "";
                            if (obj['approved'] == 'p') {
                                app = "Pending";
                            } else if (obj['approved'] == 'a') {
                                app = "Approved";
                            } else if (obj['approved'] == 'r') {
                                app = "Rejected";
                            }
                            cell4.innerHTML = app;

                            cell5.appendChild(attribute);


                        }
                    } else if (status == "2") {
                        if (obj['report'] == 'Relief') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            // attribute.href = "";
                            attribute.target = "_blank";
                            attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'];
                            cell2.innerHTML = obj['cause'];
                            cell3.innerHTML = obj['report'];

                            let app = "";
                            if (obj['approved'] == 'p') {
                                app = "Pending";
                            } else if (obj['approved'] == 'a') {
                                app = "Approved";
                            } else if (obj['approved'] == 'r') {
                                app = "Rejected";
                            }
                            cell4.innerHTML = app;

                            cell5.appendChild(attribute);


                        }
                    } else if (status == "3") {
                        if (obj['report'] == 'Final') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            // attribute.href = "";
                            attribute.target = "_blank";
                            attribute.href = "<?php echo HOST; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'];
                            cell2.innerHTML = obj['cause'];
                            cell3.innerHTML = obj['report'];

                            let app = "";
                            if (obj['approved'] == 'p') {
                                app = "Pending";
                            } else if (obj['approved'] == 'a') {
                                app = "Approved";
                            } else if (obj['approved'] == 'r') {
                                app = "Rejected";
                            }
                            cell4.innerHTML = app;

                            cell5.appendChild(attribute);


                        }
                    }
                }
            }
            // console.log($sample);
            // $("#tbodyid").append($sample);

        });

        (function() {
            var showResults;
            $('#search').keyup(function() {
                var searchText;
                searchText = $('#search').val();
                return showResults(searchText);
            });
            showResults = function(searchText) {
                $('tbody tr').hide();
                return $('tbody tr:Contains(' + searchText + ')').show();
            };
            jQuery.expr[':'].Contains = jQuery.expr.createPseudo(function(arg) {
                return function(elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
        }.call(this));
    </script>
</body>

</html>