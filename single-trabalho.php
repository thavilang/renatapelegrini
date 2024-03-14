<?php
get_header();
$exposicoes = get_field('exposicoes', $post->ID);

$back = 28;
include '_single.php';
?>

<?php get_footer(); ?>