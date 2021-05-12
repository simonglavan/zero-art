<?php

//GMAP FOR ACF
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyDNi63-xCdZdjC3FGq_WP0ctpm3NV4bxBU';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');