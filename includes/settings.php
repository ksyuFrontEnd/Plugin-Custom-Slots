<?php
// Adding a settings page to the admin panel
add_action('admin_menu', 'csd_add_admin_menu');
function csd_add_admin_menu() {
    add_menu_page('Custom Slots Display', 'Slots Display', 'manage_options', 'custom-slots-display', 'csd_settings_page');
}

// Displaying the settings page
function csd_settings_page() {
    ?>
    <div class="wrap">
        <h1>Custom Slots Display Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('csd_settings_group');
            do_settings_sections('csd_settings_page');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Registering settings
add_action('admin_init', 'csd_register_settings');
function csd_register_settings() {
    register_setting('csd_settings_group', 'csd_display_type');
    register_setting('csd_settings_group', 'csd_slots_count'); 

    add_settings_section('csd_settings_section', '', null, 'csd_settings_page');

    add_settings_field('csd_display_type', 'Type of slots display', 'csd_display_type_field', 'csd_settings_page', 'csd_settings_section');
    add_settings_field('csd_slots_count', 'Amount of slots', 'csd_slots_count_field', 'csd_settings_page', 'csd_settings_section');
}

function csd_display_type_field() {
    $value = get_option('csd_display_type', 'grid');
    ?>
    <select name="csd_display_type">
        <option value="grid" <?php selected($value, 'grid'); ?>>Grid</option>
        <option value="slider" <?php selected($value, 'slider'); ?>>Slider</option>
    </select>
    <?php
}

function csd_slots_count_field() {
    $value = get_option('csd_slots_count', 22);
    ?>
    <input type="number" name="csd_slots_count" value="<?php echo esc_attr($value); ?>" min="1" />
    <?php
}
