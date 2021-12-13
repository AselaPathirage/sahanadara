<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/InventoryManager/includes/sidebar_safeHouse.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/InventoryManager/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
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

                <div class="container">
                        <div class="row">
                            <div class="col12">
                                <div class="box row-content">
                                    <h4>Millaniya Maha Vidyalya</h4>
                                    <p>Haltota, Millaniya Road, Tuttiripitiya</p>
                                    <p>Tele: 071-5632541, 035-5635413</p>
                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                        <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn_views">View</a>
                                    </div>
                                </div>
                                <div class="box row-content">
                                    <h4>Taxila Central College</h4>
                                    <p>Horana</p>
                                    <p>Tele: 071-5672554, 035-7135353</p>
                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn_views">View</a>
                                    </div>
                                </div>
                                <div class="box row-content">
                                    <h4>Bolossagama Central College</h4>
                                    <p>Bolossagama</p>
                                    <p>Tele: 077-5412554, 035-7735455</p>
                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn_views">View</a>
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
        var output={};
        getSafwHouse();
        function getSafwHouse(){
            var x = "<?php echo $_SESSION['key'] ?>"; 
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
        }
        console.log(output);
    </script>
</body>
</html>