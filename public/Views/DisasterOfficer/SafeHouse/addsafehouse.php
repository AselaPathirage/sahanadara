<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DisasterOfficer/includes/sidebar_safeHouse.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">

        <!-- TABLE -->
        <div class="container">
            <div class="box">
                <h1 style="text-align:center;">Add Safe House</h1>
                <!-- FORM -->
        <div class="container">
            <form method="post" id='add' name="add">

                <div class="column">
                    <label for="safeHouseAddress">Safe house address</label>
                    <textarea id="safeHouseAddress" name="safeHouseAddress"></textarea>

                    <label for="safeHouseName">Name</label>
                    <input type="text" id="safeHouseName" name="safeHouseName">

                    <label for="gnDiv">Grama Division</label>
                    <!-- <input type="text" id="gnDiv" name="gnDiv"> -->

                    <select id="gnDiv" name="gnDiv">
                                        <option>Select GN Division</option>
                                    </select>

                    <label for="safeHouseTelno">TP Number</label>
                    <input type="text" id="safeHouseTelno" name="safeHouseTelno">

                    <br><br>

                    <!-- <label  style="text-align:center;">
                            <input type="checkbox" name="sendalerts" value="safehouses" />
                            Is Available
                        </label> -->

                    <!-- <label for="location">GN Division</label>
                    <select id="gndivision" name="gndivision">
                        <option value="Keselwatta">Keselwatta</option>
                        <option value="Maradana">Maradana</option>
                        <option value="Kochchikade">Kochchikade</option>
                        <option value="Welikala">Welikala</option>
                    </select>
 -->

                    <!-- <fieldset>
                        <legend>Send alerts -</legend>
                        <label>
                            <input type="checkbox" name="officers" value="officers" />
                            Only Officers
                        </label>
                        <label  style="text-align:center;">
                            <input type="checkbox" name="sendalerts" value="safehouses" />
                            Assigned Safe Houses
                        </label>
                    </fieldset>
                    -->
                    <input type="submit" id="submit" value="Submit" name="submit"/>
                    <input type="reset" value="Cancel" />
                </div>
            </form>
        </div>
            </div>
        </div>

    </section>
    <script>
        // getUnit();
            // getItem()
            $("#add").submit(function(e) {
                e.preventDefault();
                var str = [];
                var formElement = document.querySelector("#add");
                var formData = new FormData(formElement);
                //var array = {'key':'ABCD'}
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                object['key'] = "<?php echo $_SESSION['key'] ?>";
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
					type: "POST",
					url: "localhost/<?php echo baseUrl; ?>/DisasterOfficer_addSafehouse/1234",
					data: json, 
					cache: false,
					success: function(result) {
						// $('#trow').empty();
                        // getItem();
					},
					error: function(err) {
						alert(err);
					}
				});
            });
		

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getGNDivision(){
            var x = "<?php echo $_SESSION['key'] ?>";
            var object = {};
            object['key'] = x;
            object['id'] = <?php echo $_SESSION['userId'] ?>;
            output = $.parseJSON($.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>/DisasterOfficer_getGNDivision/1234",
                dataType: "json", 
                data : JSON.stringify(object),
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            var select = document.getElementById("gnDiv");
            for (var i = 0; i < output.length; i++){
                //console.log(i);
                var opt = document.createElement('option');
                opt.value = output[i]['gndvId'];
                opt.innerHTML = output[i]['gnDvName'];
                select.appendChild(opt);
            }
        }
        getGNDivision();
        
    </script>
</body>
</html>