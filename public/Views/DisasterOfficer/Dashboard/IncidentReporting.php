<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchselect.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_disofficer.css">
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
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->

        <div class="container">
            <h1>Incident Reporting</h1>
            <div class="container" style="text-align: right;">

            </div>
            <div class="custom-model-main addform">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form action="#" id='add' name="add" method="POST">
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
                                    <td>10/24/2021 12:50</td>
                                    <td>Flood </td>
                                    <td>Final</td>
                                    <td>Approved</td>
                                    <td>Pending</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>Initial</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>09/20/2021 13:56</td>
                                    <td>Landslide</td>
                                    <td>Final</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>Initial</td>
                                    <td>Approved</td>
                                    <td>Pending</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>Initial</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/20/2021 13:56</td>
                                    <td>Landslide</td>
                                    <td>Final</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>07/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>Initial</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
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
        var thisPage = "#IncidentReporting";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getReports();
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



        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getIncidents() {
            output5 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incident",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output5);
            var select = document.getElementById("gndivision");

            for (var y = 0; y < output5.length; y++) {
                console.log(output5[y]['title']);
                var opt = document.createElement('option');
                opt.value = output5[y]['title'];
                opt.innerHTML = output5[y]['title'];
                opt.setAttribute("data-gnId", output5[y]['incidentId']);
                // opt.data("gnid", output[i]['gndvId']);  
                // opt.attr('data-name',output[i]['gndvId']);    
                // opt.setAttribute("data-id",output[i]['gndvId'])          
                select.appendChild(opt);


            }
        }

        function getReports() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>doreports",
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
                    getReports();
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
            for (var i = 0; i < output.length; i++) {
                let obj2 = output2[i];

                if (obj2['incidentId'] == id) {
                    console.log(obj2);
                    return obj2['title'];
                }

            }
            return "Select";
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
                        attribute.href = obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = obj['report'] + "/" + obj['reportId'];
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
                        attribute.href = obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = obj['report'] + "/" + obj['reportId'];
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