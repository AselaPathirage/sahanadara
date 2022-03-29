<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> DMC </title>
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
    include_once('./public/Views/DMC/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DMC/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1>Safehouses</h1>

            <div class="container">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Active
                                    <select id="status" class="form-control">
                                        <option value="Any">All</option>
                                        <option value="2">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </th>
                                <th>District
                                    <select id="district" class="form-control">
                                    </select>
                                </th>
                                <th>Divisional Sec office
                                    <select id="division" class="form-control">
                                    </select>
                                </th>
                                <th>GN Division
                                    <select id="gnDivision" class="form-control">
                                    </select>
                                </th>

                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <div class="container">
                        <div class="row">
                            <div class="col6" id="safehouses">
                                <!-- <div class="box row-content">
                                    <h4>Bellapitiya Maha Vidyalaya</h4>
                                    <p>Bellapitiya, Horana</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php //echo baseUrl; 
                                                    ?>" class="btn_active">Active</a>
                                        <a href="/<?php //echo baseUrl; 
                                                    ?>" class="btn_views">View</a>
                                    </div>
                                </div>
                                <div class="box row-content">
                                    <h4>Taxila Central College</h4>
                                    <p>Horana</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php //echo baseUrl; 
                                                    ?>" class="btn_views">View</a>
                                    </div>
                                </div>
                                <div class="box row-content">
                                    <h4>Vidyaratna Maha Viharaya</h4>
                                    <p>Horana</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php //echo baseUrl; 
                                                    ?>" class="btn_views">View</a>
                                    </div>
                                </div> -->

                            </div>
                            <div class="col6" style="overflow: auto">
                                <div class="box row-content" style="height:100%;min-height: 300px;" id="view">
                                    <h3 id="nosafe" class='text-center'>Select safehouse to view</h3>
                                    <div id="details">
                                        <div class="row activelbl" style="text-align: right; margin: 0 auto;display:block">
                                            <a class="btn_active">Status : Active</a>
                                        </div>
                                        <h4 class="name">Bellapitiya Maha Vidyalaya</h4>
                                        <p class="address">Bellapitiya, Horana</p>
                                        <!-- <p>Telephone Number - <span id="tel">0778765367</span> </p> -->

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
        </div>

    </section>
    <script>
        var thisPage = "#safehouse",
            output;
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getSafeHouses();
            $('#details').hide();
            $('#nosafe').show();
            // $('#view').html("<h3 class='text-center'>Select safehouse to view</h3>");
            $('.btn_views').on('click', function() {
                $('#nosafe').hide();
                $('#details').show();
                $(".activelbl").show();
                $("#recent").show();
                $("#responsible").show();


                let sfid = $(this).data('safeid');
                getSafeHouseById(sfid);
                getSafeHouseRecent(sfid)
                getResponsible(sfid);
            })
            var distOptions = "<option value='Any'>Select District</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json', function(result) {
                $.each(result, function(i, district) {
                    distOptions += "<option value='" + district.dsId + "'>" + district.name + "</option>";
                });
                $('#district').html(distOptions);
            });
            $('#district').change(function() {
                var val = $(this).val();
                document.getElementById("division").selectedIndex = 0;;
                var divOptions = "<option value='Any'>Select Division</option>";
                $.getJSON('<?php echo HOST; ?>public/assets/json/data.json', function(result) {
                    $.each(result, function(i, district) {
                        if (district.dsId == val) {
                            $.each(district.division, function(j, division) {
                                divOptions += "<option value='" + division.dvId + "'>" + division.name + "</option>";
                            })
                        }
                    });
                    $('#division').html(divOptions);
                });
                viewDetails();
            })
            $('#division').change(function() {
                var div = $(this).val();
                var dist = $('#district').val();
                var gnOptions = "<option value=''>Select GNDivision</option>";
                $.getJSON('<?php echo HOST; ?>public/assets/json/data.json', function(result) {
                    $.each(result, function(i, district) {
                        if (district.dsId == dist) {
                            $.each(district.division, function(j, division) {
                                if (division.dvId == div) {
                                    $.each(division.gnArea, function(k, gnArea) {
                                        gnOptions += "<option value='" + gnArea.gndvId + "'>" + gnArea.name + "</option>";
                                    })
                                }
                            })
                        }
                    });
                    $('#gnDivision').html(gnOptions);
                    viewDetails();
                })
            })
            $('#status').change(function() {
                viewDetails();
            })
            $('#gnDivision').change(function() {
                viewDetails();
            })
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        getSafeHouses()
        viewDetails()

        function viewDetails() {
            var districtVal = $('#district').val();
            var divisionVal = $('#division').val();
            var gnVal = $('#gnDivision').val();
            var status = $('#status').val();
            var display = "";
            $("#safehouses").empty();
            $.each(output, function(i, district) {
                if ((district.id == districtVal || districtVal == "Any") || (!districtVal || !divisionVal || !status || !gnVal)) {
                    $.each(district.division, function(j, division) {
                        $.each(division.gnArea, function(k, gnArea) {
                            if ((division.id == divisionVal || divisionVal == "Any") || (!districtVal || !divisionVal || !status)) {
                                $.each(gnArea.safeHouse, function(k, safeHouse) {
                                    console.log(status)
                                    if ((gnArea.id == gnVal) || (!districtVal || !divisionVal || !status || !gnVal)) {
                                        if (status == "Any") {
                                            if (safeHouse.active == "Yes") {
                                                display += "<div class='box row-content' style='position:relative;'><h4>" + safeHouse.id + ":" + safeHouse.name + "</h4><p>" + safeHouse.address + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a><a class='btn_views' data-safeid='" + safeHouse.id + "'>View</a></div></div>"
                                            } else {
                                                display += "<div class='box row-content' style='position:relative;'><h4>" + safeHouse.id + ":" + safeHouse.name + "</h4><p>" + safeHouse.address + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a class='btn_views' data-safeid='" + safeHouse.id + "'>View</a></div></div>";
                                            }
                                        } else if (status == 2 && safeHouse.active == "No") {
                                            if (safeHouse.active == "Yes") {
                                                display += "<div class='box row-content' style='position:relative;'><h4>" + safeHouse.id + ":" + safeHouse.name + "</h4><p>" + safeHouse.address + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a><a class='btn_views' data-safeid='" + safeHouse.id + "'>View</a></div></div>"
                                            } else {
                                                display += "<div class='box row-content' style='position:relative;'><h4>" + safeHouse.id + ":" + safeHouse.name + "</h4><p>" + safeHouse.address + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a class='btn_views' data-safeid='" + safeHouse.id + "'>View</a></div></div>";
                                            }

                                        } else if (status == 1 && safeHouse.active == "Yes") {
                                            if (safeHouse.active == "Yes") {
                                                display += "<div class='box row-content' style='position:relative;'><h4>" + safeHouse.id + ":" + safeHouse.name + "</h4><p>" + safeHouse.address + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a><a class='btn_views' data-safeid='" + safeHouse.id + "'>View</a></div></div>"
                                            } else {
                                                display += "<div class='box row-content' style='position:relative;'><h4>" + safeHouse.id + ":" + safeHouse.name + "</h4><p>" + safeHouse.address + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a class='btn_views' data-safeid='" + safeHouse.id + "'>View</a></div></div>";
                                            }
                                        }
                                    }
                                });
                            }
                        });
                    });
                }
            });
            $('#safehouses').html(display);
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
            //console.log(output);
            //$("#safehouses").empty();
            // if (output == null) {
            //     var $sample = $(" <p> Safehouses not assigned </p> ");
            //     $("#safehouses").append($sample);
            // } else {
            //     for (var i = 0; i < output.length; i++) {
            //         let obj = output[i];
            //         console.log(obj);
            //         var $sample = "";
            //         $sample += "<div class='box row-content' style='position:relative;'><h4>" + obj['safeHouseName'] + "</h4><p>" + obj['safeHouseAddress'] + "</p>";
            //         $sample += "<div class='row' style='text-align: right; margin: 0 auto;display:block'>";
            //         if (obj['isUsing'] == "y") {
            //             $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
            //         }
            //         $sample += "<a class='btn_views' data-safeid='" + obj['safeHouseID'] + "'>View</a></div></div>";
            //         $("#safehouses").append($sample);

            //     }
            // }
        }

        function getSafeHouseById(i) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>dmcsafehouse/" + i,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            if (output == null) {
                // $('#view').html("<h3 class='text-center'>Select safehouse to view</h3>");

            } else {
                console.log(output['safeHouseName']);
                $(".name").text(output['safeHouseName'])
                $(".address").text(output['safeHouseAddress'])
                if (output['isUsing'] == 'n') {
                    $(".activelbl").hide();
                }
                // $("#tel").text(output['safeHouseTelno'])
            }
        }

        function getSafeHouseRecent(i) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>recentsh/" + i,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            if (output == null) {
                $("#recent").hide();
                // var $sample = $(" <p> No recent activity found</p> ");
                // $("#recent").append($sample);

            } else if (output['isUsing'] == 'y') {
                console.log(output['safeHouseName']);

                $("#male").text(output['adultMale']);
                $("#female").text(output['adultFemale']);
                $("#children").text(output['children']);
                $("#disabled").text(output['disabledPerson']);
                $("#note").text(output['note']);
                $("#date").text(output['createdDate']);

            } else if (output['isUsing'] == 'n') {
                $("#recent").hide();
            }
        }

        function getResponsible(i) {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>responsible/" + i,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            if (output == null) {
                $("#responsible").hide();
                // var $sample = $(" <h4> Responsible person not assigned.</h4> ");
                // $("#responsible").append($sample);

            } else if (output['isUsing'] == 'y') {
                // console.log(output['safeHouseName']);

                $("#rname").text(output['empName'])
                $("#rtele").text(output['empTele'])


            } else if (output['isUsing'] == 'n') {
                // $("#responsible").empty();
                $("#responsible").hide();

            }
        }
    </script>
</body>

</html>