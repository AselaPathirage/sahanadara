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
    <style type="text/css">
        .tab {
            display: none;
        }

        button {
            margin-top: 15px;
            margin-left: 20px;
            color: black;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }


        #prevBtn {
            background-color: #bbbbbb;
        }
    </style>

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
                <form action="" id="regForm">
                    <div class="box1">
                        <h1 class="text-center">Property Compensation</h1>

                        <div class="tab">
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">Province</label>
                                </div>
                                <div class="col9">
                                    <select id="Province" name="Province">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Western</option>
                                        <option value="Colombo">Southern</option>
                                        <option value="Kaluthara">Sabaragamuwa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="District">District</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Kaluthara</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Gmampaha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="Division">Division</label>
                                </div>
                                <div class="col9">
                                    <select id="Division" name="Division">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Agalawatta</option>
                                        <option value="Colombo">Bandaragama</option>
                                        <option value="Kaluthara">Beruwala</option>
                                        <option value="Kaluthara">Millaniya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="gnDiv">Grama Niladhari Division</label>
                                </div>
                                <div class="col9">
                                    <select id="gnDiv" name="gnDiv">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Koholana South</option>
                                        <option value="Colombo">Adhikarigoda</option>
                                        <option value="Kaluthara">Ukwatta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">Grama Niladhari Division Number</label>
                                </div>
                                <div class="col9">
                                    <input type="number" id="NIC" name="NIC" placeholder="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">Applicant Name with Initials</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="fname" name="fname" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">NIC</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col9">
                                    <textarea type="text" id="address" name="address" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Telephone Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="tpnumber" name="tpnumber" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">House Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="tpnumber" name="tpnumber" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="tab">
                            <h3>Damaged Property Details</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="relationship">Relationship</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="relationship" name="relationship" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="status" name="status" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="tla">Total Land Area</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="tla" name="tla" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="htype">House Type</label>
                                </div>
                                <div class="col9">
                                    <select id="branch" name="branch">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">1 storey</option>
                                        <option value="Gampaha">2 storey</option>
                                    </select>
                                </div>
                            </div>


                            <h3>Assessment of damaged property</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="relationship">Damaged property</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="relationship" name="relationship" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Rate per Feet</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Total Area</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Damaged Area</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Percentage</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Value of Damage</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Total Value</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="tab">
                            <div class="row">
                                <div class="col3">
                                    <label for="relationship">Photographs</label>
                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="status">Damage rate per cent</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="status" name="status" placeholder="">
                                </div>
                            </div>


                            <h3>Assessment of damaged Appliences</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="htype">Damaged Equipment Type</label>
                                </div>
                                <div class="col9">
                                    <select id="branch" name="branch">
                                        <option value="null">Select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="doc">Bought Date</label>
                                </div>
                                <div class="col9">
                                    <input type="date" id="doc" name="doc" placeholder="doc">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Value</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Estimated Value</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Total Value</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Total Compensation</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                            <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

                        </div>

                        <div class="tab">
                            <h3>Bank details of heirs</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Bank</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Branch</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Account Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <h3>Upload certified Copies</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Deed</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Home insurance certificate photocopy</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Bank pass book photocopy</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="nextBtn" onclick="nextPrev(1)" style="background-color:lightblue">Next</button>
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        </div>



    </section>
    <script>
        var thisPage = "#compensations";
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

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:

            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }
    </script>
</body>

</html>