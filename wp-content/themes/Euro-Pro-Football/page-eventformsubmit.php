
 <?php 
global $wpdb, $user_ID; 

$eventname=$_POST['events_name'];
$eventtype=$_POST['event_type'];
$eventdate=$_POST['events_onetimedate'];
// default onetime slot value
$eventfrontime=$_POST['event_slot_fromtime'];
$eventtotime=$_POST['event_slot_totime'];
$event_capacity=$_POST['event_capacity'];
//1st onetime slot value
$eventfrontime1=$_POST['event_slot_fromtime1'];
$eventtotime1=$_POST['event_slot_totime1'];
$event_capacity1=$_POST['event_capacity1'];
//2nd onetime slot value
$eventfrontime2=$_POST['event_slot_fromtime2'];
$eventtotime2=$_POST['event_slot_totime2'];
$event_capacity2=$_POST['event_capacity2'];
//3rd onetime slot value
$eventfrontime3=$_POST['event_slot_fromtime3'];
$eventtotime3=$_POST['event_slot_totime3'];
$event_capacity3=$_POST['event_capacity3'];
//4th onetime slot value
$eventfrontime4=$_POST['event_slot_fromtime4'];
$eventtotime4=$_POST['event_slot_totime4'];
$event_capacity4=$_POST['event_capacity4'];
//5th onetime slot value
$eventfrontime5=$_POST['event_slot_fromtime5'];
$eventtotime5=$_POST['event_slot_totime5'];
$event_capacity5=$_POST['event_capacity5'];


$eventactive=$_POST['event_active'];

$RecurringEventstartdate=$_POST['Recurringstartdate'];
$RecurringEventenddate=$_POST['Recurringenddate'];
$RecurringEventdays=$_POST['Recuringdays'];
// weekday value store
$Mondayvalue=in_array("Monday", $RecurringEventdays);if($Mondayvalue == "1"){$Mondayvalue="Yes";}else{$Mondayvalue="No";}
$Tuesdayvalue=in_array("Tuesday", $RecurringEventdays);if($Tuesdayvalue == "1"){$Tuesdayvalue="Yes";}else{$Tuesdayvalue="No";}
$Wednesdayvalue=in_array("Wednesday", $RecurringEventdays);if($Wednesdayvalue == "1"){$Wednesdayvalue="Yes";}else{$Wednesdayvalue="No";}
$Thursdayvalue=in_array("Thursday", $RecurringEventdays);if($Thursdayvalue == "1"){$Thursdayvalue="Yes";}else{$Thursdayvalue="No";}
$Fridayvalue=in_array("Friday", $RecurringEventdays);if($Fridayvalue == "1"){$Fridayvalue="Yes";}else{$Fridayvalue="No";}
$Saturdayvalue=in_array("Saturday", $RecurringEventdays);if($Saturdayvalue == "1"){$Saturdayvalue="Yes";}else{$Saturdayvalue="No";}
$Sundayvalue=in_array("Sunday", $RecurringEventdays);if($Sundayvalue == "1"){$Sundayvalue="Yes";}else{$Sundayvalue="No";}
// default value
$RecurringEventfromtime=$_POST['ReciringslotFromtime'];
$RecurringEventtotime=$_POST['Recurringslottotime'];
$Recurringeventcapacity=$_POST['Recurringslotcapacity'];
// 1st value slot
$RecurringEventfromtime1=$_POST['ReciringslotFromtime1'];
$RecurringEventtotime1=$_POST['Recurringslottotime1'];
$Recurringeventcapacity1=$_POST['Recurringslotcapacity1'];
//2nd value slot
$RecurringEventfromtime2=$_POST['ReciringslotFromtime2'];
$RecurringEventtotime2=$_POST['Recurringslottotime2'];
$Recurringeventcapacity2=$_POST['Recurringslotcapacity2'];
//3rd value slot
$RecurringEventfromtime3=$_POST['ReciringslotFromtime3'];
$RecurringEventtotime3=$_POST['Recurringslottotime3'];
$Recurringeventcapacity3=$_POST['Recurringslotcapacity3'];
//4th value slot
$RecurringEventfromtime4=$_POST['ReciringslotFromtime4'];
$RecurringEventtotime4=$_POST['Recurringslottotime4'];
$Recurringeventcapacity4=$_POST['Recurringslotcapacity4'];
//5th value slot
$RecurringEventfromtime5=$_POST['ReciringslotFromtime5'];
$RecurringEventtotime5=$_POST['Recurringslottotime5'];
$Recurringeventcapacity5=$_POST['Recurringslotcapacity5'];

if($eventname !== "" && $eventtype !== ""){

      if($eventtype == "onetime"){

          if($wpdb->insert('wp_event', array(
            'event_name' => $eventname,
            'event_type' => $eventtype,
            'event_date' => $eventdate,
            'event_active' =>$eventactive
          ))== false )
    
          echo"1stinsert";
          
            if($eventtype && $eventdate ){
                  $lastid1 = $wpdb->insert_id;
                  if($wpdb->insert('wp_dates', array(
                    'event_id' => $lastid1,
                    'event_type' => $eventtype,
                    'event_date' => $eventdate,
                    'capacity' => $event_capacity,
                    'active' =>$eventactive
                  ))== false )
                  echo"2ndinsert";
            }
            
            if($eventdate){
              $lastid2 = $wpdb->insert_id;
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $lastid2,
                'from_time' => $eventfrontime,
                'to_time' => $eventtotime,
                'capacity' => $event_capacity,
                'active' =>$eventactive
              ))== false )
              echo"3rdinsert";
            }
            if($event_capacity1){
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $lastid2,
                'from_time' => $eventfrontime1,
                'to_time' => $eventtotime1,
                'capacity' => $event_capacity1,
                'active' =>$eventactive
              ))== false )
              echo"3rdinsert";
            }
            if($event_capacity2){
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $lastid2,
                'from_time' => $eventfrontime2,
                'to_time' => $eventtotime2,
                'capacity' => $event_capacity2,
                'active' =>$eventactive
              ))== false )
              echo"3rdinsert";
            }
            if($event_capacity3){
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $lastid2,
                'from_time' => $eventfrontime3,
                'to_time' => $eventtotime3,
                'capacity' => $event_capacity3,
                'active' =>$eventactive
              ))== false )
              echo"3rdinsert";
            }
            if($event_capacity4){
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $lastid2,
                'from_time' => $eventfrontime4,
                'to_time' => $eventtotime4,
                'capacity' => $event_capacity4,
                'active' =>$eventactive
              ))== false )
              echo"3rdinsert";
            }
            if($event_capacity5){
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $lastid2,
                'from_time' => $eventfrontime5,
                'to_time' => $eventtotime5,
                'capacity' => $event_capacity5,
                'active' =>$eventactive
              ))== false )
              echo"3rdinsert";
            }
            
      } if($eventtype == "recurring"){

        if($wpdb->insert('wp_event', array(
          'event_name' => $eventname,
          'event_type' => $eventtype,
          'event_date'=>"",
          'event_active' =>$eventactive
        ))== false )
        echo"1st";
        
          if($RecurringEventstartdate && $RecurringEventenddate ){
            $Recurrinlastids = $wpdb->insert_id;
            if($wpdb->insert('wp_recurring_event_info', array(
              'event_id' => $Recurrinlastids,
              'monday' => $Mondayvalue,
              'tuesday' => $Tuesdayvalue,
              'wednesday' => $Wednesdayvalue,
              'thursday' => $Thursdayvalue,
              'friday' => $Fridayvalue,
              'saturday' => $Saturdayvalue,
              'sunday' => $Sundayvalue,
              'startdate'=>$RecurringEventstartdate,
              'enddate'=>$RecurringEventenddate,
              'active' =>$eventactive
            ))== false ) 
            echo"2nd";
          }

          if($RecurringEventfromtime && $RecurringEventtotime ){
            $Recurrinlastids1 = $wpdb->insert_id;
            if($wpdb->insert('wp_recurring_eventslot_info', array(
              'from_time' => $RecurringEventfromtime,
              'to_time' => $RecurringEventtotime,
              'capacity' => $Recurringeventcapacity,
              'recurring_eventinfo_id' => $Recurrinlastids1,
              'active' => $eventactive
            ))== false )  
            echo"3rd";
          }
          if($RecurringEventfromtime1 && $RecurringEventtotime1 ){

            if($wpdb->insert('wp_recurring_eventslot_info', array(
              'from_time' => $RecurringEventfromtime1,
              'to_time' => $RecurringEventtotime1,
              'capacity' => $Recurringeventcapacity1,
              'recurring_eventinfo_id' => $Recurrinlastids1,
              'active' => $eventactive
            ))== false )  
            echo"recu1";
         
          }
          if($RecurringEventfromtime2 && $RecurringEventtotime2 ){

            if($wpdb->insert('wp_recurring_eventslot_info', array(
              'from_time' => $RecurringEventfromtime2,
              'to_time' => $RecurringEventtotime2,
              'capacity' => $Recurringeventcapacity2,
              'recurring_eventinfo_id' => $Recurrinlastids1,
              'active' => $eventactive
            ))== false )  
            echo"recu1";
         
          }
          if($RecurringEventfromtime3 && $RecurringEventtotime3 ){

            if($wpdb->insert('wp_recurring_eventslot_info', array(
              'from_time' => $RecurringEventfromtime3,
              'to_time' => $RecurringEventtotime3,
              'capacity' => $Recurringeventcapacity3,
              'recurring_eventinfo_id' => $Recurrinlastids1,
              'active' => $eventactive
            ))== false )  
            echo"recu1";
         
          }
          if($RecurringEventfromtime4 && $RecurringEventtotime4 ){

            if($wpdb->insert('wp_recurring_eventslot_info', array(
              'from_time' => $RecurringEventfromtime4,
              'to_time' => $RecurringEventtotime4,
              'capacity' => $Recurringeventcapacity4,
              'recurring_eventinfo_id' => $Recurrinlastids1,
              'active' => $eventactive
            ))== false )  
            echo"recu1";
         
          }
          if($RecurringEventfromtime5 && $RecurringEventtotime5 ){

            if($wpdb->insert('wp_recurring_eventslot_info', array(
              'from_time' => $RecurringEventfromtime5,
              'to_time' => $RecurringEventtotime5,
              'capacity' => $Recurringeventcapacity5,
              'recurring_eventinfo_id' => $Recurrinlastids1,
              'active' => $eventactive
            ))== false )  
            echo"recu1";
         
          }


              if($eventtype ){
               
                if($wpdb->insert('wp_dates', array(
                  'event_id' => $Recurrinlastids,
                  'event_type' => $eventtype,
                  'event_date'=>'',
                  'capacity' => $Recurringeventcapacity,
                  'mapping_id'=>'',
                  'recurring_eventinfo_id' => $Recurrinlastids1,
                  'active' =>$eventactive
                ))== false )
                echo"4th";
              }
  
              
      
            if($Recurringeventcapacity){ 
              $Recurrinlastids2 = $wpdb->insert_id;
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $Recurrinlastids2,
                'from_time' => $RecurringEventfromtime,
                'to_time' => $RecurringEventtotime,
                'capacity' => $Recurringeventcapacity,
                'active' =>$eventactive
              ))== false )
              echo"5th";
            }
            if($Recurringeventcapacity1){ 
             
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $Recurrinlastids2,
                'from_time' => $RecurringEventfromtime1,
                'to_time' => $RecurringEventtotime1,
                'capacity' => $Recurringeventcapacity1,
                'active' =>$eventactive
              ))== false )
              echo"REc2slots";
            }
            if($Recurringeventcapacity2){ 
             
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $Recurrinlastids2,
                'from_time' => $RecurringEventfromtime2,
                'to_time' => $RecurringEventtotime2,
                'capacity' => $Recurringeventcapacity2,
                'active' =>$eventactive
              ))== false )
              echo"REc2slots";
            }
            if($Recurringeventcapacity3){ 
             
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $Recurrinlastids2,
                'from_time' => $RecurringEventfromtime3,
                'to_time' => $RecurringEventtotime3,
                'capacity' => $Recurringeventcapacity3,
                'active' =>$eventactive
              ))== false )
              echo"REc2slots";
            }
            if($Recurringeventcapacity4){ 
             
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $Recurrinlastids2,
                'from_time' => $RecurringEventfromtime4,
                'to_time' => $RecurringEventtotime4,
                'capacity' => $Recurringeventcapacity4,
                'active' =>$eventactive
              ))== false )
              echo"REc2slots";
            }
            if($Recurringeventcapacity5){ 
             
              if($wpdb->insert('wp_slots', array(
                'dates_id' => $Recurrinlastids2,
                'from_time' => $RecurringEventfromtime5,
                'to_time' => $RecurringEventtotime5,
                'capacity' => $Recurringeventcapacity5,
                'active' =>$eventactive
              ))== false )
              echo"REc2slots";
            }

              
            
           
      }

}


// wp_die('Database Insert Faild');
echo"1";

die();



?>

