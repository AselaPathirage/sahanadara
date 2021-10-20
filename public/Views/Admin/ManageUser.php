<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin </title>
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
    include_once('./public/Views/Admin/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/Admin/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">

            <table class="table">
                <thead>
                    <tr class="filters">
                        <th>User Role
                            <select id="assigned-user-filter" class="form-control">
                                <option>All</option>
                                <option>Grama Niladari</option>
                                <option>District Secretariat</option>
                                <option></option>

                            </select>
                        </th>
                        <th>District
                            <select id="assigned-user-filter" class="form-control">
                                <option>All</option>
                                <option>Kalutara</option>
                                <option>Gampaha</option>
                                <option>Colombo</option>

                            </select>
                        </th>
                        <th>Div Sec Office
                            <select id="status-filter" class="form-control">
                                <option>All</option>
                                <option>Madurawala</option>
                                <option>Horana</option>
                                <option>Millaniya</option>
                            </select>
                        </th>
                        <th>GN Division
                            <select id="status-filter" class="form-control">
                                <option>All</option>
                                <option>Madurawala</option>
                                <option>Horana</option>
                                <option>Millaniya</option>
                            </select>
                        </th>
                        <th>Search
                            <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                        </th>
                    </tr>
                </thead>
            </table>

            <div class="container">
                <div class="row">
                    <div class="col5">
                        <div class="box row-content">
                            <h4>Danushka Perera</h4>
                            <p>Divisional Secretariat</p>
                            <p>Gampaha</p>
                            <p>aperera@gmail.com</p>
                            <p>0784444444</p>
                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" style="background-color:yellow;" class="btn_manage">Manage</a>
                            </div>
                        </div>
                        <div class="box row-content">
                            <h4>Danushka Perera</h4>
                            <p>Divisional Secretariat</p>
                            <p>Gampaha</p>
                            <p>aperera@gmail.com</p>
                            <p>0784444444</p>
                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" style="background-color:yellow;" class="btn_manage">Manage</a>
                            </div>
                        </div>
                        <div class="box row-content">
                            <h4>Danushka Perera</h4>
                            <p>Divisional Secretariat</p>
                            <p>Gampaha</p>
                            <p>aperera@gmail.com</p>
                            <p>0784444444</p>
                            <div class="row" style="text-align: right; margin: 0 auto;display:block">
                                <a href="/<?php echo baseUrl; ?>" style="background-color:yellow;" class="btn_manage">Manage</a>
                            </div>
                        </div>


                    </div>
                    <div class="col7" style="overflow: auto">
                        <div class="box row-content" style="min-height: 300px;">
                            <h1 class="text-center">Update User</h1>
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
                                    <label for="TP number">TP Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="TP number" name="TP number" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">User role</label>
                                </div>
                                <div class="col9">
                                    <select id="user role" name="user role">
                                        <option value="null">Select</option>
                                        <option value="Grama Niladhari">Grama Niladhari</option>
                                        <option value="Divisional secretariat">Divisional Secretariat</option>
                                        <option value="District secretariat">District secretariat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Kaluthara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">Div sec</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Kaluthara</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="user role">GN div</label>
                                </div>
                                <div class="col9">
                                    <select id="District" name="District">
                                        <option value="null">Select</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kaluthara">Kaluthara</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Delete">
                                <input type="submit" style="background-color: darkblue;" value="Deactivate">
                                <input type="submit" style="background-color: blue;" value="Update">
                                <input type="submit" style="background-color: red;" value="Cancel">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </section>
    <script>
        var thisPage = "#manage";
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
    </script>
</body>

</html>