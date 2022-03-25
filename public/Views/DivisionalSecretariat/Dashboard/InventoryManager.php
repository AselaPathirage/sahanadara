<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
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
    include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php');
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
            <h1>Inventory Manager</h1>
            <div id="alertBox">
            </div>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a class="btn_blue Click-here">Create Inventory Manager</a>
                </div>
            </div>
            <div class="custom-model-main addform">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form id='add' name="add" method="post" onSubmit="return validate_nic();">
                                <h1 class="text-center">New Inventory Manager</h1>
                                <div class="row-content">
                                    <label for="firstname">First Name</label>
                                    <input type="text" id="firstname" name="firstname" placeholder="First Name" required='true'>

                                    <label for="lastname">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" required='true'>

                                    <label for="NIC">NIC</label>
                                    <input type="text" id="NIC" name="NIC" placeholder="NIC" maxlength="12" required='true'>
                                    <div id="nicCheck">
                                    </div>

                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Email" required='true'>

                                    <label for="address">Address</label>
                                    <textarea type="text" id="address" name="address" placeholder="Address" required='true'></textarea>

                                    <label for="TP number">TP Number</label>
                                    <div id="tpCheck">
                                    </div>
                                    <input type="text" id="TP_number" name="TP_number" placeholder="Phone number" maxlength="11" required='true'>
                                    <div class="row " style="text-align:right;justify-content: right;">
                                        <input type="reset" class="btn-alerts btn_cancel cancel" class="btn-alerts" style="background-color: red;" value="Cancel">
                                        <input type="submit" class="btn-alerts" style="background-color: darkblue;" value="Submit">
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
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form id='update' name="update" method="POST">
                                <h1 class="text-center">Email Already in use.</h1>
                                <h3>Transfer <span id="empId0"></span> to our inventory?</h3>
                                <div class="row-content">
                                    <input type="hidden" id="empId" name="empId">
                                    <div class="row " style="text-align:right;justify-content: right;">
                                        <input type="reset" class="btn-alerts btn_cancel cancel" style="background-color: red;" value="Cancel">
                                        <input type="submit" style="background-color: darkblue;" value="Transfer">
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
            <!-- <table class="table">
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
            </table> -->
        </div>
        <div class="container" id="tbodyid">
            <div class="row">
                <div class="col6">
                    <div class="box row-content">
                        <h4>Name 1</h4>
                        <p>email 1</p>

                        <div class="row" style="text-align: right; margin: 0 auto;display:block">
                            <a class="btn_active">Active</a>
                            <a href="<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising" class="btn_views">View</a>
                        </div>
                    </div>
                </div>

                <div class="col6">
                    <div class="box row-content">
                        <h4>Name 2</h4>
                        <p>Email 2</p>

                        <div class="row" style="text-align: right; margin: 0 auto;display:block">
                            <a class="btn_active">Active</a>

                            <a href="<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/FundRaising" class="btn_views">View</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </section>
    <script>
        var thisPage = "#InventoryManager";
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#alertBox").click(function() {
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
            $(".btn_update").on('click', function() {

            });
            $(".btn_delete").on('click', function() {
                var id = $(this).attr("id");
                $("#deleteform").fadeIn();
                $("#deleteform").addClass('model-open');
                $("#item2").val(id);
            });
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
                console.log(json);
                //$("#add").trigger("reset");
                $.ajax({
                    type: "POST",
                    url: "<?php echo API; ?>user",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        console.log(result);
                        if (result.code == 806) {
                            alertGen("Record Added Successfully!", 1);
                            getInventorymgr();
                        } else if (result.code == 814) {
                            $("#empId0").html(result.employeeId);
                            $("#empId").val(result.employeeId);
                            $("#updateform").fadeIn();
                            $("#update").trigger("reset");
                            $("#updateform").addClass('model-open');
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                    },
                    error: function(err) {
                        alertGen("Unable to handle request.", 2);
                    }
                });
            });

            $("#delete-confirm").submit(function(e) {
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
                    url: "<?php echo API; ?>user/" + id,
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        $('#trow').empty();
                        getResponsible();
                        location.reload();
                        if (result.code == 806) {
                            alertGen("Record Added Successfully!", 1);
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
            $('#District').change(function() {
                var val = $(this).val();
                var divOptions = "<option value=''>Select Division</option>";
                $.getJSON('<?php echo HOST; ?>public/assets/json/data.json', function(result) {
                    $.each(result, function(i, district) {
                        if (district.dsId == val) {
                            $.each(district.division, function(j, division) {
                                divOptions += "<option value='" + division.dvId + "'>" + division.name + "</option>";
                            })
                        }
                    });
                    $('#Division').html(divOptions);
                })
            });

            $('#Division').change(function() {
                var div = $(this).val();
                var dist = $('#District').val();
                var gnOptions = "<option value=''>Select GNDivision</option>";
                $.getJSON('<?php echo HOST; ?>public/assets/json/data.json', function(result) {
                    $.each(result, function(i, district) {
                        if (district.dsId == dist) {
                            $.each(district.division, function(j, division) {
                                if (division.dvId == div) {
                                    $.each(division.gnArea, function(k, gnArea) {
                                        gnOptions += "<option value='" + gnArea.gndvId + "'>" + gnArea.name + "</option>";
                                    })
                                }
                            })
                        }
                    });
                    $('#Gndivision').html(gnOptions);
                })
            });
        });

        //validations
        document.getElementById("NIC").addEventListener("keyup", function(e) {
            var nicNum = document.getElementById("NIC").value;
            var cnic_no_regex = new RegExp('^[0-9+]{9}[vV|xX]$');
            var new_cnic_no_regex = new RegExp('^[0-9+]{12}$');
            if (nicNum.length == 10 && cnic_no_regex.test(nicNum)) {
                $("#nicCheck").html("");
            } else if (nicNum.length == 12 && new_cnic_no_regex.test(nicNum)) {
                $("#nicCheck").html("");
            } else {
                $("#nicCheck").html("<lable style='color:red'>Please input valid NIC number.</lable>");
            }
        });
        document.getElementById("TP_number").addEventListener("keyup", function(e) {
            var nicNum = document.getElementById("TP_number").value;
            console.log(nicNum);
            var cnic_no_regex = new RegExp('/([07][0-9]{1})[-. ]([0-9]{7})$');
            var new_cnic_no_regex = new RegExp('/([07][0-9]{9})$');
            if (nicNum.length == 11 && cnic_no_regex.test(nicNum)) {
                $("#tpCheck").html("bbbbb");
            } else if (nicNum.length == 10 && new_cnic_no_regex.test(nicNum)) {
                $("#tpCheck").html("aaaaa");
            } else {
                //$("#tpCheck").html("<lable style='color:red'>Please input valid telephone number.</lable>");
            }
        });

        function isNumber(e) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function validate_nic(nic) {
            var cnic_no_regex = new RegExp('^[0-9+]{9}[vV|xX]$');
            var new_cnic_no_regex = new RegExp('^[0-9+]{12}$');
            if (nic.length == 10 && cnic_no_regex.test(nic)) {
                $("#nicCheck").html("");
                return true;
            } else if (nic.length == 12 && new_cnic_no_regex.test(nic)) {
                $("#nicCheck").html("");
                return true;
            } else {
                $("#nicCheck").html("<lable style='color:red'>Please input valid NIC number.</lable>");
                return false;
            }
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

        getInventorymgr();
        var output;

        function getInventorymgr() {
            // var object = {};
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>inventorymgr",
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
                $sample += "<p>No inventorymgr data</p>";
            } else {
                for (var i = 0; i < output.length; i++) {
                    let obj = output[i];
                    console.log(obj);

                    if (i % 2 == 0) {
                        $sample += "<div class='row'>";
                    }
                    $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['empName'] + "</h4><p>" + obj['empEmail'] + "</p><p> Contact :" + obj['empTele'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                    if (obj['isActive'] == 1) {
                        $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                    }
                    $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/InventoryManager/" + obj['inventoryMgtOfficerID'] + "' class='btn_views'>View</a></div></div></div>";
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
                        $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['empName'] + "</h4><p>" + obj['empEmail'] + "</p><p> Contact :" + obj['empTele'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                        if (obj['isActive'] == 1) {
                            $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                        }
                        $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/InventoryManager/" + obj['inventoryMgtOfficerID'] + "' class='btn_views'>View</a></div></div></div>";
                        if ((i % 2 == 1) || (i == output.length - 1)) {
                            $sample += "</div>";
                        }
                    } else if (status == "1") {
                        if (obj['isActive'] == 1) {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['empName'] + "</h4><p>" + obj['empEmail'] + "</p><p> Contact :" + obj['empTele'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 1) {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/InventoryManager/" + obj['inventoryMgtOfficerID'] + "' class='btn_views'>View</a></div></div></div>";
                            if ((i % 2 == 1) || (i == output.length - 1)) {
                                $sample += "</div>";
                            }
                        }
                    } else {
                        if (obj['isActive'] == 0) {
                            if (i % 2 == 0) {
                                $sample += "<div class='row'>";
                            }
                            $sample += "<div class='col6'><div class='box row-content' style='position:relative;'><h4>" + obj['empName'] + "</h4><p>" + obj['empEmail'] + "</p><p> Contact :" + obj['empTele'] + "</p><div class='row' style='text-align: right; margin: 0 auto;display:block;'>";
                            if (obj['isActive'] == 1) {
                                $sample += "<a class='btn_active' style='position: absolute; top:15px;right:35px;'>Status : Active</a>";
                            }
                            $sample += "<a href='<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/InventoryManager/" + obj['inventoryMgtOfficerID'] + "' class='btn_views'>View</a></div></div></div>";
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

        $(function() {
            $('#user_role').change(function() {
                console.log($(this).val());
                var value = $(this).val();
                if (value == 0) {
                    $('#DistrictBox').hide();
                    $('#DivisionBox').hide();
                    $('#GndivisionBox').hide();
                } else if (value == 1) {
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').show();
                } else if (value == 4) {
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').hide();
                } else if (value == 3) {
                    $('#DistrictBox').show();
                    $('#DivisionBox').hide();
                    $('#GndivisionBox').hide();
                } else if (value == 6) {
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').hide();
                }
            });
        });
    </script>
</body>

</html>