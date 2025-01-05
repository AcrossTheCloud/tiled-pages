<?php
/**
 * @package Tiled Pages
 * @version 0.2
 */
/*
Plugin Name: Tiled Pages
Plugin URI: https://github.com/AcrossTheCloud/tiled-pages
Description: Provides links to the list of pages in a tiled format.
Author: Matthew Berryman
Version: 0.2
License: GPLv3
Author URI: https://github.com/matthewberryman
*/

function shortcodes_init(){
  add_shortcode('tiled_pages', 'tiled_pages_handler_function' );
}
add_action('init', 'shortcodes_init');

function tiled_pages_handler_function ($atts) {
  // Sanitize colour input and validate hex color format
  $raw_colour = $atts['colour'] ?? $atts['color'] ?? '#f0f0f0';
  $colour = preg_match('/^#[a-f0-9]{6}$/i', $raw_colour) ? $raw_colour : '#f0f0f0';
  $output = '<div class="tiled-pages" style="display: flex; flex-wrap: wrap; gap: 10px;">';
  $pages = get_pages();
  if (isset($atts['order']) && strtolower($atts['order']) === 'desc') {
    // Sort the pages in descending order
    usort($pages, function($a, $b) {
      return $b->menu_order - $a->menu_order;
    });
  } elseif ($atts['order'] == 'asc') {
    // Sort the pages in ascending order
    usort($pages, function($a, $b) {
      return $a->menu_order - $b->menu_order;
    });
  }
  foreach ($pages as $page){
    $output .= '<div style="flex: 0 0 150px; height: 75px; background-color: ' . $colour . '; display: flex; align-items: center; justify-content: center; text-align: center;">';
    $output .= '<a href="' . get_page_link($page->ID) . '" style="text-decoration: none; color: #333; padding: 10px;">' . 
               $page->post_title . '</a>';
    $output .= '</div>';
  }
  $output .= '</div>';
  return $output;
}

?>