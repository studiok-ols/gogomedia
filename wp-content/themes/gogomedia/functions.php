<?php

if(!defined('WP_VER')) {
    if(WP_DEBUG) {
        define('WP_VER', '1.'.substr(microtime(),2,3));
    } else {
        define('WP_VER', '1');
    }
}

function print_pre($print = NULL,$var_export = false){

    $tab = array('77.252.244.152');

    if( !in_array($_SERVER['REMOTE_ADDR'],$tab) ) return;

    //---
    $debug_backtrace = debug_backtrace();
    foreach($debug_backtrace as $k_trace => $v_trace){
        if(isset($v_trace['file'])){
            $trace[$k_trace]['file'] = $v_trace['file'];
        }
        if(isset($v_trace['line'])){
            $trace[$k_trace]['line'] = $v_trace['line'];
        }
    }

    print_r('<pre style="background-color:#FFFFFF;color:#000000;padding:3px;">');
    echo 'wydruk zmiennej z: ' . $trace[0]['file'] . ',' . $trace[0]['line'] . "\n";
    if($var_export){
        echo var_export($print,1);
    }else{
        print_r($print);
    }
    print_r('</pre>');

}
//====================

require_once dirname(__FILE__) . '/inc/acf_gutenberg.php';

function simple_nav_menus() {

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
        'simple-primary-menu' => esc_html__( 'Primary Menu', 'really-simple' ),
    ]);
}
add_action( 'init', 'simple_nav_menus' );
//====================

function stk_scripts()
{
    wp_enqueue_style('gogomedia-css', dirname(get_stylesheet_uri()) . '/css/gogomedia-style.css', array('global-styles'), WP_VER);
    wp_enqueue_style('gogomedia-scss', dirname(get_stylesheet_uri()) . '/css/main.css', array('gogomedia-css'), WP_VER);

    //wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.1.slim.min.js', null, null, true );
    wp_enqueue_script('jquery');

}
add_action( 'wp_enqueue_scripts', 'stk_scripts' );
//====

function stk_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'stk_mime_types');
//====

function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
//====

function stk_theme_add_new_features() {

    $newColorPalette = [
        [
            'name' => esc_attr__('Blue', 'gogomedia'),
            'slug' => 'blue',
            'color' => '#215398',
        ],
        [
            'name' => esc_attr__('Black', 'gogomedia'),
            'slug' => 'black',
            'color' => '#000000',
        ],
        [
            'name' => esc_attr__('White', 'gogomedia'),
            'slug' => 'white',
            'color' => '#FFFFFF',
        ],
        [
            'name' => esc_attr__('BlackText', 'gogomedia'),
            'slug' => 'blacktext',
            'color' => '#2D3236',
        ],
        [
            'name' => esc_attr__('LightBlue', 'gogomedia'),
            'slug' => 'lightblue',
            'color' => '#F1F6FC',
        ],
        [
            'name' => esc_attr__('GrayText', 'gogomedia'),
            'slug' => 'graytext',
            'color' => '#808080',
        ],
    ];

    add_theme_support( 'editor-color-palette', $newColorPalette);
}
add_action( 'after_setup_theme', 'stk_theme_add_new_features' );
//====

