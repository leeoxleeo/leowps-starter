<article class="main-post single-post">
  <header class="post-header">
    <h1 class="post-title"><?php the_title(); ?></h1>
    <?php
    if (has_post_thumbnail):
      the_post_thumbnail();
    endif;
    ?>
  </header>
  <div class="post-content">
    <?php the_content(); ?>
  </div>

  <?php the_post_navigation(); ?>

  <?php
  if (comments_open() || get_comments_number()):
    comments_template();
  endif;
  ?>

</article>
