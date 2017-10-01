<?php get_header(); ?>

<?php
/* Inclusão da parte principal do site */
get_template_part('views/homepage/home-hero');
?>

<main class="main container">
  <div class="content">

    <header class="section-header">
      <h2>Últimos Conteúdos do Blog</h2>
    </header>

    <div class="row">
      <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
          <?php the_post(); ?>
          <div class="col-lg-4">
            <?php get_template_part('views/content/content', 'home'); ?>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <?php get_template_part('views/content/content', 'none'); ?>
      <?php endif; ?>
    </div>

    <div class="clear"></div>
  </div>
</main>

<?php get_footer(); ?>
