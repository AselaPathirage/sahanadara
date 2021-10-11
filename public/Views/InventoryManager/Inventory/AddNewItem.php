<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Inventory </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
#contextMenu {
  position: absolute;
  display: none
}

.wrap{
  width:90%;
  display:block;
  margin:0 auto;
}

table{border:1px solid rgba(221, 221, 221, 1);}

tr:nth-child(even) {background: #F5F5F5}

tr{
  position:relative;
}

tr:hover{
  background:#c9e8f7;
  position:relative;
}
</style>
</head>
<body>
    <?php
        include_once('./public/Views/InventoryManager/includes/sidebar_inventory.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/InventoryManager/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
        <div class="box">
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th rowspan="2">
                                <select id="assigned-user-filter" class="form-control">
                                    <option>Select Type</option>
                                    <option value="Dry rations">Dry rations</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Fuel">Fuel</option>
                                    <option value="Machinary">Machinary</option>
                                    <option value="Other">Other</option>
                                </select>
                            </th>
                            <th rowspan="2">
                                <input type="text" id="search" placeholder="Item Name" title="Type " class="form-control">
                            </th>
                            <th>
                                <input type="submit" id="search" value="+ Create New Item" class="form-control">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="reset" value="Reset" id="search" class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>
        </div>
        <div class="box">
                <div class="panel panel-primary filterable">
                    <table id="item-list-tbl" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">
                                </th>
                                <th style="width: 30%;">Name</th>
                                <th style="width: 30%;">Type
                                    <select id="" class="form-control">
                                        <option>Select Type</option>
                                        <option>Dry rations</option>
                                        <option>Rob</option>
                                        <option>Larry</option>
                                        <option>Donald</option>
                                        <option>Roger</option>
                                    </select>
                                </th>
                                <th style="width: 10%;">
                                <input type="submit" id="search" value="+ Create New Item" class="form-control">
                                </th>
                                <th style="width: 10%;">
                                <input type="submit" id="search" value="+ Create New Item" class="form-control">
                                </th>
                            </tr>
                        </thead>
                        <tbody>                   
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
    </section>
    <script>
        var thisPage = "#Add";
        $(document).ready(function() {
            getItem();
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
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
        
        function getItem(){
            output = $.parseJSON($.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>?api_key=1234&class=InventoryManager&method=getItem",
                dataType: "json", 
                data : {'key': 'ABCD'}, 
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            var table = document.getElementById("item-list-tbl");
            for (var i = 0; i < output.length; i++){
                let obj = output[i];
                let row = table.insertRow(-1);
                let cell0 = row.insertCell(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                var attribute = document.createElement("button");
                attribute.innerHTML = "update";
                attribute.setAttribute("onclick", "updateCompany("+ i +")");
                cell1.innerHTML = obj['itemName'];
                cell2.innerHTML = obj['itemType'];
                //cell3.appendChild(attribute);
            }
        }
    </script>
</body>
</html>