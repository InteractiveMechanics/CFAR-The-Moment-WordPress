<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content single">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h6><?php posted_on(); ?> by <?php the_field('author'); ?></h6>
                <h2><?php the_title(); ?></h2>
                <hr>
                <div class="article">
                    <?php the_content(); ?>
                    
                </div>
                <ul class="list-inline list-icons text-center">
                    <li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?text=Read <?php the_title(); ?> on <?php the_permalink(); ?> via @UnignorableCFAR" target="_blank"><i class="icon-twitter"></i></a></li>
                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
                </ul>
                <hr>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <?php comments_template(); ?>
                    </div>
                </div>
                <?php post_navigation(); ?>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
