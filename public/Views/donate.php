<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | Donate </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/dashboard_component.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/admin_style.css">
    <link rel="stylesheet" href="/<?php echo baseUrl; ?>/public/assets/css/landing_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div id="page-container">
        <?php include 'landing_topnav.php'; ?>
        <div id="page-content">
            <div class="space"></div>
            <h1 class="heading_landing">Fund Raises</h1>
            <div class="container aboutsec">
                <p>lorem ipsum dolor sit amet, consectetur adip
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quas hic id. Consectetur dolore commodi porro perspiciatis asperiores deserunt! Sed magni qui voluptates aliquam temporibus. Quia officia non dolor labore vitae, a ex. Vero ipsum error, accusamus assumenda voluptatem molestiae ipsam doloribus fuga repellat repudiandae reprehenderit earum amet doloremque nam.
                </p>


                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>Assigned User
                                <select id="assigned-user-filter" class="form-control">
                                    <option>None</option>
                                    <option>John</option>
                                    <option>Rob</option>
                                    <option>Larry</option>
                                    <option>Donald</option>
                                    <option>Roger</option>
                                </select>
                            </th>
                            <th>Status
                                <select id="status-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Not Started</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                            </th>
                            <th>Milestone
                                <select id="milestone-filter" class="form-control">
                                    <option>None</option>
                                    <option>Milestone 1</option>
                                    <option>Milestone 2</option>
                                    <option>Milestone 3</option>
                                </select>
                            </th>
                            <th>Priority
                                <select id="priority-filter" class="form-control">
                                    <option>Any</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                    <option>Urgent</option>
                                </select>
                            </th>
                            <th>Tags
                                <select id="tags-filter" class="form-control">
                                    <option>None</option>
                                    <option>Tag 1</option>
                                    <option>Tag 2</option>
                                    <option>Tag 3</option>
                                </select>
                            </th>
                            <th>Search
                                <input type="text" id="search" placeholder="Search" title="Type " class="form-control">
                            </th>
                        </tr>
                    </thead>
                </table>


                <div class="container">
                    <div class="row">
                        <div class="col6">
                            <div class="box row-content">asdwexxxxxxxxxxxxxxxxxrweasdasd <a href="./donate.php" class="donate">Donate</a></div>
                            <div class="box row-content">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>
                            <div class="box row-content">asdwexxxxxxxxxxxxxxxxxrweasdasd</div>
                            <div class="box row-content">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>
                            <div class="box row-content">asdwexxxxxxxxxxxxxxxxxrweasdasd</div>
                            <div class="box row-content">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>

                            <!-- <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div>
                    <div class="box">asdaeeeqqqqqqqqqqqqqqqqqqsdasd</div> -->
                        </div>
                        <div class="col6" style="overflow: auto">
                            <div class="box row-content" style="height:100%;min-height: 300px;">
                                <label for="your_name">Your Name</label>
                                <input type="text" id="your_name" name="yourname" />

                                <label for="your_email">Email Address</label>
                                <input type="email" id="your_email" name="youremail" />

                                <label for="your_phone">Phone Number</label>
                                <input type="tel" id="your_phone" name="yourphone" />
                                <div class="space"></div>
                                <a href="./donate.php" class="donate">Donate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <?php include 'footer.php'; ?>



    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            // Toggle menu on click
            $("#menu-toggler").click(function() {
                toggleBodyClass("menu-active");
            });

            function toggleBodyClass(className) {
                document.body.classList.toggle(className);
            }

        });
    </script>
</body>

</html>