<article class="main-post home-post">
  <header class="post-header">
    <h2 class="post-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php
    if (has_post_thumbnail):
      the_post_thumbnail();
    endif;
    ?>
  </header>
  <div class="post-content">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a>
  </div>
</article>