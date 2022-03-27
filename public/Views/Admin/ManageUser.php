<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
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
        <div class="container">
            <form id='generate' name="generate" method="post">
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th>User Role
                            <select id="user_role" name="user_role" required='true'>
                                <option value="" selected='true'>Select</option>
                                <option value="0">All</option>
                                <option value="1">Grama Niladhari</option>
                                <option value="4">Divisional Secretariat</option>
                                <option value="6">Disaster management officer</option>
                                <option value="3">District secretariat</option>
                            </select>
                        </th>
                        <th>District
                        <select id="District" name="District">
                                    </select>
                        </th>
                        <th>Div Sec Office
                        <select id="Division" name="Division">
                                        <option value="null">Select Division</option>   
                                    </select>
                        </th>
                        <th>GN Division
                        <select id="Gndivision" name="Gndivision">
                                        <option value="null">Select GN Division</option>
                                    </select>
                        </th>
                        <th>
                        <input type="submit" value="Filter" class="btn-alerts" />
                        </th>
                    </tr> 
                </thead>
            </table>
            </form>
            <div class="container">
                <div class="row">
                    <div class="col5" id="users" name = "users">
                    </div>
                    <div class="col7" style="overflow: auto">
                        <div class="box row-content" style="min-height: 300px;">
                            <h1 class="text-center">Update User</h1>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="fname" name="firstname" placeholder="First Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="lname">Last Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="lname" name="lastname" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="email" name="email" placeholder="Email">
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
                                    <input type="text" id="tp_number" name="TP number" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">User role</label>
                                </div>
                                <div class="col9">
                                    <select id="user_role2" name="user role" disabled>
                                    <option value="" selected='true'>Select</option>
                                    <option value="1">Grama Niladhari</option>
                                    <option value="4">Divisional Secretariat</option>
                                    <option value="6">Disaster management officer</option>
                                    <option value="3">District secretariat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col9">
                                <select id="District2" name="District2">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">Div sec</label>
                                </div>
                                <div class="col9">
                                <select id="Division2" name="Division2">
                                        <option value="null">Select Division</option>   
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">GN div</label>
                                </div>
                                <div class="col9">
                                <select id="Gndivision2" name="Gndivision2">
                                        <option value="null">Select GN Division</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row " style="text-align:right;justify-content: right;">
                                <input id="delete" type="submit" style="background-color: red;" value="Delete">
                                <input id="update" type="submit" style="background-color: blue;" value="Update">
                                <input id="cancel" type="submit" style="background-color: red;" value="Cancel">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div id="alertBox">
        </div>
    </section>
    <script>
        var thisPage = "#manage";
        var output = [];
        var prvrole = '';
        var prvdist = '';
        var prvdiv = '';
        var prvgndiv = '';
        var empId = '';
        $(document).ready(function() {
            getAllUsers();
            renderUser();
            $("#stats,#updates").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            var distOptions = "<option value=''>Select District</option>";
            $.getJSON('<?php echo HOST; ?>/public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    distOptions += "<option value='"+district.dsId+"'>"+district.name+"</option>";
                });
                 $('#District').html(distOptions);
                 $('#District2').html(distOptions);
            })
            $('#District').prop('disabled', true);
            $('#Division').prop('disabled', true);
            $('#Gndivision').prop('disabled', true);
            $(".btn_manage").on('click', function() {
                var id = $(this).attr("id");
                var object = output[id];
                setDivOptions(object.dsId,object.divId);
                setFormValues(object);

            });
        });
        $('#generate').submit(function(e) {
                e.preventDefault();
                var str = [];
                var formElement = document.querySelector("#generate");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                var json = JSON.stringify(object);
                console.log(json);
                $("#generate").trigger("reset");
                var userRole = object["user_role"];
                getUsers(userRole,object);
                renderUser(); 
            });
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function setFormValues(object){
            console.log(object);
            var fname = object.empName.split(" ")[0];
            var lname = object.empName.split(" ")[1];
            prvrole = object.roleId;
            prvdist = object.dsId;
            prvdiv = object.dvId;
            prvgndiv = object.gndvId;
            empId = object.empId;
            $('#fname').val(fname);
            $('#lname').val(lname);
            $('#email').val(object.empEmail);
            $('#address').val(object.empAddress);
            $('#tp_number').val(object.empTele);
            $('#user_role2').val(object.roleId);
            $('#District2').val(object.dsId);
            $('#Division2').val(object.divId);
        }
        function setDivOptions(distId,div){
            var dsval = distId;
            var divval = div;
            var divOptions = "<option value=''>Select Division</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    if(district.dsId == dsval){
                        $.each(district.division,function(j,division){
                        divOptions += "<option value='"+division.dvId+"'>"+division.name+"</option>"; 
                        })
                    }
                });
                $('#Division2').html(divOptions);
            });
        }
        function isNumber(e) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        function getAllUsers(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>user",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
        }
        function getUsers(userRole,object){
            var json = JSON.stringify(object);
            if (userRole == 0){
                output = $.parseJSON($.ajax({
                    type: "GET",
                    url: "<?php echo API; ?>user",
                    dataType: "json", 
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                    cache: false,
                    async: false
                }).responseText);
            }
            if (userRole == 1){
                var gndivision = object["Gndivision"];
                if (gndivision == "null"){
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/1",
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    console.log(output);
                }else{
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/filter/1/"+gndivision,
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    console.log(output);
                }
            }
            if (userRole == 4){
                var division = object["Division"];
                if (division == "null"){
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/4",
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                }else{
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/filter/4/"+division,
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    console.log(output);
                }
            }
            if (userRole == 6){
                var division = object["Division"];
                if (division == "null"){
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/6",
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    console.log(output);
                }else{
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/filter/6/"+division,
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    console.log(output);
                }
            }
            if (userRole == 3){
                var district = object["District"];
                if (district == "null" || district == ""){
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/3",
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    console.log(output);
                }else{
                    output = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>user/filter/3/"+district,
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    console.log(output);
                }
            }
        }
        function renderUser(){
            var parent = document.getElementById('users');  
            while (parent.hasChildNodes()){
                parent.removeChild(parent.lastChild);
            }
            for (var i = 0; i < output.length; i++){
                var district,division,gnDiv;
                district = output[i]['dsId'];
                division = output[i]['dvId'];
                gnDiv = output[i]['gndvId'];
                if(!district){
                    district = "0";
                }
                if(!division){
                    division = "0";
                }
                if(!gnDiv){
                    gnDiv = "0";
                }
                let newChild = "<div class='box row-content userBox' data-role='"+output[i]['roleName']+"' data-empId='"+output[i]['empId']+"' data-roleId='"+output[i]['roleId']+"' data-district='"+district.toString()+"' data-division='"+division.toString()+"' data-gnDivision='"+gnDiv.toString()+"'><h4>"+output[i]['empName']+"</h4><p>"+output[i]['roleName']+"</p><p>"+output[i]['empAddress']+"</p><p>"+output[i]['empEmail']+"</p><p>"+output[i]['empTele']+"</p><div class='row' style='text-align: right; margin: 0 auto;display:block'><button data-name='"+output[i]['empName']+"' id='"+i+"' style='background-color:yellow;' class='btn_manage'>Manage</a></div></div>";
                parent.insertAdjacentHTML('beforeend', newChild);
            }
        }

        $('#update').on('click', function(e) {
            e.preventDefault();
            var str = [];
            var object = {};
            object['prvroleId'] = prvrole;
            object['prvdistId'] = prvdist;
            object['prvdivId'] = prvdiv;
            object['prvgndivId'] = prvgndiv;
            object['distId'] = $('#District2').val();
            object['divId'] = $('#Division2').val();
            object['gndivId'] = $('#Gndivision2').val();
            object['empId'] = empId;
            object['roleId'] = $('#user_role2').val();
            var name = $('#fname').val()+ " "+ $('#lname').val();
            object['empName'] = name;
            object['empAddress'] = $('#address').val();
            object['empEmail'] = $('#email').val();
            object['empTele'] = $('#tp_number').val();
            console.log(object);
            
            var json = JSON.stringify(object);
            if(prvrole == $('#user_role2').val()){
                if(prvdiv == null && prvdist == $('#District2').val()){
                    $.ajax({
                        type: "PUT",
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
                }else if(prvgndiv == null) {
                    if(prvdist == $('#Division2').val()){
                        $.ajax({
                            type: "PUT",
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
                    }else{
                        $.ajax({
                            type: "PUT",
                            url: "<?php echo API; ?>user/office",
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
                    }
                }else{
                    if($('#Gndivision2').val() == "null" || $('#Division2').val() == ""){
                        alertGen("Please fill required feilds.",2);
                    }else{
                        if($('#Gndivision2').val() == prvgndiv && $('#Division2').val() == prvdiv){
                            $.ajax({
                                type: "PUT",
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
                        }else{
                            $.ajax({
                                type: "PUT",
                                url: "<?php echo API; ?>user/office",
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
                        }
                    }
                }
            }
        });
        $('#cancel').on('click', function() {
            $('#lname').val('');
            $('#fname').val('');
            $('#address').val('');
            $('#tp_number').val('');
            $('#email').val('');
            $('#District2').val('');
            $('#Division2').val('');
            $('#Gndivision2').val('');
        });
        $('#delete').on('click', function() {
            $.ajax({
                type: "DELETE",
                url: "<?php echo API; ?>user/"+prvrole+"/"+empId,
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                success: function(result) {
                    console.log(result);
                    if(result.code==806){
                        alertGen("Record Deleted Successfully!",1);
                    }else{
                        alertGen("Unable to handle request.",2);
                    }
                },
                error: function(err) {
                    alertGen("Unable to handle request.",2);
                }
            });
        });
       
        $('#District').change(function(){
            var val = $(this).val();
            console.log(val);
            var divOptions = "<option value=''>Select Division</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
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
        $('#District2').change(function(){
            var val = $(this).val();
            console.log(val);
            var divOptions = "<option value=''>Select Division</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    if(district.dsId == val){
                        $.each(district.division,function(j,division){
                           divOptions += "<option value='"+division.dvId+"'>"+division.name+"</option>";  
                        })
                    }
                });
                $('#Division2').html(divOptions);
            })
        })
        $('#user_role').change(function(){
            console.log($(this).val());
            var value = $(this).val();
            if(value==0){
                $('#District').prop('disabled', true);
                $('#Division').prop('disabled', true);
                $('#Gndivision').prop('disabled', true);
            }else if(value==1){
                $('#District').prop('disabled', false);
                $('#Division').prop('disabled', false);
                $('#Gndivision').prop('disabled', false);
            }else if(value==4){
                $('#District').prop('disabled', false);
                $('#Division').prop('disabled', false);
                $('#Gndivision').prop('disabled', true);
            }else if(value==3){
                $('#District').prop('disabled', false);
                $('#Division').prop('disabled', true);
                $('#Gndivision').prop('disabled', true);
            }else if(value==6){
                $('#District').prop('disabled', false);
                $('#Division').prop('disabled', false);
                $('#Gndivision').prop('disabled', true);
            }else{
                $('#District').prop('disabled', true);
                $('#Division').prop('disabled', true);
                $('#Gndivision').prop('disabled', true);
            }
        });

        $('#Division2').change(function(){
            var div = $(this).val();
            var dist = $('#District2').val();
            var gnOptions = "<option value=''>Select GNDivision</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
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
                $('#Gndivision2').html(gnOptions);
            })
        })
        $('#Division').change(function(){
            var div = $(this).val();
            var dist = $('#District').val();
            var gnOptions = "<option value=''>Select GNDivision</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
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
        var input = document.getElementById("search");
        input.addEventListener("input", myFunction);

        function myFunction(e) {
        var filter = e.target.value.toUpperCase();

        var list = document.getElementById("users");
        var divs = list.getElementsByTagName("div");
        for (var i = 0; i < divs.length; i++) {
            var a = divs[i].getElementsByTagName("H4")[0];

            if (a) {
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                divs[i].style.display = "";
            } else {
                divs[i].style.display = "none";
            }
            }
        }

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
        
    </script>
</body>

</html>