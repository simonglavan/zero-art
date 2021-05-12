<?php

//PANEL
Kirki::add_panel( 'sections', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Sections', 'kirki' ),
    'description' => esc_html__( 'Sections settings', 'kirki' ),
) );
//END PANEL

//SECTIONS
Kirki::add_section( 'sections__featured-arts', array(
    'title'          => esc_html__( 'Featured Paintings', 'kirki' ),
    'description'    => esc_html__( 'Featured Paintings settings.', 'kirki' ),
    'panel'          => 'sections',
    'priority'       => 160,
) );
//END SECTIONS

//CONTROLS
Kirki::add_field( 'zero_art_config', [
	'type'     => 'text',
	'settings' => 'sections__featured-arts-title',
	'label'    => esc_html__( 'Section Title', 'kirki' ),
	'section'  => 'sections__featured-arts',
	'default'  => esc_html__( 'Featured Paintings', 'kirki' ),
	'priority' => 10,
] );