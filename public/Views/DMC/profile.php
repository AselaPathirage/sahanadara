<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>DMC</title>
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
    include_once('./public/Views/DMC/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DMC/includes/topnav.php');
        ?>
        <div class="space"></div>

        <div class="container col8">
            <div class="box">
                <div class="box1">
                    <form action="" id='profile' name="profile" method="POST">
                        <h1 class="text-center">Profile</h1>
                        <div id="alertBox"></div>

                        <h4 class="text-center">Personal Details</h4>

                        <div class="row">
                            <div class="col3">
                                <label for="fname">Name</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="name" name="name" placeholder="Name" readonly>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col3">
                                <label for="fname">NIC</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="nic" name="nic" placeholder="NIC" readonly>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col3">
                                <label for="email">Email</label>
                            </div>
                            <div class="col9">
                                <input type="email" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col9">
                                <textarea type="text" id="add" name="add" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="TP number">Telephone Number</label>
                            </div>
                            <div class="col9">
                                <input type="text" id="tel" name="tel" placeholder="Phone number">
                            </div>
                        </div>


                        <div class="row">

                            <div class="row">

                                <div class="col3">
                                    <label for="TP number">Password</label>
                                </div>
                                <div class="col9">
                                    <input type="password" id="password" name="password" placeholder="Password" required>
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
                                <input type="password" id="npassword" name="npassword" placeholder="New Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col3">
                                <label for="TP number">Confirm Password</label>
                            </div>
                            <div class="col9">
                                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="row " style="text-align:right;justify-content: right;">
                            <input type="reset" style="background-color: red;" value="Cancel">
                            <input type="submit" style="background-color: darkblue;" value="Submit">
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
            getProfileDetails();
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getProfileDetails() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>profile",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var data = output[0];
            console.log(data);

            var dis = data['dsName'];
            var ds = data['dvName'];
            var gn = data['gnDvName'];
            var name = data['empName'];
            // var nic = data['nid'];
            var email = data['empEmail'];
            var add = data['empAddress'];
            var tel = data['empTele'];
            var ofAdd = data['officeAddress'];
            var ofTel = data['telno'];

            $("#dis").val(dis);
            $("#ds").val(ds);
            $("#gn").val(gn);
            $("#name").val(name);
            // $("#nic").val(nic);
            $("#email").val(email);
            $("#tel").val(tel);
            $("#add").val(add);
            $("#ofAdd").val(ofAdd);
            $("#ofTel").val(ofTel);

        }

        $('#profile').submit(function(e) {
            e.preventDefault();
            if ($('#npassword').val() == $('#cpassword').val()) {
                var str = [];
                var object = {};
                var formElement = document.querySelector("#profile");
                var formData = new FormData(formElement);
                //var array = {'key':'ABCD'}
                var object = {};
                formData.forEach(function(value, key) {
                    object[key] = value;
                });
                $("#profile").trigger('reset');
                var json = JSON.stringify(object);

                console.log(json);
                $.ajax({
                    type: "PUT",
                    url: "<?php echo API; ?>profile",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {

                        if (result.code == 806) {
                            alertGen("Record Updated Successfully!", 1);
                            location.reload();
                        } else {
                            alertGen("Unable to handle request.", 2);
                            location.reload();
                        }
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
                        console.log(err);
                        location.reload();
                    }
                });
            } else {
                alertGen("Confirm Password doesn't match!", 3);
                console.log(err);
                location.reload();
            }
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
    </script>
</body>

</html>