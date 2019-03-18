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

if (isset($_POST['btn-save'])) {

    $ip = ipCheck();
    $case_id = $_POST['case_id'];
    $next_date  ='';
    
// receiving the post params
    if(isset($_POST['oralradiology'])){
        $oralradiology = $_POST['oralradiology']; 
    }
    else{
        $oralradiology ='';
    }
    
    if(isset($_POST['oralpathology'])){
         $oralpathology = $_POST['oralpathology'];
    }
    else{
         $oralpathology = '';

    }
    
    
    if(isset($_POST['tobaccoprogram'])){
        $tobaccoprogram= $_POST['tobaccoprogram'];
    }
    else{
        $tobaccoprogram ='';
    }
    
    
    if(isset($_POST['sectional'])){
        $sectional = $_POST['sectional'];
    }
    else{
        $sectional = '';
    }
    
    if(isset($_POST['maxilla'])){
        $maxilla = $_POST['maxilla'];
    }
    else{
        $maxilla = '';;
    }
    
    if(isset($_POST['mandible'])){
        $mandible = $_POST['mandible'];
    }
    else{
        $mandible = '';
    }
    
    if(isset($_POST['both_jaws'])){
        $both_jaws= $_POST['both_jaws'];
    }
    else{
        $both_jaws= '';
    }
    
    if(isset($_POST['sinus_view'])){
        $sinus_view = $_POST['sinus_view'];
    }
    else{
        $sinus_view = '';
    }
    
    if(isset($_POST['tmj'])){
        $tmj = $_POST['tmj'];
    }
    else{
        $tmj = '';
    }
    
    if(isset($_POST['middle_view'])){
        $middle_view = $_POST['middle_view'];
    }
    else{
        $middle_view = '';
    }
    
    if(isset($_POST['airway'])){
         $airway= $_POST['airway'];
    }
    else{
         $airway= '';
    }
    
    if(isset($_POST['opg'])){
        $opg = $_POST['opg'];
    }
    else{
        $opg = '';
    }
    
    if(isset($_POST['lat_cepal'])){
        $lat_cepal = $_POST['lat_cepal'];
    }
    else{
        $lat_cepal = '';
    }
    
    if(isset($_POST['pa_mandible'])){
         $pa_mandible = $_POST['pa_mandible'];
    }
    else{
        $pa_mandible = ''; 
    }
    
    if(isset($_POST['subment_view'])){
        $subment_view= $_POST['subment_view'];
    }
    else{
        $subment_view= '';
    }
    
    if(isset($_POST['tmj_view'])){
        $tmj_view = $_POST['tmj_view'];
    }
    else{
        $tmj_view = '';
    }
    
    if(isset($_POST['water_view'])){
         $water_view = $_POST['water_view'];
    }
    else{
         $water_view = '';
    }
    
    if(isset($_POST['hand_wrist'])){
         $hand_wrist = $_POST['hand_wrist'];
    }
    else{
         $hand_wrist = '';
    }
    
    if(isset($_POST['town_view'])){
         $town_view= $_POST['town_view'];
    }
    else{
         $town_view= '';
    }
    
    if(isset($_POST['implant'])){
        $implant = $_POST['implant'];
    }
    else{
        $implant = '';
    }
    
    if(isset($_POST['pathology'])){
        $pathology = $_POST['pathology'];
    }
    else{
        $pathology = '';
    }
    
    if(isset($_POST['root_canal'])){
        $root_canal = $_POST['root_canal'];
    }
    else{
        $root_canal = '';
    }
    
    if(isset($_POST['bone_loss'])){
        $bone_loss= $_POST['bone_loss'];
    }
    else{
        $bone_loss= '';
    }
    
    if(isset($_POST['impacted'])){
         $impacted = $_POST['impacted'];
    }
    else{
         $impacted = '';
    }
    
    if(isset($_POST['third_molar'])){
        $third_molar = $_POST['third_molar'];
    }
    else{
        $third_molar = '';
    }
    
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
    
    /*  */
    if(isset($_POST['notes'])){
        $notes = $_POST['notes'];
    }
 else {
       $notes = '';
    }
    
    
    if(isset($_POST['excisional'])){
        $excisional = $_POST['excisional'];
    }
    else {
       $excisional = '';
    }
    
    
    if(isset($_POST['incisional'])){
        $incisional = $_POST['incisional'];
    }
 else {
       $incisional = '';
    }
    
    if(isset($_POST['immuno_fluor'])){
        $immuno_fluor = $_POST['immuno_fluor'];
    }
 else {
       $immuno_fluor = '';
    }
    
    if(isset($_POST['img1'])){
        $img1 = $_POST['img1'];
    }
 else {
       $img1 = '';
    }
    
    if(isset($_POST['img2'])){
        $img2 = $_POST['img2'];
    }
 else {
       $img2 = '';
    }
    
    if(isset($_POST['img3'])){
        $img3 = $_POST['img3'];
    }
     else {
       $img3 = '';
    }
    
    if(isset($_POST['gingiva'])){
        $gingiva = $_POST['gingiva'];
    }
 else {
       $gingiva = '';
    }
    
    if(isset($_POST['palate_hard'])){
        $palate_hard = $_POST['palate_hard'];
    }
 else {
       $palate_hard = '';
    }
    
    if(isset($_POST['teeth'])){
        $teeth = $_POST['teeth'];
    }
 else {
       $teeth = '';
    }
    
    if(isset($_POST['tongue'])){
        $tongue = $_POST['tongue'];
    }
 else {
       $tongue = '';
    }
    
    
    if(isset($_POST['tonsil'])){
        $tonsil = $_POST['tonsil'];
    }
 else {
       $tonsil = '';
    }
    
    if(isset($_POST['buccal_muco'])){
        $buccal_muco = $_POST['buccal_muco'];
    }
 else {
       $buccal_muco = '';
    }
    
    if(isset($_POST['palate_soft'])){
        $palate_soft = $_POST['palate_soft'];
    }
 else {
       $palate_soft = '';
    }
    
    if(isset($_POST['uvula'])){
        $uvula = $_POST['uvula'];
    }
 else {
       $uvula = '';
    }
    
    if(isset($_POST['left'])){
        $left = $_POST['left'];
    }
 else {
       $left = '';
    }
    
    if(isset($_POST['right'])){
        $right = $_POST['right'];
    }
 else {
       $right = '';
    }
    
    
    if(isset($_POST['upper'])){
        $upper = $_POST['upper'];
    }
 else {
       $upper = '';
    }
    
    if(isset($_POST['lower'])){
        $lower = $_POST['lower'];
    }
 else {
       $lower = '';
    }
    
//    $image_yes = $_POST['yesimage'];
//    $image_no = $_POST['noimage'];
//    $image_file = $_POST['photoimg'];
    

    date_default_timezone_set('Asia/Kolkata');
    $date_cr = date('m/d/Y');
    $dt = date("Y/m/d", strtotime($date_cr));
    $St_Time = "01:00:00";
    $date = date('m/d/Y h:i:s a', time());

     $user = $db->insert_cbct_teeth_Data($case_id,$oralradiology ,$oralpathology,$tobaccoprogram,$sectional,$maxilla ,$mandible,$both_jaws,$sinus_view,$tmj,$middle_view,$airway,$opg,$lat_cepal,$pa_mandible,$subment_view,$tmj_view,$water_view,$hand_wrist,$town_view,$implant,$pathology,$root_canal,$bone_loss,$impacted,$third_molar,$prosthetic1,$prosthetic2,$prosthetic3,$operative1,$operative2,$operative3,$periodontia1 ,$periodontia2,$oral_surgery1 ,$oral_surgery2 ,$cosmetic1 ,$radiology1,$radiology2,$notes,$excisional,$incisional,$immuno_fluor,$img1,$img2,$img3,$gingiva,$palate_hard,$teeth,$tongue,$tonsil,$buccal_muco,$palate_soft,$uvula,$left,$right,$upper,$lower,$next_date);
        if ($user) {
            ?>
            <script type="text/javascript">
                window.location.href = 'caselist.php';
            </script>
            <?php

        } 
        else
        {
            ?>
            <script type="text/javascript">
                alert('error occured while inserting data');
            </script>
            <?php

        }    
    $path = "upload/xray/";
    $valid_formats = array("jpg", "png", "gif", "bmp");
    $result_chec = mysql_query("SELECT * from image_master WHERE case_id = '$case_id'");
    $no_rowup = mysql_num_rows($result_chec);
    if($no_rowup>= 5)
    {
        ?>
            <script type="text/javascript">
                alert('Maximum 5 images upload in gallery');
            </script>
        <?php
    }
    else
    {
//        echo 'image data';
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
                                                                    $server = 'http://'.$_SERVER['HTTP_HOST'].'/';
                                                                    echo $filename = $server.$path.$actual_image_name;
                                                            
//                                                                    mysqli_query($db,"UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
									
                                                                    $upload_sql = $db->insert_cbct_xray_Data($case_id,$filename,$reg_via,$ip,$now_time);
                                                                    if ($upload_sql) 
                                                                    {
                                                                        echo '<p style="color: red;text-align: center;">'."Upload Image successfully.".'</style>'.'<br>';
                                                            //            header("location:profile.php??salon_id=$_GET[salon_id]");                                                                        
                                                                        
                                                                    }
                                                                    else 
                                                                    {
                                                                        echo '<p style="color: red;text-align: center;">'."Somethig went wrong for update information.".'</style>'.'<br>';        
                                                                    }                                                                    
								}							
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
    }
}        
    
        ?>



