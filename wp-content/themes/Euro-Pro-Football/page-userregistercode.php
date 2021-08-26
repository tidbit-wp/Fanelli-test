<?php 

 global $wpdb, $user_ID; 

 $productrole='Player';
 $signup_name = $_POST['username'];
 $signup_email = $_POST['email']; 
 $signup_pass = $_POST['password']; 
 $signupfirstname = $_POST['firstname'];
 $signuplastname = $_POST['lastname'];

 $add_proprty = $_POST['Parent_AddressPropertyname'];
 $add_street1 = $_POST['Parent_addressline1'];
 $add_street2 = $_POST['Parent_addressline2'];
 $add_town = $_POST['Parent_addresstown'];
 $add_country = $_POST['Parent_addresscountry'];
 $add_zip = $_POST['Parent_addressZip'];


$mergeaddress="property name:-$add_proprty,Street line 1 :-$add_street1, Streent line2:-$add_street2 ,Town:-$add_town,country:-$add_country,Zip:- $add_zip";


 if( username_exists( $signup_name ) || email_exists( $signup_email ) ){
    if( username_exists( $signup_name ) ){  
        $errors['username'] = "Username already exists, please try another";  
        echo "username exist";
    }else{
        if( email_exists( $signup_email ) ){  
        $errors['email'] = "This email address is already in use";  
        echo "email exist";
        }
    }
}else{ 
if($signup_name){

    $WP_array1 = array (
        'user_login' =>  $signup_name,
        'user_pass' => $signup_pass,
        'user_nicename' =>$signupfirstname,
        'user_email' =>  $signup_email,
        'role' => $productrole,
        'user_registered' => date("Y-m-d H:i:s")
    ) ;

    $user_idd = wp_insert_user( $WP_array1 ) ;
    if (!is_wp_error($user_idd)) {

    //    update_user_meta($user_id, 'company_name', $data['companyname']);
    //    update_user_meta($user_id, 'company_contact_email', $data['companycontactemail']);
      update_user_meta($user_idd, 'first_name', $signupfirstname); 
      update_user_meta($user_idd, 'last_name', $signuplastname);
      update_user_meta($user_idd, 'player_first_name', $signupfirstname);
      update_user_meta($user_idd, 'player_last_name', $signuplastname);
      update_user_meta($user_idd, 'player_email', $signup_email);
    //player info
      update_user_meta($user_idd, 'player_age', $_POST['Player_Age']);
      update_user_meta($user_idd, 'player_date_of_birth', $_POST['Player_DOB']);
      update_user_meta($user_idd, 'player_strongest_foot', $_POST['Player_Strongestfoots']);

      update_user_meta($user_idd, 'player_current_possition1_position_1', $_POST['Player_Currentplayingposition1']);
    //   update_user_meta($user_idd, 'position_1', $_POST['Player_Currentplayingposition1']);

      update_user_meta($user_idd, 'player_current_possition1_position_2', $_POST['Player_Currentplayingposition2']);

      update_user_meta($user_idd, 'player_current_possition1_position_3', $_POST['Player_Currentplayingposition3']);

      update_user_meta($user_idd, 'current_playing_lavel', $_POST['Player_Currentplayinglavel']);
      update_user_meta($user_idd, 'name_of_leauge_name_of_school_leauge', $_POST['Player_Nameofschool']);
      update_user_meta($user_idd, 'name_of_leauge_sunday_club_team_name', $_POST['Player_sundayclubteamname']);
      update_user_meta($user_idd, 'name_of_leauge_saturday_club_team_name_', $_POST['Player_saturdayclubteamname']);
      update_user_meta($user_idd, 'name_of_leauge_name_of_district', $_POST['Player_nameofdist']);
      update_user_meta($user_idd, 'name_of_leauge_name_of_county_', $_POST['player_nameofcountry']);
      update_user_meta($user_idd, 'name_of_leauge_grass_roots_academy_name', $_POST['Player_grassrootacademyname']);

      update_user_meta($user_idd, 'division_of_league', $_POST['Player_divisionofleague']);
      update_user_meta($user_idd, 'which_team_do_you_support', $_POST['Player_teamyousupport']);
      update_user_meta($user_idd, 'who_is_your_favourite_player', $_POST['Player_favouriteplayer']);
      update_user_meta($user_idd, 'which_player_do_you_aspire_to_be_', $_POST['Player_aspireby']);
      update_user_meta($user_idd, 'players_size_for_kit_height', $_POST['Player_height']);
      update_user_meta($user_idd, 'players_size_for_kit_chest_size', $_POST['Player_chestsize']);
      update_user_meta($user_idd, 'players_size_for_kit_waist_size', $_POST['Player_weistsize']);
      update_user_meta($user_idd, 'players_size_for_kit_foot_size', $_POST['Player_footsize']);
//parent info
      update_user_meta($user_idd, 'parent_details_parent_first_name', $_POST['Parent_fullname']);
      update_user_meta($user_idd, 'parent_details_parent_last_name', $_POST['Parent_lastname']);
      update_user_meta($user_idd, 'parent_details_parent_email', $_POST['Parent_email']);
      update_user_meta($user_idd, 'parent_details_parent_conatact_number', $_POST['Parent_contact']);
     // update_user_meta($user_idd, 'parent_details_parent_address', $mergeaddress);

      update_user_meta($user_idd, 'parent_details_parents_address_details_property_name', $add_proprty);
      update_user_meta($user_idd, 'parent_details_parents_address_details_addressline1', $add_street1);
      update_user_meta($user_idd, 'parent_details_parents_address_details_addressline2', $add_street2);
      update_user_meta($user_idd, 'parent_details_parents_address_details_town-city', $add_town);
      update_user_meta($user_idd, 'parent_details_parents_address_details_country', $add_country);
      update_user_meta($user_idd, 'parent_details_parents_address_details_zipcode', $add_zip);
      
      update_user_meta($user_idd, 'how_did_you_hear_about_euro_pro_football', $_POST['Player_wheredoyouhearabout']);
//medical info added to the Acf field
      update_user_meta($user_idd, 'medical_information_is_the_player_receiving_any_type_of_medical_treatment_whatsoever', $_POST['M_recivedMedicaltreatments']);
      update_user_meta($user_idd, 'medical_information_medical_treatment_detail', $_POST['M_Recivedmedicaltreetmenttext']);
      update_user_meta($user_idd, 'medical_information_is_the_player_taking_any_medication_eg_asthma_pump', $_POST['M_takinganymedications']);
      update_user_meta($user_idd, 'medical_information_taking_ant_medication_deatils_', $_POST['m_takingmadicationtext']);
    //  update_user_meta($user_idd, 'player_have_any_allergies', $_POST['m_anyallergiess']);
      update_user_meta($user_idd, 'medical_information_player_have_any_allergies_state_allergies', $_POST['M_stateallergies']);
      update_user_meta($user_idd, 'medical_information_player_have_any_allergies_state_medication', $_POST['M_satemedication']);
      update_user_meta($user_idd, 'medical_information_player_have_any_allergies_self-administered', $_POST['M_selfadministrations']);
      update_user_meta($user_idd, 'medical_information_player_have_any_allergies_does_the_player_bring_and_keep_medication_on_their_person', $_POST['M_keepmedicationontheirpersons']);
      update_user_meta($user_idd, 'medical_information_player_have_any_allergies_state_the_various_triggers_which_may_cause_an_allergic_reaction', $_POST['M_allergicreaction']);
      update_user_meta($user_idd, 'medical_information_player_have_any_allergies_additional_info', $_POST['M_additinalinfo']);


		//Send Successfully register email//
		  
		  $subject = "Player profile is successfully registered";
		
		  $headers = "MIME-Versions: 1.0" . "\r\n";
		  $headers .= "Content-type:text/html;charser=UTF-8" . "\r\n";
		
		 $body='<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr style="pading-bottom:">
        <th style="font-size: 2rem; color:#07153E">THANK YOU</th>
    </tr>
    <tr>
        <td>
            <p style="text-align:center; font-size:1.5rem; color:#07153E; padding-bottom:3rem">Thank you for registering with Euro Pro Football. We have recieved your details and look forward to seeing you soon at once of our venues.</p>
        </td>
    </tr>
    <tr>
        <table width="90%" style="background-color:#F6F6F6;margin:0 auto; padding:2rem;font-size:1.2rem; text-align:left;" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <th style="text-transform:uppercase; width:60%">Name</th>
                <th style="text-transform:capitalize;">Home Address</th>
            </tr>
            <tr>
               <td style="padding-bottom:2rem; width:60%">'.$signupfirstname.' '.$signuplastname.'</td>
               <td style="padding-bottom:2rem">'.$add_proprty.','.$add_street1.',<br>'.$add_street2.',<br>'. $add_town.','.$add_country.','.$add_zip.'</td>
            </tr>
            <tr>
               <th>Date of Birth</th>
            </tr>
            <tr>
               <td style="padding-bottom:2rem">'. date('d/m/Y',strtotime($_POST['Player_DOB'])).'</td>
            </tr>
            <tr>
                <th style="width:60%;">PARENT / GUARDIAN DETAILS</th>
                <th>CONTACT NUMBER</th>
            </tr>  
            <tr>
                <td style="padding-bottom:2rem; width:60%">'.$_POST['Parent_fullname'].' '.$_POST['Parent_lastname'].'</td>
                <td style="padding-bottom:2rem">'.$_POST['Parent_contact'].'</td>
            </tr>
        </table>
    </tr>

    <tr>
        <td>
            <p style="text-align:center; font-size:1.2rem; padding-top:3rem; padding: bottom 3rem;">Please note that you cannot reply to this email. If you have any questions please  contact us at info@euprofootball.com or call us on 0330 118 83 31</p>
        </td>
    </tr>
    <tr>
        <table style="background-color:#07153E; padding:2rem">
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

$sent = wp_mail($signup_email,$subject,$body,$headers);

    //  update_user_meta($user_idd, 'Product_phone_number', $productphonenumber);
    //  update_user_meta($user_idd, 'product_website', $productwebsite);
    //  update_user_meta($user_idd, 'product_affiliatelink', $productaffiliatelink);
    //  update_user_meta($user_idd, 'product_discription', $productdisc);
    //  update_user_meta($user_idd, 'pro_facebook', $profacebook);
    //  update_user_meta($user_idd, 'pro_twitter', $protwitter);
    //  update_user_meta($user_idd, 'pro_instagram', $proinsta);
    //  update_user_meta($user_idd, 'pro_linkedin', $prolinkedin);
    //  update_user_meta($user_idd, 'pro_reddit', $prorebbit);
    //  update_user_meta($user_idd, 'pto_github', $progithub);
    //  update_user_meta($user_idd, 'pro_youtube', $proyoutube);
    //  update_user_meta($user_idd, 'productpricing_content', $propricingtext);
    //  update_user_meta($user_idd, 'contact_for_pricing', $conatctforpricing);
    //  update_user_meta($user_idd, 'industries_servies', $valsarray1);
    //  update_user_meta($user_idd, 'services_offered', $valsarray);
    //  update_user_meta($user_idd, 'profile_image', $profileImageid);
    //  update_user_meta($user_idd, 'wp-approve-user' , 0);
    wp_set_current_user($user_idd);
    wp_set_auth_cookie($user_idd);
    
    echo "added successfully";   
    }
    }
    
}
die();
?>