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
                        <h1 class="text-center">Death Compensation</h1>

                        <div class="tab">
                            <div class="row">
                                <div class="col3">
                                    <label for="disaster">Disaster</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="disaster" name="disaster" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="doc">Date</label>
                                </div>

                                <div class="col9 row-content" style="align-items: center;">
                                    <input type="date" id="birthday" name="birthday" class="datesInForms">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">Full name of deceased person</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="fname" name="fname" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">ID</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="NIC" name="NIC" placeholder="NIC">
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
                                    <label for="TP number">Tele Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="tpnumber" name="tpnumber" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="occupation">Occupation</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="occupation" name="occupation" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="tab">
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">Applicant Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="fname" name="fname" placeholder="">
                                </div>
                            </div>
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
                                    <label for="nic">NIC</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="doc">Date of Death</label>
                                </div>
                                <div class="col9 row-content" style="align-items: center;">
                                    <input type="date" id="birthday" name="birthday" class="datesInForms">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="lastwill">Last will?</label>
                                </div>
                                <div class="col9">
                                    <select id="lastwill" name="lastwill">
                                        <option value="null">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Number of Heirs</label>
                                </div>
                                <div class="col9 row-content" style="align-items: center;">
                                    <input type="number" id="birthday" name="birthday" class="datesInForms">
                                </div>
                            </div>
                        </div>

                        <div class="tab">
                            <h3>Bank Details of Heirs</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="fname" name="fname" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="bank">Bank</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="bank" name="bank" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="branch">Branch</label>
                                </div>
                                <div class="col9">
                                    <select id="branch" name="branch">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Horana</option>
                                        <option value="Colombo">Bandaragama</option>
                                        <option value="Kaluthara">Beruwala</option>
                                        <option value="Kaluthara">Millaniya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Accont Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="nic" name="nic" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="upload">Upload certified photocopies</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Incident Report</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Death Certificate</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">NIC or ID Certification</label>
                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Heirs certification and their identity certification</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>
                            <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

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