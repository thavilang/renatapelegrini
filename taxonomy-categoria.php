<?php
get_header();
$categorias = get_terms( array(
    'taxonomy'   => 'categoria',
    'hide_empty' => false,
) );
$taxonomy = get_queried_object();
?>

<main class="exposicoes">
    <h1 class="hidden-text"><?php echo get_the_title(); ?></h1>
    <div class="container">
        <ul class="menu-categorias">
            <?php foreach ($categorias as $categoria) { ?>
                <li><a class="<?php echo $taxonomy->slug == $categoria->slug ? 'ativo' : ''; ?>" href="<?php echo site_url().'/categoria/'.$categoria->slug ?>"><?php echo $categoria->name ?></a></li>
            <?php } // foreach $categorias ?>
        </ul>
        <div class="box-mansory">
            <?php
            $args = array( 
                'posts_per_page'   => 6,
                'post_type'        => 'exposicao',
                'post_status'      => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoria',
                        'field'    => 'slug',
                        'terms'    => array($taxonomy->slug),
                    ),
                ),
            );
            $textos = get_posts($args);
            foreach ($textos as $post) {
                include 'elements/post-item.php';
            } // foreach ($textos as $post)
            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer() ?>