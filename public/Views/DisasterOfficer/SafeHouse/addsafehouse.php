<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
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
            <div class="custom-model-main addform">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form action="#" id='add' name="add" method="POST">
                                <h1>New Safe House</h1>

                                <div class="row-content">

                                <label for="safeHouseAddress">Safe House Address</label>
                                <textarea id="safeHouseAddress" name="safeHouseAddress" required='true'></textarea>

                                <label for="safeHouseName">Name</label>
                                <input type="text" id="safeHouseName" name="safeHouseName" required='true'>

                                <label for="gnDiv">Grama Niladhari Division</label>
                                <!-- <input type="text" id="gnDiv" name="gnDiv"> -->

                                <select id="gnDiv" name="gnDiv">
                                                    <option>Select GN Division</option>
                                                </select>

                                <label for="safeHouseTelno">Tele Number</label>
                                <input type="text" id="safeHouseTelno" name="safeHouseTelno" maxlength="10" onkeypress="return isNumber(event)" required='true' />
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
            <div class="custom-model-main" id="updateform">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form action="#" id='update' name="update" method="POST">
                                <h1>Update Safe House</h1>

                                <div class="row-content">

                                <label for="safeHouseAddress">Safe House Address</label>
                                <textarea id="upsafeHouseAddress" name="upsafeHouseAddress" required='true'></textarea>
                                <input type="hidden" id="item" value="">
                                <label for="safeHouseName">Name</label>
                                <input type="text" id="upsafeHouseName" name="upsafeHouseName" required='true'>

                                <label for="upgnDiv">Grama Niladhari Division</label>
                                <!-- <input type="text" id="gnDiv" name="gnDiv"> -->

                                <select id="upgnDiv" name="upgnDiv" disabled="true">
                                                    <option>Select GN Division</option>
                                                </select>

                                <label for="safeHouseTelno">Tele Number</label>
                                <input type="text" id="upsafeHouseTelno" name="upsafeHouseTelno" maxlength="10" onkeypress="return isNumber(event)" required='true' />
                                    <div class="row" style="justify-content: center;">
                                        <input type="submit" value="Update" class="btn-alerts" />
                                        <input type="reset" value="Reset" class="btn-alerts" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-overlay"></div>
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
            <div class="container">
                <div class="">
                    <table class="table" style="margin: 15px auto;">
                        <thead>
                            <tr class="filters">


                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table>


                    <div class="panel panel-primary filterable">
                        <table id="table2" class="table">
                            <thead>
                                <tr>
                                    <th>Address</th>
                                    <th>Name</th>
                                    <th>GN Division</th>
                                    <th>Tele Number</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>

                            <tbody id="tbodyid">

                                <!-- <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
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
                                </tr> -->
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

                $(".btn_update").on('click', function() {
                    var id = $(this).attr("id");
                    var safeHouseAddress = $(this).attr("data-safeHouseAddress");
                    var safeHouseName = $(this).attr("data-safeHouseName");
                    var safeHouseTelno = $(this).attr("data-safeHouseTelno");
                    var gnDiv = $(this).attr("data-gnDiv");

                        var output2 = $.parseJSON($.ajax({
                        type: "GET",
                        url: "<?php echo API; ?>GnDivision/all",
                        dataType: "json", 
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        async: false
                    }).responseText);
                    
                    var select = document.getElementById("upgnDiv");
            
                        for (var i = 0; i < output2.length; i++){
                            //console.log(i);
                            var opt = document.createElement('option');
                            opt.value = output2[i]['gndvId'];
                            opt.innerHTML = output2[i]['gnDvName'];
                            console.log(gnDiv);
                            if(gnDiv==output2[i]['gndvId']){
                                
                                opt.selected = "selected";
                            }
                            select.appendChild(opt);

                            
                        }

                    $("#updateform").fadeIn();
                    $("#update").trigger("reset");
                    $("#updateform").addClass('model-open');

                    $("#upsafeHouseAddress").val(safeHouseAddress);
                    $("#upsafeHouseName").val(safeHouseName);
                    $("#upsafeHouseTelno").val(safeHouseTelno);
                    $("#upgnDiv").val(gnDiv);
                    $("#item").val(id);
                });
                $(".btn_delete").on('click', function() {
                    var id = $(this).attr("id");
                    // var nic = $(this).attr("data-nic");
                    // var name = $(this).attr("data-name");
                    // var address = $(this).attr("data-address");
                    // var telno = $(this).attr("data-telno");

                    $("#deleteform").fadeIn();

                    $("#deleteform").addClass('model-open');

                    // $("#upname").val(name);
                    // $("#upnic").val(nic);
                    // $("#upphone").val(telno);
                    // $("#upaddress").val(address);
                    $("#item2").val(id);
                });
            //validations
            function isNumber(e) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
                return true;
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

            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function() {
                sidebar.classList.toggle("active");    
            }
            
            // popup
            $(".Click-here").on('click', function() {
            $(".addform").fadeIn();
            $("#add").trigger("reset");
            $(".addform").addClass('model-open');
            });
            $(".close-btn, .bg-overlay, .cancel").click(function() {
                $(".custom-model-main").removeClass('model-open');
            });

            $("#add").submit(function(e) {
                e.preventDefault();
                $(".custom-model-main").fadeOut();
                $(".custom-model-main").removeClass('model-open');
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
                        $('#tbodyid').empty();
                        viewSafehouse();
                        console.log(result.code);
                        if (result.code == 806) {
                            alertGen(" Record Added Successfully!", 1);

                        } else {
                            alertGen(" Unable to handle request.", 2);
                        }
                    },
                    error: function(err) {
                        alertGen(" Something went wrong.", 3);
                        console.log(err);
                    }
                });
            });

            $("#update").submit(function(e) {
            e.preventDefault();
            $("#updateform").fadeOut();
            $("#updateform").removeClass('model-open');
            var str = [];
            var object = {};
            var formElement = document.querySelector("#update");
            var formData = new FormData(formElement);
            //var array = {'key':'ABCD'}
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
            });
            $("#update").trigger('reset');
            var json = JSON.stringify(object);
            var id = document.getElementById("item").value;
            console.log(json);
            $.ajax({
                type: "PUT",
                url: "<?php echo API; ?>safehouse/" + id,
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    $('#trow').empty();
                    viewSafehouse();
                    location.reload();
                    if (result.code == 806) {
                        alertGen("Record Updated Successfully!", 1);
                    } else {
                        alertGen("Unable to handle request.", 2);
                    }
                },
                error: function(err) {
                    alertGen(" Something went wrong.", 3);
                    console.log(err);
                }
            });
        });
        $("#delete-confirm").on("click", function(e) {
            e.preventDefault();
            $("#deleteform").fadeOut();
            $("#deleteform").removeClass('model-open');
            var str = [];
            //var array = {'key':'ABCD'}
            var object = {};
            var id = document.getElementById("item2").value;
            object["id"] = id;
            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "DELETE",
                url: "<?php echo API; ?>safehouse/" + id,
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    $('#trow').empty();
                    viewSafehouse();
                    location.reload();
                    if (result.code == 806) {
                        alertGen("Record Updated Successfully!", 1);
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
        

        function viewSafehouse(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            //console.log(output);
            $("#tbodyid").empty();
            var table = document.getElementById("tbodyid");
            
            for (var i = 0; i < output.length; i++){
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
                attribute.id = obj['safeHouseID'];
                //attribute.href = "";
                attribute.className = "btn_update btn_blue";
                attribute.name = "update";
                attribute.innerHTML = "Update";
                attribute.setAttribute("data-safeHouseAddress", obj['safeHouseAddress'])
                attribute.setAttribute("data-safeHouseName", obj['safeHouseName'])
                attribute.setAttribute("data-safeHouseTelno", obj['safeHouseTelno'])
                attribute.setAttribute("data-gnDiv", obj['gndvId'])
                var attribute2 = document.createElement("a");
                console.log(obj);

                attribute2.id = obj['safeHouseID'];
                //attribute2.href = "";
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
        // search

        (function() {
            var showResults;
            $('#search').keyup(function() {
                var searchText;
                searchText = $('#search').val();
                return showResults(searchText);
            });
            showResults = function(searchText) {
                $('tbody tr').hide();
                return $('tbody tr:Contains(' + searchText + ')').show();
            };
            jQuery.expr[':'].Contains = jQuery.expr.createPseudo(function(arg) {
                return function(elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
        }.call(this));
    </script>
</body>
</html>