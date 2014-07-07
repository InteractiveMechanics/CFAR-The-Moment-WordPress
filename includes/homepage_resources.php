<section class="homepage-resources">
    <div class="container">
		<div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-7 col-md-5 col-md-offset-1 col-lg-6 col-lg-offset-1">
                        <h3>News 
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>news" class="view-all">view all &raquo;</a>
                        </h3>
                        <?php 
                            $today = date('Ymd');
                            $newsArgs = array(
                                'number_of_posts' => 3,
                                'post_type' => 'event',
                                'meta_query' => array(
                                    array(
                            	        'key'		=> 'event_date',
                            	        'compare'	=> '>=',
                            	        'value'		=> $today,
                                    )
                                )
                            );
                            $news = get_posts( $newsArgs );
                            foreach ( $news as $post ) : setup_postdata( $post ); ?>
                            <h6>
                                <?php 
                                    $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                                    echo $date->format('F d, Y');
                                ?>
                            </h6>
                            <h4><?php the_title(); ?></h4>
                            <?php the_content(); ?>
                        <?php endforeach; wp_reset_postdata();?>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-4">
                        <div class="vr">
                            <h3>Resources 
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>what-to-do" class="view-all">view all &raquo;</a>
                            </h3>
                            <?php 
                                $resourceArgs = array(
                                    'number_of_posts' => 3,
                                    'post_type' => 'resource' ); 
                                $resources = get_posts( $resourceArgs );
                                foreach ( $resources as $post ) : setup_postdata( $post ); ?>
                                <h6><?php the_field('author'); ?></h6>
                                <h4><a href="<?php the_field('resource_url'); ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php endforeach; wp_reset_postdata();?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if( have_rows('about_cfar') ): while( have_rows('about_cfar') ): the_row(); ?>
		        <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <hr class="divider">
                    <h5>About CFAR</h5>
                    <p><?php the_sub_field('description'); ?></p>
                    <p class="text-center">
                        <a href="<?php the_sub_field('link'); ?>" class="underline" target="_blank">Learn more about CFAR</a>
                    </p>
                </div>
            <?php endwhile; endif; ?>
		</div>
    </div>
</section>