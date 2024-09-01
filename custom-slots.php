<?php
/*
Plugin Name: Custom Slots with Dynamic Display
Description: Add the ability to change the number of slots and toggle between grid and slider views.
Version: 1.0.0
Author: Oksana Baranik
*/

if (!defined('ABSPATH')) {
    exit; 
}

// Connecting settings and frontend display
include plugin_dir_path(__FILE__) . 'includes/settings.php';
include plugin_dir_path(__FILE__) . 'includes/front-page-slots.php';

// Enqueing styles and scripts for Swiper
add_action('wp_enqueue_scripts', 'csd_enqueue_scripts');
function csd_enqueue_scripts() {
    
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array('jquery'), null, true);

    // Initialization of Swiper
    wp_add_inline_script('swiper-js', '
        jQuery(document).ready(function($) {
            var swiper = new Swiper(".swiper-container", {
                slidesPerView: 2,
                spaceBetween: 16,
                navigation: {
                    nextEl: ".next-slot",
                    prevEl: ".prev-slot",
                },
               breakpoints: {
                    481: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    769: {
                        slidesPerView: 5,
                        spaceBetween: 16,
                    },
                    1201: {
                        slidesPerView: 6,
                        spaceBetween: 16,
                    },
                    1367: {
                        slidesPerView: 7,
                        spaceBetween: 16,
                    },
                },
            });
        });
    ');
}

