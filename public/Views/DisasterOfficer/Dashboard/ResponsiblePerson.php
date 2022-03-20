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
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">
            <h1>Responsible Person</h1>
            <div id="alertBox">
            </div>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a class="btn_blue Click-here">Create Responsible Person</a>
                </div>
            </div>
            <div class="custom-model-main addform">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                        <form id='add' name="add" method="POST" onSubmit="return validate_nic();">
                            <h1 class="text-center">New Responsible Person</h1>
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
                                    <textarea type="text" id="address" name="address" placeholder="Address" required='true' ></textarea>
                            
                                    <label for="TP number">TP Number</label>
                                    <div id="tpCheck">
                                    </div>
                                    <input type="text" id="TP_number" name="TP_number" placeholder="Phone number" maxlength="11" required='true'>
                                
                                    <label for="safehouse">Safe House</label>
                                    <select id="safehouse" name="safehouse" required="true" >
                                    <option>Select a SafeHouse</option>
                                    </select>

                                    <div class="row " style="text-align:right;justify-content: right;">
                                        <input type="reset" style="background-color: red;" value="Cancel">
                                        <input type="submit" style="background-color: darkblue;margin-top:0px" value="Submit">
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
                        <form id='update' name="update" method="POST" onSubmit="return validate_nic();">
                            <h1 class="text-center">Update Record</h1>
                            <div class="row-content">
                                    <label for="firstname">First Name</label>
                                    <input type="text" id="upfirstname" name="upfirstname" required='true'>
                                
                                    <label for="lastname">Last Name</label>
                                    <input type="text" id="uplastname" name="uplastname" required='true'>
                                
                                    <label for="NIC">NIC</label>
                                    <input type="text" id="upNIC" name="upNIC" maxlength="12" required='true'>
                                    <div id="nicCheck">
                                    </div>

                                    <label for="email">Email</label>
                                    <input type="email" id="upemail" name="upemail" required='true'>
                             
                                    <label for="address">Address</label>
                                    <textarea type="text" id="upaddress" name="upaddress" required='true' ></textarea>
                            
                                    <label for="TP number">TP Number</label>
                                    <div id="tpCheck">
                                    </div>
                                    <input type="text" id="upTP_number" name="upTP_number" maxlength="11" required='true'>
                                
                                    <label for="safehouse">Safe House</label>
                                    <select id="upsafehouse" name="upsafehouse" required="true" >
                                    <option>Select a SafeHouse</option>
                                    </select>

                                    <div class="row " style="text-align:right;justify-content: right;">
                                        <input type="reset" style="background-color: red;" value="Cancel">
                                        <input type="submit" style="background-color: darkblue;margin-top:0px" value="Update">
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

                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>NIC</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>TP Number</th>
                                    <th>Safe House</th>
                                    <th>Action</th>

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
        var thisPage = "#ResponsiblePerson";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getResponsible();

            var distOptions = "<option value=''>Select District</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    distOptions += "<option value='"+district.dsId+"'>"+district.name+"</option>";
                });
                 $('#District').html(distOptions);
            })
            $('#DistrictBox').hide();
            $('#DivisionBox').hide();
            $('#GndivisionBox').hide();

            $(".btn_update").on('click', function() {
                var id = $(this).attr("id");
                var fname = $(this).attr("data-fname");
                var lname = $(this).attr("data-lname");
                var nic = $(this).attr("data-nic");
                var email = $(this).attr("data-email");
                var address = $(this).attr("data-address");
                var telno = $(this).attr("data-telno");
                var safehouse = $(this).attr("data-safehouse");

                $("#updateform").fadeIn();
                $("#update").trigger("reset");
                $("#updateform").addClass('model-open');

                $("#upfirstname").val(fname);
                $("#uplastname").val(lname);
                $("#upNIC").val(nic);
                $("#upemail").val(email);
                $("#upaddress").val(address);
                $("#upTP_number").val(telno);
                $("#upsafehouse").val(safehouse);

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

        });

        //validations
        document.getElementById("NIC").addEventListener("keyup",function(e){
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
        document.getElementById("TP_number").addEventListener("keyup",function(e){
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

        $('#District').change(function(){
            var val = $(this).val();
            var divOptions = "<option value=''>Select Division</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    if(district.dsId == val){
                        $.each(district.division,function(j,division){
                           divOptions += "<option value='"+division.dvId+"'>"+division.name+"</option>";  
                        })
                    }
                });
                $('#Division').html(divOptions);
            })
        })
        
        $('#Division').change(function(){
            var div = $(this).val();
            var dist = $('#District').val();
            var gnOptions = "<option value=''>Select GNDivision</option>";
            $.getJSON('<?php echo HOST; ?>public/assets/json/data.json',function(result){
                $.each(result,function(i,district){
                    if(district.dsId == dist){
                        $.each(district.division,function(j,division){
                           if(division.dvId == div){
                               $.each(division.gnArea, function(k,gnArea){
                                gnOptions += "<option value='"+gnArea.gndvId+"'>"+gnArea.name+"</option>"; 
                               })
                           }
                        })
                    }
                });
                $('#Gndivision').html(gnOptions);
            })
        })

        
        function alertGen($messege,$type){
            if ($type == 1){
                $("#alertBox").html("  <div class='alert success-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else if($type == 2){
                $("#alertBox").html("  <div class='alert warning-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else{
                $("#alertBox").html("  <div class='alert danger-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
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
                console.log(json);
                //$("#add").trigger("reset");
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>user",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
                        console.log(result);
                        if(result.code==806){
                            alertGen("Record Added Successfully!",1);
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
					},
					error: function(err) {
						alertGen("Unable to handle request.",2);
					}
				}); 
        });

        $("#update").submit(function(e) {
                e.preventDefault();
                $("#updateform").fadeOut();
                $("#updateform").removeClass('model-open');
                var str = [];
                var formElement = document.querySelector("#update");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                });
                $("#update").trigger('reset');
                var json = JSON.stringify(object);
                console.log(json);
                //$("#add").trigger("reset");
                $.ajax({
					type: "PUT",
					url: "<?php echo API; ?>user/" + id,
					data: json,
                    headers: {
                        'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
                        $('#trow').empty();
                        getResponsible();
                        location.reload();
                        if(result.code==806){
                            alertGen("Record Added Successfully!",1);
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
					},
					error: function(err) {
						alertGen("Something went wrong.", 3);
                    console.log(err);
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
                        'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
                        $('#trow').empty();
                        getResponsible();
                        location.reload();
                        if(result.code==806){
                            alertGen("Record Added Successfully!",1);
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
					},
					error: function(err) {
						alertGen("Something went wrong.", 3);
                    console.log(err);
					}
				}); 
        });
        
        function getResponsibleperson() {
            // var object = {};


            // var json = JSON.stringify(object);
            // console.log(object);
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>responsible",
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
                let cell5 = row.insertCell(-1);

                var attribute = document.createElement("a");
                attribute.id = obj['responsibleId'];
                // attribute.href = "";
                attribute.className = "btn_update btn_blue";
                attribute.name = "update";
                attribute.innerHTML = "Update";
                attribute.setAttribute("data-fname", obj['responsiblefName'])
                attribute.setAttribute("data-fname", obj['responsiblelName'])
                attribute.setAttribute("data-nic", obj['responsibleNIC'])
                attribute.setAttribute("data-email", obj['responsibleemail'])
                attribute.setAttribute("data-address", obj['responsibleAddress'])
                attribute.setAttribute("data-telno", obj['responsibleTelNo'])
                attribute.setAttribute("data-safehouse", obj['responsibleSafehouse'])
                var attribute2 = document.createElement("a");
                
                attribute2.id = obj['responsibleId'];
                // attribute2.href = "";
                attribute2.className = "btn_delete";
                attribute2.name = "delete";
                attribute2.innerHTML = "Delete";

                cell1.innerHTML = obj['responsiblefName'];
                cell1.innerHTML = obj['responsiblelName'];
                cell2.innerHTML = obj['residentNIC'];
                cell2.innerHTML = obj['responsibleemail'];
                cell3.innerHTML = obj['residentAddress'];
                cell4.innerHTML = obj['residentTelNo'];
                cell4.innerHTML = obj['responsibleSafehouse'];
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

        function filterSafehouse(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>safehouse/name",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            // console.log(output);
            var select = document.getElementById("safehouse");

            for (var i = 0; i < output.length; i++) {
                //console.log(i);
                var opt = document.createElement('option');
                opt.value = output[i]['safeHouseID'];
                opt.innerHTML = output[i]['safeHouseName'];
                select.appendChild(opt);


            }
        }
        filterSafehouse();

      
        $(function() {
            $('#user_role').change(function(){
                console.log($(this).val());
                var value = $(this).val();
                if(value==0){
                    $('#DistrictBox').hide();
                    $('#DivisionBox').hide();
                    $('#GndivisionBox').hide();
                }else if(value==1){
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').show();
                }else if(value==4){
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').hide();
                }else if(value==3){
                    $('#DistrictBox').show();
                    $('#DivisionBox').hide();
                    $('#GndivisionBox').hide();
                }else if(value==6){
                    $('#DistrictBox').show();
                    $('#DivisionBox').show();
                    $('#GndivisionBox').hide();
                }
            });
        });
    </script>
</body>
</html>