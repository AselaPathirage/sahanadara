
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Inventory </title>
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
tr:hover{
  background:#c9e8f7;
  position:relative;
}
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
    .custom-model-main {
    text-align: center;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0; /* z-index: 1050; */
    outline: 0;
    opacity: 0;
 transition: opacity 0.15s linear, z-index 0.15;
    z-index: -1;
    overflow-x: hidden;
    overflow-y: auto;
  }
  
  .model-open {
    z-index: 99999;
    opacity: 1;
    overflow: hidden;
  }
  .custom-model-inner {
    transform: translate(0, -25%);
    transition: -webkit-transform 0.3s ease-out;
    transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
    display: inline-block;
    vertical-align: middle;
    width: 600px;
    margin: 30px auto;
    max-width: 97%;
  }
  .custom-model-wrap {
    display: block;
    width: 100%;
    position: relative;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    background-clip: padding-box;
    outline: 0;
    text-align: left;
    padding: 20px;
    box-sizing: border-box;
    max-height: calc(100vh - 70px);
    overflow-y: auto;
  }
  .model-open .custom-model-inner {
    transform: translate(0, 0);
    position: relative;
    z-index: 999;
  }
  .model-open .bg-overlay {
    background: rgba(0, 0, 0, 0.6);
    z-index: 99;
  }
  .bg-overlay {
    background: rgba(0, 0, 0, 0);
    height: 100vh;
    width: 100%;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    transition: background 0.15s linear;
  }
  .close-btn {
    position: absolute;
    right: 0;
    top: -30px;
    cursor: pointer;
    z-index: 99;
    font-size: 30px;
    color: #fff;
  }
</style>
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
        <div class="container">
            <div class="custom-model-main"> 
                    <div class="custom-model-inner">
                        <div class="close-btn">×</div>
                        <div class="custom-model-wrap">
                            <div class="pop-up-content-wrap">
                                <form id='add' name="add" method="post">
                                    <h1>New Item</h1>
                                    <div class="row-content">

                                        <label for="your_name">Unit</label>
                                        <select id="unitType" name="unitType" class="form-control" required='true'>
                                            <option>Select Type</option>
                                        </select>

                                        <label for="your_nic">Item Name</label>
                                        <input type="text" id="itemName" name="itemName" placeholder="Item Name" title="Type " class="form-control" required='true'>

                                        <div class="row" style="justify-content: center;">
                                            <input type="submit" value="Send" class="btn-alerts" />
                                            <input type="reset" value="Reset" class="btn-alerts" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-overlay"></div>
            </div>
            <div class="box">
                    <div class="panel panel-primary filterable">
                        <table id="ajaxFilter"  class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">
                                    </th>
                                    <th style="width: 30%;">Name
                                    <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                                    </th>
                                    <th style="width: 30%;">Unit
                                        <select id="unitType_2" class="form-control">
                                            <option>Any</option>
                                        </select>
                                    </th>
                                    <th style="width: 10%;">
                                    <input type="submit" id="addNew" value="+ Create New Item" class="form-control">
                                    </th>
                                    <!-- <th style="width: 10%;">
                                    <input type="submit" id="editItem" value="+ Create New Item" class="form-control">
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody id="trow">                   
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        var thisPage = "#Add";
        $(document).ready(function() {
            $("#Dashboard,#Maintain,#Add,#Aid,#Add,#Service").each(function() {
                if ($(this).hasClass('active')){
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            getUnit();
            getItem();
            $("#add").submit(function(e) {
                e.preventDefault();
                //$(".custom-model-main").removeClass('model-open');
                $(".custom-model-main").fadeOut();
                var str = [];
                var formElement = document.querySelector("#add");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key){
                    object[key] = value;
                }); 
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
					type: "POST",
					url: "<?php echo API; ?>item",
					data: json,
                    headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
					cache: false,
					success: function(result) {
						$('#trow').empty();
                        getItem();
					},
					error: function(err) {
						alert(err);
					}
				});
            });
		});

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        $("#addNew").on('click', function() {
            $(".custom-model-main").fadeIn();
            $(".custom-model-main").addClass('model-open');
        });
        $(".close-btn, .bg-overlay").click(function() {
            $(".custom-model-main").removeClass('model-open');
        });

        function getUnit(){
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>unit",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            var select = document.getElementById("unitType");
            var select2 = document.getElementById("unitType_2");
            for (var i = 0; i < output.length; i++){
                var opt = document.createElement('option');
                opt.value = output[i]['unitId'];
                opt.innerHTML = output[i]['unitName'];
                var opt2 = document.createElement('option');
                opt2.value = output[i]['unitName'];
                opt2.innerHTML = output[i]['unitName'];
                select.appendChild(opt);
                select2.appendChild(opt2);
            }
        }
        function getItem(){
            var x = "<?php echo $_SESSION['key'] ?>";
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>item",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText);
            var table = document.getElementById("trow");
            for (var i = 0; i < output.length; i++){
                let obj = output[i];
                let row = table.insertRow(-1);
                let id ="data_"+i;
                row.id = id;
                row.className = "task-list-row";
                $("#data_"+i).attr('data-unit', obj['unitName']);
                let cell1 = row.insertCell(-1);
                let cell2 = row.insertCell(-1);
                let cell3 = row.insertCell(-1);
                cell1.innerHTML  = "<input id='"+obj['itemId']+"' class='radio-custom' name='radio-group' type='radio' checked><label for='"+obj['itemId']+"' class='radio-custom-label'></label>";
                cell2.innerHTML = obj['itemName'];
                cell3.colSpan ="2";
                cell3.innerHTML = obj['unitName'];
            }
        }
        var filters = {
                unit: null
            };

        function updateFilters() {
            $('.task-list-row').hide().filter(function () {
                var
                    self = $(this),
                    result = true; // not guilty until proven guilty

                Object.keys(filters).forEach(function (filter) {
                    if (filters[filter] && (filters[filter] != 'None') && (filters[filter] != 'Any')) {
                        result = result && filters[filter] === self.data(filter);
                    }
                });

                return result;
            }).show();
        }

        function changeFilter(filterName) {
            filters[filterName] = this.value;
            updateFilters();
        }
        $('#unitType_2').on('change', function () {
            changeFilter.call(this, 'unit');
        });

        //var $rows = $('#ajaxFilter #trow .task-list-row'); 
        (function () {
        var showResults;
        $('#search').keyup(function () {
            var searchText;
            searchText = $('#search').val();
            return showResults(searchText);
        });
        showResults = function (searchText) {
            $('tbody tr').hide();
            return $('tbody tr:Contains(' + searchText + ')').show();
        };
        jQuery.expr[':'].Contains = jQuery.expr.createPseudo(function (arg) {
            return function (elem) {
                return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });
    }.call(this));
    </script>
</body>
</html>