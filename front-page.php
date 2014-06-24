<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="homepage-hero" style="background-image: url(<?php the_field('hero_image'); ?>)">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12">
    				<?php the_content(); ?>
    			</div>
    		</div>
            <div class="footer-buttons">
                <a href="http://www.youtube.com/watch?v=1oNdU9mJ8L0">
                    <i class="icon-video"></i> Video: Triple Bottom Line
                </a>
                <a href="http://www.crowdrise.com/umsocialventurefund">
                    <i class="icon-heart"></i> Become a Donor
                </a>
            </div>
    	</div>
    </div>
<?php endwhile; endif; ?>
<?php 
    $args = array(
	    'post_type' => 'project',
        'featured' => 'featured'
	);
	$carousel = get_posts( $args );
	$carousel_count = 1;
	if ($carousel):
?>
<div class="homepage-featured">
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
                <div id="featured-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ( $carousel as $post ) : setup_postdata( $post ); ?>
                            <div class="item <?php if ($carousel_count == 1){ echo "active"; } ?>">
                                <img class="carousel-placeholder" />
                                <div class="carousel-caption">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php the_field('project_logo'); ?>" /></a>
                                    <h4 class="featured-company-text">&mdash; Featured Company &mdash;</h4>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        <?php $carousel_count++; endforeach; wp_reset_postdata(); ?>
                    </div>

                    <a class="left carousel-control" href="#featured-carousel" data-slide="prev">
                        <i class="icon-left-open-big"></i>
                    </a>
                    <a class="right carousel-control" href="#featured-carousel" data-slide="next">
                        <i class="icon-right-open-big"></i>
                    </a>
                </div>
			</div>
		</div>
        <hr/>
	</div>
</div>
<?php endif; ?>

<?php 
    $args = array(
	    'post_type' => 'post',
        'numberposts' => 3
	);
	$news = get_posts( $args );
	if ($news):
?>
<div class="homepage-news">
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
                <h3>In the News</h3>
			</div>
            <?php foreach ( $news as $post ) : setup_postdata( $post ); ?>
                <div class="col-sm-6 col-md-4">
                    <a class="post" href="<?php the_permalink(); ?>">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                    </a>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php endif; ?>
	
<?php get_footer(); ?>
