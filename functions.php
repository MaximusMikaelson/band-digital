<?php

if (! function_exists('maxim_snezhnitskiy_setup')) :
    function maxim_snezhnitskiy_setup() {
        // добавляем пользовательский логотип
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 130,
            'flex-height' => false,
            'flex-width'  => false,
            'header-text' => '',
        ) );
        // добавляем динамический тег <title>
        add_theme_support( 'title-tag' );
    }
    add_action( 'after_setup_theme', 'maxim_snezhnitskiy_setup' );
endif;

// Подключение скриптов и стилей
add_action( 'wp_enqueue_scripts', 'maxim_snezhnitskiy_scripts' );

function maxim_snezhnitskiy_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    // --- Стили ---
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css', array(), '4.6.0' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/plugins/fontawesome/css/all.css', array('bootstrap'), '6.4.0' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/plugins/animate-css/animate.css', array('bootstrap'), '1.0.0');
    wp_enqueue_style( 'icofont', get_template_directory_uri() . '/plugins/icofont/icofont.css', array('bootstrap'), '1.0.0' );
    
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

/* 
 * Регистрируем области меню
 */
function maxim_snezhnitskiy_menus() {
    // собираем массив областей меню
	$locations = array(
		'header'  => __( 'Header Menu', 'maxim_snezhnitskiy' ),
		'footer'   => __( 'Footer Menu', 'maxim_snezhnitskiy' ),
	);
    // регистрируем области меню
	register_nav_menus( $locations );
}
// хук для регистрации областей меню
add_action( 'init', 'maxim_snezhnitskiy_menus' );
// добавляем класс navbar-item ко всем элементам списка меню
add_filter( 'nav_menu_css_class', 'custom_nav_css_class', 10, 1 );
// функция добавления класса
function custom_nav_css_class( $classes ) {
    $classes[] = 'nav-item';
    return $classes;
}
?>
