<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | Donate </title>
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
            <h1 class="heading_landing">Fund Raises</h1>
            <div class="container aboutsec">
                <p>MAKE A DONATION & SPREAD A SMILE <br> SAHANADARA ensures that every single Rupee what you donate will be solely used for Charity purpose.
                </p>


                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>District
                                <select id="assigned-user-filter" class="form-control">
                                    <option>All</option>
                                    <option>Kalutara</option>
                                    <option>Gampaha</option>
                                    <option>Colombo</option>

                                </select>
                            </th>
                            <th>DS Division
                                <select id="status-filter" class="form-control">
                                    <option>All</option>
                                    <option>Madurawala</option>
                                    <option>Horana</option>
                                    <option>Millaniya</option>
                                </select>
                            </th>
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>


                <div class="container">
                    <!-- <div class="row">
                        <div class="col6">
                            <div class="box row-content">
                                <h4>Fund for displaced persons</h4>
                                <p>Bellapitiya</p>
                                <a href="./donate.php" class="donate">Donate</a>
                            </div>
                            <div class="box row-content">
                                <h4>Fund for displaced persons</h4>
                                <p>Bellapitiya</p>
                                <a href="./donate.php" class="donate">Donate</a>
                            </div>
                            <div class="box row-content">
                                <h4>Fund for displaced persons</h4>
                                <p>Bellapitiya</p>
                                <a href="./donate.php" class="donate">Donate</a>
                            </div>
                            <div class="box row-content">
                                <h4>Fund for displaced persons</h4>
                                <p>Bellapitiya</p>
                                <a href="./donate.php" class="donate">Donate</a>
                            </div>
                            <div class="box row-content">
                                <h4>Fund for displaced persons</h4>
                                <p>Bellapitiya</p>
                                <a href="./donate.php" class="donate">Donate</a>
                            </div>

                        </div>
                        <div class="col6" style="overflow: auto">
                            <div class="box row-content" style="max-height: 500px;">
                                <h4>Fund for displaced persons</h4>
                                <p>Bellapitiya</p>
                                <label for="your_name">Name</label>
                                <input type="text" id="your_name" name="yourname" />

                                <label for="your_phone">Amount</label>
                                <input type="tel" id="your_phone" name="yourphone" />
                                <div class="space2"></div>
                                <a href="./donate.php" class="donate">Donate</a>
                            </div>
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