<?php
/*
Template Name: Page with Redirect
*/
?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $id = get_post_meta(get_the_ID(), "id", true);
        if($id) {
            $url = post_permalink($id);
        } else {
            $url = "/";
        }

        header("Location: $url");
    }
}
?>
