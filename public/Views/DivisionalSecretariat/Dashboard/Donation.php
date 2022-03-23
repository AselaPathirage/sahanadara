<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Divisional Secretariat - Dashboard </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_divsec.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once('./public/Views/DivisionalSecretariat/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DivisionalSecretariat/includes/topnav.php');
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
        <div class="container">

            <!-- TABLE -->
            <div class="container">
                <div class="">

                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>Approved
                                    <select id="approvalStatus" class="form-control">
                                        <option value="">All</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Need Updates">Rejected</option>
                                    </select>
                                </th>
                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table>


                    <div class="container" style="text-align: right;">
                        <div style=" display:block;">
                        </div>
                        <div class="box" style="display:flow-root;" id="box">
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <script>
        var thisPage = "#Donation";
        $(document).ready(function() {
            $("#Home,#Compensation,#Incidents,#FundRaising,#Donation,#BorrowRequests,#InventoryManager").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $('#approvalStatus').on('change', function() {
                let value = $('#approvalStatus').val();
                $('#trow').empty();
                var text = "";
                console.log(value);
                if (output.length > 0) {
                    let obj = output[0];
                    if (obj['appovalStatus'] == value || !value) {
                        var text = "<div class='row text-center'><div class='card row-content col5'><h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><p>" + obj['note'] + "</p><p class='small'><b>Telephone Number - </b>" + obj['contact'] + "</p><p class='small'><b>People -</b> " + obj['numOfPeople'] + "</p>";
                        for (var j = 0; j < obj['item'].length; j++) {
                            text += "<p class='small'>" + obj['item'][j]['item'] + "-" + obj['item'][j]['quantity'] + " " + obj['item'][j]['unit'] + "</p>";
                        }
                        text += "<br><a href='' class='btn_active'>Approve</a><a style='margin-left:4px' href='' class='btn_remove'>Reject</a></div>";
                    }
                }

                for (var i = 1; i < output.length; i++) {
                    let obj = output[i];
                    if (obj['appovalStatus'] == value || !value) {
                        if (i % 2 == 0) {
                            text += "<div class='row text-center'><div class='card row-content col5'><h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><p>" + obj['note'] + "</p><p class='small'><b>Telephone Number - </b>" + obj['contact'] + "</p><p class='small'><b>People -</b> " + obj['numOfPeople'] + "</p>";
                            for (var j = 0; j < obj['item'].length; j++) {
                                text += "<p class='small'>" + obj['item'][j]['item'] + "-" + obj['item'][j]['quantity'] + " " + obj['item'][j]['unit'] + "</p>";
                            }
                            text += "<br><a href='' class='btn_active'>Approve</a><a style='margin-left:4px' href='' class='btn_remove'>Reject</a></div>"
                        } else {
                            text += "<div class='card row-content col5'><h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><p>" + obj['note'] + "</p><p class='small'><b>Telephone Number - </b>" + obj['contact'] + "</p><p class='small'><b>People -</b> " + obj['numOfPeople'] + "</p>";
                            for (var j = 0; j < obj['item'].length; j++) {
                                text += "<p class='small'>" + obj['item'][j]['item'] + "-" + obj['item'][j]['quantity'] + " " + obj['item'][j]['unit'] + "</p>";
                            }
                            text += "<br><a href='' class='btn_active'>Approve</a><a style='margin-left:4px' href='' class='btn_remove'>Reject</a></div></div>"
                        }
                    }
                }
                document.getElementById('box').innerHTML = text;
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        var output;
        getRecords();

        function getRecords() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>notice",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("trow");
            $('#box').empty();
            if (output.length > 0) {
                let obj = output[0];
                var text = "<div class='row text-center'><div class='card row-content col5'><h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><p>" + obj['note'] + "</p><p class='small'><b>Telephone Number - </b>" + obj['contact'] + "</p><p class='small'><b>People -</b> " + obj['numOfPeople'] + "</p>";
                for (var j = 0; j < obj['item'].length; j++) {
                    text += "<p class='small'>" + obj['item'][j]['item'] + "-" + obj['item'][j]['quantity'] + " " + obj['item'][j]['unit'] + "</p>";
                }
                text += "<br><a href='' class='btn_active'>Approve</a><a style='margin-left:4px' href='' class='btn_remove'>Reject</a></div>"
            }

            for (var i = 1; i < output.length; i++) {
                let obj = output[i];
                if (i % 2 == 0) {
                    text += "<div class='row text-center'><div class='card row-content col5'><h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><p>" + obj['note'] + "</p><p class='small'><b>Telephone Number - </b>" + obj['contact'] + "</p><p class='small'><b>People -</b> " + obj['numOfPeople'] + "</p>";
                    for (var j = 0; j < obj['item'].length; j++) {
                        text += "<p class='small'>" + obj['item'][j]['item'] + "-" + obj['item'][j]['quantity'] + " " + obj['item'][j]['unit'] + "</p>";
                    }
                    text += "<br><a href='' class='btn_active'>Approve</a><a style='margin-left:4px' href='' class='btn_remove'>Reject</a></div>"
                } else {
                    text += "<div class='card row-content col5'><h3>" + obj['recordId'] + "-" + obj['title'] + "</h3><p>" + obj['note'] + "</p><p class='small'><b>Telephone Number - </b>" + obj['contact'] + "</p><p class='small'><b>People -</b> " + obj['numOfPeople'] + "</p>";
                    for (var j = 0; j < obj['item'].length; j++) {
                        text += "<p class='small'>" + obj['item'][j]['item'] + "-" + obj['item'][j]['quantity'] + " " + obj['item'][j]['unit'] + "</p>";
                    }
                    text += "<br><a href='' class='btn_active'>Approve</a><a style='margin-left:4px' href='' class='btn_remove'>Reject</a></div></div>"
                }
            }
            document.getElementById('box').innerHTML = text;
        }
        $("#search").keyup(function() {
            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val(),
                count = 0;
            // Loop through the comment list
            $('#box div').each(function() {
                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).hide(); // MY CHANGE

                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show(); // MY CHANGE
                    count++;
                }
            });
        });
    </script>
</body>

</html>