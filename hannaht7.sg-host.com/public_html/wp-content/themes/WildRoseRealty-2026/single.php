<?php
/**
 * Single post template
 * 
 * @package WildRose Realty
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container py-4">
        <article <?php post_class( 'single-post' ); ?>>
            <header class="entry-header mb-4">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                
                <div class="entry-meta text-muted">
                    <span class="posted-on">
                        <?php
                        printf(
                            esc_html__( 'Posted on %s', 'wildrose-realty' ),
                            '<time class="entry-date published updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>'
                        );
                        ?>
                    </span>
                    
                    <?php if ( get_the_author() ) : ?>
                        <span class="byline">
                            <?php
                            printf(
                                esc_html__( ' by %s', 'wildrose-realty' ),
                                '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
                            );
                            ?>
                        </span>
                    <?php endif; ?>
                </div>
            </header>

            <?php
            if ( has_post_thumbnail() ) {
                ?>
                <div class="entry-featured-image mb-4">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                </div>
                <?php
            }
            ?>

            <div class="entry-content">
                <?php
                the_content();
                
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wildrose-realty' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>

            <?php
            if ( get_the_tags() ) {
                ?>
                <footer class="entry-footer mt-4 py-4" style="border-top: 1px solid #e8e8e8; border-bottom: 1px solid #e8e8e8;">
                    <div class="entry-tags">
                        <strong><?php esc_html_e( 'Tags:', 'wildrose-realty' ); ?></strong>
                        <?php the_tags( '', ', ' ); ?>
                    </div>
                </footer>
                <?php
            }
            ?>
        </article>

        <!-- Comments -->
        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>

        <!-- Related Posts -->
        <div class="related-posts mt-4 py-4">
            <h3><?php esc_html_e( 'Related Posts', 'wildrose-realty' ); ?></h3>
            
            <?php
            $args = array(
                'posts_per_page' => 3,
                'post__not_in'   => array( get_the_ID() ),
                'orderby'        => 'rand',
            );
            
            $related = new WP_Query( $args );
            
            if ( $related->have_posts() ) {
                echo '<div class="related-posts-grid row-3">';
                while ( $related->have_posts() ) {
                    $related->the_post();
                    get_template_part( 'template-parts/content', 'related' );
                }
                echo '</div>';
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
