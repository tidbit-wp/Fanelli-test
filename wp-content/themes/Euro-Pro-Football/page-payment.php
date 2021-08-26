
<?php

/**
 * The template for displaying Payment Page
 *
 * 
 *
 * @package WordPress
 * @subpackage EURO
 * @since EURO 1.0
 */
get_header(); 
$cookie_name = "Gettingdata";
$getmainid=$_COOKIE[$cookie_name];
if(!isset($_COOKIE[$cookie_name])) {
    header("Location:".home_url()."/book-a-trial");
    exit();
} ?>

<section class="payment-section">
    <div class="container-back">
        <button class="btn btn-back btn-link text-uppercase">
            <span> <img src="/wp-content/uploads/2021/07/Path-18.png" class="img-fluid"  alt="srrow" /> </span> <a href="<?php echo home_url('book-a-trial'); ?>">BACK</a>
        </button>
    </div>
</section>
<section class="success-page-section">
    <div class="container">
        <div class="success-title">
            <h1 class="text-uppercase"><span><img src="/wp-content/uploads/2021/06/Euro-Pro-Star.png" class="img-fluid star" alt=" Star"></span>PAYMENT INFORMATION</h1>
        </div>
    </div>
</section>
<section class="payment-info-section">
    <div class="container">
            <?php 
$userrid = wp_get_current_user();
$mainid=$userrid->ID;

            $table_name11 = $wpdb->prefix . "book";
            $eventlist = $wpdb->get_results( "SELECT * FROM $table_name11 WHERE book_id=$getmainid" );
           // var_dump($eventlist);
            foreach($eventlist as $zzz){
                $price=$zzz->product_price;
                ?>
        <div class="payment-detail">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12">
                    <div class="payment-left-section">
                        <h2 class="text-uppercase">Order Information</h2>
                    </div>
                        <div class="product-info">
                            <p>PRODUCT: <?php echo $zzz->product_name;?></p>
                            <p>LOCATION: <?php echo $zzz->location_name;?></p>
                            <p>DATE: <?php echo $zzz->event_date;?> </p>
                            <p>TIME: <?php echo $zzz->event_timeslot;?></p>
                        </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="payment-right-section upersec">
                        <h2 class="text-uppercase">
                            CURRENCY : <span>GBP £ </span>
                        </h2>
                        <h2 class="text-uppercase mt-3">

                        <?php 
                        $userrid = wp_get_current_user();
                        $mainid=$userrid->ID;
                       
                        $getproduct=$zzz->product_id;
                        // var_dump($mainid);
                        // var_dump($getproduct);
                        $table_name111 = $wpdb->prefix . "book";
                        $alreadypurchasedlist = $wpdb->get_results( "SELECT book_id FROM $table_name111 WHERE product_id=$getproduct  AND user_id=$mainid AND booked_status='succeeded'" );
                    //    var_dump($alreadypurchasedlist);
                        $countvariable=count($alreadypurchasedlist);
                        if($countvariable == 1){
                            //var_dump($countvariable);
                            $table_name11122 = $wpdb->prefix . "products";
                            $getdisk = $wpdb->get_results( "SELECT * FROM $table_name11122 WHERE product_id=$getproduct" );
                          foreach($getdisk as $ii){
                              $pricemn=$ii->product_price;
                              $secndprice=$ii->product_price2ndtime;
                              if($secndprice !== "0.00" && $secndprice){
                                $pricemn=$secndprice;
                                echo'<span>£'.$secndprice.'</span>';
                              }else{
                                echo'<span>£'.$pricemn.'</span>';
                              }
                          
                          }
                        }elseif($countvariable == 2){
                           // var_dump($countvariable);
                            $table_name11122 = $wpdb->prefix . "products";
                            $getdisk = $wpdb->get_results( "SELECT * FROM $table_name11122 WHERE product_id=$getproduct" );
                          foreach($getdisk as $ii){
                            $pricemn=$ii->product_price;
                              $thirdprice=$ii->product_price3rdtime;
                              if($thirdprice !== "0.00" && $thirdprice){
                                $pricemn=$thirdprice;
                                echo'<span>£'.$thirdprice.'</span>';
                              }else{
                                echo'<span>£'.$pricemn.'</span>';
                              }
                           
                          }
                        }else{
                           // var_dump($countvariable);
                            $table_name1112233 = $wpdb->prefix . "products";
                            $getdisk = $wpdb->get_results( "SELECT * FROM $table_name1112233 WHERE product_id=$getproduct" );
                          foreach($getdisk as $ii){
                            $pricemn=$ii->product_price;
                           echo'<span>£'. $pricemn.'</span>';
                          }
                        }

                        ?>
                           

                        </h2>
                    </div>
                </div>
            </div>
            <div class="hr">
                <hr/>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-8">
                    <div class="payment-left-section">
                        <h2 class="text-uppercase"> <span> Tax </span></h2>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="payment-right-section">
                        <h2 class="text-uppercase">
                        <?php 
				global $wpdb;
				$table_name = $wpdb->prefix . "tax";
				$product = $wpdb->get_results( "SELECT * FROM $table_name" );
				//var_dump($product);
				$count = 0; 
                
			 foreach ($product as $row){
                $taxprice = $pricemn*$row->tax_value/100;
                $fnltaxprice= number_format($taxprice, 2);

                $table_name1122 = $wpdb->prefix . "products";
                $eventlist = $wpdb->get_results( "SELECT product_discription FROM $table_name1122 WHERE product_id=$zzz->product_id" );
                 $fnldiscpro='';
                foreach($eventlist as $pop){
                $fnldiscpro=$pop->product_discription;
                }
              
                 ?> 
                           <span>£<?php echo $fnltaxprice; ?></span>
                           <input type="hidden" value="<?php echo $fnltaxprice;?>" id="gettaxvalue"> 
                           <input type="hidden" value="<?php echo $fnldiscpro;?>" id="getprodDisc"> 
                          <script>
                              jQuery(document).ready(function($) { 
                                  var get=$('#gettaxvalue').attr('value');
                                  var getdisc=$('#getprodDisc').attr('value');
                                  $('#addtaxprice').attr('value',get);
                                  $('#addcustdisc').attr('value',getdisc);
                              });
                          </script>
                           <?php 
                        
                        
                        } ?>
                         
                        </h2>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-8">
                    
                    <div class="total-payment pt-3">
                        <h2 class="text-uppercase">
                           <span>  TOTAL PAYMENT </span> (TO EURO PRO FOOTBALL LTD)
                        </h2>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4">
                   
                    <div class="payment-right-section pt-3">
                        <h2 class="text-uppercase">
                        <?php 
				global $wpdb;
				$table_name1 = $wpdb->prefix . "tax";
				$product11 = $wpdb->get_results( "SELECT * FROM $table_name1" );
			
			 foreach ($product11 as $rows){
                 $fnlprice=number_format($pricemn, 2);
                 $tax=$rows->tax_value;
                 $fnltaxpercen=number_format($tax, 2);
                 $taxp = $fnlprice*$fnltaxpercen/100;
                 $fnlTAXtotalprice=number_format($taxp, 2);
                 $totalPrise = floor($fnlprice + $fnlTAXtotalprice);
                 $FNLTOTALPRICE=number_format($totalPrise, 2);
                 ?> <span>  £<?php echo $FNLTOTALPRICE;?></span> 
                          <input type="hidden" value="<?php echo $FNLTOTALPRICE;?>" id="gettotalvalue"> 
                          <script>
                              jQuery(document).ready(function($) { 
                                  var get=$('#gettotalvalue').attr('value');
                                  $('#addtotalprice').attr('value',get);
                              });
                          </script>
                    <?php } ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<section class="stripe-section">

</section>
<section class="payment-form-section">
    <div class="container">
        <div class="payment-form">
            <?php
            $stripe_url=home_url().'/stripe-process';

            ?>
            <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         

    <form action="<?php echo $stripe_url; ?>" method="post" name="checkoutform" id="checkoutform_id">   
        
<!--  -->  <div class="card-detail">

                <div class="col-md-12"><label>PLEASE ENTER YOUR CARD DETAILS BELOW AND CLICK SUBMIT:</label></div>
                <div class="cricons">
                    <div class="col-md-12">
                    <div class="row cwithicons">
                        <div class="col-md-6 col-sm-6 col-12">
                        <label>Credit/Debit card</label>
                        </div>
                       <div class="col-md-6 col-sm-6 col-12 ccicons">
                       <span> 
                            <img src="/wp-content/uploads/2021/07/1933704_american-express_amex_charge_credit-card_payment_icon.png" class="img-fluid">
                            <img src="/wp-content/uploads/2021/07/4373111_card_credit_logo_logos_mastercard_icon.png" class="img-fluid">
                            <img src="/wp-content/uploads/2021/07/4375165_card_credit_logo_visa_icon.png" class="img-fluid">
                        </span>
                       </div>
                    </div>
                        <div class="crcard">
                            <label class="text-capitalize">Credit/Debit card</label>
                            <div class="row border-desktop" >
                                <div class="input-group  crnum">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-secondary border-left-0 border-0" type="button">
                                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                                    </button>
                                </span>
                                    <input type="text" name="cardNumber"  size="20" autocomplete="off" id="cardNumber" class="form-control text-capitalize card-deatils-num" placeholder="Card Number" />  
                                    <span id="errorcardnumber"></span>        
                                </div>
                                <div class="crmn">
                                    <input type="text" name="cardExpMonth" pattern="\d{2}" maxlength="2" placeholder="MM" size="2" id="cardExpMonth" class="form-control card-deatils-num"  />
                                </div> <span class="arrow"> /</span>
                                <div class="cryr">
                                    <input type="text" name="cardExpYear" placeholder="YYYY" pattern="\d{4}" maxlength="4" size="4" id="cardExpYear" class="form-control card-deatils-num" />
                                </div>
                                <div class="crcv">
                                    <input type="text" name="cardCVC" size="4" autocomplete="off" pattern="\d{3}" maxlength="3" id="cardCVC" class="form-control card-deatils-num" placeholder="CVV" required/>
                                </div>	
                            </div>
                        </div>	
                    </div>
                </div>

            </div>
             <span class="paymentErrors alert-danger"></span>		
			
                <!--  -->
                    <div class="form-group col-md-12">
                        <label>Name on card</label>
                        <input type="text" name="custName" class="form-control" id="PlayerFirstName" placeholder="Name" required> 
                        <input type="hidden" name="custprive" id="addtotalprice" value="">
                        <input type="hidden" name="custtaxprive" id="addtaxprice" value="">  
                        <input type="hidden" name="custprodDisc" id="addcustdisc" value=""> 
                        <input type="hidden" name="custbookid" value="<?php echo $getmainid;?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Address</label>
                        <input type="text" class="form-control" name="custaddressline1" id="addressline1" placeholder="Address Line 1" required>
                        <input type="text" class="form-control" name="custaddressline2" id="addressline2" placeholder="Address Line 2" required>
                        <input type="text" class="form-control" name="custcity" id="city" placeholder="Town/City" required>
                        <input type="text" class="form-control" name="custcountry" id="country" placeholder="Country/Region" required>
                        <input type="text" class="form-control" name="custpostcode" id="postcode" placeholder="Postcode" required>
                       
                    </div>

                    <div class="form-group col-md-12">
                        <label>Contact Number:</label>
                        <input type="text" class="form-control" name="custphone" id="contactno" placeholder="Contact No." required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email Address:</label>
                        <input type="email" name="custEmail" class="form-control" id="emailaddress" placeholder="Address Line 1"required>
                    </div>
				    <br>	
				
                    <div class="created-text col-md-12 text-right">
                            <input type="submit" id="makePayment" value="Submit Payment" class="btn btn-lg btn-submit text-uppercase">
                    </div>
                   
            
            </form>
        </div>
    </div>
</section>
<script>
// set your stripe publishable key
Stripe.setPublishableKey('pk_test_51IOOeQIvh9CcXzYPXpff8fX7FJKZRY7nRVMWQ1RekRbDBOcJsekIHGKdUS91ENpTvKZAakfDTHXhHkJMuY8tqq2d00TYoKDXzn');
jQuery(document).ready(function($) {
    $("#checkoutform_id").submit(function(event) {
        $('#makePayment').attr("disabled", "disabled");


        // create stripe token to make payment
        Stripe.createToken({
            number: $('#cardNumber').val(),
            cvc: $('#cardCVC').val(),
            exp_month: $('#cardExpMonth').val(),
            exp_year: $('#cardExpYear').val()
        }, handleStripeResponse); 
        return false;
    });
});
// handle the response from stripe
function handleStripeResponse(status, response) {
	console.log(JSON.stringify(response));
    if (response.error) {
        console.log(response.error.code);
        // if(response.error.code == "invalid_number"){
            
        //     $("#errorcardnumber").html(response.error.message);
        // }    
        $('#makePayment').removeAttr("disabled");
        $(".paymentErrors").html(response.error.message);
    } else {
		var payForm = $("#checkoutform_id");
        //get stripe token id from response
        var stripeToken = response['id'];
        //set the token into the form hidden input to make payment
        payForm.append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");
		payForm.get(0).submit();			
    }
}
</script>

<?php get_footer(); ?>