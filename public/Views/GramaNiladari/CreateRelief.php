<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_admin.css">
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

        <div class="container col8">
            <form id="add">
                <div class="box">
                    <div class="box1">
                        <h1 class="text-center">Relief Report</h1>
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
                                <label for="crusttype">Date </label>
                            </div>
                            <div class="col9 row-content" style="align-items: center;">
                                <input type="date" id="datePicker" name="datePicker" class="datesInForms">
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col3">
                                <label for="user role">Disaster</label>
                            </div>
                            <div class="col9">
                                <select id="District" name="District">
                                    <option value="null">Flood</option>
                                    <option value="Gampaha">Landslide</option>
                                    <option value="Colombo">Lightening</option>

                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col3">
                                <label for="fname">Location of incident</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="NIC" name="NIC" placeholder="Location of incident">
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col3">
                                <label for="fname">Cause</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="cause" name="cause" placeholder="Cause" required>
                            </div>
                        </div>
                        <h4 class="text-center">Relief Required Families</h4>
                        <h4 class="text-center">Dry Rations</h4>

                        <div class="row">
                            <div class="col6">
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">1 member</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="m1" name="m1" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">2 members</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="m2" name="m2" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">3 members</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="m3" name="m3" placeholder="0">
                                    </div>
                                </div>


                            </div>
                            <div class="col6">
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">4 members</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="m4" name="m4" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">5 members</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="m5" name="m5" placeholder="0">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <h4 class="text-center">Other (Rs)</h4>

                        <div class="row">
                            <div class="col6">
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">Cooked food</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="cooked" name="cooked" placeholder="Rs 0">
                                    </div>
                                </div>
                            </div>
                            <div class="col6">
                                <div class="row">
                                    <div class="col5" style="text-align: right;">
                                        <label for="TP number">Emergency suppliess</label>
                                    </div>
                                    <div class="col7">
                                        <input type="number" id="emer" name="emer" placeholder="Rs 0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-center">Grama Niladari - Status (Total by the date)
                        </h4>

                        <div class="row">
                            <div class="col6">
                                <div class="col6">
                                    <h4 class="" style="padding:0 80px">Affected</h4>
                                </div>

                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">Families</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="fam" name="fam" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">People</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="people" name="people" placeholder="0">
                                    </div>
                                </div>

                            </div>
                            <div class="col6">
                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">Deaths</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="deaths" name="deaths" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">Injured</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="injured" name="injured" placeholder="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col3">
                                        <label for="TP number">Missing</label>
                                    </div>
                                    <div class="col9">
                                        <input type="number" id="missing" name="missing" placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row" style="margin-top:20px;">
                            <div class="row">
                                <div class="col3" style="text-align: right;">
                                    <label for="remarks">Remarks</label>
                                </div>
                                <div class="col9">
                                    <textarea type="text" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row " style="text-align:right;justify-content: right;">
                            <input type="reset" style="background-color: red;" value="Cancel">
                            <input type="submit" style="background-color: darkblue;" value="Submit">
                        </div>

                    </div>
                </div>

            </form>

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

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

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
                url: "<?php echo API; ?>gnrelief",
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