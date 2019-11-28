<?php
    /*template Name: Clubes */
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

<main id="main" class="container pt-5">

  <div class="container mt-5">
    <div class="row d-flex">
      <div class="col-12 col-md-3">
        <h1 class="titulo-xl text-center text-md-right titulo-seccion">1.</h1>
      </div>
      <div class="col-12 col-md-9">
        <h1 class="titulo text-center text-md-left">Selecciona una región.</h1>
      </div>
    </div>
  </div>

  <div class="row pt-5">
    <select name="clubes-regiones" id="clubes-regiones-selector" class="mt-3 mb-5 col-9 ml-auto mr-auto mb-3">
      <option value="0">Seleccionar Región</option>
      <option value="arica">Región de Arica y Parinacota</option>
      <option value="iquique">Región de Tarapacá</option>
      <option value="antofagasta">Región de Antofagasta</option>
      <option value="copiapo">Región de Atacama</option>
      <option value="serena">Región de Coquimbo</option>
      <option value="valparaiso">Región de Valparaiso</option>
      <option value="santiago">Región Metropolitana</option>
      <option value="rancagua">Región del Libertador Bernardo O'Higgins</option>
      <option value="talca">Región del Maule</option>
      <option value="chillan">Región de Ñuble</option>
      <option value="concepcion">Región del Biobío</option>
      <option value="temuco">Región de La Araucanía</option>
      <option value="valdivia">Región de Los Ríos</option>
      <option value="montt">Región de Los Lagos</option>
      <option value="coyhaique">Región de Aysén del General Carlos Ibañez del Campo</option>
      <option value="arenas">Región de Magallanes y de La Antártica Chilena</option>
    </select>
  </div>

  
  <div class="container mt-1 mb-5">
    <div class="row d-flex">
      <div class="col-12 col-md-3">
        <h1 class="titulo-xl text-center text-md-right titulo-seccion">2.</h1>
      </div>
      <div class="col-12 col-md-9">
        <h1 class="titulo text-center text-md-left">Selecciona un deporte.</h1>
      </div>
    </div>
  </div>

  <?php $clubes = new WP_Query(array(
    'post_type'       => array('clubes'),
    'posts_per_page'   => -1,
    'post_status'     => 'publish',
    'orderby'         => 'name',
    'order'           => 'ASC',
  ));
  if( $clubes->have_posts() ) : ?>

  <div class="row ch-federados ch-federados--cards">
    <?php while($clubes->have_posts()) : $clubes->the_post(); ?>
    <div style="display:none" class="col-sm-3 mb-3 ch-federados--card <?php
      $terms = get_the_terms( $post->ID , 'clubestax' );
      foreach( $terms as $key => $term ) {
        $field = get_field_object('region_club', $term->taxonomy.'_'.$term->term_id);
        $value = $field['value'];
        if ( $key !== count( $terms ) -1 ){
          echo $value['value'].' ';
        }else{
          echo $value['value'];
        }
      }
      ?>">
      <a href="#"
      class="ch-federados--card-link"
      data-deporte="<?php global $post; echo $post->post_name;?>"
      data-name="<?php
      $terms = get_the_terms( $post->ID , 'clubestax' );
      foreach( $terms as $key => $term ) {
        $field = get_field_object('region_club', $term->taxonomy.'_'.$term->term_id);
        $value = $field['value'];
        if ( $key !== count( $terms ) -1 ){
          echo $value['value'].' ';
        }else{
          echo $value['value'];
        }
      }?>">
          <div class="p-2 sombreado rounded club-card">
            <img class="w-100 ch-select-img" src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
            <p class=" pt-2 text-center"><?php the_title();?></p>
          </div>
        </a>
      </div> 
      <?php endwhile ;
        wp_reset_postdata();
        endif; ?>
  </div>


  <div class="row ch-federados ch-federados--info">
    <div class="col-4 ch-club-atras" style="display:none">
        <p class="text-center">
          <a href="#" class="d-none ch-club-atras--btn"><i class="fas fa-angle-double-left"></i> Todos los deportes</a>
        </p>
      <div class="ch-clone-card"></div>
    </div>
    <div class="col-8 ch-federados--t">
    <?php 
    $taxonomy = 'clubestax';
    $ars = array(
      'orderby' => 'name',
      'hide_empty' => false,
    );
    $cats = get_terms( $taxonomy, $ars );
    foreach ($cats as $cat):
    $cat_id= $cat->term_id;
    $field = get_field_object('region_club', $cat->taxonomy.'_'.$cat->term_id);
    $fieldos = get_field_object('deporte', $cat->taxonomy.'_'.$cat->term_id);
    $value = $field['value'];
    $valuedos = $fieldos['value'];
    ?>
      <div class="d-none card p-3 mb-1 ch-federados--text <?php echo $value['value']; echo " ".$valuedos['value'];?>">
        <ul class="list-group list-group-flush">
          <li>
            <a href="" class="ch-club-title"><p class="text-center"><b><?php echo $cat->name ?></b></p></a>
          </li>
            <ul class="ch-club-body" style="display:none">
              <li><p>Comuna: <b><?php the_field('comuna_club', $cat->taxonomy.'_'.$cat->term_id);?></b></p></li>
              <li><p>Región: <b><?php echo $value['label'];?></b></p></li>
              <li><p>Dirección: <b><?php the_field('direccion', $cat->taxonomy.'_'.$cat->term_id);?></b></p></li>
              <li><p>Teléfono: <b><?php the_field('telefono_club', $cat->taxonomy.'_'.$cat->term_id);?></b></p></li>
              <li><p>Correo: <b><?php the_field('correo_club', $cat->taxonomy.'_'.$cat->term_id);?></b></p></li>
            </ul>
        </ul>
      </div>
    <?php endforeach;?>
    </div>
  </div>
  <hr>
  
  <div id="boton-reset" class="container">
    <div class="col-6 ml-auto mr-auto btn-primary p-3 rounded text-center">
      <a href="" style="color:white;">
        Nueva búsqueda
      </a>
    </div>
  </div>

  

</main><!-- /.container -->
<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
