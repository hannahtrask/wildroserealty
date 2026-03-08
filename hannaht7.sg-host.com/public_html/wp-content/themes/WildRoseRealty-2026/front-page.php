<?php
/**
 * The front page template
 * 
 * @package WildRose Realty
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    $front_page_id = (int) get_option( 'page_on_front' );
    $hero_image    = get_the_post_thumbnail_url( $front_page_id, 'full' );
    $hero_title    = $front_page_id ? get_the_title( $front_page_id ) : '';
    $hero_excerpt  = $front_page_id ? get_post_field( 'post_excerpt', $front_page_id ) : '';

    if ( empty( $hero_title ) ) {
        $hero_title = esc_html__( 'Find Your Dream Property', 'wildrose-realty' );
    }

    if ( empty( $hero_excerpt ) ) {
        $hero_excerpt = esc_html__( 'Luxury homes, investment opportunities, and expert guidance in every market we serve.', 'wildrose-realty' );
    }

    $front_page_content = $front_page_id ? get_post_field( 'post_content', $front_page_id ) : '';
    ?>

    <section class="hero-section hero-section--full"<?php if ( $hero_image ) : ?> style="background-image: url('<?php echo esc_url( $hero_image ); ?>');"<?php endif; ?>>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="container">
                <h1><?php echo esc_html( $hero_title ); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html( $hero_excerpt ); ?></p>
                <div class="hero-actions">
                    <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Explore Properties', 'wildrose-realty' ); ?>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline btn-hero-outline">
                        <?php esc_html_e( 'Contact Our Team', 'wildrose-realty' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php if ( '' !== trim( (string) $front_page_content ) ) : ?>
        <section class="front-page-content py-4">
            <div class="container entry-content">
                <?php echo apply_filters( 'the_content', $front_page_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        </section>
    <?php endif; ?>


</main>

<?php
get_footer();
