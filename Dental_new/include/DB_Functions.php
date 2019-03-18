<?php

include_once 'Config.php';

class DB_Functions {

    private $conn;

    public function __construct() {
        $db = new DB_Class();
    }

    function __destruct() {
        
    }

    function runQuery($query) {
        $result = mysql_query($query);
        while ($row = mysql_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }

    function numRows($query) {
        $result = mysql_query($query);
        $rowcount = mysql_num_rows($result);
        return $rowcount;
    }

    public function get_session() {
        return $_SESSION['log_id'];
    }

    public function user_logout() {
        $_SESSION['log_id'] = FALSE;
        session_destroy();
    }

    public function check_login($email, $password) {
        //$password = md5($password);
        $result = mysql_query("SELECT * from login_master WHERE email_id = '$email' and user_pass = '$password'");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);

        if ($no_rows == 1) {
            $_SESSION['log_id'] = true;
            $_SESSION['user_uniq_id'] = $user_data['user_uniq_id'];
            $_SESSION['user_id'] = $user_data['user_id'];
//            $_SESSION['login_type'] = $user_data['login_type'];
            return TRUE;
        } else {            
            return FALSE;
        }
    }

    public function storeUser($Id, $User, $Phone) {
        // Insert user into database
        $result = mysql_query("INSERT INTO users VALUES($Id,'$User','$Phone')");

        if ($result) {
            return true;
        } else {
            if (mysql_errno() == 1062) {
                // Duplicate key - Primary Key Violation
                return true;
            } else {
                // For other errors
                return false;
            }
        }
    }

    public function insertPatientData($next_id, $pat_name,$age, $dob, $sex,$address, $tel_no, $mob_no, $email, $profession, $office_addr, $office_no, $ref_by, $blood_group, $diabetes, $drug_reaction, $allergy, $pregnancy, $aspirin, $heart, $blood_pressure, $acidity, $other, $family_doc, $family_doc_contact, $ip, $date,$surgical_type,$scalling_polishing,$scaling_grade,$filling_type,$filling_class,$cheif_complaint,$prosthetic1,$prosthetic2,$prosthetic3,$operative1,$operative2,$operative3,$periodontia2,$oral_surgery1,$oral_surgery2,$cosmetic1,$radiology1,$radiology2) {
        $reg_via = "Web";
        $result = mysql_query("INSERT INTO case_master(case_no,pat_name,age,dob,sex,address,tel_no,mob_no,email,profession,office_addr,office_no,ref_by,blood_group,diabetes,drug_reaction,allergy,pregnancy,aspirin,heart,blood_pressure,acidity,other,family_doc,family_doc_contact,reg_via,reg_device_id,creation_date) VALUES('$next_id','$pat_name','$age','$dob','$sex','$address','$tel_no','$mob_no','$email','$profession','$office_addr','$office_no','$ref_by','$blood_group','$diabetes','$drug_reaction','$allergy','$pregnancy','$aspirin','$heart','$blood_pressure','$acidity','$other','$family_doc','$family_doc_contact','$reg_via','$ip',STR_TO_DATE('$date','%m/%d/%Y%h:%i'))");
        
        $result_sql = mysql_query("SELECT case_id FROM case_master ORDER BY case_id DESC");
        $user_data = mysql_fetch_array($result_sql);
        $case_id = $user_data['case_id'];
        $result1 = mysql_query("INSERT INTO cbct_teeth_master(case_id,prosthetic1,prosthetic2,prosthetic3,Operatice1,Operatice2,Operatice3,Periodontia2,oral_surgery1,oral_surgery2,cosmetic1,radiology1,radiology2,reg_via,creation_date,filling_class,filling_type,scaling_grade,scalling_polishing,surgical_type,cheif_complaint,reg_device_id) VALUES('$case_id','$prosthetic1','$prosthetic2','$prosthetic3','$operative1','$operative2','$operative3','$periodontia2','$oral_surgery1','$oral_surgery2','$cosmetic1','$radiology1','$radiology2','$reg_via',now(),'$filling_class','$filling_type','$scaling_grade','$scalling_polishing','$surgical_type','$cheif_complaint','$ip')");
        return $result1;        
    }

    public function updatePatientData($case_id, $pat_name,$age, $dob, $sex,$address, $tel_no, $mob_no, $email, $profession, $office_addr, $office_no, $ref_by, $blood_group, $diabetes, $drug_reaction, $allergy, $pregnancy, $aspirin, $heart, $blood_pressure, $acidity, $other, $family_doc, $family_doc_contact, $ip, $date,$surgical_type,$scalling_polishing,$scaling_grade,$filling_type,$filling_class,$cheif_complaint,$prosthetic1,$prosthetic2,$prosthetic3,$operative1,$operative2,$operative3,$periodontia2,$oral_surgery1,$oral_surgery2,$cosmetic1,$radiology1,$radiology2) {
        $reg_via = "Web";
        $result = mysql_query("Update case_master set pat_name = '$pat_name',age = '$age',dob = '$dob',sex = '$sex',address = '$address',tel_no = '$tel_no',mob_no = '$mob_no',email='$email',profession = '$profession',office_addr = '$office_addr',office_no = '$office_no',ref_by = '$ref_by',blood_group = '$blood_group',diabetes = '$diabetes',drug_reaction = '$drug_reaction',allergy = '$allergy',pregnancy = '$pregnancy',aspirin = '$aspirin',heart = '$heart',blood_pressure = '$blood_pressure',acidity = '$acidity',other = '$other',family_doc = '$family_doc',family_doc_contact = '$family_doc_contact',reg_via = '$reg_via',reg_device_id = '$ip',modify_date = '$date' WHERE case_id = '$case_id'");
        $result1 = mysql_query("Update cbct_teeth_master set prosthetic1='$prosthetic1',prosthetic2=='$prosthetic2',prosthetic3='$prosthetic3',Operatice1='$operative1',Operatice2='$operative2',Operatice3='$operative3',Periodontia2='$periodontia2',oral_surgery1='$oral_surgery1',oral_surgery2='$oral_surgery2',cosmetic1='$cosmetic1',radiology1='$radiology1',radiology2='$radiology2',reg_via = '$reg_via',reg_device_id = '$ip',modify_date = '$date',filling_class='$filling_class',filling_type='$filling_type',scaling_grade='$scaling_grade',scalling_polishing='$scalling_polishing',surgical_type='$surgical_type',cheif_complaint='$cheif_complaint' WHERE case_id = '$case_id'");
        return $result1;
    }  
    
    public function isPatientExisted($email) {

        $result = mysql_query("SELECT email FROM case_master where email = '$email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        if ($no_rows_res == 1) {
            return $email;
        } else {
            return FALSE;
        }
    }
    
    
    public function insertAppointmentData($ip,$pat_id,$app_date,$app_time) {
        $reg_via = "Web";
        $now_time = date("Y-m-d H:i");
        
        $app_date = date('Y-m-d', strtotime($app_date));
        $result = mysql_query("INSERT INTO appointment_master(pat_id,app_date,app_time,reg_device_id,date_added,status) VALUES('$pat_id','$app_date','$app_time','$ip','$now_time',0)");
        return $result;
    }
    
    public function insert_cbct_teeth_Data($case_id,$oralradiology ,$oralpathology,$tobaccoprogram,$sectional,$maxilla ,$mandible,$both_jaws,$sinus_view,$tmj,$middle_view,$airway,$opg,$lat_cepal,$pa_mandible,$subment_view,$tmj_view,$water_view,$hand_wrist,$town_view,$implant,$pathology,$root_canal,$bone_loss,$impacted,$third_molar,$prosthetic1,$prosthetic2,$prosthetic3,$operative1,$operative2,$operative3,$periodontia1 ,$periodontia2,$oral_surgery1 ,$oral_surgery2 ,$cosmetic1 ,$radiology1,$radiology2,$notes,$excisional,$incisional,$immuno_fluor,$img1,$img2,$img3,$gingiva,$palate_hard,$teeth,$tongue,$tonsil,$buccal_muco,$palate_soft,$uvula,$left,$right,$upper,$lower,$next_date) 
    {
        
        $reg_via = "web";
        
        $result = mysql_query("INSERT INTO cbct_teeth_master(case_id,prosthetic1,prosthetic2,prosthetic3,Operatice1,Operatice2,Operatice3,Periodontia1,Periodontia2,oral_surgery1,oral_surgery2,cosmetic1,radiology1,radiology2,reg_via,creation_date) VALUES('$case_id','$prosthetic1','$prosthetic2','$prosthetic3','$operative1','$operative2','$operative3','$periodontia1','$periodontia2','$oral_surgery1','$oral_surgery2','$cosmetic1','$radiology1','$radiology2','$reg_via',now())");
        
        $result1 = mysql_query("INSERT INTO diagnostic_master(case_id,sectional,maxilla,mandible,both_jaws,tmj,sinus_view,middle_view,airway,implant,pathology,root_canal,bone_loss,impacted,third_molar,opg,lat_cepal,pa_mandible,subment_view,tmj_view,water_view,hand_wrist,town_view,reg_via,creation_date) VALUES('$case_id','$sectional','$maxilla','$mandible','$both_jaws','$tmj','$sinus_view','$middle_view','$airway','$implant','$pathology','$root_canal','$bone_loss','$impacted','$third_molar','$opg','$lat_cepal','$pa_mandible','$subment_view','$tmj_view','$water_view','$hand_wrist','$town_view','$reg_via',now())");
        
        $result2 = mysql_query("INSERT INTO service_master(case_id,oral_radiology,oral_pathology,tob_cess_prgm,reg_via,creation_date) VALUES('$case_id','$oralradiology','$oralpathology','$tobaccoprogram','$reg_via',now())");
        
        //$result3 = mysql_query("INSERT INTO addional_info_master(case_id,excisional,incisional,smear_aspir,immuno_fluor,indicate_img1,indicate_img2,indicate_img3,buccal_muco,gingiva,palate_hard,teeth,tongue,tonsil,uvula,palate_soft,left,right,upper,lower) VALUES('$case_id','$excisional','$oralpathology','$tobaccoprogram','$reg_via',now())");
        
        $result3 = mysql_query("INSERT INTO addional_info_master(case_id,excisional,incisional,immuno_fluor,indicate_img1,indicate_img2,indicate_img3,gingiva,palate_hard,teeth,tongue,tonsil,buccal_muco,uvula,palate_soft,left_side,right_side,upper_side,lower_side,notes,reg_via,creation_date) VALUES('$case_id','$excisional','$incisional','$immuno_fluor','$img1','$img2','$img3','$gingiva','$palate_hard','$teeth','$tongue','$tonsil','$buccal_muco','$uvula','$palate_soft','$left','$right','$upper','$lower','$notes','$reg_via',now())");
        $next_date1 ='';
        
        if($periodontia1 !='' || $periodontia2 !=''){
            $next_date1 = $next_date = date("Y-m-d", strtotime("+6 months"));
        }
        
        if($oral_surgery1 !=''){
            $next_date1 = $next_date = date("Y-m-d", strtotime("+1 months"));
        }
        
        if($oral_surgery2 !=''){
            $next_date1 = $next_date = date("Y-m-d", strtotime("+15 day"));
        }
        
        
        $result4 = mysql_query("INSERT INTO advice_master(case_id,visit_date,next_visit,advice_desc) VALUES('$case_id',now(),'$next_date1','$notes')");
        
         $result5 = mysql_query("Update appointment_master set status = '1' WHERE pat_id = '$case_id'");
         $result5 = mysql_query("Update case_master set status = '1' WHERE case_id = '$case_id'");
         return $result5;
        
    }
    public function insert_cbct_xray_Data($case_id,$filename,$reg_via,$ip,$now_time) {
        $reg_via = "Web";
        $now_time = date("Y-m-d H:i");

        $result = mysql_query("INSERT INTO image_master(case_id,img1,reg_via,reg_device_id,creation_date) VALUES('$case_id','$filename','$reg_via','$ip','$now_time')");
        return $result;
    }    
    
    public function updateAppointmentData($app_id,$pat_id,$app_date,$app_time) {
        
         $now_time = date("Y-m-d H:i");
         $app_date = date('Y-m-d', strtotime($app_date));
         
         $result = mysql_query("Update appointment_master set pat_id = '$pat_id',app_date = '$app_date',app_time = '$app_time',updated_date = '$now_time' WHERE app_id = '$app_id'");
         return $result;
    }
    
    
    public function isAppExisted($app_date,$app_time) {
        
       $app_date = date('Y-m-d', strtotime($app_date));
       $app_time = date('H:i:s', strtotime($app_time)); 
       
       $result = mysql_query("SELECT app_id FROM appointment_master where app_date = '$app_date' and app_time = '$app_time'  ");
       
       $user_data = mysql_fetch_array($result);
       $no_rows_res = mysql_num_rows($result);
       if ($no_rows_res == 1) {
            return 1;
        } else {
            return FALSE;
        }
    }
    
    public function insertCaseData($case_id,$oral_radiology,$oral_pathology,$tob_cess_prgm,$sectional,$maxilla,$mandible,$both_jaws,$tmj,$sinus_view,$middle_view,$airway,$implant,$pathology,$root_canal,$bone_loss,$impacted,$third_molar,$opg,$lat_cepal,$pa_mandible,$subment_view,$tmj_view,$water_view,$hand_wrist,$town_view,$excisional,$incisional,$smear_aspir,$immuno_fluor,$indicate_img,$buccal_muco,$gingiva,$palate_hard,$teeth,$tongue,$tonsil,$uvula,$palate_soft,$left,$right,$upper,$lower,$other_img1,$other_img2,$other_img3,$ip,$date) {
        $reg_via = "Web";
        $result = mysql_query("INSERT INTO service_master(case_id,oral_radiology,oral_pathology,tob_cess_prgm,reg_via,reg_device_id,creation_date) VALUES('$case_id','$oral_radiology','$oral_pathology','$tob_cess_prgm','$reg_via','$ip',STR_TO_DATE('$date','%m/%d/%Y%h:%i'))");
        $result1 = mysql_query("INSERT INTO diagnostic_master(case_id,sectional,maxilla,mandible,both_jaws,tmj,sinus_view,middle_view,airway,implant,pathology,root_canal,bone_loss,impacted,third_molar,opg,lat_cepal,pa_mandible,subment_view,tmj_view,water_view,hand_wrist,town_view,reg_via,reg_device_id,creation_date) VALUES('$case_id','$sectional','$maxilla','$mandible','$both_jaws','$tmj','$sinus_view','$middle_view','$airway','$implant','$pathology','$root_canal','$bone_loss','$impacted','$third_molar','$opg','$lat_cepal','$pa_mandible','$subment_view','$tmj_view','$water_view','$hand_wrist','$town_view','$reg_via','$ip',STR_TO_DATE('$date','%m/%d/%Y%h:%i'))");
        $result1 = mysql_query("INSERT INTO addional_info_master(case_id,excisional,incisional,smear_aspir,immuno_fluor,indicate_img,buccal_muco,gingiva,palate_hard,teeth,tongue,tonsil,uvula,palate_soft,left,right,upper,lower,other_img1,other_img2,other_img3,reg_via,reg_device_id,creation_date) VALUES('$case_id','$excisional','$incisional','$smear_aspir','$immuno_fluor','$indicate_img','$buccal_muco','$gingiva','$palate_hard','$teeth','$tongue','$tonsil','$uvula','$palate_soft','$left','$right','$upper','$lower','$other_img1','$other_img2','$other_img3','$reg_via','$ip',STR_TO_DATE('$date','%m/%d/%Y%h:%i'))");
        return $result;
    }

}
