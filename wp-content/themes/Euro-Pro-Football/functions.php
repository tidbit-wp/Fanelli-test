<?php
/**
 * Euro Pro Max functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Euro Pro Max
 * @since Euro Pro Max 1.0
 */

/**
 * Euro Pro Max only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	
	return;
}


/*
* 
* Enqueue Style And script
*/
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'bootsrap-4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
	  wp_enqueue_style( 'fontawsome',  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css' );
	  wp_enqueue_style( 'style',   get_stylesheet_directory_uri(). '/style.css' );
    wp_enqueue_script( 'bs-jquery', 'https://code.jquery.com/jquery-3.6.0.js', array('jquery'), '1.0.0', true );
    // wp_enqueue_script( 'ui-jquery', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'propermin', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'touch-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'profile-js', get_stylesheet_directory_uri(). '/assets/custom-profile.js', array(), '1.0.0', true );
	  wp_enqueue_script( 'custom-jQuery', get_stylesheet_directory_uri(). '/assets/custom.js', array(), 3.4 );
	  wp_localize_script( 'custom-jQuery', 'frontend_ajax_object',
      array( 
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'data_var_1' => 'value 1',
          'data_var_2' => 'value 2',
      )
  );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Add New User role "Player"
add_role('Player', 'Player', array(
    'read' => true, // True allows that capability
    'edit_posts' => true,
    'delete_posts' => false, // Use false to explicitly deny
)); 

/**************************** Register menu ****************************/
register_nav_menus(array(
    'primary' => __('Primary Menu', 'My_First_WordPress_Theme'),
    'footer' => __('Secondary Menu',       'My_First_WordPress_Theme'),
    'My_custome_menu' => __('finally Menu', 'My_First_WordPress_Theme')
));
/****************Custom Logo ************************** */
function themename_custom_logo_setup(){
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
   'unlink-homepage-logo' => true, 
    );
     //add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'html5',array('search-form'));
    add_theme_support( 'title-tag' );
}
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
   

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function add_class_to_all_menu_anchors( $atts ) {
    $atts['class'] = 'nav-link';
 
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10 );

add_filter('wp_nav_menu_args', 'prefix_nav_menu_args');
function prefix_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}


/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
      wp_die('No post to duplicate has been supplied!');
    }
   
    /*
     * Nonce verification
     */
    if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
      return;
   
    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    /*
     * and all the original post data then
     */
    $post = get_post( $post_id );
   
    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;
   
    /*
     * if post data exists, create the post duplicate
     */
    if (isset( $post ) && $post != null) {
   
      /*
       * new post data array
       */
      $args = array(
        'comment_status' => $post->comment_status,
        'ping_status'    => $post->ping_status,
        'post_author'    => $new_post_author,
        'post_content'   => $post->post_content,
        'post_excerpt'   => $post->post_excerpt,
        'post_name'      => $post->post_name,
        'post_parent'    => $post->post_parent,
        'post_password'  => $post->post_password,
        'post_status'    => 'draft',
        'post_title'     => $post->post_title,
        'post_type'      => $post->post_type,
        'to_ping'        => $post->to_ping,
        'menu_order'     => $post->menu_order
      );
   
      /*
       * insert the post by wp_insert_post() function
       */
      $new_post_id = wp_insert_post( $args );
   
      /*
       * get all current post terms ad set them to the new post draft
       */
      $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
      foreach ($taxonomies as $taxonomy) {
        $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
        wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
      }
   
      /*
       * duplicate all post meta just in two SQL queries
       */
      $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
      if (count($post_meta_infos)!=0) {
        $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
        foreach ($post_meta_infos as $meta_info) {
          $meta_key = $meta_info->meta_key;
          if( $meta_key == '_wp_old_slug' ) continue;
          $meta_value = addslashes($meta_info->meta_value);
          $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
        }
        $sql_query.= implode(" UNION ALL ", $sql_query_sel);
        $wpdb->query($sql_query);
      }
   
   
      /*
       * finally, redirect to the edit post screen for the new draft
       */
      wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
      exit;
    } else {
      wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
  }
  add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
   
  /*
   * Add the duplicate link to action list for post_row_actions
   */
  function rd_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
      $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
  }
   
  add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

  add_action('wp_ajax_customuserregister', 'customuserregister');
  add_action('wp_ajax_nopriv_customuserregister', 'customuserregister');
  function customuserregister(){ 
    ob_start();
    get_template_part('page-userregistercode');
    return ob_get_clean();
  }

  //Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
  $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
  }
  add_filter( 'body_class', 'add_slug_body_class' );

/**
 * Euro Pro Max custom Plugin AJAX Function,hooks action.
 */
  
// Procuct form submite through backend AJAX function
  add_action('wp_ajax_productformcode', 'productformcode');
  add_action('wp_ajax_nopriv_productformcode', 'productformcode');
  function productformcode(){ 

    global $wpdb, $user_ID; 
      $productname=$_POST['productname'];
      $productdisc=$_POST['product_discription'];
      $productprice=$_POST['product_price'];
      $product2ndprice=$_POST['product_2ndtimeprice'];
      $product3rdprice=$_POST['product_3rdtimeprice'];
      $productdependency=$_POST['hgvhvg'];
      $productactive=$_POST['product_active'];

      if($wpdb->insert('wp_products', array(
        'product_name' => $productname,
        'product_discription' =>$productdisc,
        'product_price' => $productprice,
        'product_price2ndtime' => $product2ndprice,
        'product_price3rdtime' => $product3rdprice,
        'product_dependency' => $productdependency,
        'product_active' =>$productactive
    ))== false )
    wp_die('Database Insert Faild');
    echo"1";

    die();

  }

  // location form submite through backend AJAX function
  add_action('wp_ajax_locationformcode', 'locationformcode');
  add_action('wp_ajax_nopriv_locationformcode', 'locationformcode');
  function locationformcode(){ 

    global $wpdb, $user_ID; 
      $locationname=$_POST['locationname'];
      $locationactive=$_POST['location_active'];

      if($wpdb->insert('wp_location', array(
        'location_name' => $locationname,
        'location_active' =>$locationactive
    ))== false )
    wp_die('Database Insert Faild');
    echo"1";

    die();

  }

  // sublocation Form submit throught backend AJAX function

  add_action('wp_ajax_sublocationformcode', 'sublocationformcode');
  add_action('wp_ajax_nopriv_sublocationformcode', 'sublocationformcode');
  function sublocationformcode(){ 

    global $wpdb, $user_ID; 
      $sublocationname=$_POST['sublocationname'];
      $sublocationvanue=$_POST['sublocationvanue'];
      $sublocationactive=$_POST['sublocation_active'];

      if($wpdb->insert('wp_sublocation', array(
        'sublocation_name' => $sublocationname,
        'sublocation_vanue' => $sublocationvanue,
        'sublocation_active' =>$sublocationactive
    ))== false )
    wp_die('Database Insert Faild');
    echo"1";

    die();
  }

  add_action('wp_ajax_updateproductdata', 'updateproductdata');
  add_action('wp_ajax_nopriv_updateproductdata', 'updateproductdata');
  function updateproductdata(){ 
    ob_start();
    get_template_part('page-updateproductajax');
    return ob_get_clean();

    die();
  }

  add_action('wp_ajax_updateproductform', 'updateproductform');
  add_action('wp_ajax_nopriv_updateproductform', 'updateproductform');
  function updateproductform(){ 

    global $wpdb, $user_ID; 
    
      if ($wpdb->update(                                               
        'wp_products', //table name
        array(
          'product_name' => $_POST['productupdatedname'],
          'product_discription' =>$_POST['productupdateddisc'],
          'product_price' => $_POST['productupdatedprice'],
          'product_price2ndtime' => $_POST['productupdatedprice2'],
          'product_price3rdtime' => $_POST['productupdatedprice3'],
          'product_dependency' => $_POST['productupdateddependecy'],
          'product_active' =>$_POST['productupdatedactive']
        ),
        array('product_id'=>$_POST['productid'])
                
    ) == false )
    wp_die('Database Insert Faild');
    echo"1";

    die();

  }

  add_action('wp_ajax_updatedmappingform', 'updatedmappingform');
  add_action('wp_ajax_nopriv_updatedmappingform', 'updatedmappingform');
function updatedmappingform(){ 

  global $wpdb, $user_ID; 
    if($_POST['mapping_id'])  {
      if ($wpdb->update(                                               
        'wp_mapping',
        array(
          'mapping_active' => $_POST['mapping_active']
          ),
        array('mapping_id'=> $_POST['mapping_id'])
                
    ) == false )

     wp_die('Database Insert Faild');
    
     echo"1";
        }
    die();

  }

  
  //  location from Update when user click edit location
  add_action('wp_ajax_updatelocationdata', 'updatelocationdata');
  add_action('wp_ajax_nopriv_updatelocationdata', 'updatelocationdata');
  function updatelocationdata(){ 
    ob_start();
    get_template_part('page-updatelocationajax');
    return ob_get_clean();

    die();
  }

  add_action('wp_ajax_updatetax', 'updatetax');
  add_action('wp_ajax_nopriv_updatetax', 'updatetax');
  function updatetax(){ 
    ob_start();
    get_template_part('page-updatetax');
    return ob_get_clean();

    die();
  }

  // mapping update
  add_action('wp_ajax_updatemappingdata', 'updatemappingdata');
  add_action('wp_ajax_nopriv_updatemappingdata', 'updatemappingdata');
  function updatemappingdata(){ 
    ob_start();
    get_template_part('page-updatemappingajax');
    return ob_get_clean();

    die();
  }

  add_action('wp_ajax_viewmappingdata', 'viewmappingdata');
  add_action('wp_ajax_nopriv_viewmappingdata', 'viewmappingdata');
  function viewmappingdata(){ 
    ob_start();
    get_template_part('page-viewmappingdata');
    return ob_get_clean();

    die();
  }
  
  add_action('wp_ajax_updatelocationform', 'updatelocationform');
  add_action('wp_ajax_nopriv_updatelocationform', 'updatelocationform');
  function updatelocationform(){ 

    global $wpdb, $user_ID; 
    if($_POST['locationname'])  
      if ($wpdb->update(                                               
        'wp_location', //table name
        array(
        'location_name' => $_POST['locationname'],
        'location_active' => $_POST['location_active']
        ),
        array('location_id'=>$_POST['locationid'])
                
    ) == false )
    wp_die('Database Insert Faild');
    echo"1";

    die();

  }
//  sublocation from Update when user click edit location

add_action('wp_ajax_updatesublocationdata', 'updatesublocationdata');
  add_action('wp_ajax_nopriv_updatesublocationdata', 'updatesublocationdata');
  function updatesublocationdata(){ 
    ob_start();
    get_template_part('page-updatesublocationajax');
    return ob_get_clean();

    die();
  }

  add_action('wp_ajax_updatesublocationform', 'updatesublocationform');
  add_action('wp_ajax_nopriv_updatesublocationform', 'updatesublocationform');
  function updatesublocationform(){ 

    global $wpdb, $user_ID; 

      if ($wpdb->update(                                               
        'wp_sublocation', //table name
        array(
        'sublocation_name' => $_POST['sublocationname'],
        'sublocation_vanue' => $_POST['sublocationvanue'],
        'sublocation_active' => $_POST['sublocation_active']
        ),
        array('sublocation_id'=>$_POST['sublocationid'])
                
    ) == false )
    wp_die('Database Insert Faild');
    echo"1";

    die();
  }
  add_action('wp_ajax_updatetaxform', 'updatetaxform');
  add_action('wp_ajax_nopriv_updatetaxform', 'updatetaxform');
  function updatetaxform(){ 

    global $wpdb, $user_ID; 

      if ($wpdb->update(                                               
        'wp_tax', //table name
        array(
        'tax_value' => $_POST['locationname']
        ),
        array('tax_id'=>$_POST['locationid'])
                
    ) == false )
    wp_die('Database Insert Faild');
    echo"1";

    die();
  }

  add_action('wp_ajax_bookingstatusupdate', 'bookingstatusupdate');
  add_action('wp_ajax_nopriv_bookingstatusupdate', 'bookingstatusupdate');
  function bookingstatusupdate(){ 

    global $wpdb, $user_ID; 

      if ($wpdb->update(                                               
        'wp_book', //table name
        array(
        'product_status' => $_POST['Player_status']
        ),
        array('book_id'=>$_POST['bookid'])
                
    ) == false )
    wp_die('Database Insert Faild');
    echo"1";

    die();
  }
  

  //  Event Ajax function start
  add_action('wp_ajax_eventformsubmit', 'eventformsubmit');
  add_action('wp_ajax_nopriv_eventformsubmit', 'eventformsubmit');
  function eventformsubmit(){ 
    ob_start();
    get_template_part('page-eventformsubmit');
    return ob_get_clean();

    die();
  }

  add_action('wp_ajax_updateeventdata', 'updateeventdata');
  add_action('wp_ajax_nopriv_updateeventdata', 'updateeventdata');
    add_action('wp_ajax_booking_data', 'booking_data');
  add_action('wp_ajax_nopriv_booking_data', 'booking_data');
  function updateeventdata(){ 
    ob_start();
    get_template_part('page-updateeventdata');
    return ob_get_clean();

    die();
  }
	function booking_data(){ 
    ob_start();
    get_template_part('page-booking_data');
    return ob_get_clean();

    die();
  }
  add_action('wp_ajax_updateeventformsubmit', 'updateeventformsubmit');
  add_action('wp_ajax_nopriv_updateeventformsubmit', 'updateeventformsubmit');
  function updateeventformsubmit(){ 
    ob_start();
    get_template_part('page-updateeventformsubmit');
    return ob_get_clean();

    die();
  }
// event AJax function end 

  add_action('wp_ajax_mappingformcode', 'mappingformcode');
  add_action('wp_ajax_nopriv_mappingformcode', 'mappingformcode');
  function mappingformcode(){ 
    
    global $wpdb, $user_ID; 
    if($_POST['mapping_productname'])  {
        if ($wpdb->insert(                                               
          'wp_mapping', //table name
          array(
            'product_id' => $_POST['mapping_productname'],
            'location_id' => $_POST['mapping_locationtname'],
            'sublocation_id' => $_POST['mapping_sublocationname'],
            'event_id' => $_POST['mapping_eventname'],
            'mapping_active' => $_POST['mapping_active']
          )) == false )
          wp_die('Database Insert Faild');
          echo"1";
    }
    die();

  }

  add_action('wp_ajax_taxformsubmit', 'taxformsubmit');
  add_action('wp_ajax_nopriv_taxformsubmit', 'taxformsubmit');
  function taxformsubmit(){ 
    
    global $wpdb, $user_ID; 
    if($_POST['value'])  {

        if ($wpdb->insert(                                               
          'wp_tax', //table name
          array(
            'tax_value' => $_POST['value']
          )) == false )
          wp_die('Database Insert Faild');
          echo"1";
    }
    die();

  }

  add_action('wp_ajax_call_out', 'call_out');
  add_action('wp_ajax_nopriv_call_out', 'call_out');
  function call_out(){ 
    ob_start();
    get_template_part('page-bookingajaxfile');
    return ob_get_clean();

    die();
  }
  
  add_action('wp_ajax_callin', 'callin');
  add_action('wp_ajax_nopriv_callin', 'callin');
  function callin(){ 
    ob_start();
    get_template_part('page-bookingajaxcallinfile');
    return ob_get_clean();

    die();
  }

  add_action('wp_ajax_bookingdat', 'bookingdat');
  add_action('wp_ajax_nopriv_bookingdat', 'bookingdat');
  function bookingdat(){ 
    ob_start();
    get_template_part('page-bookingdatainsert');
    return ob_get_clean();

    die();
  }

  if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings'
      
    ));
    
    acf_add_options_sub_page(array(
      'page_title' 	=> 'Hello Bar Settings',
      'menu_title'	=> 'Hello Bar',
      'parent_slug'	=> 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
      'page_title' 	=> 'Theme Footer Settings',
      'menu_title'	=> 'Footer',
      'parent_slug'	=> 'theme-general-settings',
    ));
    
  }


  // if( function_exists('acf_add_options_page') ) {
	
  //   acf_add_options_page(array(
  //     'page_title' 	=> 'Footer General Settings',
  //     'menu_title'	=> 'Footer Settings',
  //     'menu_slug' 	=> 'footer-settings',
  //     'capability'	=> 'edit_posts',
  //     'redirect'		=> false
  //   ));
  // }
 //Player Redirect// 
add_action( 'init', 'redirect_player');
function redirect_player() 
{
	
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$home_url = get_home_url();	
	if( is_user_logged_in() ) 
	{
		$user = wp_get_current_user();
		$roles = ( array ) $user->roles;
		if (in_array("Player", $roles))
		{
			if($actual_link == $home_url.'/create-profile' || $actual_link == $home_url.'/create-profile' || $actual_link == $home_url.'/create-profile/' || $actual_link == $home_url.'create-profile/')
			{
				wp_redirect($home_url.'/book-a-trial/');	
				die;
			}	
			if($actual_link == $home_url.'/wp-admin' || $actual_link == $home_url.'wp-admin' || $actual_link == $home_url.'/wp-admin/' || $actual_link == $home_url.'wp-admin/' )
			{
				wp_redirect($home_url);	
				die;
			}	
		}
	}
	if(!is_user_logged_in()) 
	{
		if($actual_link == $home_url.'/book-a-trial' || $actual_link == $home_url.'/book-a-trial' || $actual_link == $home_url.'/book-a-trial/' || $actual_link == $home_url.'book-a-trial/')
		{
			wp_redirect($home_url.'/create-profile/');	
			die;
		}
	} 
	
}
// dissalow admin bar 


// add_action('admin_init', 'wpse66094_no_admin_access');
// function wpse66094_no_admin_access() {
//   $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );
//   global $current_user;
//   $user_roles = $current_user->roles;
//   $user_role = array_shift($user_roles);
//   if($user_role === 'Player'){
//       exit( wp_redirect( $redirect ) );
//   }
//   return false;
// }

add_action('wp_ajax_recurringselecteddate', 'recurringselecteddate');
  add_action('wp_ajax_nopriv_recurringselecteddate', 'recurringselecteddate');
  function recurringselecteddate(){ 

      global $wpdb, $user_ID; 
    $RmappID=$_POST['mappingID'];
    $RslorID=$_POST['slot_id'];
    $RdateID=$_POST['date_id'];
    $Rselecteddate=$_POST['selecteddatevalue'];

    $table_book = $wpdb->prefix . "book";
    $orderlist = $wpdb->get_results( "SELECT * FROM $table_book WHERE mapping_id=$RmappID AND dates_id=$RdateID AND slot_id=$RslorID" );
    $count=0;
    foreach($orderlist as $ordelistget){
      //   var_dump($ordelistget->event_date);
        if($ordelistget->event_date == $Rselecteddate ){
           $count++;
        }
    }
    //var_dump($orderlist);
    // var_dump($Rselecteddate);
    // $countdata=count($orderlist);
    echo $count;     

    die();
  }
add_action( 'wp_login_failed', 'front_end_login_fail' );
function front_end_login_fail( $username ) 
{
	// Getting URL of the login page
	$referrer = $_SERVER['HTTP_REFERER'];    
	// if there's a valid referrer, and it's not the default log-in screen
	if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) 
	{
		$home_url = get_home_url();	
		wp_redirect( $home_url. "/login?login-msg=failed" ); 
		exit;
	}

}
add_action('wp_ajax_forcommondevents', 'forcommondevents');
  add_action('wp_ajax_nopriv_forcommondevents', 'forcommondevents');
  function forcommondevents(){ 
    ob_start();
    get_template_part('page-gettingdaywisedate');
    return ob_get_clean();

   die();
  }

  add_action('booking_cron_update_status', 'forcronjobBooking');
  function forcronjobBooking(){
    ob_start();
    get_template_part('page-cronpagerun');
    return ob_get_clean();

   die();
  }