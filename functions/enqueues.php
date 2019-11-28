<?php
/*
 * Enqueues
 
*/
$url = 'https://code.jquery.com/jquery-latest.min.js';
$test_url = @fopen($url, 'r');
if ($test_url !== false) {
    function load_external_jQuery()
    {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-latest.min.js');
        wp_enqueue_script('jquery');
    }
    add_action('wp_enqueue_scripts', 'load_external_jQuery');
} else {
    function load_local_jQuery()
    {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_bloginfo('template_url') . './assets/js/jquery.min.js');
        wp_enqueue_script('jquery');
    }
    add_action('wp_enqueue_scripts', 'load_local_jQuery');
}

if ( ! function_exists('b4st_enqueues') ) {
	function b4st_enqueues() {

		// Styles

		wp_register_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css', false, '4.1.3', null);
		wp_enqueue_style('bootstrap');

		wp_register_style('fontawesome5', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', false, '5.6.1', null);
		wp_enqueue_style('fontawesome5');

		wp_enqueue_style( 'gutenberg-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

		wp_register_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', true, '2.3.4');
		wp_register_style('owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', true, '2.3.4');
		wp_enqueue_style('owl-carousel-css');
		wp_enqueue_style('owl-carousel-theme');

		wp_register_style('b4st', get_template_directory_uri() . '/assets/css/main.css', false, null);
		wp_enqueue_style('b4st');

		// Scripts

		wp_register_script('modernizr',  'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, '2.8.3', true);
		wp_enqueue_script('modernizr');

		wp_enqueue_script('jquery');

		wp_register_script('bootstrap-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js', false, '4.1.3', true);
		wp_enqueue_script('bootstrap-bundle');
		// (The Bootstrap JS bundle contains Popper JS.)

		wp_register_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', true, '2.3.4');
		wp_enqueue_script('owl-carousel-js');

		wp_register_script('clocks-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js', true, '2.2.0');
		wp_enqueue_script('clocks-js');


		wp_register_script('b4st', get_template_directory_uri() . '/assets/js/b4st.js', false, null, true);
		wp_enqueue_script('b4st');

		wp_register_script('main-js', get_template_directory_uri() . '/assets/js/main-js.js', false, null, true);
		wp_enqueue_script('main-js');

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'b4st_enqueues', 100);