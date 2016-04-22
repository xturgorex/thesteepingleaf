<?php

/**********************/
/* Include parent OCMX files */
$folder = get_stylesheet_directory(). '/ocmx/';
require_once('custom-category-wiget.php');
/* Enqueue Child Theme Scripts & Styles ** 
http://codex.wordpress.org/Function_Reference/wp_enqueue_style 
* Since 1.0 */ 
add_action( 'wp_enqueue_scripts', 'my_child_styles' ); 
  if( ! function_exists( 'my_child_styles' ) ) { 
    function my_child_styles() { 
      wp_enqueue_style(
           'child-style', 
            get_stylesheet_directory_uri() . '/style.css', 
            array('store-style') 
      ); 
   } 
}
function all_child_scripts() {

wp_register_script( 'sly', get_stylesheet_directory_uri().'/js/sly.min.js', array('jquery-core'), true);
wp_register_script('selector', get_stylesheet_directory_uri() . '/js/selector.js', array('jquery-core','sly'), true);
wp_register_script( 'child-custom', get_stylesheet_directory_uri().'/js/child-custom.js', array('jquery-core'), true);
wp_enqueue_script( 'sly' );
wp_enqueue_script( 'selector' );
wp_enqueue_script( 'child-custom' );

}
add_action( 'wp_enqueue_scripts', 'all_child_scripts' );

/*______________________________________________________________________
				re-adding quantity buttons
________________________________________________________________________*/
wp_register_script('qty_btns', get_stylesheet_directory_uri() . '/js/qty_btns.js', array('jquery-core'), true);
wp_enqueue_script( 'qty_btns' );

