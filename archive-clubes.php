<?php
    get_template_part('includes/header');
    b4st_main_before();
?>

<main id="main" class="col-9 mt-3 mb-4 ml-auto mr-auto">
  <div class="row">
    
      <?php
      $clubes = new WP_Query(array(
        'post_type'       => array('clubes'),
        'posts_per_page'   => 1,
        'post_status'     => 'publish',
        'orderby'         => 'date',
        'order'           => 'ASC',
      ));
      if( $clubes->have_posts() ) : ?> 
      <div class="w-100 row owl-carousel owl-theme p-0 m-0">
      <?php while(have_posts()) : the_post(); ?>
      
        <div class="m-1 pt-2 pb-2 sombreado rounded 
        <?php 
        $terms = get_the_terms( $post->ID , 'clubestax' );
        if ( $terms != null ){
         foreach( $terms as $term ) {
         echo $term->slug ;
         echo '';
         unset($term);
         } } ?>" style="min-height:320px;">
          <img class="w-100" src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">        
          <h4 class="text-center"><?php the_title();?></h4>
        </div>
      <?php endwhile ;?> 
      </div><!-- /#content -->
      <?php endif; ?>

      <?php //get_template_part('includes/sidebar'); ?>
</div><!-- /.row -->
      <div class="row p-0 m-0 d-none d-md-flex" style="overflow:hidden;border-radius:5px 5px 0px 0px;border:1px solid gray;">
        <div class="col-3 text-center fondo-menu p-2 d-flex justify-content-center align-items-center" style="border-right:1px solid gray;">Nombre Club</div>
        <div class="col-1 text-center fondo-menu p-2 d-flex justify-content-center align-items-center" style="border-right:1px solid gray;">Ciudad<br>Comuna</div>
        <div class="col-1 text-center fondo-menu p-2 d-flex justify-content-center align-items-center" style="border-right:1px solid gray;">Región</div>
        <div class="col-3 text-center fondo-menu p-2 d-flex justify-content-center align-items-center" style="border-right:1px solid gray;">Dirección</div>
        <div class="col-2 text-center fondo-menu p-2 d-flex justify-content-center align-items-center" style="border-right:1px solid gray;">Teléfono</div>
        <div class="col-2 text-center fondo-menu p-2 d-flex justify-content-center align-items-center">Correo</div>
      </div>
      <?php 
      $taxonomy = 'clubestax';
      $ars = array(
        'orderby' => 'id'
      );
      $cats = get_terms( $taxonomy, $ars );
      foreach ($cats as $cat):$cat_id= $cat->term_id;?>
      <div class="row p-0 m-0" style="border-bottom:1px solid gray;border-left:1px solid gray;">
        <div style="border-right:1px solid gray;" class="p-4 d-inline-block justify-content-center col-12 col-md-3 <?php echo $cat->slug ?>">
          <?php echo $cat->name ?>
        </div>
        <div style="border-right:1px solid gray" class="p-4 d-flex justify-content-center col-12 col-md-1">
          Santiago<?php $taxonomies = get_taxonomies(); ?>
        </div>
        <div style="border-right:1px solid gray" class="p-4 d-flex justify-content-center col-12 col-md-1">
          RM
        </div>
        <div style="border-right:1px solid gray" class="p-4 d-flex d-md-inline-block justify-content-center col-12 col-md-3">
          Ramón Cruz Montt 1176, Ñuñoa
        </div>
        <div style="border-right:1px solid gray" class="p-4 d-flex justify-content-center col-12 col-md-2">
          (56) 2 270 36 78
        </div>
        <div style="border-right:1px solid gray" class="p-4 d-flex justify-content-center col-12 col-md-2">
          contacto@coch.cl
        </div>
      </div>
      <?php endforeach;?>

      
      <?php 
      //$taxonomy = 'clubestax';
      //$ars = array(
      //  'orderby' => 'id'
      //);
      //$cats = get_terms( $taxonomy, $ars );
      //foreach ($cats as $cat):$cat_id= $cat->term_id;
      //  $term_slug = $cat->slug;
      //  $datostabla = new WP_Query(array(
      //  'post_type' => 'clubes',
      //  'posts_per_page' => -1,
      //  'tax_query' => array(
      //  array(
      //  'taxonomy' => $taxonomy,
      //  'field' => 'slug',
      //  'terms' => $term_slug
      //  )
      //  ) 
      //  ));?>

</main><!-- /.container -->
<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>