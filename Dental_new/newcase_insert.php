<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

function ipCheck() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        //Is it a proxy address
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getid() {
    $result = mysql_query("SELECT * FROM case_master");
    $num_rows = mysql_num_rows($result);
    if ($num_rows > 0) {
        $get = mysql_query("SELECT MAX(case_no) FROM case_master");
        $got = mysql_fetch_array($get);
        $next_id = $got['MAX(case_no)'] + 1;
        return $next_id;
    } else {
        $next_id = '1001';
        return $next_id;
    }
}

if (isset($_POST['btn-save'])) {

    $ip = ipCheck();
    $next_id = getid();
// receiving the post params
    $pat_name = $_POST['pat_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $locality = $_POST['locality'];
    $landmark = $_POST['landmark'];
    $zipcode = $_POST['zipcode'];
    $houseno = $_POST['houseno'];
    $address = $_POST['address'];
    $tel_no = $_POST['tel_no'];
    $mob_no = $_POST['mob_no'];
    $email = $_POST['email'];
    $profession = $_POST['profession'];
    $office_addr = $_POST['office_addr'];
    $office_no = $_POST['office_no'];
    $ref_by = $_POST['ref_by'];
    $blood_group = $_POST['blood_group'];
    $diabetes = $_POST['diabetes'];
    $drug_reaction = $_POST['drug_reaction'];
    $allergy = $_POST['allergy'];
    $pregnancy = $_POST['pregnancy'];
    $aspirin = $_POST['aspirin'];
    $heart = $_POST['heart'];
    $blood_pressure = $_POST['blood_pressure'];
    $acidity = $_POST['acidity'];
    $other = $_POST['other'];
    $family_doc = $_POST['family_doc'];
    $family_doc_contact = $_POST['family_doc_contact'];
    $consent = $_POST['consent'];
    
    $surgical_type = $_POST['surgical_type'];
    $scalling_polishing = $_POST['scalling_polishing'];
    $scaling_grade = $_POST['scaling_grade'];
    $filling_type = $_POST['filling_type'];
    $filling_class = $_POST['filling_class'];
    $cheif_complaint = $_POST['cheif_complaint'];

if(isset($_POST['prosthetic1'])){
        $prosthetic1 = $_POST['prosthetic1'];
    }
    else{
        $prosthetic1 = '';
    }
    
    if(isset($_POST['prosthetic2'])){
        $prosthetic2 = $_POST['prosthetic2'];
    }
    else{
        $prosthetic2 ='';
    }
    
    if(isset($_POST['prosthetic3'])){
        $prosthetic3 = $_POST['prosthetic3'];
    }
    else{
        $prosthetic3 = '';
    }
    
    if(isset($_POST['operative1'])){
         $operative1 = $_POST['operative1'];
    }
    else{
         $operative1 = '';
    }
    
    
    
    if(isset($_POST['operative2'])){
        $operative2 = $_POST['operative2'];
    }
    else{
        $operative2 = '';
    }
    
    if(isset($_POST['operative3'])){
        $operative3 = $_POST['operative3'];
    }
    else{
        $operative3 = '';
    }
    
    if(isset($_POST['periodontia1'])){
         $periodontia1 = $_POST['periodontia1'];
        // $next_date = date("Y-m-d", strtotime("+6 months"));
    }
    else{
         $periodontia1 = '';
    }
    
    if(isset($_POST['periodontia2'])){
        $periodontia2= $_POST['periodontia2'];
        //$next_date = date("Y-m-d", strtotime("+6 months"));
    }
    else{
        $periodontia2= '';
    }
    
    if(isset($_POST['oral_surgery1'])){
        $oral_surgery1 = $_POST['oral_surgery1'];
       // $next_date = date("Y-m-d", strtotime("+1 months"));
    }
    else{
        $oral_surgery1 = '';
    }
    
    if(isset($_POST['oral_surgery2'])){
        $oral_surgery2 = $_POST['oral_surgery2'];
        //$next_date = date("Y-m-d", strtotime("+15 day"));
    }
    else{
        $oral_surgery2 = '';
    }
    
    if(isset($_POST['cosmetic1'])){
        $cosmetic1 = $_POST['cosmetic1'];
    }
    else{
        $cosmetic1 = '';
    }
    
    if(isset($_POST['radiology1'])){
         $radiology1= $_POST['radiology1'];
    }
    else{
         $radiology1= '';
    }
    
    
    if(isset($_POST['radiology2'])){
        $radiology2 = $_POST['radiology2'];
    }
    else{
        $radiology2 = '';
    }
    
    date_default_timezone_set('Asia/Kolkata');
    $date_cr = date('m/d/Y');
    $dt = date("Y/m/d", strtotime($date_cr));
    $St_Time = "01:00:00";
    $date = date('m/d/Y h:i:s a', time());

    // check if patient already exists 
    if ($db->isPatientExisted($email)) {
        // user already exists
        ?>
        <script type="text/javascript">
            alert('Patient already Exist.');
        </script>
        <?php

    } else {
        $user = $db->insertPatientData($next_id, $pat_name, $age, $dob, $sex, $address, $tel_no, $mob_no, $email, $profession, $office_addr, $office_no, $ref_by, $blood_group, $diabetes, $drug_reaction, $allergy, $pregnancy, $aspirin, $heart, $blood_pressure, $acidity, $other, $family_doc, $family_doc_contact, $ip, $date, $surgical_type, $scalling_polishing, $scaling_grade, $filling_type, $filling_class, $cheif_complaint, $prosthetic1, $prosthetic2, $prosthetic3, $operative1, $operative2, $operative3, $periodontia2, $oral_surgery1, $oral_surgery2, $cosmetic1, $radiology1, $radiology2);
        if ($user) {
//            $result = mysql_query("SELECT * from case_master WHERE email = '$email'");
//            $data = mysql_fetch_array($result);
//            $r_id = $data['case_id'];
            ?>
            <script type="text/javascript">
                alert('Patient Inserted Successfully!');
                window.location.href = 'viewcase.php';
            </script>
            <?php

        } else {
            ?>
            <script type="text/javascript">
                alert('error occured while inserting data');
            </script>
            <?php

        }
    }
}

if (isset($_POST['btn-update'])) { // Has the image been uploaded?
    $case_id = $_GET['r_id'];
    $ip = ipCheck();
// receiving the post params
// receiving the post params
    $pat_name = $_POST['pat_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $locality = $_POST['locality'];
    $landmark = $_POST['landmark'];
    $zipcode = $_POST['zipcode'];
    $houseno = $_POST['houseno'];
    $address = $_POST['address'];
    $tel_no = $_POST['tel_no'];
    $mob_no = $_POST['mob_no'];
    $email = $_POST['email'];
    $profession = $_POST['profession'];
    $office_addr = $_POST['office_addr'];
    $office_no = $_POST['office_no'];
    $ref_by = $_POST['ref_by'];
    $blood_group = $_POST['blood_group'];
    $diabetes = $_POST['diabetes'];
    $drug_reaction = $_POST['drug_reaction'];
    $allergy = $_POST['allergy'];
    $pregnancy = $_POST['pregnancy'];
    $aspirin = $_POST['aspirin'];
    $heart = $_POST['heart'];
    $blood_pressure = $_POST['blood_pressure'];
    $acidity = $_POST['acidity'];
    $other = $_POST['other'];
    $family_doc = $_POST['family_doc'];
    $family_doc_contact = $_POST['family_doc_contact'];
    $consent = $_POST['consent'];
    
    $surgical_type = $_POST['surgical_type'];
    $scalling_polishing = $_POST['scalling_polishing'];
    $scaling_grade = $_POST['scaling_grade'];
    $filling_type = $_POST['filling_type'];
    $filling_class = $_POST['filling_class'];
    $cheif_complaint = $_POST['cheif_complaint'];

if(isset($_POST['prosthetic1'])){
        $prosthetic1 = $_POST['prosthetic1'];
    }
    else{
        $prosthetic1 = '';
    }
    
    if(isset($_POST['prosthetic2'])){
        $prosthetic2 = $_POST['prosthetic2'];
    }
    else{
        $prosthetic2 ='';
    }
    
    if(isset($_POST['prosthetic3'])){
        $prosthetic3 = $_POST['prosthetic3'];
    }
    else{
        $prosthetic3 = '';
    }
    
    if(isset($_POST['operative1'])){
         $operative1 = $_POST['operative1'];
    }
    else{
         $operative1 = '';
    }
    
    
    
    if(isset($_POST['operative2'])){
        $operative2 = $_POST['operative2'];
    }
    else{
        $operative2 = '';
    }
    
    if(isset($_POST['operative3'])){
        $operative3 = $_POST['operative3'];
    }
    else{
        $operative3 = '';
    }
    
    if(isset($_POST['periodontia1'])){
         $periodontia1 = $_POST['periodontia1'];
        // $next_date = date("Y-m-d", strtotime("+6 months"));
    }
    else{
         $periodontia1 = '';
    }
    
    if(isset($_POST['periodontia2'])){
        $periodontia2= $_POST['periodontia2'];
        //$next_date = date("Y-m-d", strtotime("+6 months"));
    }
    else{
        $periodontia2= '';
    }
    
    if(isset($_POST['oral_surgery1'])){
        $oral_surgery1 = $_POST['oral_surgery1'];
       // $next_date = date("Y-m-d", strtotime("+1 months"));
    }
    else{
        $oral_surgery1 = '';
    }
    
    if(isset($_POST['oral_surgery2'])){
        $oral_surgery2 = $_POST['oral_surgery2'];
        //$next_date = date("Y-m-d", strtotime("+15 day"));
    }
    else{
        $oral_surgery2 = '';
    }
    
    if(isset($_POST['cosmetic1'])){
        $cosmetic1 = $_POST['cosmetic1'];
    }
    else{
        $cosmetic1 = '';
    }
    
    if(isset($_POST['radiology1'])){
         $radiology1= $_POST['radiology1'];
    }
    else{
         $radiology1= '';
    }
    
    
    if(isset($_POST['radiology2'])){
        $radiology2 = $_POST['radiology2'];
    }
    else{
        $radiology2 = '';
    }
    
    date_default_timezone_set('Asia/Kolkata');
    $date_cr = date('m/d/Y');
    $dt = date("Y/m/d", strtotime($date_cr));
    $St_Time = "01:00:00";
    $date = date('m/d/Y h:i:s a', time());

    $user = $db->updatePatientData($case_id, $pat_name, $middle_name, $last_name, $age, $dob, $sex, $country, $state, $city, $locality, $landmark, $zipcode, $houseno, $address, $tel_no, $mob_no, $profession, $office_addr, $office_no, $ref_by, $blood_group, $diabetes, $drug_reaction, $allergy, $pregnancy, $aspirin, $heart, $blood_pressure, $acidity, $other, $family_doc, $family_doc_contact, $ip, $date);
    if ($user) {
        ?>
        <script type="text/javascript">
            alert('Data Updated Successfully ');
            window.location.href = 'viewcase.php';
        </script>
        <?php

    } else {
        ?>
        <script type="text/javascript">
            alert('error occured while inserting data');
        </script>
        <?php

    }
}
?>



