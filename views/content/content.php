<article class="main-post single-post">
  <header class="post-header">
    <h1 class="post-title"><?php the_title(); ?></h1>
    <?php
    if (has_post_thumbnail):
      the_post_thumbnail();
    endif;
    ?>
    <div class="post-meta">
      <ul>
        <li><i class="fa fa-folder"></i> <?php the_category( '| ' ); ?></li>
        <li><i class="fa fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta( 'user_nicename' )); ?>"><?php the_author(); ?></a></li>
        <li><i class="fa fa-clock-o"></i><span><?php the_date(); ?></span></li>
      </ul>
    </div>
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
