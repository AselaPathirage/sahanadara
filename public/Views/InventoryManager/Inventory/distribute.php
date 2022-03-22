<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
?>

<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Notice </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchList.css">
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

        td {
            border: none;
            text-align: left;
            vertical-align: middle;
        }

        tr {
            background-color: #fff !important;
        }

        .add {
            background-color: #04AA6D;
            color: #ffdddd;
        }

        .remove {
            color: #ffdddd;
        }

        #search-bar {
            display: block;
            margin: .25em 0 0;
            width: 100%;
            padding: .25em .5em;
            font-size: 1.2em;
        }

        .output {
            list-style: none;
            width: 21.1%;
            min-height: 0px;
            border-top: 0 !important;
            color: #767676;
            font-size: .75em;
            transition: min-height 0.2s;
            position: absolute;
            z-index: 5;
            text-transform: capitalize;
        }

        .output,
        #search-bar {
            background: #fff;
            border: 1px solid #767676;
        }

        .prediction-item {
            padding: .5em .75em;
            transition: color 0.2s, background 0.2s;
        }

        .output:hover .focus {
            background: #fff;
            color: #767676;
        }

        .prediction-item:hover,
        .focus,
        .output:hover .focus:hover {
            background: #ddd;
            color: #333;
        }

        .prediction-item:hover {
            cursor: pointer;
        }

        .prediction-item strong {
            color: #333;
        }

        .prediction-item:hover strong {
            color: #000;
        }

        p {
            margin-top: 1em;
        }

        #submit {
            display: block;
            margin: .5em 0 2.5em;
            padding: .25em .5em;
            font-size: 1.2em;
            color: #439973;
            border: 1px solid #439973;
            background: 0;
            transition: color 0.2s, background 0.2s;
        }

        #submit:hover {
            color: #fff;
            background: #439973;
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
                <center>
                    <h1>Distribute Inventory Items</h1>
                </center>
                <div style="padding-left:15% ;">
                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                        <form id='add' method="POST">
                            <table style="border: none !important;width:90%;">
                                <tr>
                                    <td>Safe House</td>
                                    <td>
                                        <select id="safeHouseId" class="form-control" required="true">
                                            <option value="">Select Safe House</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <h4>Releasing Items</h4>
                            <table style="width: 90%;">
                                <tr>
                                    <td>
                                        <label for="itemId">Item Name</label>
                                    </td>
                                    <td>
                                        <select id="itemId" name="itemId" class="form-control" required='true'>
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
                                            <th style="width: 40%;">Item</th>
                                            <th style="width: 20%;">Available Quantity</th>
                                            <th style="width: 20%;">Releasing Quantity</th>
                                            <th style="width: 10%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div style="float: right;width:30%">
                                <table style="border: none !important;width:100%;">
                                    <tr>
                                        <td><input type="reset" style="margin-top: 0px;" class="view" value="Cancel"></td>
                                        <td><input type="submit" class="create" value="Create"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="alertBox">
    </div>
    <script defer>

        var thisPage = "#Maintain";
        var output, output2,temp={};
        var count = 0;
        getData();
        safeHouseList();
        checkData();
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            $(".close-btn, .bg-overlay").click(function() {
                $(".custom-model-main").removeClass('model-open');
            });
            $("#alertBox").click(function() {
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
            $(document).on('click', '.add', function() {
                var selected = $('#itemId').find('option:selected');
                let unit = selected.data('unit');
                let index = selected.data('index');
                let id = selected.data('id');
                let value = selected.val();
                let name = selected.text();
                let quantity = selected.data('available');
                if(value ==  0){
                    alertGen("Please select an item.",2);
                    return;
                }
                //output2[index].index = index;
                //temp.push(output2[index]);
                temp[index] = output2[index];
                //delete output2[index];
                console.log(temp);
                //console.log(output2.splice(index, 1)); 
                //output2.remove(index);
                output2.splice(index, 1); 
                // output2 = output2.filter(function( element ) {
                //     return element !== undefined;
                // });
                
                updateAvailableList();
                var html = '';
                html += "<tr><td>"+id+"</td>";
                html += "<td>"+name+"</td>";
                html += "<td>"+quantity+" "+unit+"</td>";
                let step = 'any';
                if(unit=='units'){
                    step = 1;
                }
                html += "<td><input type='number' id='quantity" + count + "' name='quantity" + count + "'  step='"+step+"' class='form-control item_quantity' max='"+quantity+"' min='0' required='true'/></td>";
                html += "<td><button type='button' name='remove' data-index='"+index+"' class='form-control remove'>Remove</button></td></tr>";
                $('#item_table > tbody').append(html);
                count++;
            });
            $(document).on('click', '.remove', function() {
                let index = $(this).data('index');
                //let position = temp[index].index;
                output2.splice(index, 0,temp[index]); 
                //delete temp[index];
                updateAvailableList();
                $(this).closest('tr').remove();
            });
            $("form").on('submit', function(event) {
                event.preventDefault();
                var object = {};
                let e = document.getElementById("safeHouseId");
                let safeHouseId = e.value;
                object['safeHouseId'] = safeHouseId;
                object['item'] = new Object();
                $('#item_table  tbody  tr').each(function() {
                    let item = $(this).find("td:first").text();
                    let quantity = $(this).find("td:nth-child(4)").find("input").val();
                    object['item'][item] = quantity;
                });
                var json = JSON.stringify(object);console.log(json);

                if( Object.keys(object['item']).length ==0){ 
                    alertGen("Please add items.",2);
                    return;
                }
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>distribute",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
                        if(result.code==806){
                            $("#add").trigger('reset');
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
        });

        function safeHouseList() {
            output =
                $.parseJSON($.ajax({
                    type: "GET",
                    url: "<?php echo API; ?>safehouse/name",
                    dataType: "json",
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    async: false
                }).responseText);

                var safehouse;
                var check = "<?php echo end($array); ?>";
                if (sessionStorage.getItem("safeHouseId") !== null) {
                    safehouse = sessionStorage.getItem("safeHouseId");
                }
                
                for (var i = 0; i < output.length; i++){
                    var option = document.createElement("option");
                    option.text = output[i].safeHouseName;
                    option.value = output[i].safeHouseID;
                    if(output[i].safeHouseID == safehouse && check.indexOf('SH')!== -1){
                        option.selected = 'true';
                        document.getElementById("safeHouseId").disabled = 'true';
                    }else{
                        
                    }
                    var select = document.getElementById("safeHouseId");
                    select.appendChild(option); 
                }
        }
        function checkData(){
            var check = "<?php echo end($array); ?>";
            if(check.indexOf('SH')=== -1){
                sessionStorage.clear();
            }else{
                if (sessionStorage.getItem("data") !== null) {
                    var data = JSON.parse(sessionStorage.getItem("data"));
                    $("#itemId").find('option').not(':first').remove();
                    console.log(data);
                    for (var i = 0; i < output2.length; i++) {
                        if(output2[i]['itemId'] in data){
                            var html = '';
                            html += "<tr><td>"+output2[i]['itemId']+"</td>";
                            html += "<td>"+output2[i]['itemName']+"</td>";
                            html += "<td>"+output2[i]['inInventory']+" "+output2[i]['unitName']+"</td>";
                            let step = 'any';
                            if(output2[i]['unitName']=='units'){
                                step = 1;
                            }
                            html += "<td><input type='number' id='quantity" + count + "' name='quantity" + count + "'  step='"+step+"' class='form-control item_quantity' max='"+output2[i]['inInventory']+"' value='"+data[output2[i]['itemId']]+"' min='0' required='true'/></td>";
                            html += "<td><button type='button' name='remove' data-index='"+i+"' class='form-control remove'>Remove</button></td></tr>";
                            $('#item_table > tbody').append(html);
                            count++;
                            temp[i] = output2[i];
                            output2.splice(i, 1); 
                        }
                    }
                }
            }
            updateAvailableList();
        }
        function getData(){
            output2 = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>availableItem",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
        }
        function updateAvailableList() {console.log(output2);
            $("#itemId").find('option').not(':first').remove();
            for (var i = 0; i < output2.length; i++) {
                var opt2 = new Option("option text", output2[i]['itemId']);
                $(opt2).html(output2[i]['itemName']);
                $(opt2).attr('data-unit', output2[i]['unitName']);
                $(opt2).attr('data-id', output2[i]['itemId']);
                $(opt2).attr('data-available', output2[i]['inInventory']);
                $(opt2).attr('data-index', i);
                $("#itemId").append(opt2);
            }
        }

        function isNumber(e, check) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (check == 1) {
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            } else {
                if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
                    return false;
                }
                return true;
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