<?php

/**
 * Plugin Name: Howdy
 */

function howdy_give_me_stuff() {

	if ( !isset($_GET['howdy'] ) )
		return;

	global $wpdb;

	phpinfo();

	echo "\nREQUEST:\n";
	foreach (apache_request_headers() as $header => $value) {
	    echo "$header: $value\n";
	}

	echo "\nRESPONSE:\n";
	foreach (apache_response_headers() as $header => $value) {
	    echo "$header: $value \n";
	}

	echo "\nENV:\n";
	print_r( $_ENV );

	echo "\nSERVER:\n";
	print_r( $_SERVER );

	echo "\nDB SSL:\n";
	print_r( $wpdb->get_row( "SHOW STATUS LIKE 'Ssl_cipher'" ) );

	echo "\nHEADERS:\n";
	print_r( headers_list() );

	die();
}
add_action( 'init', 'howdy_give_me_stuff' );
