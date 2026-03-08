<?php
/**
 * Post Content Template
 * 
 * @package WildRose Realty
 */
?>

<article <?php post_class( 'post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'property-featured' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="post-content">
        <header class="entry-header mb-2">
            <h3 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>

            <div class="entry-meta text-muted text-small">
                <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <?php echo esc_html( get_the_date() ); ?>
                </time>
            </div>
        </header>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="btn btn-small btn-outline">
            <?php esc_html_e( 'Read More', 'wildrose-realty' ); ?>
        </a>
    </div>
</article>
