<?php
function enqueue_style() {
    wp_enqueue_style("style", get_stylesheet_uri());
}

add_action("wp_enqueue_scripts", "enqueue_style");
?>
