<?php get_header(); ?>
<?php 
    $args = array(
	    'post_type' => 'project',
	);
	$projects = get_posts( $args );
	$project_count = 1;
	if ($projects):
?>

<div class="content">
    <div class="container">
        <h2>Portfolio</h2>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php foreach ( $projects as $post ) : setup_postdata( $post ); ?>
                        <div class="col-sm-6">
                            <a class="project" href="<?php the_permalink(); ?>">
                                <img src="<?php the_field('project_logo'); ?>" />
                                <?php the_excerpt(); ?>
                            </a>
                        </div>
                    <?php if ($project_count % 2 === 0) { echo '</div><div class="row">'; } ?>
                    <?php $project_count++; endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
<?php get_footer(); ?>
