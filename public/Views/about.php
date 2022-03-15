<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | About </title>
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
            <div class="container aboutsec_aboutpage">
                <h1 class="heading_landing">About Us</h1>
                <p>SAHANDARA is a leading platform for disaster management in Sri Lanka. It is mandated with the responsibility of implementing and coordinating national and sub-national level programmes for reducing the risk of disasters with the participation of all relevant stakeholders.
                    Sahanadara was established as per the provisions of the Sri Lanka Disaster Management Act No. 13 of 2005 as the executing agency of the National Council for Disaster Management.
                    The main activities of the Sahanadara Disaster Management System are Mitigation, Planning Preparedness, Dissemination of Early Warning for the vulnerable population, Emergency Response, Coordination of Relief and Post Disaster Activities in collaboration with other key agencies.
                    In order to facilitate the coordination and implement all Disaster Management activities, Disaster Management Committees were established at District, Divisional, Grama Niladhari Wasams, across the country. Also District Disaster Management Coordination Units were established in all districts to carry out Disaster Risk Reduction activities at the sub national level.
                </p>
                <div class="space"></div>
                <div class="text-center">

                    <img src="<?php echo HOST; ?>public/assets/img/sahana.jpg" alt="" style="border-radius: 5px;">
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
                if(!document.getElementById("staff").innerHTML){
                    document.getElementById("staff").innerHTML= dataJson[sub].menu.staff;
                }

                //body items

                //console.log(dataJson);
            }catch (e) {
                console.error(e);
                //menu items
                document.getElementById("home").innerHTML="Home";
                document.getElementById("about").innerHTML="About";
                document.getElementById("help").innerHTML="Help";
                document.getElementById("donate").innerHTML="Donate";
                document.getElementById("staff").innerHTML="Donate";

                //body items
            }
        };
    </script>
</body>

</html>