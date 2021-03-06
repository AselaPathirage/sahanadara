<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
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
        <div id="alertBox">
        </div>
        <div class="container col8">
            <div class="box">
                <form id="add">
                    <div class="box1">
                        <h1 class="text-center">Initial Incident Report</h1>
                        <!-- <div class="row">
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Kalutara</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Kaluthara</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">DS Office</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Kalutara</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Kaluthara</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">

                        <div class="row">
                            <div class="col3">
                                <label for="user role">GN division</label>
                            </div>
                            <div class="col9">
                                <select id="District" name="District">
                                    <option value="null">Kalutara</option>
                                    <option value="Gampaha">Gampaha</option>
                                    <option value="Colombo">Colombo</option>
                                    <option value="Kaluthara">Kaluthara</option>
                                </select>
                            </div>
                        </div>


                    </div> -->



                        <div class="row">
                            <div class="col3">
                                <label for="crusttype">Date of commenced</label>
                            </div>
                            <div class="col9 row-content" style="align-items: center;">
                                <input type="date" id="datePicker" name="datePicker" class="datesInForms" max="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="user role">Disaster</label>
                            </div>
                            <div class="col9">
                                <select id="disaster" name="disaster">

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="fname">Location of incident</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="location" name="location" placeholder="Location of incident" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="fname">Cause</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="cause" name="cause" placeholder="Cause" required>
                            </div>
                        </div>
                        <h4 class="text-center">Reporting on the Impact of Disaster</h4>

                        <div class="row">
                            <div class="col6">
                                <div class="col12">
                                    <h4 class="" style="padding:0 80px">Affected</h4>
                                </div>

                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">Families</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="afam" name="afam" placeholder="0" min=0 step="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">People</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="apeople" name="apeople" placeholder="0" min=0 step="1">
                                    </div>
                                </div>

                            </div>
                            <div class="col6">
                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">Deaths</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="deaths" name="deaths" placeholder="0" min=0 step="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">Injured</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="injured" name="injured" placeholder="0" min=0 step="1">
                                    </div>
                                </div>
                                <div class="row" id="missingrow">
                                    <div class="col3">
                                        <label for="TP number">Missing</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="missing" name="missing" placeholder="0" min=0 step="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col6">
                                <div class="col12">

                                    <h4 class="" style="padding:0 80px">Houses Damaged</h4>
                                </div>

                                <div class="row">
                                    <div class="col4" style="text-align: right;">
                                        <label for="TP number">Fully</label>
                                    </div>
                                    <div class="col8">
                                        <input type="number" id="hfull" name="hfull" placeholder="0" min=0 step="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col4" style="text-align: right;">
                                        <label for="TP number">Partially</label>
                                    </div>
                                    <div class="col8">
                                        <input type="number" id="hpartial" name="hpartial" placeholder="0" min=0 step="1">
                                    </div>
                                </div>

                            </div>
                            <div class="col6">
                                <div class="col12">

                                    <h4 class="" style="padding:0 80px">Other Damages</h4>
                                </div>

                                <div class="row">
                                    <div class="col4" style="text-align: right;">
                                        <label for="TP number">Enterprises </label>
                                    </div>
                                    <div class="col8">
                                        <input type="number" id="enterprises" name="enterprises" placeholder="0" min=0 step="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col4" style="text-align: right;">
                                        <label for="TP number">Infrastructure
                                        </label>
                                    </div>
                                    <div class="col8">
                                        <input type="number" id="infra" name="infra" placeholder="0" min=0 step="1">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row" id="safe">

                            <div class="col12">

                                <h4 class="" style="padding:0 80px">Safe Locations</h4>
                            </div>

                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Number of safe houses</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="safenum" name="safenum" placeholder="0" min=0 step="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">Families</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="sfam" name="sfam" placeholder="0" min=0 step="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="TP number">People</label>
                                </div>
                                <div class="col8">
                                    <input type="number" id="speople" name="speople" placeholder="0" min=0 step="1">
                                </div>
                            </div>

                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="row">
                                <div class="col3" style="text-align: right;">
                                    <label for="remarks">Remarks</label>
                                </div>
                                <div class="col9">
                                    <textarea type="text" id="remarks" name="remarks" placeholder="Remarks" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row " style="text-align:right;justify-content: right;">
                            <input type="reset" style="background-color: red;" value="Cancel">
                            <input type="submit" style="background-color: darkblue;" value="Submit">
                        </div>
                    </div>
                </form>
            </div>

        </div>






    </section>
    <script>
        var thisPage = "#incidents";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            document.getElementById('datePicker').valueAsDate = new Date();

            getDisasterType();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
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

        $('#disaster').on('change', function() {

            if ($('#disaster').val() == 3) {
                $('#safe').hide();
                $('#missingrow').hide();
            } else {
                $('#safe').show();
                $('#missingrow').show();
            }
        });

        $("#add").submit(function(e) {
            e.preventDefault();

            var str = [];
            var formElement = document.querySelector("#add");
            var formData = new FormData(formElement);
            //var array = {'key':'ABCD'}
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
            });

            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "POST",
                url: "<?php echo API; ?>gninitial",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    var url = "<?php echo HOST; ?>/GramaNiladari/IncidentReporting";
                    console.log(result.code);
                    if (result.code == 806) {
                        alertGen("Record Added Successfully!", 1);
                    } else {
                        alertGen(" Unable to handle request.", 2);
                    }
                    setTimeout(function() {
                        $(location).attr('href', url);
                    }, 1000);
                },
                error: function(err) {
                    alertGen(" Something went wrong.", 3);
                    console.log(err);
                }
            });
        });

        function alertGen($messege, $type) {
            if ($type == 1) {
                $("#alertBox").html("  <div class='alert success-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else if ($type == 2) {
                $("#alertBox").html("  <div class='alert warning-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else {
                $("#alertBox").html("  <div class='alert danger-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }
        }
    </script>
</body>

</html>