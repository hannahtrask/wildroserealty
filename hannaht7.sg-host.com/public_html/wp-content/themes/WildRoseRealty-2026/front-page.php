<?php
/**
 * The front page template
 * 
 * @package WildRose Realty
 */

get_header();
?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="container">
                <h1><?php echo esc_html__( 'Find Your Dream Property', 'wildrose-realty' ); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html__( 'Discover luxury real estate and investment properties', 'wildrose-realty' ); ?></p>
                
                <!-- Search Form -->
                <form class="property-search" method="get" action="<?php echo esc_url( home_url( '/properties/' ) ); ?>">
                    <div class="search-row">
                        <div class="search-field">
                            <label for="location"><?php esc_html_e( 'Location', 'wildrose-realty' ); ?></label>
                            <select id="location" name="location">
                                <option value=""><?php esc_html_e( 'All Locations', 'wildrose-realty' ); ?></option>
                                <?php
                                $locations = get_terms( array(
                                    'taxonomy'   => 'property-location',
                                    'hide_empty' => true,
                                ) );
                                
                                foreach ( $locations as $location ) {
                                    echo '<option value="' . esc_attr( $location->slug ) . '">' . esc_html( $location->name ) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="search-field">
                            <label for="type"><?php esc_html_e( 'Type', 'wildrose-realty' ); ?></label>
                            <select id="type" name="type">
                                <option value=""><?php esc_html_e( 'All Types', 'wildrose-realty' ); ?></option>
                                <?php
                                $types = get_terms( array(
                                    'taxonomy'   => 'property-type',
                                    'hide_empty' => true,
                                ) );
                                
                                foreach ( $types as $type ) {
                                    echo '<option value="' . esc_attr( $type->slug ) . '">' . esc_html( $type->name ) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="search-field">
                            <label for="price"><?php esc_html_e( 'Max Price', 'wildrose-realty' ); ?></label>
                            <select id="price" name="price">
                                <option value=""><?php esc_html_e( 'Any Price', 'wildrose-realty' ); ?></option>
                                <option value="500000">$500,000</option>
                                <option value="1000000">$1,000,000</option>
                                <option value="5000000">$5,000,000</option>
                                <option value="10000000">$10,000,000</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Search', 'wildrose-realty' ); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Properties -->
    <section class="featured-properties py-4">
        <div class="container">
            <h2><?php echo esc_html__( 'Featured Properties', 'wildrose-realty' ); ?></h2>
            
            <div class="properties-grid row-3">
                <?php
                $args = array(
                    'post_type'      => 'property',
                    'posts_per_page' => 6,
                    'meta_key'       => '_property_featured',
                    'meta_value'     => '1',
                );
                
                $properties = new WP_Query( $args );
                
                if ( $properties->have_posts() ) {
                    while ( $properties->have_posts() ) {
                        $properties->the_post();
                        get_template_part( 'template-parts/property-card' );
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>' . esc_html__( 'No properties found.', 'wildrose-realty' ) . '</p>';
                }
                ?>
            </div>

            <div class="text-center py-3">
                <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" class="btn btn-outline">
                    <?php esc_html_e( 'View All Properties', 'wildrose-realty' ); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section py-4" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="about-content row">
                <div class="about-text">
                    <h2><?php echo esc_html__( 'Welcome to WildRose Realty', 'wildrose-realty' ); ?></h2>
                    <p><?php echo wp_kses_post( get_theme_mod( 'wildrose_about_text', 'We specialize in luxury real estate and investment properties. With years of experience in the market, we help clients find their perfect property investment.' ) ); ?></p>
                    <p><?php echo esc_html__( 'Our team of professional agents is dedicated to providing exceptional service and expert guidance through every step of your real estate journey.', 'wildrose-realty' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Learn More', 'wildrose-realty' ); ?>
                    </a>
                </div>
                <div class="about-image">
                    <?php
                    $about_image = get_theme_mod( 'wildrose_about_image' );
                    if ( $about_image ) {
                        echo '<img src="' . esc_url( $about_image ) . '" alt="' . esc_attr__( 'About Us', 'wildrose-realty' ) . '">';
                    } else {
                        echo '<div style="background-color: #ddd; height: 400px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">' . esc_html__( 'About Image', 'wildrose-realty' ) . '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section py-4">
        <div class="container">
            <div class="stats-grid row-4">
                <div class="stat-item text-center">
                    <div class="stat-number">$2.5B</div>
                    <div class="stat-label"><?php esc_html_e( 'in Sales', 'wildrose-realty' ); ?></div>
                </div>
                <div class="stat-item text-center">
                    <div class="stat-number">150+</div>
                    <div class="stat-label"><?php esc_html_e( 'Properties Sold', 'wildrose-realty' ); ?></div>
                </div>
                <div class="stat-item text-center">
                    <div class="stat-number">25+</div>
                    <div class="stat-label"><?php esc_html_e( 'Expert Agents', 'wildrose-realty' ); ?></div>
                </div>
                <div class="stat-item text-center">
                    <div class="stat-number">20+</div>
                    <div class="stat-label"><?php esc_html_e( 'Years Experience', 'wildrose-realty' ); ?></div>
                </div>
            </div>
        </div>
    </section>


</main>

<?php
get_footer();
