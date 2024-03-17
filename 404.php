<?php
// Template Name: Padrão
?>

<?php get_header(); ?>

<main class="linha">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1 class="txtupper fs32 fw400"><?php echo pll__('Erro 404'); ?></h1>
                <div class="editor">
                    <p><?php echo pll__('Parece que a página que você está procurando não existe mais ou mudou de link.'); ?></p>
                    <p><strong><a href="<?php echo site_url(); ?>"><?php echo pll__('Ir para a página inicial'); ?></a></strong></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>