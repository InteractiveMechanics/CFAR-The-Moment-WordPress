<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2><?php the_title(); ?></h2>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-md-3 hidden-xs hidden-sm">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php endwhile; endif; ?>

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
