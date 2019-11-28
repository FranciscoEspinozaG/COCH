<?php
    get_template_part('includes/header');
    b4st_main_before();
?>

<main id="main" class="w-100 ml-auto mr-auto">


  <div class="row">

        <?php get_template_part('includes/loops/page-content'); ?>

        <?php
        $home_loop_args = array(
          'post_type' => 'post',
          'posts_per_page' => -1,
          );
        $home_loop = new WP_Query( $home_loop_args );
        ?>
        <!-- NOVEDADES INSTITUCIONALES -->
        <div class="col-9 ml-auto mr-auto mt-5 p-0">
          <div class="row d-flex contenedor-noticias p-0 m-0">
            <?php if ( $home_loop->have_posts() ) :?>
            <?php while ($home_loop->have_posts()) : $home_loop->the_post(); ?>
            <a href="<?php the_permalink();?>" class="col-12 col-md-3 m-0 p-0">
              <article class="d-flex m-0 p-2 w-100 articulo-noticia" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
                <p class="titulo-en-foto"><?php the_title(); ?></p>
              </article>
            </a>
            <?php endwhile; wp_reset_postdata(); endif; ?>
          </div>
        </div>

    <?php //get_template_part('includes/sidebar'); ?>

  </div><!-- /.row -->
</main><!-- /.container -->


<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
