<?php
get_header();
?>

<main class="linha">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="txtupper fs32 fw400"><?php echo get_the_title($post->ID) ?></h1>
                <div class="editor">
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>