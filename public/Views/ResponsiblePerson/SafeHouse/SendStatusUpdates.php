<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Safe House </title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
input.invalid {
  background-color: #ffdddd;
}
.tab {
  display: none;
}
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
.step.active {
  opacity: 1;
}
.step.finish {
  background-color: #04AA6D;
}
td{
    border: none;
    text-align: left;
    vertical-align: middle;
    }
tr{
    background-color: #fff !important;
}
.add{
background-color: #04AA6D;
color: #ffdddd;
}
.remove{
    color: #ffdddd;
}
    </style>
</head>
<body>
    <?php
        include_once('./public/Views/ResponsiblePerson/includes/sidebar_safeHouse.php');
     ?>
    <section class="dashboard-section">
        <?php 
        include_once('./public/Views/ResponsiblePerson/includes/topnav.php'); 
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center><h1>Safe House - Ullala 321/A</h1></center>
                <form id="regForm">
                    <div class="tab">
                    <h3>Displaced person's details</h3>
                                    <div class="column" style="width:70%;float: none;padding-left:15%;padding-top:2px;">
                                            <label for="your_name">Number of adult males</label>
                                            <input type="text" id="your_name" class="form-control" name="yourname" onkeypress="return isNumber(event)" required='true'/>

                                            <label for="your_email">Number of adult females</label>
                                            <input type="email" id="your_email" class="form-control" name="youremail" onkeypress="return isNumber(event)" required='true'/>

                                            <label for="your_phone">Number of children</label>
                                            <input type="tel" id="your_phone" class="form-control" name="yourphone" onkeypress="return isNumber(event)" required='true'/>

                                            <label for="address">Number of disabled persons</label>
                                            <input type="tel" id="your_phone" class="form-control" name="yourphone" onkeypress="return isNumber(event)" required='true'/>
                                    </div>
                                    <h3>Other details</h3>
                                    <div class="column" style="width:70%;float: none;padding-left:15%;padding-top:2px;">
                                            <label for="notes">Remarks</label>
                                            <textarea id="notes" name="drivernotes" rows="8" cols="50" required='true'></textarea>
                                    </div>
                    </div>
                    <div class="tab">Required Aids
                        <div class="table-repsonsive">
                            <span id="error"></span>
                            <table class="table table-bordered" id="item_table">
                                <tr>
                                    <th style="width: 30%;">Item</th>
                                    <th style="width: 50%;">Quantity</th>
                                    <th style="width: 20%;"><button type="button" name="add" class="form-control add" >Add</button></th>
                            </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div style="overflow:auto;">
                    <div style="float:right;">
                        <table style="border: none !important;width:400px;">
                            <tr>
                                <td><button type="button" class="form-control" style="background-color:rgb(114, 204, 252);color:white;width:50%" id="prevBtn" onclick="nextPrev(-1)">Previous</button></td>
                                <td><button type="button" class="form-control" style="background-color:rgb(30, 227, 95);color:white;width:50%" id="nextBtn" onclick="nextPrev(1)">Next</button></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                    
                    <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script>
        var thisPage = "#updates";
        var output;
        getItem();
        $(document).ready(function(){
            $("#stats,#updates").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $(document).on('click', '.add', function(){
                var html = '';
                html += '<tr>';
                html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option>';
                for (var i = 0; i < output.length; i++){
                    html += "<option>"+output[i]['itemName']+"</option>";
                }
                html +="</select></td>";
                html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
                html += '<td><button type="button" name="remove" class="form-control remove">Remove</button></td></tr>';
                $('#item_table').append(html);
            });
                
            $(document).on('click', '.remove', function(){
                $(this).closest('tr').remove();
            });
        });

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }
        function getItem(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>item",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
        }
        function isNumber(e) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        fixStepIndicator(n)
        }

        function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
            document.getElementById("regForm").submit();
            return false;
        }
        showTab(currentTab);
        }

        function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
            }
        }
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid;
        }

        function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
        }
    </script>
</body>
</html>