<nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Inventory Manager</span>
    </div>
    <!-- <div class="mid">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div> -->
    <div class="mid">
        <a href="<?php echo HOST; ?>InventoryManager/Inventory/">
            <span class="links_name">Inventory</span>
        </a>
        <a href="<?php echo HOST; ?>InventoryManager/SafeHouse/SafeHouseDetails">
            <span class="links_name">Safe House</span>
        </a>
        <a href="<?php echo HOST; ?>InventoryManager/Notice/Search">
            <span class="links_name">Notice</span>
        </a>
        <a href="<?php echo HOST; ?>InventoryManager/Report/InventoryReport">
            <span class="links_name">Reports</span>
        </a>
    </div>
    <div class="rightcorner">
        <a href="<?php echo HOST; ?>InventoryManager/profile">
            <i class='bx bx-user'></i>
            <span class="links_name">Profile</span>
        </a>
        <a href="<?php echo HOST; ?>logout" style="border: 2px solid rgb(194, 5, 5);">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
        </a>
    </div>
</nav>