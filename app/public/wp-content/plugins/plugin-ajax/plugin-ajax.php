<?php


// Plugin Name: plugin-ajax 
// Description: Place for plugin
// Version: 1.0
// Author: Big Steve


// API Endpoint: https://www.shinola.com/our-stories/wp-json/



defined( 'ABSPATH') or die( 'Unauthorized access');

// Shortcode creation
add_shortcode('rest-ajax', 'rest_ajax_shortcode');


function rest_ajax_shortcode () {
    ?> <p id="ajax-text"></p>
<?php
    //Write Ajax to show info in shortcode
    wp_enqueue_script('rest-ajax-scripts', plugins_url('assets/js/plugin-ajax.js', __FILE__), ['jquery'], '1.0', true);
}

add_action ( 'rest_api_init', 'rest_ajax_endpoint');

function rest_ajax_endpoint() {
    register_rest_route(
        'api',
        'rest-ajax',
        [
            'methods'             => 'GET',
            'permission_callback' => '__return_true',
            'callback'            => 'rest_ajax_callback'
        ]
        );
};




// Rest Endpoint
function rest_ajax_callback() {
    $data = '';
    $arg = [
        'methods' => 'GET',
    ];
    $response = wp_remote_get( 'https://www.shinola.com/our-stories/wp-json/wp/v2/posts?_embed', $args);
    $response = wp_remote_retrieve_body($response);
    $response = json_decode($response);
    return $response;
}

?>