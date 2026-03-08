<?php
/**
 * Related Post Template
 * 
 * @package WildRose Realty
 */
?>

<article class="related-post-card">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="related-post-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'property-featured' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="related-post-content">
        <h4 class="related-post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>

        <div class="related-post-meta text-small text-muted">
            <?php echo esc_html( get_the_date() ); ?>
        </div>
    </div>
</article>
