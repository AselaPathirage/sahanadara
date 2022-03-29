<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_divsec.css">
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
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
            <center><h1>Welcome Divisional Secretariat Officer</h1></center>
            <div class="space"></div>
            <!-- <div class="stat-row">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Incident Reports</div>
                        <div class="number">10</div>

                    </div>
                    <i class='bx bxs-report cart one'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Compensation Requests</div>
                        <div class="number">5</div>

                    </div>
                    <i class='bx bxs-report cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Borrow Requests</div>
                        <div class="number">6</div>

                    </div>
                    <i class='bx bxs-report cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Donation Requests</div>
                        <div class="number">7</div>

                    </div>
                    <i class='bx bxs-report cart four'></i>
                </div>
            </div> -->
            <section class="services">
                <a href="<?php echo HOST; ?>DivisionalSecretariat/Dashboard/Incidents">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#ffb508">
                            <ion-icon name="videocam-outline">
                                <i class='bx bxs-report '></i>
                                <!-- <i class="fas fa-hands-helping"></i> -->
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;">
                                5
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 150px;">
                            <h2 class="services__title">
                            Incident Reports
                            </h2>
                            <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                        </div>
                    </div>
                </a>
                <a href="<?php echo HOST; ?>DivisionalSecretariat/Dashboard/Compensation">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#4eb7ff">
                            <ion-icon name="videocam-outline">
                                <i class='bx bxs-report '></i>
                                <!-- <i class="fas fa-hands-helping"></i> -->
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;">
                                6
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 150px;">
                            <h2 class="services__title">
                            Compensation Requests
                            </h2>
                            <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                        </div>
                    </div>
                </a>
                <a href="<?php echo HOST; ?>DivisionalSecretariat/Dashboard/Donation">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#4eb7ff">
                            <ion-icon name="videocam-outline">
                                <i class='bx bxs-report '></i>
                                <!-- <i class="fas fa-hands-helping"></i> -->
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;" id="donationreqapproval">
                                7
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 150px;">
                            <h2 class="services__title">
                            Pending Donation Requests
                            </h2>
                            <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                        </div>
                    </div>
                </a>
                

            </section>
        </div>


        <!-- <div class="container">
                <div class="row">
                    <div class="col6">
                        <div class="box row-content">
                            <h4>Flood in Kadana</h4>
                            <p>Affected the valleys of river Kalu </p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                <a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/IncidentView" class="btn_views">View</a>
                            </div>
                        </div>
                        <div class="box row-content">
                            <h4>Flood in Kadana</h4>
                            <p>Affected the valleys of river Kalu </p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/IncidentView" class="btn_views">View</a>
                            </div>
                        </div>

                    </div>
                    <div class="col6" style="overflow: auto">
                        <div class="box row-content">
                            <h4>Flood in Kadana</h4>
                            <p>Affected the valleys of river Kalu </p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                <a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/IncidentView" class="btn_views">View</a>
                            </div>
                        </div>
                        <div class="box row-content">
                            <h4>Flood in Kadana</h4>
                            <p>Affected the valleys of river Kalu </p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="<?php echo HOST; ?>/DistrictSecretariat/Dashboard/IncidentView" class="btn_views">View</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->
        
    </section>
    <script>
        var thisPage = "#Dashboard";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            //getAlerts();
            getdonationreqapprovalCount();
            $(".close-alert").click(function(e) {
                $(this).parent().remove();
                e.preventDefault();
            });

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        // function getAlerts() {
        //     output = $.parseJSON($.ajax({
        //         type: "GET",
        //         url: "<?php echo API; ?>divsecalert",
        //         dataType: "json",
        //         headers: {
        //             'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
        //         },
        //         cache: false,
        //         async: false
        //     }).responseText);
        //     console.log(output);
        //     $("#bodyid").empty();
        //     // var table = document.getElementById("bodyid");

        //     for (var i = 0; i < 3; i++) {
        //         let obj = output[i];
        //         console.log(obj);
        //         // let row = table.insertRow(-1);
        //         // let cell1 = row.insertCell(-1);
        //         // let cell2 = row.insertCell(-1);
        //         // cell1.innerHTML = obj['timestamp'];
        //         // cell2.innerHTML = obj['message'];
        //         if (obj['onlyOfficers'] == 1) {
        //             var $sample = $(" <div class='row-content alert-div alert-warning' style='margin: 10px auto 2px;'><button type='button' class='close-alert'>×</button> <p> " + obj['msg'] + " </p><div style='text-align: right;font-size: 12px;'><p> " + obj['timestamp'] + " </p></div> </div > ");
        //         } else {
        //             var $sample = $(" <div class='row-content alert-div' style='margin: 10px auto 2px;'><button type='button' class='close-alert'>×</button> <p> " + obj['msg'] + " </p><div style='text-align: right;font-size: 12px;'><p> " + obj['timestamp'] + " </p></div> </div > ");
        //         }

        //         $("#bodyid").append($sample);

        //     }
        // }

        function getdonationreqapprovalCount() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>donationreqapprovalcount",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#donationreqapproval").text(output['c']);
        }

        

    </script>
</body>
</html>