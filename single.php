<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content single">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h6><?php posted_on(); ?></h6>
                <h2><?php the_title(); ?></h2>
                <hr>
                <div class="article">
                    <?php the_content(); ?>
                </div>
                <?php post_navigation(); ?>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>
