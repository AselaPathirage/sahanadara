<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Incident Report </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_reports.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>Incident Report</h1>
                </center>
                <form action="<?php echo HOST;?>/DivisionalSecretariat/Report/ViewIncident" target="_blank">
                    <div class="row-content">

                        <h2>Select</h2>
                        <div class="row">

                            <div class="col4">
                                <label for="crusttype">Incident</label>
                                <select id="disaster" name="disaster">
                                    <option value="all">All</option>
                                    
                                </select>
                            </div>
                            <div class="col4">
                                <label for="crusttype">From</label>
                                <input type="date" id="from" name="from">
                            </div>
                            <div class="col4">
                                <label for="crusttype">To</label>
                                <input type="date" id="to" name="to">
                            </div>
                        </div>

                        <div class="row" style="justify-content: center;">

                            <input type="submit" value="Generate" class="btn-alerts" />
                            <!-- <input type="reset" value="Cancel" class="btn-alerts" /> -->
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- <script src="<?php echo HOST; ?>/public/assets/js/responsiblePersonAidReport.js"></script> -->
    <script>
        var thisPage = "#incident";
        $(document).ready(function() {
            $("#incident,#safe,#compensation,#inventory").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getDisasterType();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        document.getElementById('reset').onclick = function() {

        }

        function getDisasterType() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>disaster",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log("1");
            var select = document.getElementById("disaster");
            for (var i = 0; i < output.length; i++) {
                var opt = document.createElement('option');
                opt.value = output[i]['disId'];
                opt.innerHTML = output[i]['dis'];
                select.appendChild(opt);
            }
        }

        // $('form').submit(function{
        //     window.location = string +
        // });
    </script>
</body>

</html>