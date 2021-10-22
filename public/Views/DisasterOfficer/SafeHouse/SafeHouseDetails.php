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
        <div class="container">
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
                                    <option>Keselwatta</option>
                                    <option>Maradana</option>
                                </select>
                            </th>
                            
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>
                
                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn-fun">Add new safehouse</a>
                


                <div class="row">
                <div class="col6">
                    <div class="box row-content">Name<br>Location<br>Families<br>people</div>
                    <div class="box row-content">Name<br>Location<br>Families<br>people</div>
                    <div class="box row-content">Name<br>Location<br>Families<br>people</div>
                    <div class="box row-content">Name<br>Location<br>Families<br>people</div>
                    <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>
                    <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div> -->
                </div>
                <div class="col6" style="overflow: auto">
                    <div class="box row-content" style="height:100%;min-height: 300px;">
                    Safe House Status<br><br>
                    <div class="forms">
                    <form action="./editSafehouse.php" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                        <button type="submit" id="editSafehouseBtn" class="btn-box" name="btnEdit">Edit Safehouse</button>
                    </form>
                    <br>
                    <form action="../Controls/deleteSafehouse.php" method="POST">
                        <button type="submit" id="delete" class="btn-box" name="btnDelete">Delete Safehouse</button>
                    </form>
                    <br>
                    <form action="../Controls/addresponsibleperson.php" method="POST">
                        <button type="submit" id="add" class="btn-box" name="btnAdd">Add Reponsible Person</button>
                    </form>
                    <br>
                    <form action="../Controls/editResponsibleperson.php" method="POST">
                        <button type="submit" id="delete" class="btn-box" name="btnEdit">Edit Safehouse</button>
                    </form>
                    <br>
                    <form action="../Controls/removeresponsibleperson.php" method="POST">
                        <button type="submit" id="delete" class="btn-box" name="btnDelete">Delete Responsible Person</button>
                    </form>
                   
        
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