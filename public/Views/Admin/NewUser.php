<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php
    include_once('./public/Views/Admin/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/Admin/includes/topnav.php');
        ?>
        <div class="space"></div>

        <div class="container col8">
            <div class="box">
                    <div class="box1">
                        <form id='add' name="add" method="post">
                            <h1 class="text-center">New User</h1>
                            <div class="row">
                                <div class="col3">
                                    <label for="firstname">First Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="firstname" name="firstname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="lastname">Last Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="lastname" name="lastname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="NIC">NIC</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="NIC" name="NIC" placeholder="NIC" maxlength="12">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col9">
                                    <input type="email" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col9">
                                    <textarea type="text" id="address" name="address" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">TP Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP_number" name="TP_number" placeholder="Phone number" maxlength="10" onkeypress="return isNumber(event)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">User role</label>
                                </div>
                                <div class="col9">
                                    <select id="user_role" name="user_role">
                                        <option value="0" selected='true'>Select</option>
                                        <option value="1">Grama Niladhari</option>
                                        <option value="4">Divisional Secretariat</option>
                                        <option value="3">District secretariat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="DistrictBox">
                                <div class="col3">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="DivisionBox">
                                <div class="col3">
                                    <label for="user role">Div sec</label>
                                </div>
                                <div class="col9">
                                    <select id="Division" name="Division">
                                        <option value="null">Select Division</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="GndivisionBox">
                                <div class="col3">
                                    <label for="user role">GN div</label>
                                </div>
                                <div class="col9">
                                    <select id="Gndivision" name="Gndivision">
                                        <option value="null">Select GN Division</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row " style="text-align:right;justify-content: right;">
                                <input type="reset" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div id="alertBox">
        </div>
    </section>
    <script>
        var thisPage = "#new";

        $(document).ready(function() {
            $("#stats,#updates").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            var distOptions = "<option value=''>Select District</option>";
            $.getJSON('/<?php echo baseUrl; ?>/public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    distOptions += "<option value='"+district.dsId+"'>"+district.name+"</option>";
                });
                 $('#District').html(distOptions);
            })
            $('#DistrictBox').hide();
            $('#DivisionBox').hide();
            $('#GndivisionBox').hide();
        });
        function isNumber(e) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $('#District').change(function(){
            var val = $(this).val();
            var divOptions = "<option value=''>Select Division</option>";
            $.getJSON('/<?php echo baseUrl; ?>/public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    if(district.dsId == val){
                        $.each(district.division,function(j,division){
                           divOptions += "<option value='"+division.dvId+"'>"+division.name+"</option>";  
                        })
                    }
                });
                $('#Division').html(divOptions);
            })
        })
        $("#add").submit(function(e) {
                e.preventDefault();
                var str = [];
                var formElement = document.querySelector("#add");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                var json = JSON.stringify(object);
                console.log(json);
                $("#add").trigger("reset");
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>user",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
                        console.log(result);
                        if(result.code==806){
                            alertGen("Record Added Successfully!",1);
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
					},
					error: function(err) {
						alertGen("Unable to handle request.",2);
					}
				});
            });
        $('#Division').change(function(){
            var div = $(this).val();
            var dist = $('#District').val();
            var gnOptions = "<option value=''>Select GNDivision</option>";
            $.getJSON('/<?php echo baseUrl; ?>/public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    if(district.dsId == dist){
                        $.each(district.division,function(j,division){
                           if(division.dvId == div){
                               $.each(division.gnArea, function(k,gnArea){
                                gnOptions += "<option value='"+gnArea.gndvId+"'>"+gnArea.name+"</option>"; 
                               })
                           }
                        })
                    }
                });
                $('#Gndivision').html(gnOptions);
            })
        })
        
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
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
        $(function() {
            $('#user_role').change(function(){
                console.log($(this).val());
                var value = $(this).val();
                if(value==0){
                    $('#DistrictBox').hide();
                    $('#DivisionBox').hide();
                    $('#GndivisionBox').hide();
                }else if(value==1){
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').show();
                }else if(value==4){
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').hide();
                }else if(value==3){
                    $('#DistrictBox').show();
                    $('#DivisionBox').hide();
                    $('#GndivisionBox').hide();
                }
            });
        });
    </script>
</body>

</html>