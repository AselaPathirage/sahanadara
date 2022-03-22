<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> District Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_divsec.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once('./public/Views/DistrictSecretariat/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DistrictSecretariat/includes/topnav.php');
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
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

                                    <th>District</th>
                                    <th>Division</th>

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
            $("#Home,#Compensation").each(function() {
                if ($(this).hasClass('active')) {
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
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>dseccomp",
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


                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];

                            cell3.innerHTML = obj['dsName'];
                            cell4.innerHTML = obj['dvName'];
                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            cell6.appendChild(attribute);

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


                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];

                            cell3.innerHTML = obj['dsName'];
                            cell4.innerHTML = obj['dvName'];
                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            cell6.appendChild(attribute);

                    } else if (status == "1") {
                        if (obj['dmcapproved'] == 'a') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);


                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];

                            cell3.innerHTML = obj['dsName'];
                            cell4.innerHTML = obj['dvName'];
                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            cell6.appendChild(attribute);

                        }
                    } else if (status == "2") {
                        if (obj['dmcapproved'] == 'p') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);


                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];

                            cell3.innerHTML = obj['dsName'];
                            cell4.innerHTML = obj['dvName'];
                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            cell6.appendChild(attribute);

                        }
                    } else if (status == "3") {
                        if (obj['dmcapproved'] == 'r') {
                            let row = table.insertRow(-1);
                            let cell1 = row.insertCell(-1);
                            let cell2 = row.insertCell(-1);
                            let cell3 = row.insertCell(-1);
                            let cell4 = row.insertCell(-1);
                            let cell5 = row.insertCell(-1);
                            let cell6 = row.insertCell(-1);


                            var attribute = document.createElement("a");
                            attribute.id = obj['residentId'];
                            attribute.target = "_blank";
                            attribute.href = obj['report'] + "/" + obj['reportId'];
                            attribute.className = "btn_views";
                            attribute.name = "view";
                            attribute.innerHTML = "View";
                            attribute.setAttribute("data-type", obj['report'])
                            attribute.setAttribute("data-Id", obj['reportId'])


                            cell1.innerHTML = obj['timestamp'].split(" ")[0];
                            cell2.innerHTML = obj['aname'];

                            cell3.innerHTML = obj['dsName'];
                            cell4.innerHTML = obj['dvName'];
                            let app = "";
                            if (obj['dmcapproved'] == 'a') {
                                app = "Approved";
                            } else if (obj['dmcapproved'] == 'r') {
                                app = "Rejected";
                            } else {
                                app = "Pending";
                            }
                            cell5.innerHTML = app;
                            cell6.appendChild(attribute);

                        }
                    }
                }
            }
            // console.log($sample);


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