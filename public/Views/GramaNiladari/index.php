<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari </title>
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
            <h1 class="text-center">Welcome Grama Niladari</h1>
            <div class="space"></div>
           

            <section class="services">
                <a href="">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#ffb508">
                            <ion-icon name="videocam-outline">
                                <i class='bx bxs-report '></i>
                                <!-- <i class="fas fa-hands-helping"></i> -->
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;" id="compCount">
                                10
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 130px;">
                            <h2 class="services__title">
                                Approved Compensation Requests
                            </h2>
                            <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#fd6494">
                            <ion-icon name="videocam-outline">
                                <i class='bx bx-building-house '></i>
                                <!-- <i class="fas fa-hands-helping"></i> -->
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;" id="residentCount">
                                140
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 160px;">
                            <h2 class="services__title">
                                Residents
                            </h2>
                            <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                        </div>
                    </div>
                </a>

            </section>




        </div>
        <div class="space"></div>
        <div class="container text-center" id="bodyid">
            <div class="row-content alert-div alert-warning" style="margin: 10px auto;">
                <button type="button" class="close-alert">×</button>
                <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                    of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                </p>
            </div>
            <div class="row-content alert-div" style="margin: 10px auto;">
                <button type="button" class="close-alert">×</button>
                <p>Rainfall over 150mm recorded in catchment areas Aththanagalu Oya Basin. High risk of
                    of minor flooding in low lying areas. Area residents requested to be alert. DMC 117
                </p>
            </div>


        </div>
        <div class="space"></div>
    </section>
    <script>
        var thisPage = "#stats";
        $(document).ready(function() {
            $("#stats,#updates").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getAlerts();
            $(".close-alert").click(function(e) {
                $(this).parent().remove();
                e.preventDefault();
            });

            getResidentCount();
            getCompCount();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }



        function getAlerts() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gnalert",
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
            if(output.length!=0){
                for (var i = 0; i < 3; i++) {
                let obj = output[i];
                console.log(obj);
                // let row = table.insertRow(-1);
                // let cell1 = row.insertCell(-1);
                // let cell2 = row.insertCell(-1);
                // cell1.innerHTML = obj['timestamp'];
                // cell2.innerHTML = obj['message'];
                if (obj['onlyOfficers'] == 1) {
                    var $sample = $(" <div class='row-content alert-div alert-warning' style='margin: 10px auto 2px;'><button type='button' class='close-alert'>×</button> <p> " + obj['msg'] + " </p><div style='text-align: right;font-size: 12px;'><p> " + obj['timestamp'] + " </p></div> </div > ");
                } else {
                    var $sample = $(" <div class='row-content alert-div' style='margin: 10px auto 2px;'><button type='button' class='close-alert'>×</button> <p> " + obj['msg'] + " </p><div style='text-align: right;font-size: 12px;'><p> " + obj['timestamp'] + " </p></div> </div > ");
                }

                $("#bodyid").append($sample);

            }
            }
        }

        function getResidentCount() {
            output2 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>residentcount",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output2['count(a.residentId)']);
            $("#residentCount").empty();
            // var table = document.getElementById("bodyid");
            $("#residentCount").text(output2['count(a.residentId)']);
        }

        function getCompCount() {
            output3 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gncompcount",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var a = output3['dcount']['count(a.deathId)'];
            var bb = output3['pcount']['count(a.propcomId)'];
            console.log(bb);
            // console.log(output['pcount']);
            // console.log(parseInt(output['dcount']['count(a.deathId)']) + parseInt(output['pcount']['count(a.propcomId)']));
            $("#compCount").empty();
            // var table = document.getElementById("bodyid");
            $("#compCount").text(parseInt(output3['dcount']['count(a.deathId)']) + parseInt(output3['pcount']['count(a.propcomId)']));
        }
    </script>
</body>

</html>