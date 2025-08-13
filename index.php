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
function function_to_call(){
    #calling the real function
add_menu_page(
    'MY Plugin settings page',#visible in top bar <title>
    'My Plugin settings',#visible in sidebar main menu
    'manage_options',#permissions 
    'my-plugin-settings',#page slug for uniqueness 
    'dashicons-gears',# the icon from dash icons
    99 #where the menu should appear the position 
);
// add submenu to the above menu 
add_submenu_page(
    'my-plugin-settings',# parent slug
    'My plugin submenu',# submenu title
    'My submenu settings',# submenu sidebar title
    'manage-options', #capability 
    'my-submenu-settings',#slug
    'my-submenu-function'#callback function
);

}
# adding option page in settings 

add_action('admin_menu','add_option page');
function add_option_page(){
    #adds a submenu in the Settings page 
    add_option_page("page title", 'menu title','manage_options','page-slug','callback')
    # there are variation to this function like add_dashboard_page, add_comment_page, add_pages_page, add_plugins_page
    // just by swapping the name we can add the submenu in different menus
}

// option api
// add
add_option('key','value'); #value can be anything and object an array string number 
// retribe 
get_option('key'); # if not defined will return false 
// if defined as boolean try will return String 1
//  if false will return false 
// update option
update_option('key','new value');
// delete option 
delete_option('key');

// option has an optional parameter that is 4th parameter

// creating the page option for the page setting
// option page callback
function callback(){
    ?>
    <form action="options.php" method="post">
        <!-- your inputs -->

    </form>
<?
}

// registering the options
// args are associated array like 
$args = [
    'type'=>'string',
    'sanitize_callback'=>'sanitize function name',
    'default'=>null # value if not defined
]

register_options('option group','option name','args');

// custom post type CPT

public function custom_post_type(){
   regirster_post_type('nameofposttype',[
    'labels'=>[
        'name'=>__('Products','text-domain'),
        'singular_name'=>__('Product','text_domain')
    ],
    'public'=>true,
    'has_archive'=>true
   ])

}
// now its time to register 
add_action('init','custom_post_type');