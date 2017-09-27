<?php

/**
 * @package leowps-starter
 * @author Leonardo Pereira <leonardo@leodesigner.com.br>
 */
?><?php

if (!function_exists('leowps_starter_setup')):

  function leowps_starter_setup() {

    load_theme_textdomain('leowps-starter');

    /* Suportes necessários para o funcionamento do tema */

    // adiciona o título da página automaticamente
    add_theme_support('title-tag');

    // suporte para adicionar imagem destacada em posts/páginas
    add_theme_support('post-thumbnails');

    // suporte para adicionar links do feed automaticamente ao header
    add_theme_support('automatic-feed-links');

    // suporte para tags html5 nos elementos de formulário, pesquisa e galeria
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    /**
     * suporte para diferentes tipos de formato para os posts
     * @link https://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat',
    ));

    // suporte para adicionar logo personalizado ao tema
    add_theme_support('custom-logo', array(
        'height' => 82,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // suporte para adicionar e atualizar widgets em tempo real
    add_theme_support('customize-selective-refresh-widgets');

    // registro do menu principal do tema
    register_nav_menus(array(
        'primary' => esc_html__('Menu Principal', 'leowps-starter'),
    ));
  }

  add_action('after_setup_theme', 'leowps_starter_setup');

endif;

/**
 * Inclusão dos scripts e estilos utilizados no tema
 */
if (!function_exists('leowps_starter_scripts')):

  function leowps_starter_scripts() {

    wp_deregister_script('jquery');

    wp_enqueue_style('bootstrap', get_bloginfo('template_url') . '/dist/css/bootstrap.css', array(), '4.0', 'all');
    wp_enqueue_style('main', get_bloginfo('template_url') . '/dist/css/style.min.css', array(), '1.0', 'all');

    wp_enqueue_script('jquery', get_bloginfo('template_url') . '/dist/js/jquery.js', '', '', true);
    wp_enqueue_script('bootstrap', get_bloginfo('template_url') . '/dist/js/bootstrap.min.js', '', '', true);
  }

  add_action('wp_enqueue_scripts', 'leowps_starter_scripts');

endif;

/**
 * Funções para limpar o código gerado pelo Wordpress
 */
if (!function_exists('leowps_starter_cleaner')):

  function leowps_starter_cleaner() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
  }

  add_action('after_setup_theme', 'leowps_starter_cleaner');

endif;

/**
 * Função para remover a barra admin do Wordpress
 */
if (!function_exists('leowps_starter_remove_admin')):

  function leowps_starter_remove_admin() {
    return false;
  }

  add_filter('show_admin_bar', 'leowps_starter_remove_admin');

endif;

/**
 * Registro da barra lateral do tema
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
if (!function_exists('leowps_starter_widgets_init')):

  function leowps_starter_widgets_init() {

    /**
     * @since 1.0
     */
    register_sidebar(array(
        'name' => __('Barra Lateral', 'leowps-starter'),
        'id' => 'custom-sidebar',
        'description' => __('Os widgets adicionados aqui serão mostrados na barra lateral do site', 'leowps-starter'),
        'before_widget' => '<article id="%1$s" class="custom-widget %2$s"><div class="widget-content">',
        'after_widget' => '</div></article>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
  }

  add_action('widgets_init', 'leowps_starter_widgets_init');

endif;

/**
 * Comentários Personalizados
 */
if (!function_exists('leowps_starter_comments')):

  function leowps_starter_comments($comment, $args, $depth) {
    $comment_id = (int) $comment->comment_ID;
    $user_avatar = get_avatar($comment, 160);
    $user_name = get_comment_author();
    $dt = get_comment_date('d/m/Y H:i');
    $content = get_comment_text();
    $reply = get_comment_reply_link(array(
        'replay_text' => 'Responder',
        'respond_id' => 'responder',
        'depth' => $depth,
        'max_depth' => $args['max_depth']
    ));
    $html = sprintf(
          '<div class="comment-item" id="comment-%1$s">'
          . '<span class="comment-avatar">'
          . '%2$s'
          . '</span>'
          . '<div class="comment-content" id="comment-%1$s">'
          . '<span class="comment-info">'
          . '<strong class="comment-author">%3$s</strong>'
          . '<span class="comment-date">%4$s</span>'
          . '</span>'
          . '<p>'
          . '%5$s'
          . '<span class="comment-reply">'
          . '%6$s'
          . '<span>'
          . '</p>'
          . '</div>'
          . '</div>', $comment_id, $user_avatar, $user_name, $dt, $content, $reply
    );
    echo $html;
  }
  
endif;