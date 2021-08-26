<script type="text/javascript" src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-includes/js/jquery/jquery.min.js?ver=3.5.1" id="jquery-core-js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<style>
    #datep {
        display: none;
    }
    .ui-datepicker-calendar tbody td > a.hover-calendar-cell {
        border: 1px solid #074e91;
        background: #5bacf7 url(images/ui-bg_glass_15_5bacf7_1x400.png) 50% 50% repeat-x;
        font-weight: normal;
        color: #1a1a1a;
    }
    #addon{background-color:#999; width:100%}
    td.highlight a{
    color:yellow;
    }
</style>
<?php 
global $wpdb;
$productname=$_POST['productname'];
$productid=$_POST['productid'];
$locationid=$_POST['locationid'];
$subloccationid=$_POST['sublocatioid'];

if($productid && $locationid && $subloccationid){
    $table_name11 = $wpdb->prefix . "mapping";
    $eventlist = $wpdb->get_results( "SELECT * FROM $table_name11 WHERE product_id=$productid AND location_id=$locationid AND sublocation_id=$subloccationid AND mapping_active='Yes' ");
  	$date_array=array();
    foreach($eventlist as $rows){
    $eventkiID=$rows->event_id;  
    $mappingkiID=$rows->mapping_id;

        $table_name22 = $wpdb->prefix . "dates";
        $datelist = $wpdb->get_results( "SELECT * FROM $table_name22 WHERE event_id=$eventkiID" );

        foreach($datelist as $rowsdd){
            $dateis=$rowsdd->dates_id;
            $eventtype=$rowsdd->event_type;
            $eventonetimedate=$rowsdd->event_date;
            $recurringinfoid=$rowsdd->recurring_eventinfo_id;
            ?>
				<?php 
			
				if($eventtype=="onetime" && $eventonetimedate){

					$date_array['eventid'][]=$eventkiID;
          $date_array['mappingid'][]=$mappingkiID;         
          $date_array['datesid'][]=$dateis;
          $date_array['recurringinfoid'][]=$recurringinfoid; 
					$date_array['date'][]=$eventonetimedate;
					$date_array['eventtype'][]=$eventtype;
					
                $table_name33 = $wpdb->prefix . "slots";
                $slotslist = $wpdb->get_results( "SELECT * FROM $table_name33 WHERE dates_id=$dateis" );
                foreach($slotslist as $rowssddff){
                    $fromtime= $rowssddff->from_time;
                    $Totime= $rowssddff->to_time;
                    $capacity=$rowssddff->capacity;

                   $slot_id=$rowssddff->slots_id;
                   // get order count
                   $table_book = $wpdb->prefix . "book";
                   $orderlist = $wpdb->get_results( "SELECT * FROM $table_book WHERE mapping_id=$mappingkiID AND dates_id=$dateis AND slot_id=$slot_id" );
                //   var_dump($orderlist);
                    $orderlistforOT=0;
                   foreach($orderlist as $ordelistget){
                    //   var_dump($ordelistget->event_date);
                      if($ordelistget->event_date == $eventonetimedate ){
                        $orderlistforOT++;
                      }
                  }
				   //  $date_array['orderlistforOT'][]=$orderlistforOT;
                   // var_dump($eventonetimedate);
                  // $countdata=count($orderlist);
                  // var_dump($countdata);                  
                   ?>
                   <?php //get_headers();
				   
				  // $date_array['slot_id'][]=$slot_id;
                   ?>
               <?php }

            }else{
            if($eventtype=="recurring" && $recurringinfoid){
                $table_name44 = $wpdb->prefix . "recurring_event_info";
                $Recurringdates = $wpdb->get_results( "SELECT * FROM $table_name44 WHERE recurring_eventinfo_id= $recurringinfoid" );
                foreach($Recurringdates as $rqss){ 
                    $Rec_startdate=$rqss->startdate;
                    $Rec_enddate=$rqss->enddate;
                    $Rec_mondayvalue=$rqss->monday;
                    $Rec_tuesdayvalue=$rqss->tuesday;       
                    $Rec_wednesdayvalue=$rqss->wednesday;
                    $Rec_thursdayvalue=$rqss->thursday; 
                    $Rec_fridayvalue=$rqss->friday;
                    $Rec_saturdayvalue=$rqss->saturday; 
                    $Rec_sundayvalue=$rqss->sunday;  

                   
                   
                    $current = strtotime($Rec_startdate);
                    $date2 = strtotime($Rec_enddate);
                    $stepVal = '+1 day';
                    while( $current <= $date2 ) 
                      {
                          $day = date('D', $current);
                          $current_date=date('Y-m-d', $current);
                          $check="";

                          if($day == 'Mon')
                          {
                            $check= $Rec_mondayvalue;  
                          }
                          else if($day == 'Tue')
                          {
                            $check= $Rec_tuesdayvalue;
                          }
                            else if($day == 'Wed')
                          {
                            $check= $Rec_wednesdayvalue;
                          }
                          else if($day == 'Thu')
                          {
                            $check= $Rec_thursdayvalue;
                          }
                          else if($day == 'Fri')
                          {
                            $check= $Rec_fridayvalue;
                          }
                          else if($day == 'Sat')
                          {
                            $check= $Rec_saturdayvalue;
                          }
                            else if($day == 'Sun')
                          {
                            $check= $Rec_sundayvalue;
                          }
                      
                          if($check == 'Yes')
                        { 
                          $date_array['eventid'][]=$eventkiID;
                          $date_array['mappingid'][]=$mappingkiID; 
                          $date_array['eventtype'][]=$eventtype;
                          $date_array['datesid'][]=$dateis;
                          $date_array['recurringinfoid'][]=$recurringinfoid; 
                          $date_array['date'][] =$current_date;
                        }
                        $current = strtotime($stepVal, $current);
                      }

                    } 
                } 
            } 
        } 
    }
 

	//   echo '<pre>';
	// print_r($date_array);
	// echo '</pre>';  
	?>
	   <label style="display: block;margin-top:20px;">PLEASE SELECT A DATE AND TIME BELOW:</label>
	     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                    jQuery(document).ready(function(jQuery){  

                    // var getvalue=$('#adddateontime').val();
                    // $('#datep').attr('value',getvalue);
                    /* var fromtimeOT=$('#onetimefromslot').val();
                    var TotimeOT=$('#onetimetoslot').val();
                    var capacity=$('#onetimefromslot').attr('capacity');

                    var fnlfromtime=moment(fromtimeOT, 'HH:mm:ss').format('HH:mm');
                    var fnltotime=moment(TotimeOT, 'HH:mm:ss').format('HH:mm'); */

                     var newArray = [];
                    // var fromtime = [];
                    // var Totime = [];
                    // var orderlistforOT = [];
                    // var capacity = [];
                    // var slot_id = [];
                    var eventid = [];
                   var mappingid = [];
                   var datesid = [];
                   var recurringinfoid = [];
                   var eventtype = [];
					var newArray = <?php echo json_encode($date_array['date']); ?>;
					/* console.log('111111');
					console.log(newArray); */
                 /* jQuery( "#adddateontime" ).each(function() {
                        newArray.push(jQuery( this ).val());
                    });  */
                   // console.log(newArray);

                            var highlight_dates = newArray;
                            var $datePicker = jQuery("#datepicker");
                            $datePicker.datepicker({
                                changeMonth: false,
                                changeYear: false,
                                dateFormat: 'yy-mm-dd',
                                inline: true,
                                altField: "#datep",
                                minDate: 0,
                                beforeShowDay: function(date){
                                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                                    var year = date.getFullYear();
                                    var day = ('0' + date.getDate()).slice(-2);
                                    // Change format of date
                                    var newdate = year+"-"+month+'-'+day;
                                    // Set tooltip text when mouse over date
                                    var tooltip_text = "New event on " + newdate;
                                    // Check date in Array
                                    if(jQuery.inArray(newdate, highlight_dates) != -1){
                                        return [true, "highlight", tooltip_text ];
                                    }
                                    return [false];
                                }
                               
                            }).change(function(e){
                            var hj= $(this).val();
						              	console.log(hj);
							              var date_index='';
                            
                            newArray.forEach(function (value, index) 
                            {
                              if(value == hj)
                              {
                                date_index=index;
                              }
                            });
							
							//console.log(date_index);
							//var fromtimeOT='<?php //echo $date_array["fromtime"][0]; ?>';
							//  fromtimeOT=<?php //echo json_encode($date_array['fromtime']); ?>;
							//  fromtimeOT.forEach(function (value1, index1) 
							// {
							// 	if(index1 == date_index)
							// 	{
							// 		fromtimeOT_val=value1;
							// 	}
							// });
							
							// //var TotimeOT='<?php //echo $date_array["Totime"][0]; ?>';
							//  TotimeOT=<?php //echo json_encode($date_array['Totime']); ?>;
							//  TotimeOT.forEach(function (value2, index2) 
							// {
							// 	if(index2 == date_index)
							// 	{
							// 		TotimeOT_val=value2;
							// 	}
							// });
							
							//  orderlistforOT=<?php //echo json_encode($date_array['orderlistforOT']); ?>;
							//  orderlistforOT.forEach(function (value3, index3) 
							// {
							// 	if(index3 == date_index)
							// 	{
							// 		orderlistforOT_val=value3;
							// 	}
							// });

							eventtype=<?php echo json_encode($date_array['eventtype']); ?>;
							 eventtype.forEach(function (value4, index4) 
							{
								if(index4 == date_index)
								{
									eventtype_val=value4;
								}
							});

							// slot_id=<?php// echo json_encode($date_array['slot_id']); ?>;
							//  slot_id.forEach(function (value5, index5) 
							// {
							// 	if(index5 == date_index)
							// 	{
							// 		slot_id_val=value5;
							// 	}
							// });
							
							eventid=<?php echo json_encode($date_array['eventid']); ?>;
							 eventid.forEach(function (value6, index6) 
							{
								if(index6 == date_index)
								{
									eventid_val=value6;
								}
							});

							mappingid=<?php echo json_encode($date_array['mappingid']); ?>;
							 mappingid.forEach(function (value7, index7) 
							{
								if(index7 == date_index)
								{
									mappingid_val=value7;
								}
							});
							
							datesid=<?php echo json_encode($date_array['datesid']); ?>;
							 datesid.forEach(function (value8, index8) 
							{
								if(index8 == date_index)
								{
									datesid_val=value8;
								}
							});
							
							recurringinfoid=<?php echo json_encode($date_array['recurringinfoid']); ?>;
              recurringinfoid.forEach(function (value9, index9) 
							{
								if(index9 == date_index)
								{
									recurringinfoid_val=value9;
								}
							});

                      $.ajax({
                                type :'POST',
                                url : '<?php echo admin_url('admin-ajax.php'); ?>',
                                data : {
                                        'action' : 'forcommondevents',
                                        'event_id': eventid_val,
                                        'mappingid':mappingid_val,
                                        'eventtype':eventtype_val,
                                        'dates_id': datesid_val,
                                        'recurringinfoid': recurringinfoid_val,
                                        'selecteddatevalue': hj,
                                        
                                },
                                success: function (result) {
                                    
                                    
                                    countOrder = result;
                                    success_call();
                                   // countOrder = result;
                                   // success_call();
                                // $("#locationappend").html(result);    
                                }
                                                
                            });  
                            function success_call(){
                              $('#addlocationdatafromajax').attr('selecteddate',hj);
                              $('.hide').remove();
                              $('.hidedefault').remove(); 
                                setTimeout(function(){ 
                                
                                $datePicker
                                    .find('#slotsection').parent().after(countOrder)                                        
                                });
                            }   
							
							//var capacity=$('#onetimefromslot').attr('capacity');
								//console.log(fromtimeOT_val);
								//console.log(TotimeOT_val);
							// var fnlfromtime1=moment(fromtimeOT_val, 'HH:mm:ss').format('HH:mm');
							// var fnltotime1=moment(TotimeOT_val, 'HH:mm:ss').format('HH:mm');
							// console.log(fnlfromtime1);
							// 	console.log(fnltotime1);
              //               $('#addlocationdatafromajax').attr('selecteddate',hj);
                           
              //                   $('.hide').empty();
              //                   $('.hidedefault').remove();
                                // setTimeout(function(){   
                                //   $datePicker
                                //   .find('#slotsection').parent().children().append(html);
									
								    //console.log(orderlistforOT_val);
								    //console.log(capacity_val);
								
								  // $('#fatchdataforpayment').val(hj);
								  // $('#adddateontime').val(hj);
								  // $('#fatchedslotid').val(slot_id_val);
								  // $('#onetimefromslot').val(fromtimeOT_val);
								  // $('#onetimetoslot').val(TotimeOT_val);
								  // $('#fatchslotid').val(slot_id_val);
								  // $('#fatchdataforpayment').attr('eventid',eventid_val);
								  // $('#fatchdataforpayment').attr('mappingid',mappingid_val);
								  // $('#fatchdataforpayment').attr('datesid',datesid_val);
								  // $('#fatchdataforpayment').attr('eventtype',eventtype_val);
								  // $('#onetimefromslot').attr('capacity',capacity_val);
							
								// if(orderlistforOT_val < capacity_val)
								// { 								
                //                 $datePicker
                //                     .find('#slotsection').parent().after('<div class="col-md-6 booking-time hide" ><tr><td colspan="8"><div class="row radio-btns cl-radio">  <label class="radio-inline"> <input type="radio" class="form-control" name="timeslots" id="getdatesselected"  value="'+ fnlfromtime1 + ' – '+ fnltotime1 + '" selecteddate=""><span class="checkmark"></span><span class="radio-text">'+ fnlfromtime1 + ' – '+ fnltotime1 + '</span> </label><p class="extra-text"> 3G- Moulded or Blades to be worn-<br>No Studs Please. </p><span id="errortimeslot"></span> </div></td></tr></div>');
								// }
								// else{
								// 	 $datePicker
                //                     .find('#slotsection').parent().after('<div class="col-md-6 booking-time hidedefault" ><tr><td colspan="8"><div class="row radio-btns cl-radio"> <p> No Slot Available. Please select another date. </p></div</td></tr></div>');
								// }									
                               // });
                                
                            });
                        });
                </script>
<!--  -->
                    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> -->
                   
                    
                    
                        <div id="datepicker" class="col-md-6">
                        
                            <div id="slotsection" class="col-md-6"></div>
                            <span id="datenotselected"></span>
                         </div>
	<?php
	
                    }

die();
?>