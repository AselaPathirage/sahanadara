<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Management Officer - Notice </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_dmc.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/tooltips.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .radio-custom {
            opacity: 0;
            position: absolute;
        }

        .radio-custom,
        .radio-custom-label {
            display: inline-block;
            vertical-align: middle;
            margin: 5px;
            cursor: pointer;
        }

        .radio-custom-label {
            position: relative;
        }

        .radio-custom+.radio-custom-label:before {
            content: '';
            background: #fff;
            border: 2px solid rgb(0, 0, 0);
            display: inline-block;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            padding: 2px;
            margin-right: 10px;
            text-align: center;
        }

        .radio-custom+.radio-custom-label:before {
            border-radius: 10%;
        }

        .radio-custom:checked+.radio-custom-label:before {
            content: "\E9A4";
            font-family: 'boxicons';
            color: #000;
        }

        .radio-custom:focus+.radio-custom-label {
            outline: 1px solid #ddd;
            /* focus style */
        }

        .create {
            background-color: rgb(2, 58, 255);
            height: 50px;
            display: block;
            padding: 14px;
            text-align: center;
            border-radius: 5px;
            line-height: 25px;
            text-decoration: none;
            color: wheat;
            box-shadow: 2px 1px #000;
        }

        .create:hover {
            background-color: rgb(153, 176, 255);
        }

        .view {
            background-color: rgb(66, 245, 96);
            height: 50px;
            display: block;
            padding: 14px;
            text-align: center;
            border-radius: 5px;
            line-height: 25px;
            text-decoration: none;
            color: wheat;
            box-shadow: 2px 1px #000;
        }

        tr:hover {
            background: #c9e8f7;
            position: relative;
        }
    </style>
</head>

<body>
    <?php
    include_once('./public/Views/DisasterOfficer/includes/sidebar_notice.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/DisasterOfficer/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <form>
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th style="width: 55%;text-align:center">Approval Status
                                    <select id="status" class="form-control">
                                        <option value="">All</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Need Updates">Need Updates</option>
                                    </select>
                                </th>

                                <th style="width: 15%;text-align: center;">
                                    <a id="view" style="cursor:pointer" class="create">View</a>
                                </th>
                                <th style="width: 15%;text-align:center;">
                                    <a id="edit" style="cursor:pointer" href="<?php echo HOST; ?>/DisasterOfficer/Notice/editNotice" class="view">Edit</a>
                                </th>
                                <th style="width: 15%;text-align:center;">
                                    <a id="remove" style="background-color: rgb(245, 66, 66);cursor:pointer" class="view">Remove</a>
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <div class="panel panel-primary filterable">
                        <table id="task-list-tbl" class="table">
                            <thead>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th style="width:10%;">Notice Id</th>
                                    <th style="width:45%;">Topic</th>
                                    <th style="width:20%;">Created Date</th>
                                    <th style="width:20%;">Approval State</th>
                                </tr>
                            </thead>
                            <tbody id="trow">
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="custom-model-main" id="deleteform">
            <div class="custom-model-inner">
                <div class="close-btn">×</div>
                <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">
                        <div class="row-content">
                            <h2>Are you sure?</h2>
                            <input type="hidden" id="item2" value="">
                            <p>Do you really want to delete this record? This process cannot be undone.</p>
                            <div class="row" style="justify-content: center;">
                                <button type="button" class="btn-alerts btn_cancel cancel">Cancel</button>
                                <button type="button" class="btn-alerts btn_danger" id="delete-confirm">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-overlay"></div>
        </div>
    </section>
    <div id="alertBox">
    </div>
    <script>
        var thisPage = "#search";
        var output;
        getNotices();
        $(document).ready(function() {
            $("#search,#add").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $('#status').on('change', function() {
                var unit = $('#status').val();
                $('#trow').empty();
                var table = document.getElementById("trow");
                for (var i = 0; i < output.length; i++) {
                    if (output[i]['appovalStatus'] == unit || !unit) {
                        let obj = output[i];
                        let row = table.insertRow(-1);
                        let id = "data_" + i;
                        row.id = id;
                        row.className = "task-list-row";
                        $("#data_" + i).attr('data-status', obj['appovalStatus']);
                        let cell1 = row.insertCell(-1);
                        let cell11 = row.insertCell(-1);
                        let cell2 = row.insertCell(-1);
                        let cell23 = row.insertCell(-1);
                        let cell3 = row.insertCell(-1);
                        cell1.innerHTML = "<input id='" + obj['recordId'] + "' value='" + obj['recordId'] + "' data-recordId='" + obj['recordId'] + "' data-status='" + obj['appovalStatus'] + "' class='radio-custom' name='radio-group' type='radio' checked><label for='" + obj['recordId'] + "' class='radio-custom-label'></label>";
                        cell11.innerHTML = obj['recordId'];
                        if (obj['remark']) {
                            cell2.innerHTML = "<span class='tool' data-tip='" + obj['remark'] + "' tabindex='1'>" + obj['title'] + "</span>";
                        } else {
                            cell2.innerHTML = obj['title'];
                        }
                        cell23.innerHTML = obj['createdDate'];
                        cell3.innerHTML = obj['appovalStatus'];
                    }
                }
            });
            $('#remove').on('click', function() {
                $("#deleteform").fadeIn();
                $("#deleteform").addClass('model-open');
            });
            $('#view').on('click', function() {
                var id = new Array();
                $("input:checkbox[name=radio-group]:checked").each(function(){
                    id.push($(this).val());
                });
                id.forEach(function(item) {
                    let url = "<?php echo HOST; ?>/DisasterOfficer/Notice/viewNotice/"+item;
                    window.open(url, '_blank');
                });
            });
            $(".close-btn, .bg-overlay, .cancel").click(function() {
                $(".custom-model-main").removeClass('model-open');
            });
            $(".closeMessege").click(function(){
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
            $("#delete-confirm").click(function(e) {
                e.preventDefault();
                $("#deleteform").fadeOut();
                $("#deleteform").removeClass('model-open');
                var id = new Array();
                $("input:checkbox[name=radio-group]:checked").each(function(){
                    id.push($(this).val());
                });
                var url ="<?php echo API; ?>notice/";
                id.forEach(function(item) {
                    $.ajax({
                    type: "DELETE",
                    url:  url + item,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        $('#trow').empty();
                        getNotices();
                        if (result.code == 806) {
                            alertGen("Records Deleted Successfully!", 1);
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
                        console.log(err);
                    }
                });
                });
            });
            $("#alertBox").click(function(){
                $(".alert").fadeOut(100)
                $("#alertBox").html("");
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        function getNotices() {
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
            for (var i = 0; i < output.length; i++) {
                let obj = output[i];
                let row = table.insertRow(-1);
                let id = "data_" + i;
                row.id = id;
                row.className = "task-list-row";
                $("#data_" + i).attr('data-status', obj['appovalStatus']);
                let cell1 = row.insertCell(-1);
                let cell11 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell23 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                cell1.innerHTML = "<input id='" + obj['recordId'] + "' value='" + obj['recordId'] + "' data-recordId='" + obj['recordId'] + "' data-status='" + obj['appovalStatus'] + "' class='radio-custom' value='" + obj['recordId'] + "' name='radio-group' type='checkbox'><label for='" + obj['recordId'] + "' class='radio-custom-label'></label>";
                cell11.innerHTML = obj['recordId'];
                if (obj['remark']) {
                    cell2.innerHTML = "<span class='tool' data-tip='" + obj['remark'] + "' tabindex='1'>" + obj['title'] + "</span>";
                } else {
                    cell2.innerHTML = obj['title'];
                }
                cell23.innerHTML = obj['createdDate'];
                cell3.innerHTML = obj['appovalStatus'];
            }
        }
        function alertGen($messege,$type){
            if ($type == 1){
                $("#alertBox").append("  <div class='alert success-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else if($type == 2){
                $("#alertBox").append("  <div class='alert warning-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }else{
                $("#alertBox").append("  <div class='alert danger-alert'><h3>"+$messege+"</h3><a id='closeMessege' class='closeMessege'>&times;</a></div>");
                setTimeout(function() { 
                    $(".alert").fadeOut(100)
                    $("#alertBox").html("");
                }, 4000);
            }
        }
    </script>
</body>

</html>