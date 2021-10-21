<nav class="navbar">
    <div class="logo2"><img src="/<?php echo baseUrl; ?>/public/assets/img/social-care.png" height="40" alt="LOGO"></div>
    <div class="push-left">
        <button id="menu-toggler" data-class="menu-active" class="hamburger">
            <span class="hamburger-line "><i class="fa fa-bars"></i></span>
        </button>

        <!--  Menu compatible with wp_nav_menu  -->
        <ul id="primary-menu" class="menu nav-menu">
            <li class="menu-item current-menu-item"><a class="nav__link" href="/<?php echo baseUrl; ?>/">Home</a></li>
            <!-- <li class="menu-item dropdown"><a class="nav__link" href="#">About</a>
                <ul class="sub-nav">
                    <li><a class="sub-nav__link" href="#">link 1</a></li>
                    <li><a class="sub-nav__link" href="#">link 2</a></li>
                    <li><a class="sub-nav__link" href="#">link 3 - long link - long link - long link</a></li>
                </ul>

            </li> -->

            <li class="menu-item "><a class="nav__link" href="<?php echo HOST; ?>about">About Us</a>
            <li class="menu-item "><a class="nav__link round" href="<?php echo HOST; ?>help">Help </a>
            <li class="menu-item "><a class="nav__link round" href="<?php echo HOST; ?>donate">Donate </a>
            <?php
                $folder = array(
                                    5 => 'Admin',
                                    6 => 'DisasterOfficer',
                                    3 => 'DistrictSecretariat',
                                    4 => 'DivisionalSecretariat',
                                    7 => 'Dmc',
                                    1 => 'GramaNiladari',
                                    2 => 'InventoryManager',
                                    8 => 'ResponsiblePerson'
                                );
                if(isset($_SESSION['key']) && isset($_SESSION['name']) && isset($_SESSION['userRole'])){
                    echo "<li class='menu-item'><a class='nav__link' href='".HOST.$folder[$_SESSION['userRole']]."'>Hi, ".$_SESSION['name']." </a>";
                }else{
                    echo "<li class='menu-item'><a class='nav__link' href='".HOST."staff'>Staff </a>";
                }
            ?>
            </li>
        </ul>
    </div>
</nav>