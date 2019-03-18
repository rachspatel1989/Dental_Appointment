<?php
session_start();
include_once 'include/DB_Functions.php';
$users = new DB_Functions();
include_once './case_insert.php';
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


$case_id = $_GET['r_id'];
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

        <!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->

<!--        <script type="text/javascript">
            $(function () {
                //$("#radiology :input").attr("disabled", false);
                $('#oralradiology').click(function () {
                    this.checked ? $("#radiology :input").attr("disabled", true) : $("#radiology :input").attr("disabled", false);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#opathology').hide();
                $('#oralpathology').click(function () {
                    this.checked ? $('#opathology').show() : $('#opathology').hide();
                });
            });
        </script>-->
<!--        <style type="text/css">
            .mobile_view
            {
                display: none;
            }
            @media only screen and (max-width: 500px) 
            {
                .desktop_view
                {
                    display: none;
                }
                .mobile_view
                {
                    display: block;
                }                
            }            
        </style>-->
        
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
            <?php
            $case_id = $_GET['r_id'];
            $patient_sql = mysql_query("SELECT * FROM case_master WHERE case_id = $case_id");
            $patient_row = mysql_fetch_array($patient_sql);
            $case_no = $patient_row['case_no'];
            $pat_name = $patient_row['pat_name'];
            $age = $patient_row['age'];
            $dob = $patient_row['dob'];
            $sex = $patient_row['sex'];
            $address = $patient_row['address'];
            $tel_no = $patient_row['tel_no'];
            $mob_no = $patient_row['mob_no'];
            $email = $patient_row['email'];
            $profession = $patient_row['profession'];
            $office_addr = $patient_row['office_addr'];
            $office_no = $patient_row['office_no'];
            $ref_by = $patient_row['ref_by'];
            $blood_group = $patient_row['blood_group'];
            $diabetes = $patient_row['diabetes'];
            $drug_reaction = $patient_row['drug_reaction'];
            $allergy = $patient_row['allergy'];
            $pregnancy = $patient_row['pregnancy'];
            $aspirin = $patient_row['aspirin'];
            $heart = $patient_row['heart'];
            $blood_pressure = $patient_row['blood_pressure'];
            $acidity = $patient_row['acidity'];
            $other = $patient_row['other'];
            $family_doc = $patient_row['family_doc'];
            $family_doc_contact = $patient_row['family_doc_contact'];
            $created_date = $patient_row['creation_date'];
            ?>
            <div id="page_heading">
                <h1 id="product_edit_name">Patient Case File</h1>
                <span class="uk-text-muted uk-text-upper uk-text-small" id="product_edit_sn"><b>CASE NO : <?php echo $case_no; ?></b></span>
            </div>
            
            <div id="page_content_inner">
                <form action="" method="post" class="uk-form-stacked" id="product_edit_form" enctype="multipart/form-data">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                        <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                            <input type="hidden" name="case_id" value="<?php echo $case_id; ?>">        
                            <div class="md-card">
                                <div class="md-card-toolbar" style="background: #E4EBF5">
                                    <h3 class="md-card-toolbar-heading-text">
                                        Patient Information
                                    </h3>
                                </div>
                                <div class="md-card-content">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Name</span>
                                                <span class="md-list-heading uk-text-large uk-text-success"><?php echo $pat_name; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Gender</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $sex; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Birth Date</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $dob; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Age</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $age; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Phone No</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $mob_no; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Email Address</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $email; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Profession</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $profession; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Other No</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $tel_no; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Referred By</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $ref_by; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Physician Name</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $family_doc; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Physician No</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $family_doc_contact; ?></span>
                                            </div>
                                        </li>                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="md-card">
                                <div class="md-card-toolbar" style="background: #E4EBF5">
                                    <h3 class="md-card-toolbar-heading-text">
                                        Medical History
                                    </h3>
                                </div>
                                <div class="md-card-content">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Blood Group</span>
                                                <span class="md-list-heading uk-text-large"><?php echo $blood_group; ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Diabetes</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($diabetes == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $diabetes;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Drug Reaction</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($drug_reaction == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $drug_reaction;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Allergy</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($allergy == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $allergy;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Pregnancy</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($pregnancy == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $pregnancy;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Aspirin</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($aspirin == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $aspirin;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Heart Problem</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($heart == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $heart;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Blood Pressure</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($blood_pressure == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $blood_pressure;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Acidity</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($acidity == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $acidity;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="md-list-content">
                                                <span class="uk-text-small uk-text-muted uk-display-block">Other Problems</span>
                                                <span class="md-list-heading uk-text-large"><?php
                                                    if ($other == "") {
                                                        echo 'No';
                                                    } else {
                                                        echo $other;
                                                    }
                                                    ?></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                            <div class="md-card">
                                <div class="md-card-toolbar" style="background: #E4EBF5">
                                    <h3 class="md-card-toolbar-heading-text">
                                        Services
                                    </h3>
                                </div>
                                <div class="md-card-content large-padding">
                                    <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                        <div class="uk-width-large-1-1">
                                            <span class="icheck-inline">
                                                <input id="oralradiology" type="checkbox" name="oralradiology" value="Yes" data-md-icheck/>
                                                <label for="oralradiology" class="inline-label">ORAL RADIOLOGY</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="oralpathology" name="oralpathology" value="Yes" data-md-icheck />
                                                <label for="oralpathology" class="inline-label">ORAL PATHOLOGY</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="tobaccoprogram" name="tobaccoprogram" value="Yes" data-md-icheck />
                                                <label for="tobaccoprogram" class="inline-label">TOBACCO CESSATION PROGRAM</label>
                                            </span>                                                
                                        </div>
                                    </div>
                                </div>
                            </div><br/>    
                            <div id="radiology">
                                <div class="md-card">
                                    <div class="md-card-toolbar" style="background: #E4EBF5">
                                        <h3 class="md-card-toolbar-heading-text">
                                            ORAL RADIOLOGY
                                        </h3>
                                    </div>
                                    <div class="md-card-content large-padding">
                                        <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                            <div class="uk-width-large-1-3">
                                                <span class="uk-form-help-block" style="font-size: 15px">3D Diagnostic Services</span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="sectional" name="sectional" value="Yes" data-md-icheck />
                                                    <label for="sectional" class="inline-label">SECTIONAL CBCT(5 x 5/ 8 x 5)</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="maxilla" name="maxilla" value="Yes" data-md-icheck />
                                                    <label for="maxilla" class="inline-label">CBCT OF MAXILLA(8 x 8)</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="mandible" name="mandible" value="Yes" data-md-icheck />
                                                    <label for="mandible" class="inline-label">CBCT OF MANDIBLE(11 x 5)</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="both_jaws" name="both_jaws" value="Yes" data-md-icheck />
                                                    <label for="both_jaws" class="inline-label">CBCT OF BOTH JAWS(11 x 8)</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="sinus_view" name="sinus_view" value="Yes" data-md-icheck />
                                                    <label for="sinus_view" class="inline-label">SINUS VIEW</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="tmj" name="tmj" value="Yes" data-md-icheck />
                                                    <label for="tmj" class="inline-label">CBCT OF TMJ(RIGHT/LEFT/BOTH)</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="middle_view" name="middle_view" value="Yes" data-md-icheck />
                                                    <label for="middle_view" class="inline-label">MIDDLE EAR VIEW</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="airway" name="airway" value="Yes" data-md-icheck />
                                                    <label for="airway" class="inline-label">AIR WAY ANALYSIS</label>
                                                </span>
                                            </div>
                                            <div class="uk-width-large-1-3">
                                                <span class="uk-form-help-block" style="font-size: 15px">2D Diagnostic Services</span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="opg" name="opg" value="Yes" data-md-icheck />
                                                    <label for="opg" class="inline-label">OPG</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="lat_cepal" name="lat_cepal" value="Yes" data-md-icheck />
                                                    <label for="lat_cepal" class="inline-label">PA MANDIBLE/SKULL VIEW</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="pa_mandible" name="pa_mandible" value="Yes" data-md-icheck />
                                                    <label for="pa_mandible" class="inline-label">SUBMENTOVERTEX VIEW</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="subment_view" name="subment_view" value="Yes" data-md-icheck />
                                                    <label for="subment_view" class="inline-label">LATERAL CEPHALOGRAM</label>
                                                </span><br/>                                            
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="tmj_view" name="tmj_view" value="Yes" data-md-icheck />
                                                    <label for="tmj_view" class="inline-label">TMJ VIEW</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="water_view" name="water_view" value="Yes" data-md-icheck />
                                                    <label for="water_view" class="inline-label">WATER VIEW</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="hand_wrist" name="hand_wrist" value="Yes" data-md-icheck />
                                                    <label for="hand_wrist" class="inline-label">HAND WRIST RADIOGRAPH</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="town_view" name="town_view" value="Yes" data-md-icheck />
                                                    <label for="town_view" class="inline-label">REVERSE TOWN VIEW</label>
                                                </span>
                                            </div>
                                            <div class="uk-width-large-1-3">
                                                <span class="uk-form-help-block" style="font-size: 15px">For</span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="implant" name="implant" value="Yes" data-md-icheck />
                                                    <label for="implant" class="inline-label">IMPLANT</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="pathology" name="pathology" value="Yes" data-md-icheck />
                                                    <label for="pathology" class="inline-label">PATHOLOGY</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="root_canal" name="root_canal" value="Yes" data-md-icheck />
                                                    <label for="root_canal" class="inline-label">ROOT CANAL</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="bone_loss" name="bone_loss" value="Yes" data-md-icheck />
                                                    <label for="bone_loss" class="inline-label">BONE LOSS</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="impacted" name="impacted" value="Yes" data-md-icheck />
                                                    <label for="impacted" class="inline-label">IMPACTED</label>
                                                </span><br/>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="third_molar" name="third_molar" value="Yes" data-md-icheck />
                                                    <label for="third_molar" class="inline-label">THIRD MOLAR</label>
                                                </span>                                            
                                            </div>
                                            <div class="uk-width-large-1-1">
                                                <div class="uk-form-row">
                                                     
                                                     <table  class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
                                                         <thead>
                                                              <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="desktop_view">
                                                                    <td> <h3> Prosthetic: </h3>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                            <div class="parsley-row">
                                                                               <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_implant'}" class=""> 
                                                                                   <label style="color: #000;"> i. Implant</label>  
                                                                               </a>
                                                                               <input type="text" readonly="" name="prosthetic1" id="implate" class="md-input" />
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_bridge'}" class=""> <label style="color: #000;"> ii. Bridge</label> </a>
                                                                            <input type="text" readonly="" name="prosthetic2" id="bridge" class="md-input" />
                                                                        </div>
                                                                        </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_cd_pd'}" class="">  <label style="color: #000;">  iii. C.D / P.D.</label> </a>
                                                                            <input type="text" readonly="" name="prosthetic3" id="cd_pd" class="md-input" />
                                                                        </div>
                                                                        </div>
                                                                        
                                                                        <?php /* i. Implant <div class="uk-width-large-1-1">  <input  class="md-input" name="" type="text"> </div>  <br>
                                                                            ii. Bridge <br/>
                                                                            iii. C.D / P.D.  */  ?>
                                                                    </td>
                                                                    
                                                                    <td> <h3> Operative: </h3>
                                                                            
                                                                        <div class="uk-width-medium-1-3">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_filling'}" class=""> <label style="color: #000;"> i. Filling</label> </a>
                                                                                    <input type="text" readonly="" name="operative1" id="filling" class="md-input" />
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_endodontic'}" class=""> <label style="color: #000;"> ii. Endodontic</label> </a>
                                                                                    <input type="text" readonly="" name="operative2" id="endodontic" class="md-input" />
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_crown'}" class=""> <label style="color: #000;"> iii. Crown</label> </a>
                                                                                    <input type="text" readonly="" name="operative3" id="crown" class="md-input" />
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        
                                                                        <?php /*  i. Filling <br/>
                                                                            ii. Endodontic <br/>
                                                                            iii. Crown */ ?> 
                                                                    </td>
                                                                    
                                                                    <td> <h3> Periodontia: </h3>
                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                        <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_scaling'}" class=""> <label style="color: #000;"> i. Scaling</label> </a>
                                                                                        <input type="text" readonly="" name="periodontia1" id="scaling" class="md-input" />
                                                                                    </div>
                                                                            </div>

                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                        <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_surgical'}" class=""> <label style="color: #000;"> ii. Surgical</label> </a>
                                                                                        <input type="text" readonly="" name="periodontia2" id="surgical" class="md-input" />
                                                                                    </div>
                                                                            </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3" style="height: 60px;">  

                                                                            
                                                                        </div>
                                                                       <?php /* i. Scaling <br/>
                                                                            ii. Surgical  */?>
                                                                             
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                                <tr class="desktop_view">
                                                                    <td> <h3> Oral Surgery: </h3>
                                                                            
                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                       <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_extraction'}" class="">  <label style="color: #000;"> i. Extraction</label> </a>
                                                                                       <input type="text" readonly="" name="oral_surgery1" id="extraction" class="md-input" />
                                                                                    </div>
                                                                            </div>
                                                                        
                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                        <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_other_surgical'}" class=""> <label style="color: #000;"> ii. Other Surgical Procedure</label> </a>
                                                                                        <input type="text" readonly="" name="oral_surgery2" id="other_surgical" class="md-input" />
                                                                                    </div>
                                                                            </div>    
                                                                        
                                                                           <?php /* i. Extraction <br/>
                                                                            ii. Other Surgical Procedure  */ ?>
                                                                    </td>
                                                                    
                                                                    <td> <h3> Cosmetic: </h3>
                                                                          <div class="uk-width-medium-1-3">
                                                                               <div class="parsley-row">
                                                                                  <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_teeth_whitening'}" class=""> <label style="color: #000;">  i. Teeth whitening or Veneer</label> </a>
                                                                                  <input type="text" readonly="" name="cosmetic1" id="teeth_whitening" class="md-input" />
                                                                               </div>
                                                                           </div> 
                                                                        <div class="uk-width-medium-1-3" style="height: 60px;">  

                                                                            
                                                                        </div>
                                                                       
                                                                    </td>
                                                                    
                                                                    <td> <h3> Radiology: </h3>
                                                                            <div class="uk-width-medium-1-3">
                                                                               <div class="parsley-row">
                                                                                 <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_intra_oral'}" class=""> <label style="color: #000;">  i.Intra Oral</label> </a>
                                                                                 <input type="text" readonly="" name="radiology1" id="intra_oral" class="md-input" />
                                                                               </div>
                                                                           </div>
                                                                        
                                                                            <div class="uk-width-medium-1-3">
                                                                               <div class="parsley-row">
                                                                                 <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_extra_oral'}" class="">  <label style="color: #000;">  ii.Extra Oral</label> </a>
                                                                                 <input type="text"  readonly="" name="radiology2" id="extra_oral" class="md-input" />
                                                                               </div>
                                                                           </div>
                                                                            <?php /* i. Intra Oral <br/>
                                                                            ii. Extra Oral */ ?>
                                                                    </td>
                                                                    
                                                                </tr>
<!--Mobile View Start-->
<!--                                                                <tr class="mobile_view">
                                                                    <td> <h3> Prosthetic: </h3>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                            <div class="parsley-row">
                                                                               <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_implant'}" class=""> 
                                                                                   <label style="color: #000;"> i. Implant</label>  
                                                                               </a>
                                                                               <input type="text" readonly="" name="prosthetic1" id="implate" class="md-input" />
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_bridge'}" class=""> <label style="color: #000;"> ii. Bridge</label> </a>
                                                                            <input type="text" readonly="" name="prosthetic2" id="bridge" class="md-input" />
                                                                        </div>
                                                                        </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_cd_pd'}" class="">  <label style="color: #000;">  iii. C.D / P.D.</label> </a>
                                                                            <input type="text" readonly="" name="prosthetic3" id="cd_pd" class="md-input" />
                                                                        </div>
                                                                        </div>
                                                                        
                                                                        <?php /* i. Implant <div class="uk-width-large-1-1">  <input  class="md-input" name="" type="text"> </div>  <br>
                                                                            ii. Bridge <br/>
                                                                            iii. C.D / P.D.  */  ?>
                                                                    </td>
                                                                    
                                                                    <td> <h3> Operative: </h3>
                                                                            
                                                                        <div class="uk-width-medium-1-3">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_filling'}" class=""> <label style="color: #000;"> i. Filling</label> </a>
                                                                                    <input type="text" readonly="" name="operative1" id="filling" class="md-input" />
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_endodontic'}" class=""> <label style="color: #000;"> ii. Endodontic</label> </a>
                                                                                    <input type="text" readonly="" name="operative2" id="endodontic" class="md-input" />
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_crown'}" class=""> <label style="color: #000;"> iii. Crown</label> </a>
                                                                                    <input type="text" readonly="" name="operative3" id="crown" class="md-input" />
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        
                                                                        <?php /*  i. Filling <br/>
                                                                            ii. Endodontic <br/>
                                                                            iii. Crown */ ?> 
                                                                    </td>
                                                                    
                                                                    
                                                                    
                                                                </tr>-->
<!--                                                                <tr class="mobile_view">
                                                                    <td> <h3> Periodontia: </h3>
                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                        <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_scaling'}" class=""> <label style="color: #000;"> i. Scaling</label> </a>
                                                                                        <input type="text" readonly="" name="periodontia1" id="scaling" class="md-input" />
                                                                                    </div>
                                                                            </div>

                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                        <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_surgical'}" class=""> <label style="color: #000;"> ii. Surgical</label> </a>
                                                                                        <input type="text" readonly="" name="periodontia2" id="surgical" class="md-input" />
                                                                                    </div>
                                                                            </div>
                                                                        
                                                                        <div class="uk-width-medium-1-3" style="height: 60px;">  

                                                                            
                                                                        </div>
                                                                       <?php /* i. Scaling <br/>
                                                                            ii. Surgical  */?>
                                                                             
                                                                    </td>
                                                                    <td> <h3> Oral Surgery: </h3>
                                                                            
                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                       <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_extraction'}" class="">  <label style="color: #000;"> i. Extraction</label> </a>
                                                                                       <input type="text" readonly="" name="oral_surgery1" id="extraction" class="md-input" />
                                                                                    </div>
                                                                            </div>
                                                                        
                                                                            <div class="uk-width-medium-1-3">
                                                                                    <div class="parsley-row">
                                                                                        <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_other_surgical'}" class=""> <label style="color: #000;"> ii. Other Surgical Procedure</label> </a>
                                                                                        <input type="text" readonly="" name="oral_surgery2" id="other_surgical" class="md-input" />
                                                                                    </div>
                                                                            </div>    
                                                                        
                                                                           <?php /* i. Extraction <br/>
                                                                            ii. Other Surgical Procedure  */ ?>
                                                                    </td>
                                                                </tr>-->
<!--                                                                <tr class="mobile_view">                                                                    
                                                                    
                                                                    <td> <h3> Cosmetic: </h3>
                                                                          <div class="uk-width-medium-1-3">
                                                                               <div class="parsley-row">
                                                                                  <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_teeth_whitening'}" class=""> <label style="color: #000;">  i. Teeth whitening or Veneer</label> </a>
                                                                                  <input type="text" readonly="" name="cosmetic1" id="teeth_whitening" class="md-input" />
                                                                               </div>
                                                                           </div> 
                                                                        <div class="uk-width-medium-1-3" style="height: 60px;">  

                                                                            
                                                                        </div>
                                                                       
                                                                    </td>
                                                                    
                                                                    <td> <h3> Radiology: </h3>
                                                                            <div class="uk-width-medium-1-3">
                                                                               <div class="parsley-row">
                                                                                 <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_intra_oral'}" class=""> <label style="color: #000;">  i.Intra Oral</label> </a>
                                                                                 <input type="text" readonly="" name="radiology1" id="intra_oral" class="md-input" />
                                                                               </div>
                                                                           </div>
                                                                        
                                                                            <div class="uk-width-medium-1-3">
                                                                               <div class="parsley-row">
                                                                                 <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_extra_oral'}" class="">  <label style="color: #000;">  ii.Extra Oral</label> </a>
                                                                                 <input type="text"  readonly="" name="radiology2" id="extra_oral" class="md-input" />
                                                                               </div>
                                                                           </div>
                                                                            <?php /* i. Intra Oral <br/>
                                                                            ii. Extra Oral */ ?>
                                                                    </td>
                                                                    
                                                                </tr>-->
<!--Mobile View End-->
                                                            </tbody>
                                                     </table>
                                                     
                                                </div>  
                                                
                                                <div class="uk-modal" id="modal_implant">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','implate')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','implate')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','implate')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','implate')">
                                                        
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','implate')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','implate')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','implate')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','implate')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','implate')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','implate')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','implate')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','implate')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','implate')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','implate')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>        
                                                   
                                               
                                                <div class="uk-modal" id="modal_bridge">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                 <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','bridge')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','bridge')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','bridge')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','bridge')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','bridge')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','bridge')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','bridge')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','bridge')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','bridge')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','bridge')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','bridge')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','bridge')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','bridge')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','bridge')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','bridge')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','bridge')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','bridge')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','bridge')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','bridge')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','bridge')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','bridge')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','bridge')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','bridge')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','bridge')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','bridge')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','bridge')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','bridge')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','bridge')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','bridge')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','bridge')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','bridge')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','bridge')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                



                                                
                                                    <div class="uk-modal" id="modal_implant">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','implate')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','implate')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','implate')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','implate')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','implate')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','implate')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','implate')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','implate')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','implate')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','implate')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','implate')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','implate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','implate')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','implate')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','implate')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','implate')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','implate')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','implate')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','implate')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_cd_pd">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','cd_pd')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','cd_pd')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','cd_pd')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','cd_pd')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','cd_pd')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','cd_pd')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','cd_pd')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','cd_pd')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','cd_pd')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-modal" id="modal_filling">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','filling')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','filling')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','filling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','filling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','filling')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','filling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','filling')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','filling')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','filling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','filling')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','filling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','filling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','filling')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','filling')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','filling')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','implate')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','filling')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','filling')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','filling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','filling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','filling')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','filling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','filling')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','filling')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','filling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','filling')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','filling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','filling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','filling')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','filling')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','filling')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','filling')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_endodontic">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','endodontic')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','endodontic')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','endodontic')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','endodontic')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','endodontic')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','endodontic')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','endodontic')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','endodontic')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','endodontic')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                              <div class="uk-modal" id="modal_crown">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','crown')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','crown')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','crown')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','crown')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','crown')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','crown')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','crown')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','crown')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','crown')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','crown')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','crown')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','crown')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','crown')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','crown')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','crown')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','crown')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','crown')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','crown')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','crown')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','crown')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','crown')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','crown')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','crown')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','crown')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','crown')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','crown')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','crown')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','crown')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','crown')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','crown')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','crown')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','crown')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-modal" id="modal_scaling">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','scaling')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','scaling')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','scaling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','scaling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','scaling')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','scaling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','scaling')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','scaling')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','scaling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','scaling')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','scaling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','scaling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','scaling')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','scaling')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','scaling')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','scaling')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','scaling')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','scaling')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','scaling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','scaling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','scaling')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','scaling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','scaling')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','scaling')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','scaling')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','scaling')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','scaling')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','scaling')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','scaling')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','scaling')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','scaling')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','scaling')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="uk-modal" id="modal_surgical">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','surgical')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','surgical')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','surgical')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','surgical')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','surgical')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','surgical')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','surgical')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','surgical')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','surgical')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','surgical')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','surgical')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','surgical')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','surgical')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','surgical')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','surgical')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','surgical')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','surgical')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','surgical')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','surgical')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','surgical')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_extraction">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','extraction')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','extraction')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','extraction')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','extraction')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','extraction')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','extraction')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','extraction')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','extraction')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','extraction')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','extraction')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','extraction')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','extraction')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','extraction')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','extraction')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','extraction')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','extraction')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','extraction')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','extraction')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','extraction')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','extraction')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','extraction')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','extraction')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','extraction')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','extraction')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','extraction')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','extraction')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','extraction')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','extraction')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','extraction')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','extraction')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','extraction')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','extraction')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_other_surgical">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','other_surgical')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','other_surgical')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','other_surgical')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','other_surgical')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','other_surgical')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','other_surgical')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','other_surgical')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','other_surgical')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','other_surgical')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>



                                            <div class="uk-modal" id="modal_teeth_whitening">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','teeth_whitening')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','teeth_whitening')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','teeth_whitening')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','teeth_whitening')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','teeth_whitening')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','teeth_whitening')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','iteeth_whiteningmplate')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','teeth_whitening')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','teeth_whitening')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','teeth_whitening')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                        <div class="uk-modal" id="modal_intra_oral">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','intra_oral')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','intra_oral')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','intra_oral')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','intra_oral')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','intra_oral')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','intra_oral')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','intra_oral')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','intra_oral')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','intra_oral')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                             
                                            <div class="uk-modal" id="modal_extra_oral">
                                                    <div class="uk-modal-dialog">
                                                        <div class="uk-modal-header">
                                                            <h3 class="uk-modal-title">Compliant</h3>
                                                        </div>
                                                           
                                                <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8','extra_oral')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1','extra_oral')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2','extra_oral')"> 
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8','extra_oral')">
                                                    </div>
                                                </div> 
                                                <div class="uk-form-row">
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8','extra_oral')" >
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7','extra_oral')" >
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1','extra_oral')">
                                                    </div>
                                                    <div style="width: 6%;float: left;">
                                                        <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                    </div>
                                                    <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                        <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7','extra_oral')">
                                                        <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8','extra_oral')">
                                                    </div>
                                                </div>
                                                        
                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-width-large-1-1">
                                                    <div class="uk-form-row">
                                                        <label for="notes">Additional Notes</label>
                                                        <textarea class="md-input" name="notes" id="notes" cols="5" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br/>
                            <div class="md-card" id="opathology">
                                <div class="md-card-toolbar" style="background: #E4EBF5">
                                    <h3 class="md-card-toolbar-heading-text">
                                        ORAL PATHOLOGY
                                    </h3>
                                </div>
                                <div class="md-card-content">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-form-help-block" style="font-size: 15px">Specimen Type</span><br/>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="excisional" name="excisional" value="Yes" data-md-icheck />
                                                <label for="excisional" class="inline-label">EXCISIONAL</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="incisional" name="incisional" value="Yes" data-md-icheck />
                                                <label for="incisional" class="inline-label">INCISIONAL</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="smear_aspir" name="smear_aspir" value="Yes" data-md-icheck />
                                                <label for="smear_aspir" class="inline-label">SMEAR/ASPIRATION</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="immuno_fluor" name="immuno_fluor" value="Yes" data-md-icheck />
                                                <label for="immuno_fluor" class="inline-label">DIRECT IMMUNOFLUORESCENCE</label>
                                            </span>                                                                                       
                                        </div> 
                                        <div class="uk-width-1-1">
                                            <span class="uk-form-help-block" style="font-size: 15px">Indicate specific Location of Lesion</span><br/>
                                            <div class="gallery_grid uk-grid-width-medium-1-3 uk-grid-width-large-1-5" data-uk-grid="{gutter: 16}">
                                                <div>
                                                    <div class="md-card md-card-hover">
                                                        <div class="gallery_grid_item md-card-content">
                                                            <span class="req"><input type="checkbox" id="img1" name="img1" value="Yes" data-md-icheck /></span>
                                                            <a href="assets/img/1-378.png" data-uk-lightbox="{group:'gallery'}">
                                                                <img src="assets/img/1-700.png" alt="">                                                                
                                                            </a>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <div class="md-card md-card-hover">
                                                        <div class="gallery_grid_item md-card-content">
                                                            <span class="req"><input type="checkbox" id="img2" name="img2" value="Yes" data-md-icheck /></span>
                                                            <a href="assets/img/2-378.png" data-uk-lightbox="{group:'gallery'}">
                                                                <img src="assets/img/2-700.png" alt="">
                                                            </a>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="md-card md-card-hover">
                                                        <div class="gallery_grid_item md-card-content">
                                                            <span class="req"><input type="checkbox" id="img3" name="img3" value="Yes" data-md-icheck /></span>
                                                            <a href="assets/img/3-378.png" data-uk-lightbox="{group:'gallery'}">
                                                                <img src="assets/img/3-700.png" alt="">
                                                            </a>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-1">
                                            <span class="uk-form-help-block" style="font-size: 15px">3D Diagnostic Services</span><br/>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="gingiva" name="gingiva" value="Yes" data-md-icheck />
                                                <label for="gingiva" class="inline-label">GINGIVA</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="palate_hard" name="palate_hard" value="Yes" data-md-icheck />
                                                <label for="palate_hard" class="inline-label">PALATE(HARD)</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="teeth" name="teeth" value="Yes" data-md-icheck />
                                                <label for="teeth" class="inline-label">TEETH</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="tongue" name="tongue" value="Yes" data-md-icheck />
                                                <label for="tongue" class="inline-label">TONGUE</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="tonsil" name="tonsil" value="Yes" data-md-icheck />
                                                <label for="tonsil" class="inline-label">TONSIL</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="buccal_muco" name="buccal_muco" value="Yes" data-md-icheck />
                                                <label for="buccal_muco" class="inline-label">BUCCAL MUCOSA</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="palate_soft" name="palate_soft" value="Yes" data-md-icheck />
                                                <label for="palate_soft" class="inline-label">PALATE(SOFT)</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="uvula" name="uvula" value="Yes" data-md-icheck />
                                                <label for="uvula" class="inline-label">UVULA</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="left" name="left" value="Yes" data-md-icheck />
                                                <label for="left" class="inline-label">LEFT</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="right" name="right" value="Yes" data-md-icheck />
                                                <label for="right" class="inline-label">RIGHT</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="upper" name="upper" value="Yes" data-md-icheck />
                                                <label for="upper" class="inline-label">UPPER</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="checkbox" id="lower" name="lower" value="Yes" data-md-icheck />
                                                <label for="lower" class="inline-label">LOWER</label>
                                            </span>
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <span class="uk-form-help-block">X-RAYS/OTHER PHOTOS ENCLOSED?<span class="req">*</span></span><br/>
                                            <span class="icheck-inline">
                                                <input type="radio" name="yesimage" id="yesimage" onclick="imgyes_val()" value="Yes"/>
                                                <label for="isphotos" class="inline-label">YES</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="radio" name="yesimage" id="noimage" onclick="imgno_val()" value="No"/>
                                                <label for="isphotos" class="inline-label">NO</label>
                                            </span>                                     
                                        </div>
                                        <div class="uk-width-1-2" id="div_yes_show">
                                            <label>Select Your Image</label><br/>
                                            <input type="file" name="photoimg" id="file" multiple />
<!--                                            <div id="file_upload-drop" class="uk-file-upload">
                                                <p class="uk-text">Drop file to upload</p>
                                                <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                                                <a class="uk-form-file md-btn">choose file<input id="file_upload-select" name="imagefile" type="file" multiple></a>
                                            </div>-->
                                            <div id="file_upload-progressbar" class="uk-progress uk-hidden">
                                                <div class="uk-progress-bar" style="width:0">0%</div>
                                            </div>
                                        </div>
                                        
                                    </div>                                           
                                </div>                            
                            </div>
                        </div> 
                        <div class="uk-width-large-1-5"></div>
                        <div class="uk-width-large-1-5"></div>
                        <div class="uk-width-large-1-5"></div>
                        <div class="uk-width-large-1-5"></div>
                        <div class="uk-width-large-1-5">
                            <button type="submit" name="btn-save" id="btn-save" class="md-btn md-btn-primary md-btn-block md-btn-wave-light">Submit</button>
                        </div>
                    </div>                      
                </form>                
                <!--footer start-->
                <?php include 'include/footer.php'; ?>
                <!--footer end-->
                <!--sideop start-->
                <?php include 'include/sideop.php'; ?>
                <!--sideop end-->
            </div>
        </div>

        <!-- google web fonts -->
<!--        <script>
            WebFontConfig = {
                google: {
                    families: [
                        'Source+Code+Pro:400,700:latin',
                        'Roboto:400,300,300,700,400italic:latin'
                    ]
                }
            };
            (function () {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>-->

        <!-- common functions -->
        <script src="assets/js/common.min.js"></script>
        <!-- uikit functions -->
        <script src="assets/js/uikit_custom.min.js"></script>
        <!-- altair common functions/helpers -->
        <script src="assets/js/altair_admin_common.min.js"></script>

        <!-- page specific plugins -->
        <script src="assets/js/pages/forms_file_upload.min.js"></script>        
        <!--  product edit functions -->
        <script src="assets/js/pages/ecommerce_product_edit.min.js"></script>

        <script>
            $(function () {
                // enable hires images
                altair_helpers.retina_images();
                // fastClick (touch devices)
                if (Modernizr.touch) {
                    FastClick.attach(document.body);
                }
            });
            
            function value_set(id,val){
                
                if(val === "implate"){
                   $("#implate").val(id);
//                   $("#modal_implant").hide();
                }
                
                if(val === "bridge"){
                   $("#bridge").val(id);
                  // $("#modal_bridge").hide();
                }
                
                if(val === "cd_pd"){
                   $("#cd_pd").val(id);
                 //  $("#modal_cd_pd").hide();
                }
                
                if(val === "filling"){
                   $("#filling").val(id);
                   //$("#modal_filling").hide();
                }
                
                if(val === "endodontic"){
                   $("#endodontic").val(id);
                //   $("#modal_endodontic").hide();
                }
                
                if(val === "crown"){
                   $("#crown").val(id);
                  // $("#modal_crown").hide();
                }
                
                
                if(val === "scaling"){
                   $("#scaling").val(id);
                  // $("#modal_scaling").hide();
                }
                
                if(val === "surgical"){
                   $("#surgical").val(id);
                 //  $("#modal_surgical").hide();
                }
                
                if(val === "extraction"){
                   $("#extraction").val(id);
                  // $("#modal_extraction").hide();
                }
                
                if(val === "other_surgical"){
                   $("#other_surgical").val(id);
                  // $("#modal_other_surgical").hide();
                }
                
                if(val === "teeth_whitening"){
                   $("#teeth_whitening").val(id);
                  // $("#modal_teeth_whitening").hide();
                }
                
                if(val === "intra_oral"){
                   $("#intra_oral").val(id);
                  // $("#modal_intra_oral").hide();
                }
                
                if(val === "extra_oral"){
                   $("#extra_oral").val(id);
                   //$("#modal_extra_oral").hide();
                }
                
            }
        
//        $(document).ready(function () {
            $("#div_yes_show").hide();
            function imgyes_val()
            {                
                var img_id = $('#yesimage').val();
                if(img_id === 'Yes')
                {
                     $("#div_yes_show").show();
                }
            }
            function imgno_val()
            {                
                var img_id = $('#noimage').val();
                if(img_id === 'No')
                {
                    $("#div_yes_show").hide();
                }
            }            
//        });
//check browser widths
        var width_browser = $(window).width();    
        if(width_browser<=500)
        {
//            alert('below 500');
            $(".desktop_view").hide();
            $(".mobile_view").show();
        }
        else
        {
//            alert('above 500');
            $(".mobile_view").attr('disabled', true);
//            $(".mobile_view").hide();
            $(".desktop_view").show();                                    
        }
        
            
        </script>
<!--        <script type="text/javascript">
            $(document).ready(function () {
                $('#yesimage').click(function () {
                    alert('innn');
                    this.checked ? $('#opathology').show() : $('#opathology').hide();
                });
            });
        </script>        -->
        <style>
            .uk-modal-dialog {
            background: #fff none repeat scroll 0 0;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
            margin: 50px auto;
            max-width: calc(100% - 20px);
            opacity: 0;
            padding: 20px;
            position: relative;
            transform: translateY(-100px);
            transition: opacity 0.3s linear 0s, transform 0.3s ease-out 0s;
            width: 610px;
}
        </style>        
    </body>
</html>
