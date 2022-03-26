<!DOCTYPE html>
<html lang="en" dir="ltr">
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
        include_once('./public/Views/InventoryManager/includes/sidebar_notice.php');
     ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/InventoryManager/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>Donation Request Notice</h1>
                </center>
                <div style="padding-left:15% ;">
                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                        <form id='add' method="POST">
                            <table style="border: none !important;width:70%;">
                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" id="title" name="title" required="true"/></td>
                                </tr>
                                <tr>
                                    <td>Number of Families</td>
                                    <td><input type="text" id="numOfFamillies" name="numOfFamillies" style="width: 100%;" onkeypress="return isNumber(event,1)" required="true"></td>
                                </tr>
                                <tr>
                                    <td>Number of People</td>
                                    <td><input type="text" id="numOfPeople" name="numOfPeople" style="width: 100%;" onkeypress="return isNumber(event,1)" required="true"></td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>
                                        <select id="safeHouseId" class="form-control" required="true">
                                            <option value="">Select Safe House</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">Description</td>
                                    <td><textarea id="description" name="description" rows="8" cols="50"></textarea></td>
                                </tr>
                            </table>

                            <h4>Required Items</h4>
                            <div class="table-repsonsive">
                                <span id="error"></span>
                                <table class="table table-bordered" style="width:70%;margin:0" id="item_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50%;">Item</th>
                                            <th style="width: 30%;">Quantity</th>
                                            <th style="width: 20%;"><button type="button" name="add" class="form-control add">Add</button></th>
                                        </tr>
                                    </thead>
                                    <tbody id="trow"></tbody>
                                </table>
                            </div>
                            <div style="float: right;width:30%">
                                <table style="border: none !important;width:100%;">
                                    <tr>
                                        <td><input type="reset" style="margin-top: 0px;"  class="view" value="Cancel"></td>
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
    <script>
        var thisPage = "#search";
        $(document).ready(function() {
            $("#search,#add").each(function() {
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
        getNotice();
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        function getNotice() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>notice/<?php echo $record; ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            document.getElementById("title").value = output[0].title ;
            document.getElementById("family").value = output[0].numOfFamilies ;
            document.getElementById("people").value = output[0].numOfPeople ;
            document.getElementById("location").value = output[0].safeHouseName ;
            document.getElementById("notes").innerHTML = output[0].note;
            var table = document.getElementById("data");
            if(output[0].item.length>0){
                output[0].item.forEach(function(item) {
                    let row = table.insertRow(-1);
                    let cell1 = row.insertCell(-1);
                    let cell2 = row.insertCell(-1);
                    cell1.className  = "align";
                    cell2.className  = "align";
                    cell1.innerHTML = item.item;
                    cell2.innerHTML = item.quantity + " " + item.unit;
                });
            }else{
                let row = table.insertRow(-1);
                let cell = row.insertCell(-1);
                cell.colSpan = 2;
                cell.className  = "align";
                cell.innerHTML = "<p>There aren't requiered items.</p>";
            }
        }
        function alertGen($messege,$type){
            if ($type == 1){
                $("#alertBox").append("  <div class='alert success-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else if($type == 2){
                $("#alertBox").append("  <div class='alert warning-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else{
                $("#alertBox").append("  <div class='alert danger-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }
        }
    </script>
</body>
</html>