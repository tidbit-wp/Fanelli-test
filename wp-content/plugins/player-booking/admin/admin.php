<?php 
add_action( 'admin_menu', 'MJ_gmgt_system_menu' );
//ADMIN SIDE MENU FUNCTION
function MJ_gmgt_system_menu()
{	
	add_menu_page('Player & Bookings', __('Player & Bookings','player-booking'),'manage_options','gmgt_system','gmgt_system_dashboard' ,'dashicons-products'); 
	add_submenu_page('gmgt_system', 'Products', __( 'Products', 'player-booking' ), 'administrator', 'gmgt_products', 'products_manage');
	add_submenu_page('gmgt_system', 'Locations', __( 'Location', 'player-booking' ), 'administrator', 'gmgt_location', 'location_manage');
	add_submenu_page('gmgt_system', 'SubLocations', __( 'SubLocations', 'player-booking' ), 'administrator', 'gmgt_sublocation', 'sublocation_manage');
	add_submenu_page('gmgt_system', 'Events', __( 'Events', 'player-booking' ), 'administrator', 'gmgt_events', 'events_manage');
	add_submenu_page('gmgt_system', 'Mapping', __( 'Mapping', 'player-booking' ), 'administrator', 'gmgt_mapping', 'mapping_manage');
	add_submenu_page('gmgt_system', 'Bookings', __( 'Bookings', 'player-booking' ), 'administrator', 'gmgt_bookings', 'booking_manage');
	add_submenu_page('gmgt_system', 'Tax', __( 'Tax', 'player-booking' ), 'administrator', 'gmgt_tax', 'tax_manage');
}
//BELOW ALL PAGE CALL BY MENU FUNCTIONS
function gmgt_system_dashboard()
{
	require_once PB_PLUGIN_DIR. '/admin/dasboard.php';
}	
function products_manage()
{
	require_once PB_PLUGIN_DIR. '/admin/products/index.php';
}
function location_manage()
{
	require_once PB_PLUGIN_DIR. '/admin/location/index.php';
}
function sublocation_manage()
{
	require_once PB_PLUGIN_DIR. '/admin/sublocation/index.php';
}
function mapping_manage()
{
	require_once PB_PLUGIN_DIR. '/admin/mapping/index.php';
}
function booking_manage()
{
	require_once PB_PLUGIN_DIR. '/admin/booking/index.php';
}
function tax_manage()
{
	require_once PB_PLUGIN_DIR. '/admin/tax/index.php';
}
function events_manage()
{
	require_once PB_PLUGIN_DIR. '/admin/events/index.php';
}

?>