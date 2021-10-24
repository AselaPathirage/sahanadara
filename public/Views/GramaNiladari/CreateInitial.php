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
            <div class="box">
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
                            <input type="date" id="birthday" name="birthday" class="datesInForms">
                        </div>
                    </div>
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="fname">Location of incident</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="NIC" name="NIC" placeholder="Location of incident">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="fname">Cause</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="NIC" name="NIC" placeholder="Cause">
                        </div>
                    </div>
                    <h4 class="text-center">Reporting on the Impact of Disaster</h4>

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
                                    <input type="text" id="TP number" name="TP number" placeholder="Families">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">People</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="People">
                                </div>
                            </div>

                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Deaths</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="Deaths">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Injured</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="Injured">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Missing</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="Missing">
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
                                <div class="col3">
                                    <label for="TP number">Fully</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="Fully">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Partially</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="Partially">
                                </div>
                            </div>

                        </div>
                        <div class="col6">
                            <div class="col12">

                                <h4 class="" style="padding:0 80px">Houses Damaged</h4>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Families</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="Families">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">People</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="People">
                                </div>
                            </div>

                        </div>
                    </div>


                    <h4 class="text-center">Office Details</h4>
                    <div class="row">
                        <div class="col3">
                            <label for="address">Address</label>
                        </div>
                        <div class="col9">
                            <textarea type="text" id="address" name="address" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="TP number">Telephone Number</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="TP number" name="TP number" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="row">

                        <div class="row">

                            <div class="col3">
                                <label for="TP number">Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="TP number" name="TP number" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col3">
                                <label for="TP number"> </label>
                            </div>
                            <div class="col9 row-content">
                                <span>* Enter password to save changes</span>
                            </div>
                        </div>




                    </div>
                    <h4 class="text-center">Reset Password</h4>
                    <div class="row">
                        <div class="col3">
                            <label for="TP number">New Password</label>
                        </div>
                        <div class="col9">
                            <input type="password" id="TP number" name="TP number" placeholder="New Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="TP number">Confirm Password</label>
                        </div>
                        <div class="col9">
                            <input type="password" id="TP number" name="TP number" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="address">Remarks</label>
                        </div>
                        <div class="col9">
                            <textarea type="text" id="address" name="address" placeholder="Address"></textarea>
                        </div>
                    </div>

                    <div class="row " style="text-align:right;justify-content: right;">
                        <input type="submit" style="background-color: red;" value="Cancel">
                        <input type="submit" style="background-color: darkblue;" value="Submit">
                    </div>
                    </form>
                </div>
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

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
    </script>
</body>

</html>