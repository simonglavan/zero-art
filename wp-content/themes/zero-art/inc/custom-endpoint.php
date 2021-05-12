<?php

function ep_arts() {
	$args = [
		
		'post_type' => 'arts'
	];

	$posts = get_posts($args);

	$data = [];
	$i = 0;

	foreach($posts as $post) {
        $artist = get_post_meta( $post->ID, '_artist', true );
        $artistdata = get_post($artist[0]);
		$data[$i]['id'] = $post->ID;
		$data[$i]['title'] = $post->post_title;
		$data[$i]['slug'] = $post->post_name;
		$data[$i]['featured_image']['large'] = get_the_post_thumbnail_url($post->ID, 'large');
		$data[$i]['author'] = $artistdata;

		$i++;
	}

	return $data;
}

function ep_section_titles() {

    $data['section_featured_paintings']['title'] = get_theme_mod('sections__featured-arts-title');
    $data['section_featured_artists']['title'] = get_theme_mod('sections__featured-artists-title');
	return $data;
}

add_action('rest_api_init', function() {
	register_rest_route('zero-art/v1', 'arts', [
		'methods' => 'GET',
		'callback' => 'ep_arts',
	]);

    register_rest_route('zero-art/v1', 'section-titles', [
		'methods' => 'GET',
		'callback' => 'ep_section_titles',
	]);
});