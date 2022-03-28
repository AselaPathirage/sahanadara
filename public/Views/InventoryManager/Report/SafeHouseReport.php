<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
if (isset($_POST['Generate']) && isset($_POST['choice'])) {
    $choice = $_POST['choice'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    if ($from == "") {
        $from = "beggining";
    }
    if ($to == "") {
        $to = "end";
    }
    if ($choice == 1) {
        echo "<script>window.open('viewSafeHouseReport/from/" . $from . "/to/" . $to . "', '_blank') || window.location.replace('viewSafeHouseReport/from/" . $from . "/to/" . $to . "');</script>";
    } else if ($choice == 2) {
        echo "<script>window.open('viewSafeHouseReport/from/" . $from . "/to/" . $to . "', '_blank') || window.location.replace('viewSafeHouseReport/from/" . $from . "/to/" . $to . "');</script>";
    } else if ($choice == 3) {
        echo "<script>window.open('viewSafeHouseReport/from/" . $from . "/to/" . $to . "', '_blank') || window.location.replace('viewSafeHouseReport/from/" . $from . "/to/" . $to . "');</script>";
    } else if ($choice == 4) {
        echo "<script>window.open('viewSafeHouseReport/from/" . $from . "/to/" . $to . "', '_blank') || window.location.replace('viewSafeHouseReport/from/" . $from . "/to/" . $to . "');</script>";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Report </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        td {
            border: none;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <?php
    include_once('./public/Views/InventoryManager/includes/sidebar_reports.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/InventoryManager/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>SafeHouse Report</h1>
                </center>
                <form method="POST">
                    <div class="row-content">
                        <div class="row">
                            <div class="col4">
                                <label for="crusttype">Safe House</label>
                                <select id="safeHouseId" class="form-control" required="true">
                                    <option value="">Select Safe House</option>
                                </select>
                            </div>
                            <div class="col4">
                                <label for="crusttype">From</label>
                                <input type="date" id="from" name="from" max="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="col4">
                                <label for="crusttype">To</label>
                                <input type="date" id="to" name="to" max="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>

                        <div class="row" style="justify-content: center;">

                            <input type="submit" id="Generate" name="Generate" value="Generate" class="btn-alerts" />
                            <!-- <input type="reset" value="Cancel" class="btn-alerts" /> -->
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#safe";
        $(document).ready(function() {
            $("#inventory,#safe").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $("#from").on("change", function() {
                var from = $("#from").val();
                var input = document.getElementById("to");
                input.setAttribute("min", from);
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        var output;
        safeHouseList();
        function safeHouseList() {
            output =
                $.parseJSON($.ajax({
                    type: "GET",
                    url: "<?php echo API; ?>safehouse/name",
                    dataType: "json",
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    async: false
                }).responseText);
                for (var i = 0; i < output.length; i++){
                    var option = document.createElement("option");
                    option.text = output[i].safeHouseName;
                    option.value = output[i].safeHouseID;
                    var select = document.getElementById("safeHouseId");
                    select.appendChild(option); 
                }
        }
    </script>
</body>

</html>