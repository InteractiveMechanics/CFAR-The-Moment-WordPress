<section class="homepage-moments">
    <div class="container">
		<div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h3><?php the_field('moment_title'); ?></h3>
                <p><?php the_field('moment_description'); ?></p>
                <?php
                    $default = 'http://staging.interactivemechanics.com/themoment/wp-content/themes/themoment/images/default-profile%402x.png';
                    $args = array(
                        'number' => '2',
                        'post_id' => 14,
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
                        <p><?php echo $content; ?></p>
                <?php endforeach; ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>moments">Read all "Unignorable Moments"</a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>moments/#add-a-moment">+&nbsp;&nbsp;Add a Moment</a>
            </div>
		</div>
    </div>
</section>