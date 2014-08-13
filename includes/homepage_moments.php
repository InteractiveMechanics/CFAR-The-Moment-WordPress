<section class="homepage-moments">
    <div class="container">
		<div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <h3 class="text-center"><?php the_field('moment_title'); ?></h3>
                <p><?php the_field('moment_description'); ?></p>
                <div class="moments">
                <?php
                    $default = get_template_directory_uri() . '/images/default-profile%402x.png';
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
                        <div class="moment-container">
                            <div class="row">
                                <div class="col-sm-2 col-lg-1"><img src="<?php echo $image; ?>" alt="<?php echo $author; ?>" /></div>
                                <div class="col-sm-10 col-lg-11"><p class="moment"><?php echo $content; ?></p></div>
                            </div>
                        </div>
                <?php endforeach; ?>
                </div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>moments" class="underline hidden-xs">Read all "Unignorable Moments"</a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>moments/#add-a-moment" class="btn btn-primary btn-sm pull-right hidden-xs">+&nbsp;&nbsp;Add a Moment</a>
            </div>
		</div>
    </div>
</section>