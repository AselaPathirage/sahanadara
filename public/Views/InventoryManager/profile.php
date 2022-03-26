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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                                <input type="text" id="firstname" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="lastname">Last Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="lastname" name="lastname" placeholder="Last Name">
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
                            <input type="password" id="oldpassword" name="oldpassword" placeholder="New Password">
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
                </div>
            </div>
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
    </script>
</body>

</html>