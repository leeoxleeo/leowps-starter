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
    <div class="post-meta">
      <ul>
        <li><i class="fa fa-folder"></i> <?php the_category( '| ' ); ?></li>
        <li><i class="fa fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta( 'user_nicename' )); ?>"><?php the_author(); ?></a></li>
        <li><i class="fa fa-clock-o"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></li>
      </ul>
    </div>
  </header>
  <div class="post-content">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_excerpt(); ?></a>
  </div>
</article>