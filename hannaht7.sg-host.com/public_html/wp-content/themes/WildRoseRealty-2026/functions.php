<?php
/**
 * WildRose Realty 2026 - functions.php
 * 
 * Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Version
 */
define( 'WILDROSE_VERSION', '1.0.0' );

/**
 * Setup theme
 */
function wildrose_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    
    // Add support for full-width blocks
    add_theme_support( 'align-wide' );
    
    // Add support for responsive embedded content
    add_theme_support( 'responsive-embeds' );
    
    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add modern editor design tools for Gutenberg blocks.
    add_theme_support( 'appearance-tools' );
    add_theme_support( 'custom-line-height' );
    add_theme_support( 'custom-spacing' );
    add_theme_support( 'custom-units' );
    add_theme_support( 'editor-spacing-sizes' );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary'   => esc_html__( 'Primary Menu', 'wildrose-realty' ),
        'secondary' => esc_html__( 'Secondary Menu', 'wildrose-realty' ),
        'footer'    => esc_html__( 'Footer Menu', 'wildrose-realty' ),
    ) );
    
    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
    
    // Add support for design/site editor (FSE - Full Site Editing)
    add_theme_support( 'block-templates' );
    add_theme_support( 'block-template-parts' );
    
    // Load text domain for translations
    load_theme_textdomain( 'wildrose-realty', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wildrose_setup' );

/**
 * Register scripts and styles
 */
function wildrose_scripts() {
    // Main stylesheet
    wp_enqueue_style( 'wildrose-style', get_stylesheet_uri(), array(), WILDROSE_VERSION );
    
    // Google Fonts
    wp_enqueue_style( 'google-fonts-wildrose', 'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;600&family=Open+Sans:wght@400;600;700&display=swap', array(), null );
    
    // Theme styles
    wp_enqueue_style( 'wildrose-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), WILDROSE_VERSION );
    wp_enqueue_style( 'wildrose-header', get_template_directory_uri() . '/assets/css/header.css', array(), WILDROSE_VERSION );
    wp_enqueue_style( 'wildrose-properties', get_template_directory_uri() . '/assets/css/properties.css', array(), WILDROSE_VERSION );
    
    // Theme scripts
    wp_enqueue_script( 'wildrose-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), WILDROSE_VERSION, true );
    wp_enqueue_script( 'wildrose-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), WILDROSE_VERSION, true );
    
    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

/**
 * Register block editor styles
 */
function wildrose_editor_styles() {
    // Load editor stylesheet
    wp_enqueue_style( 'wildrose-editor', get_template_directory_uri() . '/assets/css/editor-style.css', array(), WILDROSE_VERSION );
    
    // Load Google Fonts for editor
    wp_enqueue_style( 'google-fonts-wildrose-editor', 'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;600&family=Open+Sans:wght@400;600;700&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'wildrose_scripts' );
add_action( 'enqueue_block_editor_assets', 'wildrose_editor_styles' );

/**
 * Register widget areas
 */
function wildrose_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'wildrose-realty' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'Main sidebar area', 'wildrose-realty' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Area 1', 'wildrose-realty' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'First footer widget area', 'wildrose-realty' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Area 2', 'wildrose-realty' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Second footer widget area', 'wildrose-realty' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Area 3', 'wildrose-realty' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Third footer widget area', 'wildrose-realty' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'wildrose_widgets_init' );

/**
 * Custom post types for properties
 */
function wildrose_register_post_types() {
    // Properties Post Type
    register_post_type( 'property', array(
        'labels'      => array(
            'name'          => esc_html__( 'Properties', 'wildrose-realty' ),
            'singular_name' => esc_html__( 'Property', 'wildrose-realty' ),
        ),
        'public'      => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'     => array( 'slug' => 'properties' ),
        'menu_icon'   => 'dashicons-location-alt',
    ) );
    
    // Agents Post Type
    register_post_type( 'agent', array(
        'labels'      => array(
            'name'          => esc_html__( 'Agents', 'wildrose-realty' ),
            'singular_name' => esc_html__( 'Agent', 'wildrose-realty' ),
        ),
        'public'      => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'     => array( 'slug' => 'agents' ),
        'menu_icon'   => 'dashicons-businessperson',
    ) );
}
add_action( 'init', 'wildrose_register_post_types' );

/**
 * Register custom taxonomies
 */
function wildrose_register_taxonomies() {
    // Property Locations
    register_taxonomy( 'property-location', 'property', array(
        'labels'       => array(
            'name'          => esc_html__( 'Locations', 'wildrose-realty' ),
            'singular_name' => esc_html__( 'Location', 'wildrose-realty' ),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'locations' ),
        'show_admin_column' => true,
    ) );
    
    // Property Types/Lifestyles
    register_taxonomy( 'property-type', 'property', array(
        'labels'       => array(
            'name'          => esc_html__( 'Property Types', 'wildrose-realty' ),
            'singular_name' => esc_html__( 'Property Type', 'wildrose-realty' ),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'property-types' ),
        'show_admin_column' => true,
    ) );
}
add_action( 'init', 'wildrose_register_taxonomies' );

/**
 * Register image sizes
 */
function wildrose_register_image_sizes() {
    add_image_size( 'property-featured', 800, 600, true );
    add_image_size( 'property-grid', 400, 300, true );
    add_image_size( 'property-thumbnail', 300, 200, true );
    add_image_size( 'agent-featured', 400, 400, true );
}
add_action( 'after_setup_theme', 'wildrose_register_image_sizes' );

/**
 * Remove WordPress default admin styling from frontend
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

/**
 * Custom excerpt length
 */
function wildrose_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wildrose_excerpt_length' );

/**
 * Custom excerpt more
 */
function wildrose_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wildrose_excerpt_more' );

/**
 * Body classes
 */
function wildrose_body_classes( $classes ) {
    if ( is_singular( 'property' ) ) {
        $classes[] = 'single-property';
    }
    
    if ( is_tax( 'property-location' ) ) {
        $classes[] = 'archive-location';
    }
    
    return $classes;
}
add_filter( 'body_class', 'wildrose_body_classes' );

/**
 * Helper function to get property featured image
 */
function wildrose_get_property_image( $post_id = null, $size = 'property-featured' ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }
    
    return get_the_post_thumbnail_url( $post_id, $size );
}

/**
 * Helper function to format property price
 */
function wildrose_format_price( $price ) {
    if ( ! is_numeric( $price ) ) {
        return $price;
    }
    
    if ( $price >= 1000000 ) {
        return '$' . number_format( $price / 1000000, 1 ) . 'M';
    } elseif ( $price >= 1000 ) {
        return '$' . number_format( $price / 1000 ) . 'K';
    }
    
    return '$' . number_format( $price );
}

/**
 * Custom comment form fields
 */
function wildrose_comment_form_default_fields( $fields ) {
    $fields['author'] = '<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'wildrose-realty' ) . '" required>';
    $fields['email'] = '<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'wildrose-realty' ) . '" required>';
    $fields['url'] = '<input id="url" name="url" type="url" placeholder="' . esc_attr__( 'Website', 'wildrose-realty' ) . '">';
    
    return $fields;
}
add_filter( 'comment_form_default_fields', 'wildrose_comment_form_default_fields' );

/**
 * Customize comment form textarea
 */
function wildrose_comment_form_field_comment( $field ) {
    $field = '<textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Your comment', 'wildrose-realty' ) . '" required rows="6"></textarea>';
    return $field;
}
add_filter( 'comment_form_field_comment', 'wildrose_comment_form_field_comment' );
