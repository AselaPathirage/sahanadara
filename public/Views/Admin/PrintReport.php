<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
$array = explode("/", $_GET["url"]);
// echo $array[count($array)-2];
// exit;
?>

<head>
    <meta charset="UTF-8">
    <title> District Secretariat - Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            /* height: 842px;
            width: 595px; */
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }

        #btnprint {
            background: #efc468;
            border-radius: 0;
            color: #232323;
            display: inline-block;
            font-size: 1rem;
            height: 50px;
            line-height: 50px;
            position: fixed;
            right: 0;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            -webkit-transform: rotate(-90deg);
            transform-origin: bottom right;
            width: 150px;

        }
    </style>
</head>

<body>
    <?php
    // include_once('./public/Views/GramaNiladari/includes/sidebar_dashboard.php');
    ?>
    <!-- <section class="dashboard-section"> -->
    <?php
    // include_once('./public/Views/GramaNiladari/includes/topnav.php');
    ?>
    <div class="space"></div>
    <div id="alertBox">
    </div>
    <!-- Print  -->
    <a id="btnprint">Print</a>
    <div class="container col12">
        <form id="add">
            <div class="box">
                <div class="box1">
                    <div style="text-align: center;">
                        <img src="<?php echo HOST; ?>/public/assets/img/social-care (1).png" height="50" alt="LOGO">
                    </div>
                    <h1 class="text-center">User Report</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col12" id="users" name = "users">
                            </div>
                        </div>
                    </div>
                 
                    
                </div>

            </div>
        </form>

    </div>



    <!-- </section> -->
    <script>
        var thisPage = "#incidents";
        var roleId = '';
        var disId = '';
        var divId = '';
        var gndivId = '';
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            // document.getElementById('datePicker1').valueAsDate = new Date();
            // document.getElementById('datePicker2').valueAsDate = new Date();
            $("#btnprint").click(function() {
                $("#btnprint").hide();
                window.print();
                $("#btnprint").show();
            });
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for(var i = 0; i< sURLVariables.length; i++){
                var key = sURLVariables[i].split("=")[0];
                if(key == "user_role"){
                    roleId = sURLVariables[i].split("=")[1];
                }
                if(key == "District"){
                    disId = sURLVariables[i].split("=")[1];
                }
                if(key == "Division"){
                    divId = sURLVariables[i].split("=")[1];
                }
                if(key == "Gndivision"){
                    gndivId = sURLVariables[i].split("=")[1];
                }
            }
            generateReport();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function generateReport(){
            var object = {};
            object['user_role'] = roleId;
            object['District'] = disId;
            object['Division'] = divId;
            object['Gndivision'] = gndivId;
            console.log(object);
            getUsers(roleId,object);
            renderUser();
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
                let newChild = "<div class='box row-content userBox' data-role='"+output[i]['roleName']+"' data-empId='"+output[i]['empId']+"' data-roleId='"+output[i]['roleId']+"' data-district='"+district.toString()+"' data-division='"+division.toString()+"' data-gnDivision='"+gnDiv.toString()+"'><h4>"+output[i]['empName']+"</h4><p>"+output[i]['roleName']+"</p><p>"+output[i]['empAddress']+"</p><p>"+output[i]['empEmail']+"</p><p>"+output[i]['empTele']+"</p></div>";
                parent.insertAdjacentHTML('beforeend', newChild);
            }
        }
    </script>
</body>

</html>