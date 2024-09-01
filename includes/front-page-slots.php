<?php

function custom_display_slots() {
    $display_type = get_option('csd_display_type', 'grid'); 
    $slots_count = get_option('csd_slots_count', 22); 

    if (have_rows('slots_block')) {
        $i = 0;

        // Display as a grid
        if ($display_type == 'grid') {
            echo '<div class="slots-grid">';
            while (have_rows('slots_block') && $i < $slots_count) : the_row();
                echo '<div class="grid-slot">';
                echo '<img src="' . get_sub_field('slot_image') . '" alt="">';
                echo '<h3>' . get_sub_field('slot_title') . '</h3>';
                echo '<p>' . get_sub_field('slot_description') . '</p>';
                echo '</div>';
                $i++;
            endwhile;
            echo '</div>';

        // Display as a slider 
        } elseif ($display_type == 'slider') {
            echo '<div class="swiper-container">';

            // Navigation buttons
            echo '<div class="slots-section__navigation">';

            echo '<div class="prev-slot">';
            echo '<svg id="Layer_1" style="enable-background:new 0 0 50 50;" version="1.1" viewBox="0 0 50 50" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Layer_1_1_"><polygon points="37.561,47.293 15.267,25 37.561,2.707 36.146,1.293 12.439,25 36.146,48.707  "/></g></svg>';
            echo '</div>';

            echo '<div class="next-slot">';
            echo '<svg id="Layer_1" style="enable-background:new 0 0 50 50;" version="1.1" viewBox="0 0 50 50" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Layer_1_1_"><polygon points="13.854,48.707 37.561,25 13.854,1.293 12.439,2.707 34.732,25 12.439,47.293  "/></g></svg>';
            echo '</div>';

            echo '</div>';

            // Slides
            echo '<div class="swiper-wrapper">';
            while (have_rows('slots_block') && $i < $slots_count) : the_row();
                echo '<div class="swiper-slide">';
                echo '<div class="slot">';
                echo '<img src="' . get_sub_field('slot_image') . '" alt="">';
                echo '<h3>' . get_sub_field('slot_title') . '</h3>';
                echo '<p>' . get_sub_field('slot_description') . '</p>';
                echo '</div>';
                echo '</div>';
                $i++;
            endwhile;
            echo '</div>';
            
            echo '</div>';
        }
    }
}
