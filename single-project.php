<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <img src="<?php the_field('project_logo'); ?>" />
                <br/><br/>
                <div class="entry">
                    <?php the_content(); ?>
                    <?php wp_link_pages(array('before' => __('Pages: '), 'next_or_number' => 'number')); ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php 
            $args = array(
        	    'post_type' => 'post',
                'meta_query' => array(
					array(
						'key' => 'related_projects', // name of custom field
						'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
						'compare' => 'LIKE'
					)
				)
        	);
        	$news = get_posts( $args );
        	if ($news):
        ?>
        <h3>Related News</h3>
        <div class="homepage-news">
    		<div class="row">
                <?php foreach ( $news as $post ) : setup_postdata( $post ); ?>
                    <div class="col-md-4">
                        <a class="post" href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                            <?php the_excerpt(); ?>
                        </a>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
    		</div>
        </div>
        <?php endif; ?>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
