<?php
get_header();
$categorias = get_terms(array(
    'taxonomy'   => 'categoria',
    'hide_empty' => false,
));
$taxonomy = get_queried_object();
?>

<main class="exposicoes">
    <h1 class="hidden-text"><?php echo get_the_title(57); ?></h1>
    <div class="container">
        <ul class="menu-categorias">
            <?php foreach ($categorias as $categoria) { ?>
                <li><a class="<?php echo $taxonomy->slug == $categoria->slug ? 'ativo' : ''; ?>" href="<?php echo site_url() . '/categoria/' . $categoria->slug ?>"><?php echo $categoria->name ?></a></li>
            <?php } // foreach $categorias 
            ?>
        </ul>
        <?php
        $args = array(
            'posts_per_page'   => 6,
            'post_type'        => 'exposicao',
            'post_status'      => 'publish',
        );

        $tax_query = array(
            array(
                'taxonomy' => 'categoria',
                'field'    => 'slug',
                'terms'    => array($taxonomy->slug),
            ),
        );

        $args['tax_query'] = $tax_query;

        ?>
        <div class="ajaxScrooling" data-posts_per_page="6" data-post_type="exposicao" data-post_status="publish" data-element_item="exposicao-item" data-taxonomy="categoria" data-tax_query='<?php echo json_encode($tax_query) ?>'>
            <div class="grid-exposicoes content">
                <?php
                $textos = get_posts($args);
                foreach ($textos as $post) {
                    include 'elements/exposicao-item.php';
                } // foreach ($textos as $post)
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer() ?>