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
    <title> SAHANADARA | Staff </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
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
                    <h1 class="heading_landing" id="topic1">Staff</h1>
                    <div class="container aboutsec">
                        <img src="<?php echo HOST; ?>/public/assets/img/staff.jpg" alt="" style="border-radius: 5px;width:75%;">
                    </div>
                </div>
                <div class="col6">
                    <div class="space"></div>
                    <div class="staff_bluebox">
                        <h1 class="heading_landing" id="welcome">Welcome </h1>
                        <p id="paragraph">Enter your username and password</p>
                        <div class="row-content">
                            <div class="container">
                                <form action="<?php echo HOST; ?>/Handler/loginHandle" method="post">
                                    <h2 id="header">Login</h2>
                                    <?php
                                        if(isset($_GET['error'])){
                                            echo "<p style='color:red'>User Name or password is wrong. Please try again</p>";
                                        }
                                    ?>
                                    <label for="username" id="username">Username</label>
                                    <input type="text" id="username" name="username" required />

                                    <label for="password" id="password">Password</label>
                                    <input type="password" id="password" name="password" required />
                                    <br>
                                    <div class="login-bar">
                                        <input type="submit" name="submit" value="Login" class="btn-login" id="button"/>

                                        <a href="<?php echo HOST; ?>forget" class="forget-password" id="link">Forget Password?</a>
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
        window.onload = async function (){
            var language = getCookieValue('lan');
            try {
                const response = await fetch("<?php echo HOST; ?>" + "public/assets/json/lanSupport.json", {method: "GET"});
                let dataJson = JSON.parse(await response.text());
                if (language == 'si') {
                    var sub = 0;
                } else if (language == 'en') {
                    var sub = 1;
                } else if(language == 'ta'){
                    var sub = 2;
                }
                //menu items
                document.getElementById("home").innerHTML= dataJson[sub].menu.home;
                document.getElementById("about").innerHTML= dataJson[sub].menu.about;
                document.getElementById("help").innerHTML= dataJson[sub].menu.help;
                document.getElementById("donate").innerHTML= dataJson[sub].menu.donate;
                if(!document.getElementById("staff").innerHTML.includes("Hi,")){
                    document.getElementById("staff").innerHTML= dataJson[sub].menu.staff;
                }

                //body items
                document.getElementById("topic1").innerHTML= dataJson[sub].staff.topic1;
                document.getElementById("welcome").innerHTML= dataJson[sub].staff.welcome;
                document.getElementById("paragraph").innerHTML= dataJson[sub].staff.paragraph;
                document.getElementById("header").innerHTML= dataJson[sub].staff.header;
                document.getElementById("username").innerHTML= dataJson[sub].staff.username;
                document.getElementById("password").innerHTML= dataJson[sub].staff.password;
                document.getElementById("button").innerHTML= dataJson[sub].staff.button;
                document.getElementById("link").innerHTML= dataJson[sub].staff.link;

                //console.log(dataJson);
            }catch (e) {
                console.error(e);
                //menu items
                document.getElementById("home").innerHTML="Home";
                document.getElementById("about").innerHTML="About";
                document.getElementById("help").innerHTML="Help";
                document.getElementById("donate").innerHTML="Donate";
                document.getElementById("staff").innerHTML="Staff";

                //body items
                document.getElementById("topic").innerHTML= "Staff";
                document.getElementById("welcome").innerHTML= "Welcome";
                document.getElementById("paragraph").innerHTML= "Enter your username and password";
                document.getElementById("header").innerHTML= "Login";
                document.getElementById("username").innerHTML= "Username";
                document.getElementById("password").innerHTML= "Password";
                document.getElementById("button").innerHTML= "Login";
                document.getElementById("link").innerHTML= "Forget Password?";
            }
        };
    </script>
</body>
</html>