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
    register_nav_menus( array(
        'primary' => esc_html__( 'Menu Principal', 'leowps-starter' ),
    ) );
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
if( !function_exists( 'leowps_starter_remove_admin' ) ):
  
  function leowps_starter_remove_admin(){
    return false;
  }
  
  add_filter( 'show_admin_bar', 'leowps_starter_remove_admin' );
  
endif;