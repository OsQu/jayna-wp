<?php
/*
Template Name: Page With Menu
*/
?>

<?php
get_header();
?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $menu = get_post_meta(get_the_ID(), "menu", true);
        if(has_nav_menu($menu)) {
            wp_nav_menu(array("theme_location" => $menu, "menu_id" => "submenu"));
        }
        echo the_content();
    }
}
?>

<?php
get_footer();
?>
