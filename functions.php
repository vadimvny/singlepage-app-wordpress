<?php
/**
* functions file for lander child theme
*/

function lander_scripts() {
	if ( is_front_page() ) {
		wp_enqueue_script( 'lander-styles', get_stylesheet_directory_uri() . '/style.css');
		wp_enqueue_script( 'lander-scripts', get_stylesheet_directory_uri() . '/js/landerscripts.js', array('jquery'), '20140602', false);
	}
}

add_action('wp_enqueue_scripts', 'lander_scripts' );

/*only load css when the front-page loads. */ 	

/*setting testimonial images to be 253 by 253, true to crop the image to fit */ 

add_image_size( 'testimonial_mug', 253, 253, true ); 

/* excluding testimonials on news page */

// function exclude_testimonials ( $query ) {
// 	/* this will not happen if in the category page */
// 	/* is_main_query() tests so it will not interact with other queries */
// 	if ( !$query->is_category('testimonials') && $query->is_main_query() )  {
// 		$query->set('cat', '-5'); /*exclude category with id of 5 which is testimonials*/
// 	}
// }

// add_action('pre_get_posts', 'exclude_testimonials'); 

// /* before query -> get exclude testimonials */

function exclude_testimonials( $query ) {
    if ( !$query->is_category('testimonial') && $query->is_main_query() ) {
        $query->set( 'cat', '-5' );
    }
}
add_action( 'pre_get_posts', 'exclude_testimonials' );

