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
                            <input type="text" id="NIC" name="NIC" placeholder="NIC">
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
                            <input type="text" id="TP_number" name="TP_number" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="user role">User role</label>
                        </div>
                        <div class="col9">
                            <select id="user_role" name="user_role">
                                <option value="null">Select</option>
                                <option value="Grama Niladhari">Grama Niladhari</option>
                                <option value="Divisional secretariat">Divisional Secretariat</option>
                                <option value="District secretariat">District secretariat</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="user role">District</label>
                        </div>
                        <div class="col9">
                            <select id="District" name="District">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="user role">Div sec</label>
                        </div>
                        <div class="col9">
                            <select id="Division" name="Division">
                                <option value="null">Select Division</option>   
                            </select>
                        </div>
                    </div>
                    <div class="row">
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
                        <input type="submit" style="background-color: red;" value="Cancel">
                        <input type="submit" style="background-color: darkblue;" value="Submit">
                    </div>
                    </form>
                </div>
            </div>



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
        });
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
        const estadosJSON = 'https://gist.githubusercontent.com/letanure/3012978/raw/36fc21d9e2fc45c078e0e0e07cce3c81965db8f9/estados-cidades.json'
        $.getJSON(estadosJSON, function(json) {
        $.each(json.estados, function(key, val) {
            $('#estados').append('<option value="'+json.estados[key].sigla+'">'+json.estados[key].nome+'</option>')
        })
        });

        $('#estados').on('change', function() {
        $.getJSON(estadosJSON, function(json) {
            const request = json.estados.filter(function(cidade) {
            return cidade.sigla == $('#estados').val()
            });
            $('#cidades').find('option').remove();
            $.each(request[0].cidades, function(i) {
            $('#cidades').append('<option value="'+request[0].cidades[i]+'">'+request[0].cidades[i]+'</option>')
            })
        })
        })
    </script>
</body>

</html>