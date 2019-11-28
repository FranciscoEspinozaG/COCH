<?php
    get_template_part('includes/header');
    b4st_main_before();
?>

<!-- CONTENIDO DEL WP -->
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="container" style="z-index:2;">
  <div class="row">
    <div class="">
      <?php the_content();?>
    </div>
  </div>
</div>
<?php endwhile; 
wp_reset_postdata();
endif;
?>


<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
