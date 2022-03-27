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
        <div class="container">
            <h1>Alerts</h1>
            <div id="bodyid" class="container text-center">
                <div class="row-content alert-div alert-warning" style="margin: 10px auto;">
                    <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                        of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                    </p>
                    <div style="text-align: right">
                        <p>asdfasdfsdaf</p>
                    </div>
                </div>
                <div class="row-content alert-div" style="margin: 10px auto;">
                    <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                        of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                    </p>
                </div>
                <div class="row-content alert-div" style="margin: 10px auto;">
                    <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                        of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                    </p>
                </div>
                <div class="row-content alert-div alert-warning" style="margin: 10px auto;">
                    <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                        of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                    </p>
                </div>

                <div class="row-content alert-div" style="margin: 10px auto;">
                    <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                        of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                    </p>
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#Alerts";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getAlerts();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getAlerts() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>doalert",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#bodyid").empty();
            // var table = document.getElementById("bodyid");

            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                console.log(obj);
                // let row = table.insertRow(-1);
                // let cell1 = row.insertCell(-1);
                // let cell2 = row.insertCell(-1);
                // cell1.innerHTML = obj['timestamp'];
                // cell2.innerHTML = obj['message'];
                if (obj['onlyOfficers'] == 1) {
                    var $sample = $(" <div class='row-content alert-div alert-warning' style='margin: 10px auto 2px;'> <p> " + obj['msg'] + " </p><div style='text-align: right;font-size: 12px;'><p> " + obj['timestamp'] + " </p></div> </div > ");
                } else {
                    var $sample = $(" <div class='row-content alert-div' style='margin: 10px auto 2px;'> <p> " + obj['msg'] + " </p><div style='text-align: right;font-size: 12px;'><p> " + obj['timestamp'] + " </p></div> </div > ");
                }

                $("#bodyid").append($sample);

            }
        }
</script>
</body>

</html>