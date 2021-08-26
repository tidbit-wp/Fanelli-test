<?php
/*
Plugin Name: Players and Booking system
Description: children to come to a football trial to see if their skills are good enough to play for a premier team.
Initially they can only book a trial then when they have had their trial they then get feedback via the website and 
then other training camps are available to book to help improve the areas of skill that need work.
Version: 1.0.0
Author: Tidbit Solution	
Text Domain: player-booking
*/

define( 'PB_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'PB_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'PB_PLUGIN_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) );
define( 'PB_CONTENT_URL',  content_url( ));
define( 'PB_HOME_URL',  home_url( ));
require_once PB_PLUGIN_DIR . '/settings.php';
?>