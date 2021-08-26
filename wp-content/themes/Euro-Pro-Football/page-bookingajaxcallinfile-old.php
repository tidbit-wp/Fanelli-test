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

//echo $productid;
if($productid && $locationid && $subloccationid){
    $table_name11 = $wpdb->prefix . "mapping";
    $eventlist = $wpdb->get_results( "SELECT * FROM $table_name11 WHERE product_id=$productid AND location_id=$locationid AND sublocation_id=$subloccationid AND mapping_active='Yes' ");
    // var_dump($eventlist);
    foreach($eventlist as $rows){
    $eventkiID=$rows->event_id;
    $mappingkiID=$rows->mapping_id;

        $table_name22 = $wpdb->prefix . "dates";
        $datelist = $wpdb->get_results( "SELECT * FROM $table_name22 WHERE event_id=$eventkiID" );

        foreach($datelist as $rowsdd){
            $dateis=$rowsdd->dates_id;
            $eventtype=$rowsdd->event_type;
            $eventonetimedate=$rowsdd->event_date;
            $recurringinfoid=$rowsdd->recurring_eventinfo_id;?>
                <input type="hidden" id="fatchdataforpayment" value="<?php echo $eventonetimedate; ?>" eventid="<?php echo $eventkiID; ?>" mappingid="<?php echo $mappingkiID;?>"  datesid="<?php echo $dateis; ?> " eventtype="<?php echo $eventtype; ?>"  >
                <label style="display: block;margin-top:20px;">PLEASE SELECT A DATE AND TIME BELOW:</label>

            <?php if($eventtype=="onetime" && $eventonetimedate){
                ?> <input type="hidden" id="adddateontime" value="<?php echo $eventonetimedate; ?>" >
               
              <?php  $table_name33 = $wpdb->prefix . "slots";
                $slotslist = $wpdb->get_results( "SELECT * FROM $table_name33 WHERE dates_id=$dateis" );
                foreach($slotslist as $rowssddff){
                   $fromtime= $rowssddff->from_time;
                   $Totime= $rowssddff->to_time;
                   $capacity=$rowssddff->capacity;


                   $slot_id=$rowssddff->slots_id;
                   // get order count
                   $table_book = $wpdb->prefix . "book";
                    // var_dump($eventonetimedate); 
                    // var_dump($mappingkiID);
                    // var_dump($dateis);
                    // var_dump($slot_id);
                   $orderlist = $wpdb->get_results( "SELECT * FROM $table_book WHERE mapping_id=$mappingkiID AND dates_id=$dateis AND slot_id=$slot_id" );
                //   var_dump($orderlist);
                    $orderlistforOT=0;
                   foreach($orderlist as $ordelistget){
                    //   var_dump($ordelistget->event_date);
                      if($ordelistget->event_date == $eventonetimedate ){
                        $orderlistforOT++;
                      }
                  }
                   // var_dump($eventonetimedate);
                  // $countdata=count($orderlist);
                  // var_dump($countdata);
                   
                   ?>
                        <input type="hidden" id="fatchedslotid" slotid="<?php echo $slot_id; ?>">
                   <?php //get_headers();
                   ?>
                   <input type="hidden" id="onetimefromslot" value="<?php echo $fromtime;?>" capacity="<?php echo $capacity;?>">
                   <input type="hidden" id="onetimetoslot" value="<?php echo $Totime;?>">
                   <input type="hidden" id="fatchslotid" value="<?php echo $slot_id;?>">
                   <!-- <h1>ontime <p> DATE:- <?php //echo $eventonetimedate; ?></p> <p>fromtime:- <?php //echo $fromtime ?> totime:-<?php //echo $Totime;?></p></h1> -->
<!--  -->
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                    jQuery(document).ready(function(jQuery){  

                    var getvalue=$('#adddateontime').val();
                    $('#datep').attr('value',getvalue);
                    var fromtimeOT=$('#onetimefromslot').val();
                    var TotimeOT=$('#onetimetoslot').val();
                    var capacity=$('#onetimefromslot').attr('capacity');

                    var fnlfromtime=moment(fromtimeOT, 'HH:mm:ss').format('HH:mm');
                    var fnltotime=moment(TotimeOT, 'HH:mm:ss').format('HH:mm');

                    var newArray = [];
                    jQuery( "#adddateontime" ).each(function() {
                        newArray.push(jQuery( this ).val());
                    });
                   // console.log(newArray);

                            var highlight_dates = newArray;
                            var $datePicker = jQuery("#datepicker");
                            $datePicker.datepicker({
                                changeMonth: false,
                                changeYear: false,
                                dateFormat: 'yy-mm-dd',
                                inline: true,
                                altField: "#datep",
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
                            $('#addlocationdatafromajax').attr('selecteddate',hj);
                            console.log(hj);
                                $('.hide').empty();
                                $('.hidedefault').remove();
                                setTimeout(function(){   

                                    
                                    //$('#slotsection').append("<tr><td colspan="8"><div><button>8:00 am – 9:00 am</button></div><button>9:00 am – 10:00 am</button></div><button>10:00 am – 11:00 am</button></div></td></tr>")
                                $datePicker
                                    .find('#slotsection').parent().after('<?php if($orderlistforOT < $capacity){ ?><div class="col-md-6 booking-time hide" ><tr><td colspan="8"><div class="row radio-btns cl-radio">  <label class="radio-inline"> <input type="radio" class="form-control" name="timeslots" id="getdatesselected"  value="'+ fnlfromtime + ' – '+ fnltotime + '" selecteddate=""><span class="checkmark"></span><span class="radio-text"><?php echo $fromtime ?> – <?php echo $Totime;?></span> </label><p class="extra-text"> 3G- Moulded or Blades to be worn-<br>No Studs Please. </p><span id="errortimeslot"></span> </div></td></tr></div><?php }else{?><p class="hidedefault" style="margin-top: 200px;font-size: 16px;color: red;"> No Slot Available. Please select another date.</p> <?php } ?>')
                                    
                                });
                                
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
                         

               <?php }

            }else{
            if($eventtype=="recurring" && $recurringinfoid){

                $table_name44 = $wpdb->prefix . "recurring_event_info";
                $Recurringdates = $wpdb->get_results( "SELECT * FROM $table_name44 WHERE recurring_eventinfo_id= $recurringinfoid" );
                foreach($Recurringdates as $rqss){ 
                    $Rec_startdate=$rqss->startdate;
                    $Rec_enddate=$rqss->enddate;
                    $Rec_tuesdayvalue=$rqss->tuesday;
                    if($Rec_tuesdayvalue == "Yes"){ ?>
                                <input type="hidden" value="2" class="fortuesdayget" startdate="<?php echo $Rec_startdate; ?>" enddate="<?php echo $Rec_enddate;?>">
                                <p class="adddatesfortuesday" style="display:none;"></p>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                                <script>
                                      jQuery(document).ready(function(jQuery){  
                                        var getday=jQuery('#addonclick .fortuesdayget').attr('value');
                                        var getstartdate=jQuery('.fortuesdayget').attr('startdate');
                                        var getenddate=jQuery('.fortuesdayget').attr('enddate');
                                        function getLastWeek() {
                                            var today = new Date(getstartdate);
                                            var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
                                            return lastWeek;
                                        }

                                        var lastWeek = getLastWeek();
                                        var lastWeekMonth = lastWeek.getMonth() + 1;
                                        var lastWeekDay = lastWeek.getDate();
                                        var lastWeekYear = lastWeek.getFullYear();

                                        var lastWeekDisplay = lastWeekMonth + "/" + lastWeekDay + "/" + lastWeekYear;
                                        var lastWeekDisplayPadded = ("0000" + lastWeekYear.toString()).slice(-4) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("00" + lastWeekDay.toString()).slice(-2);

                                        var start = moment(lastWeekDisplayPadded); // Sept. 1st
                                        var start1 = moment(getstartdate); // Sept. 1st
                                            end   = moment(getenddate); // Nov. 2nd
                                            day =  2;                 // Sunday

                                        var result = [];
                                        var current = start.clone();
                                        var current1 = start1.clone();

                                        while (current.day(7 + day).isSameOrBefore(end)) {
                                         
                                            if (current1 <= current) {
                                             result.push(current.clone());
                                            }
                                        }

                                        var addtuesday= result.map(m => m.format('YYYY-MM-DD'));
                                        jQuery( ".adddatesfortuesday" ).text( addtuesday.join( "," ) );


                                      });
                                </script>

                    <?php }
                    $Rec_mondayvalue=$rqss->monday;
                    if($Rec_mondayvalue == "Yes"){?>
                        <input type="hidden" value="1" class="formondayget" startdate="<?php echo $Rec_startdate; ?>" enddate="<?php echo $Rec_enddate;?>">
                        <p class="adddatesformonday" style="display:none;"></p>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                        <script>
                              jQuery(document).ready(function(jQuery){  
                                var getday=jQuery('#addonclick .formondayget').attr('value');
                                var getstartdate=jQuery('.formondayget').attr('startdate');
                                var getenddate=jQuery('.formondayget').attr('enddate');
                                function getLastWeek() {
                                            var today = new Date(getstartdate);
                                            var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
                                            return lastWeek;
                                        }

                                        var lastWeek = getLastWeek();
                                        var lastWeekMonth = lastWeek.getMonth() + 1;
                                        var lastWeekDay = lastWeek.getDate();
                                        var lastWeekYear = lastWeek.getFullYear();

                                        var lastWeekDisplay = lastWeekMonth + "/" + lastWeekDay + "/" + lastWeekYear;
                                        var lastWeekDisplayPadded = ("0000" + lastWeekYear.toString()).slice(-4) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("00" + lastWeekDay.toString()).slice(-2);

                                        var start = moment(lastWeekDisplayPadded); // Sept. 1st
                                        var start1 = moment(getstartdate); // Sept. 1st
                                            end   = moment(getenddate); // Nov. 2nd
                                            day =  1;                 // Sunday

                                        var result = [];
                                        var current = start.clone();
                                        var current1 = start1.clone();

                                        while (current.day(7 + day).isSameOrBefore(end)) {
                                            console.log(current1);
                                            console.log(current);
                                            if (current1 <= current) {
                                             result.push(current.clone());
                                            }
                                        }

                                //console.log(result.map(m => m.format('YYYY-MM-DD')));
                                var addmonday= result.map(m => m.format('YYYY-MM-DD'));
                                jQuery( ".adddatesformonday" ).text( addmonday.join( "," ) );
                              });
                        </script>

            <?php   }
            $Rec_sundayvalue=$rqss->sunday;
            if($Rec_sundayvalue == "Yes"){?>
                        <input type="hidden" value="0" class="forsundayget" startdate="<?php echo $Rec_startdate; ?>" enddate="<?php echo $Rec_enddate;?>">
                        <p class="adddatesforsunday" style="display:none;"></p>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                        <script>
                              jQuery(document).ready(function(jQuery){  
                                var getday=jQuery('#addonclick .forsundayget').attr('value');
                                var getstartdate=jQuery('.forsundayget').attr('startdate');
                                var getenddate=jQuery('.forsundayget').attr('enddate');
                                function getLastWeek() {
                                            var today = new Date(getstartdate);
                                            var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
                                            return lastWeek;
                                        }

                                        var lastWeek = getLastWeek();
                                        var lastWeekMonth = lastWeek.getMonth() + 1;
                                        var lastWeekDay = lastWeek.getDate();
                                        var lastWeekYear = lastWeek.getFullYear();

                                        var lastWeekDisplay = lastWeekMonth + "/" + lastWeekDay + "/" + lastWeekYear;
                                        var lastWeekDisplayPadded = ("0000" + lastWeekYear.toString()).slice(-4) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("00" + lastWeekDay.toString()).slice(-2);

                                        var start = moment(lastWeekDisplayPadded); // Sept. 1st
                                        var start1 = moment(getstartdate); // Sept. 1st
                                            end   = moment(getenddate); // Nov. 2nd
                                            day =  0;                 // Sunday

                                        var result = [];
                                        var current = start.clone();
                                        var current1 = start1.clone();

                                        while (current.day(7 + day).isSameOrBefore(end)) {
                                            console.log(current1);
                                            console.log(current);
                                            if (current1 <= current) {
                                             result.push(current.clone());
                                            }
                                        }

                                //console.log(result.map(m => m.format('YYYY-MM-DD')));
                                var addsunday= result.map(m => m.format('YYYY-MM-DD'));
                                jQuery( ".adddatesforsunday" ).text( addsunday.join( "," ) );
                              });
                        </script>

            <?php   } 
            $Rec_wednesdayvalue=$rqss->wednesday;
            if($Rec_wednesdayvalue == "Yes"){?>
                        <input type="hidden" value="3" class="forwednesdayget" startdate="<?php echo $Rec_startdate; ?>" enddate="<?php echo $Rec_enddate;?>">
                        <p class="adddatesforwednesday" style="display:none;"></p>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                        <script>
                              jQuery(document).ready(function(jQuery){  
                                var getday=jQuery('#addonclick .forwednesdayget').attr('value');
                                var getstartdate=jQuery('.forwednesdayget').attr('startdate');
                                var getenddate=jQuery('.forwednesdayget').attr('enddate');
                                
                                function getLastWeek() {
                                            var today = new Date(getstartdate);
                                            var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
                                            return lastWeek;
                                        }

                                        var lastWeek = getLastWeek();
                                        var lastWeekMonth = lastWeek.getMonth() + 1;
                                        var lastWeekDay = lastWeek.getDate();
                                        var lastWeekYear = lastWeek.getFullYear();

                                        var lastWeekDisplay = lastWeekMonth + "/" + lastWeekDay + "/" + lastWeekYear;
                                        var lastWeekDisplayPadded = ("0000" + lastWeekYear.toString()).slice(-4) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("00" + lastWeekDay.toString()).slice(-2);

                                        var start = moment(lastWeekDisplayPadded); // Sept. 1st
                                        var start1 = moment(getstartdate); // Sept. 1st
                                            end   = moment(getenddate); // Nov. 2nd
                                            day =  3;                 // Sunday

                                        var result = [];
                                        var current = start.clone();
                                        var current1 = start1.clone();

                                        while (current.day(7 + day).isSameOrBefore(end)) {
                                            console.log(current1);
                                            console.log(current);
                                            if (current1 <= current) {
                                             result.push(current.clone());
                                            }
                                        }

                                //console.log(result.map(m => m.format('YYYY-MM-DD')));
                                var addwednesday= result.map(m => m.format('YYYY-MM-DD'));
                                jQuery( ".adddatesforwednesday" ).text( addwednesday.join( "," ) );
                              });
                        </script>

            <?php   }
            $Rec_thursdayvalue=$rqss->thursday;
            if($Rec_thursdayvalue == "Yes"){?>
                        <input type="hidden" value="4" class="forthursdayget" startdate="<?php echo $Rec_startdate; ?>" enddate="<?php echo $Rec_enddate;?>">
                        <p class="adddatesforthursday" style="display:none;"></p>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                        <script>
                              jQuery(document).ready(function(jQuery){  
                                var getday=jQuery('#addonclick .forthursdayget').attr('value');
                                var getstartdate=jQuery('.forthursdayget').attr('startdate');
                                var getenddate=jQuery('.forthursdayget').attr('enddate');
                                function getLastWeek() {
                                            var today = new Date(getstartdate);
                                            var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
                                            return lastWeek;
                                        }

                                        var lastWeek = getLastWeek();
                                        var lastWeekMonth = lastWeek.getMonth() + 1;
                                        var lastWeekDay = lastWeek.getDate();
                                        var lastWeekYear = lastWeek.getFullYear();

                                        var lastWeekDisplay = lastWeekMonth + "/" + lastWeekDay + "/" + lastWeekYear;
                                        var lastWeekDisplayPadded = ("0000" + lastWeekYear.toString()).slice(-4) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("00" + lastWeekDay.toString()).slice(-2);

                                        var start = moment(lastWeekDisplayPadded); // Sept. 1st
                                        var start1 = moment(getstartdate); // Sept. 1st
                                            end   = moment(getenddate); // Nov. 2nd
                                            day =  4;                 // Sunday

                                        var result = [];
                                        var current = start.clone();
                                        var current1 = start1.clone();

                                        while (current.day(7 + day).isSameOrBefore(end)) {
                                            console.log(current1);
                                            console.log(current);
                                            if (current1 <= current) {
                                             result.push(current.clone());
                                            }
                                        }

                                //console.log(result.map(m => m.format('YYYY-MM-DD')));
                                var addthursday= result.map(m => m.format('YYYY-MM-DD'));
                                jQuery( ".adddatesforthursday" ).text( addthursday.join( "," ) );
                              });
                        </script>

            <?php   }
            $Rec_fridayvalue=$rqss->friday;
            if($Rec_fridayvalue == "Yes"){?>
                        <input type="hidden" value="5" class="forfridayget" startdate="<?php echo $Rec_startdate; ?>" enddate="<?php echo $Rec_enddate;?>">
                        <p class="adddatesforfriday" style="display:none;"></p>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                        <script>
                              jQuery(document).ready(function(jQuery){  
                                var getday=jQuery('#addonclick .forfridayget').attr('value');
                                var getstartdate=jQuery('.forfridayget').attr('startdate');
                                var getenddate=jQuery('.forfridayget').attr('enddate');
                                function getLastWeek() {
                                            var today = new Date(getstartdate);
                                            var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
                                            return lastWeek;
                                        }

                                        var lastWeek = getLastWeek();
                                        var lastWeekMonth = lastWeek.getMonth() + 1;
                                        var lastWeekDay = lastWeek.getDate();
                                        var lastWeekYear = lastWeek.getFullYear();

                                        var lastWeekDisplay = lastWeekMonth + "/" + lastWeekDay + "/" + lastWeekYear;
                                        var lastWeekDisplayPadded = ("0000" + lastWeekYear.toString()).slice(-4) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("00" + lastWeekDay.toString()).slice(-2);

                                        var start = moment(lastWeekDisplayPadded); // Sept. 1st
                                        var start1 = moment(getstartdate); // Sept. 1st
                                            end   = moment(getenddate); // Nov. 2nd
                                            day =  5;                 // Sunday

                                        var result = [];
                                        var current = start.clone();
                                        var current1 = start1.clone();

                                        while (current.day(7 + day).isSameOrBefore(end)) {
                                            console.log(current1);
                                            console.log(current);
                                            if (current1 <= current) {
                                             result.push(current.clone());
                                            }
                                        }

                                //console.log(result.map(m => m.format('YYYY-MM-DD')));
                                var addfriday= result.map(m => m.format('YYYY-MM-DD'));
                                jQuery( ".adddatesforfriday" ).text( addfriday.join( "," ) );
                              });
                        </script>

            <?php   }
            $Rec_saturdayvalue=$rqss->saturday;
            if($Rec_saturdayvalue == "Yes"){?>
                        <input type="hidden" value="6" class="forsaturdayget" startdate="<?php echo $Rec_startdate; ?>" enddate="<?php echo $Rec_enddate;?>">
                        <p class="adddatesforsaturday" style="display:none;"></p>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                        <script>
                          
                              jQuery(document).ready(function(jQuery){  
                                var getday=jQuery('#addonclick .forsaturdayget').attr('value');
                                var getstartdate=jQuery('.forsaturdayget').attr('startdate');
                                var getenddate=jQuery('.forsaturdayget').attr('enddate');
                                function getLastWeek() {
                                            var today = new Date(getstartdate);
                                            var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
                                            return lastWeek;
                                        }

                                        var lastWeek = getLastWeek();
                                        var lastWeekMonth = lastWeek.getMonth() + 1;
                                        var lastWeekDay = lastWeek.getDate();
                                        var lastWeekYear = lastWeek.getFullYear();

                                        var lastWeekDisplay = lastWeekMonth + "/" + lastWeekDay + "/" + lastWeekYear;
                                        var lastWeekDisplayPadded = ("0000" + lastWeekYear.toString()).slice(-4) + "-" + ("00" + lastWeekMonth.toString()).slice(-2) + "-" + ("00" + lastWeekDay.toString()).slice(-2);

                                        var start = moment(lastWeekDisplayPadded); // Sept. 1st
                                        var start1 = moment(getstartdate); // Sept. 1st
                                            end   = moment(getenddate); // Nov. 2nd
                                            day =  6;                 // Sunday

                                        var result = [];
                                        var current = start.clone();
                                        var current1 = start1.clone();

                                        while (current.day(7 + day).isSameOrBefore(end)) {
                                            console.log(current1);
                                            console.log(current);
                                            if (current1 <= current) {
                                             result.push(current.clone());
                                            }
                                        }
                                //console.log(result.map(m => m.format('YYYY-MM-DD')));
                                var addsaturday= result.map(m => m.format('YYYY-MM-DD'));

                                jQuery( ".adddatesforsaturday" ).text( addsaturday.join( "," ) );
                              });
                        </script>

            <?php   }

                }
                $table_name55 = $wpdb->prefix . "recurring_eventslot_info";
                $Recurringslotdates = $wpdb->get_results( "SELECT * FROM $table_name55 WHERE recurring_eventinfo_id=$recurringinfoid" );
                // var_dump($Recurringslotdates);
                foreach($Recurringslotdates as $rowssddffee){
                    $fromtime= $rowssddffee->from_time;
                    $Totime= $rowssddffee->to_time; 
                   // $fatchselecteddate=$_COOKIE['selecteddate'];
                    $slotid= $rowssddffee->recurring_eventslot_info_id;
                    $recuuringcapacity=$rowssddffee->capacity;

                   // var_dump($recuuringcapacity);

                // $table_book10 = $wpdb->prefix . "book";
                
                // $bookedlist = $wpdb->get_results( "SELECT * FROM $table_book10 WHERE mapping_id=$mappingkiID AND dates_id=$dateis AND slot_id=$slotid  AND event_id=$eventkiID");
                // $countRecurringdata=count($bookedlist);
                //var_dump($bookedlist);

                    
                    ?>
                    <input type="hidden" id="recurringfromslot" value="<?php echo $fromtime;?>">
                    <input type="hidden" id="recurringtoslot" value="<?php echo $Totime;?>">
                    <input type="hidden" id="fatchedslotid" slotid="<?php echo $slotid; ?>" capacity="<?php echo $recuuringcapacity; ?>">
                    <!-- <h1>Recurring <spanp>fromtime:- <?php //echo $fromtime ?> totime:-<?php //echo $Totime;?></span></h1> -->
<!--  -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
                    jQuery(document).ready(function(jQuery){  
                    var items = [];
                                
                     $('#addonclick  p').each(function (i, e) {

                        var dates = $(e).text();
                        var datesArray =  dates.split(","); 
                            for(i=0;i<datesArray.length; i++){
                                items.push(datesArray[i]); 
                            }
                    });
                     var resultArray = items; 

                    var fromtimeRT=$('#recurringfromslot').val();
                    var TotimeRT=$('#recurringtoslot').val();

                    var fnlfromtime=moment(fromtimeRT, 'HH:mm:ss').format('HH:mm');
                    var fnltotime=moment(TotimeRT, 'HH:mm:ss').format('HH:mm');

                    var newArray = [];
                    jQuery( "#adddateontime" ).each(function() {
                        newArray.push(jQuery( this ).val());
                    });
                    // console.log(arr1);
                    console.log("----");
                    //console.log(result);
                    console.log(resultArray);
                    

                           //  var highlight_dates = ['1-7-2021','15-7-2021','18-7-2021','28-7-2011'];   
                            var $datePicker = jQuery("#datepicker");
                            $datePicker.datepicker({
                                changeMonth: false,
                                changeYear: false,
                                format:'yyyy-mm-dd',
                                inline: true,
                                altField: "#datep",
                                beforeShowDay: function(date){
                                    var month = ("0" + (date.getMonth() + 1)).slice(-2);
                                    var year = date.getFullYear();
                                    var day = ('0' + date.getDate()).slice(-2);
                                    // Change format of date
                                    var newdate = year+"-"+month+'-'+day;
                                    // Set tooltip text when mouse over date
                                    var tooltip_text = "New event on " + newdate;
                                    // Check date in Array
                                    if(jQuery.inArray(newdate, resultArray) != -1){
                                        return [true, "highlight", tooltip_text ];
                                    }
                                    return [false];
                                }
                               
                            }).change(function(e){
                            var hj= $(this).val();
                            var Rslotid=$('#fatchedslotid').attr('slotid');
                            var Rmappingid=$('#fatchdataforpayment').attr('mappingid');
                            var Rdateid=$('#fatchdataforpayment').attr('datesid');
                            var R_cap=$('#fatchedslotid').attr('capacity');
                           // jQuery.cookie('selecteddate', hj,{ expires : 365, path: '/' });
                            var countOrder= '';
                            $.ajax({
                                type :'POST',
                                url : '<?php echo admin_url('admin-ajax.php'); ?>',
                                data : {
                                        'action' : 'recurringselecteddate', 
                                        'mappingID' : Rmappingid,
                                        'slot_id' : Rslotid,
                                        'date_id': Rdateid,
                                        'selecteddatevalue':hj
                                },
                                success: function (result) {
                                    
                                    // alert(result);
                                    countOrder = result;
                                    success_call();
                                // $("#locationappend").html(result);    
                                }
                                                
                            });
                            function success_call(){
                                $('#addlocationdatafromajax').attr('selecteddate',hj);
                            console.log('----'+hj);
                                
                                setTimeout(function(){ 

                                    //$('#slotsection').append("<tr><td colspan="8"><div><button>8:00 am – 9:00 am</button></div><button>9:00 am – 10:00 am</button></div><button>10:00 am – 11:00 am</button></div></td></tr>")
                               if(countOrder < R_cap ){
                                   $('.hidedefault').remove();
                                   $('.hide').remove();
                                $datePicker
                                    .find('#slotsection').parent().after('<div class="col-md-6 booking-time hide" ><tr><td colspan="8"><div class="row radio-btns cl-radio">  <label class="radio-inline"> <input type="radio" class="form-control" name="timeslots" id="getdatesselected"  value="'+ fnlfromtime + ' – '+ fnltotime + '" selecteddate=""><span class="checkmark"></span><span class="radio-text"><?php echo $fromtime ?> – <?php echo $Totime;?></span> </label><p class="extra-text"> 3G- Moulded or Blades to be worn-<br>No Studs Please. </p><span id="errortimeslot"></span> </div></td></tr></div><?php //}else{?><?php //} ?>')                                    
                                }else{
                                   $('.hide').remove();
                                    $('.hidedefault').remove();
                                    $datePicker
                                    .find('#slotsection').parent().after('<div class="col-md-6 booking-time hidedefault" ><tr><td colspan="8"><div class="row radio-btns cl-radio"> <p> No Slot Available. Please select another date. </p></div</td></tr></div>');
                                }
                                });
                            }
                           
                                
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
                         
<!--  -->
                <?php }


            }
            }
           


        }
    }
}

die();
?>