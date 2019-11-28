<?php
    get_template_part('includes/header');
    b4st_main_before();
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="container">
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
<main id="main" class="mt-5 mb-4 ml-auto mr-auto">
  <div class="row">
    
<!-- MEGA EVENTOS -->
<?php
$mega_eventos = new WP_Query(array(
'post_type' 		=> array('mega_eventos'),
'posts_per_page'	=> -1,
'post_status'		=> 'publish',
'orderby' 			=> 'date menu_order',
'category_name' => 'próximo',
'order'   			=> 'ASC',
));
if ( $mega_eventos->have_posts() ) : ?>
<div id="iconos-eventos" class="col-12 col-md-10 ml-auto mr-auto pl-5 pr-5 pt-4 pb-4">
  <div class="bg-light rounded sombreado w-100 m-0 owl-carousel owl-carousel-eventos owl-theme pt-3 pb-3">
    <?php while ( $mega_eventos->have_posts() ) : $mega_eventos->the_post();?>
      <div class="logo-evento">
	        <a href="<?php the_permalink();?>" ><?php the_post_thumbnail(); ?></a>
          <p class="text-center texto-evento">Comienza en:<br><span class="clocks" style="color:red;font-weight:bolder;" data-countdown="<?php the_field( 'comienza_el' ); ?>"></span></p>
      </div>
    <?php endwhile;?>
  </div>
</div>
<?php endif;?>
<?php wp_reset_postdata(); ?>

</main><!-- /.container -->
<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
