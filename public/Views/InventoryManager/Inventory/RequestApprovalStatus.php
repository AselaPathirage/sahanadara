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
    include_once('./public/Views/InventoryManager/includes/sidebar_inventory.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/InventoryManager/includes/topnav.php');
        ?>
        <div class="space"></div>
        <!-- ======================================================================================================================================= -->
        <!-- content frome below -->
        <!-- STATS -->
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
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </th>

                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>


                <div class="panel panel-primary filterable">
                    <table id="task-list-tbl" class="table">
                        <thead>
                            <tr>
                                <th style="width:10%">ID</th>
                                <th style="width:10%">Source</th>
                                <th style="width:45%">For</th>
                                <th style="width:15%">Date</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody id="trow">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#BorrowRequests";
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
                var table = document.getElementById("trow");
                for (var i = 0; i < output.length; i++) {
                    if (output[i]['approvalStatus'] == value || !value) {
                        let obj = output[i];
                        let row = table.insertRow(-1);
                        let id = "data_" + i;
                        row.id = id;
                        row.className = "task-list-row";
                        $("#data_" + i).attr('data-unit', obj['unitName']);
                        let cell1 = row.insertCell(-1);
                        let cell2 = row.insertCell(-1);
                        let cell3 = row.insertCell(-1);
                        let cell4 = row.insertCell(-1);
                        let cell5 = row.insertCell(-1);
                        let cell6 = row.insertCell(-1);
                        cell1.innerHTML = obj['id'];
                        cell2.innerHTML = obj['source'];
                        cell3.innerHTML = obj['name'];
                        cell4.innerHTML = obj['createdDate'];
                        cell5.innerHTML = obj['approvalStatus'];
                        var attribute = document.createElement("a");
                        attribute.id = obj['responsibleId'];
                        attribute.href = "<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/ViewBorrowRequests/" + obj['id'];
                        attribute.className = "btn-box";
                        attribute.innerHTML = "View";
                        attribute.target = "_blank";
                        cell6.appendChild(attribute);
                    }
                }
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
                url: "<?php echo API; ?>borrowRequests",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("trow");
            $('#trow').empty();
            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                let row = table.insertRow(-1);
                let id = "data_" + i;
                row.id = id;
                row.className = "task-list-row";
                $("#data_" + i).attr('data-unit', obj['unitName']);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                let cell6 = row.insertCell(-1);
                cell1.innerHTML = obj['id'];
                cell2.innerHTML = obj['source'];
                cell3.innerHTML = obj['name'];
                cell4.innerHTML = obj['createdDate'];
                cell5.innerHTML = obj['approvalStatus'];
                var attribute = document.createElement("a");
                attribute.id = obj['responsibleId'];
                attribute.href = "<?php echo HOST; ?>/DivisionalSecretariat/Dashboard/ViewBorrowRequests/" + obj['id'];
                attribute.className = "btn-box";
                attribute.innerHTML = "View";
                attribute.target = "_blank";
                cell6.appendChild(attribute);
            }
        }
        (function() {
            var showResults;
            $('#search').keyup(function() {
                var searchText;
                searchText = $('#search').val();
                return showResults(searchText);
            });
            showResults = function(searchText) {
                $('tbody tr').hide();
                return $('tbody tr:Contains(' + searchText + ')').show();
            };
            jQuery.expr[':'].Contains = jQuery.expr.createPseudo(function(arg) {
                return function(elem) {
                    return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
        }.call(this));
    </script>
</body>

</html>