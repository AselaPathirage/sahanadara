<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA </title>
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
        <?php include './public/Views/landing_topnav.php'; ?>
        <section id="hero">
            <div class="background">
                <div class="blueback ">
                    <div class="container">
                        <h1 class="title">SAHANADARA PROJECT</h1>
                        <h3 class="sub">Disaster Management System</h3>
                        <a href="/<?php echo baseUrl; ?>/donate" class="btn_donate">Donate</a>
                    </div>
                </div>
            </div>
        </section>
        <div id="page-content">


            <div class="help container text-center" id="help">
                <h1>Donation Requesting Notices</h1>

                <div class="row text-center">
                    <div class="col5 box row-content">asdasd</div>
                    <div class="col5 box row-content">asdasda</div>
                </div>
                <div class="row text-center">
                    <div class="col5 box row-content">asdasd</div>
                    <div class="col5 box row-content">asdasda</div>
                </div>
                <div class="row text-center">
                    <div class="col5 box row-content">asdasd</div>
                    <div class="col5 box row-content">asdasda</div>
                </div>

                <a href="/<?php echo baseUrl; ?>/help" class="seemore">See more</a>
            </div>
            <div class="help container text-center" id="help">
                <h1>Fund Raises</h1>

                <div class="row text-center">
                    <div class="col5 box row-content">
                        <p>sdfasdfasdfasdf</p>
                        <a href="./donate.php" class="donate">Donate</a>
                    </div>
                    <div class="col5 box row-content">asdasda</div>
                </div>
                <div class="row text-center">
                    <div class="col5 box row-content">asdasd</div>
                    <div class="col5 box row-content">asdasda</div>
                </div>
                <div class="row text-center">
                    <div class="col5 box row-content">asdasd</div>
                    <div class="col5 box row-content">asdasda</div>
                </div>

                <a href="/<?php echo baseUrl; ?>/donate" class="seemore">See more</a>
            </div>

        </div>


        <?php include './public/Views/footer.php'; ?>


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