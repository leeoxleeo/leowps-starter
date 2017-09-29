<?php get_header(); ?>

<section class="default-header container">
    <div class="content">

        <header class="section-header">
        <h2><?php printf(
            esc_html__( 'Resultados para: %s', 'leowps-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
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