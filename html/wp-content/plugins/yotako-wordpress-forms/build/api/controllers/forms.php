<?php

function submit_yotako_form(WP_REST_Request $request) {
	$parameters = $request->get_params();
	// @insert to DB

	// global $wpdb;
	// $tablename = $wpdb->prefix.'yotako_forms';
	// $wpdb->insert( $tablename, array(
	// 	'form' => $parameters['form'], 
	// 	'data' => json_encode($parameters['data'])),
	// 	array(
	// 		'%s',
	// 		'%s'
	// 	)
	// );

	// @Send by email
  	$ToEmail = get_option( 'admin_email' );
	$data = $parameters['data'];
	$request_url = "https://api.yotako.io/v1/theme/sendFormEmail/{$parameters['slug']}/{$parameters['form']}";
	$body_email_string = '';
	foreach ($data as $key => $value){
		$body_email_string .= " {$key}: {$value}\n";
	 }

	 $body_json = array( 'to' => $ToEmail, 'subject' => "You have recieved a new form request!", 'body'=>$body_email_string);
	 $response = wp_remote_post( $request_url, array(
		'method' => 'POST',
		'timeout'     => 45,
		'headers' => array(
			"Content-Type"=>"application/json"
		),
		'body' =>json_encode($body_json))
		
	);
	if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		return "Something went wrong: $error_message";
	 } else {
		return $response;
	 }

}
