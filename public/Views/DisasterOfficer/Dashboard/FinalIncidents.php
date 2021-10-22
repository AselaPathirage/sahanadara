<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_disofficer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DisasterOfficer/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="space"></div>

<div class="container col8">
    <div class="box">
        <div class="box1">
            <h1 class="text-center">Final Incident</h1>
            <div class="row">
                <div class="col3">
                    <label for="doc">Date of Commenced</label>
                </div>
                <div class="col9">
                    <input type="date" id="doc" name="doc" placeholder="doc">
                </div>
            </div>
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
                    <label for="lname">Disaster</label>
                </div>
                <div class="col9">
                    <input type="text" id="lname" name="lastname" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">Event</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="email">Location of Incident</label>
                </div>
                <div class="col9">
                    <input type="text" id="email" name="email" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="address">Cause</label>
                </div>
                <div class="col9">
                    <textarea type="text" id="address" name="address" placeholder=""></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="TP number">Reporting on the impact of disaster</label>
                </div>
               
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">Families</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">Families</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">Families</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">People</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">Deaths</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">Injured</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
                </div>
            </div>
            
            <div class="row">
                <div class="col3">
                    <label for="fname">Missing</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
                </div>
            </div>
            <div class="row">
                <div class="col3">
                    <label for="fname">Hospitalized</label>
                </div>
                <div class="col9">
                    <input type="text" id="NIC" name="NIC" placeholder="0">
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
        var thisPage = "#Incidents";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
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