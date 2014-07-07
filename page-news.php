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
                        $today = date('Ymd');
                        $newsArgs = array(
                            'number_of_posts' => 0,
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
                        <div class="content-padding">
                            <h6>
                                <?php 
                                    $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                                    echo $date->format('F d, Y');
                                ?>
                            </h6>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_content(); ?></p>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <hr class="divider">
                <h4 class="text-muted">Older Events</h4>
                <hr>
                <div>
                    <?php 
                        $today = date('Ymd');
                        $newsArgs = array(
                            'number_of_posts' => 0,
                            'post_type' => 'event',
                            'meta_query' => array(
                                array(
                        	        'key'		=> 'event_date',
                        	        'compare'	=> '<=',
                        	        'value'		=> $today,
                                )
                            )
                        );
                        $news = get_posts( $newsArgs );
                        foreach ( $news as $post ) : setup_postdata( $post ); ?>
                        <div class="content-padding">
                            <h6>
                                <?php 
                                    $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                                    echo $date->format('F d, Y');
                                ?>
                            </h6>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_content(); ?></p>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
