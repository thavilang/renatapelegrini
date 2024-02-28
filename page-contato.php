 <?php
   get_header();
   $email = get_field('email', $post->ID);
   $fundo = get_field('fundo', $post->ID);
?>

 <main style="background-image: url(<?php echo $fundo['sizes']['large'] ?>);">
    <div class="container">
       <h1 class="fw400 fs32"><?php the_title(); ?></h1>
       <div class="infos">
            <?php if (!empty($email)) { ?>
               <a href="mailto:<?php echo  $email ?>"><?php echo  $email ?></a>
            <?php } // if-empty $email 

            $link = get_field('instagram', $post->ID);
            if ($link) { ?>
             <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>"><?php echo esc_html($link['title']); ?></a>
            <?php } //if link 
            ?>
       </div>
    </div>
 </main>

 <?php get_footer(); ?>