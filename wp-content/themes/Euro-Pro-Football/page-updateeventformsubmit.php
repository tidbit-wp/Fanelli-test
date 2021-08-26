<?php 
global $wpdb, $user_ID; 
$eventid=$_POST['eventid'];
$datesid=$_POST['dates_id'];
$slotsid=$_POST['slotsid'];
$eventname=$_POST['events_name'];
$eventtype=$_POST['event_type'];
$eventdate=$_POST['events_onetimedate'];
$eventfrontime=$_POST['event_slot_fromtime'];
$eventtotime=$_POST['event_slot_totime'];
$event_capacity=$_POST['event_capacity'];
$eventactive=$_POST['event_active'];

$recurringinfoid=$_POST['recurringinfoid'];
$recurringinfoslotid=$_POST['recurringinfoslotid'];
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
// 
$RecurringEventfromtime=$_POST['ReciringslotFromtime'];
$RecurringEventtotime=$_POST['Recurringslottotime'];
$Recurringeventcapacity=$_POST['Recurringslotcapacity'];

if($eventname !== "" && $eventtype !== ""){

      if($eventtype == "onetime"){

          if($wpdb->update('wp_event', array(
            'event_name' => $eventname,
            'event_type' => $eventtype,
            'event_date' => $eventdate,
            'event_active' =>$eventactive
          ),
          array('event_id' => $eventid)
          )== false )
    
          echo"1stinsert";
          
            if($eventtype && $eventdate ){
                 // $lastid1 = $wpdb->insert_id;
                  if($wpdb->update('wp_dates', array(
                    'event_id' => $eventid,
                    'event_type' => $eventtype,
                    'event_date' => $eventdate,
                    'capacity' => $event_capacity,
                    'active' =>$eventactive
                  ),
                  array('dates_id'=>$datesid)
                  )== false )
                  echo"2ndinsert";
            }
            
            if($eventdate){
             // $lastid2 = $wpdb->insert_id;
              if($wpdb->update('wp_slots', array(
                'dates_id' => $datesid,
                'from_time' => $eventfrontime,
                'to_time' => $eventtotime,
                'capacity' => $event_capacity,
                'active' =>$eventactive
              ),
              array('slots_id' => $slotsid)
              )== false )
              echo"3rdinsert";
            }
      } if($eventtype == "recurring"){

        if($wpdb->update('wp_event', array(
          'event_name' => $eventname,
          'event_type' => $eventtype,
          'event_date'=>"",
          'event_active' =>$eventactive
        ),
        array('event_id' => $eventid)
        )== false )
        echo"1st";
        
          if($RecurringEventstartdate && $RecurringEventenddate ){
           // $Recurrinlastids = $wpdb->insert_id;
            if($wpdb->update('wp_recurring_event_info', array(
              'event_id' => $eventid,
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
            ),
            array('recurring_eventinfo_id' => $recurringinfoid)
            )== false ) 
            echo"2nd";
          }

          if($RecurringEventfromtime && $RecurringEventtotime ){
           // $Recurrinlastids1 = $wpdb->insert_id;
            if($wpdb->update('wp_recurring_eventslot_info', array(
              'from_time' => $RecurringEventfromtime,
              'to_time' => $RecurringEventtotime,
              'capacity' => $Recurringeventcapacity,
              'recurring_eventinfo_id' => $recurringinfoid,
              'active' => $eventactive
            ),
            array('recurring_eventslot_info_id' => $recurringinfoslotid)
            )== false )  
            echo"3rd";
          }

              if($eventtype ){
               
                if($wpdb->update('wp_dates', array(
                  'event_id' => $eventid,
                  'event_type' => $eventtype,
                  'event_date'=>'',
                  'capacity' => $Recurringeventcapacity,
                  'mapping_id'=>'',
                  'recurring_eventinfo_id' => $recurringinfoid,
                  'active' =>$eventactive
                ),
                array('dates_id'=>$datesid)
                )== false )
                echo"4th";
              }
  
              
      
            if($Recurringeventcapacity){ 
              $Recurrinlastids2 = $wpdb->insert_id;
              if($wpdb->update('wp_slots', array(
                'dates_id' => $datesid,
                'from_time' => $RecurringEventfromtime,
                'to_time' => $RecurringEventtotime,
                'capacity' => $Recurringeventcapacity,
                'active' =>$eventactive
              ),
              array('slots_id' => $slotsid)
              )== false )
              echo"5th";
            }
              
            
           
      }

}


// wp_die('Database Insert Faild');
echo"1";

die();



?>

