<?php 
require_once PB_PLUGIN_DIR. '/services_function.php';
require_once PB_PLUGIN_DIR. '/class/products.php';
require_once PB_PLUGIN_DIR. '/class/location.php';
require_once PB_PLUGIN_DIR. '/class/sublocation.php';
require_once PB_PLUGIN_DIR. '/class/event.php';
require_once PB_PLUGIN_DIR. '/class/mapping.php';
require_once PB_PLUGIN_DIR. '/class/booking.php';
if ( is_admin() )
{
	require_once PB_PLUGIN_DIR. '/admin/admin.php';
	//INSTALL ROLE AND TABLE FUNCTION
	function MJ_gmgt_install()
	{
		MJ_gmgt_install_tables();			
	}
	register_activation_hook(PB_PLUGIN_BASENAME, 'MJ_gmgt_install' );
	
	//GET ALL SCRIPT PAGE IN ADMIN SIDE FUNCTION
	function MJ_gmgt_call_script_page()
	{
		$page_array = array('gmgt_system','gmgt_products','gmgt_location','gmgt_sublocation','gmgt_mapping','gmgt_events','gmgt_bookings');
		return  $page_array;
	}
	//ADMIN SIDE CSS AND JS ADD FUNCTION
	function MJ_gmgt_change_adminbar_css($hook)
	{	
		$current_page = $_REQUEST['page'];
		$page_array = MJ_gmgt_call_script_page();
		if(in_array($current_page,$page_array))
		{				
			wp_enqueue_style( 'accordian-jquery-ui-css', plugins_url( '/assets/accordian/jquery-ui.css', __FILE__) );		
			wp_enqueue_script('accordian-jquery-ui', plugins_url( '/assets/accordian/jquery-ui.js',__FILE__ ));
		
			wp_enqueue_style( 'gmgt-datatable-css', plugins_url( '/assets/css/dataTables.css', __FILE__) );
			wp_enqueue_style( 'gmgt-dataTables.responsive-css', plugins_url( '/assets/css/dataTables.responsive.css', __FILE__) );
			
			wp_enqueue_style( 'gmgt-style-css', plugins_url( '/assets/css/style.css', __FILE__) );

			wp_enqueue_style( 'gmg -custom-css', plugins_url( '/assets/css/custom.css', __FILE__) );
		
			wp_enqueue_script('gmgt-datatable', plugins_url( '/assets/js/jquery.dataTables.min.js',__FILE__ ), array( 'jquery' ), '4.1.1', true);
			$lancode=get_locale();
			$code=substr($lancode,0,2);
			
			wp_enqueue_script('gmgt-datatable-tools', plugins_url( '/assets/js/dataTables.tableTools.min.js',__FILE__ ), array( 'jquery' ), '4.1.1', true);
			wp_enqueue_script('gmgt  -datatable-editor', plugins_url( '/assets/js/dataTables.editor.min.js',__FILE__ ), array( 'jquery' ), '4.1.1', true);	
			wp_enqueue_script('gmgt-dataTables.responsive-js', plugins_url( '/assets/js/dataTables.responsive.js',__FILE__ ), array( 'jquery' ), '4.1.1', true);	
			wp_enqueue_script('gmgt-customjs', plugins_url( '/assets/js/gmgt_custom.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
			wp_enqueue_script('gmgt-popup', plugins_url( '/assets/js/popup.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
			
			//add page in ajax that use localize ajax page
			wp_localize_script( 'gmgt-popup', 'gmgt', array( 'ajax' => admin_url( 'admin-ajax.php' ) ) );
			wp_enqueue_script('jquery');
			wp_enqueue_media();
	 
			wp_enqueue_script('gmgt-image-upload', plugins_url( '/assets/js/image-upload.js', __FILE__ ), array( 'jquery' ), '4.1.1', true );
		 
			wp_enqueue_style( 'gmgt-bootstrap-css', plugins_url( '/assets/css/bootstrap.min.css', __FILE__) );
			
			wp_enqueue_style( 'gmgt-gymmgt-min-css', plugins_url( '/assets/css/gymmgt.min.css', __FILE__) );
			
			wp_enqueue_style( 'gmgt-gym-responsive-css', plugins_url( '/assets/css/gym-responsive.css', __FILE__) );
		  
			wp_enqueue_script('gmgt-bootstrap-js', plugins_url( '/assets/js/bootstrap.min.js', __FILE__ ) );
			
			wp_enqueue_script('gmgt-gym-js', plugins_url( '/assets/js/gymjs.js', __FILE__ ) );
			
			wp_enqueue_style( 'gmgt-new-version-css', plugins_url( '/assets/css/newversion.css', __FILE__) );
			
			//validation lib//
			wp_enqueue_style( 'wcwm-validate-css', plugins_url( '/lib/validationEngine/css/validationEngine.jquery.css', __FILE__) );	 	
			wp_register_script( 'jquery-validationEngine-'.$code.'', plugins_url( '/lib/validationEngine/js/languages/jquery.validationEngine-'.$code.'.js', __FILE__), array( 'jquery' ) );
			wp_enqueue_script( 'jquery-validationEngine-'.$code.'' );
			wp_register_script( 'jquery-validationEngine', plugins_url( '/lib/validationEngine/js/jquery.validationEngine.js', __FILE__), array( 'jquery' ) );
			wp_enqueue_script( 'jquery-validationEngine' );
			wp_enqueue_script('gmgt-gmgt_custom_confilict_obj-js', plugins_url( '/assets/js/gmgt_custom_confilict_obj.js', __FILE__ ) );			 	
		}			
	}
	if(isset($_REQUEST['page']))
	add_action( 'admin_enqueue_scripts', 'MJ_gmgt_change_adminbar_css' );
}

//add_action('wp_head','MJ_gmgt_user_dashboard');
add_action('init','MJ_gmgt_output_ob_start');

//OUTPUT OB START FUNCTION
function MJ_gmgt_output_ob_start()
{
	ob_start();
}
///INSTALL TABLE PLUGIN ACTIVATE DEAVTIVATE TIME
function MJ_gmgt_install_tables()
{
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	global $wpdb;
		
	$table_gmgt_services = $wpdb->prefix . 'gmgt_services';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_gmgt_services." (
			  `service_id` int(11) NOT NULL AUTO_INCREMENT,
			  `pages` varchar(100),
			  `brochure_site` varchar(100),
			  `woo_commerce` varchar(100),
			  `hosting_brochure` varchar(100),
			  `hosting_ecommerce` varchar(100),
			  `ssl_certificate` varchar(100),
			  `video_banner` varchar(100),
			  `contact_forms` varchar(100),
			  `events_booking` varchar(100),
			  `imagery` varchar(100),			  
			  `copy_writing` varchar(100),			  
			  `seo` varchar(100),			  
			  PRIMARY KEY (`service_id`)
			)DEFAULT CHARSET=utf8";

	$wpdb->query($sql);
	
	$table_gmgt_booked_service = $wpdb->prefix . 'gmgt_booked_service';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_gmgt_booked_service." (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `pages` varchar(100),
			  `wordpress_site` varchar(100),
			  `name` varchar(100),
			  `email` varchar(100),
			  `job_title` varchar(100),
			  `telephone` varchar(100),
			  `company_name` varchar(100),
			  `web_address` varchar(100),
			  `business_type` varchar(100),
			  `location` varchar(100),			  
			  `service_description` text,			  
			  `contact_forms` varchar(100),			  
			  `video_banner` varchar(100),			  
			  `events_booking` varchar(100),			  
			  `web_hosting` varchar(100),			  
			  `imagery` varchar(100),
			  `ssl_certificate` varchar(100),				  
			  `digital_marketing` varchar(100),				  
			  `copy_writing` varchar(100),				  
			  `other_functionality` text,			  
			  `industry` varchar(100),			  
			  `type` varchar(100),			  
			  `market_target` text,			  
			  `competitors` text,			  
			  `total_amount` double,
			  `book_a_call` varchar(100),
			  `submitted` varchar(100),
			  `booking_date` date,			  
			  PRIMARY KEY (`id`)
			)DEFAULT CHARSET=utf8";

	$wpdb->query($sql);
	
	$table_gmgt_faq = $wpdb->prefix . 'gmgt_faq';
	$sql = "CREATE TABLE IF NOT EXISTS ".$table_gmgt_faq." (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `title` varchar(255),
			  `description` text,
			   PRIMARY KEY (`id`)
			)DEFAULT CHARSET=utf8";

	$wpdb->query($sql);	
} 

?>