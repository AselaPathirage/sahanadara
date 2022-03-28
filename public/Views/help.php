<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | Help </title>
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
            <h1 class="heading_landing" id="topic">Donation Requesting Notices</h1>
            <div class="container aboutsec">
                <p class="text-center" style="font-size: large;" id="subTopic">Help your neighbours through SAHANADARA by donating today! <br>All donations go directly to making a difference for our cause.
                </p>


                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th> <span id="district">District</span>
                                <select id="district1" class="form-control">
                                </select>
                            </th>
                            <th> <span id="division">Division</span>
                                <select id="dividion1" class="form-control">
                                </select>
                            </th>
                            <th><span id="lable">Search</span>
                                <input type="text" id="search" name="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>
                <div class="row text-center" style="justify-content: space-around;" id="box">
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
            $("#search").keyup(function() {
                var filter = $(this).val(),
                    count = 0;
                $('#box div').each(function() {
                    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                        $(this).hide(); // MY CHANGE
                    } else {
                        $(this).show(); // MY CHANGE
                        count++;
                    }
                });
            });
            var distOptions = "<option value=''>Select District</option>";
            $.getJSON('<?php echo HOST; ?>/public/assets/json/data.json', function(result) {
                $.each(result, function(i, district) {
                    distOptions += "<option value='" + district.dsId + "'>" + district.name + "</option>";
                });
                $('#district1').html(distOptions);
            })
            $('#district1').change(function() {
                var val = $(this).val();
                var divOptions = "<option value=''>Select Division</option>";
                $.getJSON('<?php echo HOST; ?>public/assets/json/data.json', function(result) {
                    $.each(result, function(i, district) {
                        if (district.dsId == val) {
                            $.each(district.division, function(j, division) {
                                divOptions += "<option value='" + division.dvId + "'>" + division.name + "</option>";
                            })
                        }
                    });
                    $('#dividion1').html(divOptions);
                })
                getNotice();
            })
            $('#dividion1').change(function() {
                getNotice();
            })
        });
        var output;
        getNotice();
        function getNotice(){
            var val = getCookieValue('lan');
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>notice/language/"+val,
                dataType: "json",
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#box").empty();
            let district = document.getElementById('district1').value;
            let division = document.getElementById('dividion1').value;

            for (var i = 0; i < output.length; i++) {
                var obj=output[i];
                if((district==obj['dsId'] || !district ) && (division==obj['dvId'] || !division)){
                    var div = document.createElement('div');
                    div.className="card row-content col5";
                    var html="";
                    var count = obj['item'].length;
                    for (var j = 0; j < count; j++) { 
                        let item=obj['item'][j];
                        html+=item['itemName']+"-"+item['quantitity']+" "+item['unit'];
                        if((j+1)!=count){
                            html+=", ";
                        }
                    }
                    if(val == 'si'){
                        div.innerHTML="<h3>"+obj['recordId']+"-"+obj['title']+"</h3><address>"+obj['safeHouseAddress']+"</address><p class='small'><b>දුරකතන අංකය -</b> "+obj['safeHouseTelno']+"</p><p class='small'><b>අවතැන් වූ ප්‍රමානය -</b> 100</p><p class='small'>"+html+"</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                    }else if(val == 'ta'){
                        div.innerHTML="<h3>"+obj['recordId']+"-"+obj['title']+"</h3><address>"+obj['safeHouseAddress']+"</address><p class='small'><b>தொடர்பு எண் -</b> "+obj['safeHouseTelno']+"</p><p class='small'><b>இடப்பெயர்ச்சியின் அளவு -</b> 100</p><p class='small'>"+html+"</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                    }else{
                        div.innerHTML="<h3>"+obj['recordId']+"-"+obj['title']+"</h3><address>"+obj['safeHouseAddress']+"</address><p class='small'><b>Contact Number -</b> "+obj['safeHouseTelno']+"</p><p class='small'><b>People -</b> 100</p><p class='small'>"+html+"</p><div class='go-corner' href='#'><div class='go-arrow'><i class='fas fa-hands-helping'></i></div></div>";
                    }
                    document.getElementById('box').appendChild(div);
                }
            }
        }

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
                document.getElementById("topic").innerHTML = dataJson[sub].help.topic;
                document.getElementById("subTopic").innerHTML = dataJson[sub].help.subTopic;
                document.getElementById("district").innerHTML = dataJson[sub].help.district;
                document.getElementById("division").innerHTML = dataJson[sub].help.division;
                document.getElementById("search").innerHTML = dataJson[sub].help.search;




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
                document.getElementById("topic").innerHTML = "Donation Requesting Notices";
                document.getElementById("subTopic").innerHTML = "Help your neighbours through SAHANADARA by donating today! <br>All donations go directly to making a difference for our cause.";
                document.getElementById("district").innerHTML = "District";
                document.getElementById("division").innerHTML = "DS Division";
                document.getElementById("search").innerHTML = "Search";

            }
        };
    </script>
    <script src="https://kit.fontawesome.com/9e8a3f781b.js" crossorigin="anonymous"></script>
</body>
</html>