<!DOCTYPE html>
<html lang="en" dir="ltr">


<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
?>

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once('./public/Views/GramaNiladari/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/GramaNiladari/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1>Incident Reporting</h1>

            <h2 style="margin:0;padding:0 15px!important;" id="incidentTitle">sadf</h2>
            <h4 style="padding-top:0!important;padding-left:15px;" id="incidentDes">sdfasdf</h4>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a href="/<?php echo baseUrl; ?>/GramaNiladari/CreateFinal/<?php echo end($array); ?>" class="btn_blue">Create Final Report</a>
                    <a href="/<?php echo baseUrl; ?>/GramaNiladari/CreateRelief/<?php echo end($array); ?>" class="btn_blue">Create Relief Report</a>

                </div>
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
                                    <th>Status</th>
                                    <th>View</th>

                                </tr>
                            </thead>

                            <tbody id="tbodyid">

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>01/24/2021 12:50</td>
                                    <td>Initial</td>
                                    <td>Approved</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>03/14/2021 13:56</td>
                                    <td>Relief</td>
                                    <td>Approved</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>03/20/2021 13:56</td>
                                    <td>Relief</td>
                                    <td>Approved</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>03/21/2021 13:56</td>
                                    <td>Relief</td>
                                    <td>Approved</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>03/25/2021 13:56</td>
                                    <td>Relief</td>
                                    <td>Approved</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>03/28/2021 13:56</td>
                                    <td>Final</td>
                                    <td>Not Approved</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#incident";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            getIncidentById();
            getReportsbyIncident();
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }


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
        }

        function getReportsbyIncident() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gnreports/<?php echo end($array); ?>",
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

                var attribute = document.createElement("a");
                attribute.id = obj['residentId'];
                // attribute.href = "";
                attribute.target = "_blank";
                attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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

                // console.log(attribute);
                // console.log(attribute2);
            }
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
                        attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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
                        attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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
                            attribute.href = "/<?php echo baseUrl; ?>/GramaNiladari/" + obj['report'] + "/" + obj['reportId'];
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