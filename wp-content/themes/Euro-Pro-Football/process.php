<style>
    .errorpage_error{
        background-image:url("/wp-content/uploads/2021/07/Repeat-Grid-1.png");
    }
    .er-msg{
        text-align:center;
        font-size:1.875rem;
        padding-top:3rem !important;
    }
    .er-msg a{
        color: #FFCE33;
        text-decoration:none;
    }
    @media (max-width:767px){
        .er-msg{
        text-align:center;
        font-size:1rem;
        padding-top:2rem !important;
    }
    }
</style>
<?php
/*
Template name: Stripe Process Template
*/ 
//check if stripe token exist to proceed with payment
if(!empty($_POST['stripeToken'])){
	
    // get token and user details
    $stripeToken  = $_POST['stripeToken'];
    $custbookid=$_POST['custbookid'];
    $custName = $_POST['custName'];
    $custEmail = $_POST['custEmail'];
    $custaddressline1 = $_POST['custaddressline1'];
    $custaddressline2 = $_POST['custaddressline2'];
    $custcity =$_POST['custcity'];
    $custcountry =$_POST['custcountry'];
    $custpostcode =$_POST['custpostcode'];
    $custphone=$_POST['custphone'];
    $custprive=$_POST['custprive'];
    $custtaxprive=$_POST['custtaxprive'];
    $custproDisc=$_POST['custprodDisc'];
    $cardNumber = $_POST['cardNumber'];
    $cardCVC = $_POST['cardCVC'];
    $cardExpMonth = $_POST['cardExpMonth'];
    $cardExpYear = $_POST['cardExpYear'];    
    // var_dump($fnldiscpro); die();
    //include Stripe PHP library
    //require_once('stripe-php/init.php');  
	require_once 'stripe/init.php';
	require_once 'stripe/lib/Stripe.php';	
    //set stripe secret key and publishable key
    $stripe = array(
      "secret_key"      => "sk_test_51IOOeQIvh9CcXzYPXK1XWaDRqvIJtG5efLrWeMBhpKmKpmVqizTRQFARAPLlJoX0Nhu0gCh2vmehYHyBg7IWBQR300VIzPEhpX",
      "publishable_key" => "pk_test_51IOOeQIvh9CcXzYPXpff8fX7FJKZRY7nRVMWQ1RekRbDBOcJsekIHGKdUS91ENpTvKZAakfDTHXhHkJMuY8tqq2d00TYoKDXzn"
    );    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $custEmail,
        'source'  => $stripeToken
    ));    
    // item details for which payment made
    $itemName = "Product Booked";
    $itemNumber = "xy12123";
    $itemPrice = round($custprive);
    $currency = "GBP";
    $orderID = $custbookid;    
    // details for which payment performed
    $payDetails = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'description' => $itemName,
        'metadata' => array(
        'order_id' => $orderID
        )
    ));    
    // get payment details
    $paymenyResponse = $payDetails->jsonSerialize();
   // var_dump($paymenyResponse); 

    //$transactionid= $paymenyResponse['id']; 
    $userrid = wp_get_current_user();
	
    // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        // transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        $paymentDate = date("Y-m-d H:i:s");    
        $transactionid= $paymenyResponse['id']; 

        //insert tansaction details into database
    //     include_once("../db_connect.php");
    //     $insertTransactionSQL = "INSERT INTO transaction(cust_name, cust_email, card_number, card_cvc, 
	// 	card_exp_month, card_exp_year,item_name, item_number, item_price, item_price_currency,
	// 	paid_amount, paid_amount_currency, txn_id, payment_status, created, modified) 
	// 	VALUES('".$custName."','".$custEmail."','".$cardNumber."','".$cardCVC."','".$cardExpMonth."',
	// 	'".$cardExpYear."','".$itemName."','".$itemNumber."','".$itemPrice."','".$paidCurrency."',
	// 	'".$amountPaid."','".$paidCurrency."','".$balanceTransaction."','".$paymentStatus."',
	// 	'".$paymentDate."','".$paymentDate."')";
	// mysqli_query($conn, $insertTransactionSQL) or die("database error: ". 
    //     mysqli_error($conn));
   // echo $amountPaid;
   if( $paymentStatus == 'succeeded'){ 
        global $wpdb, $user_ID; 
       // $userrid = wp_get_current_user();

      if ($wpdb->update(                                               
        'wp_book', //table name
        array(
             'stripe_id'=>$transactionid,
             'user_id'=>$userrid->ID,
             'booked_status'=>$paymentStatus,
             'product_status'=>'Payment Received',
             'product_price'=> $amountPaid,
            'name_of_card'=>$custName,
            'addressline1'=>$custaddressline1,
            'addressline2'=>$custaddressline2,
            'city'=>$custcity,
            'country'=>$custcountry,
            'postcode'=>$custpostcode,
            'contact_no'=>$custphone,
            'emailaddress'=>$custEmail
        ),
        array('book_id'=>$custbookid)
                
    ) == false )
    
        //if order inserted successfully

            $paymentMessage = "The payment was successful. Order ID: {$custbookid}";
           // echo $paymentMessage;
        // email Send 

        $subject = "BOOKING CONFIRMATION";
		
		  $headers = "MIME-Versions: 1.0" . "\r\n";
		  $headers .= "Content-type:text/html;charser=UTF-8" . "\r\n";
		
		 $body='<table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr style="pading-bottom:">
             <th style="font-size: 2rem; color:#07153E">BOOKING CONFIRMATION</th>
         </tr>
         <tr>
             <td>
                 <p style="text-align:center; font-size:1.5rem; color:#07153E; padding-bottom:3rem">Thank you for booking with Euro Pro Football. We have recieved your details and look forward to seeing you soon at once of our venues.</p>
             </td>
         </tr>
         <tr>
             <table width="90%" style="background-color:#F6F6F6;margin:0 auto; padding:2rem;font-size:1.2rem; text-align:left;" border="0" cellpadding="0" cellspacing="0">
                 <tr>
                     <th style="text-transform:uppercase; width:60%"></th>
                     <th style="text-transform:uppercase; background-color:#FFCD33; padding:1rem">CURRENCY : £ GBP</th>
                 </tr>
                 <tr>
                     <th style="text-transform:uppercase; width:60%; padding-top:1rem;">ORDER NUMBER</th>
                     <th style="text-transform:capitalize;padding-top:1rem;">Home Address</th>
                 </tr>
                 <tr>
                    <td style="padding-bottom:2rem; width:60%">'.$_POST['custbookid'].'</td>
                    <td style="padding-bottom:2rem">'.$_POST['custaddressline1'].' '.$_POST['custaddressline2'].' <br> '.$_POST['custcity'].' <br> '.$_POST['custcountry'].'</td>
                 </tr>
                 <tr>
                    <th>NAME</th>
                 </tr>
                 <tr>
                    <td style="padding-bottom:2rem">'.$_POST['custName'].'</td>
                 </tr>
                 <tr>
                     <th style="width:60%;">PRODUCT DESCRIPTION</th>
                     <th>CONTACT NUMBER</th>
                 </tr>
                 <tr>
                     <td style="padding-bottom:2rem; width:60%">'.$_POST['custprodDisc'].'</td>
                     <td style="padding-bottom:2rem">'.$_POST['custphone'].'</td>
                 </tr>
                 <tr>
             <td colspan="2" style="padding-top:2rem; padding-bottom:1rem"><hr></td>
         </tr>
         <tr>
             <td style="width:70%; padding-bottom:.85rem">TAX</td>
             <td style="width:30%; text-align:right; padding-bottom:.85rem">£ '.$_POST['custtaxprive'].'</td>
         </tr>
         <tr>
             <td style="width:70%">TOTAL PAYMENT (TO EURO PRO FOOTBALL LTD)</td>
             <td style="width:30%; text-align:right">£ '.$_POST['custprive'].'</td>
         </tr>
             </table>
         </tr>
         
         <tr>
             <td>
                 <p style="text-align:center; font-size:1.2rem; padding-top:3rem; padding: bottom 3rem;">Please note that you cannot reply to this email. If you have any questions please  contact us at info@euprofootball.com or call us on 0330 118 83 31</p>
             </td>
         </tr>
         <tr>
             <table style="background-color:#07153E; padding:2rem ; margin:0 auto;">
                 <tr>
                    <table style=" width:90%;margin:0 auto;">
                        <tr>
                            <td width="50%">
                                <img style="height: auto;max-width: 100%;border: none;display: block;padding: 5px 0; width:30%;" src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Euro-Pro-Logo.png" alt="">
                            </td>
                            <td width="50%" style="text-align:right">
                                <a href="https://www.facebook.com/euprofootball/">
                                    <img src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Facebook-Icon.png"  style="width:15%; margin-right:1rem" alt=""/>
                                </a>
                                <a href="https://www.instagram.com/euprofootball/">
                                    <img src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Instagram-Icon.png" style="width:15%; margin-right:1rem" alt=""/>
                                </a>
                                <a href="https://twitter.com/euprofootball">
                                    <img src="https://wordpress-426808-1993275.cloudwaysapps.com/wp-content/uploads/2021/06/Twitter-Icon.png"   style="width:15%; margin-right:1rem" alt=""/>
                                </a>
                            </td>
                        </tr>
                    </table>
                 </tr>
             </table>
         </tr>
     </table>';

$sent = wp_mail($custEmail,$subject,$body,$headers);

        // email End 
            header("Location: https://wordpress-426808-1993275.cloudwaysapps.com/booking-complete/"); 
           
       } else{ 
          $paymentMessage = "Payment failed!"; 
        //  echo "3rd last error massage";
          get_header();
          echo '<section class="trials-section success-page-section club-page-section">
          <section class="trials-hero success-page errorpage_error">
              <div class="container">
                      <div class="b-complete">
                          <h1 class="text-uppercase">Payment Failed</h1>
                      </div>
                      <div class="thank-you-text">
                      Please try again. <a href="/payment">Back to payment</a>
                      </div>
              </div>
          </section>
      </section>';
        get_footer();
     
        }
    } else{
     
        $paymentMessage = "Payment failed!";
       // echo "2nd last error massage";
          get_header();
        echo '<section class="trials-section success-page-section club-page-section">
        <section class="trials-hero success-page errorpage_error">
            <div class="container">
                    <div class="b-complete">
                        <h1 class="text-uppercase">Payment Failed</h1>
                    </div>
                    <div class="thank-you-text">
                    Please try again <a href="/payment">Back to payment</a>
                    </div>
            </div>
        </section>
    </section>';
        get_footer();   
      
    }
} else{
   
    $paymentMessage = "Payment failed!";
    //echo "last error massage";
    get_header();
    echo '<section class="trials-section success-page-section club-page-section">
          <section class="trials-hero success-page errorpage_error" >
              <div class="container">
                      <div class="b-complete">
                          <h1 class="text-uppercase">Payment Failed</h1>
                      </div>
                      <div class="thank-you-text er-msg">
                      Please try again <a href="/payment">Back to payment</a>
                      </div>
              </div>
          </section>
      </section>';
    get_footer();
   
}

?>