<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> DMC </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchselect.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        label {
            font-size: 16px;
            font-weight: 500;
        }

        .default__check[type=checkbox] {
            display: none;
        }

        .default__check[type=checkbox]~.custom__check {
            display: flex;
            align-items: center;
            height: 16px;
            border: 2px solid #000;
            position: relative;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .default__check[type=checkbox]~.custom__check:after {
            content: "";
            display: inline-block;
            position: absolute;
            transition: all 0.4s ease;
        }

        .default__check[type=checkbox].switchbox+.custom__check {
            width: 32px;
        }

        .default__check[type=checkbox].switchbox+.custom__check:after {
            transform: scale(1.5);
            left: 4px;
        }

        .default__check[type=checkbox].switchbox:not(:checked)~.custom__check:after {
            background-color: #000;
        }

        .default__check[type=checkbox].switchbox:checked~.custom__check:after {
            left: 20px;
        }

        .default__check[type=checkbox]:disabled~.custom__check {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .default__check[type=checkbox]:checked~.custom__check {
            background-color: #000;
        }

        .default__check[type=checkbox]:checked~.custom__check:after {
            visibility: visible;
        }

        .default__check[type=checkbox].switchbox~.custom__check {
            border-radius: 50rem;
        }

        .default__check[type=checkbox].switchbox~.custom__check:after {
            width: 8px;
            height: 8px;
            background-color: #fff;
            border-radius: 50rem;
        }
    </style>


</head>

<body>
    <?php
    include_once('./public/Views/DMC/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DMC/includes/topnav.php');
        ?>
        <div class="space" style="margin-bottom: 30px;"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col7 box" style="margin:0 auto;">
                    <form action="#" method="post">
                        <h1>New Alert</h1>

                        <div class="col10 text-center" style="margin: 10px auto;">

                            <label for="msg">Message</label>
                            <textarea id="address" name="msg"></textarea>

                            <label for="gndivision">Select Divisions</label>
                            <select id="gndivision" name="gndivision" multiple data-multi-select-plugin>
                                <option value="All GN divisions" data-gnId="all">All</option>
                                <!-- <option value="Mercedes" selected>Mercedes</option>
                                                <option value="Hilux">Hilux</option>
                                                <option value="Corsa">Corsa</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Ferrari">Ferrari</option> -->
                            </select>


                            <fieldset>
                                <div class="row">
                                    <div class="col6">
                                        <label>
                                            <input type="checkbox" class="default__check switchbox">
                                            <span class="custom__check"></span>Assign Safe Houses
                                        </label>
                                    </div>
                                    <div class="col6">
                                        <label>
                                            <input type="checkbox" class="default__check switchbox">
                                            <span class="custom__check"></span>Only Officers
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row" style="justify-content: center;">

                                <input type="submit" value="Send" class="btn-alerts" />
                                <input type="reset" value="Cancel" class="btn-alerts" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script src="<?php echo HOST; ?>/public/assets/js/searchselect.js"></script>

    <script>
        var thisPage = "#alerts";
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