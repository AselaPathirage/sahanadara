<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Inventory Manager - Notice </title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/searchList.css">
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
        tr {
            background-color: #fff !important;
        }
        .add {
            background-color: #04AA6D;
            color: #ffdddd;
        }
        .remove {
            color: #ffdddd;
        }
        #search-bar {
            display: block;
            margin: .25em 0 0;
            width: 100%;
            padding: .25em .5em;
            font-size: 1.2em;
        }
        .output {
            list-style: none;
            width: 20%;
            min-height: 0px;
            border-top: 0 !important;
            color: #767676;
            font-size: .75em;
            transition: min-height 0.2s;
            position:absolute ;
            z-index: 5;
            text-transform: capitalize;
        }
        .output,
        #search-bar {
            background: #fff;
            border: 1px solid #767676;
        }
        .prediction-item {
            padding: .5em .75em;
            transition: color 0.2s, background 0.2s;
        }
        .output:hover .focus {
            background: #fff;
            color: #767676;
        }
        .prediction-item:hover,
        .focus,
        .output:hover .focus:hover {
            background: #ddd;
            color: #333;
        }
        .prediction-item:hover {
            cursor: pointer;
        }
        .prediction-item strong {
            color: #333;
        }
        .prediction-item:hover strong {
            color: #000;
        }

        p {
            margin-top: 1em;
        }
        #submit {
            display: block;
            margin: .5em 0 2.5em;
            padding: .25em .5em;
            font-size: 1.2em;
            color: #439973;
            border: 1px solid #439973;
            background: 0;
            transition: color 0.2s, background 0.2s;
        }
        #submit:hover {
            color: #fff;
            background: #439973;
        }
    </style>
</head>

<body>
    <?php
    include_once('./public/Views/InventoryManager/includes/sidebar_notice.php');
    ?>
    <section class="dashboard-section">
        <?php
        include_once('./public/Views/InventoryManager/includes/topnav.php');
        ?>
        <div class="space"></div>
        <div class="container">
            <div class="box">
                <center>
                    <h1>Donation Request Notice</h1>
                </center>
                <form id='add' name="add" method="POST">
                    <div style="padding-left:15% ;">
                        <div class="column" style="width:90%;float: none;padding-left:5%;padding-top:2px;">
                            <table style="border: none !important;width:70%;">
                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" id="title" name="title" /></td>
                                </tr>
                                <tr>
                                    <td>Number of Families</td>
                                    <td><input type="text" id="numOfFamillies" name="numOfFamillies" style="width: 100%;" onkeypress="return isNumber(event,1)"></td>
                                </tr>
                                <tr>
                                    <td>Number of People</td>
                                    <td><input type="text" id="numOfPeople" name="numOfPeople" style="width: 100%;" onkeypress="return isNumber(event,1)"></td>
                                </tr>
                                <tr>
                                    <td>Location</td>
                                    <td>
                                        <select id="assigned-user-filter" class="form-control" required="true">
                                            <option value="0">Select Safe House</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">Description</td>
                                    <td><textarea id="notes" name="drivernotes" rows="8" cols="50"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Required Items</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="table-repsonsive">
                                            <span id="error"></span>
                                            <table class="table table-bordered" id="item_table">
                                                <tr>
                                                    <th style="width: 50%;">Item</th>
                                                    <th style="width: 30%;">Quantity</th>
                                                    <th style="width: 20%;"><button type="button" name="add" class="form-control add">Add</button></th>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div style="float: right;width:30%">
                                <table style="border: none !important;width:100%;">
                                    <tr>
                                        <td><input type="reset" class="view" value="Cancel"></td>
                                        <td><input type="submit" class="create" value="Create"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- <script  src="<?php echo HOST; ?>public/assets/js/responsiblePersonAidReport.js"></script> -->

    <script defer>
        var thisPage = "#add";
        var output;
        var count = 0;
        getItem();
        $(document).ready(function() {
            $("#search,#add").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });
            $(document).on('click', '.add', function() {
                var html = '';
                html += "<tr>";
                html += "<td><input type='text' style='text-transform: capitalize;' id='search-bar-" + count + "' onfocus='filter(" + count + ")' autocomplete='off' /><ul id='output-" + count + "'' class='output' style='display:none;'></ul></td>";
                html += "<td><input type='text' id='quantity" + count + "' name='quantity" + count + "'  onkeypress='return isNumber(event,2)' class='form-control item_quantity' required='true'/></td>";
                html += "<td><button type='button' name='remove' class='form-control remove'>Remove</button></td></tr>";
                $('#item_table').append(html);
                count++;
            });

            $(document).on('click', '.remove', function() {
                $(this).closest('tr').remove();
            });

            $("form").on('submit', function(event) {
                event.preventDefault();
                var formElement = document.querySelector("form");
                var formData = new FormData(formElement);
                var object = {};
                // formData.forEach(function(value, key){ 
                //     if(value ==""){
                //         return;
                //     }
                //     if(key in object){
                //         object[key].push(value);
                //     }else if(key.localeCompare("item[]")==0){
                //         object[key] = new Array();
                //         object[key].push(value);
                //     }else if(key.localeCompare("quantity[]")==0){
                //         object[key] = new Array();
                //         object[key].push(value);
                //     }else{
                //         object[key] = value;
                //     }
                // }); 
                // //$("#add").trigger('reset');
                // var json = JSON.stringify(object);
                // console.log(json);
                $('#item_table  tbody  tr').each(function() {
                    var item = this.getElementsByTagName('td');
                    console.log();
                    console.log(item.options[item[0].selectedIndex].value);
                    console.log(item.value);
                });
            });
        });
        //begginning of the text box filter
        //Copyright (c) 2022 by Sarah Wulf (https://codepen.io/slwulf/pen/vczhJ)

        // Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

        // The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

        // THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

        var terms =
            $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>item/value",
                dataType: "json", 
                headers: {'HTTP_APIKEY':'<?php echo $_SESSION['key'] ?>'},
                cache: false,
                async: false
            }).responseText),
            returnList = [];
            console.log(terms);
        function strInArray(str, strArray) {
            for (var j = 0; j < strArray.length; j++) {
                var original = str;
                str = str.toLowerCase();
                var text = strArray[j].toLowerCase();
                if (text.match(str) && returnList.length < 5) {
                    let searchMask = original;
                    let regEx = new RegExp(searchMask, "ig");
                    let $h = strArray[j].replace(regEx, '<strong>' + original + '</strong>');
                    returnList.push('<li class="prediction-item"><span class="prediction-text">' + $h + '</span></li>');
                }
            }
        }

        function nextItem(kp) {
            if ($('.focus').length > 0) {
                var $next = $('.focus').next(),
                    $prev = $('.focus').prev();
            }

            if (kp == 38) { // Up

                if ($('.focus').is(':first-child')) {
                    $prev = $('.prediction-item:last-child');
                }

                $('.prediction-item').removeClass('focus');
                $prev.addClass('focus');

            } else if (kp == 40) { // Down

                if ($('.focus').is(':last-child')) {
                    $next = $('.prediction-item:first-child');
                }

                $('.prediction-item').removeClass('focus');
                $next.addClass('focus');
            }
        }

        function filter(id) {
            const activeText = document.activeElement;
            $(function() {
                $(activeText).keydown(function(e) {
                    $key = e.keyCode;
                    if ($key == 38 || $key == 40) {
                        nextItem($key);
                        return;
                    }

                    setTimeout(function() {
                        var $search = $(activeText).val();
                        returnList = [];

                        strInArray($search, terms);

                        if ($search == '' || !$('input').val) {
                            $('#output-' + id).html('').slideUp();
                        } else {
                            $('#output-' + id).html(returnList).slideDown();
                        }

                        $('.prediction-item').on('click', function() {
                            $text = $(this).find('span').text();
                            $('#output-' + id).slideUp(function() {
                                $(this).html('');
                            });
                            $(activeText).val($text);
                        });

                        $('.prediction-item:first-child').addClass('focus');

                    }, 50);
                });
            });

            $(activeText).focus(function() {
                if ($('.prediction-item').length > 0) {
                    $('#output-' + id).slideDown();
                }

                $('#searchform').submit(function(e) {
                    e.preventDefault();
                    $text = $('.focus').find('span').text();
                    $('#output-' + id).slideUp();
                    $(activeText).val($text);
                    $('input').blur();
                });
            });

            $(activeText).blur(function() {
                if ($('.prediction-item').length > 0) {
                    $('#output-' + id).slideUp();
                }
            });
        }
        //end of the text box filter

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        var countries = $.parseJSON($.ajax({
            type: "GET",
            url: "<?php echo API; ?>item/value",
            dataType: "json",
            headers: {
                'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
            },
            cache: false,
            async: false
        }).responseText);

        function getItem() {
            output = $.parseJSON($.ajax({
                type: "GET",
                url: "<?php echo API; ?>item",
                dataType: "json",
                headers: {
                    'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                },
                cache: false,
                async: false
            }).responseText);
        }

        function isNumber(e, check) {
            e = (e) ? e : window.event;
            var charCode = (e.which) ? e.which : e.keyCode;
            if (check == 1) {
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            } else {
                if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
                    return false;
                }
                return true;
            }

        }
    </script>
</body>

</html>