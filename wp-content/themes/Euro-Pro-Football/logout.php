<?php
/*
Template name: Logout
*/

// get all sessions for user with ID $user_id
$sessions = WP_Session_Tokens::get_instance(get_current_user_id());

// we have got the sessions, destroy them all!
$sessions->destroy_all();
$home_url = get_home_url();	
wp_redirect( $home_url. "/login" ); 
exit;

?>