<?php get_header(); ?>

<main class="main container">
  <div class="content">

    <?php if (have_posts()): ?>
      <?php the_post(); ?>
      <?php get_template_part('views/content/content', 'page') ?>
    <?php else: ?>
      <?php get_template_part('views/content/content', 'none'); ?>
    <?php endif; ?>

    <div class="clear"></div>
  </div>
</main>

<?php get_footer(); ?>
