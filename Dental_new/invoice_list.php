<?php
session_start();
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
date_default_timezone_set('Asia/Kolkata');
?>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>

        <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

        <title>Dental</title>


        <!-- uikit -->
        <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

        <!-- flag icons -->
        <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

        <!-- altair admin -->
        <link rel="stylesheet" href="assets/css/main.min.css" media="all">

        <!-- matchMedia polyfill for testing media queries in JS -->
        <!--[if lte IE 9]>
            <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
            <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <![endif]-->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(window).load(function () {
                $(".loader").hide();
            })
        </script>
        <style type="text/css">
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 999999;
                /*opacity: 0.9;*/                    
                background: url('loader.gif') 50% 50% no-repeat #fff;
                overflow-x: hidden;
            }
        </style>
    </head>
    <div class="loader"></div>
    <body class=" sidebar_main_open sidebar_main_swipe">
        <!--header start-->
        <?php include './include/header.php'; ?>
        <!--header end-->
        <!--sidebar start-->
        <?php include './include/sidemenu.php'; ?>
        <!--sidebar end-->

        <div id="page_content">
            <div id="page_content_inner">

                <div id="page_heading" style="background: #E4EBF5" data-uk-sticky="{ top: 48, media: 960 }">
                    <h1>Patient List</h1>
                </div>                
                <div id="page_content_inner">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
                                    <thead>
                                        <tr>
                                            <th>Case</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Email ID</th>
                                            <th>Phone#</th>
                                            <th>Address</th>
                                            <th>Followup Date</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        <?php
                                        $cur_date = date('Y-m-d');
                                        $patient_sql = mysql_query("SELECT * FROM case_master INNER JOIN advice_master ON case_master.case_id = advice_master.case_id WHERE advice_master.next_visit >= CURDATE() AND case_master.status = 1 ORDER BY case_master.case_id DESC");
                                        while ($patient_row = mysql_fetch_array($patient_sql)) {
                                            $case_id = $patient_row['case_id'];
                                            $case_no = $patient_row['case_no'];
                                            $pat_name = $patient_row['pat_name'];
                                            $age = $patient_row['age'];
                                            $dob = $patient_row['next_visit'];
                                            $sex = $patient_row['sex'];
                                            $email = $patient_row['email'];
                                            $phone = $patient_row['mob_no'];
                                            $address = $patient_row['address'];
                                            $app_time = $patient_row['app_time'];
                                            $app_date = $patient_row['app_date'];
                                            $send_app_id = $patient_row['app_id'];
                                            ?>  
                                            <tr class="gradeX">
                                                <td><?php echo $case_no ?></td>
                                                <td><a href="casefile_followup.php?r_id=<?php echo $case_id ?>" data-uk-tooltip="{pos:'bottom'}" title="View Case"><?php echo $pat_name ?></a></td>
                                                <td><?php echo $age ?></td>
                                                <td><?php echo $sex ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $phone ?></td>
                                                <td><?php echo $address ?></td>
                                                <td><?php echo $dob ?></td>                                                
                                                <td class="uk-text-center">
                                                    <a href="invoice_view.php?invoice_id=<?php echo $case_id ?>" data-uk-tooltip="{pos:'bottom'}" title="Generate Bill" class="md-btn"><i class="uk-input-group-icon uk-icon-dollar"> &nbsp;&nbsp;Generate Bill</i></a>
                                                </td>                                                    
                                            </tr>
                                            <?php
                                        }
                                        ?>                                 
                                    </tbody>                                    
                                </table>
                            </div>
                            <ul class="uk-pagination ts_pager">
                                <li data-uk-tooltip title="Select Page">
                                    <select class="ts_gotoPage ts_selectize"></select>
                                </li>
                                <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                                <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                                <li><span class="pagedisplay"></span></li>
                                <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                                <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                                <li data-uk-tooltip title="Page Size">
                                    <select class="pagesize ts_selectize">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--footer start-->
                <?php include 'include/footer.php'; ?>
                <!--footer end-->

                <!--sideop start-->
                <?php include 'include/sideop.php'; ?>
                <!--sideop end-->
            </div>
        </div>

        <!-- common functions -->
        <script src="assets/js/common.min.js"></script>
        <!-- uikit functions -->
        <script src="assets/js/uikit_custom.min.js"></script>
        <!-- altair common functions/helpers -->
        <script src="assets/js/altair_admin_common.min.js"></script>

        <!-- page specific plugins -->
        <!-- tablesorter -->
        <script src="bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
        <script src="bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
        <script src="bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
        <script src="bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

        <!--  issues list functions -->
        <script src="assets/js/pages/pages_issues.min.js"></script>

        <script>
            $(function () {
                // enable hires images
                altair_helpers.retina_images();
                // fastClick (touch devices)
                if (Modernizr.touch) {
                    FastClick.attach(document.body);
                }
            });
        </script>
    </body>
</html>