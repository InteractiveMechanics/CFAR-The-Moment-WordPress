<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2><?php the_title(); ?></h2>
                <hr>
                <div>
                    <?php 
                        $resourceArgs = array(
                            'number_of_posts' => 3,
                            'post_type' => 'resource' ); 
                        $resources = get_posts( $resourceArgs );
                        foreach ( $resources as $post ) : setup_postdata( $post ); ?>
                        <div class="content-padding">
                            <span class="label label-success"><?php $cat = get_the_category(); echo $cat[0]->name; ?></span>
                            <h4><?php the_title(); ?></h4>
                            <?php the_content(); ?>
                            <a href="<?php the_field('resource_url'); ?>" target="_blank">View this resource &raquo;</a>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>