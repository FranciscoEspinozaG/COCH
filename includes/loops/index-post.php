<?php
/*
 * The Index Post (or excerpt)
 * ===========================
 * Used by index.php, category.php and author.php
 */
?>

<a href="<?php the_permalink(); ?>">
  <article class="foto-index-post mt-3 mb-3 articulo-noticia p-3" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
    <div class="">
      <h1 class="titulo-index-post"><?php the_title()?></h1>
      <span style="color:white;"><i class="fa fa-calendar-alt"> |</i>&nbsp;<?php b4st_post_date(); ?>&nbsp;</span>
    </div>
  </article>
</a>