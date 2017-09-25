<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="profile" href="http://gmpg.org/xfn11" />
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <header class="main-header container">
      <div class="content">

        <nav class="navbar navbar-toggleable-lg navbar-light">

          <a href="" class="navbar-brand header-logo">
            <?php if (has_custom_logo()): ?>
              <?php the_custom_logo(); ?>
            <?php else: ?>
              <?php echo '<h2>' . get_bloginfo('name') . '</h2>'; ?>
            <?php endif; ?>
          </a>
          
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end" id="nav-content">
            <?php
            if (has_nav_menu('primary')):
              wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'menu_id' => 'primary-menu',
                  'menu_class' => 'navbar-nav',
                  'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
              ));
            endif;
            ?>
          </div>

        </nav>

        <div class="clear"></div>
      </div>
    </header>