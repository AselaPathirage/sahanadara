<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
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
    </style>
</head>

<body>
    <?php
    include_once('./public/Views/DisasterOfficer/includes/sidebar_dashboard.php');
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
        <div class="container" style="text-align: right;">
            <div style="display:block;">

                <div class="container">
                    <div id="alertBox">
                    </div>
                    <div class="container" style="text-align: right;">
                        <div style="display:block;">
                            <a class="btn_blue Click-here">Create Incident</a>
                        </div>
                    </div>
                    <div class="custom-model-main addform">
                        <div class="custom-model-inner">
                            <div class="close-btn">×</div>
                            <div class="custom-model-wrap">
                                <div class="pop-up-content-wrap">
                                    <form action="#" id='add' name="add" method="POST" onSubmit="return validate_nic();">
                                        <h1>New Incident</h1>

                                        <div class="row-content">

                                            <label for="title">Title</label>
                                            <input type="text" id="title" name="title" placeholder="">

                                            <label for="description">Description</label>
                                            <textarea type="text" id="description" name="description" placeholder=""></textarea>

                                            <label for="gndivision">GN Division</label>
                                            <!-- <select id="gndivision" name="gndivision" required="true">
                                                <option>Select a Grama Niladhari Division</option>
                                            </select> -->
                                            <select id="gndivision" name="gndivision" multiple data-multi-select-plugin>
                                                <option value="All GN divisions" data-gnId="all">All</option>
                                                <!-- <option value="Mercedes" selected>Mercedes</option>
                                                <option value="Hilux">Hilux</option>
                                                <option value="Corsa">Corsa</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Ferrari">Ferrari</option> -->
                                            </select>

                                            <div class="row " style="text-align:right;justify-content: right;">
                                                <input type="submit" class="btn-alerts" value="Submit">
                                                <input type="reset" class="btn-alerts" value="Cancel">
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
                                    <form action="#" id='update' name="update" method="POST" onSubmit="return validate_nic();">
                                        <h1>Update Record</h1>

                                        <div class="row-content">

                                            <label for="title">Title</label>
                                            <input type="text" id="uptitle" name="uptitle">

                                            <label for="description">Description</label>
                                            <textarea type="text" id="updescription" name="updescription"></textarea>

                                            <label for="gndivision">GN Division</label>
                                            <!-- <select id="upgndivision" name="upgndivision" required="true">
                                        <option>Select a Grama Niladhari Division</option>
                                    </select> -->
                                            <select id="upgndivision" name="upgndivision" multiple data-multi-select-plugin>
                                                <!-- <option value="Volvo" selected>Volvo</option>
                                                <option value="Mercedes" selected>Mercedes</option>
                                                <option value="Hilux">Hilux</option>
                                                <option value="Corsa">Corsa</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Ferrari">Ferrari</option> -->
                                            </select>
                                            <div class="row " style="text-align:right;justify-content: right;">
                                                <input type="submit" class="btn-alerts" value="Submit">
                                                <input type="reset" class="btn-alerts" value="Cancel">
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
                                        <p>Do you want to inactive this incident? </p>
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
                    <!-- TABLE -->
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

                    </div>
                </div>




    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/searchselect.js"></script>
    <script>
        var thisPage = "#Incidents";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getIncidents();
            $(".btn_update").on('click', function() {
                var id = $(this).attr("id");
                var title = $(this).attr("data-title");
                var description = $(this).attr("data-description");
                var gndivision = $(this).attr("data-gndivision");

                $("#updateform").fadeIn();
                $("#update").trigger("reset");
                $("#updateform").addClass('model-open');

                $("#uptitle").val(title);
                $("#updescription").val(description);
                $("#upgndivision").val(gndivision);

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
                    object['isActive'] = 1;
                } else {
                    object['isActive'] = 0;
                }
                var id = $(this).data("incid");
                object['incidentId'] = id;
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                type: "PUT",
                url: "<?php echo API; ?>incidentstatus",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    
                    getIncidents();
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
                url: "<?php echo API; ?>DOGnDivision",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            var select = document.getElementById("gndivision");

            for (var i = 0; i < output.length; i++) {
                //console.log(i);
                var opt = document.createElement('option');
                opt.value = output[i]['gnDvName'];
                opt.innerHTML = output[i]['gnDvName'];
                opt.setAttribute("data-gnId", output[i]['gndvId']);
                // opt.data("gnid", output[i]['gndvId']);  
                // opt.attr('data-name',output[i]['gndvId']);    
                // opt.setAttribute("data-id",output[i]['gndvId'])          
                select.appendChild(opt);


            }
        }
        getGNDivision();

        function getIncidents() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>incident",
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
                $sample += "<p>No incident data</p>";
            } else {
                for (var i = 0; i < output.length; i++) {
                    let obj = output[i];
                    console.log(obj);

                    if (i % 2 == 0) {
                        $sample += "<div class='row'>";
                    }
                    $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><div class='button-row-container' style='position: absolute; top:15px;right:35px;'><div class='switch-container switch-ios'><input type='checkbox' name='ios" + i + "' id='ios" + i + "' class='ios' data-incid='" + obj['incidentId'] + "' ";
                    if (obj['isActive'] == 1) {
                        $sample += "checked";
                    }
                    $sample += "/><label for='ios" + i + "'></label></div></div><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                    if (obj['isActive'] == 1) {
                        $sample += "<a class='btn_active' style='position: absolute; top:33px;right:95px;'>Status : Active</a>";
                    }
                    $sample += "<a href='<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
                    if ((i % 2 == 1) || (i == output.length - 1)) {
                        $sample += "</div>";
                    }
                }
            }
            console.log($sample);
            $("#tbodyid").append($sample);
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
                        if (obj['isActive'] == 1) {
                            $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                        }
                        $sample += "<a href='<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
                        if ((i % 2 == 1) || (i == output.length - 1)) {
                            $sample += "</div>";
                        }
                    } else if (status == "1") {
                        if (obj['isActive'] == 1) {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 1) {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a href='<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
                            if ((i % 2 == 1) || (i == output.length - 1)) {
                                $sample += "</div>";
                            }
                        }
                    } else {
                        if (obj['isActive'] == 0) {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 1) {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a href='<?php echo HOST; ?>/DisasterOfficer/Dashboard/IncidentView/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
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
            var str = [];
            var formElement = document.querySelector("#add");
            var formData = new FormData(formElement);
            //var array = {'key':'ABCD'}
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
            });
            object['gns'] = new Object();
            var count = 0;
            $('.multi-select-component .selected-wrapper').each(function() {
                var item = $(this).find("span").data("gnid");
                console.log(item);
                object['gns'][count++] = item;
            });

            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "POST",
                url: "<?php echo API; ?>incident",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    console.log(result);
                    var url = "<?php echo HOST; ?>/DisasterOfficer/Dashboard/Incidents";
                    console.log(result.code);
                    if (result.code == 806) {
                        alertGen("Record Added Successfully!", 1);
                    } else {
                        alertGen(" Unable to handle request.", 2);
                    }
                    setTimeout(function() {
                        $(location).attr('href', url);
                    }, 500);
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
                url: "<?php echo API; ?>incident/" + id,
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    $('#trow').empty();
                    getResident();
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
                url: "<?php echo API; ?>incident/" + id,
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    $('#trow').empty();
                    getResident();
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
    </script>
</body>

</html>