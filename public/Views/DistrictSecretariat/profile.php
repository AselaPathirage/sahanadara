<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> District Secretariat </title>
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
    include_once('./public/Views/DistrictSecretariat/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DistrictSecretariat/includes/topnav.php');
        ?>
        <div class="space"></div>

        <div class="container col8">
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
                            <label for="tpnumber">Telephone Number</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="tpnumber" name="tpnumber" placeholder="Phone number">
                        </div>
                    </div>

                    <h4 class="text-center">Office Details</h4>
                    <div class="row">
                        <div class="col3">
                            <label for="officeaddress">Address</label>
                        </div>
                        <div class="col9">
                            <textarea type="text" id="officeaddress" name="officeaddress" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="officetpnumber">Telephone Number</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="officetpnumber" name="officetpnumber" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="row">

                        <div class="row">

                            <div class="col3">
                                <label for="updatepass">Password</label>
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
                            <label for="newpass">New Password</label>
                        </div>
                        <div class="col9">
                            <input type="password" id="newpass" name="newpass" placeholder="New Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="confirmpass">Confirm Password</label>
                        </div>
                        <div class="col9">
                            <input type="password" id="confirmpass" name="confirmpass" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row">

                        <div class="row">

                            <div class="col3">
                                <label for="oldpass">Old Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="oldpass" name="oldpass" placeholder="Old Password">
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
                    </form>
                </div>
            </div>



        </div>
        <div id="alertBox">
        </div>


    </section>
    <script>
         var id = '';
         $(document).ready(function() {
            id = '<?php echo $_SESSION['userId'] ?>';
            getProfile();
         });
         
         function getProfile(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>profile/"+id,
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            var name = output[0].empName;
            var fname = name.split(" ")[0];
            var lname = name.split(" ")[1];
            $('#fname').val(fname);
            $('#lname').val(lname);
            $('#email').val(output[0].empEmail);
            $('#address').val(output[0].empAddress);
            $('#tpnumber').val(output[0].empTele);
            $('#officetpnumber').val(output[0].districtofficeTelno);
            $('#officeaddress').val(output[0].districtSOfficeAddress);
         }

    </script>

</body>

</html>