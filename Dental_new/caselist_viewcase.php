<?php
session_start();
include_once 'include/DB_Functions.php';
$db = new DB_Functions();
date_default_timezone_set('Asia/Kolkata');
if ($_POST['start_id']) {
    $start_id = $_POST['start_id'];
    $end_id = $_POST['end_id'];

    if ($start_id != "") {
        $start_id;
    } else {
        $start_id = "";
    }
    if ($end_id != "") {
        $end_id;
    } else {
        $end_id = "";
    }
    $start_date = date("Y-m-d", strtotime($start_id));
    $end_date = date("Y-m-d", strtotime($end_id));
    $cur_date = date('Y-m-d');
    $patient_sql = mysql_query("SELECT * FROM case_master INNER JOIN appointment_master ON case_master.case_id = appointment_master.pat_id where appointment_master.status='0' AND (appointment_master.app_date >= '$start_date' AND appointment_master.app_date <= '$end_date')");
    $rows_count = mysql_num_rows($patient_sql);
    ?>

    <h3 class="uk-text-right">Total Appointments : <?php echo $rows_count; ?></h3> 
    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
        <thead>        
            <tr>
                <th>Case</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>                                            
                <th>Email</th>
                <th>Phone#</th>
                <th>Address</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
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
                $address = $patient_row['address'];
                $app_time = $patient_row['app_time'];
                $app_date = $patient_row['app_date'];
                $phone = $patient_row['mob_no'];
                ?>  
                <tr class="gradeX">
                    <td><?php echo $case_no ?></td>
                    <td><a href="casefile.php?r_id=<?php echo $case_id ?>" data-uk-tooltip="{pos:'bottom'}" title="View Case"><?php echo $pat_name ?></a></td>
                    <td><?php echo $age ?></td>
                    <td><?php echo $sex ?></td>
                    <td><a data-uk-modal="{target:'#modal_header_footer<?php echo $send_app_id; ?>'}"><?php echo $email ?></a></td>
                    <td><?php echo $phone ?></td>
                    <td><?php echo $address ?></td>
                    <td><?php echo $app_date ?></td>
                    <td><?php echo $app_time ?></td>
                    <td class="uk-text-center"><a href="casefile.php?r_id=<?php echo $case_id ?>" data-uk-tooltip="{pos:'bottom'}" title="View Case"><i class="material-icons md-24">&#xE8F4;</i></a>
                        <a href="newcase.php?r_id=<?php echo $case_id ?>" data-uk-tooltip="{pos:'bottom'}" title="Edit"><i class="md-icon material-icons">&#xE254;</i></a>
                        <a id="<?php echo $case_id ?>"><i class="material-icons md-24" data-uk-tooltip="{pos:'bottom'}" title="Delete">&#xE872;</i></a>
                        <form method="post" action="">
                            <div class="uk-width-medium-1-3">
                                <div class="uk-modal" id="modal_header_footer<?php echo $send_app_id; ?>">
                                    <div class="uk-modal-dialog">
                                        <div class="uk-modal-header">
                                            <h3 class="uk-modal-title">Reminder</h3>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-1-2 uk-width-medium-1-2">
                                                <div class="uk-input-group">
                                                    <input type="hidden" name="send_name" value="<?php echo $pat_name; ?>"/>
                                                    <input type="hidden" name="send_date" value="<?php echo $app_date; ?>"/>
                                                    <input type="hidden" name="send_time" value="<?php echo $app_time; ?>"/>
                                                    <input type="hidden" name="send_mailid" value="<?php echo $email; ?>"/>
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
    <?php
}
?>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="vendors/jplist/html/js/vendor/modernizr.min.js"></script>
<script src="vendors/jplist/html/js/jplist.min.js"></script>
<script src="vendors/jquery-tablesorter/jquery.tablesorter.js"></script>
<script src="js/table-advanced.js"></script>
<script src="js/jplist.js"></script>

<!-- tablesorter -->
<script src="bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
<script src="bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
<script src="bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
<script src="bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

<!--  issues list functions -->
<script src="assets/js/pages/pages_issues.min.js"></script>        