<?php
session_start();
include_once 'include/DB_Functions.php';
$users = new DB_Functions();
include_once './newcase_insert.php';

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
<html lang="en">
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                //alert("Hello");
                $("#dob").on('change', function () {
                    //alert("Change detected!");
                    var jobValue = document.getElementById('dob').value;
//                    alert(jobValue);
                    function getAge(birth) {
                        var today = new Date();
                        var curr_date = today.getDate();
                        var curr_month = today.getMonth() + 1;
                        var curr_year = today.getFullYear();

                        var pieces = birth.split('.');
                        var birth_date = pieces[0];
                        var birth_month = pieces[1];
                        var birth_year = pieces[2];

                        if (curr_month == birth_month && curr_date >= birth_date)
                            return parseInt(curr_year - birth_year);
                        if (curr_month == birth_month && curr_date < birth_date)
                            return parseInt(curr_year - birth_year - 1);
                        if (curr_month > birth_month)
                            return parseInt(curr_year - birth_year);
                        if (curr_month < birth_month)
                            return parseInt(curr_year - birth_year - 1);
                    }

                    var age = getAge(jobValue);
//                    alert(age);
                    auto_age.value = age;
                });
            });
        </script>        

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
                $case_id = $_GET['r_id'];
                $patient_sql = mysql_query("SELECT * FROM case_master WHERE case_id = $case_id");
                $patient_row = mysql_fetch_array($patient_sql);
                if ($_GET['r_id']) {
                    $pat_name = $patient_row['pat_name'];
                    $mname = $patient_row['mname'];
                    $lname = $patient_row['lname'];
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
                    ?>
                    <!-- Registration Form-->
                    <form id="form_validation" method="post" class="uk-form-stacked" autocomplete="off">
                        <div class="md-card">
                            <div class="md-card-content" style="background: #E4EBF5">
                                <h3 class="heading_a">Patient Form</h3>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <h3 class="heading_a">Patient Information</h3>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <div class="parsley-row">
                                            <label>Name<span class="req">*</span></label>
                                            <input type="text" name="pat_name" value="<?php echo $pat_name; ?>" class="md-input" required/>
                                        </div>
                                    </div>
                                    <!--                                    <div class="uk-width-medium-1-3">
                                                                            <div class="parsley-row">
                                                                                <label>Middle Name<span class="req">*</span></label>
                                                                                <input type="text" name="middle_name" value="<?php // echo $mname; ?>" class="md-input" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="uk-width-medium-1-3">
                                                                            <div class="parsley-row">
                                                                                <label>Last Name<span class="req">*</span></label>
                                                                                <input type="text" name="last_name" value="<?php // echo $lname; ?>" class="md-input" required/>
                                                                            </div>
                                                                        </div>-->
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>

                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <input type="text" name="age" id="auto_age" value="<?php echo $age; ?>" class="md-input" required readonly="true" placeholder="Age*"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <label for="dob">Select Birth date<span class="req">*</span></label>
                                            <input class="md-input" type="text" name="dob" value="<?php echo $dob; ?>" id="dob" data-uk-datepicker="{format:'DD.MM.YYYY'}" readonly="true" onkeydown="return false" required>
                                        </div>                                
                                    </div>                                    
                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <div class="uk-grid" data-uk-grid-margin>                                    
                                                <div class="uk-width-medium-5-5">
                                                    <span class="uk-form-help-block">Gender<span class="req">*</span></span>
                                                    <span class="icheck-inline">
                                                        <input type="radio" name="sex" id="male" <?php if (isset($sex) && $sex == "Male") echo "checked"; ?> value="Male" data-md-icheck required />
                                                        <label for="sex" class="inline-label">Male</label>
                                                    </span>
                                                    <span class="icheck-inline">
                                                        <input type="radio" name="sex" id="female" <?php if (isset($sex) && $sex == "Female") echo "checked"; ?> value="Female" data-md-icheck />
                                                        <label for="sex" class="inline-label">Female</label>
                                                    </span>
                                                    <span class="icheck-inline">
                                                        <input type="radio" name="sex" id="not disclosed" <?php if (isset($sex) && $sex == "Not Disclosed") echo "checked"; ?> value="Not Disclosed" data-md-icheck />
                                                        <label for="sex" class="inline-label">Don't want to Disclose</label>
                                                    </span>                                          
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 parsley-row">
                                        <select id="country" name="country" data-md-selectize onkeydown="return false" required>
                                            <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                            <option value="">Select Country*...</option>
                                            <optgroup label="country">
                                                <option value="India">India</option>
                                            </optgroup>                                    
                                        </select>                                
                                    </div>                                
                                    <div class="uk-width-medium-1-3 parsley-row">
                                        <select id="state" name="state" data-md-selectize onkeydown="return false" required>
                                            <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                                            <option value="">Select State*...</option>
                                            <optgroup label="state">
                                                <option value="Gujarat">Gujarat</option>
                                            </optgroup>                                    
                                        </select>                                
                                    </div>
                                    <div class="uk-width-medium-1-3 parsley-row">
                                        <select id="city" name="city" data-md-selectize onkeydown="return false" required>
                                            <option value="<?php echo $city; ?>"><?php echo $state; ?></option>
                                            <option value="">Select City*...</option>
                                            <optgroup label="city">
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                            </optgroup>                                    
                                        </select>                                
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 parsley-row">
                                        <select id="locality" name="locality" data-md-selectize onkeydown="return false" required>
                                            <option value="<?php echo $locality; ?>"><?php echo $state; ?></option>
                                            <option value="">Select Locality*...</option>
                                            <optgroup label="locality">
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                            </optgroup>                                    
                                        </select>                                
                                    </div>  
                                    <div class="uk-width-medium-1-3 parsley-row">
                                        <select id="landmark" name="landmark" data-md-selectize onkeydown="return false" required>
                                            <option value="<?php echo $landmark; ?>"><?php echo $state; ?></option>
                                            <option value="">Select Landmark*...</option>
                                            <optgroup label="landmark">
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                            </optgroup>                                    
                                        </select>                                
                                    </div>  
                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <label>Zip Code<span class="req">*</span></label>
                                            <input type="text" name="zipcode" value="<?php echo $zipcode; ?>" class="md-input" required/>
                                        </div>
                                    </div>
                                </div>   
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <label>House/Flat No.<span class="req">*</span></label>
                                            <input type="text" name="houseno" value="<?php echo "$houseno"; ?>" class="md-input" required/>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <label>Street Name<span class="req">*</span></label>
                                            <input type="text" name="address" id="address" value="<?php echo "$address"; ?>" class="md-input" required autocomplete="on"/>
                                        </div>                                
                                    </div> 
                                    <div class="uk-width-medium-1-3 parsley-row">
                                        <label for="email">Email ID<span class="req">*</span></label>
                                        <input class="md-input" id="email" name="email" value="<?php echo $email; ?>" type="email" data-parsley-trigger="change" required />
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>                                                         
                                    <div class="uk-width-medium-1-3">
                                        <label for="tel_no">Telephone#</label>
                                        <input class="md-input masked_input" id="tel_no" name="tel_no" value="<?php echo $tel_no; ?>" type="text" data-inputmask="'mask': '9999 - 9 999 999'" data-inputmask-showmaskonhover="false" />
                                    </div>
                                    <div class="uk-width-medium-1-3 parsley-row">
                                        <label for="mob_no">Mobile Phone#<span class="req">*</span></label>
                                        <input class="md-input masked_input" id="mob_no" name="mob_no" value="<?php echo $mob_no; ?>" type="text" required data-inputmask="'mask': '999 - 999 999 9999'" data-inputmask-showmaskonhover="false" />
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <div class="uk-form-row">
                                            <label>Referred By</label>
                                            <input type="text" name="ref_by" value="<?php echo $ref_by; ?>" class="md-input"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>                                                      
                                    <div class="uk-width-medium-1-3">
                                        <div class="uk-form-row">
                                            <label>Profession</label>
                                            <input type="text" name="profession" value="<?php echo $profession; ?>" class="md-input"  />
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <div class="uk-form-row">
                                            <label>Company Name</label>
                                            <input type="text" name="office_addr" value="<?php echo $office_addr; ?>" class="md-input"  />
                                        </div>                                
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <div class="uk-form-row">
                                            <label>Company Phone#</label>
                                            <input class="md-input masked_input" id="office_no" name="office_no" value="<?php echo $office_no; ?>" type="text" data-inputmask="'mask': '9999 - 9 999 999'" data-inputmask-showmaskonhover="false" />
                                        </div>
                                    </div>                                     
                                </div>                                
                            </div>
                        </div>

                        <div class="uk-grid" data-uk-grid-margin>                    
                            <div class="uk-width-medium-1-1">
                                <div class="md-card">
                                    <div class="md-card-content">
                                        <h3 class="heading_a">Medical History</h3>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-8">
                                                <span class="uk-form-help-block">Conditions</span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="diabetes" name="diabetes" <?php if (isset($diabetes) && $diabetes == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="diabetes" class="inline-label">Diabetes</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="drug_reaction" name="drug_reaction" <?php if (isset($drug_reaction) && $drug_reaction == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="drug_reaction" class="inline-label">Drug Reaction</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="allergy" name="allergy" <?php if (isset($allergy) && $allergy == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="allergy" class="inline-label">Allergy</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="pregnancy" name="pregnancy" <?php if (isset($pregnancy) && $pregnancy == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="pregnancy" class="inline-label">Pregnancy</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="aspirin" name="aspirin" <?php if (isset($aspirin) && $aspirin == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="aspirin" class="inline-label">Aspirin</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="acidity" name="acidity" <?php if (isset($acidity) && $acidity == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="acidity" class="inline-label">Acidity</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="blood_pressure" name="blood_pressure" <?php if (isset($blood_pressure) && $blood_pressure == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="blood_pressure" class="inline-label">Blood Pressure</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="heart" name="heart" <?php if (isset($heart) && $heart == "Yes") echo "checked"; ?> value="Yes" data-md-icheck />
                                                    <label for="heart" class="inline-label">Heart Conditions</label>
                                                </span>                                     
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>                                                      
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-form-row">
                                                    <label>Other Conditions</label>
                                                    <input type="text" name="other" class="md-input" value="<?php echo $other; ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <select id="blood_group" name="blood_group" required data-md-selectize onkeydown="return false">
                                                    <option value="<?php echo $blood_group; ?>"><?php echo $blood_group; ?></option>                                                   
                                                    <optgroup label="blood_group">                                                        
                                                        <option value="A Positive">A Positive</option>
                                                        <option value="B Positive">B Positive</option>
                                                        <option value="O Positive">O Positive</option>
                                                        <option value="AB Positive">AB Positive</option>
                                                        <option value="A Negative">A Negative</option>
                                                        <option value="B Negative">B Negative</option>
                                                        <option value="O Negative">O Negative</option>
                                                        <option value="AB Negative">AB Negative</option>
                                                    </optgroup>                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>                                                      
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-form-row">
                                                    <label>Family Doctor</label>
                                                    <input type="text" name="family_doc" class="md-input" value="<?php echo $family_doc; ?>"/>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-form-row">
                                                    <label>Phone No</label>
                                                    <input class="md-input masked_input" id="office_no" name="family_doc_contact" value="<?php echo $family_doc_contact; ?>" type="text" data-inputmask="'mask': '999 - 999 999 9999'" data-inputmask-showmaskonhover="false" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>                    
                            <div class="uk-width-medium-1-1">
                                <div class="md-card">
                                    <div class="md-card-content">                                        
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <button type="submit" name="btn-update" id="btn-update" class="md-btn md-btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /Registration form -->
                    <?php
                } else {
                    ?>
                    <!-- Registration form -->                    
                    <form id="form_validation" method="post" class="uk-form-stacked" autocomplete="off">
                        <div class="md-card">
                            <div class="md-card-content" style="background: #E4EBF5">
                                <h3 class="heading_a">Patient Form</h3>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <h3 class="heading_a">Patient Information</h3>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <div class="parsley-row">
                                            <label>Name :<span class="req">*</span></label>
                                            <input type="text" name="pat_name" class="md-input" required/>
                                        </div>
                                    </div>
                                    <!--                                    <div class="uk-width-medium-1-3">
                                                                            <div class="parsley-row">
                                                                                <label>Middle Name<span class="req">*</span></label>
                                                                                <input type="text" name="middle_name" class="md-input" required/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="uk-width-medium-1-3">
                                                                            <div class="parsley-row">
                                                                                <label>Last Name<span class="req">*</span></label>
                                                                                <input type="text" name="last_name" class="md-input" required/>
                                                                            </div>
                                                                        </div>                                    -->
                                </div>                                
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <label for="dob">Date Of Birth<span class="req">*</span></label>
                                            <input class="md-input" type="text" name="dob" id="dob" data-uk-datepicker="{format:'DD.MM.YYYY'}" readonly="true" onkeydown="return false" required>
                                        </div>                                
                                    </div> 


                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <input type="text" name="age" id="auto_age" class="md-input" required readonly="true" placeholder="Age*"/>
                                        </div>
                                    </div>                                    
                                   
                                    <div class="uk-width-medium-1-3">
                                        <div class="parsley-row">
                                            <div class="uk-grid" data-uk-grid-margin>                                    
                                                <div class="uk-width-medium-5-5">
                                                    <span class="uk-form-help-block">Gender :<span class="req">*</span></span>
                                                    <span class="icheck-inline">
                                                        <input type="radio" name="sex" id="male" value="Male" data-md-icheck required />
                                                        <label for="sex" class="inline-label">Male</label>
                                                    </span>
                                                    <span class="icheck-inline">
                                                        <input type="radio" name="sex" id="female" value="Female" data-md-icheck />
                                                        <label for="sex" class="inline-label">Female</label>
                                                    </span>                                                                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label>Address :<span class="req">*</span></label>
                                        <textarea type="text" name="address" class="md-input" required></textarea>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>                                                         
                                    <div class="uk-width-medium-1-2">
                                        <label for="tel_no">Telephone No. :</label>
                                        <input class="md-input masked_input" id="tel_no" name="tel_no" type="text" data-inputmask="'mask': '9999 - 9 999 999'" data-inputmask-showmaskonhover="false" />
                                    </div>
                                    <div class="uk-width-medium-1-2 parsley-row">
                                        <label for="mob_no">Mobile :<span class="req">*</span></label>
                                        <input class="md-input masked_input" id="mob_no" name="mob_no" type="text" required data-inputmask="'mask': '999 - 999 999 9999'" data-inputmask-showmaskonhover="false" />
                                    </div>
                                </div>                                
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label for="email">E-mail :<span class="req">*</span></label>
                                        <input class="md-input" id="email" name="email" type="email" data-parsley-trigger="change" required />
                                    </div>                                    
                                    <div class="uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <label>Profession :</label>
                                            <input type="text" name="profession" class="md-input"  />
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-1 parsley-row">
                                        <label>Office Address :<span class="req">*</span></label>
                                        <textarea type="text" class="md-input" required></textarea>
                                    </div>                                    
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-form-row">
                                            <label>Office No. :</label>
                                            <input class="md-input masked_input" id="office_no" name="office_no" type="text" data-inputmask="'mask': '9999 - 9 999 999'" data-inputmask-showmaskonhover="false" />
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-form-row">
                                            <label>Referred By :</label>
                                            <input type="text" name="office_addr" class="md-input"  />
                                        </div>                                
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="uk-grid" data-uk-grid-margin>                    
                            <div class="uk-width-medium-1-1">
                                <div class="md-card">
                                    <div class="md-card-content">
                                        <h3 class="heading_a">Medical History</h3>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-8">
                                                <span class="uk-form-help-block">Conditions</span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="diabetes" name="diabetes" value="Yes" data-md-icheck />
                                                    <label for="diabetes" class="inline-label">Diabetes</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="drug_reaction" name="drug_reaction" value="Yes" data-md-icheck />
                                                    <label for="drug_reaction" class="inline-label">Drug Reaction</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="allergy" name="allergy" value="Yes" data-md-icheck />
                                                    <label for="allergy" class="inline-label">Allergy</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="pregnancy" name="pregnancy" value="Yes" data-md-icheck />
                                                    <label for="pregnancy" class="inline-label">Pregnancy</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="aspirin" name="aspirin" value="Yes" data-md-icheck />
                                                    <label for="aspirin" class="inline-label">Aspirin</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="acidity" name="acidity" value="Yes" data-md-icheck />
                                                    <label for="acidity" class="inline-label">Acidity</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="blood_pressure" name="blood_pressure" value="Yes" data-md-icheck />
                                                    <label for="blood_pressure" class="inline-label">Blood Pressure</label>
                                                </span>
                                                <span class="icheck-inline">
                                                    <input type="checkbox" id="heart" name="heart" value="Yes" data-md-icheck />
                                                    <label for="heart" class="inline-label">Heart Conditions</label>
                                                </span>                                     
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>                                                      
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-form-row">
                                                    <label>Other Conditions :</label>
                                                    <input type="text" name="other" class="md-input"  />
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2 parsley-row">
                                                <select id="blood_group" name="blood_group" onkeydown="return false" required data-md-selectize>
                                                    <option value="">Select Blood Group*...</option>
                                                    <optgroup label="blood_group">
                                                        <option value="A Positive">A Positive</option>
                                                        <option value="B Positive">B Positive</option>
                                                        <option value="O Positive">O Positive</option>
                                                        <option value="AB Positive">AB Positive</option>
                                                        <option value="A Negative">A Negative</option>
                                                        <option value="B Negative">B Negative</option>
                                                        <option value="O Negative">O Negative</option>
                                                        <option value="AB Negative">AB Negative</option>
                                                    </optgroup>                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>                                                      
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-form-row">
                                                    <label>Family Doctor :</label>
                                                    <input type="text" name="family_doc" class="md-input"  />
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-form-row">
                                                    <label>Phone No. :</label>
                                                    <input class="md-input masked_input" id="office_no" name="family_doc_contact" type="text" data-inputmask="'mask': '999 - 999 999 9999'" data-inputmask-showmaskonhover="false" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
<!--                        <div class="uk-grid" data-uk-grid-margin>                    
                            <div class="uk-width-medium-1-1">
                                <div class="md-card">
                                    <div class="md-card-content">
                                        <h3 class="heading_a">CONSENT FOR DENTAL EXAMINATION, TREATMENT UNDER LOCAL/GENERAL ANESTHESIA IN DENTAL CLINIC</h3>
                                        <div class="uk-width-medium-1-1">                                        
                                            <span class="icheck-inline">
                                                <span class="uk-form-help-block parsley-row">
                                                    <input type="checkbox" id="consent" name="consent" value="Yes" data-md-icheck required />
                                                    <label class="inline-label" style="text-align: justify;">I hereby employ Dr. Kairavi Buch for my Dental Treatment. I hereby give my consent to Dr. Kairavi Buch and her assistant doctors, 
                                                        staff for giving treatment to me. I further give my consent to any other additional treatment that may be indicated during the further
                                                        course of treatment or unusual/unforeseen conditions are discovered. The nature and purpose of the treatment to be rendered, the possible
                                                        hazards involved and the alternative methods of treatment have been fully explained to me and i have freely asked explanation of the treatment
                                                        and am satisfied with the same. No assurance/guarantee/warranty has been made to me that the result will be my complete satisfaction. Although 
                                                        it is believed that the results will be satisfactory. I abide to pay the expenses incurred for the treatment.
                                                    </label>
                                                </span>
                                            </span>                                        
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="md-card">
                                    <div class="md-card-content large-padding">
                                        <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                            <div class="uk-width-large-1-1">
                                                <div class="uk-form-row">
                                                    <h3>Chief Complaint :</h3>
                                                    <input class="md-input" name="cheif_complaint"/>
                                                </div>
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
                                                                <!--<div class="uk-grid uk-grid-divider uk-grid-medium">-->
                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_implant'}" class=""> 
                                                                                <label style="color: #000;"> i. Implant</label>  
                                                                            </a>
                                                                            <input type="text" readonly="" name="prosthetic1" id="implate" class="md-input" />
                                                                        </div>
                                                                    </div>


                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_bridge'}" class=""> <label style="color: #000;"> ii. Bridge</label> </a>
                                                                            <input type="text" readonly="" name="prosthetic2" id="bridge" class="md-input" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Manual Insert Teeth" data-uk-modal="{target:'#modal_cd_pd'}" class="">  <label style="color: #000;">  iii. C.D / P.D.</label> </a>
                                                                            <input type="text" name="prosthetic3" id="cd_pd" class="md-input" />
                                                                        </div>
                                                                    </div>
                                                                <!--</div>-->
                                                                    <?php /* i. Implant <div class="uk-width-large-1-1">  <input  class="md-input" name="" type="text"> </div>  <br>
                                                                      ii. Bridge <br/>
                                                                      iii. C.D / P.D. */ ?>
                                                                </td>

                                                                <td> <h3> Operative: </h3>
                                                                    <div class="uk-grid uk-grid-divider uk-grid-medium">
                                                                        <div class="uk-width-medium-1-3">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_filling'}" class=""> <label style="color: #000;"> i. Filling</label> </a>
                                                                            <input class="md-input" type="text" id="filling" name="operative1">
                                                                        </div>
                                                                        <div class="uk-width-medium-1-3">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Class" class=""> <label style="color: #000;"> Class</label> </a>
                                                                                    <select id="blood_group" name="filling_class" onkeydown="return false" data-uk-tooltip="{pos:'bottom'}" title="Select Class" class="" data-md-selectize>
                                                                                        <option value="">Select Class</option>
                                                                                        <optgroup>
                                                                                            <option value="Cl I">Cl I</option>
                                                                                            <option value="Cl II">Cl II</option>
                                                                                            <option value="Cl III">Cl III</option>
                                                                                            <option value="Cl IV">Cl IV</option>
                                                                                            <option value="Cl V">Cl V</option>
                                                                                        </optgroup>                                    
                                                                                    </select>                                                                            
                                                                        </div>
                                                                        <div class="uk-width-medium-1-3">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Cleaning Type"  class=""> <label style="color: #000;"> Cleaning</label> </a>
                                                                                    <select id="blood_group" name="filling_type" onkeydown="return false" data-uk-tooltip="{pos:'bottom'}" title="Select Class" class="" data-md-selectize>
                                                                                        <option value="">Select Type</option>
                                                                                        <optgroup>
                                                                                            <option value="Initial Deep">Initial Deep</option>
                                                                                            <option value="Very Deep">Very Deep</option>
                                                                                        </optgroup>                                    
                                                                                    </select>                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-width-medium-1-1">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_endodontic'}" class=""> <label style="color: #000;"> ii. Endodontic</label> </a>
                                                                            <input type="text" readonly="" name="operative2" id="endodontic" class="md-input" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-width-medium-1-1">
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
                                                                    <!--<div class="md-card-content large-padding">-->    
                                                                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                                                                            <div class="uk-width-medium-1-2">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Class" class=""> <label style="color: #000;"> Class</label> </a>
                                                                                    <select id="blood_group" name="scaling_grade" onkeydown="return false" data-uk-tooltip="{pos:'bottom'}" title="Select Class" class="" data-md-selectize>
                                                                                        <option value="">Select Class</option>
                                                                                        <optgroup>
                                                                                            <option value="Grade I">Grade I</option>
                                                                                            <option value="Grade II">Grade II</option>
                                                                                            <option value="Grade III">Grade III</option>
<!--                                                                                            <option value="Cl IV">Cl IV</option>
                                                                                            <option value="Cl V">Cl V</option>-->
                                                                                        </optgroup>                                    
                                                                                    </select>                                                                            
                                                                        </div>
                                                                            <div class="uk-width-medium-1-2">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Polishing" class=""> <label style="color: #000;">Polishing</label> </a>
                                                                                    <!--<input type="text" name="periodontia1" id="scaling" class="md-input" />-->
                                                                                    <input type="checkbox" id="tobaccoprogram" name="scalling_polishing" value="Yes" data-md-icheck />
                                                                                    <!--<label for="tobaccoprogram" class="inline-label">Yes</label>-->                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <!--</div>-->
                                                                    <div class="uk-grid uk-grid-divider uk-grid-medium">
                                                                            
                                                                            <div class="uk-width-medium-1-2">
                                                                                <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Type"  class=""> <label style="color: #000;">ii. Surgical Type</label> </a>
                                                                                        <select id="blood_group" name="surgical_type" onkeydown="return false" data-uk-tooltip="{pos:'bottom'}" title="Select Class" class="" data-md-selectize>
                                                                                            <option value="">Select Type</option>
                                                                                            <optgroup>
                                                                                                <option value="Laser">Laser</option>
                                                                                                <option value="Surgical">Surgical</option>
                                                                                            </optgroup>                                    
                                                                                        </select>                                                                            
                                                                            </div>
                                                                            <div class="uk-width-medium-1-2">
                                                                                <div class="parsley-row">
                                                                                    <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_surgical'}" class=""> <label style="color: #000;">Surgical</label> </a>
                                                                                    <input type="text" name="periodontia2" id="surgical" class="md-input" />
                                                                                </div>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                    <div class="uk-width-medium-1-1" style="height: 50px;">  


                                                                    </div>
                                                                    <?php /* i. Scaling <br/>
                                                                      ii. Surgical */ ?>

                                                                </td>

                                                            </tr>

                                                            <tr class="desktop_view">
                                                                <td> <h3> Oral Surgery: </h3>

                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_extraction'}" class="">  <label style="color: #000;"> i. Extraction</label> </a>
                                                                            <input type="text" readonly="" name="oral_surgery1" id="extraction" class="md-input" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-width-medium-1-2">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Manual Insert Teeth" data-uk-modal="{target:'#modal_other_surgical'}" class=""> <label style="color: #000;"> ii. Other Surgical Procedure</label> </a>
                                                                            <input type="text" readonly="" name="oral_surgery2" id="other_surgical" class="md-input" />
                                                                        </div>
                                                                    </div>    

                                                                    <?php /* i. Extraction <br/>
                                                                      ii. Other Surgical Procedure */ ?>
                                                                </td>

                                                                <td> <h3> Cosmetic: </h3>
                                                                    <div class="uk-width-medium-1-1">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_teeth_whitening_not'}" class=""> <label style="color: #000;">  i. Teeth whitening</label> </a>
                                                                            <input type="text" readonly="" name="cosmetic1" id="teeth_whitening_not" class="md-input" />
                                                                        </div>
                                                                    </div> 
                                                                    <div class="uk-width-medium-1-1">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_teeth_whitening'}" class=""> <label style="color: #000;">  ii. Veneer</label> </a>
                                                                            <input type="text" readonly="" name="cosmetic1" id="teeth_whitening" class="md-input" />
                                                                        </div>
                                                                    </div> 

                                                                </td>

                                                                <td> <h3> Radiology: </h3>
                                                                    <div class="uk-width-medium-1-1">
                                                                        <div class="parsley-row">
                                                                            <a href="#" data-uk-tooltip="{pos:'bottom'}" title="Select Teeth" data-uk-modal="{target:'#modal_intra_oral'}" class=""> <label style="color: #000;">  i.Intra Oral</label> </a>
                                                                            <input type="text" readonly="" name="radiology1" id="intra_oral" class="md-input" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="uk-width-medium-1-1">
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
                                                              iii. C.D / P.D. */ ?>
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
                                                              ii. Surgical */ ?>
                                                                                                                                         
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
                                                              ii. Other Surgical Procedure */ ?>
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
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'implate')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'implate')">

                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'implate')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'implate')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'implate')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'implate')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'implate')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'implate')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>        


                                                <div class="uk-modal" id="modal_bridge">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->
                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'bridge')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'bridge')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'bridge')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'bridge')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'bridge')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'bridge')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'bridge')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'bridge')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'bridge')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>





                                                <div class="uk-modal" id="modal_implant">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'implate')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'implate')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'implate')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'implate')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'implate')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'implate')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'implate')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'implate')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'implate')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--                                                <div class="uk-modal" id="modal_cd_pd">
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
                                                                                                </div>-->

                                                <div class="uk-modal" id="modal_filling">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'filling')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'filling')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'filling')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'implate')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'filling')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'filling')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'filling')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'filling')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'filling')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_endodontic">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'endodontic')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'endodontic')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'endodontic')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'endodontic')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'endodontic')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'endodontic')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'endodontic')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'endodontic')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'endodontic')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_crown">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'crown')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'crown')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'crown')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'crown')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'crown')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'crown')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'crown')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'crown')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'crown')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-modal" id="modal_scaling">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'scaling')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'scaling')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'scaling')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'scaling')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'scaling')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'scaling')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'scaling')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'scaling')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'scaling')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-modal" id="modal_surgical">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'surgical')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'surgical')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'surgical')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'surgical')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'surgical')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'surgical')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'surgical')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'surgical')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'surgical')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_extraction">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'extraction')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'extraction')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'extraction')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'extraction')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'extraction')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'extraction')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'extraction')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'extraction')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'extraction')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_other_surgical">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'other_surgical')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'other_surgical')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'other_surgical')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'other_surgical')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'other_surgical')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'other_surgical')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'other_surgical')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'other_surgical')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'other_surgical')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="uk-modal" id="modal_teeth_whitening">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'teeth_whitening')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'teeth_whitening')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'teeth_whitening')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'teeth_whitening')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'teeth_whitening')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'teeth_whitening')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'iteeth_whiteningmplate')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'teeth_whitening')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'teeth_whitening')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'teeth_whitening')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_intra_oral">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'intra_oral')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'intra_oral')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'intra_oral')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'intra_oral')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'intra_oral')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'intra_oral')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'intra_oral')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'intra_oral')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'intra_oral')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="uk-modal" id="modal_extra_oral">
                                                    <div class="uk-modal-dialog">
                                                        <!--                                                        <div class="uk-modal-header">
                                                                                                                    <h3 class="uk-modal-title">Compliant</h3>
                                                                                                                </div>-->

                                                        <span class="uk-form-help-block" style="font-size: 15px">Select the Area/Teeth for CBCT</span><br/>
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('1,8', 'extra_oral')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('1,7', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('1,6', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('1,5', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('1,4', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('1,3', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('1,2', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('1,1', 'extra_oral')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('2,1', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('2,2', 'extra_oral')"> 
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('2,3', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('2,4', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('2,5', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('2,6', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('2,7', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('2,8', 'extra_oral')">
                                                            </div>
                                                        </div> 
                                                        <div class="uk-form-row">
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('3,8', 'extra_oral')" >
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('3,7', 'extra_oral')" >
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('3,6', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('3,5', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('3,4', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('3,3', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('3,2', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('3,1', 'extra_oral')">
                                                            </div>
                                                            <div style="width: 6%;float: left;">
                                                                <input type="image" src="assets/img/line.jpg" alt="Submit" width="30" height="22">
                                                            </div>
                                                            <div class="uk-width-medium-1-2" style="width: 47%;float: left;">
                                                                <input type="button" style="background: url(assets/img/d1.png); width: 30px; height: 30px; border: none" onclick="value_set('4,1', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d2.png); width: 30px; height: 30px; border: none" onclick="value_set('4,2', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d3.png); width: 30px; height: 30px; border: none" onclick="value_set('4,3', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d4.png); width: 30px; height: 30px; border: none" onclick="value_set('4,4', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d5.png); width: 30px; height: 30px; border: none" onclick="value_set('4,5', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d6.png); width: 30px; height: 30px; border: none" onclick="value_set('4,6', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d7.png); width: 30px; height: 30px; border: none" onclick="value_set('4,7', 'extra_oral')">
                                                                <input type="button" style="background: url(assets/img/d8.png); width: 30px; height: 30px; border: none" onclick="value_set('4,8', 'extra_oral')">
                                                            </div>
                                                        </div>

                                                        <div class="uk-modal-footer uk-text-right">
                                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary uk-modal-close">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-grid">
                                                    <div class="uk-width-1-1">
                                                        <button type="submit" name="btn-save" id="btn-save" class="md-btn md-btn-primary">Register</button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </form>
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

                                                                function value_set(id, val) {

                                                                    if (val === "implate") {

                                                                        //$("#Compliant").val(id);    
                                                                        $("#implate").val(id);
                                                                        //                   $("#modal_implant").hide();
                                                                    }

                                                                    if (val === "bridge") {
                                                                        //                   $("#bridge").val(id);
                                                                        // $("#modal_bridge").hide();
                                                                        
                                                                        var compliant_val = $("#bridge").val();
                                                                        if (compliant_val) {
                                                                            
                                                                            var add_more = compliant_val + '-' + id;
                                                                            var minus = add_more.split('-');
//                                                                            alert(minus);
//                                                                            
//                                                                                var email = "meme@email_1.com,him@email_2.com,her@email_3.com";
//                                                                                var email_array = email.split(',');
                                                                            for(var i = 0; i < minus.length; i++)
                                                                            {
                                                                               minus[i];
//                                                                               minus[i] = 1,5;
                                                                               alert(minus[i]);
                                                                            }      
//                                                                            var str = "1,2,3,4,5,6";
//                                                                            var temp = new Array();
//                                                                            temp = add_more.split("-");//                                                                                                                                                  
//                                                                            alert(temp);
                                                                            $("#bridge").val(add_more);
                                                                            
                                                                        } else {
                                                                            $("#bridge").val(id);
                                                                        }
                                                                    }

                                                                    //                if(val === "cd_pd"){
                                                                    //                   $("#cd_pd").val(id);
                                                                    //                 //  $("#modal_cd_pd").hide();
                                                                    //                }

                                                                    if (val === "filling") {
                                                                        $("#filling").val(id);
                                                                        //$("#modal_filling").hide();
                                                                    }

                                                                    if (val === "endodontic") {
                                                                        $("#endodontic").val(id);
                                                                        //   $("#modal_endodontic").hide();
                                                                    }

                                                                    if (val === "crown") {
                                                                        $("#crown").val(id);
                                                                        // $("#modal_crown").hide();
                                                                    }


                                                                    if (val === "scaling") {
                                                                        $("#scaling").val(id);
                                                                        // $("#modal_scaling").hide();
                                                                    }

                                                                    if (val === "surgical") {
//                                                                        $("#surgical").val(id);
                                                                        //  $("#modal_surgical").hide();
                                                                        var surgical_val = $("#surgical").val();
                                                                        if (surgical_val) {
                                                                            var add_more1 = surgical_val + '-' + id;
                                                                            $("#surgical").val(add_more1);
                                                                        } else {
                                                                            $("#surgical").val(id);
                                                                        }                                                                        
                                                                    }

                                                                    if (val === "extraction") {
                                                                        $("#extraction").val(id);
                                                                        // $("#modal_extraction").hide();
                                                                    }

                                                                    if (val === "other_surgical") {
                                                                        $("#other_surgical").val(id);
                                                                        // $("#modal_other_surgical").hide();
                                                                    }

                                                                    if (val === "teeth_whitening") {
                                                                        $("#teeth_whitening").val(id);
                                                                        // $("#modal_teeth_whitening").hide();
                                                                    }

                                                                    if (val === "intra_oral") {
                                                                        $("#intra_oral").val(id);
                                                                        // $("#modal_intra_oral").hide();
                                                                    }

                                                                    if (val === "extra_oral") {
                                                                        $("#extra_oral").val(id);
                                                                        //$("#modal_extra_oral").hide();
                                                                    }

                                                                }

                                                                //        $(document).ready(function () {
                                                                $("#div_yes_show").hide();
                                                                function imgyes_val()
                                                                {
                                                                    var img_id = $('#yesimage').val();
                                                                    if (img_id === 'Yes')
                                                                    {
                                                                        $("#div_yes_show").show();
                                                                    }
                                                                }
                                                                function imgno_val()
                                                                {
                                                                    var img_id = $('#noimage').val();
                                                                    if (img_id === 'No')
                                                                    {
                                                                        $("#div_yes_show").hide();
                                                                    }
                                                                }
                                                                //        });
                                                                //check browser widths
                                                                var width_browser = $(window).width();
                                                                if (width_browser <= 500)
                                                                {
                                                                    //            alert('below 500');
                                                                    $(".desktop_view").hide();
                                                                    $(".mobile_view").show();
                                                                } else
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
                width: 650px;
            }
        </style> 
    </body>
</html>