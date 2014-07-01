<section class="homepage-moments">
    <div class="container">
		<div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h3><?php the_field('moment_title'); ?></h3>
                <p><?php the_field('moment_description'); ?></p>
                <?php
                    $args = array(
                        'number' => '2',
                        'post_id' => 3,
                        'status' => 'approve',
                    );
                    $comments = get_comments($args);
                    foreach($comments as $comment) :
                        echo($comment->comment_author);
                    endforeach;
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>moments">Read all "Unignorable Moments"</a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>moments/?add-moment">+&nbsp;&nbsp;Add a Moment</a>
            </div>
		</div>
    </div>
</section>