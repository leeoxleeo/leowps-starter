<article class="main-post single-post" id="post-<?php the_ID(); ?>" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
  <header class="post-header">
    <h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
    <?php
    if (has_post_thumbnail):
      the_post_thumbnail();
    endif;
    ?>
    <div class="post-meta">
    <ul>
      <li><i class="fa fa-folder"></i> <?php the_category( '| ' ); ?></li>
      <li><i class="fa fa-user"></i> <span itemprop="author" itemscope itemtype="http://schema.org/Person"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta( 'user_nicename' )); ?>"><span itemprop="name"><?php the_author(); ?></span></a></span></li>
      <li><i class="fa fa-clock-o"></i> <time itemprop="datePublished"><?php echo get_the_date(); ?></time></li>
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
