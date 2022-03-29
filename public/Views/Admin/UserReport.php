<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin - Report </title>
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

</head>

<body>
    <?php
    include_once('./public/Views/Admin/includes/sidebar_reports.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/Admin/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>User Report</h1>
                </center>
                <form id='generate' name="generate" method="post">
                    <div class="row-content">

                        <h2>Select the area</h2>
                        <div class="row">
                            <div class="col3"><label for="crusttype">Role</label>
                                <select id="user_role" name="user_role" required='true'>
                                    <option value="" selected='true'>Select</option>
                                    <option value="0">All</option>
                                    <option value="1">Grama Niladhari</option>
                                    <option value="4">Divisional Secretariat</option>
                                    <option value="6">Disaster management officer</option>
                                    <option value="3">District secretariat</option>
                                </select>
                            </div>
                            <div class="col3"><label for="District">District</label>
                                <select id="District" name="District">
                                </select>
                            </div>
                            <div class="col3"><label for="Division">DS Division</label>
                                <select id="Division" name="Division">
                                    <option value="null">Select Division</option>   
                                </select>
                            </div>
                            <div class="col3"><label for="Gndivision">GN Division</label>
                                <select id="Gndivision" name="Gndivision">
                                    <option value="null">Select GN Division</option>
                                </select>
                            </div>
                        </div>

                        <div class="row" style="justify-content: center;">

                            <input type="submit" value="Generate" class="btn-alerts" />
                            <input type="reset" value="Cancel" class="btn-alerts" />
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col12" id="users" name = "users">
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/responsiblePersonAidReport.js"></script>
    <script>
        var thisPage = "#user";
        var output = [];
        $(document).ready(function() {
            $("#compensation,#safehouse,#incident").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            var distOptions = "<option value=''>Select District</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    distOptions += "<option value='"+district.dsId+"'>"+district.name+"</option>";
                });
                 $('#District').html(distOptions);
            })
            $('#District').prop('disabled', true);
            $('#Division').prop('disabled', true);
            $('#Gndivision').prop('disabled', true);

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

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

        $('#generate').submit(function(e) {
                e.preventDefault();
                var str = [];
                var formElement = document.querySelector("#generate");
                var formData = new FormData(formElement);
                var params = "";
                formData.forEach(function(value, key){
                    params= params + key + "="+ value+"&";
                });
                $("#generate").trigger("reset");
                var url = '<?php echo HOST; ?>/Admin/PrintReport?'+ params;
                window.open(url, '_blank');
            });

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
    </script>
</body>

</html>