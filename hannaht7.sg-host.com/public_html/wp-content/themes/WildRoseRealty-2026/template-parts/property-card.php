<?php
/**
 * Property Card Template
 * 
 * @package WildRose Realty
 */

$property_image = wildrose_get_property_image( get_the_ID(), 'property-featured' );
$price = get_post_meta( get_the_ID(), '_property_price', true );
$location = wp_get_post_terms( get_the_ID(), 'property-location' );
$type = wp_get_post_terms( get_the_ID(), 'property-type' );
$bedrooms = get_post_meta( get_the_ID(), '_property_bedrooms', true );
$bathrooms = get_post_meta( get_the_ID(), '_property_bathrooms', true );
$size = get_post_meta( get_the_ID(), '_property_size', true );
$featured = get_post_meta( get_the_ID(), '_property_featured', true );
$status = get_post_meta( get_the_ID(), '_property_status', true );
?>

<div class="property-card">
    <div class="property-card-image">
        <?php if ( $property_image ) : ?>
            <img src="<?php echo esc_url( $property_image ); ?>" alt="<?php the_title_attribute(); ?>">
        <?php else : ?>
            <div style="background-color: #ddd; height: 100%; display: flex; align-items: center; justify-content: center;">
                <?php esc_html_e( 'No image', 'wildrose-realty' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $status ) ) : ?>
            <div class="property-card-badge"><?php echo esc_html( ucfirst( $status ) ); ?></div>
        <?php endif; ?>
    </div>

    <div class="property-card-content">
        <h3 class="property-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if ( ! empty( $location ) && is_array( $location ) ) : ?>
            <div class="property-card-location">
                <span>📍</span>
                <?php echo esc_html( $location[0]->name ); ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $bedrooms ) || ! empty( $bathrooms ) || ! empty( $size ) ) : ?>
            <div class="property-card-details">
                <?php if ( ! empty( $bedrooms ) ) : ?>
                    <div class="property-card-detail">
                        <span class="property-card-detail-label"><?php esc_html_e( 'Beds', 'wildrose-realty' ); ?></span>
                        <span class="property-card-detail-value"><?php echo esc_html( $bedrooms ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $bathrooms ) ) : ?>
                    <div class="property-card-detail">
                        <span class="property-card-detail-label"><?php esc_html_e( 'Baths', 'wildrose-realty' ); ?></span>
                        <span class="property-card-detail-value"><?php echo esc_html( $bathrooms ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty( $size ) ) : ?>
                    <div class="property-card-detail">
                        <span class="property-card-detail-label"><?php esc_html_e( 'Sq Ft', 'wildrose-realty' ); ?></span>
                        <span class="property-card-detail-value"><?php echo esc_html( number_format( intval( $size ) ) ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $price ) ) : ?>
            <div class="property-card-price">
                <?php echo wildrose_format_price( $price ); ?>
            </div>
        <?php endif; ?>

        <div class="property-card-footer">
            <a href="<?php the_permalink(); ?>" class="btn-primary"><?php esc_html_e( 'View Details', 'wildrose-realty' ); ?></a>
            <a href="mailto:?subject=<?php the_title_attribute(); ?>" class="btn-outline"><?php esc_html_e( 'Email', 'wildrose-realty' ); ?></a>
        </div>
    </div>
</div>
