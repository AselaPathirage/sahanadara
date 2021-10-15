
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
tr:hover{
  background:#c9e8f7;
  position:relative;
}
.radio-custom {
        opacity: 0;
        position: absolute;   
    }
    .radio-custom, .radio-custom-label {
        display: inline-block;
        vertical-align: middle;
        margin: 5px;
        cursor: pointer;
    }
    .radio-custom-label {
        position: relative;
    }
    .radio-custom + .radio-custom-label:before {
        content: '';
        background: #fff;
        border: 2px solid rgb(0, 0, 0);
        display: inline-block;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        padding: 2px;
        margin-right: 10px;
        text-align: center;
    }
    .radio-custom + .radio-custom-label:before {
        border-radius: 10%;
    }

    .radio-custom:checked + .radio-custom-label:before {
        content: "\E9A4";
        font-family: 'boxicons';
        color: #000;
    }
    .radio-custom:focus + .radio-custom-label {
    outline: 1px solid #ddd; /* focus style */
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
                <form id='add' name="add" method="POST">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th rowspan="2">
                                    <select id="unitType" name="unitType" class="form-control">
                                        <option>Select Type</option>
                                    </select>
                                </th>
                                <th rowspan="2">
                                    <input type="text" id="itemName" name="itemName" placeholder="Item Name" title="Type " class="form-control">
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
                </form>
        </div>
        <div class="box">
                <div class="panel panel-primary filterable">
                    <table  class="table" style="width: 100%;">
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
                        <tbody id="trow">                   
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
        </div>
    </section>
    <script>
        var thisPage = "#Add";
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            getUnit();
            getItem()
            $("#add").submit(function(e) {
                e.preventDefault();
                var str = [];
                var formElement = document.querySelector("#add");
                var formData = new FormData(formElement);
                //var array = {'key':'ABCD'}
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                object['key'] = 'cb08ca4a7bb5f9683c19133a84872ca7';
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
					type: "POST",
					url: "localhost/<?php echo baseUrl; ?>/InventoryManager_addItem/1234",
					data: json, 
					cache: false,
					success: function(result) {
						$('#trow').empty();
                        getItem();
					},
					error: function(err) {
						alert(err);
					}
				});
            });
		});

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        function getUnit(){
            var x = "cb08ca4a7bb5f9683c19133a84872ca7";
            console.log(x);
            output = $.parseJSON($.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>/InventoryManager_getUnit/1234",
                dataType: "json", 
                data : JSON.stringify({'key': x}),
                cache: false,
                async: false
            }).responseText);
            //console.log(output);
            var select = document.getElementById("unitType");
            for (var i = 0; i < output.length; i++){
                //console.log(i);
                var opt = document.createElement('option');
                opt.value = output[i]['unitId'];
                opt.innerHTML = output[i]['unitName'];
                select.appendChild(opt);
            }
        }
        function getItem(){
            var x = "cb08ca4a7bb5f9683c19133a84872ca7";
            console.log(x);
            output = $.parseJSON($.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>/InventoryManager_getItem/1234",
                dataType: "json", 
                data : JSON.stringify({'key': x}),
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            var table = document.getElementById("trow");
            for (var i = 0; i < output.length; i++){
                let obj = output[i];
                console.log(obj);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                var attribute = document.createElement("input");
                attribute.id = i;
                attribute.type ="radio";
                attribute.class ="radio-custom";
                attribute.name = "radio-group";
                var attribute2 = document.createElement("label");
                attribute2.for = i;
                attribute2.class ="radio-custom-label";
                cell1.append = attribute;
                //cell1.append = attribute2;
                cell2.innerHTML = obj['itemName'];
                cell3.innerHTML = obj['unitName'];
            }
        }
    </script>
</body>
</html>