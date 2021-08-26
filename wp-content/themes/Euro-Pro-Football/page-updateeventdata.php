<?php 
global $wpdb;
$table_name = $wpdb->prefix . "event";
$updateeventid = $_POST['updateeventid'];
$event = $wpdb->get_results( "SELECT * FROM $table_name WHERE event_id =$updateeventid" ); ?>
<style>
	.modall {
		display: none; /*Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 1; /* Sit on top */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content/Box */
	.modall-content {
	background-color: #fefefe;
	margin: 5% auto; /* 15% from the top and centered */
	padding: 20px;
	border: 1px solid #888;
	width: 60%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button */
	.closee {
	color: #aaa;
	float: right;
	font-size: 28px;
	font-weight: bold;
	}

	.closee:hover,
	.closee:focus {
	color: black;
	text-decoration: none;
	cursor: pointer;
	}
</style>
<script>
	// past date disable to end date field
	$(function(){
    var dtToday = new Date();   
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

   // alert(maxDate);
   // $('#EventEndDate').attr('min', maxDate);
	$('#Recuring-startdate').attr('min', maxDate);
	// $('#Recuring-endtdate').attr('min', maxDate);
	$('#Singledate').attr('min', maxDate);	
});
</script>
<script>
$(document).ready(function() { 

    $("#Recuring-startdate").on("change", function(event) { 
			value= $(this).val();
			 $('#Recuring-endtdate').attr('min',value );
		} );

	$('.closee').click(function(){
		$('.modall').css('display','none');
	}); 

    $('input[name="eventtype"]').click(function(){
				var inputValue = $(this).attr("value");
				if(inputValue == "onetime"){
					$('#onetime').css('display','block');
					$('#recurring').css('display','none');
				}
				if(inputValue == "recurring"){
					$('#onetime').css('display','none');
					$('#recurring').css('display','block');   
				}
			});

        if($('input[name="eventtype"]').is(":checked")){
            var inputValue = $('input[name="eventtype"]:checked').val();
            if(inputValue == "onetime"){
                $('#onetime').css('display','block');
                $('#recurring').css('display','none');
            }
            if(inputValue == "recurring"){
                $('#onetime').css('display','none');
                $('#recurring').css('display','block');   
            }
        }

	$('#updateeventformsubmit').click(function(){

		if($('#update_event_active').is(":checked")){
				$('#update_event_active').attr("value","Yes");
			}else{
				$('#update_event_active').attr("value","No");
			}

		
		eventid =$('#eventid').val();
        dates_id=$('#ontimedatesid').val();
        slotsid=$('#ontimeslotsid').val(); 
        events_name=$('#update_event_name').val();
        const event_type = $('input[name="eventtype"]:checked').val();
		events_onetimedate =$('#Singledate').val();
		event_slot_fromtime = $('input[name="slotfromtime"]').val();
		event_slot_totime = $('input[name="slottotime"]').val();
		event_capacity = $('#onetimecapacity').val();
		event_active =$('#update_event_active').val();

        recurringinfoid=$('#recurringinfoidupdated').val();
        recurringinfoslotid=$('#recurringinfoslotid').val();

        var EventTypeRecurringDays = [];
        $('.weekDays-selector input[name="weekly[]"]:checked').each(function(i){
          EventTypeRecurringDays[i] = $(this).val();
        });
		recurringstartdate = $('input[name="recurringstartdate"]').val(); //recurring main from date
		recurringendtdate = $('input[name="recurringendtdate"]').val(); //recurring main To date

		recurringweeklyslotfromtime = $('input[name="recurringweeklyslotfromtime"]').val();
		recurringweeklyslottotime = $(' .weeklyslot #copyforweeklyslot input[name="recurringweeklyslottotime"]').val();
		recurringweeklyslotcapacity = $('#recurringweeklyslotcapacity').val();
// start
if(events_name =='' || $('input[name="eventtype"]:checked').length == 0  || event_type == "onetime" || event_type == "recurring" ){

if(events_name ==''){
    $('#errorupdateeventname').html('Please enter the Event name'); 
    $('#errorupdateeventname').css({"color": "red", "font-size": "18px"});    
}else{
    $('#errorupdateeventname').html('');
}

if($('input[name="eventtype"]:checked').length == 0){
    $('#erroeeventtype').html('Must be select Event type'); 
    $('#erroeeventtype').css({"color": "red", "font-size": "18px"}); 
}else{
    $('#erroeeventtype').html('');
}

 if(event_type == "onetime" ){

    if(events_onetimedate =='' || event_slot_fromtime=='' || event_slot_totime=='' || event_capacity==''){ 
                
                if(events_onetimedate==''){
                    $('#errorsingledate').html('Please enter the Event date'); 
                    $('#errorsingledate').css({"color": "red", "font-size": "18px"});    
                }else{
                    $('#errorsingledate').html('');
                }

                if(event_slot_fromtime==''){
                    $('#errorslotfromtime').html('Please enter the Event from time'); 
                    $('#errorslotfromtime').css({"color": "red", "font-size": "18px"});    
                }else{
                    $('#errorslotfromtime').html('');
                }

                if(event_slot_totime==''){
                    $('#errorslottotime').html('Please enter the Event to time'); 
                    $('#errorslottotime').css({"color": "red", "font-size": "18px"});    
                }else{
                    $('#errorslottotime').html('');
                }

                if(event_capacity==''){
                    $('#erroronetimecapacity').html('Please enter the Event slot capacity'); 
                    $('#erroronetimecapacity').css({"color": "red", "font-size": "18px"});    
                }else{
                    $('#erroronetimecapacity').html('');
                }
        }else{
        jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                eventid:eventid,
                dates_id:dates_id,
                slotsid:slotsid,
                events_name:events_name,
                event_type:event_type,
                events_onetimedate:events_onetimedate,
                event_slot_fromtime:event_slot_fromtime,
                event_slot_totime:event_slot_totime,
                event_capacity:event_capacity,
                event_active:event_active,
                action:'updateeventformsubmit'
            },
            success: function(result)
            {
               // alert(result);
                if(result == '1')
                { 
                    //alert("Product Succesfully added");
                    $('#successmassage').css('display','block');            
                }
            return false;
            }
                    //window.location = '/newthankyou';
            }).done(function() {
                location.reload();
                // setTimeout(function(){
                //     jQuery("#overlay").fadeOut(300);
                // },500);
            }); 
    }

    }
    if(event_type == "recurring"){
        
        if(recurringstartdate =="" || recurringendtdate == "" ||  EventTypeRecurringDays == "" || recurringweeklyslotfromtime=='' || recurringweeklyslottotime =='' || recurringweeklyslotcapacity ==''){ 
         
            if(recurringstartdate == ''){
                $('#erroerecurringFRomdaet').html('Please enter Start date for Recurring'); 
                $('#erroerecurringFRomdaet').css({"color": "red", "font-size": "18px"});
            }else{
                $('#erroerecurringFRomdaet').html('');	
            } 

            if(recurringendtdate == ''){
                $('#erroerecurringEnddaet').html('Please enter End date for Recurring'); 
                $('#erroerecurringEnddaet').css({"color": "red", "font-size": "18px"});
            }else{
                $('#erroerecurringEnddaet').html('');
            } 

            if(EventTypeRecurringDays==''){
                $('#errorweekdays').html('You must be select Week days.'); 
                $('#errorweekdays').css({"color": "red", "font-size": "18px"});   
            }else{
                $('#errorweekdays').html('');
            }

             if(recurringweeklyslotfromtime==''){
                $('#errorweeklyslotfromtime').html('Please enter Recurring Slots FromTime'); 
                $('#errorweeklyslotfromtime').css({"color": "red", "font-size": "18px"});    
            }else{
                $('#errorweeklyslotfromtime').html('');
            }

            if(recurringweeklyslottotime==''){
                $('#errorweeklyslottotime').html('Please enter Recurring Slots ToTime'); 
                $('#errorweeklyslottotime').css({"color": "red", "font-size": "18px"});    
            }else{
                $('#errorweeklyslottotime').html('');
            }

            if(recurringweeklyslotcapacity==''){
                $('#errorweeklyslotcapacity').html('PLease Enter Recurring Slot Capacity'); 
                $('#errorweeklyslotcapacity').css({"color": "red", "font-size": "18px"});    
            }else{
                $('#errorweeklyslotcapacity').html('');
            }
        }else{
        jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                eventid:eventid,
                dates_id:dates_id,
                slotsid:slotsid,
                recurringinfoid:recurringinfoid,
                recurringinfoslotid:recurringinfoslotid,
                events_name:events_name,
                event_type:event_type,
                Recurringstartdate:recurringstartdate,
                Recurringenddate:recurringendtdate,
                Recuringdays:EventTypeRecurringDays,
                ReciringslotFromtime:recurringweeklyslotfromtime,
                Recurringslottotime:recurringweeklyslottotime,
                Recurringslotcapacity:recurringweeklyslotcapacity,
                event_active:event_active,
                action:'updateeventformsubmit'
            },
            success: function(result)
            {
               // alert(result);
                if(result == '1')
                { 
                   // alert("Product Succesfully added");
                    $('#successmassage').css('display','block');            
                }
            return false;
            }
                    //window.location = '/newthankyou';
            }).done(function() {
                location.reload();
                // setTimeout(function(){
                //     jQuery("#overlay").fadeOut(300);
                // },500);
            }); 
    }
    } 
}

		// end
	}); 

}); 
</script>
<?php 
	//var_dump($product_id);
	foreach ($event as $row){   
    $updateeventactive =$row->event_active;
        
    ?><div id="myModal" class="modall">
    <!-- Modal content -->
    <div class="modall-content">
        <div class="row" style="background: #fafafa;margin-bottom: 20px;">
            <div class="col-md-10"><h4>Update Evnets</h4></div>
            <div class="col-md-2"><span class="closee">&times;</span></div>
        </div>
        <form method="post" id="updateeventform">
    
            <div class="form-group row">
                <label for="update_event_name" class="col-sm-4 col-form-label">Event Name</label>
                <div class="col-sm-8">
                <input type="text" class="form-control"  id="update_event_name" value="<?php echo $row->event_name ?>" required>
                <p id="errorupdateeventname"></p>
                <input type="hidden" id="eventid" value="<?php echo $updateeventid;?>">
                </div>
            </div>
            <!--  -->
            <div class="form-group row">
				<label for="eventtype" class="col-sm-4 col-form-label">Event Type </label>
				<div class="col-sm-8">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="eventtype" id="onetimeevent" value="onetime" <?php if($row->event_type == 'onetime'){ ?> checked <?php } ?> disabled="disabled">
						<label class="form-check-label" for="onetimeevent"> One Time Event </label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="eventtype" id="recurringevent" value="recurring" <?php if($row->event_type == 'recurring'){ ?> checked <?php } ?> disabled="disabled">
						<label class="form-check-label" for="recurringevent">Recurring Event</label>
					</div>
				<p id="erroeeventtype"></p>
					<div class="row" id="onetime" style="display:none;background-color: #fafafa; padding: 15px 0px;margin: 10px 0px;">
						<div class="col-md-12" style="margin-bottom: 15px;">
							<label for="Singledate">Select date</label>
							<input type="date" id="Singledate" name="singledate" <?php if($row->event_date){?>value="<?php echo $row->event_date; ?>" <?php } ?> >
							<p id="errorsingledate"></p>
						</div>
						<div class="col-md-12" style="margin-bottom: 15px;">
                            <label for="slotfromtime">From time</label>
                                 <?php  $table_name1 = $wpdb->prefix . "dates";
                                 $dates = $wpdb->get_results( "SELECT * FROM $table_name1 WHERE event_id =$updateeventid" ); 
                                 foreach($dates as $rows){
                                     $ontimedateid=$rows->dates_id;
                                    $table_name2 = $wpdb->prefix . "slots";
                                    $dates2 = $wpdb->get_results( "SELECT * FROM $table_name2 WHERE dates_id =$rows->dates_id" ); 
                                    //var_dump($dates2);
                                    foreach($dates2 as $fnlrws){
                                     $onetimeslotsid=$fnlrws->slots_id; ?>
                                    <input type="hidden"  id="ontimedatesid" value="<?php echo $ontimedateid;?>">
                                    <input type="hidden" id="ontimeslotsid" value="<?php echo $onetimeslotsid;?>">
                                        <input type="time" id="slotfromtime" name="slotfromtime" <?php if($fnlrws->from_time){?>value="<?php echo $fnlrws->from_time; ?>" <?php } ?> >
                                        <p id="errorslotfromtime"></p>
                                            <label for="slottotime">To time</label>
                                            <input type="time" id="slottotime" name="slottotime" <?php if($fnlrws->to_time){?>value="<?php echo $fnlrws->to_time; ?>" <?php } ?> >
                                        <p id="errorslottotime"></p>
                                            <label for="onetimecapacity">Capacity </label>
                                            <input type="number" min="0" max="10000000" height="30px" id="onetimecapacity" <?php if($fnlrws->capacity){?>value="<?php echo $fnlrws->capacity; ?>" <?php } ?> >
                                        <p id="erroronetimecapacity"></p>
                                    <?php  }
                                 } ?>
						</div>
						
					</div>
					<div class="row" id="recurring" style="display:none;background-color: #fafafa; padding: 15px 0px;margin: 10px 0px;">
						<div class="col-md-12" style="margin-bottom: 15px;">
                        <?php  $table_name11 = $wpdb->prefix . "recurring_event_info";
                                 $recurring = $wpdb->get_results( "SELECT * FROM $table_name11 WHERE event_id =$updateeventid" ); 
                                 //var_dump($recurring);
                                 foreach($recurring as $rowsss){ 
                                    $recurringinfoid= $rowsss->recurring_eventinfo_id;
                                     ?>
                             <input type="hidden" id="recurringinfoidupdated" value="<?php echo $recurringinfoid; ?>">        
							<label for="Recuring-startdate">Start date</label>
							<input type="date" id="Recuring-startdate" name="recurringstartdate" <?php if($rowsss->startdate){?>value="<?php echo $rowsss->startdate; ?>" <?php } ?> readonly="readonly"><p id="erroerecurringFRomdaet" ></p>
							<label for="Recuring-endtdate">End date</label>
							<input type="date" id="Recuring-endtdate" name="recurringendtdate" <?php if($rowsss->enddate){?>value="<?php echo $rowsss->enddate; ?>" <?php } ?>><p id="erroerecurringEnddaet" ></p>
						</div>
						<div class="col-md-12">
							<div class="weekDays-selector">
								<input type="checkbox" id="weekday-mon" class="weekday" name="weekly[]" value="Monday" <?php if($rowsss->monday == "Yes"){?>checked <?php } ?> disabled="disabled"/>
								<label for="weekday-mon">Mon</label>
								<input type="checkbox" id="weekday-tue" class="weekday" name="weekly[]" value="Tuesday" <?php if($rowsss->tuesday == "Yes"){?>checked <?php } ?> disabled="disabled"/>
								<label for="weekday-tue">Tue</label>
								<input type="checkbox" id="weekday-wed" class="weekday"  name="weekly[]" value="Wednesday" <?php if($rowsss->wednesday == "Yes"){?>checked <?php } ?> disabled="disabled"/>
								<label for="weekday-wed">Wen</label>
								<input type="checkbox" id="weekday-thu" class="weekday" name="weekly[]" value="Thursday" <?php if($rowsss->thursday == "Yes"){?>checked <?php } ?> disabled="disabled"/>
								<label for="weekday-thu">Thu</label>
								<input type="checkbox" id="weekday-fri" class="weekday" name="weekly[]" value="Friday" <?php if($rowsss->friday == "Yes"){?>checked <?php } ?> disabled="disabled"/>
								<label for="weekday-fri">Fri</label>
								<input type="checkbox" id="weekday-sat" class="weekday" name="weekly[]" value="Saturday" <?php if($rowsss->saturday == "Yes"){?>checked <?php } ?> disabled="disabled"/>
								<label for="weekday-sat">Sat</label>
								<input type="checkbox" id="weekday-sun" class="weekday" name="weekly[]" value="Sunday" <?php if($rowsss->sunday == "Yes"){?>checked <?php } ?> disabled="disabled"/>
								<label for="weekday-sun">Sun</label>
                                <?php } ?>
							</div>
							<p id="errorweekdays">

							<div class="weeklyslot" name="weeklyslot" style="background-color: #eeeeee;margin: 15px 0px;">
								<h4 style="text-align: center;padding: 17px 0px;color: #428bca;"> Recurring TimeSlot </h4>
								<div class="Mainforweeklyslot">
									<div id="copyforweeklyslot">
										<div class="col-md-12">
                                        <?php 
                                        $table_name1122 = $wpdb->prefix . "recurring_eventslot_info";
                                        $recurringslots = $wpdb->get_results( "SELECT * FROM $table_name1122 WHERE recurring_eventinfo_id =$recurringinfoid" );
                                        foreach( $recurringslots as $rowssszzza) { 
                                            $recurringslotsid=$rowssszzza->recurring_eventslot_info_id;
                                            ?>
                                            <input type="hidden" id="recurringinfoslotid" value="<?php echo $recurringslotsid; ?>">
											<label for="recurringweeklyslotfromtime">Slot From time</label>
											<input type="time" id="recurringweeklyslotfromtime" name="recurringweeklyslotfromtime" <?php if($rowssszzza->from_time){?>value="<?php echo $rowssszzza->from_time; ?>" <?php } ?> readonly="readonly"><span id="errorweeklyslotfromtime"></span>
											<label for="recurringweeklyslottotime"> Slot To time</label>
											<input type="time" id="recurringweeklyslottotime" name="recurringweeklyslottotime" <?php if($rowssszzza->to_time){?>value="<?php echo $rowssszzza->to_time; ?>" <?php } ?> readonly="readonly"><span id="errorweeklyslottotime"></span>
											<label for="recurringweeklyslotcapacity">Capacity </label>
											<input type="number" min="0" max="10000000" height="30px" id="recurringweeklyslotcapacity" <?php if($rowssszzza->capacity){?>value="<?php echo $rowssszzza->capacity; ?>" <?php } ?> required readonly="readonly"><span id="errorweeklyslotcapacity"></span>
										<?php } ?></div>
									</div>
								<!-- </div><button id="duplicatedivformonday" style="padding: 5px 10px;margin: 10px 0px 15px 15px;">Add More Slots</button>				 -->
							</div>
                        </div>
					</div>
				
				</div>
				
 			 </div>   

            <!--  -->
            <div class="form-group row">
                <label for="update_event_active" class="col-sm-4 col-form-label">Event active</label>
                <div class="col-sm-8">
                <input type="checkbox" class="form-control" id="update_event_active" required <?php if($updateeventactive == "Yes"){?> checked value="Yes" <?php }else{ ?> value="No" <?php } ?>>
                <p id="errorupdateeventactive"></p>
                </div>
            </div>

            <button type="button" class="btn btn-primary mb-2" id="updateeventformsubmit">Submit</button>
        </form>
        <div class="alert alert-success alert-dismissible fade in" id="successmassage" style="display:none;margin: 20px 0px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Successfully!</strong> Updated Event.
        </div>
    </div>
</div>
<?php } 
die();
?>