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
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
    .custom-model-main {
    text-align: center;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0; /* z-index: 1050; */
    outline: 0;
    opacity: 0;
 transition: opacity 0.15s linear, z-index 0.15;
    z-index: -1;
    overflow-x: hidden;
    overflow-y: auto;
  }
  
  .model-open {
    z-index: 99999;
    opacity: 1;
    overflow: hidden;
  }
  .custom-model-inner {
    transform: translate(0, -25%);
    transition: -webkit-transform 0.3s ease-out;
    transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
    display: inline-block;
    vertical-align: middle;
    width: 600px;
    margin: 30px auto;
    max-width: 97%;
  }
  .custom-model-wrap {
    display: block;
    width: 100%;
    position: relative;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    background-clip: padding-box;
    outline: 0;
    text-align: left;
    padding: 20px;
    box-sizing: border-box;
    max-height: calc(100vh - 70px);
    overflow-y: auto;
  }
  .model-open .custom-model-inner {
    transform: translate(0, 0);
    position: relative;
    z-index: 999;
  }
  .model-open .bg-overlay {
    background: rgba(0, 0, 0, 0.6);
    z-index: 99;
  }
  .bg-overlay {
    background: rgba(0, 0, 0, 0);
    height: 100vh;
    width: 100%;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    transition: background 0.15s linear;
  }
  .close-btn {
    position: absolute;
    right: 0;
    top: -30px;
    cursor: pointer;
    z-index: 99;
    font-size: 30px;
    color: #fff;
  }
  td{
    border: none;
    text-align: left;
    vertical-align: middle;
}
.unit{
    margin: 16px 3px;
    margin-bottom: -25px;
}
#trow tr:hover{
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
                            <th>Unit
                                <select id="unitType" name="unitType" class="form-control" required='true'>
                                    <option value="">Select Type</option>
                                </select>
                            </th>
                            <!-- <th>Availability
                                <select id="milestone-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Availabile</option>
                                    <option>Not Availabile</option>
                                </select>
                            </th> -->
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                            <th style="width: 15%;">
                                <input type="submit" value="Add" id="addInventoryItem"  class="form-control">
                            </th>
                            <th style="width: 15%;">
                                <input type="submit" value="Release" id="updateInventoryItem" class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>

                <div class="panel panel-primary filterable">
                    <table id="task-list-tbl" class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%;"></th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                            </tr>
                        </thead>
                        <tbody id="trow">                                            
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
        <div class="custom-model-main" id="addItem"> 
                    <div class="custom-model-inner">
                        <div class="close-btn">×</div>
                        <div class="custom-model-wrap">
                            <div class="pop-up-content-wrap">
                                <form id='add' name="add" method="post">
                                    <h1>Add Item</h1>
                                    <div class="row-content">
                                    <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <label for="your_name">Unit</label>
                                                    <select id="itemId" name="itemId" class="form-control" required='true'>
                                                        <option value="" data-unit="0">Select Type</option>
                                                    </select>
                                                    </td>
                                                </tr>
                                        </table>  
                                        
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                <label for="your_name">Quantity</label>
                                                <input type="text" id="quantity" name="quantity" placeholder="Item Quantity" title="Type" onkeypress="return isNumber(event)" class="form-control" required='true'>
                                                </td>
                                                <td>
                                                <label class="unit" id="unit"></label>
                                                </td>
                                            </tr>
                                        </table>    
                                        <!-- <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <label for="method">Received Method</label>
                                                    <textarea id="method" name="method" required='true'></textarea>
                                                    </td>
                                                </tr>

                                        </table>    -->
                                        <div class="row" style="justify-content: center;">
                                            <input type="submit" value="Send" class="btn-alerts" />
                                            <input type="reset" value="Reset" class="btn-alerts" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-overlay"></div>
            </div>
            <div class="custom-model-main" id="updateItem"> 
                    <div class="custom-model-inner">
                        <div class="close-btn">×</div>
                        <div class="custom-model-wrap">
                            <div class="pop-up-content-wrap">
                                <form id='updateForm' name="updateForm" method="post">
                                    <h1>Remove Item</h1>
                                    <div class="row-content">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <label for="your_nic">Item Name</label>
                                                    <select id="itemId2" name="itemId2" class="form-control" required='true'>
                                                        <option value="" data-unit="0">Select Type</option>
                                                    </select>
                                                    </td>
                                                </tr>
                                        </table>  

                                        
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                <label for="your_name">Quantity</label>
                                                <input type="text" id="quantity2" name="quantity2" placeholder="Item Name" onkeypress="return isNumber(event)"  title="Type" class="form-control" required='true'>
                                                </td>
                                                <td>
                                                <label class="unit" id="unit2"></label>
                                                </td>
                                            </tr>
                                        </table>   
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <label for="reason">Reason</label>
                                                    <select id="reason" name="reason" class="form-control" required='true'>
                                                        <option value="Damaged" data-unit="0">Damaged</option>
                                                        <option value="Expired" data-unit="0">Expired</option>
                                                        <option value="o" data-unit="0">Other</option>                                              
                                                    </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: #fff;">
                                                    <textarea id="other" name="other"></textarea>
                                                    </td>
                                                </tr>
                                        </table>                                      
                                        <div class="row" style="justify-content: center;">
                                            <input type="hidden" value="1" name="release" id="release">
                                            <input type="submit" value="Update" class="btn-alerts" />
                                            <input type="reset" value="Reset" class="btn-alerts" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-overlay"></div>
            </div>
            <div id="alertBox">

            </div>
    </section>
    <script>
        var thisPage = "#Maintain";
        getUnit();
        getItem();
        getInventory();
        updateAvailableList()
        //$("#alertBox").hide();
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#addInventoryItem").on('click', function() {
                $("#addItem").fadeIn();
                $("#addItem").addClass('model-open');
            });
            $("#updateInventoryItem").on('click', function() {
                $("#updateItem").fadeIn();
                $("#updateItem").addClass('model-open');
                $("#other").hide();
            });
            $(".close-btn, .bg-overlay").click(function() {
                $(".custom-model-main").removeClass('model-open');
            });
            $('#itemId').change(function(){
                var selected = $(this).find('option:selected');
                var extra = selected.data('unit'); 
                if(extra != ""){
                    $("#unit").html(extra);
                }else{
                    $("#unit").html("");
                }
            }); 
            $('#itemId2').change(function(){
                var selected = $(this).find('option:selected');
                var extra = selected.data('unit'); 
                if(extra != ""){
                    $("#unit2").html(extra);
                }else{
                    $("#unit2").html("");
                }
            });
            $('#reason').change(function(){
                var selected = $(this).find('option:selected');
                var extra = selected.text(); 
                if(extra == "Other"){
                    $("#other").show();
                }else{
                    $("#other").hide();
                }
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        function getUnit(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>unit",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            var select = document.getElementById("unitType");
            for (var i = 0; i < output.length; i++){
                var opt = document.createElement('option');
                opt.value = output[i]['unitName'];
                opt.innerHTML = output[i]['unitName'];
                select.appendChild(opt);
            }
        }  
        function getItem(){
            var x = "<?php echo $_SESSION['key'] ?>"; 
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>item",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            for (var i = 0; i < output.length; i++){
                var opt = new Option("option text",output[i]['itemId'] );
                $(opt).html(output[i]['itemName']);
                $(opt).attr('data-unit', output[i]['unitName']);
                $("#itemId").append(opt);
            }

        }

        function updateAvailableList(){
            output2 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>availableItem",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            $("#itemId2").find('option').not(':first').remove();
            for (var i = 0; i < output2.length; i++){
                var opt2 = new Option("option text",output[i]['itemId'] );
                $(opt2).html(output2[i]['itemName']);
                $(opt2).attr('data-unit', output2[i]['unitName']);
                $("#itemId2").append(opt2);
            }
        }

        function getInventory(){
            var x = "<?php echo $_SESSION['key'] ?>";
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>inventory",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("trow");
            for (var i = 0; i < output.length; i++){
                let obj = output[i];
                let row = table.insertRow(-1);
                let id ="data_"+i;
                row.id = id;
                row.className = "task-list-row";
                $("#data_"+i).attr('data-unit', obj['unitName']);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                cell1.innerHTML  = obj['itemId'];
                cell2.innerHTML = obj['itemName'];
                cell3.innerHTML = obj['quantity'];
                //cell3.colSpan ="2";
                cell4.innerHTML = obj['unitName'];
            }
        }
        $("#add").submit(function(e) {
                e.preventDefault();
                //$(".custom-model-main").removeClass('model-open');
                $(".custom-model-main").fadeOut();
                var str = [];
                var formElement = document.querySelector("#add");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                $("#add").trigger("reset");
                var json = JSON.stringify(object);
                //console.log(json);
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>inventory",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
						$('#trow').empty();
                        getInventory();
                        updateAvailableList()
                        console.log(result);
                        if(result.code==806){
                            alertGen("Record Added Successfully!",1);
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
					},
					error: function(err) {
						alertGen("Something went wrong.",3);
                        console.log(err);
					}
				});
        });
        $("#updateForm").submit(function(e) {
                e.preventDefault();
                //$(".custom-model-main").removeClass('model-open');
                $(".custom-model-main").fadeOut();
                var str = [];
                var formElement = document.querySelector("#updateForm");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                object['itemId'] = object['itemId2'];
                object['quantity'] = object['quantity2'];
                delete object.itemId2;
                delete object.quantity2;
                $("#updateForm").trigger("reset");
                var json = JSON.stringify(object);
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>inventory",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
						$('#trow').empty();
                        getInventory();
                        updateAvailableList()
                        console.log(result);
                        if(result.code==806){
                            alertGen("Record Added Successfully!",1);
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
					},
					error: function(err) {
						alertGen("Something went wrong.",3);
                        console.log(err);
					} 
				});
        });
        function alertGen($messege,$type){
            if ($type == 1){
                $("#alertBox").html("  <div class='alert success-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else if($type == 2){
                $("#alertBox").html("  <div class='alert warning-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else{
                $("#alertBox").html("  <div class='alert danger-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }
        }
        function isNumber(e) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
                return false;
            }
            return true;
        }
        var filters = {
                unit: null
            };

        function updateFilters() {
            $('.task-list-row').hide().filter(function () {
                var
                    self = $(this),
                    result = true; // not guilty until proven guilty

                Object.keys(filters).forEach(function (filter) {
                    if (filters[filter] && (filters[filter] != 'None') && (filters[filter] != 'Any')) {
                        result = result && filters[filter] === self.data(filter);
                    }
                });

                return result;
            }).show();
        }
        function changeFilter(filterName) {
            filters[filterName] = this.value;
            updateFilters();
        }
        $('#unitType').on('change', function () {
            changeFilter.call(this, 'unit');
        });
        $(document).on('click','.closeMessege',function () {
            $(".alert").fadeOut(100);
                console.log("hello");
        });
    </script> 
</body>
</html>