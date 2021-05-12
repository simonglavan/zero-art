<?php

//SECTIONS
Kirki::add_section( 'sections__featured-artists', array(
    'title'          => esc_html__( 'Featured Artists', 'kirki' ),
    'description'    => esc_html__( 'Featured Artists settings.', 'kirki' ),
    'panel'          => 'sections',
    'priority'       => 160,
) );
//END SECTIONS

//CONTROLS
Kirki::add_field( 'zero_art_config', [
	'type'     => 'text',
	'settings' => 'sections__featured-artists-title',
	'label'    => esc_html__( 'Section Title', 'kirki' ),
	'section'  => 'sections__featured-artists',
	'default'  => esc_html__( 'Featured Artists', 'kirki' ),
	'priority' => 10,
] );