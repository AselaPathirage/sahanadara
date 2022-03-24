<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
?>

<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Inventory </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
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

        td {
            border: none;
            text-align: left;
            vertical-align: middle;
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
                    <h1 id="header"></h1>
                </center>
                    <fieldset>
                        <div style="padding-left:15% ;">
                            <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                <table style="border: none !important;width:70%;">
                                    <tr>
                                        <td style="background-color: #fff;">Required Date</td>
                                        <td style="background-color: #fff;"><input type="date" id="requiredDate" name="requiredDate" style="width: 100%;" disabled='true' disabled='true'></td>
                                    </tr>
                                    <tr id="check">
                                        <td style="background-color: #fff;">Note</td>
                                        <td style="background-color: #fff;"><textarea id="notes" name="notes" rows="4" cols="50" disabled='true'></textarea></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div id="request"  class="container text-center">
                                    <form id="list">
                                        <input type="hidden" id="requestId" value="<?php echo end($array); ?>">
                                        <center>
                                        <table id="ajaxFilter" class="table" style="width: 70%;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">Select
                                                    </th>
                                                    <th style="width: 10%;">Item Id
                                                    </th>
                                                    <th style="width: 30%;">Item
                                                    </th>
                                                    <th style="width: 10%;">Requested Amount
                                                    </th>
                                                    <th style="width: 10%;">Available Amount
                                                    </th>
                                                    <!-- <th style="width: 10%;">Availability
                                    </th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="trow">
                                            </tbody>
                                        </table>
                                        </center>
                                    </form>
                                </div>
                                <h4 id='stat'></h4>
                                <div style="float: right;width:50%">
                                    <table style="border: none !important;width:100%;height:40%">
                                        <tr>
                                            <td style="border: none !important;width:50%;"><input type="button" style="height:100%;font-size:20px" class="form-control btn_delete" id="decline" value="Decline"></td>
                                            <td style="border: none !important;width:50%;"><input type="button" style="height:100%;font-size:20px" class="form-control btn_active" id="accept" value="Accept"></td>
                                        </tr>
                                    </table>
                                </div>
                    </fieldset>
            </div>
        </div>
        <div class="custom-model-main" id="confirmProcess">
            <div class="custom-model-inner">
                <div class="close-btn">×</div>
                <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">
                        <div class="row-content">
                            <h2>Proceed with default selection?
                            </h2>
                            <h5>(Default means all the available item in the table)</h5>
                            <input type="hidden" id="item2" value="">
                            <div class="row" style="justify-content: center;">
                                <input type="hidden" id="find" value="">
                                <button type="button" class="btn-alerts btn_cancel cancel">No</button>
                                <button type="button" class="btn-alerts btn_danger" id="process-confirm">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-overlay"></div>
        </div>
    </section>
    <div id="alertBox">
    </div>
    <script>
        var thisPage = "#Service";
        var request,available = 0;;
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#accept").on('click', function(){
                if ($(":checkbox:checked").length == 0) {
                    // var difference = request[0]['item'].length - available;
                    // if(difference == 0){
                    //     alertGen("Unable to process with default selection. Please select items.",2);
                    // }else{
                    $("#confirmProcess").fadeIn();
                    $("#find").val("notice");
                    $("#confirmProcess").addClass('model-open');
                    
                } else {
                    var object = {};
                    object['requestId']="<?php echo end($array); ?>";
                    object['item'] = new Object();
                    $.each($("input[name='items']:checked"), function(){
                        let quantity = $(this).data("quantity");
                        object['item'][$(this).data("id")]=quantity;
                    });
                    var json = JSON.stringify(object);console.log(json);
                    $.ajax({
                        type: "PUT",
                        url: "<?php echo API; ?>serviceRequest/accept/<?php echo end($array); ?>",
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        data: json,
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
                }
            });
            $("#process-confirm").click(function(e){
                $(".custom-model-main").removeClass('model-open');
                var object = {};
                object['requestId']="<?php echo end($array); ?>";
                object['item'] = new Object();
                request[0]['item'].forEach(function(item){
                    if (parseFloat(item['requestedAmount']) <= parseFloat(item['quantity'])) {
                        var itemId = item['itemId'];
                        object['item'][itemId]=item['requestedAmount'];
                    }
                });
                var json = JSON.stringify(object);console.log(json);
                $.ajax({
					type: "PUT",
					url: "<?php echo API; ?>serviceRequest/accept/<?php echo end($array); ?>",
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                    data: json,
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
            $("#decline").on('click', function(){
                $.ajax({
					type: "PUT",
					url: "<?php echo API; ?>serviceRequest/decline/<?php echo end($array); ?>",
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
            $("#alertBox").click(function() {
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
            $(".close-btn, .bg-overlay, .cancel").click(function(){
                $(".custom-model-main").removeClass('model-open');
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        serviceRequests();
        setData();

        function serviceRequests(){
            request = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>serviceRequest/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
        }
        function setData() {
            document.getElementById('header').innerHTML = "Service Request From - " + request[0]['name'];
            if(request[0]['note']==""){
                document.getElementById('check').innerHTML = "";
            }else{
                document.getElementById('notes').innerHTML = request[0]['note'];
            }
            document.getElementById('requiredDate').value = request[0]['requestedDate'];
            var table = document.getElementById("trow");
            for (var i = 0; i < request[0]['item'].length; i++) {
                let obj = request[0]['item'][i];console.log(obj);
                let row = table.insertRow(-1);
                let cell0 = row.insertCell(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                cell1.innerHTML = obj['itemId'];
                cell2.innerHTML = obj['itemName'];
                cell3.innerHTML = obj['requestedAmount'] + " " + obj['unit'];
                cell4.innerHTML = obj['quantity'] + " " + obj['unit'];
                if (parseFloat(obj['requestedAmount']) <= parseFloat(obj['quantity'])) {
                    available++;
                    cell0.innerHTML = "<input type='checkbox' class='form-control check' value='" + obj['itemName'] + "' name='items' data-id='" + obj['itemId'] + "' data-quantity='" + obj['requestedAmount'] + "' data-available='" + obj['quantity'] + "'>";
                } else {
                    cell0.innerHTML = "<input type='checkbox' class='form-control check' disabled='true' value='" + obj['itemName'] + "' name='items' data-id='" + obj['itemId'] + "' data-quantity='" + obj['requestedAmount'] + "' data-available='" + obj['quantity'] + "'>";
                    cell0.bgColor = "#eb6e6e";
                    cell1.bgColor = "#eb6e6e";
                    cell2.bgColor = "#eb6e6e";
                    cell3.bgColor = "#eb6e6e";
                    cell4.bgColor = "#eb6e6e";
                }
            }
            console.log(available)
            if (request[0]['item'].length == 1) {
                document.getElementById('stat').innerHTML = "(" + available + "/" + request[0]['item'].length + ")" + " item available to proceed the request.";
            } else {
                document.getElementById('stat').innerHTML = "(" + available + "/" + request[0]['item'].length + ")" + " items available to proceed the request.";
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