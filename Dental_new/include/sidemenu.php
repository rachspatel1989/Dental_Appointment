<?php $page_id = basename($_SERVER['PHP_SELF']); ?>
<aside id="sidebar_main">
    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="#" class="sSidebar_hide"><img src="assets/img/logo_main.png" alt="" width="200"/></a>
            <a href="#" class="sSidebar_show"><img src="assets/img/logo_main_small.png" alt="" height="32" width="32"/></a>
        </div>
    </div>
    <div class="menu_section">
        <ul>
            <li class="<?php echo ($page_id == "dashboard.php" ? "current_section" : ""); ?>" title="Dashboard">
                <a href="dashboard.php">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>            
            <li class="<?php echo ($page_id == "newcase.php" ? "current_section" : ""); ?>" title="New Patient">
                <a href="newcase.php">
                    <span class="menu_icon"><i class="material-icons">&#xE87C;</i></span>
                    <span class="menu_title">New Patient</span>
                </a>
            </li>
            <li class="<?php echo ($page_id == "viewcase.php" ? "current_section" : ""); ?>" title="Patient List">
                <a href="viewcase.php">
                    <span class="menu_icon"><i class="material-icons">&#xE241;</i></span>
                    <span class="menu_title">Patient List</span>
                </a>
            </li>
<!--            <li class="<?php // echo ($page_id == "appointment.php" ? "current_section" : ""); ?>" title="Book Appointment">
                <a href="appointment.php">
                    <span class="menu_icon"><i class="material-icons">&#xE85C;</i></span>
                    <span class="menu_title">Book Appointment</span>
                </a>                
            </li>
            <li class="<?php // echo ($page_id == "caselist.php" ? "current_section" : ""); ?>" title="View Case">
                <a href="caselist.php">
                    <span class="menu_icon"><i class="material-icons">&#xE24D;</i></span>
                    <span class="menu_title">View Case</span>
                </a>                
            </li>
            <li class="<?php // echo ($page_id == "caselist_followup.php" ? "current_section" : ""); ?>" title="Followup Case">
                <a href="caselist_followup.php">
                    <span class="menu_icon"><i class="material-icons">&#xE8D2;</i></span>
                    <span class="menu_title">Followup Case</span>
                </a>                
            </li>
            <li class="<?php // echo ($page_id == "invoice_list.php" ? "current_section" : ""); ?>" title="Invoice">
                <a href="invoice_list.php">
                    <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                    <span class="menu_title">Invoice</span>
                </a>                
            </li>-->
        </ul>
    </div>
</aside>