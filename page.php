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
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
