<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2><?php the_title(); ?></h2>
                <div class="pull-right" id="filters">
                    <?php
                        $args = array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => 1,
                            'exclude' => 1
                        );
                        $categories = get_categories($args);
                        foreach($categories as $category) { 
                            echo '<span class="label label-default ' . $category->slug . '" href="' . $category->slug . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '">' . $category->name . '</span> ';
                        }
                    ?>
                </div>
                <hr>
                <div id="resources">
                    <?php 
                        $resourceArgs = array(
                            'number_of_posts' => 3,
                            'post_type' => 'resource' ); 
                        $resources = get_posts( $resourceArgs );
                        foreach ( $resources as $post ) : setup_postdata( $post ); ?>
                        <?php $cat = get_the_category(); ?>
                        <div id="<?php echo $post->post_name; ?>" class="content-padding resource" data-cat="<?php echo $cat[0]->slug; ?>">
                            <span class="label label-default <?php echo $cat[0]->slug; ?>"><?php echo $cat[0]->name; ?></span>
                            <h4><?php the_title(); ?></h4>
                            <?php the_content(); ?>
                            <a href="<?php the_field('resource_url'); ?>" target="_blank">View this resource &raquo;</a>
                            <span class="text-muted">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <a href="<?php echo esc_url( home_url( '/' )) . 'resources/#' . $post->post_name; ?>">Link to this Resource</a>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
