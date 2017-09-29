<?php get_header(); ?>

<section class="default-header container">
    <div class="content">

        <header class="section-header">
            <?php the_archive_title( '<h2>', '</h2>' ); ?>  
            <?php the_archive_description(); ?>
        </header>

        <div class="clear"></div>
    </div>
</section>

<section class="main-archive container">
    <div class="content">

        <div class="row">

        <?php if (have_posts()): ?>
            <?php while(have_posts()): ?>
            <?php the_post(); ?>
                <div class="col-lg-8">
                    <?php get_template_part('views/content/content', 'home' ); ?>
                </div>
            <?php endwhile; ?>
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
</section>

<?php get_footer(); ?>