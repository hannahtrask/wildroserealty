<?php
/**
 * 404 Page Template
 * 
 * @package WildRose Realty
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container py-4">
        <article class="error-404 not-found text-center">
            <header class="entry-header mb-4">
                <h1 class="entry-title" style="font-size: 5rem; margin-bottom: 1rem;">404</h1>
                <h2><?php esc_html_e( 'Page Not Found', 'wildrose-realty' ); ?></h2>
            </header>

            <div class="entry-content py-4">
                <p><?php esc_html_e( 'The page you are looking for could not be found.', 'wildrose-realty' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary mt-3">
                    <?php esc_html_e( 'Back to Home', 'wildrose-realty' ); ?>
                </a>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();
