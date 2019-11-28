<?php
    get_template_part('includes/header'); 
    b4st_main_before();
?>

<div class="m-0">
  <div class="header-single" style="overflow:hidden;max-height:50vh;min-height:40vh;">
    <?php echo do_shortcode('[rev_slider alias="single_noticias"]');?>
  </div>
</div>

<main id="main" class="container mt-5">
  <div class="row">
    <div class="col-sm">
      <div id="content" role="main">

        <?php get_template_part('includes/loops/index-loop'); ?>

      </div><!-- /#content -->
    </div>
    <?php //get_template_part('includes/sidebar'); ?>

  </div><!-- /.row -->
</main><!-- /.container -->

<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>

<!-- HOME EN CASO DE NO ENCONTRAR RESULTADOS! -->
