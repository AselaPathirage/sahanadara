<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | About </title>
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
            <h1 class="heading_landing">About Us</h1>
            <div class="container aboutsec">
                <p>SAHANDARA is a leading platform for disaster management in Sri Lanka. It is mandated with the responsibility of implementing and coordinating national and sub-national level programmes for reducing the risk of disasters with the participation of all relevant stakeholders.
Sahanadara was established as per the provisions of the Sri Lanka Disaster Management Act No. 13 of 2005 as the executing agency of the National Council for Disaster Management.
The main activities of the Sahanadara Disaster Management System are Mitigation, Planning Preparedness, Dissemination of Early Warning for the vulnerable population, Emergency Response, Coordination of Relief and Post Disaster Activities in collaboration with other key agencies.
In order to facilitate the coordination and implement all Disaster Management activities, Disaster Management Committees were established at District, Divisional, Grama Niladhari Wasams, across the country. Also District Disaster Management Coordination Units were established in all districts to carry out Disaster Risk Reduction activities at the sub national level.
</p>




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