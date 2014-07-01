<?php get_header(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2>Blog</h2>
            	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            		<article>
                        <h6><?php posted_on(); ?></h6>
            			<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
            
            			<?php the_excerpt(); ?>
            		</article>
            	<?php endwhile; ?>
            	<?php post_navigation(); ?>
            	<?php else : ?>
            		<h4><?php _e('Nothing Found','themoment'); ?></h4>
            	<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
