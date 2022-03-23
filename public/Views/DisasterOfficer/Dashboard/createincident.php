<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Dashboard </title>
    <!-- CSS -->

    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_disofficer.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="container">
            <h1>Incidents</h1>
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
                                    <select id="gndivision" name="gndivision" required="true">
                                        <option>Select a Grama Niladhari Division</option>
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
                                    <input type="text" id="uptitle" name="uptitle" >
                       
                                    <label for="description">Description</label>
                                    <textarea type="text" id="updescription" name="updescription" ></textarea>

                                    <label for="gndivision">GN Division</label>
                                    <select id="upgndivision" name="upgndivision" required="true">
                                        <option>Select a Grama Niladhari Division</option>
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

                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>GN Division</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>

                            <tbody id="tbodyid">

                                <!-- <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">

                                    <td>N Nimesh </td>
                                    <td>991237564V</td>
                                    <td>111, Maithree Rd, Horana</td>
                                    <td>0756787634</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_blue">Update</a>
                                        <a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_delete">Delete</a>
                                    </td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">

                                    <td>Y Abeysinghe</td>
                                    <td>985637555V</td>
                                    <td>14/D, Samagi Rd, Bellapitiya, Horana</td>
                                    <td>0778987655</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_blue">Update</a>
                                        <a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_delete">Delete</a>
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
        var thisPage = "#Incidents";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getIncident();

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
        });

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

        function getGNDivision() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gndivision",
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
                opt.value = output[i]['gndvId'];
                opt.innerHTML = output[i]['gnDvName'];
                select.appendChild(opt);


            }
        }
        getGNDivision();

        function getIncident(){
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
            var table = document.getElementById("tbodyid");

            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                // console.log(obj);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);

                var attribute = document.createElement("a");
                attribute.id = obj['incidentId'];
                // attribute.href = "";
                attribute.className = "btn_update btn_blue";
                attribute.name = "update";
                attribute.innerHTML = "Update";
                attribute.setAttribute("data-title", obj['title'])
                attribute.setAttribute("data-description", obj['description'])
                attribute.setAttribute("data-gndivision", obj['gnDvName'])
                var attribute2 = document.createElement("a");

                attribute2.id = obj['incidentId'];
                // attribute2.href = "";
                attribute2.className = "btn_delete";
                attribute2.name = "delete";
                attribute2.innerHTML = "Delete";

                cell1.innerHTML = obj['title'];
                cell2.innerHTML = obj['description'];
                cell3.innerHTML = obj['gnDvName'];
                var attribute3 = document.createElement("span");
                attribute3.innerHTML = " ";
                cell4.appendChild(attribute);
                cell4.appendChild(attribute3);
                cell4.appendChild(attribute2);
                // console.log(attribute);
                // console.log(attribute2);
            }
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
            var str = [];
            var formElement = document.querySelector("#add");
            var formData = new FormData(formElement);
            //var array = {'key':'ABCD'}
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
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