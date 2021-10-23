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
    <!-- <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/admin_style.css"> -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/landing_style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <div id="page-container">
        <?php include './public/Views/landing_topnav.php'; ?>
        <section id="hero">
            <video id="video1" preload="" autoplay="" muted="" playsinline="" loop="">
                <source src="/<?php echo baseUrl; ?>/public/assets/video/homevideo_1.mp4" type="video/mp4">
            </video>
            <div class="background text-center row">
                <div class="blueback " style="margin: auto auto;">
                    <div class=" container col9">
                        <h1 class="title">S A H A N A D A R A</h1>
                        <h3 class=" sub">Are you interested in doing good for our most vulnerable neighbors who are suffering from natural disasters ?</h3>
                        <!-- <a href="/<?php echo baseUrl; ?>/donate" class="btn_donate">Donate</a> -->
                        <div class="space"></div>
                        <section class="services">
                            <a href="/<?php echo baseUrl; ?>/donate">
                                <div class="services__box">
                                    <figure class="services__icon" style="--i:#ffb508">
                                        <ion-icon name="videocam-outline">

                                            <i class="fas fa-hands-helping"></i>
                                        </ion-icon>
                                    </figure>
                                    <div class="services__content">
                                        <h2 class="services__title">
                                            Help
                                        </h2>
                                        <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                                    </div>
                                </div>
                            </a>
                            <a href="/<?php echo baseUrl; ?>/help">
                                <div class="services__box">
                                    <figure class="services__icon" style="--i:#C60606">
                                        <ion-icon name="videocam-outline"><i class="fas fa-donate"></i></ion-icon>
                                    </figure>
                                    <div class="services__content">
                                        <h2 class="services__title">
                                            Donate
                                        </h2>
                                        <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                                    </div>
                                </div>
                            </a>
                        </section>



                    </div>
                </div>
            </div>
        </section>
        <div id="page-content">
            <div class="container text-center ">
                <div class="row aboutsec_aboutpage" style="margin:60px auto 0;">
                    <div class="col5 row-content">
                        <h2>Looking for a reliable way to support people who are affected by natural disasters?</h2>
                        <p>Turn your occasion into a fundraising opportunity for neighbours in need. SAHANADARA empowers both individuals and non profits to fundraising into action</p>
                    </div>
                    <div class="col7">
                        <img src="/<?php echo baseUrl; ?>/public/assets/img/images.jpg" alt="" style="border-radius: 5px;width:95%;">
                    </div>

                </div>
            </div>


            <div class="help container text-center" id="help">
                <h1>Donation Requesting Notices</h1>

                <div class="row text-center">
                    <!-- <div class="col5 box row-content">
                        <h4>Bellapitiya Maha Vidyalaya</h4>
                        <h3>Bellapitiya, Horana</h3>
                        <p>Telephone Number - 0778787878</p>
                        <p>People - 100</p>
                        <p>Water bottles-100</p>
                    </div> -->
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row text-center">
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card row-content col5">
                        <h3>Bellapitiya Maha Vidyalaya</h3>
                        <p>Bellapitiya, Horana.</p>
                        <p class="small"><b>Telephone Number -</b> 0778787878</p>
                        <p class="small"><b>People -</b> 100</p>
                        <p class="small">Water bottles-100</p>
                        <div class="go-corner" href="#">
                            <div class="go-arrow">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                        </div>
                    </div>
                </div> -->


                <a href="/<?php echo baseUrl; ?>/help" class="seemore">See more</a>
            </div>
            <div class="help container text-center" id="help">
                <h1>Fund Raises</h1>

                <!-- <div class="row text-center">
                    <div class="col5 box row-content">
                        <h4>Fund for displaced persons</h4>
                        <p>Bellapitiya</p>
                        <a href="./donate.php" class="donate">Donate</a>
                    </div>
                    <div class="col5 box row-content">
                        <h4>Fund for displaced persons</h4>
                        <p>Bellapitiya</p>
                        <a href="./donate.php" class="donate">Donate</a>
                    </div>
                </div> -->
                <div class="row ">

                    <div class="col5 card_donation is-collapsed row-content">
                        <div class="card__inner js-expander">
                            <h2><i class="fas fa-donate"></i> Fund for displaced persons</h2>
                            <p style="">Bellapitiya</p>

                        </div>
                        <div class="card__expander"><i class="fa fa-close js-collapser"> </i>
                            <label for="your_name">Name</label>
                            <input type="text" id="your_name" name="yourname" />

                            <label for="your_phone">Amount (Rs)</label>
                            <input type="tel" id="your_phone" name="yourphone" />
                            <div class="space2"></div>
                            <a href="./donate.php" class="donate">Donate</a>

                        </div>
                    </div>
                    <div class="col5 card_donation is-collapsed row-content">
                        <div class="card__inner js-expander">
                            <h2><i class="fas fa-donate"></i> Fund for displaced persons</h2>
                            <p style="">Bellapitiya</p>

                        </div>
                        <div class="card__expander"><i class="fa fa-close js-collapser"> </i>
                            <label for="your_name">Name</label>
                            <input type="text" id="your_name" name="yourname" />

                            <label for="your_phone">Amount (Rs)</label>
                            <input type="tel" id="your_phone" name="yourphone" />
                            <div class="space2"></div>
                            <a href="./donate.php" class="donate">Donate</a>

                        </div>
                    </div>

                </div>
                <div class="row ">

                    <div class="col5 card_donation is-collapsed row-content">
                        <div class="card__inner js-expander">
                            <h2><i class="fas fa-donate"></i> Fund for displaced persons</h2>
                            <p style="">Bellapitiya</p>

                        </div>
                        <div class="card__expander"><i class="fa fa-close js-collapser"> </i>
                            <label for="your_name">Name</label>
                            <input type="text" id="your_name" name="yourname" />

                            <label for="your_phone">Amount (Rs)</label>
                            <input type="tel" id="your_phone" name="yourphone" />
                            <div class="space2"></div>
                            <a href="./donate.php" class="donate">Donate</a>

                        </div>
                    </div>
                    <div class="col5 card_donation is-collapsed row-content">
                        <div class="card__inner js-expander">
                            <h2><i class="fas fa-donate"></i> Fund for displaced persons</h2>
                            <p style="">Bellapitiya</p>

                        </div>
                        <div class="card__expander"><i class="fa fa-close js-collapser"> </i>
                            <label for="your_name">Name</label>
                            <input type="text" id="your_name" name="yourname" />

                            <label for="your_phone">Amount (Rs)</label>
                            <input type="tel" id="your_phone" name="yourphone" />
                            <div class="space2"></div>
                            <a href="./donate.php" class="donate">Donate</a>

                        </div>
                    </div>

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

            var vid = document.getElementById("video1");
            vid.playbackRate = 0.7;

        });
    </script>
    <script src="https://kit.fontawesome.com/9e8a3f781b.js" crossorigin="anonymous"></script>
    <script>
        let $cards = $('.card_donation');

        //open and close card when clicked on card
        $cards.find('.js-expander').click(function() {
            let $thisCard = $(this).closest('.card_donation');

            if ($thisCard.hasClass('is-collapsed')) {
                $cards.not($thisCard).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
                $thisCard.removeClass('is-collapsed').addClass('is-expanded');

                if ($cards.not($thisCard).hasClass('is-inactive')) {
                    //do nothing
                } else {
                    $cards.not($thisCard).addClass('is-inactive');
                }

            } else {
                $thisCard.removeClass('is-expanded').addClass('is-collapsed');
                $cards.not($thisCard).removeClass('is-inactive');
            }
        });

        //close card when click on cross
        $cards.find('.js-collapser').click(function() {
            let $thisCard = $(this).closest('.card_donation');

            $thisCard.removeClass('is-expanded').addClass('is-collapsed');
            $cards.not($thisCard).removeClass('is-inactive');
        });
    </script>
</body>


</html>