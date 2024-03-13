<?php
// Template Name: Home

$galeria = get_field('galeria', $post->ID);
?>

<?php get_header(); ?>

<section class="background-swiper">
    <!-- Swiper -->
    <div class="swiper" js-swiper-banner>
        <div class="swiper-wrapper">
            <?php foreach ($galeria as $background) : ?>
                <div class="swiper-slide">
                    <img sizes="<?php echo getImageSizes($background) ?>" srcset="<?php echo getImageScrset($background); ?>" src="<?php echo $background['url']; ?>" alt="<?php echo $background['alt']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>