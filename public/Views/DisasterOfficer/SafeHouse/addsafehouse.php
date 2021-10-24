<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_dmc.css">
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
    <div class="space"></div>
        <div class="container">
            <center><h1>Safe House List</h1></center>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a class="btn_blue Click-here">Add Safe House</a>
                </div>
            </div>
            <div class="custom-model-main">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form action="#" id='add' name="add" method="POST">
                                <h1>New Safe House</h1>

                                <div class="row-content">

                                <label for="safeHouseAddress">Safe House Address</label>
                                <textarea id="safeHouseAddress" name="safeHouseAddress"></textarea>

                                <label for="safeHouseName">Name</label>
                                <input type="text" id="safeHouseName" name="safeHouseName">

                                <label for="gnDiv">Grama Niladhari Division</label>
                                <!-- <input type="text" id="gnDiv" name="gnDiv"> -->

                                <select id="gnDiv" name="gnDiv">
                                                    <option>Select GN Division</option>
                                                </select>

                                <label for="safeHouseTelno">Tele Number</label>
                                <input type="text" id="safeHouseTelno" name="safeHouseTelno">
                                    <div class="row" style="justify-content: center;">
                                        <input type="submit" value="Submit" id="submit" class="btn-alerts" />
                                        <input type="reset" value="Reset" class="btn-alerts" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-overlay"></div>
            </div>
            <div class="container">
                <div class="">
                    <!-- <table class="table" style="margin: 15px auto;">
                        <thead>
                            <tr class="filters">


                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table> -->


                    <div class="panel panel-primary filterable">
                        <table id="" class="table">
                            <thead>
                                <tr>
                                    <th>Address</th>
                                    <th>Name</th>
                                    <th>GN Division</th>
                                    <th>Tele Number</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>

                            <tbody id="tableSafeHouse">

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>Haltota, Millaniya Road, Tuttiripitiya</td>
                                    <td>Millaniya Maha Vidyalya</td>
                                    <td>Halthota</td>
                                    <td>0756787634</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/updatesafeHouse" class="btn_blue">Update</a>
                                        <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn_delete">Delete</a>
                                    </td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>Ballapitya, Horana</td>
                                    <td>Ballapitiya Maha Vidyalya</td>
                                    <td>Ballapitiya</td>
                                    <td>0756787634</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/updatesafeHouse" class="btn_blue">Update</a>
                                        <a href="/<?php echo baseUrl; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn_delete">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // getUnit();
            // getItem();
            viewSafehouse();
            $("#add").submit(function(e) {
                e.preventDefault();
                //$(".custom-model-main").removeClass('model-open');
                var str = [];
                var formElement = document.querySelector("#add");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                var json = JSON.stringify(object);
                // console.log(json);
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>safehouse",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
						// window.location.replace("<?php echo HOST ?>DisasterOfficer/SafeHouse/SafeHouseDetails");
                        $('#tableSafeHouse').empty();
                        viewSafehouse();
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
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>GnDivision",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
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
        // popup
        $(".Click-here").on('click', function() {
            $(".custom-model-main").addClass('model-open');
        });
        $(".close-btn, .bg-overlay").click(function() {
            $(".custom-model-main").removeClass('model-open');
        });

        function viewSafehouse(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("tableSafeHouse");
            for (var i = 0; i < output.length-1; i++){
                let obj = output[i];
                console.log(obj);
                // let row = table.insertRow(-1);
                // let id ="data_"+i;
                // row.id = id;
                // row.className = "task-list-row";
                // $("#data_"+i).attr('data-unit', obj['unitName']);
                // let cell1 = row.insertCell(-1);
                // let cell2 = row.insertCell(-1);
                // let cell3 = row.insertCell(-1);
                // cell1.innerHTML  = "<input id='"+obj['itemId']+"' class='radio-custom' name='radio-group' type='radio' checked><label for='"+obj['itemId']+"' class='radio-custom-label'></label>";
                // cell2.innerHTML = obj['itemName'];
                // cell3.colSpan ="2";
                // cell3.innerHTML = obj['unitName'];


                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                var attribute = document.createElement("a");
                attribute.id = i;
                attribute.href = "";
                attribute.className = "btn_blue";
                attribute.name = "update";
                attribute.innerHTML = "Update";
                var attribute2 = document.createElement("a");

                attribute2.id = i;
                attribute2.href = "";
                attribute2.className = "btn_delete";
                attribute2.name = "delete";
                attribute2.innerHTML = "Delete";
                cell1.innerHTML = obj['safeHouseAddress'];
                cell2.innerHTML = obj['safeHouseName'];
                cell3.innerHTML = obj['gnDvName'];
                cell4.innerHTML = obj['safeHouseTelno'];
                var attribute3 = document.createElement("span");
                attribute3.innerHTML = " ";
                cell5.appendChild(attribute);
                cell5.appendChild(attribute3);
                cell5.appendChild(attribute2);
                // console.log(attribute);
                // console.log(attribute2);
                
            }
        }


    </script>
</body>
</html>