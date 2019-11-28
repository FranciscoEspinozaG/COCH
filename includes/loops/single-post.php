<?php
/*
 * The Single Post
 */
?>
<div class="m-0">
  <div class="header-single" style="overflow:hidden;max-height:50vh;">
    <?php echo do_shortcode('[rev_slider alias="single_noticias"]');?>
  </div>
</div>

<?php /* Single post loop */ if(have_posts()): while(have_posts()): the_post(); ?>
<div class="col-12 col-md-9 ml-auto mr-auto mt-5 cabecera-noticia pt-5" role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
  <div class="row encabezado-noticia">
    <div class="col-12 col-md-6">
      <p class="text-muted text-right d-none d-xl-block">
        <i class="far fa-calendar-alt mt-4"></i>&nbsp;<?php b4st_post_date(); ?>&nbsp;
      </p>
      <h1 class="d-md-none text-center text-md-right titulo-noticia-single"><?php the_title()?></h1>
      <h1 class="d-none d-md-block text-center text-md-right titulo-noticia-single"><?php the_title()?></h1>
        <!-- ACÁ VA LA URL DEL EVENTO -->
      <?php if ( get_field( 'sitio_del_evento' )): ?>
        <a href="<?php the_field( 'sitio_del_evento' ); ?>" target="_blank"><p class="btn-primary p-2 rounded text-center">Ir al evento</p></a>
      <?php endif; ?>
        <!-- ACÁ VAN LOS DOCUMENTOS RELACIONADOS CON REUNIONES -->
      <?php if ( get_field( 'reuniones' )): ?>
        <a href="<?php the_field( 'reuniones' ); ?>" target="_blank"><p class="btn-primary p-2 rounded text-center">Reuniones</p></a>
      <?php endif; ?>
        <!-- ACÁ VAN LOS PDF DE MANUALES -->
      <?php if ( get_field( 'manuales' )): ?>
      <?php
        // check if the repeater field has rows of data
        if( have_rows('manuales') ):
         	// loop through the rows of data
            while ( have_rows('manuales') ) : the_row();
                // display a sub field value               

                ?>

                <a href="<?php the_sub_field('manual_pdf');?>" target="_blank"><p class="btn-primary p-2 rounded text-center"><?php the_sub_field('nombre_pdf');?></p></a>

                <?php
                
            endwhile;
        else :
            // no rows found
        endif;
      ?>
      <?php endif; ?>
        <!-- TERMINAN LOS BOTONES PARA EVENTOS -->
    </div>
    <div class="col-12 col-md-6 foto-single-noticias" style="background-image:url(<?php the_post_thumbnail_url(); ?>);overflow:hidden;">
    </div>
  </div>
</div>
<div class="col-12 col-md-9 ml-auto mr-auto mt-3">
  <div class="row">
    <div class="w-100 MT-2 MB-3">
      <?php if ( get_field( 'codigo_pdf' )): ?>
        <div>
          <?php the_field( 'codigo_pdf' ); ?>
        </div>
      <?php endif;?>
    </div>
    <div class="w-100 columnas-descripcion mt-3">
      <?php the_content(); ?>
    </div>
  </div>
  <div class="row mt-5 border-top pt-3">
    <div class="col">
      <?php previous_post_link('%link', '<i class="fas fa-fw fa-arrow-left"></i> Anterior<br/>'.'%title'); ?>
    </div>
    <div class="col text-right">
      <?php next_post_link('%link', 'Siguiente <i class="fas fa-fw fa-arrow-right"></i><br/>'.'%title'); ?>
    </div>
  </div>
</div>
<?php
  // This continues in the single post loop
    if ( comments_open() || get_comments_number() ) :
      //comments_template();
      comments_template('/includes/loops/single-post-comments.php');
		endif;
  endwhile; else :
    get_template_part('includes/loops/404');
  endif;
?>