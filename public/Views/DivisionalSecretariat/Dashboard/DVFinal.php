<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
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
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <h1>Incident Reporting</h1>

            <div class="container">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Approval Status
                                    <select id="status" class="form-control">
                                        <option value="Any">All</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="3">Rejected</option>

                                    </select>
                                </th>
                                <!-- <th>District
                                    <select id="status-filter" class="form-control">
                                        <option>All</option>
                                        <option>Kaluatara</option>
                                        <option>Gamapaha</option>

                                    </select>
                                </th> -->
                                <!-- <th>Divisional Sec office
                                    <select id="status-filter" class="form-control">
                                        <option>All</option>
                                        <option>Kaluatara</option>
                                        <option>Madurawala</option>

                                    </select>
                                </th> -->
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
                                    <th>Description</th>
                                    <th>Div S Office</th>
                                    <th>Approval Status</th>
                                    <th>View</th>

                                </tr>
                            </thead>

                            <tbody id="tbodyid">

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Flood </td>
                                    <td>Pending</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>Pending</td>
                                    <td>Kalutara</td>
                                    <td>Horana</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/22/2021 12:50</td>
                                    <td>Flood </td>
                                    <td>Pending</td>
                                    <td>Kalutara</td>
                                    <td>Horana</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Horana</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/24/2021 12:50</td>
                                    <td>Flood </td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Millaniya</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>No</td>
                                    <td>Kalutara</td>
                                    <td>Horana</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>10/22/2021 12:50</td>
                                    <td>Flood </td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Horana</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>10/22/2021 13:56</td>
                                    <td>Flood </td>
                                    <td>Yes</td>
                                    <td>Kalutara</td>
                                    <td>Horana</td>
                                    <td><a href="<?php echo HOST; ?>/DMC/ViewIncident" class="btn_views">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#Incidents";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            getReports();
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getReports() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incidentfinal",
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
                attribute.id = obj['dvfinalincidentId'];
                attribute.target = "_blank";
                attribute.href = "DVFinal/" + obj['dvfinalincidentId'];
                attribute.className = "btn_views";
                attribute.name = "view";
                attribute.innerHTML = "View";
                attribute.setAttribute("data-Id", obj['dvfinalincidentId'])

                cell1.innerHTML = obj['timestamp'].split(" ")[0];
                cell2.innerHTML = obj['disaster'];
                cell3.innerHTML = getDVbyId(obj['dvId']);

                let app = "";
                if (obj['dmcapproved'] == 'a') {
                    app = "Approved";
                } else if (obj['dmcapproved'] == 'r') {
                    app = "Rejected";
                } else {
                    app = "Pending";
                }
                cell4.innerHTML = app;
                cell5.appendChild(attribute);

            }
        }

        function getDVbyId(i) {
            var output2 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>divisionbyid/" + i,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output2);
            return output2['dvName'];
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
                        attribute.id = obj['dvfinalincidentId'];
                        attribute.target = "_blank";
                        attribute.href = "DVFinal/" + obj['dvfinalincidentId'];
                        attribute.className = "btn_views";
                        attribute.name = "view";
                        attribute.innerHTML = "View";
                        attribute.setAttribute("data-Id", obj['dvfinalincidentId'])

                        cell1.innerHTML = obj['timestamp'].split(" ")[0];
                        cell2.innerHTML = obj['disaster'];
                        cell3.innerHTML = getDVbyId(obj['dvId']);

                        let app = "";
                        if (obj['dmcapproved'] == 'a') {
                            app = "Approved";
                        } else if (obj['dmcapproved'] == 'r') {
                            app = "Rejected";
                        } else {
                            app = "Pending";
                        }
                        cell4.innerHTML = app;
                        cell5.appendChild(attribute);

                    } else if (status == "1") {
                        console.log(obj['dmcapproved']);
                        if (obj['dmcapproved'] == 'a') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['dvfinalincidentId'];
                            attribute.target = "_blank";
                            attribute.href = "DVFinal/" + obj['dvfinalincidentId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-Id", obj['dvfinalincidentId'])

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['disaster'];
                            cell3.innerHTML = getDVbyId(obj['dvId']);

                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell4.innerHTML = app;
                            cell5.appendChild(attribute);

                        }
                    } else if (status == "2") {
                        if (obj['dmcapproved'] == 'p') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['dvfinalincidentId'];
                            attribute.target = "_blank";
                            attribute.href = "DVFinal/" + obj['dvfinalincidentId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-Id", obj['dvfinalincidentId'])

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['disaster'];
                            cell3.innerHTML = getDVbyId(obj['dvId']);

                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell4.innerHTML = app;
                            cell5.appendChild(attribute);

                        }
                    } else if (status == "3") {
                        if (obj['dmcapproved'] == 'r') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);

                            var attribute = document.createElement("a");
                            attribute.id = obj['dvfinalincidentId'];
                            attribute.target = "_blank";
                            attribute.href = "DVFinal/" + obj['dvfinalincidentId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-Id", obj['dvfinalincidentId'])

                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['disaster'];
                            cell3.innerHTML = getDVbyId(obj['dvId']);

                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell4.innerHTML = app;
                            cell5.appendChild(attribute);

                        }
                    }
                }
            }
            // console.log($sample);


        });
    </script>
</body>

</html>