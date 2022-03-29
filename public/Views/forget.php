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
    $array = explode("/", $_GET["url"]);
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
                            <h1 class="heading_landing" id="topic">Reset Password </h1>
                            <p id="subtopic">Enter your email</p>
                            <div class="row-content">
                                <div class="container">
                                    <form action="<?php echo HOST; ?>Handler/resetHandle" method="post">
                                        <label for="e_email" id="email">Email Address</label>
                                        <?php
                                            if(strtolower($array[1])=='reply'){
                                                if($array[2]==1){
                                                    echo "<p style='color:red'>Please input a Email Address</p>";
                                                }elseif($array[2]==2) {
                                                    echo "<p style='color:red'>Unable to find this Email Address with associated account</p>";
                                                }elseif ($array[2]==3){
                                                    echo "<p>Password reset email send. Please follow the guidlines.</p>";
                                                }elseif ($array[2]==4){
                                                    echo "<p style='color:red'>Something went wrong. Please try again</p>";
                                                }
                                            }
                                        ?>
                                        
                                        <input type="email" id="e_email" name="e_email" required='true' />
                                        <div class="login-bar"> 
                                            <input type="submit" name="submit" value="Send" class="btn-login" id="send"/>
                                            <a href="<?php echo HOST; ?>staff" class="forget-password" style="color: wheat;" id="login">Back to Login</a>
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
                document.getElementById("topic").innerHTML= dataJson[sub].resetPassword.topic;
                document.getElementById("subtopic").innerHTML= dataJson[sub].resetPassword.subtopic;
                document.getElementById("email").innerHTML= dataJson[sub].resetPassword.email;
                document.getElementById("send").innerHTML= dataJson[sub].resetPassword.send;
                document.getElementById("login").innerHTML= dataJson[sub].resetPassword.login;
                

                //console.log(dataJson);
            }catch (e) {
                console.error(e);
                //menu items
                document.getElementById("home").innerHTML="Home";
                document.getElementById("about").innerHTML="About";
                document.getElementById("help").innerHTML="Help";
                document.getElementById("donate").innerHTML="Donate";
                if(!document.getElementById("staff").innerHTML.includes("Hi,")){
                    document.getElementById("staff").innerHTML= dataJson[sub].menu.staff;
                }

                //body items
                document.getElementById("topic").innerHTML= "Reset Password";
                document.getElementById("subtopic").innerHTML= "Enter your email";
                document.getElementById("email").innerHTML= "Email Address";
                document.getElementById("send").innerHTML= "Send";
                document.getElementById("login").innerHTML= "Back to Login";
            }
        };
    </script>
</body>
</html>