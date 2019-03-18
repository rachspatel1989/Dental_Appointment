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
   
// receiving the post params
    $pat_id = $_POST['pat_id'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];
   
    $result = mysql_query("SELECT * FROM case_master where case_id='$pat_id'");
    $rows_d = mysql_fetch_array($result);    
    $pt_name = $rows_d['pat_name'];
    $send_mail = $rows_d['email'];
    
    date_default_timezone_set('Asia/Kolkata');
    $date_cr = date('m/d/Y');
    $dt = date("Y/m/d", strtotime($date_cr));
    $St_Time = "01:00:00";
    $date = date('m/d/Y h:i:s a', time());

    // check if patient already exists 
    if ($db->isAppExisted($app_date,$app_time)) {
        // user already exists
        ?>
        <script type="text/javascript">
            alert('Appointment already Exist.');
        </script>
        <?php

    }
    else
    {
        
        $user = $db->insertAppointmentData($ip,$pat_id,$app_date,$app_time);
        if ($user) {
            $to = $send_mail;
            require 'mailer/Send_Mail.php';
            $subject = "Appointment Booked";
            $body = 'Hi  '.$pt_name.' , <br/> <br/> Your appointment booked successfully!<br/> <br/> Your Appointment Date & Time is: ' . $app_date . ' ' . $app_time . '';
            Send_Mail($to, $subject, $body);            
            ?>
            <script type="text/javascript">
                window.location.href = 'caselist.php';
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
    
    $app_id = $_GET['r_id'];
    
    $pat_id = $_POST['pat_id'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];
    
    date_default_timezone_set('Asia/Kolkata');
    $date_cr = date('m/d/Y');
    $dt = date("Y/m/d", strtotime($date_cr));
    $St_Time = "01:00:00";
    $date = date('m/d/Y h:i:s a', time());

    $user = $db->updateAppointmentData($app_id,$pat_id,$app_date,$app_time);
    if ($user) {
        ?>
        <script type="text/javascript">
            UIkit.modal.alert('Appointment Updated!');
            window.location.href = 'appointmentlist.php';
        </script>
        <?php

    } else {
        ?>
        <script type="text/javascript">
            alert('error occured while updating data');
        </script>
        <?php

    }
}
?>



