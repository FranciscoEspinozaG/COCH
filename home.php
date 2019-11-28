<?php
    get_template_part('includes/header'); 
    b4st_main_before();
?>
<main id="main" class="col-9 ml-auto mr-auto mt-5">
  <div class="row">

    <div class="col-sm">
      <div id="content" role="main">
        <header class="mb-4">
          <h1>
            <?php //_e('Category: ', 'b4st'); echo single_cat_title(); ?>
          </h1>
        </header>
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
