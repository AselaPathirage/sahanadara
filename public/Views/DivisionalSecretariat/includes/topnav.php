<nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Divisional Secretariat</span>
    </div>
    <!-- <div class="mid">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div> -->
    <div class="mid">
        <a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Dashboard/">
            <span class="links_name">Dashboard</span>
        </a>
        <a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/Report/IncidentReport">
            <span class="links_name">Reports</span>
        </a>
    </div>
    <div class="rightcorner">
        <a href="/<?php echo baseUrl; ?>/DivisionalSecretariat/profile">
            <i class='bx bx-user'></i>
            <span class="links_name">Profile</span>
        </a>
        <a href="/<?php echo baseUrl; ?>/logout" style="border: 2px solid rgb(194, 5, 5);">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
        </a>
    </div>
</nav>