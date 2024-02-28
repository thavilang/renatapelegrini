 <?php get_header(); ?>

 <main>
    <div class="container">
       <h1 class="fw400 fs32 txtupper txtcenter"><?php the_title(); ?></h1>
       <div class="txtcenter txtupper">
          <?php the_content(); ?>
       </div>
    </div>
 </main>

 <?php get_footer(); ?>