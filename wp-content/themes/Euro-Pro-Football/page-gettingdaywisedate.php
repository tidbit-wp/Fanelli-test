<?php 

$eventid=$_POST['event_id'];
$mappingid=$_POST['mappingid'];
$selecteddate=$_POST['selecteddatevalue'];
$dates_id=$_POST['dates_id'];
$eventtype=$_POST['eventtype'];
$recurringinfoid=$_POST['recurringinfoid'];

if($eventid){ ?>
<input type="hidden" id="fatchdataforpayment" value="<?php echo $eventonetimedate; ?>" eventid="<?php echo $eventid; ?>" mappingid="<?php echo $mappingid;?>"  datesid="<?php echo $dates_id; ?>" eventtype="<?php echo $eventtype; ?>" >
  <?php 
  if($eventtype == "recurring"){

    if($recurringinfoid && $recurringinfoid !=="0" ){ 
    $table_name55 = $wpdb->prefix . "recurring_eventslot_info";
     $Recurringslotdates = $wpdb->get_results( "SELECT * FROM $table_name55 WHERE recurring_eventinfo_id=$recurringinfoid" ); 
   // var_dump($Recurringslotdates); ?>
    <div class="col-md-6 booking-time hide" ><tr><td colspan="8"><div class="row radio-btns cl-radio"> 
    <?php 
        foreach($Recurringslotdates as $rowssddffee){ 
            $fromtime= $rowssddffee->from_time;
            $fnlfromtime= date("g:i A", strtotime($fromtime));

            $Totime= $rowssddffee->to_time; 
            $fnltotime= date("g:i A", strtotime($Totime));

            $bookedtimeslot=$fnlfromtime ." - " . $fnltotime;
            
            $slotid= $rowssddffee->recurring_eventslot_info_id;
            $recuuringcapacity=$rowssddffee->capacity; ?>
            <input type="hidden" id="recurringfromslot" value="<?php echo $fnlfromtime;?>">
            <input type="hidden" id="recurringtoslot" value="<?php echo $fnltotime;?>">
            <input type="hidden" id="fatchedslotid" slotid="<?php echo $slotid; ?>" capacity="<?php echo $recuuringcapacity; ?>">

           <?php  $table_book = $wpdb->prefix . "book";
                $orderlist = $wpdb->get_results( "SELECT * FROM $table_book WHERE mapping_id=$mappingid AND dates_id=$dates_id AND slot_id=$slotid" );
                //   var_dump($orderlist);
                    $orderlistforOT=0;
                   foreach($orderlist as $ordelistget){
                    //   var_dump($ordelistget->event_date);
                      if($ordelistget->event_date == $selecteddate && $ordelistget->event_timeslot ==  $bookedtimeslot ){
                        $orderlistforOT++;
                      }
                  } 
            if($orderlistforOT < $recuuringcapacity ){ ?>
            <label class="radio-inline"> <input type="radio" class="form-control" name="timeslots" id="getdatesselected"  value="<?php echo $fnlfromtime ." - " . $fnltotime; ?>" selecteddate=""><span class="checkmark"></span><span class="radio-text"><?php echo $fnlfromtime ." - " . $fnltotime; ?></span> </label>
    <?php }

} ?> 
    <p class="extra-text"> 3G- Moulded or Blades to be worn-<br>No Studs Please. </p><span id="errortimeslot"></span> </div></td></tr></div>

<?php
    }
}
if($eventtype == "onetime"){?>
    <input type="hidden" id="adddateontime" value="<?php echo $selecteddate; ?>" >
    <?php $table_name33 = $wpdb->prefix . "slots";
    $slotslist = $wpdb->get_results( "SELECT * FROM $table_name33 WHERE dates_id=$dates_id" );?>
    <div class="col-md-6 booking-time hide" ><tr><td colspan="8"><div class="row radio-btns cl-radio"> 
    <?php 
    foreach($slotslist as $rowssddff){
        $fromtime= $rowssddff->from_time;
        $fnlfromtime= date("g:i A", strtotime($fromtime));

        $Totime= $rowssddff->to_time;
        $fnlTotime= date("g:i A", strtotime($Totime));

        $bookedtimeslot=$fnlfromtime ." - " . $fnlTotime;
        // echo $bookedtimeslot; die();

        $capacity=$rowssddff->capacity;
        $slot_id=$rowssddff->slots_id;?>
        <input type="hidden" id="onetimefromslot" value="<?php echo $fnlfromtime;?>" capacity="<?php echo $capacity;?>">
        <input type="hidden" id="onetimetoslot" value="<?php echo $fnlTotime;?>">
        <input type="hidden" id="fatchedslotid" slotid="<?php echo $slot_id;?>">

        <?php  $table_book = $wpdb->prefix . "book";
                $orderlist = $wpdb->get_results( "SELECT * FROM $table_book WHERE mapping_id=$mappingid AND dates_id=$dates_id AND slot_id=$slot_id" );
                //   var_dump($orderlist);
                    $orderlistforOT=0;
                   foreach($orderlist as $ordelistget){
                    //   var_dump($ordelistget->event_date);
                      if($ordelistget->event_date == $selecteddate && $ordelistget->event_timeslot ==  $bookedtimeslot ){
                        $orderlistforOT++;
                      }
                  } 
            if($orderlistforOT < $capacity ){ ?>
        <label class="radio-inline"> <input type="radio" class="form-control" name="timeslots" id="getdatesselected"  value="<?php echo $fnlfromtime ." - " . $fnlTotime; ?>" selecteddate=""><span class="checkmark"></span><span class="radio-text"><?php echo $fnlfromtime ." - " . $fnlTotime; ?></span> </label>
    <?php }else{ echo'<p class="hidedefault"> No Slot Available. Please select another date. </p>';}

} ?> 
    <p class="extra-text"> 3G- Moulded or Blades to be worn-<br>No Studs Please. </p><span id="errortimeslot"></span> </div></td></tr></div>

    <?php 
} 

}
 die();

