<?php 
$email = get_field('email', pll_get_post(67, pll_current_language()));
?>

<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-auto">
                <p><?php echo pll__('Todos os direitos reservados'); ?></p>
            </div>
            <div class="col-sm-auto"><p>©2024 por <a href="https://www.instagram.com/b0lha.art/" target="_blank">estúdio bolha</a></p></div>
            <div class="col-sm-auto">
                <p><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a> | 
                <?php 
                $link = get_field('instagram', pll_get_post(67, pll_current_language()));
                if( $link ){ ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>"><?php include 'assets/images/instagram.svg' ?></a>
                <?php } //if link ?>
                </p>
            </div>
        </div>
    </div>
</footer>
</div><!--.no-overflow-->
<?php wp_footer(); ?>
</body>

</html>