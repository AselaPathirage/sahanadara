<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
$array = explode("/", $_GET["url"]);
// echo end($array);
?>

<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Inventory </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .create {
            background-color: rgb(148, 215, 190);
            height: 50px;
            width: 100%;
            padding: 14px;
            text-align: center;
            border-radius: 5px;
            line-height: 25px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .create:hover {
            background-color: rgb(163, 230, 205);
        }

        .view {
            background-color: rgb(241, 67, 67);
            height: 50px;
            width: 100%;
            padding: 14px;
            text-align: center;
            border-radius: 5px;
            line-height: 25px;
            color: black;
            font-weight: bold;
        }

        .view:hover {
            background-color: rgb(246, 139, 139);
        }

        td {
            border: none;
            text-align: left;
            vertical-align: middle;
        }
    </style>
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
        <div class="container">
            <div class="box">
                <center>
                    <h1 id="header"></h1>
                </center>
                <fieldset>
                    <div>
                        <center>
                            <div class="column" style="width:90%;float: none;padding-top:2px;">
                                <table style="border: none !important;width:70%;">
                                    <tr>
                                        <td style="background-color: #fff;">Request Id</td>
                                        <td style="background-color: #fff;"><input type="text" id="requiredId" name="requiredId" style="width: 100%;" disabled='true'></td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #fff;">Created Date</td>
                                        <td style="background-color: #fff;"><input type="date" id="requiredDate" name="requiredDate" style="width: 100%;" disabled='true'></td>
                                    </tr>
                                </table>
                            </div>
                        </center>
                    </div>
                    <div id="request" class="container text-center">
                        <form id="list">
                            <input type="hidden" id="requestId" value="<?php echo end($array); ?>">
                            <center>
                                <table id="ajaxFilter" class="table" style="width:50%;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">Item Id
                                            </th>
                                            <th style="width: 30%;">Item
                                            </th>
                                            <th style="width: 10%;">Quantity
                                            </th>
                                            <!-- <th style="width: 10%;">Availability
                                    </th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="trow">
                                    </tbody>
                                </table>
                            </center>
                        </form>
                    </div>
                    <h4 id='stat'></h4>
                    <div style="float: right;width:50%">
                        <table style="border: none !important;width:100%;height:40%">
                            <tr>
                                <td style="border: none !important;width:50%;"><input type="button" style="height:100%;font-size:20px" class="form-control btn_delete" id="decline" value="Reject"></td>
                                <td style="border: none !important;width:50%;"><input type="button" style="height:100%;font-size:20px" class="form-control btn_active" id="accept" value="Approve"></td>
                            </tr>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </section>
    <div id="alertBox">
    </div>
    <script>
        var thisPage = "#Service";
        var request, available = 0;;
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#accept").on('click', function() {
                var object = {};
                object['requestId'] = "<?php echo end($array); ?>";
                object['item'] = new Object();
                $.each($("input[name='items']:checked"), function() {
                    let quantity = $(this).data("quantity");
                    object['item'][$(this).data("id")] = quantity;
                });
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "PUT",
                    url: "<?php echo API; ?>serviceRequest/accept/<?php echo end($array); ?>",
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    data: json,
                    cache: false,
                    success: function(result) {
                        if (result.code == 806) {
                            $("#add").trigger('reset');
                            alertGen("Record Added Successfully!", 1);
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                        console.log(result);
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
                        console.log(err);
                    }
                });
            });
            $("#decline").on('click', function() {
                $.ajax({
                    type: "PUT",
                    url: "<?php echo API; ?>serviceRequest/decline/<?php echo end($array); ?>",
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        if (result.code == 806) {
                            $("#add").trigger('reset');
                            alertGen("Record Added Successfully!", 1);
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                        console.log(result);
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
                        console.log(err);
                    }
                });
            });
            $("#alertBox").click(function() {
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        borrowRequests();
        setData();

        function borrowRequests() {
            request = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>borrowRequests/<?php echo end($array); ?>",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
        }

        function setData() {
            document.getElementById('header').innerHTML = "Request From - " + request['name']; 
            document.getElementById('requiredDate').value = request['createdDate'];
            document.getElementById('requiredId').value = request['id'];
            var table = document.getElementById("trow");
            for (var i = 0; i < request['item'].length; i++) {
                let obj = request['item'][i];
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                cell1.innerHTML = obj['itemId'];
                cell2.innerHTML = obj['itemName'];
                cell3.innerHTML = obj['quantity'] + " " + obj['unitName'];
            }
        }

        function alertGen($messege, $type) {
            if ($type == 1) {
                $("#alertBox").html("  <div class='alert success-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else if ($type == 2) {
                $("#alertBox").html("  <div class='alert warning-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            } else {
                $("#alertBox").html("  <div class='alert danger-alert'><h3>" + $messege + "</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() {
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }
        }
    </script>
</body>

</html>