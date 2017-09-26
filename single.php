<?php get_header(); ?>

<main class="main container">
  <div class="content">

    <div class="row">
      <?php if (have_posts()): ?>
        <?php the_post(); ?>
        <div class="col-lg-8">
          <?php get_template_part('views/content/content', get_post_format()); ?>
        </div>
      <?php else: ?>
        <div class="col-lg-8">
          <?php get_template_part('views/content/content', 'none'); ?>
        </div>  
      <?php endif; ?>

      <div class="col-lg-4">
        <?php get_sidebar(); ?>
      </div>

    </div>

    <div class="clear"></div>
  </div>
</main>

<?php get_footer(); ?>
