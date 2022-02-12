<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php
    include_once('./public/Views/Admin/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/Admin/includes/topnav.php');
        ?>
        <div class="space"></div>

        <div class="container col8">
            <form id='update' name="update" method="post">
                <div class="box">
                    <div class="box1">
                        <h1 class="text-center">Profile</h1>


                        <h4 class="text-center">Personal Details</h4>

                        <div class="row">
                            <div class="col3">
                                <label for="fname">First Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="fname" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="lname">Last Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="lname" name="lastname" placeholder="Last Name">
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
                                <label for="TP number">Telephone Number</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="tpnumber" name="tpnumber" placeholder="Phone number">
                            </div>
                        </div>

                        
                        <div class="row">

                            <div class="row">

                                <div class="col3">
                                    <label for="TP number">Password</label>
                                </div>
                                <div class="col9">
                                    <input type="password" id="updatepass" name="updatepass" placeholder="Password">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col3">
                                    <label for="TP number"> </label>
                                </div>
                                <div class="col9 row-content">
                                    <span>* Enter password to save changes</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-center">Reset Password</h4>
                        <div class="row">
                            <div class="col3">
                                <label for="TP number">New Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="newpass" name="newpass" placeholder="New Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="TP number">Confirm Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="confirmpass" name="confirmpass" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="row">

                            <div class="row">

                                <div class="col3">
                                    <label for="TP number">Old Password</label>
                                </div>
                                <div class="col9">
                                    <input type="password" id="oldpass" name="oldpass" placeholder="Password">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col3">
                                    <label for="TP number"> </label>
                                </div>
                                <div class="col9 row-content">
                                    <span>* Enter password to save changes</span>
                                </div>
                            </div>
                        </div>

                        <div class="row " style="text-align:right;justify-content: right;">
                            <input type="submit" style="background-color: red;" value="Cancel">
                            <input type="submit" style="background-color: darkblue;" value="Submit">
                        </div>
                    </div>
                   
                </div>

            </form>

        </div>
        <div id="alertBox">
        </div>


    </section>
    <script>
        var id = '';
         $(document).ready(function() {
            id = '<?php echo $_SESSION['userId'] ?>';
            getuser();
         });

         function getuser(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>user/5/"+id,
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            var name = output[0].empName;
            var fname = name.split(" ")[0];
            var lname = name.split(" ")[1];
            $('#fname').val(fname);
            $('#lname').val(lname);
            $('#email').val(output[0].empEmail);
            $('#address').val(output[0].empAddress);
            $('#tpnumber').val(output[0].empTele);
         }


         $("#update").submit(function(e) {
                e.preventDefault();
                var str = [];
                var formElement = document.querySelector("#update");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                object['roleId'] = 5;
                object['empId'] = id;
                var json = JSON.stringify(object);
                console.log(json);
                if($('#oldpass').val() == "" && $('#updatepass').val() == ""){
                    alertGen("Please fill required fields.",2);
                }
                
                if($('#updatepass').val() != ""){
                    $("#update").trigger("reset");
                    $.ajax({
                        type: "PUT",
                        url: "<?php echo API; ?>profile",
                        data: json,
                        headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                        cache: false,
                        success: function(result) {
                            console.log(result);
                            if(result.code==806){
                                alertGen("Updated Successfully!",1);
                            }else{
                                alertGen("Unable to handle request.",2);
                            }
                        },
                        error: function(err) {
                            alertGen("Unable to handle request.",2);
                        }
                    }); 
                }
                if($('#oldpass').val() != ""){
                    if($('#newpass').val() == "" || $('#confirmpass').val() == ""){
                        alertGen("Please fill required fields.",2);
                    }else if($('#newpass').val() != $('#confirmpass').val()){
                        alertGen("Passwords does not match.",2);
                    }else {
                        $("#update").trigger("reset");
                        $.ajax({
                            type: "PUT",
                            url: "<?php echo API; ?>resetPassword/admin",
                            data: json,
                            headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                            cache: false,
                            success: function(result) {
                                console.log(result);
                                if(result.code==806){
                                    alertGen("Updated Successfully!",1);
                                }else{
                                    alertGen("Unable to handle request.",2);
                                }
                            },
                            error: function(err) {
                                alertGen("Unable to handle request.",2);
                            }
                        }); 
                    }
                }
                
            });

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