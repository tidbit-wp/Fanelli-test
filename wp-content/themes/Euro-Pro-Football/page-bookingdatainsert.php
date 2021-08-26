<?php 

global $wpdb, $user_ID; 

$userrid = wp_get_current_user();
                        $mainid=$userrid->ID;

if($_POST['product_id'])  {
    if ($wpdb->insert(                                               
      'wp_book', //table name
      array(
          'book_timestamp'=>'',
          'product_id'=>$_POST['product_id'],
          'product_name'=>$_POST['Product_name'],
        'product_price'=>$_POST['product_price'],
        'location_id'=>$_POST['product_locationid'],
        'location_name'=>$_POST['product_locationname'],
        'sublocation_id'=>$_POST['product_sublocationid'],
       'sublocation_name'=>$_POST['product_sublocationname'],
       'sublocation_vanue'=>$_POST['product_sublocationvanue'],
       'event_id'=>$_POST['eventid'],
       'event_type'=>$_POST['eventtype'],
       'event_timeslot'=>$_POST['product_slots'],
       'event_date'=>$_POST['product_dates'],
       'user_id'=>$mainid,
       'mapping_id'=>$_POST['mappingid'],
       'dates_id'=>$_POST['datesid'],
       'booked_status'=>'',
       'product_status'=>'',
       'stripe_id'=>'',
       'name_of_card'=>'',
       'addressline1'=>'',
       'addressline2'=>'',
       'city'=>'',
       'country'=>'',
       'postcode'=>'',
       'contact_no'=>'',
       'emailaddress'=>'',
       'slot_id'=>$_POST['slotid'],
       'print_name'=>$_POST['parentname'],
       'signed'=>$_POST['parentsign'],
       'relationshiptoplayer'=>$_POST['parentrelationshipemail'],
       'consent_date'=>$_POST['playeragreeementdates'],
       'iagree'=>$_POST['playeriagree'],
      )) == false )
      wp_die('Database Insert Faild');
      echo"1";
}

$lastinsertedid = $wpdb->insert_id;
$cookie_name = "Gettingdata";

setcookie($cookie_name, $lastinsertedid,time() + (86400 * 30), "/" ); // 86400 = 1 day

die();
?>