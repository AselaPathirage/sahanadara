<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Safe House </title>
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
        include_once('./public/Views/DisasterOfficer/includes/sidebar_safeHouse.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">

        <!-- BOXES -->
        

        <!-- TABLE -->
        <!-- <div class="container">
            <div class="">

                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Active Status
                                <select id="status-filter" class="form-control">
                                <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </th>
                            <th>GN Division
                                <select id="assigned-user-filter" class="form-control">
                                    <option>all</option>
                                    <option>Koholana North</option>
                                    <option>Ukwatta</option>
                                </select>
                            </th>
                            
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table> -->
                <br>
                
                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn-fun">Add new safehouse</a>
                


                
               
                    
        
                    
            </div>

        <div class="container">
                        <div class="row">
                            <div class="col6">
                                <div class="box row-content">
                                    <h4>Millaniya Maha Vidyalya</h4>
                                    <p>Haltota, Millaniya Road, Tuttiripitiya</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                        <a href="/<?php echo baseUrl; ?>" class="btn_views">View</a>
                                    </div>
                                </div>
                                <div class="box row-content">
                                    <h4>Taxila Central College</h4>
                                    <p>Horana</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_views">View</a>
                                    </div>
                                </div>

                                <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>
                    <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div> -->
                            </div>
                            <div class="col6" style="overflow: auto">
                                <div class="box row-content" style="height:100%;min-height: 300px;">
                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                    </div>
                                    <h4>Millaniya Maha Vidyalya</h4>
                                    <p> Haltota, Millaniya Road, Tuttiripitiya</p>
                                    <p>Families - 20</p>
                                    <p>People - 85</p><br><br>
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn-box">Edit Safehouse</a>
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse" class="btn-box">Delete Safehouse</a>
                    <br><br>
                    
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/ResponsiblePerson" class="btn-box">Add Reponsible Person</a>
                    <a href="/<?php echo baseUrl; ?>/DisasterOfficer/Dashboard/ResponsiblePerson" class="btn-box">Delete Reponsible Person</a>


                    <br>



                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>




    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
    </script>
</body>
</html>