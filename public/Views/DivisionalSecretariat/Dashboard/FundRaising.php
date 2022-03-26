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
                            <form action="#" id='add' name="add" method="POST" ">
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
                            <form action="#" id='update' name="update" method="POST" ">
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
                            
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="container" id="tbodyid">
                

            </div>
        </div>

    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/searchselect.js"></script>
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
            getmyFundraiser();
            $(".btn_update").on('click', function() {
                var id = $(this).attr("data-id");


                var out = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>fundraiser/"+id,
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
                $("#uptitle").val(out[0]['title']);
                $("#updescription").val(out[0]['description']);
                $("#upgoal").val(out[0]['goal']);
                $("#updateform").fadeIn();
                $("#updateform").addClass('model-open');

                

            });
            $(".btn_delete").on('click', function() {
                var id = $(this).attr("id");

                $("#deleteform").fadeIn();

                $("#deleteform").addClass('model-open');
                $("#item2").val(id);
            });

            $("input[type='checkbox']").change(function(e) {
                console.log((this).id);
                e.preventDefault();
                var object = {};

                if (this.checked) {
                    object['isActive'] = 'y';
                } else {
                    object['isActive'] = 'n';
                }
                var id = $(this).data("incid");
                object['recordId'] = id;
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                type: "PUT",
                url: "<?php echo API; ?>fundraiserstatus",
                data: json,
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                success: function(result) {
                    
                    getFundraiser();
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
                    $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><div class='button-row-container' style='position: absolute; top:15px;right:35px;'><div class='switch-container switch-ios'><input type='checkbox' name='ios" + i + "' id='ios" + i + "' class='ios' data-incid='" + obj['recordId'] + "' ";
                    if (obj['isActive'] == 'y') {
                        $sample += "checked";
                    }
                    $sample += "/><label for='ios" + i + "'></label></div></div><h4>" + obj['recordId']+"-"+ obj['title'] + "</h4><p>" + obj['description'] + "</p><p>" + obj['goal'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                    if (obj['isActive'] == 'y') {
                        $sample += "<a class='btn_active' style='position: absolute; top:33px;right:95px;'>Status : Active</a>";
                    }
                    $sample += "<a class='btn_update btn_blue' data-id='" + obj['recordId'] + "'>Update</a></div></div></div>";
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
                        if (obj['isActive'] == 'y') {
                            $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                        }
                        $sample += "<a ' class='btn_update btn_blue'" + obj['recordId'] + ">Update</a></div></div></div>";
                        if ((i % 2 == 1) || (i == output.length - 1)) {
                            $sample += "</div>";
                        }
                    } else if (status == "1") {
                        if (obj['isActive'] == 'y') {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 'y') {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a ' class='btn_update btn_blue'" + obj['recordId'] + ">Update</a></div></div></div>";
                            if ((i % 2 == 1) || (i == output.length - 1)) {
                                $sample += "</div>";
                            }
                        }
                    } else {
                        if (obj['isActive'] == 'n') {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['title'] + "</h4><p>" + obj['description'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 'n') {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a ' class='btn_update btn_blue'" + obj['recordId'] + ">Update</a></div></div></div>";
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

        function getmyFundraiser() {
            
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>fundraiser/id",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // var table = document.getElementById("tbodyid");

            // for (var i = 0; i < output.length; i++) {
            //     let obj = output[i];
            //     // console.log(obj);
                
            //     var attribute = document.createElement("a");
            //     attribute.id = obj['recordId'];
            //     // attribute.href = "";
            //     attribute.className = "btn_update btn_blue";
            //     attribute.name = "update";
            //     attribute.innerHTML = "Update";
            //     attribute.setAttribute("data-title", obj['title'])
            //     attribute.setAttribute("data-description", obj['description'])
            //     attribute.setAttribute("data-goal", obj['goal'])
            //     var attribute2 = document.createElement("a");


            //     attribute2.id = obj['recordId'];
            //     // attribute2.href = "";
            //     attribute2.className = "btn_delete";
            //     attribute2.name = "delete";
            //     attribute2.innerHTML = "Delete";
            //     var attribute3 = document.createElement("span");
            //     attribute3.innerHTML = " ";
            //     // console.log(attribute);
            //     // console.log(attribute2);
            // }
        }

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