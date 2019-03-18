<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include_once 'include/DB_Functions.php';
$users = new DB_Functions();

    if(isset($_POST['id']))
    {
        $del_id=$_POST['id'];

        $sql="delete from appointment_master where app_id='$del_id'";
        mysql_query($sql);        
    }
    
    if(isset($_POST['date'])){
        $date = date('Y-m-d', strtotime($_POST['date']));
        
        $book_time = array();
        
        $sql = mysql_query("SELECT app_time FROM appointment_master  where app_date = '$date'");
        //print_r(mysql_fetch_array($patient_sql)); die;
         while ($row = mysql_fetch_array($sql)) {
             
             $book_time[] = date('H:i', strtotime($row['app_time']));
         }
            
            /*if(date('Y-m-d') == $date){
                $starttime =  date('H:i');
            }
            else{
                
                $starttime = '00:30';
            } */
            
            
             $starttime = '00:30';  // your start time
             $endtime = '24:00';  // End time
             $duration = '30';  // split by 30 mins

             $array_of_time = array ();
             $start_time    = strtotime ($starttime); //change to strtotime
             $end_time      = strtotime ($endtime); //change to strtotime

             $add_mins  = $duration * 60;

             while ($start_time <= $end_time) // loop between time
             {
              
              ?> 
                <?php 
                
                    if (in_array(date ("H:i", $start_time), $book_time))
                    {
                        
                    }else{
                        
                        if(date('Y-m-d') == $date){
                           if( date('H:i') < date ("H:i", $start_time)){ ?>
                               <option value="<?php echo date ("H:i", $start_time) ?>"><?php echo date ("H:i", $start_time) ?></option>
                           <?php } 
                        }
                        else{ ?>
                            <option value="<?php echo date ("H:i", $start_time) ?>"><?php echo date ("H:i", $start_time) ?></option>
                        <?php }
                        
                        ?>
                        
                    <?php }
                    
                    /*if($book_time == date ("H:i", $start_time)){

                    }
                    else{
                        ?> <option value="<?php echo date ("H:i", $start_time) ?>"><?php echo date ("H:i", $start_time) ?></option>  <?php 
                    } */
              $start_time += $add_mins; // to check endtie=me
             }
    }

?>
