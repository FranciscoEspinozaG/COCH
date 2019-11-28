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

<!-- NOTICIAS DESTACADAS -->
<div class="col-11 d-md-none ml-auto mr-auto mt-md-3 p-0">
  <h1 class="titulo-seccion-xl" style="font-size:2.3rem;">Noticias<br>Destacadas</h1>
</div>

<div class="d-none d-md-block col-9 ml-auto mr-auto mt-3 p-0">
  <h1 class="titulo-seccion-xl">Noticias<br>Destacadas</h1>
</div>

<?php
$home_loop_args = array(
  'post_type' => 'post',
  'posts_per_page' => 7
  );
$home_loop = new WP_Query( $home_loop_args );
?>

<!-- NOTICIAS DESTACADAS -->
<div class="col-9 ml-auto mr-auto mt-1 p-0">
  <div class="row d-flex m-0 contenedor-noticias p-0 m-0">
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

<div class="vc_btn3-container vc_btn3-center mt-3">
  <a href="<?php echo site_url(); ?>/noticias-coch" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-outline vc_btn3-color-inverse mt-3">
    Ver Todo >
  </a>
</div>

<!-- MEGA EVENTOS -->
<div id="mega-eventos" class="w-100 p-0 ml-0 mr-0 contenedor-sombreado separador vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-columns-middle vc_row-o-content-middle vc_row-flex bg-2050">
  <div class="col-11 col-md-9 ml-auto mr-auto pt-5">
    <div class="w-100">
      <h1 class="d-none d-md-block titulo-blanco-xl mt-5 pt-5">Megaeventos</h1>
      <h1 class="d-md-none titulo-blanco sombra-texto">Megaeventos</h1>
    </div>
  </div>
</div>

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
        <!-- <p class="text-center texto-evento">Comienza en:<br><span class="clocks" style="color:red;font-weight:bolder;" data-countdown="<?php the_field( 'comienza_el' ); ?>"></span></p> -->
      </div>
    <?php endwhile;?>
  </div>
</div>
<?php endif;?>
<?php wp_reset_postdata(); ?>

<!-- NOVEDADES INSTITUCIONALES -->
<div class="col-12 d-md-none ml-auto mr-auto mt-3">
  <h1 class="titulo-seccion-xl" style="font-size:2.3rem;">Novedades<br>Institucionales</h1>
</div>

<div class="d-none d-md-block col-9 ml-auto mr-auto mt-3">
  <h1 class="titulo-seccion-xl">Novedades<br>Institucionales</h1>
</div>

<?php
$home_loop_args = array(
  'post_type' => 'post',
  'posts_per_page' => 3,
  'category_name' => 'institucional',
  );
$home_loop = new WP_Query( $home_loop_args );
?>
<!-- NOVEDADES INSTITUCIONALES -->
<div class="col-9 ml-auto mr-auto mt-1 p-0">
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

<!-- NOVEDADES INSTAGRAM -->
<div id="instagram" class="w-100 p-0 ml-0 mr-0 contenedor-sombreado separador vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-columns-middle vc_row-o-content-middle vc_row-flex">
  <div class="col-9 ml-auto mr-auto pt-5">
    <div class="w-100">
      <h1 class="d-none d-md-block titulo-blanco-xl mt-5 pt-5 sombra-texto">Instagram</h1>
      <h1 class="d-md-none titulo-blanco sombra-texto">Instagram</h1>
    </div>
  </div>
</div>

<div id="feed-instagram" class="col-9 ml-auto mr-auto pl-3 pr-3 pt-3 pb-3 bg-light rounded sombreado contenedor-sombreado" style="z-index:3">
  <?php echo do_shortcode('[elfsight_instagram_feed id="1"]') ;?>
</div>

<!-- NOVEDADES YOUTUBE -->
<div id="youtube" class="w-100 p-0 ml-0 mr-0 contenedor-sombreado separador vc_row wpb_row vc_row-fluid vc_row-has-fill vc_row-o-columns-middle vc_row-o-content-middle vc_row-flex">
  <div class="col-9 ml-auto mr-auto pt-5">
    <div class="w-100">
      <h1 class="d-none d-md-block titulo-blanco-xl mt-5 pt-5 text-right sombra-texto">YouTube</h1>
      <h1 class="d-md-none titulo-blanco sombra-texto">Youtube</h1>
    </div>
  </div>
</div>

<div id="feed-youtube" class="col-9 ml-auto mr-auto pl-3 pr-3 pt-3 pb-3 rounded sombreado contenedor-sombreado" style="z-index:3">
  <?php
  if (wp_is_mobile()){
    echo do_shortcode('[yottie channel="https://www.youtube.com/channel/UCBDTU9lVrB9NZn2HwMUDp-w" cache_time="3300" header_visible="false" groups_visible="false" content_columns="1" content_transition_effect="fade"]');
  }else{
    echo do_shortcode('[yottie channel="https://www.youtube.com/channel/UCBDTU9lVrB9NZn2HwMUDp-w" cache_time="3300" header_visible="false" groups_visible="false" content_columns="4" content_row="2" content_transition_effect="fade"]');
  }
  ?>
</div>

<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
