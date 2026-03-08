<?php
/**
 * No Content Found Template
 * 
 * @package WildRose Realty
 */
?>

<div class="no-posts">
    <h2><?php esc_html_e( 'Nothing Found', 'wildrose-realty' ); ?></h2>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'wildrose-realty' ); ?></p>

    <?php
    get_search_form();
    ?>
</div>
