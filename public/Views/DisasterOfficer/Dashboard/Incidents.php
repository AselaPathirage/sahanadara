<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
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
        <div class="space"></div><div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container" style="text-align: right;">
                <div style="display:block;">
                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/createincident" class="btn-fun">Manage Incident</a>
 
        <!-- TABLE -->
        <div class="container">
            <div class="">

                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Status
                                <select id="assigned-user-filter" class="form-control">
                                    <option>All</option>
                                    <option>Active</option>
                                    <option>Finished</option>
                                </select>
                            </th>
            
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>
        </div>
        <div class="container" id="tbodyid">
                <div class="row">
                    <div class="col6">
                        <div class="box row-content">
                            <h4>Flood in Millaniya</h4>
                            <p>A flood situation in low line areas of river Kalu</p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                            </div>
                        </div>
                    </div>

                    <div class="col6">
                        <div class="box row-content">
                            <h4>Flood in Dodangoda</h4>
                            <p>A flood situation in low line areas of river Kalu</p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                            <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>

                                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                        </div>
                    </div>

                    </div>
                    <!-- <div class="col6" style="overflow: auto">
                        <div class="box row-content">
                            <h4>Flood in Ingiriya</h4>
                            <p>A flood situation in low line areas of river Kalu</p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                            </div>
                        </div>
                        <div class="box row-content">
                            <h4>Flood in Galpatha</h4>
                            <p>A flood situation in low line areas of river Kalu</p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                            </div>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>

           
               

    </section>
    <script>
        var thisPage = "#Incidents";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getIncidents();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getIncidents() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
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
            $("#tbodyid").empty();
            var $sample = "";
            if (output == null) {
                $sample += "<p>No incident data</p>";
            } else {
                for (var i = 0; i < output.length; i++) {
                    let obj = output[i];
                    console.log(obj);

                    if (i % 2 == 0) {
                        $sample += "<div class='row'>";
                    }
                    $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                    if (obj['isActive'] == 1) {
                        $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                    }
                    $sample += "<a href='/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
                    if ((i % 2 == 1) || (i == output.length - 1)) {
                        $sample += "</div>";
                    }
                }
            }
            console.log($sample);
            $("#tbodyid").append($sample);
        }
        $("#status").on('change', function() {
            var status = $('#status').val();
            console.log(status);
            $("#tbodyid").empty();
            var $sample = "";
            if (output == null) {
                $sample += "<p>No incident data</p>";
            } else {
                for (var i = 0; i < output.length; i++) {

                    let obj = output[i];
                    console.log(obj);

                    if (status == "Any") {
                        if (i % 2 == 0) {
                            $sample += "<div class='row'>";
                        }
                        $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                        if (obj['isActive'] == 1) {
                            $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                        }
                        $sample += "<a href='/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
                        if ((i % 2 == 1) || (i == output.length - 1)) {
                            $sample += "</div>";
                        }
                    } else if (status == "1") {
                        if (obj['isActive'] == 1) {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 1) {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a href='/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
                            if ((i % 2 == 1) || (i == output.length - 1)) {
                                $sample += "</div>";
                            }
                        }
                    } else {
                        if (obj['isActive'] == 0) {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 1) {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a href='/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
                            if ((i % 2 == 1) || (i == output.length - 1)) {
                                $sample += "</div>";
                            }
                        }
                    }
                }
            }
            console.log($sample);
            $("#tbodyid").append($sample);

        });

        $('#search').keyup(function () {
            var filter = $(this).val();
            $('.box').each(function() {
                //console.log($(this).children("h4").text());
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }

            });
        });
    </script>
</body>
</html>