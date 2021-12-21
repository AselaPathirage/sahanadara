<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_divsec.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
 
        <!-- TABLE -->
        <div class="container">
            <div class="">

            <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Approved
                                <select id="assigned-user-filter" class="form-control">
                                    <option>All</option>
                                    <option>Approved</option>
                                    <option>Not Approved</option>
                                </select>
                            </th>
                            <th>Type
                                <select id="status-filter" class="form-control">
                                    <option>All</option>
                                    <option>Death</option>
                                    <option>Property</option>
                                </select>
                            </th>
                            
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>


                <div class="container" style="text-align: right;>
                <div style="display:block;">
                    
            </div>
            <div class="box">
            <div class="row text-center">
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <br>
                        <a href="" class="btn_active">Approve</a>
                    </div>
                    <div class="card row-content col5">
                        <h3>Millaniya Maha Vidyalaya</h3>
                        <p>Millaniya</p>
                        <p class="small"><b>Telephone Number -</b> 0778765586</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <br>
                        <a href="" class="btn_active">Approve</a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <br>
                        <a href="" class="btn_active">Approve</a>
                    </div>
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <br>
                        <a href="" class="btn_active">Approve</a>
                    </div>
                </div>
            </div>
        </div>        
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#Donation";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
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