<!DOCTYPE html>
<html lang="en" dir="ltr">

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
            <h1>Safehouses</h1>

            <div class="container">
                <div class="">
                    <!-- <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Active
                                    <select id="assigned-user-filter" class="form-control">
                                        <option>All</option>
                                        <option>Active</option>
                                        <option>Not Active</option>

                                    </select>
                                </th>


                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table> -->
                    <div class="container">
                        <div class="row" id="row">
                            <div class="col6">
                                <div class="box row-content">
                                    <h4 class="name">Bellapitiya Maha Vidyalaya</h4>
                                    <p class="address">Bellapitiya, Horana</p>

                                    <div class="row active" style="text-align: right; margin: 0 auto;display:block">
                                        <a class="btn_active">Status : Active</a>
                                        <!-- <a href="/<?php echo baseUrl; ?>" class="btn_views">View</a> -->
                                    </div>
                                </div>
                                <!-- <div class="box row-content">
                                    <h4>Taxila Central College</h4>
                                    <p>Horana</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_views">View</a>
                                    </div>
                                </div> -->

                                <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>
                    <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div> -->
                            </div>
                            <div class="col6">
                                <div class="box row-content" style="height:100%;min-height: 300px;">
                                    <div class="row active" style="text-align: right; margin: 0 auto;display:block">
                                        <a class="btn_active">Status : Active</a>
                                    </div>
                                    <h4 class="name">Bellapitiya Maha Vidyalaya</h4>
                                    <p class="address">Bellapitiya, Horana</p>
                                    <p>Telephone Number - <span id="tel">0778765367</span> </p>

                                    <div id="responsible">
                                        <h4 style="font-size:15px;">Responsible Person</h4>
                                        <p>Name - <span id="rname"></span></p>
                                        <p>Contact Number - <span id="rtele"></span></p>

                                    </div>

                                    <div id="recent">
                                        <h4 style="font-size:15px;padding-bottom:0;">Recent Status</h4>
                                        <h6 style="font-size:12px;margin: 3px 0;">Last updated - <span id="date"></span></h6>
                                        <p>Adult Males - <span id="male"></span></p>
                                        <p>Adult Females - <span id="female"></span></p>
                                        <p>Children - <span id="children"></span></p>
                                        <p>Disabled - <span id="disabled"></span></p>
                                        <p>Note - <span id="note"></span></p><br>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#safehouse";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getSafeHouses();
            getSafeHouseRecent()
            getResponsible();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }


        function getSafeHouses() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            if (output == null) {
                $("#row").empty();
                var $sample = $(" <p> Safehouses not assigned for your division </p> ");
                $("#row").append($sample);

            } else {
                console.log(output['safeHouseName']);
                $(".name").text(output['safeHouseName'])
                $(".address").text(output['safeHouseAddress'])
                if (output['isUsing'] == 'n') {
                    $(".active").empty();
                }
                $("#tel").text(output['safeHouseTelno'])
            }
        }

        function getSafeHouseRecent() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>recentsh",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            if (output == null && output['isUsing'] == 'y') {
                $("#recent").empty();
                var $sample = $(" <p> No recent activity found</p> ");
                $("#recent").append($sample);

            } else if (output['isUsing'] == 'y') {
                // console.log(output['safeHouseName']);

                $("#male").text(output['adultMale']);
                $("#female").text(output['adultFemale']);
                $("#children").text(output['children']);
                $("#disabled").text(output['disabledPerson']);
                $("#note").text(output['note']);
                $("#date").text(output['createdDate']);

            } else if (output['isUsing'] == 'n') {
                $("#recent").empty();
            }
        }

        function getResponsible() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>responsible",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            if ((output == null && output['isUsing'] == 'y') || output['isUsing'] == 'y' && output['isAssigned'] == 'n') {
                $("#responsible").empty();
                var $sample = $(" <h4> Responsible person not assigned.</h4> ");
                $("#responsible").append($sample);

            } else if (output['isUsing'] == 'y') {
                // console.log(output['safeHouseName']);

                $("#rname").text(output['empName'])
                $("#rtele").text(output['empTele'])


            } else if (output['isUsing'] == 'n') {
                $("#responsible").empty();
            }
        }
    </script>
</body>

</html>