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
            <form action="#" method="post">

                <div class="column">

                    <label for="number">Safe house number</label>
                    <input type="number" id="number" name="number">
                    
                    <label for="address">Safe house address</label>
                    <textarea id="address" name="address"></textarea>

                    <label for="Name">Name</label>
                    <input type="text" name="address">

                    <label for="tp">TP Number</label>
                    <input type="text" name="tp">

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
                    <input type="submit" id="search" value="Submit" />
                    <input type="reset" value="Cancel" />
                </div>
            </form>
        </div>
            </div>
        </div>

    </section>
    <script>
        getUnit();
            getItem()
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
						$('#trow').empty();
                        getItem();
					},
					error: function(err) {
						alert(err);
					}
				});
            });
		});

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        function getUnit(){
            var x = "<?php echo $_SESSION['key'] ?>";
            console.log(x);
            output = $.parseJSON($.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>/DisasterOfficer_getUnit/1234",
                dataType: "json", 
                data : JSON.stringify({'key': x}),
                cache: false,
                async: false
            }).responseText);
            //console.log(output);
            var select = document.getElementById("unitType");
            for (var i = 0; i < output.length; i++){
                //console.log(i);
                var opt = document.createElement('option');
                opt.value = output[i]['unitId'];
                opt.innerHTML = output[i]['unitName'];
                select.appendChild(opt);
            }
        }
        function getItem(){
            var x = "<?php echo $_SESSION['key'] ?>";
            console.log(x);
            output = $.parseJSON($.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>/DisasterOfficer_getSafehouse/1234",
                dataType: "json", 
                data : JSON.stringify({'key': x}),
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            var table = document.getElementById("trow");
            for (var i = 0; i < output.length; i++){
                let obj = output[i];
                console.log(obj);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                var attribute = document.createElement("input");
                attribute.id = i;
                attribute.type ="radio";
                attribute.class ="radio-custom";
                attribute.name = "radio-group";
                var attribute2 = document.createElement("label");
                attribute2.for = i;
                attribute2.class ="radio-custom-label";
                cell1.append = attribute;
                //cell1.append = attribute2;
                cell2.innerHTML = obj['itemName'];
                cell3.innerHTML = obj['unitName'];
            }
        }
    </script>
</body>
</html>