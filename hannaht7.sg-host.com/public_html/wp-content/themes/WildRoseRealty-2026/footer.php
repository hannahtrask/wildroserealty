<?php
/**
 * The footer for the theme
 * 
 * @package WildRose Realty
 */
?>
    </div><!-- .site-content -->
</div><!-- #page -->

<footer id="colophon" class="site-footer">
    <div class="footer-content">
        <div class="container py-4">
            <div class="footer-widgets row-3">
                <div class="footer-widget">
                    <?php
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    } else {
                        echo '<h4>' . esc_html__( 'About Us', 'wildrose-realty' ) . '</h4>';
                        echo '<p>' . esc_html__( 'WildRose Realty specializes in luxury property listings and premium real estate services.', 'wildrose-realty' ) . '</p>';
                    }
                    ?>
                </div>

                <div class="footer-widget">
                    <?php
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    } else {
                        echo '<h4>' . esc_html__( 'Quick Links', 'wildrose-realty' ) . '</h4>';
                        wp_nav_menu( array(
                            'theme_location'  => 'footer',
                            'container'       => false,
                            'menu_class'      => 'footer-menu',
                            'fallback_cb'     => false,
                        ) );
                    }
                    ?>
                </div>

                <div class="footer-widget">
                    <?php
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    } else {
                        echo '<h4>' . esc_html__( 'Contact', 'wildrose-realty' ) . '</h4>';
                        echo '<p>';
                        echo '<strong>' . esc_html__( 'Phone:', 'wildrose-realty' ) . '</strong> ' . esc_html( get_theme_mod( 'wildrose_phone', '+1 (234) 567-8900' ) ) . '<br>';
                        echo '<strong>' . esc_html__( 'Email:', 'wildrose-realty' ) . '</strong> ' . esc_html( get_theme_mod( 'wildrose_email', 'info@wildrosealty.com' ) ) . '<br>';
                        echo '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container py-3">
            <div class="footer-bottom-content d-flex justify-between align-center">
                <div class="copyright">
                    <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'wildrose-realty' ); ?></p>
                </div>

                <div class="footer-social">
                    <a href="<?php echo esc_url( get_theme_mod( 'wildrose_facebook', '#' ) ); ?>" class="social-link" title="<?php esc_attr_e( 'Facebook', 'wildrose-realty' ); ?>">
                        <span class="icon">f</span>
                    </a>
                    <a href="<?php echo esc_url( get_theme_mod( 'wildrose_instagram', '#' ) ); ?>" class="social-link" title="<?php esc_attr_e( 'Instagram', 'wildrose-realty' ); ?>">
                        <span class="icon">📷</span>
                    </a>
                    <a href="<?php echo esc_url( get_theme_mod( 'wildrose_linkedin', '#' ) ); ?>" class="social-link" title="<?php esc_attr_e( 'LinkedIn', 'wildrose-realty' ); ?>">
                        <span class="icon">in</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
