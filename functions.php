<?php

// Подключение скриптов и стилей
add_action( 'wp_enqueue_scripts', 'maxim_snezhnitskiy_scripts' );

function maxim_snezhnitskiy_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    // --- Стили ---
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css', array(), '4.6.0' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/plugins/fontawesome/css/all.css', array('bootstrap'), '6.4.0' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/plugins/animate-css/animate.css', array('bootstrap'), '4.1.1' );
    wp_enqueue_style( 'icofont', get_template_directory_uri() . '/plugins/icofont/icofont.css', array('bootstrap'), '1.0.1' );
    
    wp_enqueue_style( 'main-style', get_stylesheet_uri(), array('bootstrap', 'fontawesome', 'animate', 'icofont'), $theme_version );
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/style.css', array('main-style'), filemtime(get_template_directory() . '/css/style.css') );

    // --- Скрипты ---
    // Используем стандартный jQuery WordPress
    wp_enqueue_script('jquery');

    wp_enqueue_script( 'popper', get_template_directory_uri() . '/plugins/bootstrap/js/popper.min.js', array('jquery'), '2.11.8', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.min.js', array('jquery', 'popper'), '4.6.0', true );

    wp_enqueue_script( 'wow', get_template_directory_uri() . '/plugins/counterup/wow.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/plugins/counterup/jquery.waypoints.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'counterup', get_template_directory_uri() . '/plugins/counterup/jquery.counterup.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/plugins/easing/easing.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'contact', get_template_directory_uri() . '/plugins/jquery/contact.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), filemtime(get_template_directory() . '/js/custom.js'), true );
}
?>
