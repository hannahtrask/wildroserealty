<?php
/**
 * Comments Template
 * 
 * @package WildRose Realty
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if ( have_comments() ) {
        echo '<h3 class="comments-title">' . esc_html__( 'Comments', 'wildrose-realty' ) . '</h3>';

        wp_list_comments( array(
            'avatar_size' => 60,
            'type'        => 'all',
        ) );
    }

    if ( comments_open() ) {
        comment_form( array(
            'label_submit' => esc_html__( 'Post Comment', 'wildrose-realty' ),
            'comment_field' => '<div class="form-group"><label for="comment">' . esc_html__( 'Comment', 'wildrose-realty' ) . '</label><textarea id="comment" name="comment" rows="6" placeholder="' . esc_attr__( 'Your comment', 'wildrose-realty' ) . '" required></textarea></div>',
        ) );
    }
    ?>
</div>
