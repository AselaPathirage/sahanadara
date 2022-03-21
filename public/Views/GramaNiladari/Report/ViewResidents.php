<!DOCTYPE html>
<html lang="en" dir="ltr">



<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/report.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            /* height: 842px;
            width: 595px; */
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }

        #btnprint {
            background: #efc468;
            border-radius: 0;
            color: #232323;
            display: inline-block;
            font-size: 1rem;
            height: 50px;
            line-height: 50px;
            position: fixed;
            right: 0;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            -webkit-transform: rotate(-90deg);
            transform-origin: bottom right;
            width: 150px;

        }
    </style>
</head>

<body>
    <?php
    // include_once('./public/Views/GramaNiladari/includes/sidebar_dashboard.php');
    ?>
    <!-- <section class="dashboard-section"> -->
    <?php
    // include_once('./public/Views/GramaNiladari/includes/topnav.php');
    ?>
    <div class="space"></div>
    <!-- <div id="alertBox">
    </div> -->
    <!-- Print  -->
    <a id="btnprint">Print</a>
    <div class="container col12">
        <form id="add">
            <div class="box">
                <div class="box1">
                    <div style="text-align: center;">
                        <img src="<?php echo HOST; ?>/public/assets/img/social-care (1).png" height="50" alt="LOGO">
                    </div>
                    <h1 class="text-center">Resident Report</h1>
                    <div class="row">
                        <div class="col6">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">District</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="district" name="district" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col6">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">DS Office</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="ds" name="ds" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col6">
                            <div class="row">
                                <div class="col4" style="text-align: right;">
                                    <label for="user role">GN division</label>
                                </div>
                                <div class="col8">
                                    <input type="text" id="gn" name="gn" placeholder="Location of incident" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr style="margin:10px;">

                    <div class="report-container">
                        <div class="report-content">
                            <div class="report-body">
                                <table>
                                    <thead>
                                        <tr>


                                            <th class="text-center">Resident Name</th>
                                            <th class="text-center">NIC</th>
                                            <th class="">Address</th>
                                            <th class="text-center" style="width:120px;">Telephone Number</th>

                                            <!-- <th class="text-right" style="width:100px;">Injured</th> -->

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <span class="nothing"></span>

                                        <!-- <tr class="tr-primary open" id="tr_2">
                                            <td colspan="7">
                                                Front Bumpber Bracket
                                            </td>
                                        </tr> -->
                                        <!-- <tr class="tr-secondary1">
                                            <td id="date">11/05/2018</td>
                                            <td id="report" class="text-center">Inventory Starting Value</td>
                                            <td id="aname">Bonnet/hood - Opening inventory</td>
                                            <td id="disaster">Bonnet/hood - Opening inventory</td>
                                            <td id="dvapp" class="text-center">0</td>
                                            <td id="dmcapp" class="text-center">0</td>
                                            <td id="collected" class="text-center">0</td>

                                        </tr> -->



                                    </tbody>
                                    <tfoot>
                                        <!-- <tr>
                                            <th colspan="3" class="text-left">TOTAL</th>
                                            <th id="totfam" class="text-right">0</th>
                                            <th id="totpeople" class="text-right">0</th>
                                            <th id="totdeaths" class="text-right">0</th>
                                            <th id="totinjured" class="text-right">0</th>
                                        </tr> -->
                                    </tfoot>
                                </table>
                            </div>

                            <div class="report-footer">
                                <div class="report-timestamp text-center">
                                    <?php
                                    // $d = date("h:i:sa");
                                    echo "Created date is " . date("Y-m-d h:i:sa");
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>










                </div>
            </div>

        </form>

    </div>



    <!-- </section> -->
    <script>
        var thisPage = "#incidents";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            // document.getElementById('datePicker1').valueAsDate = new Date();
            // document.getElementById('datePicker2').valueAsDate = new Date();
            $("#btnprint").click(function() {
                console.log("sdfsdf");
                $("#btnprint").hide();
                window.print();
                $("#btnprint").show();
            });
            getFinal();
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getFinal() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>gnresidentall",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var obj = output['main'];
            console.log(obj);
            $('#district').val(obj['dsName']);
            $('#ds').val(obj['dvName']);
            $('#gn').val(obj['gnDvName']);


            // if(obj['disaster'])
            // $('#dis').val(obj['disaster']);
            console.log(obj);
            obj = output['reports'];

            if (obj !== null) {
                for (var i = 0; i < obj.length; i++) {
                    var html = '';
                    html += "<tr class='tr-secondary1'><td id='rname" + i + "' class='text-center'>11/05/2018</td><td id='rnic" + i + "' class='text-center'>Inventory Starting Value</td>";
                    html += "<td id='raddress" + i + "'>0</td><td id='rtel" + i + "' class='text-center'>0</td></tr>";
                    $('#tbody').append(html);

                    $('#rname' + i).html(obj[i]['residentName']);
                    $('#rnic' + i).html(obj[i]['residentNIC']);
                    $('#raddress' + i).html(obj[i]['residentAddress']);
                    $('#rtel' + i).html(obj[i]['residentTelNo']);
                }
            } else {
                $('.nothing').text('No records');
            }
        }
    </script>
</body>

</html>