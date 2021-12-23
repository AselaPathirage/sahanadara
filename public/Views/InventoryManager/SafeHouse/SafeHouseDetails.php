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
<style>
.contact{
    min-width: 40%;
    max-width: 60%;
    border-collapse: collapse;
}
.contact tr{
  /* border-bottom: 1px solid black; */
}
.contact,tr,td{
    border: none;
    padding: 1px;
    background-color:#fefeee;
}
</style>
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
            <form>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Active Status
                                <select id="status" class="form-control">
                                    <option value="Any">All</option>
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
            </form>
            <div class="container">
                <div class="row">
                    <div class="col12" id="display">
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
            var distOptions = "<option value='Any'>Select District</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
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
            var divOptions = "<option value='Any'>Select Division</option>";
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
            var districtVal = $('#District').val();
            var divisionVal = $('#Division').val();
            var status = $('#status').val();
            var display ="";
            $.each(output,function(i,district){
                if((district.id == districtVal || districtVal =="Any") || (!districtVal || !divisionVal || !status)){
                        $.each(district.division,function(j,division){
                            $.each(division.gnArea,function(k,gnArea){
                                if((division.id == divisionVal || divisionVal =="Any") || (!districtVal || !divisionVal || !status)){
                                    $.each(gnArea.safeHouse,function(k,safeHouse){
                                        if(status == "Any"){
                                            if(safeHouse.active =="Yes"){
                                                display += "<div class='box row-content' style='background-color: rgb(176,224,230);'><h4>"+safeHouse.id+" : "+safeHouse.name+"</h4><address>"+safeHouse.address+"</address><p>Tele: ";
                                                var arrayLength = safeHouse.contact.length;
                                                for (var i = 0; i < arrayLength; i++) {
                                                    display += safeHouse.contact[i];
                                                    if((i+1) != arrayLength){
                                                        display += ", ";
                                                    }
                                                }
                                                display +="</p><br><table class='contact'><tr><td >Males</td><td>"+safeHouse.males+"</td></tr><tr><td>Female</td><td>"+safeHouse.females+"</td></tr><tr><td>Children</td><td>"+safeHouse.children+"</td></tr><tr><td>Disabled Person</td><td>"+safeHouse.disabledPerson+"</td></tr></table><p></p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a href='' class='btn_active'>Active </a></div></div>";
                                            }else{
                                                display += "<div class='box row-content'><h4>"+safeHouse.id+" : "+safeHouse.name+"</h4><address>"+safeHouse.address+"</address><p>Tele: ";
                                                var arrayLength = safeHouse.contact.length;
                                                for (var i = 0; i < arrayLength; i++) {
                                                    display += safeHouse.contact[i];
                                                    if((i+1) != arrayLength){
                                                        display += ", ";
                                                    }
                                                }
                                                display +="</p><div class='row' style='text-align: right; margin: 0 auto;display:block'></div></div>"; 
                                            }
                                        }else if(status == 2 && safeHouse.active == "No"){
                                            display += "<div class='box row-content'><h4>"+safeHouse.id+" : "+safeHouse.name+"</h4><address>"+safeHouse.address+"</address><p>Tele: ";
                                            var arrayLength = safeHouse.contact.length;
                                            for (var i = 0; i < arrayLength; i++) {
                                                display += safeHouse.contact[i];
                                                if((i+1) != arrayLength){
                                                    display += ", ";
                                                }
                                            }
                                            display +="</p><div class='row' style='text-align: right; margin: 0 auto;display:block'></div></div>";                                    
                                        }else if(status == 1 && safeHouse.active == "Yes"){
                                            display += "<div class='box row-content' style='background-color: rgb(176,224,230);'><h4>"+safeHouse.id+" : "+safeHouse.name+"</h4><address>"+safeHouse.address+"</address><p>Tele: ";
                                            var arrayLength = safeHouse.contact.length;
                                            for (var i = 0; i < arrayLength; i++) {
                                                display += safeHouse.contact[i];
                                                if((i+1) != arrayLength){
                                                    display += ", ";
                                                }
                                            }
                                            display +="</p><br><table class='contact'><tr><td >Males</td><td>"+safeHouse.males+"</td></tr><tr><td>Female</td><td>"+safeHouse.females+"</td></tr><tr><td>Children</td><td>"+safeHouse.children+"</td></tr><tr><td>Disabled Person</td><td>"+safeHouse.disabledPerson+"</td></tr></table><p></p><div class='row' style='text-align: right; margin: 0 auto;display:block'><a href='' class='btn_active'>Active </a></div></div>";
                                        }
                                    });   
                                }
                            });                       
                        });
                }
            });
            $('#display').html(display);
        }
        $('#search').keyup(function () {
            var filter = $(this).val();
            $('.box').each(function() {
                //console.log($(this).children("h4").text());
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }

            });
        });
    </script>
</body>
</html>