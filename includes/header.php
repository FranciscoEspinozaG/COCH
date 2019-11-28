<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<main id="main" class="">

<?php b4st_navbar_before();?>

<?php
//if (is_archive('directorio')){
//  echo do_shortcode('[rev_slider alias="slide-home"]');
//}elseif (is_home()){
//  echo do_shortcode('[rev_slider alias="noticias_destacadas"]');
//if (is_single()){
//  echo do_shortcode('[rev_slider alias="noticias_destacadas"]');
//}elseif (is_page('federaciones')){
//  echo do_shortcode('[rev_slider alias="quienes_somos"]');
//}elseif (is_page('archive')){
//  echo do_shortcode('[rev_slider alias="slide-home"]');
//}elseif (is_archive('clubes')){
//  echo do_shortcode('[rev_slider alias="clubes"]');
//}elseif (is_page('contacto')){
//  echo do_shortcode('[rev_slider alias="preguntas_frecuentes"]');
//}else{
//  echo do_shortcode('[rev_slider alias="quienes_somos"]');
//}
?>



<!-- BARRA MENÚ -->
<div id="barramenu" class="d-none d-xl-block sombreado p-2 mb-3 ml-auto mr-auto">
<?php
  wp_nav_menu( array(
    'theme_location'  => 'navbar',
    'container'       => false,
    'menu_class'      => 'd-flex justify-content-around align-middle pt-2',
    'fallback_cb'     => '__return_false',
    'items_wrap'      => '<ul id="%1$s" class="mr-auto mt-2 %2$s">%3$s</ul>',
    'depth'           => 2,
    'walker'          => new b4st_walker_nav_menu()
  ) );
?>
<?php //b4st_navbar_search();?>   
</div>
<!-- FIN BARRA MENU -->


<!-- APÉNDICE MENÚ -->
<?php
if (is_front_page() ):
  echo('
  <div id="apendice-menu" class="d-none d-md-flex rounded fondo-menu sombreado pb-0 ml-5">
    <a class="" target="_blank" href="https://www.facebook.com/teamchile/" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Facebook" style="font-size:22px;" class="fab fa-facebook-f"></i>
    </a>
    <a class="" target="_blank" href="https://twitter.com/COCH_cl" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Twitter" style="font-size:22px;" class="fab fa-twitter"></i>
    </a>
    <a class="" target="_blank" href="https://www.instagram.com/teamchile_coch/" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Instagram" style="font-size:22px;" class="fab fa-instagram"></i>
    </a>
    <a class="" target="_blank" href="https://www.youtube.com/channel/UCBDTU9lVrB9NZn2HwMUDp-w" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="YouTube" style="font-size:22px;" class="fab fa-youtube"></i>
    </a>
    <a class="" target="_blank" href="https://www.flickr.com/photos/147443940@N06/" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Flickr" style="font-size:22px;" class="fab fa-flickr"></i>
    </a>
    <a class="" target="_blank" href="https://outlook.office.com" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Mail" style="font-size:22px;" class="fas fa-envelope"></i>
    </a>
  </div>
'); endif; ?>
<!-- FIN DE APENDICE MENÚ -->

<!-- SIDE MENU -->
<?php
$side_menu = new WP_Query(array(
  'post_type'   => array('side_menu'),
  'post_per_page' => -1,
  'post_status'   => 'publish',
  'order'         => 'DES',
));
if ( $side_menu->have_posts() ) : ?>
<nav id="navbar" class="d-none d-xl-block navbar navbar-desaparece rounded sombreado mb-3">
  <div class="w-100">
  <?php while ( $side_menu->have_posts() ) : $side_menu->the_post();?>
    <a href="<?php the_field( 'url_side_menu' ); ?>" class="btn-side-menu">
      <div class="d-flex ml-0 mr-auto mt-2 mb-2">
          <?php $icono_de_la_opcion = get_field( 'icono_de_la_opcion' ); ?>
          <?php if ( $icono_de_la_opcion ) { ?>
	      <img class="icono-side-menu" src="<?php echo $icono_de_la_opcion['url']; ?>" alt="<?php echo $icono_de_la_opcion['alt']; ?>" />
          <?php } ?>
        <div class="ml-4 col-9 d-flex text-left align-self-center">
          <?php the_field( 'texto_opcion' ); ?>
        </div>
      </div>
    </a>
  <?php endwhile;?>
  </div>
</nav>
<?php endif; ?>
<!-- FIN SIDE MENU -->
<!-- MENU SCROLL -->
<div id="menu-scroll" class="d-none d-xl-block w-100 fixed-top esconde-menu-scroll p-1 sombreado">
<?php
  wp_nav_menu( array(
    'theme_location'  => 'navbar',
    'container'       => false,
    'menu_class'      => 'd-flex justify-content-around align-middle',
    'fallback_cb'     => '__return_false',
    'items_wrap'      => '<ul id="%1$s" class="mr-auto mt-2 pt-3 mt-lg-0 %2$s">%3$s</ul>',
    'depth'           => 2,
    'walker'          => new b4st_walker_nav_menu()
  ) );
  ?>
<?php //b4st_navbar_search();?>  
</div>

<div class="row w-100 p-3 mb-0 d-flex justify-content-around boton-menu-scroll align-items-center d-xl-none bg-light fixed-bottom sombreado boton-menu" style="margin-left: 0px;margin-right: 0px;">
    <p class="m-0"><STRong>MENÚ </STRong><i class="fa fa-bars" aria-hidden="true"></i></p>
</div>

<div id="menu-mobile" class="d-xl-none sombreado fondo-menu text-center esconde-menu-mobile pt-5">
  <?php
  wp_nav_menu( array(
    'theme_location'  => 'navbar',
    'container'       => false,
    'menu_class'      => 'container',
    'fallback_cb'     => '__return_false',
    'items_wrap'      => '<ul id="%1$s" class="text-break %2$s">%3$s</ul>',
    'depth'           => 2,
    'walker'          => new b4st_walker_nav_menu()
    ) );
    ?>
<?php //b4st_navbar_search();?>
<hr>
<?php
$side_menu = new WP_Query(array(
  'post_type'   => array('side_menu'),
  'post_per_page' => -1,
  'post_status'   => 'publish',
  'order'         => 'ASC',
));
if ( $side_menu->have_posts() ) : ?>
<nav id="navbar-menu" class="d-xl-none pl-5 pr-5">
  <div class="container">
  <?php while ( $side_menu->have_posts() ) : $side_menu->the_post();?>
    <a href="<?php the_field( 'url_side_menu' ); ?>" class="btn-side-menu">
      <div class="d-flex ml-0 mr-auto mt-2 mb-2">
          <?php $icono_de_la_opcion = get_field( 'icono_de_la_opcion' ); ?>
          <?php if ( $icono_de_la_opcion ) { ?>
	      <img class="icono-side-menu" src="<?php echo $icono_de_la_opcion['url']; ?>" alt="<?php echo $icono_de_la_opcion['alt']; ?>" />
          <?php } ?>
        <div class="ml-4 col-9 d-flex text-left align-self-center">
          <?php the_field( 'texto_opcion' ); ?>
        </div>
      </div>
    </a>
  <?php endwhile;?>
  </div>
</nav>
<?php endif; ?>
<hr>
<a class="" target="_blank" href="https://www.facebook.com/teamchile/" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Facebook" style="font-size:22px;" class="fab fa-facebook-f"></i>
    </a>
    <a class="" target="_blank" href="https://twitter.com/TeamChile_COCH" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Twitter" style="font-size:22px;" class="fab fa-twitter"></i>
    </a>
    <a class="" target="_blank" href="https://www.instagram.com/teamchile_coch/" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Instagram" style="font-size:22px;" class="fab fa-instagram"></i>
    </a>
    <a class="" target="_blank" href="https://www.youtube.com/channel/UCBDTU9lVrB9NZn2HwMUDp-w" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="YouTube" style="font-size:22px;" class="fab fa-youtube"></i>
    </a>
    <a class="" target="_blank" href="https://www.flickr.com/photos/147443940@N06/" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Flickr" style="font-size:22px;" class="fab fa-flickr"></i>
    </a>
    <a class="" target="_blank" href="https://www.youtube.com/channel/UCBDTU9lVrB9NZn2HwMUDp-w" style="width:34px;height:34px;padding:6px;margin:5px;color: #7f7f7f;border-radius: 50%;">
      <i title="Mail" style="font-size:22px;" class="fas fa-envelope"></i>
    </a>
<hr>
<p class="boton-menu">X CERRAR MENÚ</p>
</div>
<?php b4st_navbar_after();?>