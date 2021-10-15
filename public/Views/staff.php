<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> SAHANADARA | Staff </title>
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

            <div class="row">
                <div class="col6">
                    <div class="space"></div>
                    <h1 class="heading_landing">Staff</h1>
                    <div class="container aboutsec">
                        <p>lorem ipsum dolor sit amet, consectetur adip
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quas hic id. Consectetur dolore commodi porro perspiciatis asperiores deserunt! Sed magni qui voluptates aliquam temporibus. Quia officia non dolor labore vitae, a ex. Vero ipsum error, accusamus assumenda voluptatem molestiae ipsam doloribus fuga repellat repudiandae reprehenderit earum amet doloremque nam.
                        </p>
                    </div>
                </div>
                <div class="col6">
                    <div class="space"></div>
                    <div class="staff_bluebox">
                        <h1 class="heading_landing">Welcome </h1>
                        <p>Enter your username and password</p>
                        <div class="row-content">
                            <div class="container">
                                <form action="/<?php echo baseUrl; ?>/Handler/loginHandle?formControl=1" method="post">
                                    <h2>Login</h2>

                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" required />

                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" required />
                                    <br>
                                    <div class="login-bar">
                                        <input type="submit" name="submit" value="Login" class="btn-login" />

                                        <a href="forget" class="forget-password">Forget Password?</a>
                                    </div>
                                </form>
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