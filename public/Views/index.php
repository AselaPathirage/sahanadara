<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <!-- <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/admin_style.css"> -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/landing_style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <div id="page-container">
        <?php include './public/Views/landing_topnav.php'; ?>
        <section id="hero">
            <video id="video1" preload="" autoplay="" muted="" playsinline="" loop="">
                <source src="<?php echo HOST; ?>public/assets/video/homevideo_1.mp4" type="video/mp4">
            </video>
            <div class="background text-center row">
                <div class="blueback " style="margin: auto auto;">
                    <div class=" container col9">
                        <h1 class="title" id="header"></h1>
                        <h3 class=" sub" id="subHeader"></h3>
                        <!-- <a href="<?php //echo HOST; 
                                        ?>/donate" class="btn_donate">Donate</a> -->
                        <div class="space"></div>
                        <section class="services">
                            <a href="<?php echo HOST; ?>help">
                                <div class="services__box">
                                    <figure class="services__icon" style="--i:#ffb508">
                                        <ion-icon name="videocam-outline">

                                            <i class="fas fa-hands-helping"></i>
                                        </ion-icon>
                                    </figure>
                                    <div class="services__content">
                                        <h2 class="services__title" id="cardH">

                                        </h2>
                                        <!-- <p class="services__description">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, ipsum nemo. Vel consequuntur ratione laborum.
                                        </p> -->
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo HOST; ?>donate">
                                <div class="services__box">
                                    <figure class="services__icon" style="--i:#C60606">
                                        <ion-icon name="videocam-outline"><i class="fas fa-donate"></i></ion-icon>
                                    </figure>
                                    <div class="services__content">
                                        <h2 class="services__title" id="cardP">

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
                        <h2 id="topic"></h2>
                        <p id="paragraph"></p>
                    </div>
                    <div class="col7">
                        <img src="<?php echo HOST; ?>public/assets/img/images.jpg" alt="" style="border-radius: 5px;width:95%;">
                    </div>

                </div>
            </div>


            <div class="help container text-center" id="help" style="background-color: aliceblue;margin-top: 80px;margin-bottom: 30px;padding-bottom: 80px">
                <h1 id="topicTwo"></h1>
                <div class="row text-center" style="justify-content: space-around;" id="box">




                </div>
                <a href="<?php echo HOST; ?>help" class="seemore">See more</a>
            </div>
            <div class="help container text-center" id="help">
                <h1 id="topicThree"></h1>
                <div class="row text-center " style="justify-content: space-around;" id="boxfund">


                </div>
                <a href="<?php echo HOST; ?>donate" class="seemore">See more</a>
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
            getFundNotice();



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




        });
        var output;
        getNotice();
        getFundNotice();
        function getNotice() {
            var val = getCookieValue('lan');
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>notice/language/" + val + "/limit/4",
                dataType: "json",
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            for (var i = 0; i < output.length; i++) {
                var obj = output[i];
                var div = document.createElement('div');
                div.className = "card row-content col5";
                var html = "";
                var count = obj['item'].length;
                for (var j = 0; j < count; j++) {
                    let item = obj['item'][j];
                    html += item['itemName'] + "-" + item['quantitity'] + " " + item['unit'];
                    if ((j + 1) != count) {
                        html += ", ";
                    }
                }
                if (val == 'si') {
                    div.innerHTML = "<h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><address>" + obj['safeHouseAddress'] + "</address><p class='small'><b>දුරකතන අංකය -</b> " + obj['safeHouseTelno'] + "</p><p class='small'><b>අවතැන් වූ ප්‍රමානය -</b> 100</p><p class='small'>" + html + "</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                } else if (val == 'ta') {
                    div.innerHTML = "<h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><address>" + obj['safeHouseAddress'] + "</address><p class='small'><b>தொடர்பு எண் -</b> " + obj['safeHouseTelno'] + "</p><p class='small'><b>இடப்பெயர்ச்சியின் அளவு -</b> 100</p><p class='small'>" + html + "</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                } else {
                    div.innerHTML = "<h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><address>" + obj['safeHouseAddress'] + "</address><p class='small'><b>Contact Number -</b> " + obj['safeHouseTelno'] + "</p><p class='small'><b>People -</b> 100</p><p class='small'>" + html + "</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                }
                document.getElementById('box').appendChild(div);
            }
        }

        function getFundNotice() {
            var val = getCookieValue('lan');
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>fundraisingNotice/language/" + val + "/limit/4",
                dataType: "json",
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            for (var i = 0; i < output.length; i++) {
                var obj = output[i];
                if (obj['isActive'] == 'y') {
                    let div = document.createElement('div');
                    div.className = "col5 card_donation is-collapsed row-content";
                    let html = "";
                    let description = obj['description'];
                    let goal = obj['goal'];
                    let recordId = obj['recordId'];
                    let title = obj['title'];
                    let currentAmout = obj['currentAmout'];
                    html += "<div class='card__inner js-expander'><div class='donation--container'><h1 id='donation--user" + i + "' class='donation--user'></h1><p id='donation--description" + i + "' style='padding-bottom: 10px'>Bellapitiya</p><span class='donation--title'>Reached:</span> <span id='donation--goal" + i + "' class='donation--goal'></span>";
                    html += "<div class='donation--bar'><div class='donation--rounded'><div id='donation--progress" + i + "' class='donation--progress' style='width: 0;'></div></div><div id='donation--number" + i + "' class='donation--number' style='left: 0;'></div><span id='donation--status" + i + "' class='donation--status'></span></div></div></div>";
                    html += "<div class='card__expander'><i class='fa fa-close js-collapser'> </i><form class='form--container'><input id='donation--name' class='input_donate' type='text' placeholder='Enter name' name='donator'><input id='donation--amount" + i + "' class='input_donate' type='number' min='1' placeholder='Enter amount(Rs)' name='amount'><input id='donate" + i + "' class='button_donate' type='submit' value='Donate' data-frid='" + recordId + "'></form></div>";
                    div.innerHTML = html;
                    // if (val == 'si') {
                    //     div.innerHTML = "<h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><address>" + obj['safeHouseAddress'] + "</address><p class='small'><b>දුරකතන අංකය -</b> " + obj['safeHouseTelno'] + "</p><p class='small'><b>අවතැන් වූ ප්‍රමානය -</b> 100</p><p class='small'>" + html + "</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                    // } else if (val == 'ta') {
                    //     div.innerHTML = "<h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><address>" + obj['safeHouseAddress'] + "</address><p class='small'><b>தொடர்பு எண் -</b> " + obj['safeHouseTelno'] + "</p><p class='small'><b>இடப்பெயர்ச்சியின் அளவு -</b> 100</p><p class='small'>" + html + "</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                    // } else {
                    //     div.innerHTML = "<h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><address>" + obj['safeHouseAddress'] + "</address><p class='small'><b>Contact Number -</b> " + obj['safeHouseTelno'] + "</p><p class='small'><b>People -</b> 100</p><p class='small'>" + html + "</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                    // }
                    document.getElementById('boxfund').appendChild(div);
                    progressBar(title, currentAmout, goal, i, description);
                }

            }
        }

        // Function to find percentage
        function percentage(a, b) {
            return a / b * 100 > 100 ? 100 : a / b * 100;
        }


        function progressBar(nam, donationcollec, goal, id1, dis) {
            //User Object
            var User = {
                name: nam,
                donationCollect: donationcollec,
                donationGoal: goal,
                i: id1,
                des: dis
            };

            // IDs
            var donationUser = document.getElementById("donation--user" + User.i),
                donationProgress = document.getElementById("donation--progress" + User.i),
                donationNumber = document.getElementById("donation--number" + User.i),
                donationGoal = document.getElementById("donation--goal" + User.i),
                donationStatus = document.getElementById("donation--status" + User.i),
                donationAmount = document.getElementById("donation--amount" + User.i),
                donationDescription = document.getElementById("donation--description" + User.i),
                donate = document.getElementById("donate" + User.i);

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
            donationNumber.innerHTML = "Rs" + User.donationCollect;
            donationGoal.innerHTML = "Goal<br>Rs" + User.donationGoal;
            donationDescription.innerHTML = User.des;
            donationStatus.innerHTML = "<i class='fa fa-window-close red'></i> Need <span class='red'>Rs" + (User.donationGoal - User.donationCollect) + "</span> to reach the Donation Goal";

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
        //Language translation part
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
                console.log(document.getElementById("staff").innerHTML);
                if (!document.getElementById("staff").innerHTML.includes("Hi,")) {
                    document.getElementById("staff").innerHTML = dataJson[sub].menu.staff;
                }

                //body items
                document.getElementById("header").innerHTML = dataJson[sub].homePage.header;
                document.getElementById("subHeader").innerHTML = dataJson[sub].homePage.subHeader;
                document.getElementById("cardH").innerHTML = dataJson[sub].homePage.cardH;
                document.getElementById("cardP").innerHTML = dataJson[sub].homePage.cardP;
                document.getElementById("topic").innerHTML = dataJson[sub].homePage.topic;
                document.getElementById("paragraph").innerHTML = dataJson[sub].homePage.paragraph;
                document.getElementById("topicTwo").innerHTML = dataJson[sub].homePage.topicTwo;
                document.getElementById("topicThree").innerHTML = dataJson[sub].homePage.topicThree;
                console.log(dataJson);
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
                document.getElementById("header").innerHTML = "S A H A N A D A R A";
                document.getElementById("subHeader").innerHTML = "Are you interested in doing good for our most vulnerable neighbors who are suffering from natural disasters ?";
                document.getElementById("cardH").innerHTML = "Help";
                document.getElementById("cardP").innerHTML = "Donate";
                document.getElementById("topic").innerHTML = "Looking for a reliable way to support people who are affected by natural disasters?";
                document.getElementById("paragraph").innerHTML = "Turn your occasion into a fundraising opportunity for neighbours in need. SAHANADARA empowers both individuals and non profits to fundraising into action";
                document.getElementById("topicTwo").innerHTML = "Donation Requesting Notices";
                document.getElementById("topicThree").innerHTML = "Fund Raises";
            }
        };
    </script>
</body>


</html>