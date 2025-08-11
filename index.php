<?php
if (current_user_can('manage_options')) {
    # this code will be executed only if user has privileges development
}
;
$to = "email@example.com";
$subject = "test mail";
$content = "This is a test message";
wp_mail($to, $subject, $content);

#creating the menu page in the admin dashboard 
add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);

# calling the admin_menu action hook with the function where i have defined the settings 
add_action('admin_menu', 'function_to_call');
function function_to_call(
    #calling the real function
add_menu_page(
    'MY Plugin settings page',#visible in top bar <title>
    'My Plugin settings',#visible in sidebar main menu
    'manage_options',#permissions 
    'my-plugin-settings',#page slug for uniqueness 
    'dashicons-gears',# the icon from dash icons
    99 #where the menu should appear the position 
);

);