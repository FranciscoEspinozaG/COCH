<?php
/*template Name: Federaciones */
    get_template_part('includes/header');
    b4st_main_before();
?>
<main id="main" class="col-9 ml-auto mr-auto">


<div class="row">

  <div class="col-sm">
    <div id="content" role="main">
      <?php get_template_part('includes/loops/page-content'); ?>
    </div><!-- /#content -->
  </div>

  <?php //get_template_part('includes/sidebar'); ?>

</div><!-- /.row -->
</main><!-- /.container -->

<div class="col-9 ml-auto mr-auto pt-2 pl-0 pr-0 mt-5">
  <?php
      $federaciones = new WP_Query(array(
        'post_type'       => array('federaciones'),
        'posts_per_page'   => -1,
        'post_status'     => 'publish',
        'orderby'         => 'title',
        'order'           => 'ASC',
      ));
  if ( $federaciones->have_posts() ) : ?>
  <div class="row p-0 m-0 mt-4 justify-content-around">
    <?php while ( $federaciones->have_posts() ) : $federaciones->the_post();?>
    <?php $logo = get_field( 'logo' ); ?>
      <div class="tarjetasfederaciones sombreado rounded p-2 col-md-2 col-12 mb-4 ml-1 mr-1"  data-toggle="modal" data-target=".modal-<?php the_id(); ?>" style="overflow:hidden;">
        <div class="foto-federacion" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
        <!-- ACÁ VA LA FOTO COMO BACKGROUND -->
        </div>
        <div>
          <p class="cargofederaciones text-center mt-3 pl-3 pr-3"><?php the_title(); ?></p>
        </div>
      </div>
        <!-- Modal -->
        <div class="modal fade modal-<?php the_id(); ?>" id="<?php the_title(); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php the_title(); ?>" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="<?php the_title(); ?>">Federación <?php the_title(); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-12 foto-modal d-flex ml-auto mr-auto p-5">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                      </div>
                      <div class="col-12">
                          <h5><strong>Presidente:</strong><br><?php the_field( 'presidente' ); ?></h5>
                          <h5><strong>Dirección:</strong><br><?php the_field( 'direccion' ); ?></h5>
                          <h5><strong>Fono:</strong><br><a href="callto:<?php the_field( 'fono' ); ?>"><?php the_field( 'fono' ); ?></a></h5>
                          <h5><strong>Correo:</strong><br><a href="mailto:<?php the_field( 'correo' ); ?>"><?php the_field( 'correo' ); ?></a></h5>
                          <h5><strong>Web:</strong><br><a href="<?php the_field( 'web' ); ?>"><?php the_field( 'web' ); ?></a></h5>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    <?php endwhile;?>
  </div>
</div>

<?php endif;?>
<?php wp_reset_postdata(); ?>

<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
