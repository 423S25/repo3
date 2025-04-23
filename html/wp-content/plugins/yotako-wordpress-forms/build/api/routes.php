<?php
require_once(__DIR__ . '/controllers/forms.php');

add_action( 'rest_api_init', function () {
	register_rest_route( 'yotako/v1', '/form', array(
	  'methods' => 'POST',
	  'callback' => 'submit_yotako_form',
	) );
});