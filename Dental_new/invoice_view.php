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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>

        <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

        <title>Dental</title>

        <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">

        <!-- uikit -->
        <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

        <!-- flag icons -->
        <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

        <!-- altair admin -->
        <link rel="stylesheet" href="assets/css/main.min.css" media="all">
        <link rel="stylesheet" href="assets/css/email.css" />

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
    <input type="hidden" name="userType" id="userType" value=<?php echo $login_type; ?> > 
    <body class=" sidebar_main_open sidebar_main_swipe">
        <!-- main header -->
        <?php include 'include/header.php'; ?>
        <!-- main header end -->
        <!-- main sidebar -->
        <?php include 'include/sidemenu.php'; ?>
        <!-- main sidebar end -->

        <div id="page_content">
            <div id="page_content_inner">
                <?php
                $invoice_id = $_GET['invoice_id'];
                $patient_sql = mysql_query("SELECT * FROM case_master WHERE case_id = '$invoice_id'");
                $patient_row = mysql_fetch_array($patient_sql);
                $pat_name = $patient_row['pat_name'];
                $middle_name = $patient_row['mname'];
                $last_name = $patient_row['lname'];
                $age = $patient_row['age'];
                $dob = $patient_row['dob'];
                $sex = $patient_row['sex'];
                $country = $patient_row['country'];
                $state = $patient_row['state'];
                $city = $patient_row['city'];
                $locality = $patient_row['locality'];
                $landmark = $patient_row['landmark'];
                $zipcode = $patient_row['zipcode'];
                $houseno = $patient_row['houseno'];
                $address = $patient_row['address'];
                ?>

                <div class="uk-width-medium-8-10 uk-container-center reset-print">
                    <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                        <div class="uk-width-large-7-10">
                            <div class="md-card md-card-single main-print" id="invoice">
                                <div id="invoice_preview"></div>
                                <div id="invoice_form"></div>
                            </div>
                        </div>
                        <div class="uk-width-large-3-10 hidden-print uk-visible-large">
                            <div class="md-list-outside-wrapper">
                                <ul class="md-list md-list-outside invoices_list" id="invoices_list">
                                    <li>
                                        <a href="#" class="md-list-content" data-invoice-id="1">                                            
                                        </a>
                                        <label class="heading_list uk-text-upper">Generated Bill</label>
                                    </li> 
                                    <li>
                                        <a href="#" class="md-list-content" data-invoice-id="1">
                                            <span class="md-list-heading uk-text-truncate">
                                                <span class="uk-text-small uk-text-muted"><?php echo $pat_name . " " . $middle_name . " " . $last_name; ?> </span>                                                   
                                            </span>
                                            <!--<span class="uk-text-small uk-text-muted">Tiger Nixon</span>-->
                                        </a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="uk-width-xLarge-3-10  uk-width-large-3-10"></div>-->
    <div class="uk-width-xLarge-6-10  uk-width-large-6-10" style="padding: 10px;background-color: #fff;">
        <div class="md-card-content">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions hidden-print">
                <i class="md-icon material-icons" id="invoice_print">&#xE8ad;</i>
            </div>
            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">
                Invoice 
            </h3>
        </div>            
            <div class="uk-margin-medium-bottom">
                <span class="uk-text-muted uk-text-small uk-text-italic">Date:</span> {{invoice_id.invoice_date}}                
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-small-3-5">
                    <div class="uk-margin-bottom">
                        <span class="uk-text-muted uk-text-small uk-text-italic">From:</span>
                        <address>
                            <p><strong>Dr. Kairavi Buch</strong></p>
                            <p>Ex. Dental Surgeon - SHALBY Hospital</p>
                            <p>PERFECT WHITES DENTAL CLINIC</p>
                        </address>
                    </div>
                    <div class="uk-margin-medium-bottom">
                        <span class="uk-text-muted uk-text-small uk-text-italic">To:</span>
                        <address>
                            <p><strong><?php echo $pat_name . " " . $middle_name . " " . $last_name; ?></strong></p>
                            <p><?php echo $houseno . " " . $address; ?></p>
                            <p><?php echo $city . ", " . $state . ", " . $country . " - " . $zipcode; ?></p>
                        </address>
                    </div>
                </div>
                <div class="uk-width-small-2-5">
                    <span class="uk-text-muted uk-text-small uk-text-italic">Total Amount:</span>
                    <p class="heading_b uk-text-success">INR 3300</p>
                    <p class="uk-text-small uk-text-muted uk-margin-top-remove">Incl. Consultation Charge - INR 300</p>
                </div>
            </div>
            <div class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-1-1">
                    <table class="uk-table">
                        <thead>
                            <tr class="uk-text-upper">
                                <th>Services</th>
                                <th class="uk-text-center">Total Amount</th>
                                <th class="uk-text-right">Total+Consultation</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{#each invoice_id.invoice_services}}
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">Oral Radiology</span><br/>
                                </td>                                
                                <td class="uk-text-center">
                                    {{ service_rate }}
                                </td>                              
                                <td class="uk-text-right">
                                    {{ service_total }}
                                </td>
                            </tr>
                            {{/each}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <p class="uk-text-small">Please pay within {{ invoice_id.invoice_payment_due }} days</p>
                    <br/>
                    <div>
                        <button type="submit" name="btn-save" id="btn-save" class="md-btn md-btn-primary">Paid</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>                                    
                    
                
            </div>
        </div>        

              

        <!-- common functions -->
        <script src="assets/js/common.min.js"></script>
        <!-- uikit functions -->
        <script src="assets/js/uikit_custom.min.js"></script>
        <!-- altair common functions/helpers -->
        <script src="assets/js/altair_admin_common.min.js"></script>

        <!-- page specific plugins -->
        <!-- handlebars.js -->
        <script src="bower_components/handlebars/handlebars.min.js"></script>
        <script src="assets/js/custom/handlebars_helpers.min.js"></script>

        <!--  invoices functions -->
        <script src="assets/js/pages/page_invoices.min.js"></script>

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