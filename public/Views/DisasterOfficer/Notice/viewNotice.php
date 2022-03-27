<?php
$array = explode("/", $_GET["url"]);
$record = $array[3];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Notice </title>
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
    .create{
        background-color: rgb(2,58,255);
        height: 50px;
        display: block;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        text-decoration: none;
        color: wheat;
        box-shadow: 2px 1px #000;
    }
    .create:hover{
        background-color: rgb(153,176,255);   
    }
    .view{
        background-color: rgb(109,91,208);
        height: 50px;
        display: block;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        text-decoration: none;
        color: wheat;
        box-shadow: 2px 1px #000;
    }
    .view:hover{
        background-color: rgb(138,123,217);
    }
    td{
        border: none;
        background-color:#fff;
    }
    .align{
        text-align: center
    }
    #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #04AA6D;
    color: white;
    }
    </style>
</head>
<body>
    <?php
        include_once('./public/Views/disasterOfficer/includes/sidebar_notice.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
            <center><h1>Donation Request Notice</h1></center>
            <fieldset>
                        <div style="padding-left:15% ;">
                                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                            <table style="border: none !important;width:70%;">
                                                <tr>
                                                    <td>Title</td>
                                                    <td><input type="text" id="title" name="title" disabled='true' value=""/></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of Families</td>
                                                    <td><input type="text" id="family" name="family"  style="width: 100%;" disabled='true' value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Number of People</td>
                                                    <td><input type="text" id="people" name="people"  style="width: 100%;" disabled='true' value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>Location</td>
                                                    <td>
                                                    <input type="text" id="location" name="location"  style="width: 100%;" disabled='true' value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td><textarea id="notes" name="notes" rows="8" cols="50" disabled='true'></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><h3>Required Items</h3></td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table id="customers" style="width:70%;">
                                                <tr>
                                                    <th style="text-align: center">Item Name</th>
                                                    <th style="text-align: center">Count</th>
                                                </tr>
                                                <tbody id='data'></tbody>
                                            </table>
                                            <div style="float: right;width:30%">
                                                <table style="border: none !important;width:100%;">
                                                    <tr>
                                                        <td><input id="remove" type="reset" style="margin-top: 0px;" class="view" value="Remove"></td>
                                                        <td><input type="submit" class="create" value="Edit"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                        </div>
                    </fieldset>
            </div>
        </div>
        <div class="custom-model-main" id="deleteform">
            <div class="custom-model-inner">
                <div class="close-btn">×</div>
                <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">
                        <div class="row-content">
                            <h2>Are you sure?</h2>
                            <input type="hidden" id="item2" value="">
                            <p>Do you really want to delete this record? This process cannot be undone.</p>
                            <div class="row" style="justify-content: center;">
                                <button type="button" class="btn-alerts btn_cancel cancel">Cancel</button>
                                <button type="button" class="btn-alerts btn_danger" id="delete-confirm">Delete</button>
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
        var thisPage = "#search";
        $(document).ready(function() {
            $("#search,#add").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $('#remove').on('click', function() {
                $("#deleteform").fadeIn();
                $("#deleteform").addClass('model-open');
            });
            $(".close-btn, .bg-overlay, .cancel").click(function() {
                $(".custom-model-main").removeClass('model-open');
            });
            $("#delete-confirm").click(function(e) {
                e.preventDefault();
                $("#deleteform").fadeOut();
                $("#deleteform").removeClass('model-open');
                var url ="<?php echo API; ?>notice/<?php echo $record; ?>";
                $.ajax({
                    type: "DELETE",
                    url:  url,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        if (result.code == 806) {
                            window.location = "<?php echo HOST;?>DisasterOfficer/Notice/Search";
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
                        console.log(err);
                    }
                });
            });
        });
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