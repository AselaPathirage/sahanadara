<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_dmc.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once('./public/Views/GramaNiladari/includes/sidebar_dashboard.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/GramaNiladari/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <h1>Residents</h1>
            <div class="container" style="text-align: right;">
                <div style="display:block;">
                    <a class="btn_blue Click-here">Create Record</a>
                </div>
            </div>
            <div class="custom-model-main">
                <div class="custom-model-inner">
                    <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                            <form action="#" id='add' name="add" method="POST">
                                <h1>New Record</h1>

                                <div class="row-content">

                                    <label for="your_name">Name</label>
                                    <input type="text" id="name" name="name" />

                                    <label for="your_nic">NIC</label>
                                    <input type="text" id="nic" name="nic" />

                                    <label for="your_phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" />

                                    <label for="address">Address</label>
                                    <textarea id="address" name="address"></textarea>
                                    <div class="row" style="justify-content: center;">
                                        <input type="submit" value="Send" class="btn-alerts" />
                                        <input type="reset" value="Cancel" class="btn-alerts" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-overlay"></div>
            </div>
            <div class="container">
                <div class="">
                    <table class="table" style="margin: 15px auto;">
                        <thead>
                            <tr class="filters">


                                <th>Search
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                </th>
                            </tr>
                        </thead>
                    </table>


                    <div class="panel panel-primary filterable">
                        <table id="table2" class="table">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>NIC</th>
                                    <th>Address</th>
                                    <th>Tel No</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>

                            <tbody>

                                <tr id="task-1" class="task-list-row" data-task-id="1" data-user="Larry" data-status="In Progress" data-milestone="Milestone 2" data-priority="Urgent" data-tags="Tag 2">
                                    <td>1</td>
                                    <td>N Nimesh </td>
                                    <td>991237564V</td>
                                    <td>111, Maithree Rd, Horana</td>
                                    <td>0756787634</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_blue">Update</a>
                                        <a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_delete">Delete</a>
                                    </td>

                                </tr>

                                <tr id="task-2" class="task-list-row" data-task-id="2" data-user="Larry" data-status="Not Started" data-milestone="Milestone 2" data-priority="Low" data-tags="Tag 1">
                                    <td>2</td>
                                    <td>Y Abeysinghe</td>
                                    <td>985637555V</td>
                                    <td>14/D, Samagi Rd, Bellapitiya, Horana</td>
                                    <td>0778987655</td>
                                    <td><a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_blue">Update</a>
                                        <a href="/<?php echo baseUrl; ?>/DMC/ViewIncident" class="btn_delete">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        var thisPage = "#residents";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            getResident();

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        // popup
        $(".Click-here").on('click', function() {
            $(".custom-model-main").addClass('model-open');
        });
        $(".close-btn, .bg-overlay").click(function() {
            $(".custom-model-main").removeClass('model-open');
        });

        $("#add").submit(function(e) {
            e.preventDefault();
            var str = [];
            var formElement = document.querySelector("#add");
            var formData = new FormData(formElement);
            //var array = {'key':'ABCD'}
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
            });
            object['key'] = "<?php echo $_SESSION['key'] ?>";
            object['gnid'] = "<?php echo $_SESSION['userId'] ?>";
            var json = JSON.stringify(object);
            console.log(json);
            $.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>/GramaNiladari_addResident/1234",
                data: json,
                cache: false,
                success: function(result) {
                    console.log(result);
                    getResident();
                },
                error: function(err) {
                    alert(err);
                }
            });
        });

        function getResident() {
            var object = {};
            object['key'] = "<?php echo $_SESSION['key'] ?>";
            object['gnid'] = "<?php echo $_SESSION['userId'] ?>";
            var json = JSON.stringify(object);
            console.log(object);
            output = $.parseJSON($.ajax({
                type: "POST",
                url: "localhost/<?php echo baseUrl; ?>/GramaNiladari_getResident/1234",
                dataType: "json",
                data: json,
                cache: false,
                async: false
            }).responseText);
            console.log(output);
            $("#table2 tbody").empty();
            var table = document.getElementById("table2");
            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                console.log(obj);
                let row = table.insertRow(-1);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                let cell4 = row.insertCell(-1);
                let cell5 = row.insertCell(-1);
                let cell6 = row.insertCell(-1);
                var attribute = document.createElement("a");
                attribute.id = i;
                attribute.href = "";
                attribute.className = "btn_blue";
                attribute.name = "update";
                attribute.innerHTML = "Update";
                var attribute2 = document.createElement("a");

                attribute2.id = i;
                attribute2.href = "";
                attribute2.className = "btn_delete";
                attribute2.name = "delete";
                attribute2.innerHTML = "Delete";
                cell1.innerHTML = obj['residentId'];
                cell2.innerHTML = obj['residentName'];
                cell3.innerHTML = obj['residentNIC'];
                cell4.innerHTML = obj['residentAddress'];
                cell5.innerHTML = obj['residentTelNo'];
                var attribute3 = document.createElement("span");
                attribute3.innerHTML = " ";
                cell6.appendChild(attribute);
                cell6.appendChild(attribute3);
                cell6.appendChild(attribute2);
                console.log(attribute);
                console.log(attribute2);
            }
        }
    </script>
</body>

</html>