<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_disofficer.css">
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
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div id="alertBox">
        </div>
        <!-- TABLE -->
        <div class="container">
            <h1>Compensation Requests</h1>
            <!-- <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a href="/<?php echo baseUrl; ?>/GramaNiladari/CreateDeathComp" class="btn_blue">Create Death Compensation</a>
                    <a href="/<?php echo baseUrl; ?>/GramaNiladari/CreatePropertyComp" class="btn_blue">Create Property Compensation</a>
                </div>
            </div> -->
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
                                        <option value="1">Death</option>
                                        <option value="2">Property</option>


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
                                    <th>Date</th>
                                    <th>Applicant Name</th>
                                    <th>Type</th>
                                    <th>GN Division</th>
                                    <th>DS Approved</th>
                                    <th>DMC Approved</th>

                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>

                            <tbody id="tbodyid">

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/20/2021 12:50</td>
                                    <td>N Nimesh </td>
                                    <td>Death</td>
                                    <td>Approved</td>
                                    <td>Pending</td>
                                    <td>Not Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>09/24/2021 11:30</td>
                                    <td>Y Abeysinghe</td>
                                    <td>Death</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>09/20/2021 11:50</td>
                                    <td>N Nirmal </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>08/24/2021 09:50</td>
                                    <td>Bhasuru Lakshan</td>
                                    <td>Death</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/14/2021 15:45</td>
                                    <td>Y Dulana </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/12/2021 15:45</td>
                                    <td>C Kushan </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>08/04/2021 15:45</td>
                                    <td>T Eranga </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>07/14/2021 15:45</td>
                                    <td>K Hasith </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>07/10/2021 15:45</td>
                                    <td>K Galagedara </td>
                                    <td>Property</td>
                                    <td>Approved</td>
                                    <td>Approved</td>
                                    <td>Collected</td>
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
        var thisPage = "#Compensation";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            getReports();

            $(document).on('click', '.collected', function(e) {
                e.preventDefault();
                var x = $(this).data('type');
                var y = $(this).data('id');

                console.log(x);
                var object = {};


                object['report'] = x;
                object['reportId'] = y;

                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "PUT",
                    url: "<?php echo API; ?>docollected",
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

        function getReports() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>dismgrcomp",
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
            console.log(output);
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
                let cell8 = row.insertCell(-1);

                var attribute = document.createElement("a");
                attribute.id = obj['residentId'];
                attribute.target = "_blank";
                attribute.href = obj['report'] + "/" + obj['reportId'];
                attribute.className = "btn_views";
                attribute.name = "view";
                attribute.innerHTML = "View";
                attribute.setAttribute("data-type", obj['report'])
                attribute.setAttribute("data-Id", obj['reportId'])
                cell8.appendChild(attribute);

                cell1.innerHTML = obj['timestamp'].split(" ")[0];
                cell2.innerHTML = obj['aname'];
                cell3.innerHTML = obj['report'];
                cell4.innerHTML = obj['gnDvName'];

                let app = "";
                if (obj['disapproved'] == 'a') {
                    app = "Approved";
                } else if (obj['disapproved'] == 'r') {
                    app = "Rejected";
                } else {
                    app = "Pending";
                }
                cell5.innerHTML = app;
                app = "";
                if (obj['dmcapproved'] == 'a') {
                    app = "Approved";
                } else if (obj['dmcapproved'] == 'r') {
                    app = "Rejected";
                } else {
                    app = "Pending";
                }
                cell6.innerHTML = app;
                app = "";
                if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                    if (obj['collected'] == '0') {
                        app = "Not collected";
                        var attribute1 = document.createElement("a");
                        attribute1.id = obj['residentId'];
                        // attribute1.target = "_blank";
                        attribute1.href = "";
                        attribute1.className = "";
                        attribute1.name = "view";
                        attribute1.style = "color: blue;";
                        attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                        attribute1.setAttribute("data-type", obj['report'])
                        attribute1.setAttribute("data-tel", obj['atel'])
                        var attribute2 = document.createElement("a");
                        attribute2.id = obj['residentId'];
                        // attribute2.target = "_blank";
                        attribute2.href = "";
                        attribute2.className = "collected";
                        attribute2.name = "view";
                        attribute2.style = "color: blue;";
                        attribute2.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='M12 2C6.579 2 2 6.58 2 12s4.579 10 10 10 10-4.58 10-10S17.421 2 12 2zm0 13c.992 0 1.85-.265 2.293-.708l1.414 1.415C14.581 16.832 12.901 17 12 17c-2.757 0-5-2.243-5-5s2.243-5 5-5c.901 0 2.582.168 3.707 1.293l-1.414 1.414C13.851 9.264 12.993 9 12 9c-1.626 0-3 1.374-3 3s1.374 3 3 3z'></path></svg>";
                        attribute2.setAttribute("data-type", obj['report'])
                        attribute2.setAttribute("data-id", obj['reportId'])
                        cell8.appendChild(attribute1);
                        cell8.appendChild(attribute2);
                    } else {
                        app = "Collected";
                    }
                } else if (obj['dvapproved'] == 'a') {
                    app = "Approved";
                } else if (obj['dvapproved'] == 'r') {
                    app = "Rejected";
                } else {
                    app = "Pending";
                }
                cell7.innerHTML = app;


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
                        let cell6 = row.insertCell(-1);
                        let cell7 = row.insertCell(-1);
                        let cell8 = row.insertCell(-1);

                        var attribute = document.createElement("a");
                        attribute.id = obj['residentId'];
                        attribute.target = "_blank";
                        attribute.href = obj['report'] + "/" + obj['reportId'];
                        attribute.className = "btn_views";
                        attribute.name = "view";
                        attribute.innerHTML = "View";
                        attribute.setAttribute("data-type", obj['report'])
                        attribute.setAttribute("data-Id", obj['reportId'])
                        cell8.appendChild(attribute);

                        cell1.innerHTML = obj['timestamp'].split(" ")[0];
                        cell2.innerHTML = obj['aname'];
                        cell3.innerHTML = obj['report'];
                        cell4.innerHTML = obj['gnDvName'];

                        let app = "";
                        if (obj['disapproved'] == 'a') {
                            app = "Approved";
                        } else if (obj['disapproved'] == 'r') {
                            app = "Rejected";
                        } else {
                            app = "Pending";
                        }
                        cell5.innerHTML = app;
                        app = "";
                        if (obj['dmcapproved'] == 'a') {
                            app = "Approved";
                        } else if (obj['dmcapproved'] == 'r') {
                            app = "Rejected";
                        } else {
                            app = "Pending";
                        }
                        cell6.innerHTML = app;
                        app = "";
                        if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                            if (obj['collected'] == '0') {
                                app = "Not collected";
                                var attribute1 = document.createElement("a");
                                attribute1.id = obj['residentId'];
                                attribute1.target = "_blank";
                                attribute1.href = "";
                                attribute1.className = "";
                                attribute1.name = "view";
                                attribute1.style = "color: blue;";
                                attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                                attribute1.setAttribute("data-type", obj['report'])
                                attribute1.setAttribute("data-tel", obj['atel'])
                                cell8.appendChild(attribute1);
                            } else {
                                app = "Collected";
                            }
                        } else if (obj['dvapproved'] == 'a') {
                            app = "Approved";
                        } else if (obj['dvapproved'] == 'r') {
                            app = "Rejected";
                        } else {
                            app = "Pending";
                        }
                        cell7.innerHTML = app;

                    } else if (status == "1") {
                        if (obj['dvapproved'] == 'a') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);
                            let cell7 = row.insertCell(-1);
                            let cell8 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])
                            cell8.appendChild(attribute);

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];
                            cell3.innerHTML = obj['report'];
                            cell4.innerHTML = obj['gnDvName'];

                            let app = "";
                            if (obj['disapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['disapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell6.innerHTML = app;
                            app = "";
                            if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                                if (obj['collected'] == '0') {
                                    app = "Not collected";
                                    var attribute1 = document.createElement("a");
                                    attribute1.id = obj['residentId'];
                                    attribute1.target = "_blank";
                                    attribute1.href = "";
                                    attribute1.className = "";
                                    attribute1.name = "view";
                                    attribute1.style = "color: blue;";
                                    attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                                    attribute1.setAttribute("data-type", obj['report'])
                                    attribute1.setAttribute("data-tel", obj['atel'])
                                    cell8.appendChild(attribute1);
                                } else {
                                    app = "Collected";
                                }
                            } else if (obj['dvapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dvapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell7.innerHTML = app;

                        }
                    } else if (status == "2") {
                        if (obj['dvapproved'] == 'p') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);
                            let cell7 = row.insertCell(-1);
                            let cell8 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])
                            cell8.appendChild(attribute);

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];
                            cell3.innerHTML = obj['report'];
                            cell4.innerHTML = obj['gnDvName'];

                            let app = "";
                            if (obj['disapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['disapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell6.innerHTML = app;
                            app = "";
                            if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                                if (obj['collected'] == '0') {
                                    app = "Not collected";
                                    var attribute1 = document.createElement("a");
                                    attribute1.id = obj['residentId'];
                                    attribute1.target = "_blank";
                                    attribute1.href = "";
                                    attribute1.className = "";
                                    attribute1.name = "view";
                                    attribute1.style = "color: blue;";
                                    attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                                    attribute1.setAttribute("data-type", obj['report'])
                                    attribute1.setAttribute("data-tel", obj['atel'])
                                    cell8.appendChild(attribute1);
                                } else {
                                    app = "Collected";
                                }
                            } else if (obj['dvapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dvapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell7.innerHTML = app;

                        }
                    } else if (status == "3") {
                        if (obj['dvapproved'] == 'r') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);
                            let cell7 = row.insertCell(-1);
                            let cell8 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])
                            cell8.appendChild(attribute);

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];
                            cell3.innerHTML = obj['report'];
                            cell4.innerHTML = obj['gnDvName'];

                            let app = "";
                            if (obj['disapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['disapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell6.innerHTML = app;
                            app = "";
                            if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                                if (obj['collected'] == '0') {
                                    app = "Not collected";
                                    var attribute1 = document.createElement("a");
                                    attribute1.id = obj['residentId'];
                                    attribute1.target = "_blank";
                                    attribute1.href = "";
                                    attribute1.className = "";
                                    attribute1.name = "view";
                                    attribute1.style = "color: blue;";
                                    attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                                    attribute1.setAttribute("data-type", obj['report'])
                                    attribute1.setAttribute("data-tel", obj['atel'])
                                    cell8.appendChild(attribute1);
                                } else {
                                    app = "Collected";
                                }
                            } else if (obj['dvapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dvapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell7.innerHTML = app;
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
                        let cell6 = row.insertCell(-1);
                        let cell7 = row.insertCell(-1);
                        let cell8 = row.insertCell(-1);

                        var attribute = document.createElement("a");
                        attribute.id = obj['residentId'];
                        attribute.target = "_blank";
                        attribute.href = obj['report'] + "/" + obj['reportId'];
                        attribute.className = "btn_views";
                        attribute.name = "view";
                        attribute.innerHTML = "View";
                        attribute.setAttribute("data-type", obj['report'])
                        attribute.setAttribute("data-Id", obj['reportId'])
                        cell8.appendChild(attribute);

                        cell1.innerHTML = obj['timestamp'].split(" ")[0];
                        cell2.innerHTML = obj['aname'];
                        cell3.innerHTML = obj['report'];
                        cell4.innerHTML = obj['gnDvName'];

                        let app = "";
                        if (obj['disapproved'] == 'a') {
                            app = "Approved";
                        } else if (obj['disapproved'] == 'r') {
                            app = "Rejected";
                        } else {
                            app = "Pending";
                        }
                        cell5.innerHTML = app;
                        app = "";
                        if (obj['dmcapproved'] == 'a') {
                            app = "Approved";
                        } else if (obj['dmcapproved'] == 'r') {
                            app = "Rejected";
                        } else {
                            app = "Pending";
                        }
                        cell6.innerHTML = app;
                        app = "";
                        if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                            if (obj['collected'] == '0') {
                                app = "Not collected";
                                var attribute1 = document.createElement("a");
                                attribute1.id = obj['residentId'];
                                // attribute1.target = "_blank";
                                attribute1.href = "";
                                attribute1.className = "";
                                attribute1.name = "view";
                                attribute1.style = "color: blue;";
                                attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                                attribute1.setAttribute("data-type", obj['report'])
                                attribute1.setAttribute("data-tel", obj['atel'])
                                var attribute2 = document.createElement("a");
                                attribute2.id = obj['residentId'];
                                // attribute2.target = "_blank";
                                attribute2.href = "";
                                attribute2.className = "";
                                attribute2.name = "view";
                                attribute2.style = "color: blue;";
                                attribute2.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='M12 2C6.579 2 2 6.58 2 12s4.579 10 10 10 10-4.58 10-10S17.421 2 12 2zm0 13c.992 0 1.85-.265 2.293-.708l1.414 1.415C14.581 16.832 12.901 17 12 17c-2.757 0-5-2.243-5-5s2.243-5 5-5c.901 0 2.582.168 3.707 1.293l-1.414 1.414C13.851 9.264 12.993 9 12 9c-1.626 0-3 1.374-3 3s1.374 3 3 3z'></path></svg>";
                                attribute2.setAttribute("data-type", obj['report'])
                                attribute2.setAttribute("data-tel", obj['atel'])
                                cell8.appendChild(attribute1);
                                cell8.appendChild(attribute2);
                            } else {
                                app = "Collected";
                            }
                        } else if (obj['dvapproved'] == 'a') {
                            app = "Approved";
                        } else if (obj['dvapproved'] == 'r') {
                            app = "Rejected";
                        } else {
                            app = "Pending";
                        }
                        cell7.innerHTML = app;

                    } else if (status == "1") {
                        if (obj['report'] == 'Death') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);
                            let cell7 = row.insertCell(-1);
                            let cell8 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])
                            cell8.appendChild(attribute);

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];
                            cell3.innerHTML = obj['report'];
                            cell4.innerHTML = obj['gnDvName'];

                            let app = "";
                            if (obj['disapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['disapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell6.innerHTML = app;
                            app = "";
                            if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                                if (obj['collected'] == '0') {
                                    app = "Not collected";
                                    var attribute1 = document.createElement("a");
                                    attribute1.id = obj['residentId'];
                                    attribute1.target = "_blank";
                                    attribute1.href = "";
                                    attribute1.className = "";
                                    attribute1.name = "view";
                                    attribute1.style = "color: blue;";
                                    attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                                    attribute1.setAttribute("data-type", obj['report'])
                                    attribute1.setAttribute("data-tel", obj['atel'])
                                    cell8.appendChild(attribute1);
                                } else {
                                    app = "Collected";
                                }
                            } else if (obj['dvapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dvapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell7.innerHTML = app;


                        }
                    } else if (status == "2") {
                        if (obj['report'] == 'Property') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);
                            let cell7 = row.insertCell(-1);
                            let cell8 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])
                            cell8.appendChild(attribute);

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];
                            cell3.innerHTML = obj['report'];
                            cell4.innerHTML = obj['gnDvName'];

                            let app = "";
                            if (obj['disapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['disapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell6.innerHTML = app;
                            app = "";
                            if (obj['dvapproved'] == 'a' && obj['dmcapproved'] == 'a') {
                                if (obj['collected'] == '0') {
                                    app = "Not collected";
                                    var attribute1 = document.createElement("a");
                                    attribute1.id = obj['residentId'];
                                    attribute1.target = "_blank";
                                    attribute1.href = "";
                                    attribute1.className = "";
                                    attribute1.name = "view";
                                    attribute1.style = "color: blue;";
                                    attribute1.innerHTML = "&nbsp;&nbsp;<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:; '><circle cx='9.5' cy='9.5' r='1.5'></circle><circle cx='14.5' cy='9.5' r='1.5'></circle><path d='M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.515 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm0 14h-.333L9 18v-2.417l-.641-.247C5.671 14.301 4 12.256 4 10c0-3.309 3.589-6 8-6s8 2.691 8 6-3.589 6-8 6z'></path></svg>";
                                    attribute1.setAttribute("data-type", obj['report'])
                                    attribute1.setAttribute("data-tel", obj['atel'])
                                    cell8.appendChild(attribute1);
                                } else {
                                    app = "Collected";
                                }
                            } else if (obj['dvapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dvapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell7.innerHTML = app;


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
    <script src="<?php echo HOST; ?>/public/assets/js/table.js"></script>
</body>

</html>