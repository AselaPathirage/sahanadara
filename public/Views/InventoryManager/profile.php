<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Inventory Manager</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        td {
            border: none;
            text-align: left;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <?php
    include_once('./public/Views/InventoryManager/includes/sidebar_inventory.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/InventoryManager/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container col8">
            <div class="box">
                <div class="box1">
                    <h1 class="text-center">Profile</h1>
                    <div class="row">
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="district">District</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="district" value="" disabled='true'>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col3">
                                    <label for="division">DS Office</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="division" value="" disabled='true'>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="text-center">Personal Details</h4>
                    <form>
                        <div class="row">
                            <div class="col3">
                                <label for="firstname">First Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="firstname" name="firstname" disabled='true' placeholder="First Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="lastname">Last Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="lastname" name="lastname" disabled='true' placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="email">Email</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col9">
                                <textarea type="text" id="address" name="address" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="TPnumber">Telephone Number</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="TPnumber" name="TPnumber" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="row " style="text-align:right;justify-content: right;">
                            <input type="submit" style="background-color: darkblue;width:25%;" value="Update Data">
                        </div>
                    </form>
                    <form>
                        <h4 class="text-center">Reset Password</h4>
                        <div class="row">
                            <div class="col3">
                                <label for="oldpassword">Current Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="oldpassword" name="oldpassword" placeholder="Current Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="newpassword1">New Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="newpassword1" name="newpassword1" placeholder="New Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="newpassword2">Confirm Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="newpassword2" name="newpassword2" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="row " style="text-align:right;justify-content: right;">
                            <input type="reset" style="background-color: red;width:25%;" value="Cancel">
                            <input type="submit" style="background-color: darkblue;width:25%;" value="Reset Password">
                        </div>
                    </form>
                    <form>
                        <h4 class="text-center">Security Settings</h4><br>
                        <center>
                            <input type="button" class="form-control btn_click" style="width: 50%;background-color:cornflowerblue;color:black" value="Reset Security Key" id='resetKey'>
                        </center><br><br><br><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="custom-model-main" id="editKey">
            <div class="custom-model-inner">
                <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">
                        <h1>Update Item</h1>
                        <div class="row-content">
                            <form id='updatekey' name="updatekey" method="post">
                                <table class="model-table" style="width: 100%;" border="0">
                                    <tr>
                                        <td>
                                            <label for="your_name">User Name</label>
                                            <input type="text" id="username" name="username" placeholder="User Name" title="Type" class="form-control" required='true'>
                                        </td>
                                        <td>
                                            <label for="your_name">Password</label>
                                            <input type="password" id="password" name="password" placeholder="Password" title="Type" class="form-control" required='true'>
                                        </td>
                                    </tr>
                                </table>
                                <input type="hidden" id="item" value="">
                                <div class="row" style="justify-content: center;">
                                    <input type="submit" value="Update" class="btn-alerts" />
                                    <input type="reset" value="Reset" class="btn-alerts" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-overlay"></div>
        </div>
        <div id="alertBox">

</div>
    </section>
    <script>
        var thisPage = "#new";
        $(document).ready(function() {
            $("#stats,#updates").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#resetKey").click(function(e) {
                $("#editKey").fadeIn();
                $("#editKey").addClass('model-open');
            });
            $(".close-btn, .bg-overlay, .cancel").click(function() {
                $(".custom-model-main").removeClass('model-open');
            });
            $("#updatekey").submit(function(e) {
                e.preventDefault();
                var object = {};
                object['username'] = document.getElementById("username").value;
                object['password'] = document.getElementById("password").value;
                //$("#update").trigger('reset');
                var json = JSON.stringify(object);
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>rewoke",
					data: json,
					cache: false,
					success: function(result) {
						//$("#updatekey").trigger('reset');
                        $(".custom-model-main").removeClass('model-open');
                        console.log(result);
                        if(result.key){
                            alertGen("Record Added Successfully!",1);
                            $("#updatekey").trigger("reset");
                        }else{
                            alertGen("Unable to handle request.",2);
                        }
					},
					error: function(err) {
						alertGen("Something went wrong.",3);
                        console.log(err);
					}
				});
            });
            $("#alertBox").click(function() {
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        loadData();

        function loadData() {
            var requests = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>user/self/all",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            console.log(requests);
            document.getElementById('district').value = requests.district;
            document.getElementById('division').value = requests.division;
            var name = requests.empName.split(" ");
            document.getElementById('firstname').value = name[0];
            name.shift();
            var myString = name.join(' ')
            document.getElementById('lastname').value = myString;
            document.getElementById('email').value = requests.empEmail;
            document.getElementById('address').value = requests.empAddress;
            document.getElementById('TPnumber').value = requests.empTele;
        }
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
    </script>
</body>

</html>