<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Disaster Officer - Donation </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchList.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style_disofficer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .radio-custom {
        opacity: 0;
        position: absolute;   
    }
    .radio-custom, .radio-custom-label {
        display: inline-block;
        vertical-align: middle;
        margin: 5px;
        cursor: pointer;
    }
    .radio-custom-label {
        position: relative;
    }
    .radio-custom + .radio-custom-label:before {
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
    .radio-custom + .radio-custom-label:before {
        border-radius: 10%;
    }

    .radio-custom:checked + .radio-custom-label:before {
        content: "\E9A4";
        font-family: 'boxicons';
        color: #000;
    }
    .radio-custom:focus + .radio-custom-label {
    outline: 1px solid #ddd; /* focus style */
    }
    .create{
        background-color: rgb(132, 199, 174);
        height: 50px;
        width: 100%;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        text-decoration: none;
        color: black;
    }
    .create:hover{
        background-color: rgb(153,176,255);   
    }
    .view{
        background-color:rgb(241,67,67);
        height: 50px;
        width: 100%;
        padding: 14px;
        text-align: center;
        border-radius: 5px;
        line-height: 25px;
        color: black;
    }
    .view:hover{
        background-color: rgb(138,123,217);
    }
    td{
            border: none;
            text-align: left;
            vertical-align: middle;
    }
    
    </style>
</head>
<body>
<?php
        include_once('./public/Views/DisasterOfficer/includes/sidebar_dashboard.php');
        ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/DisasterOfficer/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center><h1>Service Request Form - Kamburupitiya</h1></center>
                <form>
                <fieldset>
                        <div style="padding-left:15% ;">
                                    <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                                            <table style="border: none !important;width:70%;">
                                                <tr>
                                                    <td>Requesting for</td>
                                                    <td>
                                                        <span id="combo3-remove" style="display: none">remove</span> <!-- used as descriptive text for option buttons; if used within the button text itself, it ends up being read with the input name -->
                                                        <div class="combo js-inline-buttons">
                                                            <div role="combobox" aria-haspopup="listbox" aria-expanded="false" aria-owns="listbox3" class="input-wrapper multiselect-inline">
                                                            <ul class="selected-options" aria-live="assertive" aria-atomic="false" aria-relevant="additions removals" id="combo3-selected"></ul>
                                                            <input
                                                                aria-activedescendant=""
                                                                aria-autocomplete="list"
                                                                aria-labelledby="combo3-label combo3-selected"
                                                                id="combo3"
                                                                class="combo-input"
                                                                type="text">
                                                            </div>
                                                            <div class="combo-menu" role="listbox" aria-multiselectable="true" id="listbox3"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: #fff;">Requesting From</td>
                                                    <td style="background-color: #fff;">                                
                                                        <select id="division" class="form-control">
                                                            <option value="">Any</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Required Date</td>
                                                    <td><input type="date" id="your_name" name="yourname"  style="width: 100%;"></td>
                                                </tr>
                                                <tr style="background-color: #fff;">
                                                    <td>Note</td>
                                                    <td><textarea id="notes" name="drivernotes" rows="8" cols="50"></textarea></td>
                                                </tr>
                                            </table>
                                            <div style="float: right;width:30%">
                                                <table style="border: none !important;width:100%;">
                                                    <tr>
                                                        <td><input type="reset" class="view"></td>
                                                        <td><input type="submit" class="create"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
    <script  src="/<?php echo baseUrl; ?>/public/assets/js/responsiblePersonAidReport.js"></script>
    <script>
        var thisPage = "#Donation";
        $(document).ready(function() {
            $("#Dashboard,#Alerts,#Messages,#Incidents,#IncidentReporting,#Compensation,#Donation,#ResponsiblePerson").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        getDivision()
        function getDivision(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>division",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            //console.log(output);
            var select = document.getElementById("division");
            for (var i = 0; i < output.length; i++){
                var opt = document.createElement('option');
                opt.value = output[i]['id'];
                opt.innerHTML = output[i]['division'];
                select.appendChild(opt);
            }
        }
    </script>
</body>
</html>