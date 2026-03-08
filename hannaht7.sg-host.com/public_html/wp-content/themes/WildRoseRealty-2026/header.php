<?php
/**
 * The header for the theme
 * 
 * @package WildRose Realty
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container d-flex justify-between align-center">
            <div class="navbar-brand">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
                }
                ?>
            </div>

            <button class="navbar-toggle" id="navbar-toggle" aria-label="<?php esc_attr_e( 'Toggle navigation', 'wildrose-realty' ); ?>">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <?php
            wp_nav_menu( array(
                'theme_location'  => 'primary',
                'container_class' => 'navbar-menu',
                'menu_class'      => 'navbar-nav',
                'fallback_cb'     => 'wp_page_menu',
            ) );
            ?>

            <div class="header-contact">
                <a href="tel:+1234567890" class="btn btn-primary">
                    <span class="icon">📞</span>
                    <span class="phone"><?php echo esc_html( get_theme_mod( 'wildrose_phone', '+1 (234) 567-8900' ) ); ?></span>
                </a>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="site">
    <div class="site-content">
