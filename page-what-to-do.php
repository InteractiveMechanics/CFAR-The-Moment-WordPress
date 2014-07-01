<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2><?php the_title(); ?></h2>
                <?php 
                    $resourceArgs = array(
                        'number_of_posts' => 3,
                        'post_type' => 'resource' ); 
                    $resources = get_posts( $resourceArgs );
                    foreach ( $resources as $post ) : setup_postdata( $post ); ?>
                    <h6><?php the_field('author'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php the_field('chapter'); ?></h6>
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_content(); ?></p>
                    <a href="<?php the_field('resource_url'); ?>" target="_blank">View this resource &raquo;</a>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
