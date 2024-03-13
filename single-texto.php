<?php get_header(); ?>

<main class="texto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-between">
                    <?php
                    $next_post = get_next_post();
                    $prev_post = get_previous_post();
                    ?>
                    <div class="col-auto">
                        <?php if (is_a($next_post, 'WP_Post')) { ?>
                            <a class="breadcrumb" class="navegacao-obra navegacao-obra--prev" href="<?php echo get_permalink($next_post->ID); ?>"><?php include 'assets/images/seta.svg'; ?><?php echo pll__('anterior'); ?></a>
                        <?php } //if (is_a($next_post, 'WP_Post')) 
                        ?>
                    </div>
                    <div class="col-auto">
                        <?php if (is_a($prev_post, 'WP_Post')) { ?>
                            <a class="breadcrumb proximo" class="navegacao-obra navegacao-obra--next" href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo pll__('próximo'); ?><?php include 'assets/images/seta.svg'; ?></a>
                        <?php } //if (is_a($next_post, 'WP_Post')) 
                        ?>
                    </div>
                </div>
                <div class="box">
                    <h1 class="fs22"><?php echo get_the_title($post->ID) ?></h1>
                    <p><?php echo get_field('autor', $post->ID) ?> | <?php echo get_field('ano', $post->ID) ?></p>
                </div>
                <div class="content">
                    <div class="editor">
                        <?php echo get_field('conteudo', $post->ID) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>