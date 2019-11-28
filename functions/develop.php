<?php

/* Desactivar Barra de wordpress para todos los usuarios */
  show_admin_bar(false);

// CUSTOM ADMIN LOGIN HEADER LOGO
function my_custom_login_logo()
{
    echo '
    <style  type="text/css">
    #login{
        padding:0;
    } 
    .login h1 a {  
        background-image:url(' . get_bloginfo('template_directory') . '/assets/img/dash-logo.png)  !important;
        background-size: 180px;
        margin: 0 auto;
        margin-top:40px;
        width: 180px;
        height: 180px;
    } 
    </style>';
}
add_action('login_head',  'my_custom_login_logo');

// CUSTOM ADMIN DASHBOARD HEADER LOGO
function wpb_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/assets/img/favicon.png) !important;
background-size: cover;
color:rgba(0, 0, 0, 0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
</style>';
}
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// Cambio de icono Entradas/Noticias
function add_menu_icons_styles(){
    echo '
    <style>
    #adminmenu #menu-posts div.wp-menu-image:before { 
        content: url(' . get_bloginfo('stylesheet_directory') . '/assets/img/moto-icon.png); 
    }
    </style>';
}
add_action( 'admin_head', 'add_menu_icons_styles' );

/* //Cambiar Entradas por noticias
function edit_admin_menus() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Novedades';
    $submenu['edit.php'][5][0] = 'Todas las novedades';
    //$submenu['edit.php'][10][0] = 'Agregar nueva';
}
add_action( 'admin_menu', 'edit_admin_menus' ); */

// Admin footer modification
function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Developed by <a href="http://www.tavomak.com" target="_blank">tavomak</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/* //contacto modal
function add_cotiza_btn($items, $args) {
    if( is_product()){
        if( $args->theme_location == 'navbar' ){
            $items .= '<li class="menu-item menu-item-type-custom menu-item-object-custom nav-item  align-self-stretch"><a href="#cd-nav" class="nav-link align-self-center cd-nav-trigger bk--btn bk--btn__primary bk--btn__small">Financiamiento</a></li>';
        }
        return $items;
    }else{
        $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
        if( $args->theme_location == 'navbar' ){
            $items .= '<li class="menu-item menu-item-type-custom menu-item-object-custom nav-item  align-self-stretch"><a href="'.$shop_page_url.'" class="nav-link align-self-center bk--btn bk--btn__primary bk--btn__small">Financiamiento</a></li>';
        }
        return $items;
    }
}
add_filter('wp_nav_menu_items', 'add_cotiza_btn', 10, 2); */
  
/* function wpdocs_custom_excerpt_length( $length ) {
    global $post;

    if ($post->post_type == 'post'){
        if ( is_category() || is_page( array('proximos-eventos','eventos-pasados') ) ){
            return 6;
        }
        else{
            return 10;
        }
    }else if ($post->post_type == 'dojo') {
        return 14;
    }
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 ); */


?>