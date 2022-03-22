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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .tab {
            display: none;
        }

        button {
            margin-top: 15px;
            margin-left: 20px;

            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }


        #prevBtn {
            background-color: #bbbbbb;
        }
    </style>

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
        <div id="alertBox">
        </div>
        <div class="container col8">
            <div class="box">
                <form id="regForm">
                    <div class="box1">
                        <h1 class="text-center">Death Compensation</h1>

                        <div class="tab">
                            <div class="row">
                                <div class="col3">
                                    <label for="disaster">Disaster</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="disaster" name="disaster" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="doc" style="margin-top:6px">Date</label>
                                </div>

                                <div class="col9 row-content" style="align-items: center;">
                                    <input type="date" id="disdate" name="disdate" class="datesInForms">
                                </div>

                            </div>
                            <h4 class="text-center">Details of the deceased person</h4>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname" style="margin-top:0">Full name of deceased person</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="dname" name="dname" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="ddate" style="margin-top:6px">Date of death</label>
                                </div>

                                <div class="col9 row-content" style="align-items: center;">
                                    <input type="date" id="ddate" name="ddate" class="datesInForms">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="dnic">NIC</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="dnic" name="dnic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col9">
                                    <textarea type="text" id="daddress" name="daddress" placeholder=""></textarea>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col3">
                                    <label for="doccupation">Occupation</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="doccupation" name="doccupation" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="tab">
                            <h4 class="text-center">Details of the applicant</h4>
                            <div class="row">
                                <div class="col3">
                                    <label for="fname">Applicant Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="aname" name="aname" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">NIC</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="anic" name="anic" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Telephone Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="atpnumber" name="atpnumber" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="relationship">Relationship</label>
                                </div>
                                <div class="col9">
                                    <select id="relationship" name="relationship">
                                        <option value="null">Select</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Father">Father</option>
                                        <option value="Child">Child</option>
                                        <option value="Other(Trustee)">Other(Trustee)</option>
                                    </select>
                                </div>
                            </div>





                        </div>

                        <div class="tab">
                            <h4 class="text-center">Details of heirs</h4>
                            <div class="table-repsonsive">
                                <div id="heirs">


                                    <!-- <span id="error"></span>
                                <table class="table table-bordered" style="width:70%;margin:0" id="item_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50%;">Item</th>
                                            <th style="width: 30%;">Quantity</th>
                                            <th style="width: 20%;"><button type="button" name="add" class="form-control add">Add</button></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table> -->

                                    <div id="heir1">
                                        <div class="row">
                                            <div class="col10">
                                                <div class="row">
                                                    <div class="col3">
                                                        <label for="fname">Name</label>
                                                    </div>
                                                    <div class="col9">
                                                        <input type="text" id="hname0" name="hname0" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col3">
                                                        <label for="fname">NIC</label>
                                                    </div>
                                                    <div class="col9">
                                                        <input type="text" id="hnic0" name="hnic0" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col3">
                                                        <label for="fname">Relationship</label>
                                                    </div>
                                                    <div class="col9">
                                                        <input type="text" id="hrelationship0" name="hrelationship0" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col3">
                                                        <label for="bank">Bank</label>
                                                    </div>
                                                    <div class="col9">
                                                        <input type="text" id="hbank0" name="hbank0" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col3">
                                                        <label for="branch">Branch</label>
                                                    </div>
                                                    <div class="col9">
                                                        <input type="text" id="hbranch0" name="hbranch0" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col3">
                                                        <label for="nic" style="">Account Number</label>
                                                    </div>
                                                    <div class="col9">
                                                        <input type="number" id="haccnum0" name="haccnum0" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col2">
                                                <button type="button" name="remove" class="form-control add remove" style="background-color:#FC4F4F;color:white;">Remove</button>
                                            </div> -->

                                        </div>
                                        <hr>
                                    </div>
                                </div>

                                <div class="row">
                                    <div style="margin:auto;">
                                        <button type="button" name="add" class="form-control add" id="addheir" style="background-color: #11468F;color:white;">Add</button>
                                    </div>
                                </div>

                            </div>


                            <!-- <div class="row">
                                <div class="col3">
                                    <label for="upload">Upload certified photocopies</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Incident Report</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Death Certificate</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">NIC or ID Certification</label>
                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Heirs certification and their identity certification</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div> -->
                            <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

                        </div>




                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="nextBtn" onclick="nextPrev(1)" style="background-color:lightblue">Next</button>
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>







    </section>
    <script>
        var count = 1;
        var thisPage = "#compensations";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            $(document).on('click', '#addheir', function() {
                var html = '';
                html += "<div id='heir1'><div class='row'><div class='col10'><div class='row'><div class='col3'><label for='fname'>Name</label></div><div class='col9'><input type='text' id='hname" + count + "' name='hname" + count + "'></div></div><div class='row'><div class='col3'><label for='fname'>NIC</label></div><div class='col9'><input type='text' id='hnic" + count + "' name='hnic" + count + "' ></div></div>";
                html += " <div class='row'><div class='col3'><label for='fname'>Relationship</label></div> <div class='col9'><input type='text' id='hrelationship" + count + "' name='hrelationship" + count + "' placeholder=''></div></div><div class='row'><div class='col3'><label for='bank'>Bank</label></div><div class='col9'><input type='text' id='hbank" + count + "' name='hbank" + count + "'></div></div>";
                html += "<div class='row'><div class='col3'><label for='branch'>Branch</label></div><div class='col9'><input type='text' id='hbranch" + count + "' name='hbranch" + count + "'></div></div> <div class='row'><div class='col3'><label for='nic' style=''>Account Number</label></div><div class='col9'><input type='number' id='haccnum" + count + "' name='haccnum" + count + "' ></div></div></div>";
                html += " <div class='col2'><button type='button' name='remove' class='form-control add remove' style='background-color:#FC4F4F;color:white;'>Remove</button></div></div><hr></div>";
                $('#heirs').append(html);
                count++;
            });

            $(document).on('click', '.remove', function() {
                $(this).closest('#heir1').remove();
            });



        });

        // $("#regForm").submit(function(event) {
        //     event.preventDefault();
        //     console.log("asdasdasdasdtarget");
        //     var formElement = document.querySelector("form");
        //     var formData = new FormData(formElement);
        //     var object = {};
        // formData.forEach(function(value, key) {
        //     if (key.includes("quantity")) {
        //         return;
        //     }
        //     object[key] = value;
        // });
        // let e = document.getElementById("safeHouseId");
        // let safeHouseId = e.value;
        // object['safeHouseId'] = safeHouseId;
        // object['item'] = new Object();
        // $('#item_table  tbody  tr').each(function() {
        //     var item = $(this).find("td:first").find("input").val();
        //     var words = item.split(" ");
        //     for (let i = 0; i < words.length; i++) {
        //         words[i] = words[i][0].toUpperCase() + words[i].substr(1);
        //     }
        //     words = words.join(" ");
        //     var quantity = $(this).find("td:nth-child(2)").find("input").val();
        //     object['item'][words] = quantity;
        // });
        // var json = JSON.stringify(object);
        // console.log(json);
        // $.ajax({
        //     type: "POST",
        //     url: "<?php echo API; ?>notice",
        //     data: json,
        //     headers: {
        //         'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
        //     },
        //     cache: false,
        //     success: function(result) {
        //         if (result.code == 806) {
        //             $("#add").trigger('reset');
        //             alertGen("Record Added Successfully!", 1);
        //         } else {
        //             alertGen("Unable to handle request.", 2);
        //         }
        //     },
        //     error: function(err) {
        //         alertGen("Something went wrong.", 3);
        //         console.log(err);
        //     }
        // });
        // });







        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
        }

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
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
            // ... and run a function that displays the correct step indicator:
            // fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:

            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                event.preventDefault();
                console.log("asdasdasdasdtarget");
                var formElement = document.querySelector("form");
                var formData = new FormData(formElement);
                var object = {};
                formData.forEach(function(value, key) {
                    // if (key.includes("h")) {
                    if (key.startsWith('h')) {
                        return;
                    }
                    object[key] = value;
                });
                // let e = document.getElementById("safeHouseId");
                // let safeHouseId = e.value;
                // object['safeHouseId'] = safeHouseId;
                object['heir'] = new Object();
                count = 0
                $('#heirs #heir1').each(function() {
                    // console.log("w");
                    var hname = $(this).find("input[id^='hname']").val();
                    var hnic = $(this).find("input[id^='hnic']").val();
                    var hrelationship = $(this).find("input[id^='hrelationship']").val();
                    var hbranch = $(this).find("input[id^='hbranch']").val();
                    var haccnum = $(this).find("input[id^='haccnum']").val();
                    var hbank = $(this).find("input[id^='hbank']").val();
                    // var words = item.split(" ");
                    // for (let i = 0; i < words.length; i++) {
                    //     words[i] = words[i][0].toUpperCase() + words[i].substr(1);
                    // }
                    // words = words.join(" ");
                    // var quantity = $(this).find("td:nth-child(2)").find("input").val();
                    // object['item'][words] = quantity;
                    var h = {};
                    h['hname'] = hname;
                    h['hnic'] = hnic;
                    h['hrelationship'] = hrelationship;
                    h['hbranch'] = hbranch;
                    h['haccnum'] = haccnum;
                    h['hbank'] = hbank;
                    object['heir'][count++] = h;

                });
                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "POST",
                    url: "<?php echo API; ?>deathcomp",
                    data: json,
                    headers: {
                        'HTTP_APIKEY': '<?php echo $_SESSION['key'] ?>'
                    },
                    cache: false,
                    success: function(result) {
                        var url = "<?php echo HOST; ?>/GramaNiladari/Compensation";
                        if (result.code == 806) {
                            $("#regForm").trigger('reset');
                            alertGen("Record Added Successfully!", 1);
                        } else {
                            alertGen("Unable to handle request.", 2);
                        }
                        setTimeout(function() {
                            $(location).attr('href', url);
                        }, 1000);
                        console.log(result);
                    },
                    error: function(err) {
                        alertGen("Something went wrong.", 3);
                        console.log(err);
                    }
                });
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
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