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
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchList.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .create{
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
    .create:hover{
        background-color: rgb(163, 230, 205);   
    }
    .view{
        background-color:rgb(241,67,67);
        height: 50px;
        width: 100%;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        color: black;
        font-weight: bold;
    }
    .view:hover{
        background-color: rgb(246, 139, 139);
    }
    td{
            border: none;
            text-align: left;
            vertical-align: middle;
    }
    tr{
        background-color: #fff !important;
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
                <center><h1>Donation Request Notice</h1></center>
                <form>
                <fieldset>
                        <div style="padding-left:15% ;">
                                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                            <table style="border: none !important;width:70%;">
                                                <tr>
                                                    <td>Title</td>
                                                    <td><input type="text" id="your_name" name="yourname"/></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of Families</td>
                                                    <td><input type="text" id="your_name" name="yourname"  style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of People</td>
                                                    <td><input type="text" id="your_name" name="yourname"  style="width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Location</td>
                                                    <td>
                                                    <select id="assigned-user-filter" class="form-control">
                                                        <option>321/A</option>
                                                        <option>321/B</option>
                                                        <option>321/C</option>
                                                        <option>322</option>
                                                    </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td><textarea id="notes" name="drivernotes" rows="8" cols="50"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Required Items</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="table-repsonsive">
                                                            <span id="error"></span>
                                                            <table class="table table-bordered" id="item_table">
                                                                <tr>
                                                                    <th style="width: 30%;">Item</th>
                                                                    <th style="width: 50%;">Quantity</th>
                                                                    <th style="width: 20%;"><button type="button" name="add" class="form-control add" >Add</button></th>
                                                            </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="float: right;width:30%">
                                                <table style="border: none !important;width:100%;">
                                                    <tr>
                                                        <td><input type="reset" class="view" value="Cancel"></td>
                                                        <td><input type="submit" class="create" value="Create"></td>
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
    <!-- <script  src="<?php echo HOST; ?>public/assets/js/responsiblePersonAidReport.js"></script> -->
    <script>
        var thisPage = "#add";
        var output;
        getItem();
        $(document).ready(function() {
            $("#search,#add").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $(document).on('click', '.add', function(){
                var html = '';
                html += '<tr>';
                html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option>';
                for (var i = 0; i < output.length; i++){
                    html += "<option>"+output[i]['itemName']+"</option>";
                }
                html +="</select></td>";
                html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
                html += '<td><button type="button" name="remove" class="form-control remove">Remove</button></td></tr>';
                $('#item_table').append(html);
            });
            $(document).on('click', '.remove', function(){
                $(this).closest('tr').remove();
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        function getItem(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>item",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
        }
    </script>
</body>
</html>