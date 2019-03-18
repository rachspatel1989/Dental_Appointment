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

        <!-- kendo UI -->
        <link rel="stylesheet" href="bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
        <link rel="stylesheet" href="bower_components/kendo-ui/styles/kendo.material.min.css"/>
        <!-- uikit -->
        <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

        <!-- flag icons -->
        <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

        <!-- altair admin -->
        <link rel="stylesheet" href="assets/css/main.min.css" media="all">

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
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-large-1-5 uk-width-medium-1-1"></div>
                                <div class="uk-width-large-1-5 uk-width-medium-1-1"></div>
                                <div class="uk-width-large-1-5 uk-width-medium-1-1"></div>
                                <div class="uk-width-large-1-5 uk-width-medium-1-1"></div>
                                <?php
                                $patient_sql = mysql_query("SELECT * FROM case_master");
                                $rows_count = mysql_num_rows($patient_sql);
                                ?>
                                <div class="uk-width-large-1-5 uk-width-medium-1-1" id="app_hide_total">
                                    <div class="uk-input-group"></div>
                                    <h3>Total Patients : <?php echo $rows_count; ?></h3> 
                                </div>                               
                            </div>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
                                    <thead>
                                        <tr>
                                            <th>Case</th>
                                            <th>Name</th>
                                            <th>Birth Date</th>
                                            <th>Age</th>
                                            <th>Gender</th>                                            
                                            <th>Email</th>
                                            <th>Phone#</th>
                                            <th>Address</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        <?php
                                        while ($patient_row = mysql_fetch_array($patient_sql)) {
                                            $case_id = $patient_row['case_id'];
                                            $case_no = $patient_row['case_no'];
                                            $pat_name = $patient_row['pat_name'];
                                            $age = $patient_row['age'];
                                            $dob = $patient_row['dob'];
                                            $sex = $patient_row['sex'];
                                            $email = $patient_row['email'];
                                            $phone = $patient_row['mob_no'];
                                            $address = $patient_row['address'];
                                            ?>  
                                            <tr class="gradeX">
                                                <td><?php echo $case_no ?></td>
                                                <td><?php echo $pat_name ?></td>
                                                <td><?php echo $dob ?></td>
                                                <td><?php echo $age ?></td>
                                                <td><?php echo $sex ?></td>
                                                <td><a data-uk-modal="{target:'#modal_header_footer<?php echo $send_app_id;?>'}"><?php echo $email ?></a></td>
                                                <td><?php echo $phone ?></td>
                                                <td><?php echo $address ?></td>
                                                <td class="uk-text-center">                                                    
                                                    <a href="newcase.php?r_id=<?php echo $case_id ?>" data-uk-tooltip="{pos:'bottom'}" title="Edit"><i class="md-icon material-icons">&#xE254;</i></a>
                                                    <a id="<?php echo $case_id ?>"><i class="material-icons md-24" data-uk-tooltip="{pos:'bottom'}" title="Delete">&#xE872;</i></a>
                                                    <form method="post" action="">
                                                        <div class="uk-width-medium-1-3">
                                                            <div class="uk-modal" id="modal_header_footer<?php echo $send_app_id;?>">
                                                                <div class="uk-modal-dialog">
                                                                    <div class="uk-modal-header">
                                                                        <h3 class="uk-modal-title">Reminder</h3>
                                                                    </div>
                                                                    <div class="uk-grid" data-uk-grid-margin>
                                                                        <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                                                            <div class="uk-input-group">
                                                                                <input type="hidden" name="send_name" value="<?php echo $pat_name;?>"/>
                                                                                <input type="hidden" name="send_date" value="<?php echo $app_date;?>"/>
                                                                                <input type="hidden" name="send_time" value="<?php echo $app_time;?>"/>
                                                                                <input type="hidden" name="send_mailid" value="<?php echo $email;?>"/>
                                                                                <button type="submit" name="btn_app" class="md-btn" style="width: 250px"><i class="uk-input-group-icon uk-icon-clock-o"> &nbsp;&nbsp;Appointment</i></button>
                                                                                <?php
                                                                                if (isset($_POST['btn_app'])) {
                                                                                    $to = $_POST['send_mailid'];
                                                                                    $s_name = $_POST['send_name'];
                                                                                    $s_date = $_POST['send_date'];
                                                                                    $s_time = $_POST['send_time'];
                                                                                    
                                                                                    require 'mailer/Send_Mail.php';
                                                                                    $subject = "Appointment Booked";
                                                                                    $body = 'Hi  ' . $s_name . ' , <br/> <br/> Your appointment booked successfully!<br/> <br/> Your Appointment Date & Time is: ' . $s_date . ' ' . $s_time . '';
                                                                                    Send_Mail($to, $subject, $body);
                                                                                    header("location:caselist_followup.php");
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                                                            <div class="uk-input-group">
                                                                                <button type="button" class="md-btn" style="width: 250px"><i class="uk-input-group-icon uk-icon-calendar"> &nbsp;&nbsp;Follow-up</i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                   
                                                                    <div class="uk-modal-footer uk-text-right">
                                                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
        <!-- ionrangeslider -->
        <script src="bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
        <!-- htmleditor (codeMirror) -->
        <script src="assets/js/uikit_htmleditor_custom.min.js"></script>
        <!-- inputmask-->
        <script src="bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>

        <!--  forms advanced functions -->
        <script src="assets/js/pages/forms_advanced.min.js"></script>    

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