<?php
/**
 * The main template file
 * 
 * @package WildRose Realty
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        if ( have_posts() ) {
            ?>
            <div class="archive-header py-4">
                <?php
                if ( is_home() ) {
                    echo '<h1>' . esc_html__( 'Latest News', 'wildrose-realty' ) . '</h1>';
                } elseif ( is_search() ) {
                    echo '<h1>' . sprintf( esc_html__( 'Search Results for: %s', 'wildrose-realty' ), get_search_query() ) . '</h1>';
                } else {
                    the_archive_title( '<h1>', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                }
                ?>
            </div>

            <div class="posts-grid row-3">
                <?php
                while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                }
                ?>
            </div>

            <!-- Pagination -->
            <div class="pagination py-4">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => esc_html__( 'Previous', 'wildrose-realty' ),
                    'next_text' => esc_html__( 'Next', 'wildrose-realty' ),
                ) );
                ?>
            </div>
            <?php
        } else {
            get_template_part( 'template-parts/content', 'none' );
        }
        ?>
    </div>
</main>

<?php
get_footer();
