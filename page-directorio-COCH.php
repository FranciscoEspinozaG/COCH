<?php
    get_template_part('includes/header'); 
    b4st_main_before();
?>


<main id="main" class="col-9 ml-auto mr-auto">


  <div class="row">

    <div class="col-sm">
      <div id="content" role="main">
        <?php get_template_part('includes/loops/page-content'); ?>
      

  <?php
  $directorio = new WP_Query(array(
  'post_type' 		=> array('directorio'),
  'posts_per_page'	=> -1,
  'post_status'		=> 'publish',
  'orderby' 			=> 'menu_order date',
  'order'   			=> 'ASC',
  ));
  if ( $directorio->have_posts() ) : ?>
  <div class="row p-0 m-0 mt-5 justify-content-around">
    <?php while ( $directorio->have_posts() ) : $directorio->the_post();?>
    <?php $foto = get_field( 'foto' ); ?>
      <div class="tarjetasdirectorio sombreado rounded pl-0 pr-0 pb-2 col-12 col-md-6 col-xl-3 mb-4 ml-1 mr-1" data-toggle="modal" data-target=".modal-<?php the_id(); ?>" style="overflow:hidden;min-height:300px;">
        <div class="foto-directorio" style="background-image:url(<?php echo $foto['url']; ?>);">
        <!-- ACÁ VA LA FOTO COMO BACKGROUND -->
        </div>
        <div>
          <p class="cargodirectorio text-center mt-1 pl-3 pr-3"><?php the_field( 'nombre' ); ?></p>
          <br>
          <p class="nombredirectorio text-center pl-3 pr-3"><?php the_field( 'cargo' ); ?></p>
        </div>
      </div>
      
        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl sombreado modal-<?php the_id(); ?>" id="<?php the_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row p-0 m-0">
                    <div class="col-12 col-md-3 foto-modal-directorio" style="background-image:url(<?php echo $foto['url']; ?>);">
                    </div>
                    <div class="col-12 col-md-9 pl-5">
                      <h5><?php the_field( 'info' ); ?><br></h5>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal -->
    <?php endwhile;?>
  </div>
</div>

</div><!-- /#content -->
    </div>

    <?php //get_template_part('includes/sidebar'); ?>

  </div><!-- /.row -->
</main><!-- /.container -->
<?php endif;?>
<?php wp_reset_postdata(); ?>

<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
