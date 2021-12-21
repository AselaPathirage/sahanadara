<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>public/assets/css/style.css">
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
                            <select id="status" class="form-control">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </th>
                        <th>District
                            <select id="District" class="form-control">
                            </select>
                        </th>
                        <th>Division
                            <select id="Division" class="form-control">
                            </select>
                        </th>
                        <th>Search
                            <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">Reset</th>
                        <th></th>
                    </tr>
                </thead>
            </table>

            <div class="container">
                <div class="row">
                    <div class="col12" id="display">
                        <div class="box row-content">
                            <h4>Millaniya Maha Vidyalya</h4>
                            <p>Haltota, Millaniya Road, Tuttiripitiya</p>
                            <p>Tele: 071-5632541, 035-5635413</p>
                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn_views">View</a>
                            </div>
                        </div>
                        <div class="box row-content" style="background-color: rgb(176,224,230);">
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
        var output = {};
        var district = {};
        getSafwHouse();
        $(document).ready(function(){
            var distOptions = "<option value=''>Select District</option>";
            $.getJSON('/<?php echo baseUrl; ?>/public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    distOptions += "<option value='"+district.dsId+"'>"+district.name+"</option>";
                });
                 $('#District').html(distOptions);
            });
            viewDetails();
        });
        function getSafwHouse(){
            var x = "<?php echo $_SESSION['key'] ?>";
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': x
                },
                cache: false,
                async: false
            }).responseText);
        }
        function resetSelectElement(selectElement) {
            selecElement.selectedIndex = 0;
        }
        $('#District').change(function(){
            var val = $(this).val();
            document.getElementById("Division").selectedIndex = 0;;
            var divOptions = "<option value=''>Select Division</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    if(district.dsId == val){
                        $.each(district.division,function(j,division){
                           divOptions += "<option value='"+division.dvId+"'>"+division.name+"</option>";  
                        })
                    }
                });
                $('#Division').html(divOptions);
            });
            viewDetails();
        })
        $('#Division').change(function(){
            viewDetails();
        })
        $('#status').change(function(){
            viewDetails();
        })
        function viewDetails() {
            var district = $('#District').val();
            var division = $('#Division').val();
            var status = $('#status').val();
            console.log(output);
            $.each(output,function(i,district){
                console.log(i);
                console.log(district.id);
                if(district.id == 3){
                    console.log("fff");
                        $.each(district.division,function(j,division){
                           console.log("division.dvId");
                           //console.log(division.name);
                        })
                }
            });
            //$('#display').html("");
        }
    </script>
</body>

</html>