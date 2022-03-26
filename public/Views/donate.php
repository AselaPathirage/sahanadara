<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | Donate </title>
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
            <h1 class="heading_landing" id="topic">Fund Raises</h1>
            <div class="container aboutsec">
                <p class="text-center" style="font-size: large;" id="subTopic">MAKE A DONATION & SPREAD A SMILE <br> SAHANADARA ensures that every single Rupee what you donate will be solely used for Charity purpose.
                </p>


                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th> <span id="district">District</span>
                                <select id="assigned-user-filter" class="form-control">
                                    <option>All</option>
                                    <option>Kalutara</option>
                                    <option>Gampaha</option>
                                    <option>Colombo</option>

                                </select>
                            </th>
                            <th> <span id="division">DS Division</span>
                                <select id="status-filter" class="form-control">
                                    <option>All</option>
                                    <option>Madurawala</option>
                                    <option>Horana</option>
                                    <option>Millaniya</option>
                                </select>
                            </th>
                            <th> <span id="search">Search</span>
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>


                <div class="container" id="tbodyid">
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

                                <!-- progress bar -->
                                <div class="donation--container">
                                    <h1 id="donation--user" class="donation--user"></h1>
                                    <p style="padding-bottom: 10px">Bellapitiya</p>
                                    <span class="donation--title">Reached:</span>
                                    <span id="donation--goal" class="donation--goal"></span>
                                    <div class="donation--bar">
                                        <div class="donation--rounded">
                                            <div id="donation--progress" class="donation--progress" style="width: 0;"></div>
                                        </div>
                                        <div id="donation--number" class="donation--number" style="left: 0;"></div>
                                        <span id="donation--status" class="donation--status"></span>
                                    </div>

                                </div>



                            </div>
                            <div class="card__expander"><i class="fa fa-close js-collapser"> </i>
                                <form class="form--container">
                                    <input id="donation--name" class="input_donate" type="text" placeholder="Enter name">
                                    <input id="donation--amount" class="input_donate" type="number" min="1" placeholder="Enter amount(Rs)">
                                    <input id="donate" class="button_donate" type="submit" value="Donate">
                                </form>

                            </div>
                        </div>
                        <div class="col5 card_donation is-collapsed row-content">
                            <div class="card__inner js-expander">
                                <h2><i class="fas fa-donate"></i> Fund for displaced persons</h2>
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
                                <p>Bellapitiya</p>

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
            progressBar("asdfasdf",20,100,1);
        });





        function progressBar(nam,donationcollec,goal,id1) {
            //User Object
            var User = {
                name: nam,
                donationCollect: donationcollec,
                donationGoal: goal,
                i:id1
            };

            // IDs
            var donationUser = document.getElementById("donation--user"),
                donationProgress = document.getElementById("donation--progress"),
                donationNumber = document.getElementById("donation--number"),
                donationGoal = document.getElementById("donation--goal"),
                donationStatus = document.getElementById("donation--status"),
                donationAmount = document.getElementById("donation--amount"),
                donate = document.getElementById("donate");

            // How much percent to reach Goal
            var percent = percentage(User.donationCollect, User.donationGoal);
            // What we have so far to reach Goal
            donationProgress.setAttribute("aria-valuenow", User.donationCollect);
            // Goal
            donationProgress.setAttribute("aria-valuemax", User.donationGoal);

            // Default Data
            donationUser.innerHTML = "Donation for <span class='green'>" + User.name + "<span>";
            donationProgress.setAttribute("style", "width:" + percent + "%");
            donationNumber.setAttribute("style", "left:" + percent + "%");
            donationNumber.innerHTML = "$" + User.donationCollect;
            donationGoal.innerHTML = "Goal<br>$" + User.donationGoal;
            donationStatus.innerHTML = "<i class='fa fa-window-close red'></i> You need <span class='red'>$" + (User.donationGoal - User.donationCollect) + "</span> to reach your Donation Goal";

            //Events

            //Only Positive Numbers allow in the Donation input
            donationAmount.onkeydown = function(e) {
                if (!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) || e.keyCode === 8)) {
                    return false;
                }
            };

            // Onclick event for the donate button
            donate.onclick = function(e) {
                e.preventDefault();
                var newDonationCollect = (+User.donationCollect) + (+donationAmount.value);
                var newPercent = percentage(newDonationCollect, User.donationGoal);
                var newDonationNumber = User.donationCollect != User.donationGoal ? (+User.donationCollect) + (+donationAmount.value) : User.donationGoal;
                User.donationCollect = newDonationNumber;
                donationNumber.innerHTML = "$" + newDonationNumber;
                donationProgress.setAttribute("style", "width:" + newPercent + "%");
                donationNumber.setAttribute("style", "left:" + newPercent + "%");
                donationStatus.innerHTML = User.donationGoal - newDonationNumber > 0 ? "<i class='fa fa-window-close red'></i> You need <span class='red'>$" + (User.donationGoal - newDonationNumber) + "</span> to reach your Donation Goal" : "<i class='fa fa-exclamation-circle green'></i> Your campaign has been funded";

            };
        }
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

    <script>
        "use strict";

        // Function to find percentage
        function percentage(a, b) {
            return a / b * 100 > 100 ? 100 : a / b * 100;
        }

        //On Window Load
        window.onload = async function() {
            var language = getCookieValue('lan');
            try {
                const response = await fetch("<?php echo HOST; ?>" + "public/assets/json/lanSupport.json", {
                    method: "GET"
                });
                let dataJson = JSON.parse(await response.text());
                if (language == 'si') {
                    var sub = 0;
                } else if (language == 'en') {
                    var sub = 1;
                } else if (language == 'ta') {
                    var sub = 2;
                }
                //menu items
                document.getElementById("home").innerHTML = dataJson[sub].menu.home;
                document.getElementById("about").innerHTML = dataJson[sub].menu.about;
                document.getElementById("help").innerHTML = dataJson[sub].menu.help;
                document.getElementById("donate").innerHTML = dataJson[sub].menu.donate;
                if (!document.getElementById("staff").innerHTML.includes("Hi,")) {
                    document.getElementById("staff").innerHTML = dataJson[sub].menu.staff;
                }

                //body items
                document.getElementById("topic").innerHTML = dataJson[sub].donate.topic;
                document.getElementById("subTopic").innerHTML = dataJson[sub].donate.subTopic;
                document.getElementById("district").innerHTML = dataJson[sub].donate.district;
                document.getElementById("division").innerHTML = dataJson[sub].donate.division;
                document.getElementById("search").innerHTML = dataJson[sub].donate.search;




                //console.log(dataJson);
            } catch (e) {
                console.error(e);
                //menu items
                document.getElementById("home").innerHTML = "Home";
                document.getElementById("about").innerHTML = "About";
                document.getElementById("help").innerHTML = "Help";
                document.getElementById("donate").innerHTML = "Donate";
                if (!document.getElementById("staff").innerHTML.includes("Hi,")) {
                    document.getElementById("staff").innerHTML = dataJson[sub].menu.staff;
                }

                //body items
                document.getElementById("topic").innerHTML = "Fund Raises";
                document.getElementById("subTopic").innerHTML = "MAKE A DONATION & SPREAD A SMILE <br> SAHANADARA ensures that every single Rupee what you donate will be solely used for Charity purpose.";
                document.getElementById("district").innerHTML = "District";
                document.getElementById("division").innerHTML = "DS Division";
                document.getElementById("search").innerHTML = "Search";


            }


        };
        // window.onload = 
    </script>



</body>

</html>