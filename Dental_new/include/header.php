<?php
include_once 'include/DB_Functions.php';
$users = new DB_Functions();

ini_set('max_execution_time', 3000);
$user_id = $_SESSION['user_id'];
$login_id = $_SESSION['user_uniq_id'];
if ($login_id != "") {

    $result_sa = mysql_query("SELECT * from login_master WHERE user_id = '$user_id'");
    $data_sa = mysql_fetch_array($result_sa);
    $user_id = $data_sa['user_id'];
    $user_uname = $data_sa['user_uname'];
    $email_id = $data_sa['email_id'];
} else {
    header("location:index.php");
}
error_reporting(0);
?>
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">

            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                    <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">0</span></a>
                        <div class="uk-dropdown uk-dropdown-xlarge">
                            <div class="md-card-content">
                                <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                    <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (0)</a></li>
                                    <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (0)</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <!--                                <li><a href="page_user_profile.html">My profile</a></li>
                                                                <li><a href="page_settings.html">Settings</a></li>-->
                                <li><a href="include/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_main_search_form">
        <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
        <form class="uk-form">
            <input type="text" class="header_main_search_input" />
            <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
        </form>
    </div>
</header>