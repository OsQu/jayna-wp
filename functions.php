<?php
function enqueue_style() {
    wp_enqueue_style("style", get_stylesheet_uri());
}
add_action("wp_enqueue_scripts", "enqueue_style");

function register_menus() {
    register_nav_menus(
        array(
            "top-menu" => __("Top Menu"),
            "sub-menu" => __("Sub Menu")
        )
    );
}
add_action("init", "register_menus");

function image_src($name, $echo = true) {
    $src = get_template_directory_uri() . "/images/$name";
    if ($echo) {
        echo $src;
    }

    return $src;
}

// TODO: SUBMENUS!!!
function add_home_icon($items) {
    $icon_url = image_src("home.png", false);
    $homeClasses[] = "menu";
    if (strpos($items, "current_page_item") === false) {
        // Make home a selected item
        array_push($homeClasses, "current_page_item");
    }
    $home = "<li class='" . join(" ", $homeClasses) . "'><a href='/wp'><img src='$icon_url' /></a></li>";
    return $home . $items;
}

add_filter("wp_nav_menu_items", "add_home_icon");
?>
