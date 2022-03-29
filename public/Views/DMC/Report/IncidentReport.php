<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> DMC - Report </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchList.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php
    include_once('./public/Views/DMC/includes/sidebar_reports.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DMC/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>Incident Report</h1>
                </center>
                <form>
                    <div class="row-content">

                        <h2>Select the area</h2>
                        <div class="row">
                            <div class="col3"><label for="district">District</label>
                                <select id="district" name="district">
                                </select>
                            </div>
                            <div class="col3"><label for="dividion">Division</label>
                                <select id="dividion" name="dividion">
                                </select>
                            </div>
                            <div class="col3"><label for="gnDivision">GramaNiladari Division</label>
                                <select id="gnDivision" name="gnDivision">
                                </select>
                            </div>
                            <div class="col3">
                                <label for="crusttype">Incident</label>
                                <select id="crusttype" name="crust">
                                    <option value="wheat">All</option>
                                    <option value="wheat">Landslide</option>
                                    <option value="white">Flood</option>
                                </select>
                            </div>
                            <div class="col3">
                                <label for="crusttype">Start Date</label>
                                <input type="date" id="birthday" name="birthday">
                            </div>
                            <div class="col3">
                                <label for="crusttype">End Date</label>
                                <input type="date" id="birthday" name="birthday">
                            </div>
                        </div>

                        <div class="row" style="justify-content: center;">

                            <input type="submit" value="Generate" class="btn-alerts" />
                            <input type="reset" value="Cancel" class="btn-alerts" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/responsiblePersonAidReport.js"></script>
    <script>
        var thisPage = "#incident";
        $(document).ready(function() {
            $("#user,#safehouse,#compensation").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            var distOptions = "<option value=''>Select District</option>";
            $.getJSON('<?php echo HOST; ?>/public/assets/json/data.json', function(result) {
                $.each(result, function(i, district) {
                    distOptions += "<option value='" + district.dsId + "'>" + district.name + "</option>";
                });
                $('#district').html(distOptions);
            })
            $('#district').change(function() {
                var val = $(this).val();
                var divOptions = "<option value=''>Select Division</option>";
                $.getJSON('<?php echo HOST; ?>public/assets/json/data.json', function(result) {
                    $.each(result, function(i, district) {
                        if (district.dsId == val) {
                            $.each(district.division, function(j, division) {
                                divOptions += "<option value='" + division.dvId + "'>" + division.name + "</option>";
                            })
                        }
                    });
                    $('#dividion').html(divOptions);
                })
            })
            $('#dividion').change(function() {
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
                })
            })
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        document.getElementById('reset').onclick = function() {

        }
    </script>
</body>

</html>