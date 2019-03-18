<?php
session_start();
include_once 'include/DB_Functions.php';
$users = new DB_Functions();
include_once './appointment_insert.php';

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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>

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
                <?php
                $app_id = $_GET['r_id'];
                $sql = mysql_query("SELECT * FROM appointment_master WHERE app_id = $app_id");
                $row1 = mysql_fetch_array($sql);
                if ($_GET['r_id']) {
                    $pat_id = $row1['pat_id'];
                    $app_id = $row1['app_id'];

                    $app_date = date('d.m.Y', strtotime($row1['app_date']));

                    $app_time = $row1['app_time'];
                    $app_id = $row1['app_id'];
                    ?>
                <div class="uk-grid data-uk-grid-margin">
                    <div class="uk-width-medium-3-10"></div>
                    <div class="uk-width-medium-4-10">
                        <form id="form_validation" method="post" class="uk-form-stacked" autocomplete="off">
                            <div class="md-card">
                                <div class="md-card-toolbar" style="background: #E4EBF5">
                                    <h3 class="md-card-toolbar-heading-text">
                                        Appointment Form
                                    </h3>
                                </div>
                                <div class="md-card-content">
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-user"></i></span>
                                                <select class="md-input" name="pat_id" required>
                                                    <option value="">-- Select Name --</option>
                                                    <?php
                                                    $patient_sql = mysql_query("SELECT * FROM case_master");
                                                    while ($row = mysql_fetch_array($patient_sql)) {
                                                        ?>
                                                        <option value="<?php echo $row['case_id'] ?>" <?php if ($pat_id == $row['case_id']) { ?> selected="" <?php } ?>  ><?php echo $row['pat_name'] ?></option>    
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Select date</label>
                                                <input  class="md-input" type="text" name="app_date" id="uk_dp_1" value="<?php echo $app_date; ?>" data-uk-datepicker="{format:'DD.MM.YYYY'}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
                                                <select class="md-input" id="app_time" name="app_time" required>
                                                    <option value=""> --Select-- </option>

                                                    <?php
                                                    $starttime = '00:30';  // your start time
                                                    $endtime = '24:00';  // End time
                                                    $duration = '30';  // split by 30 mins

                                                    $array_of_time = array();
                                                    $start_time = strtotime($starttime); //change to strtotime
                                                    $end_time = strtotime($endtime); //change to strtotime

                                                    $add_mins = $duration * 60;

                                                    while ($start_time <= $end_time) { // loop between time
                                                        //echo  $array_of_time = date ("h:i", $start_time); echo "<br/>";
                                                        $t_time = date("H:i:s", $start_time);
                                                        ?> <option value="<?php echo date("H:i", $start_time) ?>" <?php if ($t_time == $app_time) { ?> selected="" <?php } ?> ><?php echo date("H:i", $start_time) ?></option>  <?php
                                                        $start_time += $add_mins; // to check endtie=me
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-grid">
                                                <div class="uk-width-1-4"></div>
                                                <div class="uk-width-1-4"></div>
                                                <div class="uk-width-1-4"></div>
                                                <div class="uk-width-1-4">
                                                    <button type="submit" name="btn-update" id="btn-update" class="md-btn md-btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="uk-width-medium-3-10"></div>
                </div>
                    <?php
                } else {
                    ?>
                <div class="uk-grid data-uk-grid-margin">
                    <div class="uk-width-medium-3-10"></div>
                    <div class="uk-width-medium-4-10">
                        <form id="form_validation" method="post" class="uk-form-stacked" autocomplete="off">
                            <div class="md-card">
                                <div class="md-card-toolbar" style="background: #E4EBF5">
                                    <h3 class="md-card-toolbar-heading-text">
                                        Appointment Form
                                    </h3>
                                </div>
                                <div class="md-card-content">
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-user"></i></span>
                                                <select class="md-input" name="pat_id" required>
                                                    <option value="">-- Select Name --</option>
                                                    <?php
                                                    $patient_sql = mysql_query("SELECT * FROM case_master");
                                                    while ($row = mysql_fetch_array($patient_sql)) {
                                                        ?>
                                                        <option value="<?php echo $row['case_id'] ?>" <?php if ($pat_id == $row['case_id']) { ?> selected="" <?php } ?>  ><?php echo $row['pat_name'] ?></option>    
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Select date</label>
                                                <input  class="md-input target" name="app_date" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
                                                <select class="md-input" id="app_time" name="app_time" required>
                                                    <option value=""> --Select-- </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid data-uk-grid-margin">
                                        <div class="uk-width-medium-1-1 parsley-row">
                                            <div class="uk-grid">
                                                <div class="uk-width-1-4"></div>
                                                <div class="uk-width-1-4"></div>
                                                <div class="uk-width-1-4"></div>
                                                <div class="uk-width-1-4">
                                                    <button type="submit" name="btn-save" id="btn-save" class="md-btn md-btn-primary" style="text-align: center">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="uk-width-medium-3-10"></div>
                </div>
            </div>
            <!--/Registration Form-->
            <?php
        }
        ?>
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

<!-- parsley (validation) -->
<script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
</script>
<script src="bower_components/parsleyjs/dist/parsley.min.js"></script>

<!--  forms validation functions -->
<script src="assets/js/pages/forms_validation.min.js"></script>

<script>

    $(function () {
        // enable hires images
        altair_helpers.retina_images();
        // fastClick (touch devices)
        if (Modernizr.touch) {
            FastClick.attach(document.body);
        }
    });

    $(".target").change(function () {

        var date = $("#uk_dp_1").val();
        var dataString = 'date=' + date;
        $.ajax({
            type: 'POST',
            url: 'adm_controldata.php',
            data: dataString,
            cache: false,
            success: function (data)
            {
                $("#app_time").html(data);
            }});


    });

</script>

</body>
</html>