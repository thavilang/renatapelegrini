<?php
$link_blog = get_field('link_blog', $post->ID);
wp_redirect($link_blog);
exit;
?>