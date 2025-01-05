<?php
/**
 * @package Tiled Pages
 * @version 0.1
 */
/*
Plugin Name: Tiled Pages
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Provides links to the list of pages in a tiled format.
Author: Matthew Berryman
Version: 0.1
Author URI: https://github.com/matthewberryman
*/

function shortcodes_init(){
  add_shortcode('tiled_pages', 'tiled_pages_handler_function' );
}
add_action('init', 'shortcodes_init');

function tiled_pages_handler_function ($atts) {
  $output = '<div class="tiled-pages" style="display: flex; flex-wrap: wrap; gap: 10px;">';
  $pages = get_pages();
  foreach ($pages as $page){
    $output .= '<div style="flex: 0 0 200px; height: 200px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; text-align: center;">';
    $output .= '<a href="' . get_page_link($page->ID) . '" style="text-decoration: none; color: #333; padding: 10px;">' . 
               $page->post_title . '</a>';
    $output .= '</div>';
  }
  $output .= '</div>';
  return $output;
}

?>