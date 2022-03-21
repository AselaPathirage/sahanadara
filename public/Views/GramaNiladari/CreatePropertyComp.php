<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Grama Niladari</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/style_admin.css">
    <link rel="stylesheet" href="<?php echo HOST; ?>/public/assets/css/alert.css">
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
            color: black;
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
                <form action="" id="regForm">
                    <div class="box1">
                        <h1 class="text-center">Property Compensation</h1>

                        <div class="tab">
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
                                    <label for="address">Address</label>
                                </div>
                                <div class="col9">
                                    <textarea type="text" id="aaddress" name="aaddress" placeholder=""></textarea>
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
                                    <input type="text" id="arelationship" name="arelationship" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Disaster</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="disaster" name="disaster" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="tab">
                            <h3 class="text-center">Damaged Property Details</h3>





                            <div class="row">
                                <div class="col3">
                                    <label for="tla">Total Land Area</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="tla" name="tla" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="htype">House Type</label>
                                </div>
                                <div class="col9">
                                    <select id="htype" name="htype">
                                        <option value="Single building">Single building </option>
                                        <option value="Storey">Storey</option>
                                        <option value="Home">Home</option>
                                        <option value="Shop">Shop</option>
                                    </select>
                                </div>
                            </div>


                            <h3 class="text-center">Assessment of Damaged Property</h3>

                            <div class="damaged-property">
                                <div class="damaged">
                                    <div class="row">
                                        <div class="col10">
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="relationship">Damaged property</label>
                                                </div>
                                                <div class="col9">
                                                    <select id="dptype0" name="dptype0">
                                                        <option value="Floor">Floor</option>
                                                        <option value="Roof">Roof</option>
                                                        <option value="Wall">Wall</option>
                                                        <option value="Foundation">Foundation</option>
                                                        <option value="Paint">Paint</option>
                                                        <option value="Door">Door</option>
                                                        <option value="Window">Window</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="relationship">Description</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="dpdes0" name="dpdes0" placeholder="">
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col3">
                                                    <label for="nic">Total Area</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="number" id="dpta0" name="dpta0" placeholder="1" class="dpta">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col3">
                                                    <label for="nic">Damaged Area</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="dpda0" name="dpda0" placeholder="0" class="dpda">
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col3">
                                                    <label for="nic">Value of Damage</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="dpvod0" name="dpvod0" placeholder="" class="dpvod">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col2">
                                            <button type="button" name="removeprop" class="form-control add removeprop" style="background-color:#FC4F4F;color:white;">Remove</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div style="margin:auto;">
                                    <button type="button" name="addprop" class="form-control add" id="addprop" style="background-color: #11468F;color:white;">Add</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col2">
                                    <label for="nic"><b>Total Value (Rs)</b></label>
                                </div>
                                <div class="col10">
                                    <input type="text" id="tvprop" name="tvprop" placeholder="0">
                                </div>
                            </div>
                        </div>


                        <div class="tab">
                            <!-- <div class="row">
                                <div class="col3">
                                    <label for="relationship">Photographs</label>
                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col3">
                                    <label for="status">Damage rate per cent</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="status" name="status" placeholder="">
                                </div>
                            </div> -->


                            <h3 class="text-center">Assessment of Damaged Services</h3>

                            <div class="damaged-service">


                                <div class="service">
                                    <div class="row">
                                        <div class="col10">

                                            <div class="row">
                                                <div class="col3">
                                                    <label for="htype">Damaged Service</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="dstype0" name="dstype0" placeholder="">
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col3">
                                                    <label for="nic">Estimated Value</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="number" id="dsev0" name="dsev0" placeholder="0" class="dsev">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <button type="button" name="removeds" class="form-control add removeds" style="background-color:#FC4F4F;color:white;">Remove</button>
                                        </div>


                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div style="margin:auto;">
                                    <button type="button" name="addds" class="form-control add" id="addds" style="background-color: #11468F;color:white;">Add</button>
                                </div>
                            </div>
                            <br>
                            <br>



                            <div class="row">
                                <div class="col2">
                                    <label for="nic"><b>Total Value (Rs)</b></label>
                                </div>
                                <div class="col10">
                                    <input type="text" id="tvser" name="tvser" placeholder="0">
                                </div>
                            </div>

                            <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

                        </div>
                        <div class="tab">



                            <h3 class="text-center">Assessment of Damaged Appliances</h3>
                            <div class="damaged-app">
                                <div class="app">
                                    <div class="row">
                                        <div class="col10">
                                            <div class="row">
                                                <div class="col3">
                                                    <label for="htype">Damaged Equipment</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="text" id="detype0" name="detype0" placeholder="">
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col3">
                                                    <label for="nic">Estimated Value</label>
                                                </div>
                                                <div class="col9">
                                                    <input type="number" id="deev0" name="deev0" placeholder="0" class="deev">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <button type="button" name="removede" class="form-control add removede" style="background-color:#FC4F4F;color:white;">Remove</button>
                                        </div>


                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div style="margin:auto;">
                                    <button type="button" name="addde" class="form-control add" id="addde" style="background-color: #11468F;color:white;">Add</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col2">
                                    <label for="nic"><b>Total Value (Rs)</b></label>
                                </div>
                                <div class="col10">
                                    <input type="text" id="tvde" name="tvde" placeholder="">
                                </div>
                            </div>

                            <br>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic"><b>Total Compensation (Rs)</b></label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="totcomp" name="totcomp" placeholder="0">
                                </div>
                            </div>
                            <!-- <div class="row " style="text-align:right;justify-content: right;">
                                <input type="submit" style="background-color: red;" value="Cancel">
                                <input type="submit" style="background-color: darkblue;" value="Submit">
                            </div> -->

                        </div>

                        <div class="tab">
                            <h3 class="text-center">Bank Details</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Name</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="hname" name="hname" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Bank</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="hbank" name="hbank" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Branch</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="hbranch" name="hbranch" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="nic">Account Number</label>
                                </div>
                                <div class="col9">
                                    <input type="text" id="hacc" name="hacc" placeholder="">
                                </div>
                            </div>

                            <!-- <h3>Upload certified Copies</h3>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Deed</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Home insurance certificate photocopy</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col3">
                                    <label for="TP number">Bank pass book photocopy</label>

                                </div>
                                <div class="col9">
                                    <input type="submit" style="background-color: darkblue;" value="Upload">
                                </div>
                            </div> -->

                        </div>
                    </div>

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="nextBtn" onclick="nextPrev(1)" style="background-color:lightblue">Next</button>
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        </div>



    </section>
    <script>
        var count1 = 1;
        var count2 = 1;
        var count3 = 1;
        var thisPage = "#compensations";
        $(document).ready(function() {
            $("#stats,#alerts").each(function() {
                if ($(this).hasClass('active')) {
                    $(this).removeClass("active");
                }
                $(thisPage).addClass("active");
            });

            // property
            $(document).on('click', '#addprop', function() {
                var html = '';
                html += "<div class='damaged'><div class='row'><div class='col10'><div class='row'><div class='col3'><label for='relationship'>Damaged property</label></div><div class='col9'><select id='dptype" + count1 + "' name='dptype" + count1 + "'><option value='Floor'>Floor</option><option value='Roof'>Roof</option><option value='Wall'>Wall</option><option value='Foundation'>Foundation</option><option value='Paint'>Paint</option><option value='Door'>Door</option><option value='Window'>Window</option></select></div></div>";
                html += " <div class='row'><div class='col3'><label for='relationship'>Description</label></div><div class='col9'><input type='text' id='dpdes" + count1 + "' name='dpdes" + count1 + "' placeholder=''></div></div><div class='row'><div class='col3'><label for='nic'>Total Area</label></div><div class='col9'><input type='text' id='dpta" + count1 + "' name='dpta" + count1 + "' placeholder='0' class='dpta'></div></div>";
                html += " <div class='row'><div class='col3'><label for='nic'>Damaged Area</label></div><div class='col9'><input type='text' id='dpda" + count1 + "' name='dpda" + count1 + "' placeholder='0' class='dpda'></div></div><div class='row'><div class='col3'><label for='nic'>Value of Damage</label></div><div class='col9'><input type='text' id='dpvod" + count1 + "' name='dpvod" + count1 + "' placeholder='' class='dpvod' ></div></div></div>";
                html += "<div class='col2'><button type='button' name='removeprop' class='form-control add removeprop' style='background-color:#FC4F4F;color:white;'>Remove</button></div></div></div>";
                $('.damaged-property').append(html);
                count1++;
            });

            $(document).on('click', '.removeprop', function() {
                $(this).closest('.damaged').remove();
                sumprop();
            });


            // service
            $(document).on('click', '#addds', function() {
                var html = '';
                html += "<div class='service'><div class='row'><div class='col10'>";
                html += "<div class='row'><div class='col3'><label for='htype'>Damaged Service</label></div><div class='col9'><input type='text' id='dstype" + count2 + "' name='dstype" + count2 + "' placeholder=''></div></div>";
                html += "<div class='row'><div class='col3'><label for='nic'>Estimated Value</label></div><div class='col9'><input type='number' id='dsev" + count2 + "' name='dsev" + count2 + "' placeholder='0' class='dsev'></div></div></div>";
                html += " <div class='col2'><button type='button' name='removeds' class='form-control add removeds' style='background-color:#FC4F4F;color:white;'>Remove</button></div></div></div>";
                $('.damaged-service').append(html);
                count2++;
            });

            $(document).on('click', '.removeds', function() {
                $(this).closest('.service').remove();
                sumdsev();
            });

            // equipment
            $(document).on('click', '#addde', function() {
                var html = '';
                html += "<div class='app'><div class='row'><div class='col10'>";
                html += "<div class='row'><div class='col3'><label for='htype'>Damaged Equipment</label></div><div class='col9'><input type='text' id='detype" + count3 + "' name='detype" + count3 + "' placeholder=''></div></div>";
                html += "<div class='row'><div class='col3'><label for='nic'>Estimated Value</label></div><div class='col9'><input type='number' id='deev" + count3 + "' name='deev" + count3 + "' placeholder='0' class='deev'></div></div>";
                html += "</div><div class='col2'><button type='button' name='removede' class='form-control add removede' style='background-color:#FC4F4F;color:white;'>Remove</button></div></div></div>";
                $('.damaged-app').append(html);
                count3++;
            });

            $(document).on('click', '.removede', function() {
                $(this).closest('.app').remove();
                sumev();
            });


            // $(".deev").on("input", function() {
            //     console.log("werwer");
            // $one=($this).id();
            // $("#result").text($(this).val());
            // $sum = 0;
            // $("input[id^='deev']").each(function() {
            //     console.log("asdfasdfasfadsfadfasdfdsf");
            //     $sum += parseFloat($(this).val());

            // });
            // console.log($sum);
            // $("#tvde").val($sum);
            // caltot();
            // });

            $(".deev").each(function() {
                $('.damaged-app').on('input', this, function() {
                    sumev();
                });
            });

            $(".dsev").each(function() {
                $('.damaged-service').on('input', this, function() {
                    sumdsev();

                });
            });

            $(".dpvod").each(function() {
                $('.damaged-property').on('input', this, function() {
                    sumprop();

                });
            });


        });

        function sumev() {
            $sum = 0;
            // $sum += parseFloat($(this).val());
            $(".deev").each(function() {
                if ($(this).val() != NaN) {
                    $sum += parseFloat($(this).val());
                }
                console.log($sum);
                $("#tvde").val($sum);
            });
            caltot();
        }

        function sumdsev() {
            $sum2 = 0;
            // $sum += parseFloat($(this).val());
            $(".dsev").each(function() {
                if ($(this).val() != NaN) {
                    $sum2 += parseFloat($(this).val());
                }
                console.log($sum2);
                $("#tvser").val($sum2);
            });
            caltot();
        }

        function sumprop() {
            $sum3 = 0;
            // $sum += parseFloat($(this).val());

            $(".dpvod").each(function() {
                if ($(this).val() != NaN) {
                    $sum3 += parseFloat($(this).val());
                }
                console.log($sum3);
                $("#tvprop").val($sum3);
            });
            caltot();
        }



        //calculate total


        function caltot() {
            $tot = 0;
            $p = parseFloat($("#tvprop").val());
            $s = parseFloat($("#tvser").val());
            $e = parseFloat($("#tvde").val());
            if (!isNaN($p)) {
                $tot += $p;
            }
            if (!isNaN($s)) {
                $tot += $s;
            }
            if (!isNaN($e)) {
                console.log("e");
                console.log($e);
                $tot += $e;
            }


            $("#totcomp").val(($tot).toFixed(2));
        }

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
            fixStepIndicator(n)
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
                    if (key.startsWith('ds') || key.startsWith('dp') || key.startsWith('de')) {
                        return;
                    }
                    object[key] = value;
                });
                // let e = document.getElementById("safeHouseId");
                // let safeHouseId = e.value;
                // object['safeHouseId'] = safeHouseId;
                object['property'] = new Object();
                object['equipment'] = new Object();
                object['service'] = new Object();
                count1 = 0;
                count2 = 0;
                count3 = 0;
                $('.damaged-property .damaged').each(function() {
                    // console.log("asdfasdfasfadsfadfasdfdsf");

                    // "dptype":"Floor","dpdes":"","dprpf":"","dpta":"","dpda":"","dppercentage":"","dpvod":""
                    var h = {};
                    h['dptype'] = $(this).find("select[id^='dptype']").val();
                    h['dpdes'] = $(this).find("input[id^='dpdes']").val();

                    h['dpta'] = $(this).find("input[id^='dpta']").val();
                    h['dpda'] = $(this).find("input[id^='dpda']").val();
                    h['dpvod'] = $(this).find("input[id^='dpvod']").val();
                    object['property'][count1++] = h;
                });
                $('.damaged-service .service').each(function() {
                    // console.log("asdfasdfasfadsfadfasdfdsf");

                    var h2 = {};
                    h2['dstype'] = $(this).find("input[id^='dstype']").val();
                    h2['dsev'] = $(this).find("input[id^='dsev']").val();

                    object['service'][count2++] = h2;
                });
                $('.damaged-app .app').each(function() {
                    // console.log("asdfasdfasfadsfadfasdfdsf");

                    // "dptype":"Floor","dpdes":"","dprpf":"","dpta":"","dpda":"","dppercentage":"","dpvod":""
                    var h3 = {};
                    h3['detype'] = $(this).find("input[id^='detype']").val();
                    h3['deev'] = $(this).find("input[id^='deev']").val();

                    object['equipment'][count3++] = h3;
                });


                var json = JSON.stringify(object);
                console.log(json);
                $.ajax({
                    type: "POST",
                    url: "<?php echo API; ?>propertycomp",
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