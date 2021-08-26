<?php
/**
 * The template for displaying What Clubs Say Page
 *
 * 
 *
 * @package WordPress
 * @subpackage EURO
 * @since EURO 1.0
 */
get_header(); ?>

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
</style>
<script>
jQuery(document).ready(function(){    
    var productnameget = jQuery('input[name=productselect]').attr("selectedname");
    if(productnameget == "TRIAL"){
        $("input[selectedname=TRIAL]").prop('disabled', false);
    }
});

jQuery(document).ready(function(jQuery){

    jQuery('#bookingForm .commonclick, #locationappend  #fatchoption').change(function(){ 

                ProductID = $('input[name=productselect]:checked').val();

                Productname = $('input[name=productselect]').attr("selectedname");

                locationid = $('#fatchoption :selected').attr("locationid");
                sublocationid = $('#fatchoption :selected').attr("sublocationid");

               

                $.ajax({
                beforeSend: function(){
                   // alert('test');
                 jQuery('#locationappend').empty();
                },
                type :'POST',
                url : '<?php echo admin_url('admin-ajax.php'); ?>',
                data : {
                        'action' : 'call_out', 
                        'productname' : Productname,
                        'productid' : ProductID,
                        'locationid': locationid,
                        'sublocatioid':sublocationid
                },
                success: function (result) {
                     $("#locationappend").html(result);    
                },
                error: function(err){
                },
                complete:function(data){
                }
                             
            });
    });  
});
</script>
<section class="payment-section pb-5">
    <div class="container-back d-none">
        <button class="btn btn-back btn-link text-uppercase">
            <span> <img src="/wp-content/uploads/2021/07/Path-18.png" class="img-fluid"  alt="srrow" /> </span> <a href="<?php echo home_url('book-a-trial'); ?>">BACK</a>
        </button>
    </div>
</section>
<section class="book-a-trial1">

    <div class="container">
        <div class="trial-top-section col-md-12">
            <div class="book-trial-title">
                <h1 class="text-uppercase"> <span class="star-image-book"> <img src="/wp-content/uploads/2021/06/Euro-Pro-Star.png" class="star img-fluid" alt="Star"></span>BOOK A TRIAL</h1>
            </div>
            <div class="cost-trial-title">
                <h1 class="text-uppercase"> <span class="star-image-book"> <img src="/wp-content/uploads/2021/06/Euro-Pro-Star.png" class="star img-fluid" alt="Star"></span>COST OF TRIAL: £119.00</h1>
            </div>
        </div>
    </div>
</section>
<section class="trial-page-form">
    <div class="container">
        <form  id="bookingForm" method="post">
            <div class="radio-btns">
                
                <div class="col-md-12"><label>PLEASE SELECT THE FROM THE OPTIONS BELOW:</label></div>
                <input type="hidden" value="" id="enterproductidadd">
                <div class="form-row">
                    <!-- <div class="form-group col-md-12">
                        <label class="radio-inline"><input type="radio" name="StrongestFoot" value="TRIAL"><span class="checkmark"></span><span class="radio-text trial-radio">TRIAL</span></label>
                    </div> -->
                   
                     <?php 
                    //  $table_name = $wpdb->prefix . "products";
                    //  $productname = $wpdb->get_results( "SELECT * FROM $table_name" );
                    $table_name = $wpdb->prefix . "mapping";
                  $productnamess = $wpdb->get_results( "SELECT * FROM $table_name WHERE mapping_active='Yes' " );

                  $array_location=array();
                  foreach ( $productnamess as $forech){  
                          array_push($array_location,ucfirst($forech->product_id));
                  }
                  $array_location_1 = array_unique($array_location);
                  $c=1;
                    foreach($array_location_1 as $qut){

                    $table_namess = $wpdb->prefix . "products";
                    $productname = $wpdb->get_results( "SELECT * FROM $table_namess WHERE product_id=$qut " );
                  
                     
                     
                      foreach ($productname as $sss){  ?> <td>
                            <div class="form-group col-md-12">
                                <label class="radio-inline <?php if($sss->product_discription){ }else{ ?>rd1<?php } ?>" >
                                <?php if($sss->product_dependency=='N/A' || $sss->product_dependency==''){ ?>
                                    <input type="radio" id="radiochekced" class="commonclick " name="productselect"  value="<?php echo $sss->product_id;?>" selectedname="<?php echo $sss->product_name; ?>" productprice="<?php echo $sss->product_price; ?>">
                              
                                <?php }else{ ?>
                                    <input type="radio" id="radiochekced" class="commonclick " name="productselect" disabled  value="<?php echo $sss->product_id;?>" selectedname="<?php echo $sss->product_name; ?>" productprice="<?php echo $sss->product_price; ?>">
                                       
                                <?php } ?>
                                <span class="checkmark"></span><span class="radio-text"><?php echo $sss->product_name; ?> 
                                       <?php if($sss->product_discription){ ?> <p class="p-dis"><?php echo $sss->product_discription; ?></p><?php } ?>
                                    </span>
                                </label>  
                            </div>
                            
                     
                    <?php $c= $c+1; }  }?>

                    <p id="producterror"></p>
                </div>
               <!-- location sction append after call ajax -->
                <div id="locationappend" class="apnd-location"></div>
                
                <input type="hidden" name="locationaddajax" id="addlocationdatafromajax" locationid="" locationname="" sublocationid="" sublocationname="" sublocationvanue="" productid="" productname="" productprice="" mappingid="" selecteddate="" >
                
                <!-- // get location name and sublocation name and vanue name                  -->
                <div id="getEventinfo">
                    
                </div>
                <!-- <div class="addhereeventsdates"></div> -->
                    <input type="text" id="datep" />
                    <div class="row" id="addonclick">
                            <!-- <div class="col-md-12">
                            <label style="display: block;margin-top:20px; padding-left:1rem">PLEASE SELECT A DATE AND TIME BELOW:</label>
                            </div>
                                <div id="datepicker" class="col-md-6">
                                    <div id="slotsection" class="col-md-6"></div>
                                </div> -->
                    </div>
                    
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
                    <script>
                        // var getvalue=$('#adddateontime').val();
                        //     $('#datep').attr('value',getvalue);    
                        var highlight_dates = ['1-7-2021','15-7-2021','18-7-2021','28-7-2011'];    
                        var $datePicker = jQuery("#datepicker");
                        $datePicker.datepicker({
                            changeMonth: false,
                            changeYear: false,
                            inline: true,
                            altField: "#datep",
                        }).change(function(e){
                        var hj= $(this).val();
                        console.log(hj);
                            $('.hide').empty();
                            setTimeout(function(){   
                                //$('#slotsection').append("<tr><td colspan="8"><div><button>8:00 am – 9:00 am</button></div><button>9:00 am – 10:00 am</button></div><button>10:00 am – 11:00 am</button></div></td></tr>")
                            $datePicker
                                .find('#slotsection').parent().after('<div class="col-md-6 booking-time hide" ><tr><td colspan="8"><div class="row radio-btns cl-radio">  <label class="radio-inline"> <input type="radio" class="form-control" name="StrongestFoot"  value="8:00 am – 9:00 am"><span class="checkmark"></span><span class="radio-text">8:00 am – 9:00 am</span> </label> <label class="radio-inline"> <input type="radio" class="form-control" name="StrongestFoot"  value="9:00 am – 10:00 am"><span class="checkmark"></span><span class="radio-text">9:00 am – 10:00 am</span></label> <label class="radio-inline"> <input type="radio" name="StrongestFoot" class="form-control"  value="10:00 am – 11:00 am"><span class="checkmark"></span><span class="radio-text">10:00 am – 11:00 am</span></label> <p class="extra-text p-dis"> 3G- Moulded or Blades to be worn-<br>No Studs Please. </p>  </div></td></tr></div>')
                                
                            });
                        });
                    </script>
            </div>
        

        <!-- </form> -->
    </div>
</section>

<section class="parent-section">
    <div class="container">
        <div class="parent-section-title">
            <h1 class="text-uppercase"> <span class="star-image-book"> <img src="/wp-content/uploads/2021/06/Euro-Pro-Star.png" class="star img-fluid" alt="Star"></span>PARENT / GUARDIAN CONSENT FORM:</h1>
        </div>
        <div class="parent-text">
            <p> <b>At Euro Pro Football Ltd We Are Committed To Providing A Safe Environment.</b>  <br>
                However, Football Is A Contact Sport And Injuries May Occur Through No Negligence 
                Of Our Staff. The Parent/Guardian Agrees That He/She Has Enrolled The Player Freely, Voluntarily And Absolutely At His/Her Own Discretion And Risk And With Full Appreciation Of The Nature And Extent Of All Risk Involved In The Activity. By Signing Below, I The Parent/Guardian Give Consent To The Player Participation And Acknowledge And Confirm That All Information Given Is True And Accurate.  I Acknowledge And Accept That Euro Pro Football Ltd Or Respective Servants Shall Not Be Held Liable For Any Personal Injury, Loss Or Damage To Property And Give Permission For The Player 
                To Receive Emergency Medical Treatment In My Absence If Deemed Necessary.  I Also Give Permission For Group And Individual Photos And/Filming To Be Taken Of The Player Detailed On This Form, And Understand That These May Be Used For Training, Publicity And/Or Archive Purposes.  Please See Terms And Conditions.
            </p>
        </div>
        <!-- <form action=""> -->
        <div class="container">    
        <div class="checkbox-btns book-chckbox" style="padding-left:0">
            <div class="form-row">
                <label>PLEASE CONFIRM THAT YOU GIVE YOUR CONSENT:</label>
                <div class="form-group pl-0 pr-0 col-md-4">
                    <label class="form-check-label"><input type="checkbox" name="Iconsent" value="Yes"><span class="checkmarks">I CONSENT</span></label>
                    <span id="erroeiconsent"></div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Parent NAME</label>
                <input type="text" class="form-control" id="parentName" placeholder="Parent Name">
                <span id="errorparentname"></span>
            </div>
            <div class="form-group col-md-6">
                <label>SIGNED:</label>
                <input type="text" class="form-control signed" id="parentsign" placeholder="Example">
                <span id="errorparentsign"></span>
            </div>
        </div>  
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>RELATIONSHIP TO PLAYER:</label>
                <input type="text" class="form-control email-placeholder" id="parentrelationemail" placeholder=" Parent or Guardian">
                <span id="erroremailmsg"></span>
            </div>
        </div> 
        <div class="radio-btns">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>DATE</label>
                    <input type="date" class="form-control" id="playeragreeementdates" placeholder="00/00/0000">
                    <span id="errorplayeragreeementdates"></span>

                </div>
                
                    <div class="form-group checkbox-btns book-chckbox i-agree col-md-6">
                        <label>I AGREE TO THE TERMS AND CONDITIONS:</label>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <label class="form-check-label"> <input type="checkbox" id="playerIagree" name="playerIagree" value="Yes"><span class="checkmarks">I AGREE</span><p id="erroeplayeriagree"></p> </label>   
                        
                        </div>
                    </div>
            </div> 
        </div> 
       <div class="col-md-12">
       <div class="created-text">
            <button type="button" id="submit-bookingpage" style="padding:0px; border: none !important;"><a class="btn btn-submit">Proceed to payment</a></button>
        </div>
       </div>
       </div>
    </form>
    </div>
</section>
<script>
jQuery(document).ready(function(jQuery){ 

    jQuery('#submit-bookingpage').click(function(){ 

       var location = [];
       var location_check;
        $('#locationappend #fatchoption').each(function(index, value){
            location =  $(this).hasClass('yellowbackground');
            if(location == true){
                location_check = location;
            }
        });

        if(location_check != true){
            $('#locationerro').html('Please select the Location');
            $('#locationerro').css({"color": "red", "font-size": "18px", "margin-top": "-25px", "margin-bottom": "25px" }); 
        }else{
            $('#locationerro').html('');
        }

        product_dates=$('#addlocationdatafromajax').attr('selecteddate');
        if(product_dates == ""){
                $('#datenotselected').html('Please Select the date '); 
                $('#datenotselected').css({"color": "red", "font-size": "18px"}); 
            }else{
                $('#datenotselected').html(''); 
            }

        product_id=$('input[name=productselect]:checked').val();
        Product_name=$('input[name=productselect]:checked').attr('selectedname');
        product_price=$('input[name=productselect]:checked').attr('productprice');
       // product_location = $( "#fatchoption option:selected" ).val();
        // 
        product_locationid=$('#addlocationdatafromajax').attr('locationid');
        product_locationname=$('#addlocationdatafromajax').attr('locationname');
     
        product_sublocationid=$('#addlocationdatafromajax').attr('sublocationid');
        product_sublocationname=$('#addlocationdatafromajax').attr('sublocationname');
        product_sublocationvanue=$('#addlocationdatafromajax').attr('sublocationvanue');

        mappingid=$('#fatchdataforpayment').attr('mappingid');
        eventid=$('#fatchdataforpayment').attr('eventid');
        eventtype=$('#fatchdataforpayment').attr('eventtype');
        datesid=$('#fatchdataforpayment').attr('datesid');
        slotid=$('#fatchedslotid').attr('slotid');
						
        /* console.log(product_id);
        console.log(Product_name);
        console.log(product_price);
        console.log(product_locationid);
        console.log(product_locationname);
        console.log(product_sublocationid);
        console.log(product_sublocationname);
        console.log(product_sublocationvanue);
        console.log(product_dates);
 
        console.log(mappingid);
        console.log(eventid);
        console.log(datesid);
        console.log(slotid);
        console.log(eventtype); */
      
		
        product_slots=$('input[name=timeslots]').val();
       console.log(product_slots);
        iconsent = $('input[name=Iconsent]').val();
        parentname = $('#parentName').val();
        parentsign = $('#parentsign').val();
        parentrelationshipemail = $('#parentrelationemail').val();
        playeragreeementdates = $('#playeragreeementdates').val();
        playeriagree=$('#playerIagree').val();
		
		/*   console.log(iconsent);
        console.log(parentsign);
        console.log(parentname);
        console.log(parentrelationshipemail);
        console.log(playeragreeementdates);
        console.log(playeriagree);
		return false; */
if($('input[name=playerIagree]').is(':checked')){
                $('#erroeplayeriagree').html('');
            }else{
                $('#erroeplayeriagree').html('Please checked the checkbox '); 
                $('#erroeplayeriagree').css({"color": "red", "font-size": "18px","margin-top":"25px"}); 
            }
        
 if(!$('input[name=productselect]').is(':checked')) { 
                 $('#producterror').html('Please Select product '); 
                $('#producterror').css({"color": "red", "font-size": "18px"});
                
            }else{
                $('#producterror').html(''); 
            }

if($('input[name=timeslots]').is(':checked')){
                $('#errortimeslot').html(''); 
            }else{
                $('#errortimeslot').html('Please Select the Timeslots '); 
                $('#errortimeslot').css({"color": "red", "font-size": "18px"}); 
            }
if($('input[name=Iconsent]').is(':checked')){
                $('#erroeiconsent').html(''); 
            }else{
                $('#erroeiconsent').html('Please Select the checkbox '); 
                $('#erroeiconsent').css({"color": "red", "font-size": "18px"}); 
            }

 if( parentname == "" || parentsign == "" || parentrelationshipemail =="" || playeragreeementdates == "" ) {
			if(parentname == ""){
                $('#errorparentname').html('Please enter name '); 
                $('#errorparentname').css({"color": "red", "font-size": "18px"});  
            }else{
                $('#errorparentname').html(''); 
            }

            if(parentsign == ""){
                $('#errorparentsign').html('Please type here. '); 
                $('#errorparentsign').css({"color": "red", "font-size": "18px"});  
            }else{
                $('#errorparentsign').html(''); 
            }

            if(parentrelationshipemail == ""){
                $('#erroremailmsg').html('Please enter your relationship with player '); 
                $('#erroremailmsg').css({"color": "red", "font-size": "18px"});  
            }else{
                $('#erroremailmsg').html(''); 
            }

            if(playeragreeementdates == ""){
                $('#errorplayeragreeementdates').html('Please enter date '); 
                $('#errorplayeragreeementdates').css({"color": "red", "font-size": "18px"});  
            }else{
                $('#errorplayeragreeementdates').html(''); 
            }
	}else{
		
            $.ajax({
                beforeSend: function(){                    
                },
                type :'POST',
                url : '<?php echo admin_url('admin-ajax.php'); ?>',
                data : {
                        'action' : 'bookingdat',
                        'product_id':product_id,
                        'Product_name':Product_name,
                        'product_price':product_price,
                        'product_locationid':product_locationid,
                        'product_locationname':product_locationname,
                        'product_sublocationid':product_sublocationid,
                        'product_sublocationname':product_sublocationname,
                        'product_sublocationvanue':product_sublocationvanue,
                        'product_dates':product_dates,
                        'product_slots':product_slots,
                        'mappingid':mappingid,
                        'eventid':eventid,
                        'datesid':datesid,
                        'slotid':slotid,
                        'eventtype':eventtype,
                        'iconsent':iconsent,
                        'parentsign' : parentsign,
                        'parentname': parentname,
                        'parentrelationshipemail':parentrelationshipemail,
                        'playeragreeementdates':playeragreeementdates,
                        'playeriagree':playeriagree

                },
                success: function (result) {
                     //alert(result);
                     if(result == "1"){
                        window.location.href = "<?php echo home_url('payment'); ?>";
                     }
                     
                  //   $(".product-block").remove();
                    // $(".Paggggggiiiiiination").remove();
                    //  $("#addonclick").html(result);    
                     //$("#ajax-loader").hide();
                    // console.log('fgd', result);
                },
                error: function(errorThrown){
                        //alert(errorThrown);
                     //console.log(err);
                     //console.log(choices);
                   //  $("#ajax-loader").hide();
                    // console.log('ee', err);

                },
                complete:function(data){
                    // window.location.href = "http://www.google.com";
                    // Hide image container
                   // jQuery('#myUL li').css('display', 'none');
                   // $("#ajax-loader").hide();
                   // console.log('ds', data);
                   
                //    console.log(locationid);
                //     console.log(sublocationid);
                }
                             
            }); 

         }



    });

});
</script>

<?php get_footer(); ?>