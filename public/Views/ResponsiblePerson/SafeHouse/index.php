<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsible Person - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once('./public/Views/ResponsiblePerson/includes/sidebar_safeHouse.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/ResponsiblePerson/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1>Dashboard</h1>
            <section class="services">
                <a href="">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#ffb508">
                            <ion-icon name="videocam-outline">
                                <i class='bx bxs-calendar'></i>
                                <!-- <i class="fas fa-hands-helping"></i> -->
                            </ion-icon>
                            <h2 class="services__title" id="daysSpent" style="color: black; font-size: 52px; font-weight: bold;">
                                
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 130px;">
                            <h2 class="services__title">
                                Days Spent
                            </h2>
                            <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#4eb7ff">
                            <ion-icon name="videocam-outline">
                                <i class='bx bx-user'></i>
                                <!-- <i class="fas fa-hands-helping"></i> -->
                            </ion-icon>
                            <h2 class="services__title" id="count" style="color: black; font-size: 52px; font-weight: bold;">
                                
                            </h2>
                        </figure>
                        <div class="services__content" style="margin-top: 130px;">
                            <h2 class="services__title">
                                Total Displaced Persons
                            </h2>
                            <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                        </div>
                    </div>
                </a>
                <!-- <a href="">
                    <div class="services__box">
                        <figure class="services__icon" style="--i:#fd6494">
                            <ion-icon name="videocam-outline">
                                <i class='bx bx-cog'></i>
                            </ion-icon>
                            <h2 class="services__title" style="color: black; font-size: 52px; font-weight: bold;">
                                2
                            </h2>
                        </figure>
                        <div class="services__content">
                            <h2 class="services__title">
                                Pending AID Requests
                            </h2>
                        </div>
                    </div>
                </a> -->

            </section>
        </div>
    </section>
    <script>
        var thisPage = "#stats";
        addDetails()
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
        function addDetails(){
            var x = "<?php echo $_SESSION['key'] ?>"; 
            var text = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>statistics",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            document.getElementById("count").innerHTML = text.count;
            document.getElementById("daysSpent").innerHTML = text.days;
        }
    </script>
</body>

</html>