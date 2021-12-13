<?php
    if(isset($_SESSION['userRole'])){
        header("location:".HOST."404");
    }
    if(!isset($_GET['token'])){
        header("location:".HOST."404");
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
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/admin_style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/landing_style.css">
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
                            <div class="row-content">
                                <div class="container">
                                    <form action="/<?php echo baseUrl; ?>/Handler/resetHandle" method="post">
                                        <label for="newPass">New Password</label>
                                        <input type="password" id="newPass" name="newPass" required />
                                        <label for="newPass2">Confirm Password</label>
                                        <input type="password" id="newPass2" name="newPass2" required />
                                        <?php
                                            if(isset($_GET['reply'])){
                                                if($_GET['reply']==1){
                                                    echo "<p style='color:red'>Please input a new password</p>";
                                                }elseif($_GET['reply']==2) {
                                                    echo "<p style='color:red'>Password reset link expired.</p>";
                                                }elseif ($_GET['reply']==4){
                                                    echo "<p style='color:red'>Something went wrong. Please try again</p>";
                                                }
                                            }
                                        ?>
                                        <p style="color: red;" id="messege"></p>
                                        <div class="login-bar"> 
                                            <input type="hidden" name="code" value="<?php echo $_GET['token'] ?>">
                                            <label>
                                                <input type="checkbox" name="otherDevice" />
                                                Logout from all other devices ?
                                            </label>
                                            <input type="submit" name="reset" value="Send" onclick="return Validate()" class="btn-login" />
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
        function Validate() {
        var password = document.getElementById("newPass").value;
        var confirmPassword = document.getElementById("newPass2").value;
        if (password != confirmPassword) {
            document.getElementById("newPass").innerHTML("Passwords do not match.");
            return false;
        }
        return true;
    }
    </script>
</body>
</html>