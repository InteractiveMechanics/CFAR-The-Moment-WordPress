<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() )
        return;
?>
 
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h4 class="comments-title">
            <?php
                printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'shape' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h4> 
        <ol class="commentlist">
            <?php wp_list_comments(); ?>
        </ol>
 
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'shape' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'shape' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'shape' ) ); ?></div>
        </nav>
        <?php endif; ?>
 
    <?php endif; ?>
 
    <?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="nocomments"><?php _e( 'Comments are closed.', 'shape' ); ?></p>
    <?php endif; ?>
    <?php $comment_args = array( 
        'title_reply' => '',
        'fields' => apply_filters( 'comment_form_default_fields', array(
            'author' => '<p class="comment-form-author"><label for="author">Name*</label><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
            'email'  => '<p class="comment-form-email"><label for="email">Email*</label><input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
            'url'    => '' ) ),
            'comment_field' => '<p><label for="comment">Comments*</label><textarea id="comment" class="form-control" name="comment" rows="4" aria-required="true"></textarea></p>',
            'comment_notes_after' => ''
        );
        comment_form($comment_args); ?>
 
</div>