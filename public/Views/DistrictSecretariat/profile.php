<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> District Secretariat </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_admin.css">
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
                    <div class="row">

                        <div class="col3">
                            <label for="user role">District</label>
                        </div>
                        <div class="col9">
                            <select id="District" name="District">
                                <option value="null">Kalutara</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Kaluthara">Kaluthara</option>
                            </select>
                        </div>

                    </div>


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
                            <label for="fname">NIC</label>
                        </div>
                        <div class="col9">
                            <input type="text" id="NIC" name="NIC" placeholder="NIC">
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
                            <input type="text" id="TP number" name="TP number" placeholder="Phone number">
                        </div>
                    </div>

                    <h4 class="text-center">Office Details</h4>
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
                            <input type="text" id="TP number" name="TP number" placeholder="Phone number">
                        </div>
                    </div>
                    <div class="row">

                        <div class="row">

                            <div class="col3">
                                <label for="TP number">Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="TP number" name="TP number" placeholder="Password">
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
                            <input type="password" id="TP number" name="TP number" placeholder="New Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col3">
                            <label for="TP number">Confirm Password</label>
                        </div>
                        <div class="col9">
                            <input type="password" id="TP number" name="TP number" placeholder="Confirm Password">
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



    </section>

</body>

</html>