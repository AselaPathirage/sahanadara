<?php
    $routes = array(
        5=>'Admin',
        6=>'DisasterOfficer',
        3=>'DistrictSecretariat',
        4=>'DivisionalSecretariat',
        7=>'DMC',
        1=>'GramaNiladari',
        2=>'InventoryManager',
        8=>'ResponsiblePerson'
    );
    if(isset($_SESSION['userRole'])){
        header("location:".HOST.$routes[$_SESSION['userRole']]);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | Reset Password </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/admin_style.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/landing_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="page-container">
        <?php include 'landing_topnav.php'; ?>
        <div id="page-content">
            <div class="space"></div>

            <div class="row">
                    <div class="col6">
                        <div class="space"></div>
                        <div class="staff_bluebox">
                            <h1 class="heading_landing">Reset Password </h1>
                            <p>Enter your email</p>
                            <div class="row-content">
                                <div class="container">
                                    <form action="/<?php echo baseUrl; ?>/Handler/resetHandle?formControl=1" method="post">
                                        <label for="e_email">Email Address</label>
                                        <input type="email" id="e_email" name="e_email" required />
                                        <div class="login-bar">
                                            <input type="submit" name="submit" value="Send" class="btn-login" />
                                            <a href="staff" class="forget-password" style="color: wheat;">Back to Login</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // Toggle menu on click
            $("#menu-toggler").click(function() {
                toggleBodyClass("menu-active");
            });

            function toggleBodyClass(className) {
                document.body.classList.toggle(className);
            }

        });
    </script>
</body>
</html>