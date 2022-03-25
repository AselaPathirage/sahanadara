<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>public/assets/css/dashboard_component.css">
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
            <center><h1>Messages</h1></center>
            <div class="container">
                <div style="display:block;text-align: right;">
                <a href="<?php echo HOST; ?>DisasterOfficer/Dashboard/sendmessages" class="btn_alerts">Send Message</a>
                </div>
            </div>
            <div class="container">
                <div class="">

                    <div class="panel panel-primary filterable">
                        <table id="task-list-tbl" class="table">
                            <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Message</th>


                                </tr>
                            </thead>

                            <tbody id="tbodyid">

                               


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

           
               

    </section>
    <script>
        var thisPage = "#Messages";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getMessages();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getMessages() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>domsg",
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
                console.log(obj);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                cell1.innerHTML = obj['timestamp'];
                cell2.innerHTML = obj['message'];
            }
        }
    </script>

</body>
</html>