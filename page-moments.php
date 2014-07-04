<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2>
                    <?php the_title(); ?>
                    <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add-a-moment">+&nbsp;&nbsp;Add a Moment</a>
                </h2>
                <div id="success" class="alert alert-success" style="display:none;">Your moment was successful submitted. It will appear here once approved.</div>
                <?php
                    $default = 'http://staging.interactivemechanics.com/themoment/wp-content/themes/themoment/images/default-profile%402x.png';
                    $args = array(
                        'status' => 'approve',
                    );
                    $comments = get_comments($args);
                    foreach($comments as $comment) : ?>
                        <?php 
                            $image = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment->comment_author_email ) ) ) . "?d=" . urlencode( $default ) . "&s=85";
                            $author = $comment->comment_author;
                            $content = $comment->comment_content;
                        ?>
                        <img src="<?php echo $image; ?>" alt="<?php echo $author; ?>" />
                        <p class="moment"><?php echo $content; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add-a-moment" tabindex="-1" role="dialog" aria-labelledby="add-a-moment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add an Unignorable Moment</h4>
            </div>
            <div class="modal-body">
                <?php $comment_args = array( 
                    'title_reply' => '',
                    'fields' => apply_filters( 'comment_form_default_fields', array(
                        'author' => '<p class="comment-form-author"><label for="author">Name*</label><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
                        'email'  => '<p class="comment-form-email"><label for="email">Email*</label><input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
                        'url'    => '' ) ),
                        'comment_field' => '<p><label for="comment">Tell us about an unignorable moment in your organization.<br>How did it affect you? How was it resolved or unresolved? What did you learn?</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="4" aria-required="true"></textarea></p>',
                        'comment_notes_after' => ''
                    );
                    comment_form($comment_args); ?>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
