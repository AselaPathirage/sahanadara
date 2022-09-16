<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Inventory </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .create {
            background-color: rgb(148, 215, 190);
            height: 50px;
            width: 100%;
            padding: 14px;
            text-align: center;
            border-radius: 5px;
            line-height: 25px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .create:hover {
            background-color: rgb(163, 230, 205);
        }

        .view {
            background-color: rgb(241, 67, 67);
            height: 50px;
            width: 100%;
            padding: 14px;
            text-align: center;
            border-radius: 5px;
            line-height: 25px;
            color: black;
            font-weight: bold;
        }

        .view:hover {
            background-color: rgb(246, 139, 139);
        }
        td{
                border: none;
                text-align: left;
                vertical-align: middle;
        }
        .add {
            background-color: #04AA6D;
            color: #ffdddd;
        }

        .remove {
            color: #ffdddd;
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
                <center><h1 id="header"></h1></center>
                <form id="add">
                <fieldset>
                        <div style="padding-left:15% ;">
                                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                            <table style="border: none !important;width:90%;">
                                                <tr>
                                                    <td style="background-color: #fff;">Requesting From</td>
                                                    <td style="background-color: #fff;">                                
                                                        <select id="division" class="form-control">
                                                            <option value="0" selected>Any</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: #fff;">Required Date</td>
                                                    <td style="background-color: #fff;"><input type="date" id="requiredDate" name="requiredDate"  style="width: 100%;" min="<?php echo date("Y-m-d"); ?>" required='true'></td>
                                                </tr>
                                                <tr style="background-color: #fff;">
                                                    <td>Note</td>
                                                    <td><textarea id="notes" name="notes" rows="4" cols="50"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: #fff;">Requesting for</td>
                                                    <td style="background-color: #fff;">
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 90%;">
                                                <tr>
                                                    <td>
                                                        <label for="itemId">Item Name</label>
                                                    </td>
                                                    <td>
                                                        <select id="itemId" name="itemId" class="form-control">
                                                            <option value="0" data-unit="0">Select Item</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="button" name="add" id="add" class="form-control add">Add</button>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="table-repsonsive">
                                                <span id="error"></span>
                                                <table class="table table-bordered" style="width:90%;margin:0" id="item_table">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%;">Item Id</th>
                                                            <th style="width: 30%;">Item</th>
                                                            <th style="width: 30%;">Required Quantity</th>
                                                            <th style="width: 10%;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="trow"></tbody>
                                                </table>
                                            </div>
                                            <div style="float: right;width:30%">
                                                <table style="border: none !important;width:100%;">
                                                    <tr>
                                                        <td><input type="reset" style="margin-top: 0px;" class="view"></td>
                                                        <td><input type="submit" class="create"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    <div id="alertBox">
    </div>
    <script>
        var thisPage = "#Service";
        var data;
        var output, output2,temp={};
        var count = 0;
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $(document).on('click', '.add', function() {
                var selected = $('#itemId').find('option:selected');
                let unit = selected.data('unit');
                let index = selected.data('index');
                let id = selected.data('id');
                let value = selected.val();
                let name = selected.text();
                if(value ==  0){
                    alertGen("Please select an item.",2);
                    return;
                }
                temp[index] = output2[index];
                output2.splice(index, 1); 
                updateAvailableList();
                var html = '';
                html += "<tr><td>"+id+"</td>";
                html += "<td>"+name+"</td>";
                let step = 'any';
                if(unit=='units'){
                    step = 1;
                }
                html += "<td><input type='number' style='width:60%;display:inline !important;' id='quantity" + count + "' name='quantity" + count + "'  step='"+step+"' class='form-control item_quantity' min='0' required='true'/><lable for='quantity" + count + "' style='width:40%;margin-left:3px;'>"+unit+"</lable></td>";
                html += "<td><button type='button' name='remove' data-index='"+index+"' class='form-control remove'>Remove</button></td></tr>";
                $('#item_table > tbody').append(html);
                count++;
            });
            $(document).on('click', '.remove', function() {
                let index = $(this).data('index');
                output2.splice(index, 0,temp[index]); 
                updateAvailableList();
                $(this).closest('tr').remove();
            });
            $("form").on('submit', function(event) {
                event.preventDefault();
                var object = {};
                let e = document.getElementById("division");
                let division = e.value;
                let date = $('#requiredDate').val();
                let note =  $('#notes').val();
                object['division'] = division;
                object['requiredDate'] = date;
                object['note'] = note;
                object['item'] = new Object();
                $('#item_table  tbody  tr').each(function() {
                    let item = $(this).find("td:first").text();
                    let quantity = $(this).find("td:nth-child(3)").find("input").val();
                    object['item'][item] = quantity;
                });
                var json = JSON.stringify(object);console.log(json);
                if( Object.keys(object['item']).length ==0){ 
                    alertGen("Please add items.",2);
                    return;
                }
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>serviceRequest",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
                        if(result.code==806){
                            $("#add").trigger('reset');
                            $("#trow").empty();
                            alertGen("Record Added Successfully!",1);
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
                        console.log(result);
					},
					error: function(err) {
						alertGen("Something went wrong.",3);
                        console.log(err);  
					}
				});
            });
            $("#alertBox").click(function() {
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        basicData();
        getDivision();
        getItem();
        updateAvailableList();
        function getDivision(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>inventory/offices",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            var select = document.getElementById("division");
            for (var i = 0; i < output.length; i++){
                if(data.id == output[i]['id']){
                    continue;
                }
                var opt = document.createElement('option');
                opt.value = output[i]['id'];
                opt.innerHTML = output[i]['division'];
                select.appendChild(opt);
            }
        }
        function basicData(){
            data =$.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>user/self/division",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            document.getElementById('header').innerHTML = "Service Request Form - "+ data.name;
        }
        function getItem(){
            output2 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>item",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
        }
        function updateAvailableList() {
            $("#itemId").find('option').not(':first').remove();
            for (var i = 0; i < output2.length; i++) {
                var opt2 = new Option("option text", output2[i]['itemId']);
                $(opt2).html(output2[i]['itemName']);
                $(opt2).attr('data-unit', output2[i]['unitName']);
                $(opt2).attr('data-id', output2[i]['itemId']);
                $(opt2).attr('data-index', i);
                $("#itemId").append(opt2);
            }
        }
        function alertGen($messege, $type) {
            if ($type == 1) {
                $("#alertBox").html("  <div class='alert success-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else if ($type == 2) {
                $("#alertBox").html("  <div class='alert warning-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else {
                $("#alertBox").html("  <div class='alert danger-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }
        }
    </script>
</body>
</html>