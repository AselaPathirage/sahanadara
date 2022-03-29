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
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchselect.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        /* .switch-container {
            display: inline-block;
            margin: 10px 10px;
        } */

        /*** iOS Style ***/
        input.ios {
            max-height: 0;
            max-width: 0;
            opacity: 0;
            position: absolute;
            left: -9999px;
            pointer-event: none;
        }

        input.ios+label {
            display: block;
            position: relative;
            box-shadow: inset 0 0 0px 1px #a6a6a6;
            text-indent: -5000px;
            height: 30px;
            width: 50px;
            border-radius: 15px;
        }

        input.ios+label:before {
            content: "";
            position: absolute;
            display: block;
            height: 30px;
            width: 30px;
            top: 0;
            left: 0;
            border-radius: 15px;
            background: transparent;
            -moz-transition: 0.2s ease-in-out;
            -webkit-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
        }

        input.ios+label:after {
            content: "";
            position: absolute;
            display: block;
            height: 30px;
            width: 30px;
            top: 0;
            left: 0px;
            border-radius: 15px;
            background: white;
            box-shadow: inset 0px 0px 0px 1px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.2);
            -moz-transition: 0.2s ease-in-out;
            -webkit-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
        }

        input.ios:checked+label:before {
            width: 50px;
            background: #13bf11;
        }

        input.ios:checked+label:after {
            left: 20px;
            box-shadow: inset 0 0 0 1px #13bf11, 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .btn-fun{
            padding: 5px 20px;
            border-radius:4px;
            text-decoration: none;
            font-size: 20px;
            color: #fff;
            background-color:lightslategrey;
        }
    </style>
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
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
            <div id="alertBox">
            </div>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                <a href="<?php echo HOST; ?>/DisasterOfficer/SafeHouse/addsafehouse" class="btn_blue">Manage safehouse</a>

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
                                    <input type="tel" id="safeHouseTelno" name="safeHouseTelno" maxlength="10" onkeypress="return isNumber(event)" required='true' />
                                    <div class="row" style="justify-content: center;">
                                        <input type="submit" value="Submit" class="btn-alerts" />
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
                                    <input type="tel" id="upsafeHouseTelno" name="upsafeHouseTelno" maxlength="10" onkeypress="return isNumber(event)" required='true' />
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

                            <table class="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Status
                                            <select id="assigned-user-filter" class="form-control">
                                                <option>All</option>
                                                <option>Active</option>
                                                <option>Finished</option>
                                            </select>
                                        </th>

                                        <th>Search
                                            <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="container" id="tbodyid">
                            <div class="row">
                                <div class="col6">
                                    <div class="box row-content">
                                        <h4>Flood in Millaniya</h4>
                                        <p>A flood situation in low line areas of river Kalu</p>

                                        <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                            <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                            <a href="<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col6">
                                    <!-- <div class="box row-content">
                                        <div class="button-row-container">
                                            

                                            <div class="switch-container switch-ios">
                                                <input type="checkbox" name="ios" id="ios" />
                                                <label for="ios"></label>
                                            </div>



                                        </div>
                                        <h4>Flood in Dodangoda</h4>
                                        <p>A flood situation in low line areas of river Kalu</p>

                                        <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                            <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>

                                            <a href="<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                                        </div>
                                    </div> -->
                                    <div class='box row-content' style='position:relative;'>
                                        <div class='button-row-container' style='position: absolute; top:15px;right:35px;'>
                                            <div class='switch-container switch-ios'>
                                                <input type='checkbox' name='ios1' id='ios1' class='ios' />
                                                <label for='ios1' id="lab1"></label>
                                            </div>
                                        </div>
                                        <h4>sample</h4>
                                        <p>des</p>
                                        <div class='row' style='text-align: right; margin: 0 auto;display:block;'>
                                            <a class='btn_active' style='position: absolute; top:33px;right:95px;'>Status : Active</a>
                                            <a href='http://localhost/sahanadara/sahanadara//DisasterOfficer/Dashboard/IncidentView/1' class='btn_views'>View</a>
                                        </div>
                                    </div>
                                    <div class='box row-content' style='position:relative;'>
                                        <div class='button-row-container' style='position: absolute; top:15px;right:35px;'>
                                            <div class='switch-container switch-ios'><input type='checkbox' name='ios2' id='ios2' class='ios' data-incid='' /><label for='ios2'></label></div>
                                        </div>
                                        <h4>sample</h4>
                                        <p>des</p>
                                        <div class='row' style='text-align: right; margin: 0 auto;display:block;'>
                                            <a class='btn_active' style='position: absolute; top:33px;right:95px;'>Status : Active</a>
                                            <a href='http://localhost/sahanadara/sahanadara//DisasterOfficer/Dashboard/IncidentView/1' class='btn_views'>View</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                                    <!-- <div class="col6" style="overflow: auto">
                                <div class="box row-content">
                                    <h4>Flood in Ingiriya</h4>
                                    <p>A flood situation in low line areas of river Kalu</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                        <a href="<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                                    </div>
                                </div>
                                <div class="box row-content">
                                    <h4>Flood in Galpatha</h4>
                                    <p>A flood situation in low line areas of river Kalu</p>

                                    <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                        <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                        <a href="<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView" class="btn_views">View</a>
                                    </div>
                                </div>
                            </div> -->
                            


                        </div>

                        <div class="container" id="tbodyid2">
                                <!-- <div class="row">
                                    <div class="col6">
                                        <div class="box row-content" style="height:100%;min-height: 300px;">
                                            <div class="row active" style="text-align: right; margin: 0 auto;display:block">
                                                <a class="btn_active">Status : Active</a>
                                            </div>
                                            <h4 class="name">Bellapitiya Maha Vidyalaya</h4>
                                            <p class="address">Bellapitiya, Horana</p>
                                            <p>Telephone Number - <span id="tel">0778765367</span> </p>

                                            <div>
                                                <h4 style="font-size:15px;">Responsible Person</h4>
                                                <p>Name - <span id="rname"></span></p>
                                                <p>Contact Number - <span id="rtele"></span></p>

                                            </div>

                                            <div>
                                                <h4 style="font-size:15px;padding-bottom:0;">Recent Status</h4>
                                                <h6 style="font-size:12px;margin: 3px 0;">Last updated - <span id="date"></span></h6>
                                                <p>Adult Males - <span id="male"></span></p>
                                                <p>Adult Females - <span id="female"></span></p>
                                                <p>Children - <span id="children"></span></p>
                                                <p>Disabled - <span id="disabled"></span></p>
                                                <p>Note - <span id="note"></span></p><br>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div> -->

                    </div>
                </div>




    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/searchselect.js"></script>
    <script>
        // getUnit();
        // getItem();
        
        $(document).ready(function() {
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
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    async: false
                }).responseText);

                var select = document.getElementById("upgnDiv");

                for (var i = 0; i < output2.length; i++) {
                    //console.log(i);
                    var opt = document.createElement('option');
                    opt.value = output2[i]['gndvId'];
                    opt.innerHTML = output2[i]['gnDvName'];
                    console.log(gnDiv);
                    if (gnDiv == output2[i]['gndvId']) {

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
            $(".button_view").on('click', function() {
                var id = $(this).attr("data-id");


                var out = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse/"+id,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
                $("#rname").val(out[0]['empName']);
                $("#rtele").val(out[0]['empTele']);
                $("#male").val(out[0]['adultMale']);
                $("#female").val(out[0]['adultFemale']);
                $("#children").val(out[0]['children']);
                $("#disabled").val(out[0]['disabledPerson']);
                $("#note").val(out[0]['note']);
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

            $("input[type='checkbox']").change(function(e) {
                console.log((this).id);
                e.preventDefault();
                var object = {};

                if (this.checked) {
                    object['isUsing'] = "y";
                } else {
                    object['isUsing'] = "n";
                }
                var id = $(this).data("incid");
                object['safeHouseID'] = id;
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                type: "PUT",
                url: "<?php echo API; ?>safehousestatus",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    
                    viewSafehouse();
                    location.reload();
                    if (result.code == 806) {
                        // alertGen("Record Updated Successfully!", 1);
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

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
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

        function getGNDivision() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>GnDivision",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            var select = document.getElementById("gnDiv");

            for (var i = 0; i < output.length; i++) {
                //console.log(i);
                var opt = document.createElement('option');
                opt.value = output[i]['gndvId'];
                opt.innerHTML = output[i]['gnDvName'];
                select.appendChild(opt);


            }
        }
        getGNDivision();

        function viewSafehouse() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            $("#tbodyid").empty();
            var $sample = "";
            if (output == null) {
                $sample += "<p>No safehouse data</p>";
            } else {
                for (var i = 0; i < output.length; i++) {
                    let obj = output[i];
                    console.log(obj);

                    if (i % 2 == 0) {
                        $sample += "<div class='row'>";
                    }
                    $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><div class='button-row-container' style='position: absolute; top:15px;right:35px;'><div class='switch-container switch-ios'><input type='checkbox' name='ios" + i + "' id='ios" + i + "' class='ios' data-incid='" + obj['safeHouseID'] + "' ";
                    if (obj['isUsing'] == 'y') {
                        $sample += "checked";
                    }
                    $sample += "/><label for='ios" + i + "'></label></div></div><h4>" + obj['safeHouseAddress'] + "</h4><p>" + obj['safeHouseName'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                    if (obj['isUsing'] == 'y') {
                        $sample += "<a class='btn_active' style='position: absolute; top:33px;right:95px;'>Status : Active</a>";
                    }
                    $sample += "<a ' class='btn_update btn_blue' data-id='" + obj['safeHouseID'] + "'>View</a></div></div></div>";
                    if ((i % 2 == 1) || (i == output.length - 1)) {
                        $sample += "</div>";
                    }
                }
            }
            console.log($sample);
            $("#tbodyid").append($sample);
        }

        function getSafeHouseDetails() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse/id",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            // if (output == null && output['isUsing'] == 'y') {
            //     $("#tbodyid2").empty();
            //     var $sample2 = $(" <p> No recent activity found</p> ");
            //     $("#tbodyid2").append($sample2);

            // } else if (output['isUsing'] == 'y') {
            //     console.log(output['safeHouseName']);

            //     $("#rname").text(output['empName'])
            //     $("#rtele").text(output['empTele'])
            //     $("#male").text(output['adultMale']);
            //     $("#female").text(output['adultFemale']);
            //     $("#children").text(output['children']);
            //     $("#disabled").text(output['disabledPerson']);
            //     $("#note").text(output['note']);

            // } else if (output['isUsing'] == 'n') {
            //     $("#tbodyid2").empty();
            // }
        }

        $("#status").on('change', function() {
            var status = $('#status').val();
            console.log(status);
            $("#tbodyid").empty();
            var $sample = "";
            if (output == null) {
                $sample += "<p>No incident data</p>";
            } else {
                for (var i = 0; i < output.length; i++) {

                    let obj = output[i];
                    console.log(obj);

                    if (status == "Any") {
                        if (i % 2 == 0) {
                            $sample += "<div class='row'>";
                        }
                        $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                        if (obj['isUsing'] == 'y') {
                            $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                        }
                        $sample += "<a ' class='btn_update btn_blue' data-id='" + obj['safeHouseID'] + "'>View</a></div></div></div>";
                        if ((i % 2 == 1) || (i == output.length - 1)) {
                            $sample += "</div>";
                        }
                    } else if (status == '1') {
                        if (obj['isUsing'] == 'y') {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isUsing'] == 'y') {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a ' class='btn_update btn_blue' data-id='" + obj['safeHouseID'] + "'>View</a></div></div></div>";
                            if ((i % 2 == 1) || (i == output.length - 1)) {
                                $sample += "</div>";
                            }
                        }
                    } else {
                        if (obj['isUsing'] == "n") {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isUsing'] == "y") {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a ' class='btn_update btn_blue' data-id='" + obj['safeHouseID'] + "'>View</a></div></div></div>";
                            if ((i % 2 == 1) || (i == output.length - 1)) {
                                $sample += "</div>";
                            }
                        }
                    }
                }
                
            }
            console.log($sample);
            $("#tbodyid").append($sample);

        });
        
        $('#search').keyup(function() {
            var filter = $(this).val();
            $('.box').each(function() {
                //console.log($(this).children("h4").text());
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide();
                } else {
                    $(this).show();
                }

            });
        });

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
                formData.forEach(function(value, key) {
                    object[key] = value;
                });
                var json = JSON.stringify(object);
                // console.log(json);
                $.ajax({
                    type: "POST",
                    url: "<?php echo API; ?>safehouse",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
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
                var select = document.getElementById("upgnDiv").value;
                console.log(select);
                object['upgnDiv'] = select;
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
            $("#delete-confirm").click(function(e) {
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

        //validations
        function isNumber(e) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        
    </script>
</body>

</html>