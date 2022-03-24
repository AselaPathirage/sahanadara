<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php'); 
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
                    <a class="btn_blue Click-here">Create New Fundraise</a>
                </div>
            </div>
            <div class="custom-model-main addform">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form action="#" id='add' name="add" method="POST" onSubmit="return validate_nic();">
                                <h1>New Fundraise</h1>

                                <div class="row-content">

                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" placeholder="">
                       
                                    <label for="description">Description</label>
                                    <textarea type="text" id="description" name="description" placeholder=""></textarea>

                                    <label for="goal">Goal</label>
                                    <input type="number" id="goal" name="goal" placeholder="">
                              
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
                                <h1>Update Fundraiser</h1>

                                <div class="row-content">
                                    
                                    <label for="title">Title</label>
                                    <input type="text" id="uptitle" name="uptitle" >
                       
                                    <label for="description">Description</label>
                                    <textarea type="text" id="updescription" name="updescription" ></textarea>

                                    <label for="goal">Goal</label>
                                    <input type="number" id="upgoal" name="upgoal" placeholder="">
                              
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

        <!-- TABLE -->
        <div class="container">
            <div class="">
        
        <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Active Status
                                <select id="status-filter" class="form-control">
                                    <option>Active</option>
                                    <option>Not Started</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                            </th>
                            <th>GN Division
                                <select id="milestone-filter" class="form-control">
                                    <option>None</option>
                                    <option>Palannoruwa</option>
                                    <option>Koralaema</option>
                                    <option>Olaboduwa </option>
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
                        <h4>Funds for displaced person</h4>
                            <p>Bellapitiya</p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>
                                <a href="<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising" class="btn_views">View</a>
                            </div>
                        </div>
                    </div>

                    <div class="col6">
                        <div class="box row-content">
                            <h4>Funds for property damages</h4>
                            <p>Millaniya</p>

                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                            <a href="/<?php echo baseUrl; ?>" class="btn_active">Active</a>

                                <a href="<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising" class="btn_views">View</a>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <script>
        var thisPage = "#FundRaising";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getFundraiser();
            $(".btn_update").on('click', function() {
                var id = $(this).attr("id");
                var title = $(this).attr("data-title");
                var description = $(this).attr("data-description");
                var goal = $(this).attr("data-goal");

                $("#updateform").fadeIn();
                $("#update").trigger("reset");
                $("#updateform").addClass('model-open');

                $("#uptitle").val(title);
                $("#updescription").val(description);
                $("#upgoal").val(goal);

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

        function getFundraiser() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>fundraiser",
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
                $sample += "<p>No fundraiser data</p>";
            } else {
                for (var i = 0; i < output.length; i++) {
                    let obj = output[i];
                    console.log(obj);

                    if (i % 2 == 0) {
                        $sample += "<div class='row'>";
                    }
                    $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                    if (obj['isActive'] == 1) {
                        $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                    }
                    $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
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
                $sample += "<p>No fundraiser data</p>";
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
                        $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
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
                            $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
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
                            $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising/" + obj['incidentId'] + "' class='btn_views'>View</a></div></div></div>";
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

        $('#search').keyup(function () {
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

            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "POST",
                url: "<?php echo API; ?>fundraiser",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    console.log(result);
                    var url = "<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising";
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
                url: "<?php echo API; ?>fundraiser/" + id,
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
                url: "<?php echo API; ?>fundraiser/" + id,
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